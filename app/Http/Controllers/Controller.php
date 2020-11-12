<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    // Reusable Properties
    protected $Response = array( 'status' => 200, 'message' => '', 'data' => '', 'errors' => [] );

    protected function sanitizeFormInput($data)
    {
      return htmlentities(stripcslashes(strip_tags($data)));
    }
}
