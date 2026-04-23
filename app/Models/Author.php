<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $fillable= [
        'first_name',
        'last_name', 
        'nationality',
        'birth_date',
        'biography',
    ];

    protected $casts = [ // casts fija como fecha 
        'birth_date' => 'date'
    ];

    protected $appends = ['full_name']; //es media apertura osea se puewde abrir medio archivo

    public function getFulNameAttribute(): string 
    {
        return "{$this->firs_name} {$this->last_name}";  //toda valiable viene adenlante el $
    }
    //aqui vamos a realacionar Author con Book
    //creamos un metodo ***Relación: un autor tiene muchos libros.
    public function books():  \Illuminate\Database\Eloquent\Relations\BelongsToMany 
    { 
        return $this->belongsToMany(Book::class) 
            ->withPivot('role') 
            ->withTimestamps(); 
    } 
   
}
