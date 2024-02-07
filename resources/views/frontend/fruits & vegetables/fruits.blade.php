@extends('frontend.master')

@section('product_content')
    <div class="grid grid-cols-4 gap-4">
        @foreach ($fruits as $fruit)
            <div class="w-80 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <a href="#">
                    <img style="width:200px;" src="{{ asset('images/fruits/'.$fruit->image) }}" alt="">
                </a>
                <div class="p-5">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $fruit->name }}</h5>
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $fruit->price }}</h5>
                    <button type="button" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm w-full px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Add to Cart</button>
                </div>
            </div>
        @endforeach
    </div>
@endsection


