<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Category;
use App\Models\User;
use App\Models\Item;
use App\Models\Rental;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{

    public function logout()
    {
        Auth::logout();
        return redirect()->route('user_capabilities.index');
    }

    public function register(Request $r)
    {
        $validator = Validator::make($r->all(), [
            'fio' => 'required|string',
            'email' => 'required|email:rfc:dns|unique:App\Models\User,email',
            'phone_number' => 'required|string',
            'password' => 'required|string|confirmed',
            'password_confirmation' => 'required|string'
        ]);

        if($validator->fails()) return response()->json($validator->errors(), 400);
// ->back()
        $user = User::create([
            'fio' => $r->fio,
            'email' => $r->email,
            'phone_number' => $r->phone_number,
            'password' => bcrypt($r->password),
        ]);

        if($user) return response()->json(['status' => 'success', 'redirect' => route('user_capabilities.index')]);
    }

    public function login(Request $r)
    {
        $validator = Validator::make($r->all(), [
            'email' => 'required|email:rfc:dns',
            'password' => 'required|string',
        ]);

        if($validator->fails()) return response()->json($validator->errors(), 400);

        if(Auth::attempt(['email' => $r->email, 'password' => $r->password])) {
            return response()->json(['status' => 'success', 'redirect' => route('user_capabilities.index')]);
        }

        return response()->json(['email' => '', 'password' => 'Невеный логин или пароль'], 400);
    }

    public function rental(Item $item, Request $r)
    {

        $validator = Validator::make($r->all(), [
            'date1' => 'required|date_format:Y-m-d',
            'date2' => 'required|date_format:Y-m-d'
        ]);

        // $date1 = Carbon::createFromFormat('Y-m-d', $r->date1);
        // $date2 = Carbon::createFromFormat('Y-m-d', $r->date2);
        // $diff_days = $date2->diffInDays($date1);
        // print_r($diff_days);

        if($validator->fails()) return response()->json($validator->errors(), 400);

        $rental = Rental::create( [
            'item_id' => $item->id,
            'renter_id' => Auth::user()->id,
            'start' => $r->date1,
            'end' => $r->date2,
            'price' => $item->price,
        ]);

        if($rental) return response()->json(['status' => 'success', 'redirect' => route('user_capabilities.item')]);
    }

    public function create_ad(Request $r)
    {
    //     $validator = Validator::make($r->all(), [
    //         'name' => 'required|string',
    //         'cat' => 'required',
    //         'price' => 'required|decimal:0',
    //         'deposit' => 'required|decimal:0',
    //         'city' => 'required|string',
    //         'desc' => 'required|string',
    //         'img' => 'file|image',
    //     ]);

    //     if($validator->fails()) {
    //         return response()->json($validator->errors(), 400);
    //     }

        $photo = Storage::put('public/items', $r->img);

        Item::create([
            'name' => $r->name,
            'category_id' => $r->cat,
            'price' => $r->price,
            'deposit' => $r->deposit,
            'city' => $r->city,
            'description' => $r->desc,
            'image' => Storage::url($photo),
            'lessor_id' => Auth::user()->id,
        ]);

        // return response()->json(['success' => 'success'], 200);

        return redirect()->back();
    }

    public function profile() 
    {
        $categories = Category::get(['id', 'name']);
        $user = Auth::user();
        $items = Item::where('lessor_id', Auth::user()->id)->orderBy('created_at')->get();
        $count = Item::where('lessor_id', Auth::user()->id)->count();

        return view('personal account.profile', [
            'categories' => $categories,
            'user' => $user,
            'items' => $items,
            'count' => $count
        ]);
    }

    public function deleteItem( $id) {
        Item::where('id', $id)->delete();
        return redirect()->back();
    }

    public function changeStatus($id) {

        $item =Item::find($id);

        if ($item->status == 'Видимый') {
            $item->status = 'Невидимый';
        } else {
            $item->status = 'Видимый';
        }

        $item->save();
        return redirect()->back();
    }
    
    public function list_of_tenants() 
    {
        // $item = Item::where('lessor_id', Auth::user()->id)
        // ->get('id');
        $user = Auth::user();
        $items = Item::where('lessor_id', Auth::user()->id)->orderBy('created_at')->get();
        $categories = Category::get(['id', 'name']);
        
        // $rentals = Rental::select('rentals.id as id', 'rentals.price as price', 'items.image as img', 'items.name as name', 'users.fio as user', 'users.phone_number as phone', 'rentals.start as start', 'rentals.end as end', 'rentals.status as status')
        // ->join('items', 'items.id', 'rentals.item_id')
        // ->join('users', 'users.id', 'rentals.renter_id')
        // ->where('rentals.item_id', '=', $item)
        // ->where('rentals.status', ['Новая', 'Принята', 'Оплачена'])
        // ->get();
        
        return view('personal account.list_of_tenants', [
            'user' => $user,
            'items' => $items,
            // 'rentals' => $rentals,
            'categories' => $categories,
            // 'item' => $item
        ]);
    }

    public function my_rent() 
    {
        $categories = Category::get(['id', 'name']);
        $user = Auth::user();

        $rentals = Rental::select('rentals.id as id', 'rentals.price as price', 'items.image as img', 'items.name as name', 'items.city as city', 'users.fio as user', 'users.phone_number as phone', 'rentals.start as start', 'rentals.end as end', 'rentals.status as status', 'items.deposit as deposit')
        ->join('items', 'items.id', 'rentals.item_id')
        ->join('users', 'users.id', 'rentals.renter_id')
        ->where('rentals.renter_id', Auth::user()->id)
        ->where('rentals.status', ['Новая', 'Принята', 'Оплачена'])
        ->get();
        
        return view('personal account.my_rent', [
            'user' => $user,
            'rentals' => $rentals,
            'categories' => $categories
        ]);
    }










    public function active_rental() 
    {
        $categories = Category::get(['id', 'name']);
        $user = Auth::user();
        return view('personal account.active_rental', [
            'categories' => $categories,
            'user' => $user,
        ]);
    }

    public function сompleted_lease() 
    {
        $categories = Category::get(['id', 'name']);
        
        return view('personal account.сompleted_lease', [
            'categories' => $categories
        ]);
    }

    public function profile_management() 
    {
        $categories = Category::get(['id', 'name']);
        $user = Auth::user();
        $card = Card::where('user', Auth::user()->id)->get('card_number');

        return view('personal account.profile_management', [
            'categories' => $categories,
            'user' => $user,
            'card' => $card
        ]);
    }
}