<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public const UNPAID = 'unpaid';
    public const PAID = 'paid';
    // constant adalah value variable yang tidak dapat dirubah rubah
    use HasFactory;
     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'total',
        'status'
    ];
    // model diatas merupakan representasi dari database

    public function user(){
        return $this->belongsTo(User::class);
    }
    // sintaks diatas public function user > dimana users adalah representasi dari model users database
    // belongsTo > berdasarkan relasi ke tabel user dengan representasi model User::class
    // satu Order memiliki satu user

    public function products(){
        return $this->belongsToMany(Product::class);
    }
}
