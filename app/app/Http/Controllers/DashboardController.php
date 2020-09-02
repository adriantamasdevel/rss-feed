<?php 
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Feed;
use App\Services\Feeds as FeedsParser;
use Illuminate\Support\Facades\File;


class DashboardController extends Controller
{
   
    /**
     * Show the feeds in the dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(FeedsParser $feedParser)
    {
        $this->data['title'] = 'Dashboard';

        $feeds = Feed::where('user_id', $this->user()->id)->get();
        $entries = array();

        foreach($feeds as $feed) {
            $entries = array_merge($entries, $feedParser->get($feed->url, $feed->id, $feed->title));
        }

        return view('dashboard.index', compact('entries'));
    }

    /**
     * Show a specific feed.
     *
     * @return \Illuminate\Http\Response
     */
    public function showFeed(FeedsParser $feedParser, $id, $name='')
    {
        $this->data['title'] = 'Dashboard | Show feed';

        $feeds = Feed::where(['user_id'=> $this->user()->id, 'id' => $id])->get();
        $entries = array();

        foreach($feeds as $feed) {
            $entries = $feedParser->get($feed->url, $feed->id, $feed->title);
        }

        return view('dashboard.index', compact('entries'));
    }
}
