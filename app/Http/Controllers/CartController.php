<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\CartItem;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // get /api/cart
    public function index(Request $request)
    {
        // get cart of authenticated user
        $cart = Cart::firstOrCreate(['user_id' => $request->user()->id]);
        // get cart items with product details
        $items = $cart->items()->with('product')->get();
        // sumary total price
        $totalPrice = $items->sum(fn($item) => $item->product->price * $item->quantity);

        return response()->json([
            'items' => $items,
            'total_price' => $totalPrice
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         // validate request
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1'
        ]);
        // get or create cart of authenticated user
        $cart = Cart::firstOrCreate(['user_id' => $request->user()->id]);
        // check if product already in cart
        $item = $cart->items()->where('product_id', $request->product_id)->first();

        if ($item) {
            $item->update([
                'quantity' => $item->quantity + $request->quantity
            ]);
        }
        else {
            //  add new item to cart
            $item = $cart->items()->create($request->only('product_id', 'quantity'));
        }

        return response()->json([
            'message' => 'Product added to cart',
            'cart_item' => $item
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $item_id)
    {
        $cart = Cart::where('user_id', auth()->id())->first();

        if (!$cart) {
            return response()->json(['message' => 'Cart not found'], 404);
        }

        $item = $cart->items()->where('id', $item_id)->first();

        if (!$item) {
            return response()->json(['message' => 'Item not found'], 404);
        }

        $item->update([
            'quantity' => $request->quantity
        ]);

        return response()->json($item);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $item_id)
    {
        $cartItem = CartItem::whereHas('cart', function ($query) use ($request) {
            $query->where('user_id', $request->user()->id);
        })->where('id', $item_id)->first();

        if ($cartItem) {
            $cartItem->delete();
            return response()->json(['message' => 'Item removed from cart'], 200);
        }

        return response()->json(['message' => 'Item not found'], 404);
    }
}
