<?php

namespace App\Http\Controllers;

use App\Models\Fruit;
use Illuminate\Http\Request;

class CartController extends Controller
{
    // CartController.php

public function showCart()
{
    // Retrieve cart items from session or database
    $cartItems = session('cart', []);

    return view('cart.show', ['cartItems' => $cartItems]);
}

// public function addToCart(Fruit $product)
// {
//     // Retrieve cart items from session or database
//     $cartItems = session('cart', []);

//     // Add the product to the cart
//     $cartItems[$product->id] = [
//         'id' => $product->id,
//         'name' => $product->name,
//         'price' => $product->price,
//         // Add other relevant fields
//     ];

//     // Store the updated cart in the session
//     session(['cart' => $cartItems]);

//     return redirect()->route('cart.show');
// }

public function removeFromCart(Fruit $product)
{
    // Retrieve cart items from session or database
    $cartItems = session('cart', []);

    // Remove the product from the cart
    unset($cartItems[$product->id]);

    // Store the updated cart in the session
    session(['cart' => $cartItems]);

    return redirect()->route('cart.show');
}

// CartController.php

public function addToCart(Fruit $product)
{
    // Retrieve cart items from session
    $cartItems = session('cart', []);

    // Add the product to the cart
    $cartItems[$product->id] = [
        'id' => $product->id,
        'name' => $product->name,
        'price' => $product->price,
        // Add other relevant fields
    ];

    // Store the updated cart in the session
    session(['cart' => $cartItems]);

    // You can return a response if needed
    return response()->json(['message' => 'Product added to cart']);
    // Debugging statements
    \Log::info('Adding product to cart: ' . $product->name);
    \Log::info('CSRF Token: ' . request()->header('X-CSRF-TOKEN'));
}


}
