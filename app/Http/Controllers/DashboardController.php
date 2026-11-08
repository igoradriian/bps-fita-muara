<?php
namespace App\Http\Controllers;
use App\Models\{Attendance,TrainingSession,Material};
class DashboardController {
 public function index(){
  $records=auth()->user()->attendances()->with('trainingSession')->latest()->take(5)->get();
  $sessions=TrainingSession::orderBy('starts_at')->where('ends_at','>=',now()->startOfDay())->take(4)->get();
  $total=auth()->user()->attendances()->count();
  return view('pages.dashboard',compact('records','sessions','total'));
 }
}
