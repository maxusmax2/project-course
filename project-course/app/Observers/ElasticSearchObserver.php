<?php

namespace App\Observers;

use Elastic\Elasticsearch\Client;

class ElasticSearchObserver
{
    private $elasticsearch;

    public function __construct(Client $elasticsearch)
    {
        $this->elasticsearch = $elasticsearch;

    }

    public function save($model)
    {
        $this->elasticsearcgh->index([
            'index' => $model->getSearchIndex(),
            'type' => $model->getSearchType(),
            'id' => $model->getKey(),
            'body'=> $model->toSearchArray(),
        ]);

    }

    public function delete($model)
    {

        $this->elasticsearcgh->delete([
            'index' => $model->getSearchIndex(),
            'type' => $model->getSearchType(),
            'id' => $model->getKey(),
        ]);
    }
}
