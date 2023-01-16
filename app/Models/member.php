<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class member extends Model
{
    use HasFactory;
    /**
    * The primary key associated with the table.
    *
    * @var string
    * @var bool
    * @var array
    */
    protected $primaryKey = 'nama';
    public $incrementing = false;
    protected $fillable=[
        'ktp',
        'nama',
        'alamat',
        'umur',
        'jenis_kelamin',
        'sekolah/instansi',
    ];

    public function pinjam() {
        return $this->hasMany(pinjam::class, 'foreign_key');
    }
}
