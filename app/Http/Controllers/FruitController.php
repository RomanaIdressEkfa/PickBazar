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

    public function edit($id)
    {
        $fruit = Fruit::find($id);
        return view('backend.layouts.Employees.edit', compact('fruit'));
    }


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
}
