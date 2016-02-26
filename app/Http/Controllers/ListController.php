<?php

namespace Spaceport\Http\Controllers;

use Illuminate\Http\Request;

class ListController extends Controller
{
    public function index()
    {
        return view('lists.index');
    }

    public function create(Request $request)
    {
        return view('lists.create');
    }

    public function store(Request $request)
    {
        //
    }
}
