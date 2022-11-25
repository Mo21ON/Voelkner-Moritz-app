<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Company;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function counter()
    {
        return Food::all()->count();             
    }
}
