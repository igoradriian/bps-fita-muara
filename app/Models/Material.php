<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Material extends Model {
 protected $fillable=['title','description','category','content','duration_minutes','image_url'];
 public function completedUsers(){return $this->belongsToMany(User::class,'material_user')->withTimestamps();}
}
