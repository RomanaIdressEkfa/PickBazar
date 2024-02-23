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


    public function updateForCart(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart successfully updated!');
        }
    }

    public function removeFromCart(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product successfully removed!');
        }
    }

}
