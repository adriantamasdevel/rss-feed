<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Services\Feeds;


class FeedsServiceTest extends TestCase
{
    /**
     * @var Feeds
     */
    protected $feedsService;

    function setUp(): void {
        parent::setUp();
        $this->feedsService = app('App\Services\Feeds'); 
    }

    /** @test */
    public function parse()
    {
        $xmlTest =  resource_path('tests/test.xml');
        $entries = $this->feedsService->get($xmlTest, '', '');

        $this->assertEquals($entries[0]->description, 'Content creators say OnlyFans has slashed incomes by placing caps on prices charged on the platform.');
        $this->assertNotEmpty($entries[0]->link, 'https://www.bbc.co.uk/news/business-53979625');
        

        $this->assertNotEmpty($entries[0]->title, 'Title empty');
        $this->assertNotEmpty($entries[0]->link, 'Link empty');
        $this->assertNotEmpty($entries[0]->description, 'Description empty');
    }
}
