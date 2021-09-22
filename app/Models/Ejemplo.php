<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ejemplo extends Model
{
    protected $table = 'ejemplo';

    protected $fillable = [
        'title',
        'slug',
        'perex',
        'published_at',
        'enabled',
    
    ];
    
    
    protected $dates = [
        'published_at',
        'created_at',
        'updated_at',
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/ejemplos/'.$this->getKey());
    }
}
