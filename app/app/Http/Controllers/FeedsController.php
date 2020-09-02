<?php

namespace App\Http\Controllers;

use App\Models\Feed;
use App\Http\Requests\FeedStoreRequest;
use App\Http\Controllers\Controller;





class FeedsController extends Controller
{

   
    /**
     * Display a listing of all the feed entries.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
 
        $feeds = Feed::orderBy('created_at', 'DESC')->where('user_id', $this->user()->id)->get();

        return view('feeds.index', compact('feeds'));
    }

    /**
     * Show the form for creating a new feed.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('feeds.add_form');
    }

    /**
     * Store a newly created feed in db.
     *
     * @param FeedStoreRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(FeedStoreRequest $request)
    {
        // Retrieve the validated input data...
        $validated = $request->validated();
        $validated['user_id'] = $this->user()->id;
        $feed = new Feed();
        $feed->create($validated);

        return redirect()->route('feeds')->with(['message' => 'Record created']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Feed $feed
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $feed = Feed::where('user_id', $this->user()->id)->find($id);
        return view('feeds.edit_form', compact('feed'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param FeedStoreRequest $request
     * @param Feed $feed
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(FeedStoreRequest $request, $id)
    {

        // Retrieve the validated input data...
        $validated = $request->validated();
       
        $feed = Feed::where('user_id', $this->user()->id)->find($id);
        $feed->update($validated);

        return redirect()->route('feeds.edit', $id)->with(['message' => 'Record updated']);
    
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Feed $feed
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $feed = Feed::where('user_id', $this->user()->id)->find($id);
        $feed->delete();

        return redirect()->route('feeds')->with(['message' => 'Record deleted']);
    }
}