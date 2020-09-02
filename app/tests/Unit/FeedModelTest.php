<?php

namespace Tests\Unit;

use App\Models\Feed;
use Tests\TestCase;

class FeedsModelTest extends TestCase
{
    
    /**
     * @var FeedsModel
     */
    protected $feedsModel;

    public function setUp(): void 
    {
        parent::setUp();
        $this->feedsModel = app('App\Models\Feed');
    }

    /** @test */
    public function create()
    {

        $feedData = factory(Feed::class)->raw();

        $this->feedsModel->create($feedData);

        $this->assertDatabaseHas('feeds', $feedData);
    }

    /** @test */
    public function remove()
    {
        $feed = factory(Feed::class)->create();
        $this->feedsModel->destroy($feed->id);

        $this->assertDatabaseMissing('feeds', $feed->toArray());
    }

    /** @test */
    public function update()
    {
        $feed = factory(Feed::class)->create();

        $newFeedData = factory(Feed::class)->raw();

        $this->feedsModel->find($feed->id)->update($newFeedData);

        $this->assertDatabaseHas('feeds', $newFeedData);
    }
}
