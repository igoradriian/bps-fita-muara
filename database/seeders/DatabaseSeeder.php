<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\{User,Material,TrainingSession};
class DatabaseSeeder extends Seeder {
 public function run():void{
  User::firstOrCreate(['email'=>'admin@bps-demo.test'],['name'=>'Admin LMS BPS','username'=>'adminbps','password'=>'ChangeMe123!','is_admin'=>true]);
  User::firstOrCreate(['email'=>'peserta@bps-demo.test'],['name'=>'Fita Febriani','username'=>'fita','password'=>'ChangeMe123!','is_admin'=>false]);
  foreach([['Pengenalan BPS','Mengenal tugas, fungsi, dan peran Badan Pusat Statistik.','Dasar BPS'],['Konsep Statistik Dasar','Memahami data, variabel, populasi dan sampel.','Pengolahan Data'],['Penggunaan Microsoft Excel','Mengolah data menggunakan spreadsheet.','Aplikasi Kerja']] as [$title,$desc,$category])Material::firstOrCreate(['title'=>$title],['description'=>$desc,'category'=>$category,'content'=>'Materi pembelajaran '.$title.'. Silakan kembangkan isi pembelajaran pada halaman ini.','duration_minutes'=>45]);
  TrainingSession::firstOrCreate(['title'=>'Orientasi dan Pengenalan Program Magang','starts_at'=>now()->startOfDay()->addHours(8)],['description'=>'Orientasi peserta LMS BPS','location'=>'BPS Kabupaten Muara Enim','ends_at'=>now()->startOfDay()->addHours(12),'attendance_opens_at'=>now()->startOfDay()->addHours(7),'attendance_closes_at'=>now()->startOfDay()->addHours(12)]);
 }
}
