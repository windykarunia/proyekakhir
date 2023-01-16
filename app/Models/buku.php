<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class buku extends Model
{
    use HasFactory;
    /**
    * The primary key associated with the table.
    *
    * @var string
    * @var bool
    * @var array
    */
    protected $primaryKey = 'id_buku';
    public $incrementing = false;
    protected $fillable=[
        'id_buku',
        'judul_buku',
        'tahun',
        'penulis',
        'stok_buku'
    ];

    public function pinjam() {
        return $this->hasMany(pinjam::class, 'foreign_key');
    }
}
