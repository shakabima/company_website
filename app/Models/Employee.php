<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    /**
     * Kolom yang bisa diisi secara massal (mass assignment).
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'position',
        'email',
        'phone',
        'photo',      // untuk menyimpan nama file gambar
        'bio',
    ];

    /**
     * Kolom yang tidak boleh diisi (opsional — jika ada).
     *
     * @var array<int, string>
     */
    // protected $guarded = [];
}