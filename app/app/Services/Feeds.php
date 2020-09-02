<?php namespace App\Services;

use Carbon\Carbon;
use Exception;

class Feeds
{
    /**
     * The config.
     *
     * @var array
     */
    // protected $config;

    /**
     * FeedsHelper constructor.
     *
     * @param $config
     */
    public function __construct()
    {
        // $this->config = $config;
    }

    /**
     * @param array $feedUrl RSS URL
     * @param string $name name of the source
     * @param int   $limit    items returned per-feed with multifeeds
     * @return SimpleXMLElement
     */
    public function get($feedUrl = '', $sourceId, $sourceName='')
    {
       
        try {
            $xml = simplexml_load_file($feedUrl);
         

            $items = $xml->xpath("//item");
    
            foreach($items as $item) {
                
                preg_match('/<img(.*?)>/', $item->description, $img);
                $item->description = str_replace($img,'', $item->description);
                $item->image = ($item->children( 'media', true )->group->content != null) ? $item->children( 'media', true )->group->content->attributes()['url'] : '';
                $item->published_ago = Carbon::parse($item->pubDate)->diffForHumans();
                $item->source_id = $sourceId;
                $item->source_name = $sourceName;
            }
        
            return $items;
        }
        catch (Exception $e)
        {
            return [];
        }
    }
}
