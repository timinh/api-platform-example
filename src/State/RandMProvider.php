<?php

namespace App\State;

use ApiPlatform\Metadata\CollectionOperationInterface;
use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProviderInterface;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class RandMProvider implements ProviderInterface
{
    private string $endpoint = "https://rickandmortyapi.com/api/";

    public function __construct(
        private HttpClientInterface $client,
        private SerializerInterface $serializer
    )
    {        
    }

    public function provide(Operation $operation, array $uriVariables = [], array $context = []): object|array|null
    {
        $shortname =\strtolower($operation->getShortName());
        $classname = $operation->getClass();
        if($operation instanceof CollectionOperationInterface) {
            $page = $context['request']->get('page', 1);
            $response = $this->client->request('GET', $this->endpoint . $shortname . '?page=' . $page)->toArray();
            return new RandMPaginator(
                $this->serializer->deserialize(\json_encode($response['results']), $classname. '[]', 'json'),
                20,
                $page,
                $response['info']['count']
            );
        }
        $response = $this->client->request('GET', $this->endpoint . $shortname . '/' . $uriVariables['id'])->toArray();
        return $this->serializer->deserialize(\json_encode($response), $classname, 'json');
    }
}