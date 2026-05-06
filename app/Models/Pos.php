<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pos extends Model
{
    protected $table = 'pos';
    protected $fillable = ['materi_id','nama_pos'];

    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}