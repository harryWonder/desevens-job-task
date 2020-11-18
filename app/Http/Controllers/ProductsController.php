<?php

namespace App\Http\Controllers;

use Str;
use Cloudinary;

use App\User;
use App\Admin;
use App\Product;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductsController extends Controller
{
  /**
   * This Method Creates A Product....
   *
   * @param  Request  $request
   * @return Object JSON
   */
    public function create(Request $request)
    {
      // Create The Validator Object...
      $Validator = Validator::make($request->all(), [
        'name' => 'string|required',
        'description' => 'string|required|max:100',
        'banner' => 'mimes:jpeg,jpg,png,gif|required|max:100000',
        'category_id' => 'numeric|required',
        'quantity' => 'numeric|required',
        'delivery_time' => 'string|required',
        'amount' => 'numeric|required'
      ]);

      // Check If The Validator Fails...
      if ($Validator->fails()) {
        $this->Response['status'] = 400;
        $this->Response['message'] = 'There Are Some Errors In The Request.';

        $this->Response['errors'] = $Validator->errors();
        return response()->json($this->Response, 400);
      }

      // Just In Case Any Errors Were Thrown...
      try {
        // Fetch The File From The Request....
        $Banner = $request->banner;
        $BannerTitle = basename($Banner->getClientOriginalName());
        $BannerExtension = $Banner->getClientOriginalExtension();

        $BannerTitle = str_replace(' ', '_', $BannerTitle);
        $BannerTitle = $BannerTitle . '_' . 'podcast_' . time() . '_podcast' . '.' . $BannerExtension;
        $Banner->move('public/', $BannerTitle);

        // Upload The File...
        $uploadedFileUrl = Cloudinary::uploadFile('public/' . $BannerTitle)->getSecurePath();
        $Product = Product::create([
          'name' => $this->sanitizeFormInput($request->input('name')),
          'slug' => Str::slug($this->sanitizeFormInput($request->input('name'))),
          'description' => $this->sanitizeFormInput($request->input('description')),
          'banner' => $uploadedFileUrl,
          'file_path' => 'public/' . $BannerTitle,
          'category_id' => $this->sanitizeFormInput($request->input('category_id')),
          'quantity' => $this->sanitizeFormInput($request->input('quantity')),
          'delivery_time' => $this->sanitizeFormInput($request->input('delivery_time')),
          'amount' => $this->sanitizeFormInput($request->input('amount'))
        ]);

        // Prepare The Response Body....
        $this->Response['status'] = 201;
        $this->Response['data'] = $Product;
        $this->Response['message'] = 'The Product Has Been Created Successfully.';

        // Send Back A Response...
        return response()->json($this->Response, 201);
      } catch (Exception $e) {
        // Prepare The Error Response...
        $this->Response['status'] = 500;
        $this->Response['message'] = 'Server Error.';
        $this->Response['errors'] = ['server' => [$e->getMessage]];

        // Send Back An Http Response...
        return response()->json($this->Response, 500);
      }
    }

    /**
     * This Method Updates A Product....
     *
     * @param  Request Integer: $request, $productId
     * @return Object JSON
     */
    public function updateProduct(Request $request, $productId)
    {
      // Create The Validator Object...
      $Validator = Validator::make($request->all(), [
        'name' => 'string|required',
        'description' => 'string|required|max:100',
        'banner' => 'mimes:jpeg,jpg,png,gif|nullable|max:5000',
        'category_id' => 'numeric|required',
        'quantity' => 'numeric|required',
        'delivery_time' => 'string|required',
        'amount' => 'numeric|required'
      ]);

      // Check If The Validator Fails...
      if ($Validator->fails()) {
        $this->Response['status'] = 400;
        $this->Response['message'] = 'There Are Some Errors In The Request.';

        $this->Response['errors'] = $Validator->errors();
        return response()->json($this->Response, 400);
      }

      // Check If The Product Exists...
      $Product = Product::find($productId);
      if (empty($Product)) {
        $this->Response['status'] = 204;
        $this->Response['message'] = 'Failed To Fetch The Selected Product';
        $this->Response['errors'] = ['product' => ['Could Not Fetch The Selected Product']];

        // Send Back An Http Response....
        return response()->json($this->Response, 204);
      }

      // Since The Product Exists....
      try {

        // Check If A File Was Uploaded...
        $uploadedFileUrl = $Product->banner;
        $Product->file_path = $Product->file_path;
        if ($request->hasFile('banner')) {
          // Fetch The File From The Request....
          $Banner = $request->banner;
          $BannerTitle = basename($Banner->getClientOriginalName());
          $BannerExtension = $Banner->getClientOriginalExtension();

          $BannerTitle = str_replace(' ', '_', $BannerTitle);
          $BannerTitle = $BannerTitle . '_' . 'podcast_' . time() . '_podcast' . '.' . $BannerExtension;
          $Banner->move('public/', $BannerTitle);

          // Upload The File To Cloduinary
          $uploadedFileUrl = Cloudinary::uploadFile('public/' . $BannerTitle)->getSecurePath();
          $Product->file_path = 'public/' . $BannerTitle;
        }

        // Proceed With The Update....
        $Product->name = $this->sanitizeFormInput($request->input('name'));
        $Product->slug = Str::slug($this->sanitizeFormInput($request->input('name')));
        $Product->description = $this->sanitizeFormInput($request->input('description'));
        $Product->banner = $uploadedFileUrl;
        $Product->category_id = $this->sanitizeFormInput($request->input('category_id'));
        $Product->quantity = $this->sanitizeFormInput($request->input('quantity'));
        $Product->delivery_time = $this->sanitizeFormInput($request->input('delivery_time'));
        $Product->amount = $this->sanitizeFormInput($request->input('amount'));

        $Product->save();

        // Prepare The Response Body....
        $this->Response['status'] = 200;
        $this->Response['data'] = $Product;
        $this->Response['message'] = 'The Product Has Been Updated Successfully.';

        // Send Back A Response...
        return response()->json($this->Response, 200);
      } catch (Exception $e) {
        // Prepare The Error Response...
        $this->Response['status'] = 500;
        $this->Response['message'] = 'Server Error.';
        $this->Response['errors'] = ['server' => [$e->getMessage]];

        // Send Back An Http Response...
        return response()->json($this->Response, 500);
      }
    }

    /**
     * This Method Fetches All Products....
     *
     * @param  Request  $request
     * @return Object JSON
     */
    public function fetchProducts(Request $request)
    {
      // Fetch All The Products In A Paginated Order...
      $Products = Product::orderBy('id', 'desc')->get();
      if (empty($Products)) {
        $this->Response['status'] = 204;
        $this->Response['message'] = 'No Records.';

        // Send Back An Http Response...
        return response()->json($this->Response, 204);
      }

      // Return The Data Resource...
      $this->Response['status'] = 200;
      $this->Response['data'] = $Products;
      $this->Response['message'] = 'Successfully Fetched ' . count($Products) . ' records';

      // Send Back An Http Response...
      return response()->json($this->Response, 200);
    }

    /**
     * This Method Fetch A Product....
     *
     * @param  Request  $request
     * @return Object JSON
     */
    public function fetchProduct(Request $request, $slug)
    {
      // Check The Request Initiate...
      if (empty($request->admin()) || empty($request->user()) || empty($request->driver())) {
        $this->Response['status'] = 401;
        $this->Response['message'] = 'Unauthorized Access.';

        $this->Response['errors'] = ['access' => ['Unauthorized Access']];
        return response()->json($this->Response, 401);
      }

      // Find The Product...
      $Product = Product::where('slug', $slug)->first();
      if (empty($Product)) {
        $this->Response['status'] = 204;
        $this->Response['message'] = 'Failed To Fetch The Product.';

        // Prepare The Http Status Code...
        return response()->json($this->Response, 204);
      }

      // Prepare The Response Body....
      $this->Response['status'] = 200;
      $this->Response['data'] = $Product;
      $this->Response['message'] = 'Operation Successful';

      // Send Back An Http Response...
      return response()->json($this->Response, 200);
    }

    /**
     * This Method Deletes A Product....
     *
     * @param  Request  $request
     * @return Object JSON
     */
    public function deleteProduct(Request $request, $id)
    {
      // Find The Product...
      $Product = Product::find($this->sanitizeFormInput($id));
      if (empty($Product)) {
        $this->Response['status'] = 204;
        $this->Response['message'] = 'Failed To Fetch The Product.';

        // Prepare The Http Status Code...
        return response()->json($this->Response, 204);
      }

      // Delete The Local Image...
      if (file_exists($Product->file_path)) {
        unlink($Product->file_path);
      }

      // Delete The Product...
      $Product->delete();

      // Prepare The Response Body....
      $this->Response['status'] = 200;
      $this->Response['data'] = $Product;
      $this->Response['message'] = 'Product Deleted';

      // Send Back An Http Response...
      return response()->json($this->Response, 200);
    }
}
