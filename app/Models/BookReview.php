<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookReview extends Model
{
    use HasFactory;

    protected $fillable = [
        'book_id',
        'member_id',
        'rating',
        'comment',
    ];

    protected $casts = [
        'rating' => 'integer',
    ];

    /**
     * Accessor: estrellas visuales
     */
    public function getRatingStarsAttribute(): string
    {
        return str_repeat('⭐', $this->rating);
    }

    /**
     * Accessor: ¿reseña positiva?
     */
    public function getIsPositiveAttribute(): bool
    {
        return $this->rating >= 4;
    }

    /**
     * Relación: pertenece a un libro
     */
    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    /**
     * Relación: pertenece a un miembro
     */
    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}
