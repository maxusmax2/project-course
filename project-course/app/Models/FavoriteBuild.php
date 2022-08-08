<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Search\Searchable;

class FavoriteBuild extends Model
{
    use HasFactory,Searchable;
    protected $casts = [
        'tags' => 'json',
    ];

    public function toSearchableArray()
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'content' => $this->content
        ];
     }
}
