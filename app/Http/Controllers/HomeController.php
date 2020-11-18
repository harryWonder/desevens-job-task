<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function fetchCategories()
    {
      // Fetch All The Categories....
      $Categories = Category::where('status', 1)->get();
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

      if (!empty($Products)) {
        for ($i=0; $i < count($Products); $i++) {
          $Products[$i]->category = $Products[$i]->category;
        }

        // Return The Data Resource...
        $this->Response['status'] = 200;
        $this->Response['data'] = $Products;
        $this->Response['message'] = 'Successfully Fetched ' . count($Products) . ' records';

        // Send Back An Http Response...
        return response()->json($this->Response, 200);
      }
    }
}
