<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use App\Models\Rental;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function main()
    {
        $categories = Category::get(['id', 'name']);
        $items = Item::where('status', 'Видимый')->orderBy('created_at', 'desc')->limit(8)->get();
        $cat_card = Category::orderBy('created_at')->limit(4)->get(['id', 'name', 'image']);
        
        return view('main', [
            'categories' => $categories,
            'items' => $items,
            'cat_card' => $cat_card
        ]);
    }
    
    public function category(Category $category_id)
    {
        $categories = Category::get(['id', 'name']);
        $items = $category_id->items()->where('status', 'Видимый')->orderBy('created_at', 'desc')->get();
        
        return view('category', [
            'categories' => $categories,
            'items' => $items,
            'page' => $category_id
        ]);
    }
    
    public function getSorting($category_id, $sort)
    {
        if ($sort == 'price_asc') {
            $items = Item::where('status', 'Видимый')->when($category_id, function($query, $category_id) {
                $query->where('category_id', $category_id);
            })->orderBy('price')->get();
        } else {
            $items = Item::where('status', 'Видимый')->when($category_id, function($query, $category_id) {
                $query->where('category_id', $category_id);
            })->orderBy($sort, 'desc')->get();
        } 
        
        return view('partials.item_card', [
            'items' => $items,
            'page' => $category_id
        ]);
    }

    public function item(Item $item_id) 
    {
        $categories = Category::get(['id', 'name']);
        $rentals = Rental::where('item_id', $item_id->id)->whereIn('status', ['Принята', 'Оплачена', 'Спорная ситуация'])->orderBy('start')->get(['start', 'end']);
        $count = Rental::where('item_id', $item_id->id)->whereIn('status', ['Принята', 'Оплачена', 'Спорная ситуация'])->count();
        
        return view('item', [
            'categories' => $categories,
            'item' => $item_id,
            'rentals' => $rentals,
            'count' => $count,
        ]);
    }
    
    public function lessor()
    {
        $categories = Category::get(['id', 'name']);
        
        return view('lessor', [
            'categories' => $categories
        ]);
    }

    public function tenant()
    {
        $categories = Category::get(['id', 'name']);
        
        return view('tenant', [
            'categories' => $categories
        ]);
    }
    
    public function renter()
    {
        $categories = Category::get(['id', 'name']);
        
        return view('renter', [
            'categories' => $categories
        ]);
    }
}
