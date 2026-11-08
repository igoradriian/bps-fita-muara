<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Attendance extends Model {
 protected $fillable=['user_id','training_session_id','checked_in_at','status'];
 protected function casts(): array {return ['checked_in_at'=>'datetime'];}
 public function user(){return $this->belongsTo(User::class);}
 public function trainingSession(){return $this->belongsTo(TrainingSession::class);}
}
