<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ranges extends Model
{
    use HasFactory;
    protected $fillable = ['nom'];

    public function articles()
{
return $this->hasMany(Articles::class);
}
}
