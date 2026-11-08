<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class TrainingSession extends Model {
 protected $fillable=['title','description','location','starts_at','ends_at','attendance_opens_at','attendance_closes_at'];
 protected function casts(): array {return ['starts_at'=>'datetime','ends_at'=>'datetime','attendance_opens_at'=>'datetime','attendance_closes_at'=>'datetime'];}
 public function attendances(){return $this->hasMany(Attendance::class);}
}
