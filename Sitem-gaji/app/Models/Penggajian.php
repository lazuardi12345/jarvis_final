<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penggajian extends Model
{
    use HasFactory;
    protected $fillable = [
        "potongan",
        "id_employees",
        "id_tunjangans",
        "id_divisis",
    ],
    $table = "penggajians";

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'id_employees');
    }

    public function divisi()
    {
        return $this->belongsTo(Divisi::class, 'id_divisis');
    }

    public function tunjangan()
    {
        return $this->belongsTo(Tunjangan::class, 'id_tunjangans');
    }
}