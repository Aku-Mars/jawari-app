<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Kesenian extends Model
{
    use HasFactory;

    protected $table = 'kesenian';

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'judul',
        'sub_judul',
        'views',
        'deskripsi',
        'banner_image',
        'link_youtube',
        'file_path',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'views' => 'integer',
    ];

    /**
     * User Relation.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}


