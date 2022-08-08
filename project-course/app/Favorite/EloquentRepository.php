<?php
namespace App\Favorite;

use App\Models\FavoriteBuild;
use Illuminate\Database\Eloquent\Collection;
class EloquentRepository implements FavoriteRepository
{
    public function search(string $query = ''): Collection
    {
        return FavoriteBuild::query()
            ->where('build_id', 'like', "%{$query}%")
            ->orWhere('user_id', 'like', "%{$query}%")
            ->get();
    }
}
