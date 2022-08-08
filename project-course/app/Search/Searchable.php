<?php
namespace App\Search;
use Elastic\Elasticsearch\Response\Elasticsearch;

trait Searchable
{
    public static function bootSearchable()
    {
        self::observe(Elasticsearch::class);

    }

    public function getSearchIndex()
    {
        return $this->getTable();
    }

    public function getSearchType()
    {
        return 'doc';
    }

    public function toSearchArray()
    {
        return $this->toArray();
    }
}
