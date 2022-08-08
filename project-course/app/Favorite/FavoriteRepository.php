<?php
namespace App\Favorite;
use Illuminate\Database\Eloquent\Collection;
interface FavoriteRepository
{
    public function search(string $query = ''): Collection;
}
