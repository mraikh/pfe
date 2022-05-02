<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Formateur;

class AdminController extends Controller
{
    //
    public function index()
{
    return view("admin.index");
}

public function indexAdmin(){
    $formateurs=new Formateur();
    $formateurs = Formateur::all();
    return view("admin.formateur",['formateurs'=>$formateurs]);
}
}
