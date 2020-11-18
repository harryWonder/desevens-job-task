<?php

namespace App\Http\Controllers;

use Str;

use App\Admin;
use App\Category;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
   /**
    * This Method Creates A Category....
    *
    * @param  Request  $request
    * @return Object JSON
    */
    public function create(Request $request)
    {
      // Create The Validator Object...
      $Validator = Validator::make($request->all(), [
        'name' => 'string|required|max:20|unique:categories'
      ]);

      // Check If The Validator Fails...
      if ($Validator->fails()) {
        $this->Response['status'] = 400;
        $this->Response['message'] = 'There Are Some Errors In The Request.';

        $this->Response['errors'] = $Validator->errors();
        return response()->json($this->Response, 400);
      }

      // Create The Category....
      $slug = Str::slug($this->sanitizeFormInput($request->input('name')));
      $Category = Category::create([
        'name' => $this->sanitizeFormInput($request->input('name')),
        'slug' => $slug
      ]);

      // Prepare An Http Response & Send Back To The Client..
      $this->Response['status'] = 201;
      $this->Response['data'] = $Category;
      $this->Response['message'] = 'Category Has Been Created Successfully';

      return response()->json($this->Response, 201);
    }

    /**
     * This Method Fetches A Category....
     *
     * @param  Request String: $request, $slug
     * @return Object JSON
     */
    public function fetchCategory(Request $request, $slug)
    {
        // Check If The Slug Exist...
        $slug = $this->sanitizeFormInput($slug);
        $Category = Category::where('slug', $slug)->first();

        // Category Does Not Exists....
        if (empty($Category)) {
          $this->Response['status'] = 204;
          $this->Response['message'] = 'Category Not Found.';

          return response()->json($this->Response, 204);
        }

        // Prepare The Response Body....
        $this->Response['status'] = 200;
        $this->Response['data'] = $Category;
        $this->Response['message'] = 'Successful';

        // Send Back An Http Response...
        return response()->json($this->Response, 200);
    }

    public function fetchCategories()
    {
      // Fetch All The Categories....
      $Categories = Category::orderBy('id', 'desc')->get();
      if (empty($Categories)) {
        $this->Response['status'] = 204;
        $this->Response['message'] = 'No Categories To Fetch';

        return response()->json($this->Response, 204);
      }

      // Return All The Categories...
      $this->Response['status'] = 200;
      $this->Response['message'] = 'Successfully Fetched ' . count($Categories) . ' records';
      $this->Response['data'] = $Categories;

      return response()->json($this->Response, 200);
    }

    /**
     * This Method Updates A Category....
     *
     * @param  Request  $request
     * @return Object JSON
     */
    public function updateCategory(Request $request)
    {
      // Create The Validator Object....
      $Validator = Validator::make($request->all(), [
        'name' => 'string|required|unique:categories',
        'slug' => 'string|required'
      ]);

      // Check If The Slug Exist...
      $slug = $this->sanitizeFormInput($request->input('slug'));
      $Category = Category::where('slug', $slug)->first();

      // Check For Errors...
      if ($Validator->fails()) {
        $this->Response['status'] = 400;
        $this->Response['message'] = 'There Are Some Errors In Your Form.';
        $this->Response['errors'] = $Validator->errors();

        return response()->json($this->Response, 400);
      }

      if (empty($Category)) {
        $this->Response['status'] = 204;
        $this->Response['message'] = 'Failed To Fetch The Selected Category.';
        $this->Response['errors'] = ['slug' => ['Invalid slug passed.']];

        return response()->json($this->Response, 204);
      }

      // Save The Category...
      $Category->name = $this->sanitizeFormInput($request->input('name'));
      $Category->slug = Str::slug($this->sanitizeFormInput($request->input('name')));
      $Category->updated_at = date('Y-m-d H:i:s');
      $Category->save();

      // Prepare The Response Body...
      $this->Response['status'] = 200;
      $this->Response['message'] = 'Category Updated Successfully';
      $this->Response['data'] = $Category;

      return response()->json($this->Response, 200);
    }

    /**
     * This Method Updates A Category Status....
     *
     * @param  Request String, String: $request, $slug, $status
     * @return Object JSON
     */
    public function updateStatus(Request $request, $slug, $status)
    {
      // Check If The Slug Exist...
      $slug = $this->sanitizeFormInput($slug);
      $Category = Category::where('slug', $slug)->first();

      // Category Does Not Exists....
      if (empty($Category)) {
        $this->Response['status'] = 204;
        $this->Response['message'] = 'Category Not Found.';

        return response()->json($this->Response, 204);
      }

      // Update The Status Field...
      if ($status == 'disable') {
        $Category->status = 0;
        $Category->updated_at = date('Y-m-d H:i:s');
      } else {
        $Category->status = 1;
        $Category->updated_at = date('Y-m-d H:i:s');
      }

      // Save The Updated Category....
      $Category->save();

      // Prepare The Response Body....
      $this->Response['status'] = 200;
      $this->Response['data'] = $Category;
      $this->Response['message'] = 'Successful';

      // Send Back An Http Response...
      return response()->json($this->Response, 200);
    }

    /**
     * This Method Deletes A Category....
     *
     * @param  Request String: $request, $slug
     * @return Object JSON
     */
    public function deleteCategory(Request $request, $slug)
    {
      // Check If The Slug Exist...
      $slug = $this->sanitizeFormInput($slug);
      $Category = Category::where('slug', $slug)->first();

      // Category Does Not Exists....
      if (empty($Category)) {
        $this->Response['status'] = 204;
        $this->Response['message'] = 'Category Not Found.';

        return response()->json($this->Response, 204);
      }

      // Fetch All Products From ThIS Category && Delete Them...
      $Products = $Category->products;
      if (!empty($Products)) {
        for ($i=0; $i < count($Products); $i++) {
          $Products[$i]->delete();
        }
      }

      // Delete The Category...
      $Category->delete();

      // Prepare The Response Body....
      $this->Response['status'] = 200;
      $this->Response['data'] = $Category;
      $this->Response['message'] = 'Deleted Successful';

      // Send Back An Http Response...
      return response()->json($this->Response, 200);
    }
}
