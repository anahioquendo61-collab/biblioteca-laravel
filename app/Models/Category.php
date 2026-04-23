<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Models\Book;
class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 
        'slug', //hace q las palabras se unan q contiene el name
        'description',
        'color', 
    ];


    protected static function booted()
    {
        parent::boot();

        static::creating(function ($category) {
            if (empty($category->slug)) {
                $category->slug = \Illuminate\Support\Str::slug($category->name);
            }
        });
    }
    
   //Relación: una categoría tiene muchos libros.
  //metodo con book ya q eso lo llama, ademas tiene muchos libros asi q por eso M
 
    public function books() //: \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Book::class);
    }
}
