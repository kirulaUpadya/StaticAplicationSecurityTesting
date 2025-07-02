<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use App\Models\Product;

class searchController extends Controller
{
    public function search(Request $request){ //search funciton for prodcuts

    $request->validate([
        'name' => 'nullable|string|max:255',
    ]);  //for sanitizing to prevent malicious inputs

    $query = Product::query();

    // Check if there's a search input
    if ($request->filled('name')) {
        $search = trim($request->name);
        $words = explode(' ', $search); //seperate search input in to parts


        $query->where(function($q) use ($words) {  // Match all words in the product name
            foreach ($words as $word) {
                $q->where('name', 'like', '%' . $word . '%');
            }
        });
    }

    $products = $query->orderBy('created_at', 'DESC')->paginate(12); //if more than 12 prodcuts are retrieved they are seperated into pages

    return view('Registered.shop', compact('products')); //redirect to shop page with the relevant products
}


}
