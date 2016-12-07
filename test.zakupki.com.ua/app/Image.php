<?php


namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Routing\Url;

class Image extends Model
{
     protected $table = 'image';

     public function imageable()
     {
          return $this->morphTo();
     }

     public function get_path()
     {
      	return url('../public/images\/').basename($this->path);
     }

     public function get_title()
     {
      	return $this->title;
     }

}

