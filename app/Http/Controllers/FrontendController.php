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

    public function addToCart($id){

        $fruit=Fruit::find($id);
        $cart=session()->get('cart',[]);
        if(isset($cart[$id])){
            $cart[$id]['quantity']++;
        }
        else{
            $cart[$id]=[
                "name"=>$fruit->name,
                "quantity"=>1,
                "price"=>$fruit->price,
                "image"=>$fruit->image,
            ];
        }
        session()->put('cart',$cart);
        // toastr()->success('Fruit has been already to added the cart successfully!', 'Congrats');
        // return redirect()->back();
        return redirect()->back()->with('success','Fruit has been already to added the cart');
    }

    public function allCartPage(){
        return view('frontend.allCartPage');
    }

    // public function addToCart($id, $price) {
    //     $fruit = Fruit::where('id', $id)->where('price', $price)->first();

    //     if (!$fruit) {
    //         return redirect()->back()->with('error', 'Fruit not found');
    //     }

    //     $cart = session()->get('cart', []);

    //     $totalCartPrice = $this->calculateTotalCartPrice($cart);

    //     if (isset($cart[$id][$price])) {
    //         $cart[$id][$price]['quantity']++;
    //     } else {
    //         $cart[$id][$price] = [
    //             "name" => $fruit->name,
    //             "quantity" => 1,
    //             "price" => $fruit->price,
    //             "image" => $fruit->image,
    //         ];
    //     }

    //     session()->put('cart', $cart);

    //     return redirect()->back()->with(['success' => 'Fruit has been added to the cart', 'totalCartPrice' => $totalCartPrice, 'cart' => $cart]);
    // }

}
