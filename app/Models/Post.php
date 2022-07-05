<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    use Sluggable;

    public function sluggable():array
    {
        return [
            'slug' => [
                'source' => 'title',
                'onUpdate' => true
            ]
        ];
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function getGetExcerptAttribute()
    {
        return substr($this->body, 0, 140);
    }

    protected $fillable = [
        'title', 'body', 'user_id',
    ];

    //para traer la imagen del storage, necesario ingresar el comando 
    //php artisan storage:link para trar el storage privado al publico
    public function getGetImagenAttribute(){
        if($this->image)
        return url("storage/$this->image");
    }
}
