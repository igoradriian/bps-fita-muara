<?php
namespace App\Http\Controllers;
use App\Models\{Attendance,TrainingSession,User};
use Illuminate\Http\Request;
class AdminController {
 public function index(){return view('pages.admin',['sessions'=>TrainingSession::latest('starts_at')->get(),'records'=>Attendance::with(['user','trainingSession'])->latest()->take(30)->get(),'participants'=>User::where('is_admin',false)->count()]);}
 public function storeSession(Request $request){
  $data=$request->validate(['title'=>'required|string|max:200','description'=>'nullable|string','location'=>'nullable|string|max:150','starts_at'=>'required|date','ends_at'=>'required|date|after:starts_at','attendance_opens_at'=>'required|date|before_or_equal:ends_at','attendance_closes_at'=>'required|date|after:attendance_opens_at']);
  TrainingSession::create($data);return back()->with('success','Kegiatan berhasil ditambahkan.');
 }
 public function export(){
  $records=Attendance::with(['user','trainingSession'])->latest()->get();
  return response()->streamDownload(function()use($records){$out=fopen('php://output','w');fputcsv($out,['Peserta','Email','Kegiatan','Waktu','Status']);foreach($records as $r)fputcsv($out,[$r->user->name,$r->user->email,$r->trainingSession->title,$r->checked_in_at?->format('Y-m-d H:i:s'),$r->status]);fclose($out);},'laporan-absensi.csv',['Content-Type'=>'text/csv; charset=UTF-8']);
 }
}
