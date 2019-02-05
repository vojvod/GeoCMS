<?php

namespace App\Http\Controllers;

use App\Setting;

use App\Category;

use App\Map;

use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function index()
    {
        return view('index')
                ->with('title', Setting::first()->site_name)
                ->with('categories', Category::take(5)->get())
                ->with('first_map', Map::orderBy('created_at', 'desc')->first())
                ->with('second_map', Map::orderBy('created_at', 'desc')->skip(1)->take(1)->get()->first())
                ->with('third_map', Map::orderBy('created_at', 'desc')->skip(2)->take(1)->get()->first());
    }
}
