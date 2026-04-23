<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Book;
use App\Models\Member;
use App\Models\User;

class Loan extends Model
{
    use HasFactory;

    protected $fillable = [
        'book_id',
        'member_id',
        'loaned_by',
        'loan_date',
        'due_date',
        'returned_date',
        'status',
        'notes',
    ];

    protected $casts = [
        'loan_date'     => 'date',
        'due_date'      => 'date',
        'returned_date' => 'date',
    ];

    /**
     * Boot: mantiene el estado automáticamente
     */
    protected static function boot()
    {
        parent::boot();

        static::saving(function ($loan) {
            if ($loan->returned_date !== null) {
                $loan->status = 'returned';
            } elseif ($loan->due_date && $loan->due_date->lt(now())) {
                $loan->status = 'overdue';
            } else {
                $loan->status = 'active';
            }
        });
    }

    /**
     * Accessor: ¿el préstamo está vencido?
     */
    public function getIsOverdueAttribute(): bool
    {
        return $this->returned_date === null
            && $this->due_date->lt(now());
    }

    /**
     * Accessor: días restantes (negativo si vencido)
     */
    public function getDaysRemainingAttribute(): int
    {
        if ($this->returned_date !== null) {
            return 0;
        }

        return (int) $this->due_date->diffInDays(now(), false);
    }

    /**
     * Método: marcar como devuelto
     */
    public function markAsReturned(): void
    {
        $this->update([
            'returned_date' => now(),
            'status' => 'returned',
        ]);

        // Aumentar copias disponibles del libro
        if ($this->book) {
            $this->book->incrementCopies();
        }
    }

    /**
     * Relación: pertenece a un miembro
     */
    public function member(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Member::class);
    }

    /**
     * Relación: bibliotecario que realizó el préstamo
     */
    public function librarian(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'loaned_by');
    }

    /**
     * Relación: pertenece a un libro
     */
    public function book(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Book::class);
    }
    
}
