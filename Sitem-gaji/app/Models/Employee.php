<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

     protected $fillable = [
        "photo",
        "alamat",
        "no_hp",
        "gaji_pokok",
        "id_users",
        "id_divisis",
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_users');
    }

    public function divisi()
    {
        return $this->belongsTo(Divisi::class, 'id_divisis');
    }

}
