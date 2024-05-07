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