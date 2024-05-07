<?php

namespace App\ApiResource;

use App\Filter\RestFilter;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\ApiFilter;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\GetCollection;
use App\State\RickAndMorty\RickAndMortyRestProvider;


#[ApiResource(
    operations: [
        new Get(provider: RickAndMortyRestProvider::class),
        new GetCollection(provider: RickAndMortyRestProvider::class)
    ]
)]
#[ApiFilter(RestFilter::class, properties: ['name' => 'string', 'episode' => 'string'])]
// DTO for Episodes from rickandmortyapi.com
class Episode
{
    public int $id;
    public string $name;
    public string $air_date;
    public string $episode;
    public array $characters;
    public string $url;
    public string $created;
}