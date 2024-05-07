<?php

namespace App\ApiResource;

use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\GetCollection;
use App\State\RandMProvider;

#[ApiResource(
    operations: [
        new Get(provider: RandMProvider::class),
        new GetCollection(provider: RandMProvider::class)
    ]
)]
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