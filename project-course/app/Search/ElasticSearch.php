<?php

use App\Favorite\FavoriteRepository;
use App\Models\FavoriteBuild;
use Elastic\Elasticsearch\Client;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;


class Elasticsearch implements FavoriteRepository
{
    private $elasticsearch;
    private $buildModel;

    public function __construct(Client $elasticsearch)
    {
        $this->elasticsearch = $elasticsearch;
    }

    public function search(string $query = ''):Collection
    {

        return $this->buildcollection([
            $this->searchOnElasticSearch($query)
        ]
        );
    }

    private function searchOnElasticSearch(string $query = '')
    {
        $model = new FavoriteBuild;
        $items = $this->elasticsearch->search([
            'index' => $model->getSearchIndex(),
            'type' => $model->getSearchType(),
            'body'=>[
                'size'=>1000,
                'query'=>[
                    'multi_match'=>[
                        'fields'=>[ 'body', 'tags'],
                        'query' => $query,

                    ],
                ],
            ],
        ]);

        return $items;
    }

    private function buildCollection(array $items){
        $ids = Arr::pluck($items['hits']['hits'], '_id');
        return FavoriteBuild::findMany($ids)
            ->sortBy(function ($build) use ($ids) {
                return array_search($build->getKey(), $ids);
            });
    }

}
