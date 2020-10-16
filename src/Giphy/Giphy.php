<?php

namespace Giphy;

class Giphy
{
    private $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function gifsSearch(string $q): array
    {
        $response = $this->client->get('gifs/search?q=' . $q . '&');
        $filter = $this->transform($response);
        
        return $filter;
    }

    public function stickersSearch(string $q): array
    {
        $response = $this->client->get('stickers/search?q=' . $q . '&');
        $filter = $this->transform($response);
        
        return $filter;
    }

    public function gifsTrending(): array
    {
        $response = $this->client->get('gifs/trending?');
        $filter = $this->transform($response);
        
        return $filter;
    }

    public function stickersTrending(): array
    {
        $response = $this->client->get('stickers/trending?');
        $filter = $this->transform($response);

        return $filter;
    }

    private function transform(array $response): array
    {
        $filter = [];
        
        foreach ($response['data'] as $item) {
            $filter['data'][] = [
                'type'=> $item['type'],
                'id'=> $item['id'],
                'slug'=> $item['slug'],
                'url'=> $item['url'],
                'bitly_url'=> $item['bitly_url'],
                'embed_url'=> $item['embed_url'],
                'title'=> $item['title'],
            ];
        }

        return $filter;
    }
}
