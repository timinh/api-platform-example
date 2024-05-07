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
#[ApiFilter(RestFilter::class, properties: ['name' => 'string', 'status' => 'string', 'species' => 'string', 'type' => 'string', 'gender' => 'string'])]
// DTO for Characters from rickandmortyapi.com
class Character
{
    public int $id;
    public string $name;
    public string $status;
    public string $species;
    public string $type;
    public string $gender;
    public array $origin;
    public array $location;
    public string $image;
    public array $episode;
    public string $url;
    public string $created;

    public function getNameAndOrigin(): string
    {
        return $this->name . ' from ' . $this->origin['name'];
    }
}