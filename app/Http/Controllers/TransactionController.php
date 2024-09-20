<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function store(Request $request, Product $product)
    {
        $request->validate([
            'type' => 'required|in:in,out',
            'quantity' => 'required|integer|min:1',
        ]);

        if ($request->type === 'out' && $product->stock < $request->quantity) {
            return back()->withErrors('Insufficient stock for the transaction.');
        }

        $product->transactions()->create([
            'type' => $request->type,
            'quantity' => $request->quantity,
            'user_id' => auth()->id(),
        ]);

        if ($request->type === 'in') {
            $product->increment('stock', $request->quantity);
        } else {
            $product->decrement('stock', $request->quantity);
        }

        return redirect()->route('products.show', $product);
    }
}
