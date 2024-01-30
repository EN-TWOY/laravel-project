<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comentario';
    protected $primaryKey = 'comentario_id';
    protected $fillable = [
        'contenido', 
        'fecha_comentario',
        'usuario_id'
    ];
    use HasFactory;

    public function usuario() { 
        return $this->belongsTo(User::class, 'usuario_id', 'usuario_id');
    }
}
