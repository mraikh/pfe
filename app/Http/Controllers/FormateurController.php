<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormateurController extends Controller
{
    public function index()
{
    return view("Formateur.index");
}
public function profile()
{
    return view("Formateur.profile");
}
}
