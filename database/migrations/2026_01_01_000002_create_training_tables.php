<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {public function up():void{
 Schema::create('training_sessions',function(Blueprint $t){$t->id();$t->string('title');$t->text('description')->nullable();$t->string('location')->nullable();$t->dateTime('starts_at');$t->dateTime('ends_at');$t->dateTime('attendance_opens_at');$t->dateTime('attendance_closes_at');$t->timestamps();});
 Schema::create('attendances',function(Blueprint $t){$t->id();$t->foreignId('user_id')->constrained()->cascadeOnDelete();$t->foreignId('training_session_id')->constrained()->cascadeOnDelete();$t->dateTime('checked_in_at');$t->string('status');$t->timestamps();$t->unique(['user_id','training_session_id']);});
 Schema::create('materials',function(Blueprint $t){$t->id();$t->string('title');$t->text('description')->nullable();$t->string('category')->nullable();$t->longText('content')->nullable();$t->unsignedInteger('duration_minutes')->default(45);$t->string('image_url')->nullable();$t->timestamps();});
 Schema::create('material_user',function(Blueprint $t){$t->id();$t->foreignId('user_id')->constrained()->cascadeOnDelete();$t->foreignId('material_id')->constrained()->cascadeOnDelete();$t->timestamps();$t->unique(['user_id','material_id']);});
}public function down():void{Schema::dropIfExists('material_user');Schema::dropIfExists('materials');Schema::dropIfExists('attendances');Schema::dropIfExists('training_sessions');}};
