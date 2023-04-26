<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'total',
        'status'
    ];

    // Получение всех продуктов из заказа
    public function products()
    {
        return $this->hasMany(OrderProduct::class);
    }

    // Получение пользователя из заказа
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
