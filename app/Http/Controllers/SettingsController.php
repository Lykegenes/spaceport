<?php

namespace Spaceport\Http\Controllers;

class SettingsController extends Controller
{
    public function index()
    {
        return view('settings.index');
    }
}
