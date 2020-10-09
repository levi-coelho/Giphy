<?php

namespace Giphy;

class Giphy {
    private $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function gifSearch(string $q)
    {
        return $this->client->get('gifs/search?q=' . $q);
    }

    public function stickersSearch(string $q)
    {
        return  $this->client->get('stickers/search?q=' . $q);
    }
}