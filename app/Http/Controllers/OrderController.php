<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Crypt;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
            'customer_phone' => 'required|string|max:15',
            'months_rented' => 'required|integer|min:1',
        ]);
        
        try {
            $activeOrder = Order::where('customer_email', $request->customer_email)
                ->where('status_product', 'rented')
                ->first();

            if ($activeOrder) {
                return redirect()->back()->with('error', 'You already have an active rental order.');
            }

            $product = Product::findOrFail($request->product_id);
    
            if ($product->available_stock < 1) {
                return redirect()->back()->with('error', 'Not available.');
            }

            $order = new Order();
            $order->product_id = $request->product_id;
            $order->customer_name = $request->customer_name;
            $order->customer_email = $request->customer_email;
            $order->customer_phone = $request->customer_phone;
            $order->months_rented = $request->months_rented;
            $order->status_payment = 'pending';
            $order->status_product = 'pending';
            $order->save();
    
            $xenditApiKey = env('XENDIT_API_KEY');
            $external_id = 'ORDER_' . $product->id;
            $email = $request->customer_email;
            $harga_total = $product->price * $request->months_rented;
            $baseurl = env('APP_URL');
            $order_id = $order->id;
            $product_id = $product->id;
            $encrypted_order_id = Crypt::encryptString($order_id . '-' . $product_id);
    
            $invoice_data = [
                'external_id' => $external_id,
                'amount' => $harga_total,
                'payer_email' => $email,
                'success_redirect_url' => $baseurl . '/order/success?order_id=' . $encrypted_order_id,
                'failure_redirect_url' => $baseurl . '/order/failure?order_id=' . $encrypted_order_id,
            ];

            $response = Http::withBasicAuth($xenditApiKey, '')
                ->post('https://api.xendit.co/v2/invoices', $invoice_data);
    
            $invoice = $response->json();
    
            return redirect($invoice['invoice_url']);
    
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to create order! Please try again.');
        }
    }

    public function handleSuccess(Request $request)
    {
        try {
            $encrypted_order_id = $request->query('order_id');
            $order_id = Crypt::decryptString(urldecode($encrypted_order_id));

            list($id, $product_id) = explode('-', $order_id);
    
            $order = Order::findOrFail($id);
            $order->status_payment = 'paid';
            $order->status_product = 'rented';
            $order->save();

            $product = Product::findOrFail($product_id);
            $product->available_stock = 0;
            $product->save();

            return redirect()->back()->with('success', 'Order success!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to create order! Please try again.');
        }
    }

    public function handleFailure(Request $request)
    {
        try {
            $encrypted_order_id = $request->query('order_id');
            $order_id = Crypt::decryptString(urldecode($encrypted_order_id));

            list($id, $product_id) = explode('-', $order_id);

            $order = Order::findOrFail($id);
            $order->status_payment = 'failed';
            $order->status_product = 'available';
            $order->save();

            return redirect()->back()->with('error', 'Payment failed! Please try again.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update order status! Please try again.');
        }
    }

    public function index()
    {
        $orders = Order::with('product')->latest()->get();
        
        foreach ($orders as $order) {
            if ($order->status_product == 'rented') {
                $rentalStart = $order->updated_at;
                $rentalEnd = $rentalStart->addMonths($order->months_rented);
                $now = now();
                $order->isExpired = $now->greaterThan($rentalEnd);
                $order->remainingDays = $now->diffInDays($rentalEnd, false);
            }
        }
        
        return view('admin.orders.index', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::with('product')->findOrFail($id);
        
        $rentalStart = $order->updated_at;
        $rentalEnd = $rentalStart->addMonths($order->months_rented);
        $now = now();
        $isExpired = $now->greaterThan($rentalEnd);
        $remainingDays = $now->diffInDays($rentalEnd, false);

        return view('admin.orders.detail', compact('order', 'rentalEnd', 'isExpired', 'remainingDays'));
    }
}
