<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function testAjax()
    {
        return "Ajax was successful";
    }
}


