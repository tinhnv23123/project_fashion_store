<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', // Thêm 'user_id' vào danh sách các cột cho phép gán dữ liệu từ form
        'product_id',
        'quantity',
    ];
}
