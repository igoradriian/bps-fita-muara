<?php
namespace App\Http\Controllers;
use App\Models\{Attendance,TrainingSession};
use Illuminate\Http\Request;
use Illuminate\Database\UniqueConstraintViolationException;
class AttendanceController {
 public function index(){
  $sessions=TrainingSession::whereDate('starts_at',today())->orderBy('starts_at')->get();
  $records=auth()->user()->attendances()->with('trainingSession')->latest()->take(5)->get();
  $attended=auth()->user()->attendances()->whereIn('training_session_id',$sessions->pluck('id'))->pluck('training_session_id')->all();
  return view('pages.absensi',compact('sessions','records','attended'));
 }
 public function store(TrainingSession $session){
  $now=now();
  if($now->lt($session->attendance_opens_at)||$now->gt($session->attendance_closes_at))return back()->withErrors(['attendance'=>'Absensi belum dibuka atau sudah ditutup.']);
  try { Attendance::create(['user_id'=>auth()->id(),'training_session_id'=>$session->id,'checked_in_at'=>$now,'status'=>$now->gt($session->starts_at->copy()->addMinutes(15))?'Terlambat':'Hadir']); }
  catch(UniqueConstraintViolationException $e){return back()->withErrors(['attendance'=>'Anda sudah absen untuk kegiatan ini.']);}
  return back()->with('success','Absensi berhasil dicatat.');
 }
 public function history(Request $request){
  $query=auth()->user()->attendances()->with('trainingSession')->latest();
  if(in_array($request->status,['Hadir','Terlambat','Izin','Tidak Hadir'],true))$query->where('status',$request->status);
  return view('pages.riwayat',['records'=>$query->paginate(10)->withQueryString(),'total'=>auth()->user()->attendances()->count()]);
 }
}
