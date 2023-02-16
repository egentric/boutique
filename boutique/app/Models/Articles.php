<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    use HasFactory;
    protected $fillable = ['nom', 'description', 'price', 'promoPrice', 'size', 'brand', 'picture', 'range_id'];

    public function range()
{
return $this->belongsTo(Ranges::class);
}

public function sizes()
    {
        return $this->belongsToMany('App\Models\Sizes');
    }

    public function promos()
    {
        return $this->belongsToMany('App\Models\Promos');
    }

}
