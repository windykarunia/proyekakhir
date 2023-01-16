<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pinjam extends Model
{
    use HasFactory;
    /**
    * The primary key associated with the table.
    *
    * @var string
    * @var bool
    * @var array
    */
    protected $fillable=[
        'id',
        'id_buku',
        'id_member',
        'judul_buku',
        'nama_member',
        'tanggal_peminjaman',
        'tanggal_pengembalian',
        'jenis',
    ];
}
