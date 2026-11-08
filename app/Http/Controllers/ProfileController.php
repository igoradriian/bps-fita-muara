<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
class ProfileController {
 public function index(){return view('pages.profil');}
 public function update(Request $request){
  $data=$request->validate(['name'=>'required|string|max:120','phone'=>'nullable|string|max:30','address'=>'nullable|string|max:255']);
  $request->user()->update($data);return back()->with('success','Profil diperbarui.');
 }
}
