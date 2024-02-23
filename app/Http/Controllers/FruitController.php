<?php

namespace App\Http\Controllers;

use App\Helpers\Upload;
use App\Http\Requests\StoreFruitRequest;
use App\Http\Requests\UpdateFruitRequest;
use App\Models\Fruit;
use Exception;
use Illuminate\Http\Request;
use File;

class FruitController extends Controller
{
    public function index(){
        $sl = !is_null(\request()->page) ? (\request()->page -1 )* 8 : 0;
        $fruits=Fruit::latest()->paginate(8);
        return view('backend.layouts.fruits & vegetables.fruits',compact('fruits','sl'));
    }

    public function create(){
        return view('backend.layouts.fruits & vegetables.fruits');
    }

    public function store(StoreFruitRequest $request)
    {

        try {
            $data= $request->all();
            if($request->image){
                $imageName = '';
                // upload image
                $imageName = Upload::uploadImage($request->image, 'images/fruits');
                $data["image"]=$imageName;
            }
            Fruit::create($data);
            toastr()->success('Employee has been created successfully!', 'Congrats');
            return redirect()->route('fruit_index');
        } catch (Exception $e) {
            toastr()->error('Something went wrong!', 'Alert');
        }
    }

//     public function edit($id)
//     {
//         $fruit = Fruit::find($id);
//         return view('backend.layouts.fruits & vegetables.fruits', compact('fruit'));
//         // return redirect()->route('fruit_index', compact('fruit'));
//         return redirect()->back();
//         // return response()->json(['success' => true, 'url' => url()->previous()]);
//         // Before redirecting, set session data
// // return redirect()->route('fruit_index')->with(['success' => true, 'url' => url()->previous()]);

//     }


    public function update(UpdateFruitRequest $request, $id)
    {
        try{

            $data = $request->except('_token');
            Fruit::where('id', $id)->update($data);
            toastr()->success('Category has been updated successfully!', 'Congrats');
            return redirect()->route('fruit_index');

        }catch(Exception $e){
            toastr()->error('Something went wrong!', 'Alert');
        }
    }


    public function delete($id)
    {
        $fruit = Fruit::find($id);
        $deleteOldImage = 'images/fruits/' . $fruit->image;
        File::delete($deleteOldImage);
        $fruit->delete();
        return redirect()->back();
    }

    // public function addToCart($id){
    //     $fruit=Fruit::find($id);
    //     $cart=session()->get('cart',[]);
    //     if(isset($cart[$id])){
    //         $cart[$id]['quantity']++;
    //     }
    //     else{
    //         $cart[$id]=[
    //             "name"=>$fruit->name,
    //             "quantity"=>1,
    //             "price"=>$fruit->price,
    //             "image"=>$fruit->image,
    //         ];
    //     }
    //     session()->put('cart',$cart);
    //     return redirect()->back()->with('success','Fruit has been already to added the cart');
    // }

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
