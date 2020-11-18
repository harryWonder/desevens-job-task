<?php

namespace App\Http\Controllers;

use Str;

use App\User;
use App\Order;
use App\Driver;
use App\Transaction;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class OrdersController extends Controller
{
    public function initializeOrder(Request $request)
    {
      $Products = $request->products;
      $Shipping = $request->shipping;
      $amount = $request->amount;
      $email = $request->emailAddress;

      $response = Http::withHeaders([
          'Accept' => 'application/json',
          'Content-Type' => 'application/json',
          'Cache-Control' => 'no-cache'
      ])->withToken('sk_test_afe56f68a8cd6beb75611aa579c32f20d542b01b')->post('https://api.paystack.co/transaction/initialize', [
          'email' => $email,
          'amount' => $amount * 100,
          'metadata' => ['products' => $Products, 'shipping' => $Shipping]
      ]);

      if ($response->successful()) {
        $this->Response['status'] = 200;
        $this->Response['message'] = 'Authorization Url Created.';
        $this->Response['data'] = $response->json();

        return response()->json($this->Response, 200);
      }

      $this->Response['status'] = 400;
      $this->Response['data'] = $response->json();
      $this->Response['message'] = 'Failed To Create The Authorization Url';
      return response()->json($this->Response, 400);
    }

    public function approveOrder(Request $request, $orderId, $type)
    {
      $Order = Order::find($this->sanitizeFormInput($orderId));
      if (empty($Order)) {
        $this->Response['status'] = 204;
        $this->Response['message'] = 'Failed To Fetch Order.';

        return response()->json($this->Response, 204);
      }

      if ($type == 'approve') {
        $Order->status = 1;
        $Order->save();
      } else {
        $Order->status = 0;
        $Order->save();
      }

      // Update The Order Status...
      $this->Response['status'] = 200;
      $this->Response['message'] = 'Order Updated';
      $this->Response['data'] = $Order;

      return response()->json($this->Response, 200);
    }

    public function takeOrder(Request $request, $orderId, $driverId)
    {
      $Order = Order::find($this->sanitizeFormInput($orderId));
      if (empty($Order)) {
        $this->Response['status'] = 204;
        $this->Response['message'] = 'Failed To Fetch Order.';

        return response()->json($this->Response, 204);
      }

      $Driver = Driver::where('driver_id', $this->sanitizeFormInput($driverId))->first();

      $Order->driver_id = $Driver->id;
      $Order->shipping_status = 'In Progress';
      $Order->save();

      // Update The Order Status...
      $this->Response['status'] = 200;
      $this->Response['message'] = 'Order Updated';
      $this->Response['data'] = $Order;

      return response()->json($this->Response, 200);
    }

    public function completeOrder(Request $request, $orderId, $driverId)
    {
      $Driver = Driver::where('driver_id', $this->sanitizeFormInput($driverId))->first();
      if (empty($Driver->id)) {
        $this->Response['status'] = 204;
        $this->Response['message'] = 'Failed To Fetch Driver.';

        return response()->json($this->Response, 204);
      }

      $Order = Order::where('id', $this->sanitizeFormInput($orderId))->where('driver_id', $Driver->id)->first();
      if (empty($Order)) {
        $this->Response['status'] = 204;
        $this->Response['message'] = 'Failed To Fetch Order.';

        return response()->json($this->Response, 204);
      }

      $Order->shipping_status = 'Delivered';
      $Order->save();

      // Update The Order Status...
      $this->Response['status'] = 200;
      $this->Response['message'] = 'Order Updated';
      $this->Response['data'] = $Order;

      return response()->json($this->Response, 200);
    }

    public function verifyTransaction(Request $request)
    {
      $response = Http::withToken('sk_test_afe56f68a8cd6beb75611aa579c32f20d542b01b')->get('https://api.paystack.co/transaction/verify/' . $request->reference);
      $Response = $response->json();
      if ($response->successful()) {
        if ($Response['data']['status'] == 'success') {
          $Transaction = Transaction::where('reference', $this->sanitizeFormInput($request->reference))->first();
          if (!empty($Transaction)) {
            dd('Transaction Already Exists...');
          }

          // Customer...
          $User = User::where('email', $Response['data']['customer']['email'])->first();

          // since the transaction does not exits, we create the transaction and do a redirect...
          Transaction::create([
            'email' => $Response['data']['customer']['email'],
            'reference' => $this->sanitizeFormInput($request->reference),
            'amount' => (Float) $Response['data']['amount'] / 100,
            'status' => 1
          ]);

          // create an order with the transaction...
          Order::create([
            'customer_id' => $User->id,
            'driver_id' => null,
            'products' => json_encode($Response['data']['metadata']['products']),
            'shipping' => $Response['data']['metadata']['shipping'],
            'amount' => (Float) $Response['data']['amount'] / 100,
            'status' => 0,
            'reference' => $this->sanitizeFormInput($request->reference),
          ]);

          // since both of these has been created, we redirect back to the user dashboard page and clear the cart...
          // http://127.0.0.1:8000/api/v1/user/verify/purchase?trxref=z8oiwq09ow&reference=z8oiwq09ow
          return redirect(env('CLIENT_URL', 'http://127.0.0.1:8000/#/user/orders'));
        }

        // since the transaction failed...
        Transaction::create([
          'email' => $Response['data']['customer']['email'],
          'reference' => $this->sanitizeFormInput($request->reference),
          'amount' => (Float) $Response['data']['amount'] / 100,
          'status' => 2
        ]);

        // Mail The User Saying The Transaction Failed...
        return redirect(env('CLIENT_URL', 'http://127.0.0.1:8000/#/user/orders'));
      }

      return redirect(env('CLIENT_URL', 'http://127.0.0.1:8000/#/'));
    }

    public function fetchOrdersCustomer(Request $request, $email)
    {
      $User = User::where('email', $this->sanitizeFormInput($email))->first();
      if (empty($User)) {
        $this->Response['status'] = 401;
        $this->Response['message'] = 'Unauthorized';

        return response()->json($this->Response, 401);
      }

      $Orders = Order::where('customer_id', $User->id)->get();
      if (!empty($Orders)) {
        $this->Response['status'] = 200;
        $this->Response['data'] = $Orders;
        $this->Response['message'] = 'successfully fetched ' . count($Orders) . ' records.';

        return response()->json($this->Response, 200);
      }

      $this->Response['status'] = 204;
      return response()->json($this->Response, 204);
    }

    public function fetchOrdersDriver(Request $request)
    {
      $Orders = Order::where('status', 1)->orderBy('id', 'desc')->get();
      if (!empty($Orders)) {
        for ($i=0; $i < count($Orders); $i++) {
          $Orders[$i]->customer = User::find($Orders[$i]->customer_id);
        }

        $this->Response['status'] = 200;
        $this->Response['data'] = $Orders;
        $this->Response['message'] = 'successfully fetched ' . count($Orders) . ' records.';

        return response()->json($this->Response, 200);
      }

      $this->Response['status'] = 204;
      return response()->json($this->Response, 204);
    }

    public function fetchOrdersAdmin(Request $request)
    {
      $Orders = Order::orderBy('id', 'desc')->get();
      if (!empty($Orders)) {
        for ($i=0; $i < count($Orders); $i++) {
          $Orders[$i]->customer = User::find($Orders[$i]->customer_id);
        }

        $this->Response['status'] = 200;
        $this->Response['data'] = $Orders;
        $this->Response['message'] = 'successfully fetched ' . count($Orders) . ' records.';

        return response()->json($this->Response, 200);
      }

      $this->Response['status'] = 204;
      return response()->json($this->Response, 204);
    }
}
