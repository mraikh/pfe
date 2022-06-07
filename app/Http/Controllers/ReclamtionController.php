<?php

namespace App\Http\Controllers;

use Illuminate\support\Facades\Auth;
use App\Models\reclamtion;
use Illuminate\Http\Request;

class ReclamtionController extends Controller
{
    //////////////formateur
    public function create(){

        return view('reclamtion.create');
    }
    public function index(){
        $recls=reclamtion::where('user_id',Auth::user()->id)->get();
        return view('reclamtion.index',['reclamations'=>$recls]);
    }
    public function store(Request $request){
        //dd($request);
              $reclamtion =new reclamtion();
              $reclamtion->user_id=Auth::user()->id;
              $reclamtion->sujet=$request->input('sujet');
              $reclamtion->save();
             session()->flash('success',' reclamtion is registered!!!!');
            return redirect('formateur/reclamation');}
            public function destroy(Request $request,$id){
                $reclamation=reclamtion::find($id);
                $reclamation->delete();
               return redirect('formateur/reclamation');}
               public function edit($id){
                $reclamtion=reclamtion::find($id);
                return view('reclamtion.edite',['reclamtion'=> $reclamtion]);

            }
            public function update(Request $request,$id){
               // dd($request);
                $reclamtion=reclamtion::find($id);
                      $reclamtion->sujet=$request->input('sujet');
                      $reclamtion->save();
                     session()->flash('success',' reclamtion is modify!!!!');
                    return redirect('formateur/reclamation');}
                        ////// apprenant
public function createapprenant(){

    return view('reclamtion.apprenant.create');
}
public function indexapprenant(){
    $recls=reclamtion::where('user_id',Auth::user()->id)->get();
    return view('reclamtion.apprenant.index',['reclamations'=>$recls]);
}
public function storeapprenant(Request $request){
    //dd($request);
          $reclamtion =new reclamtion();
          $reclamtion->user_id=Auth::user()->id;
          $reclamtion->sujet=$request->input('sujet');
          $reclamtion->save();
         session()->flash('success','reclamtion is saved!!!!');
        return redirect('apprenant/reclamation');}

        public function destroyapprenant(Request $request,$id){
            $reclamation=reclamtion::find($id);
            $reclamation->delete();
           return redirect('apprenant/reclamation');}

           public function editapprenant($id){
            $reclamtion=reclamtion::find($id);
            return view('reclamtion.apprenant.edite',['reclamtion'=> $reclamtion]);}
        public function updateapprenant(Request $request){
           // dd($request);
            $reclamtion=reclamtion::find($request->input('id'));
                  $reclamtion->sujet=$request->input('sujet');
                  $reclamtion->save();
                 session()->flash('success',' reclamtion is modify!!!!');
                return redirect('apprenant/reclamation');}
                //////////////////////ADMIN
                public function indexAdmin(){
                    $recls=reclamtion::all();
                    return view('reclamtion.admin.index',['reclamations'=>$recls]);
                }
                public function destroyadmin(Request $request){
                    $reclamation=reclamtion::find($request->input('id'));
                    $reclamation->delete();
                   return redirect('admin/reclamation');}
                   public function editadmin($id){
                    $reclamtion=reclamtion::find($id);
                    return view('reclamtion.admin.edite',['reclamtion'=> $reclamtion]);}
                public function updateadmin(Request $request){
                   // dd($request);
                    $reclamtion=reclamtion::find($request->input('id'));
                          $reclamtion->rep_reclamation=$request->input('rep_reclamation');
                          $reclamtion->save();
                         session()->flash('success','reply is registered!!!!');
                        return redirect('admin/reclamation');}

            }
