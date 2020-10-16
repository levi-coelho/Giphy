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
        $filter = [];
        $response = $this->client->get('gifs/search?q=' . $q . '&');
        
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
        
        $filter['pagination'] = $response['pagination'];
        $filter['meta']  = $response['meta']   ;
        
        return $filter;
    }

    public function stickersSearch(string $q): array
    {
        $filter = [];
        $response = $this->client->get('stickers/search?q=' . $q . '&');
        
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

        $filter['pagination'] = $response['pagination'];
        $filter['meta']  = $response['meta']   ;
        
        return $filter;
    }

    public function gifsTrending(): array
    {
        $filter = [];
        $response = $this->client->get('gifs/trending?');
        
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

        $filter['pagination'] = $response['pagination'];
        $filter['meta']  = $response['meta']   ;
        
        return $filter;
    }

    public function stickersTrending(): array
    {
        $filter = [];
        $response = $this->client->get('stickers/trending?');
        
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

        $filter['pagination'] = $response['pagination'];
        $filter['meta']  = $response['meta']   ;
        
        return $filter;
    }
}
