<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'short_text',
        'text',
        'image_path',
        'price',
        'quantity',
        'is_published',
        'collection_id'
    ];

    public function money(): string
    {
        return number_format($this->price, 2, ',', ' ') . ' руб.';
    }

    public function collection(): BelongsTo
    {
        return $this->belongsTo(Collection::class);
    }

    public function imageUrl() {
        return url('public' . Storage::url($this->image_path));
    }
}
