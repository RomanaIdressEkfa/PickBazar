<?php

namespace App\Http\Controllers;

use App\Models\Fruit;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function show(){
        return view('frontend.master');
    }
    public function fruit(){
        $fruits=Fruit::all();
        return view('frontend.fruits & vegetables.fruits',compact('fruits'));
    }

}
