<?php

namespace App;
//use App\Msede;
use Illuminate\Database\Eloquent\Model;

class Mservicio extends Model
{
    protected $fillable =['nombre','precio','duracion','descripcion','msedes_id','imagen'];

   public function msedes(){
      return $this->belongsTo('App\Msede');
    }
}
