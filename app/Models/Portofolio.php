<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Portofolio extends Model
{
    use SoftDeletes;

    protected $table = 'portofolios'; // Pastikan nama tabel benar

    protected $fillable = [
        'title',
        'description',
        'image',
        'client',
        'category',
    ];

    protected $dates = ['deleted_at'];

    public function employee()
{
    return $this->belongsTo(\App\Models\Employee::class);
}

public function portofolios()
{
    return $this->hasMany(\App\Models\Portofolio::class);
}
}

