<?php

namespace Endo\ApiBundle\Tests\Controller;

/**
 * Class ArtistControllerTest
 * @package Endo\ApiBundle\Tests\Controller
 */
class ArtistControllerTest extends AbstractControllerTest
{

    /**
     * {@inheritdoc}
     */
    protected function setUpTest()
    {

    }

    /**
     * ArtistApiController:cgetAction test
     */
    public function testCGetArtists()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', $this->routerGenerateUrl('get_artists'));

        $this->standardResponseTest($client->getResponse());
    }

    /**
     * ArtistApiController:getAction test
     */
    public function testGetArtistNotFound()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', $this->routerGenerateUrl('get_artist', ['slug' => 'test-artist',]));

        $this->assertEquals(404, $client->getResponse()->getStatusCode());
        $this->assertEquals('application/json', $client->getResponse()->headers->get('Content-Type'));
        $this->assertJson($client->getResponse()->getContent());
    }
}
