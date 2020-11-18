<?php

namespace App\Http\Controllers;

use Str;
use Auth;
use Notification;

use App\User;
use App\Admin;
use App\Driver;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

  /**
   * This Method Creates A New User For The Application....
   *
   * @param  Request  $request
   * @return Object JSON
   */
  public function createCustomer(Request $request)
  {
    // Create A Validator Object To Check For Errors....
    $Validator = Validator::make($request->all(), [
      'firstName' => 'string|required|max:20',
      'lastName' => 'string|required|max:20',
      'emailAddress' => 'email|required|unique:users,email',
      'phoneNumber' => 'string|required|max:11|unique:users,phone_number',
      'password' => 'string|required|min:7|max:20'
    ]);

    // Check The Validator Status...
    if ($Validator->fails()) {
      $this->Response['status'] = 400;
      $this->Response['errors'] = $Validator->errors();
      $this->Response['message'] = 'Sorry, There Are Some Errors In Your Request.';

      return response()->json($this->Response, 400);
    }

    // Create The Signup Token...
    $Token = Str::random(40);

    // Since The Validator Passes, We create the account and send the user a mail...
    $User = User::create([
      'first_name' => $this->sanitizeFormInput($request->input('firstName')),
      'last_name' => $this->sanitizeFormInput($request->input('lastName')),
      'email' => $this->sanitizeFormInput($request->input('emailAddress')),
      'token' => $Token,
      'status' => 1,
      'phone_number' => $this->sanitizeFormInput($request->input('phoneNumber')),
      'password' => password_hash($this->sanitizeFormInput($request->input('password')), PASSWORD_BCRYPT)
    ]);

    // Prepare The Mail Payload...
    $MailPayload = new \stdClass();
    $MailPayload->name = $User->last_name . ' ' . $User->first_name;
    $MailPayload->url = "/activate/customer/account/" . base64_encode($Token);

    // Send Out The Mail To The User...
    Notification::send($User, new \App\Notifications\WelcomeToDesevens($MailPayload));

    // Prepare The Response Body...
    $this->Response['status'] = 201;
    $this->Response['message'] = 'Please, check your email address to activate your account.';

    return response()->json($this->Response, 201);
  }

  /**
   * This Method activates || verifies a customer account...
   *
   * @param  Request, String:  $request $token
   * @return Object JSON
   */
  public function activateCustomerAccount(Request $request, $token)
  {
    // Get The Token From The Url...
    $Token = base64_decode($token);

    // Fetch The User From The User...
    $User = User::where('token', $this->sanitizeFormInput($Token))->where('status', 0)->first();

    // Check If A User With The Token Exists....
    if (empty($User)) {
      $this->Response['status'] = 401;
      $this->Response['message'] = 'Invalid Token Passed.';

      return response()->json($this->Response, 401);
    }

    // Check If The Token Is Still Valid...
    $issuedAt = explode(' ', $User->updated_at->diffForHumans());
    if ($issuedAt[0] <= 10) {
      switch ($issuedAt[1]) {
        case 'seconds':
            $User->status = 1;
            $User->save();

            // Unset The Token Field...
            unset($User->token);
            unset($User->password);

            $this->Response['status'] = 200;
            $this->Response['data'] = $User;
            $this->Response['data']['access_token'] = $User->createToken('userAccess')->accessToken;

            // Return an HTTP Redirect...
            return redirect(env('CLIENT_URL') . '/user/dashboard?access_token=' . $this->Response['data']['access_token'] . '&emailAddress=' . $User->emailAddress);
          break;
        case 'minute':
          $User->status = 1;
          $User->save();

          // Unset The Token Field...
          unset($User->token);
          unset($User->password);

          $this->Response['status'] = 200;
          $this->Response['data'] = $User;
          $this->Response['data']['access_token'] = $User->createToken('userAccess')->accessToken;

          // Return an HTTP Redirect...
          return redirect(env('CLIENT_URL') . '/user/dashboard?access_token=' . $this->Response['data']['access_token'] . '&emailAddress=' . $User->emailAddress);
          break;
        case 'minutes':
          $User->status = 1;
          $User->save();

          // Unset The Token Field...
          unset($User->token);
          unset($User->password);

          $this->Response['status'] = 200;
          $this->Response['data'] = $User;
          $this->Response['message'] = 'Account Created Successfully.';
          $this->Response['data']['access_token'] = $User->createToken('userAccess')->accessToken;

          // Return an HTTP Redirect...
          return redirect(env('CLIENT_URL') . '/user/dashboard?access_token=' . $this->Response['data']['access_token'] . '&emailAddress=' . $User->emailAddress);
          break;
        default:
          // The Token Has Expired...
          $this->Response['status'] = 400;
          $this->Response['message'] = 'Expired Token.';

          // Return an HTTP Redirect...
          return redirect(env('CLIENT_URL') . '/user/dashboard?access_token=&emailAddress=');
          break;
      }
    }

    // The Token Has Expired...
    $this->Response['status'] = 400;
    $this->Response['message'] = 'Expired Token.';

    // Return an HTTP Redirect...
    return redirect(env('CLIENT_URL') . '/user/dashboard?access_token=&emailAddress=');
  }

  /**
   * This Method resends an activation token for a customer...
   *
   * @param  Request, String:  $request $emailAddress
   * @return Object JSON
   */
  public function resendToken(Request $request, $emailAddress)
  {
    // Check If The Email Address Exists...
    $User = User::where('token', $this->sanitizeFormInput($emailAddress))->where('status', 0)->first();

    if (empty($User)) {
      $this->Response['status'] = 401;
      $this->Response['message'] = 'This Request Failed First Level Verification'; //Try Not To Give Too Much Information

      $this->Response['errors'] = ['email' => [' Something Broke With This Email. Try Again. ']];
      return response()->json($this->Response, 401);
    }

    // Create A New Token To Be Issued....
    $Token = Str::random(40);

    // Update The User Field...
    $User->token = $Token;
    $User->updated_at = date('Y-m-d H:i:s');
    $User->save();

    // Since The Email Is Valid, We Proceed...
    $MailPayload = new \stdClass();
    $MailPayload->token = base64_encode($Token);
    $MailPayload->name = $User->last_name . ' ' . $User->first_name;

    // Prepare The Response Body...
    $this->Response['status'] = 200;
    $this->Response['message'] = 'Mail Sent Successfully.';

    return response()->json($this->Response, 200);
  }

  /**
   * This Method logins a customer a sends an access token...
   *
   * @param  Request, String:  $request $emailAddress
   * @return Object JSON
   */
  public function loginCustomer(Request $request)
  {
    // Create The Validation Object...
    $Validator = Validator::make($request->all(), [
      'emailAddress' => 'email|required',
      'password' => 'string|required'
    ]);

    // Check The Validation Status....
    if ($Validator->fails()) {
      $this->Response['status'] = 400;
      $this->Response['message'] = 'There Are Some Errors In Your Request';

      $this->Response['errors'] = $Validator->errors();
      return response()->json($this->Response, 400);
    }

    // Get The User Model....
    $User = User::where('email', $this->sanitizeFormInput($request->input('emailAddress')))->where('status', 1)->first();
    if (empty($User)) {
      $this->Response['status'] = 400;
      $this->Response['message'] = 'Password / Email Address Mismatch';

      $this->Response['errors'] = ['user' => ['Password / Email Address Mismatch']];
      return response()->json($this->Response, 400);
    }

    // Validate The Email Address && The Password...
    if (password_verify($this->sanitizeFormInput($request->input('password')), $User->password)) {
      // Get The User Object....
      $User->updated_at = date('Y-m-d H:i:s');

      // Prepare The Response Body....
      unset($User->token);
      unset($User->password);
      $this->Response['data'] = $User;
      $this->Response['access_token'] = $User->createToken('userAccess')->accessToken;
      $this->Response['status'] = 200;
      $this->Response['message'] = 'Login Successfull';

      // Send An Http Response....
      return response()->json($this->Response, 200);
    }

    // Send An Error Response...
    $this->Response['status'] = 400;
    $this->Response['message'] = 'Email Address / Password Mismatch';

    return response()->json($this->Response, 400);
  }

  /**
   * This Method authenticates an admin and sends back an access token...
   *
   * @param  Request, String:  $request $emailAddress
   * @return Object JSON
   */
  public function adminLogin(Request $request)
  {
    // Create The Validation Object...
    $Validator = Validator::make($request->all(), [
      'emailAddress' => 'email|required',
      'password' => 'string|required'
    ]);

    // Check The Validation Status....
    if ($Validator->fails()) {
      $this->Response['status'] = 400;
      $this->Response['message'] = 'There Are Some Errors In Your Request';

      $this->Response['errors'] = $Validator->errors();
      return response()->json($this->Response, 400);
    }

    // Fetch The Admin Login Details...
    $Admin = Admin::where('email', $this->sanitizeFormInput($request->input('emailAddress')))->first();
    if (empty($Admin)) {
      $this->Response['status'] = 401;
      $this->Response['message'] = 'Unauthorized Access';

      $this->Response['errors'] = ['auth' => ['You are not allowed to access this route...']];
      return response()->json($this->Response, 401);
    }

    // Validate The Email Address && The Password...
    if (password_verify($this->sanitizeFormInput($request->input('password')), $Admin->password) && (Integer)$Admin->status == 1) {
      // Get The User Object....
      $Admin->updated_at = date('Y-m-d H:i:s');

      // Prepare The Response Body....
      $this->Response['data'] = $Admin;
      $this->Response['access_token'] = $Admin->createToken('adminAccess')->accessToken;
      $this->Response['status'] = 200;
      $this->Response['message'] = 'Login Successfull';

      // Send An Http Response....
      return response()->json($this->Response, 200);
    }

    // Send An Error Response...
    $this->Response['status'] = 400;
    $this->Response['message'] = 'Email Address / Password Mismatch';

    return response()->json($this->Response, 400);
  }

  /**
   * This Method authenticates an admin and sends back an access token...
   *
   * @param  Request, String:  $request $emailAddress
   * @return Object JSON
   */
  public function driverLogin(Request $request)
  {
    // Create The Validation Object...
    $Validator = Validator::make($request->all(), [
      'driverId' => 'string|required',
      'password' => 'string|required'
    ]);

    // Check The Validation Status....
    if ($Validator->fails()) {
      $this->Response['status'] = 400;
      $this->Response['message'] = 'There Are Some Errors In Your Request';

      $this->Response['errors'] = $Validator->errors();
      return response()->json($this->Response, 400);
    }

    // Fetch The Admin Login Details...
    $Driver = Driver::where('driver_id', $this->sanitizeFormInput($request->input('driverId')))->first();
    if (empty($Driver)) {
      $this->Response['status'] = 401;
      $this->Response['message'] = 'Unauthorized Access';

      $this->Response['errors'] = ['auth' => ['You are not allowed to access this route...']];
      return response()->json($this->Response, 401);
    }

    // Validate The Email Address && The Password...
    if (password_verify($this->sanitizeFormInput($request->input('password')), $Driver->password) && (Integer)$Driver->status == 1) {
      // Get The User Object....
      $Driver->updated_at = date('Y-m-d H:i:s');

      // Prepare The Response Body....
      $this->Response['data'] = $Driver;
      $this->Response['access_token'] = $Driver->createToken('driverAccess')->accessToken;
      $this->Response['status'] = 200;
      $this->Response['message'] = 'Login Successfull';

      // Send An Http Response....
      return response()->json($this->Response, 200);
    }

    // Send An Error Response...
    $this->Response['status'] = 400;
    $this->Response['message'] = 'Email Address / Password Mismatch';

    return response()->json($this->Response, 400);
  }
}
