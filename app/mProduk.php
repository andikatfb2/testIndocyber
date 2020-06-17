<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mProduk extends Model
{
    protected $table    = 'tbl_produk';
    protected $fillable = ['nama_produk','image','harga','stok'];
    public $timestamps = false;
}
