<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        $n_restaurant = Restaurant::where('user_id', Auth::id())->count();

        return view('admin.home', compact('n_restaurant'));
    }

}
