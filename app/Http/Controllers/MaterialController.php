<?php
namespace App\Http\Controllers;
use App\Models\Material;
class MaterialController {
 public function index(){return view('pages.materi',['materials'=>Material::latest()->get(),'completed'=>auth()->user()->belongsToMany(Material::class,'material_user')->pluck('materials.id')->all()]);}
 public function show(Material $material){return view('pages.materi-detail',compact('material'));}
 public function complete(Material $material){auth()->user()->belongsToMany(Material::class,'material_user')->syncWithoutDetaching([$material->id]);return redirect()->route('materi')->with('success','Materi ditandai selesai.');}
}
