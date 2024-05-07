<?php

namespace App\ApiResource;

use App\State\RandMProvider;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\GetCollection;


#[ApiResource(
    operations: [
        new Get(provider: RandMProvider::class),
        new GetCollection(provider: RandMProvider::class)
    ]
)]
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