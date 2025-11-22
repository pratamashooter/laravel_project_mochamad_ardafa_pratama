<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        "kategori_id",
        "nama",
        "deskripsi",
        "harga",
        "stok",
        "foto",
    ];
}
