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
#[ApiFilter(RestFilter::class, properties: ['name' => 'string', 'type' => 'string', 'dimension' => 'string'])]
// DTO for Locations from rickandmortyapi.com
class Location
{
    public int $id;
    public string $name;
    public string $type;
    public string $dimension;
    public array $residents;
    public string $url;
    public string $created;
}