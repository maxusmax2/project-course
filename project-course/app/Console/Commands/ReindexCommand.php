<?php
namespace App\Console\Commands;

use App\Article;
use App\Models\FavoriteBuild;
use Elastic\Elasticsearch\Client ;

use Illuminate\Console\Command;

class ReindexCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'search:reindex';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Indexes all articles to Elasticsearch';

    /** @var \Elasticsearch\Client */
    private $elasticsearch;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(Client $elasticsearch)
    {
        parent::__construct();

        $this->elasticsearch = $elasticsearch;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        foreach (FavoriteBuild::cursor() as $build)
        {
            $this->elasticsearch->index([
                'index' => $build->getSearchIndex(),
                'type' => $build->getSearchType(),
                'id' => $build->getKey(),
                'body' => $build->toSearchArray(),
            ]);
        }
    }
}
