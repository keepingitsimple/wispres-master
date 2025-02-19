<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'url', 'answer_id',
    ];

   public function answer()
   {
       return $this->belongsTo(Answer::class)->withTrashed();
   }
}
