@extends('frontend.master')

@section('product_content')
    <div class="grid grid-cols-4 gap-4">
        @foreach ($fruits as $fruit)
            <div class="w-80 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <a href="#">
                    <img style="width:200px;" src="{{ asset('images/fruits/'.$fruit->image) }}" alt="">
                </a>
                <div class="p-5">
                    <h4 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $fruit->name }}</h4>
                    <h4 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $fruit->price }}</h4>
                    <a href="{{route('add_To_Cart',$fruit->id)}}" type="button" class=" inline-flex w-full justify-center focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Add to Cart</a>
                        {{-- <button class="add-to-cart-btn" data-product-id="{{ $product->id }}">Add to Cart</button> --}}
                </div>
            </div>
        @endforeach
    </div>

    {{-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.add-to-cart-btn').on('click', function() {
                var productId = $(this).data('product-id');

                // Send an AJAX request to add the product to the cart
                $.ajax({
                    type: 'POST',
                    url: '/cart/add/' + productId,
                    data: {
                        '_token': '{{ csrf_token() }}',
                    },
                    success: function(response) {
                        // Update the cart count or display a success message
                        alert('Product added to cart!');
                    },
                    error: function(error) {
                        console.error('Error adding product to cart:', error);
                    }
                });
            });
        });
    </script> --}}

@endsection
