<?php

namespace App\Filter;

use ApiPlatform\Metadata\FilterInterface;
use Symfony\Component\PropertyInfo\Type;

class RestFilter implements FilterInterface
{
    protected string $type = '';
    protected string $dataType = Type::BUILTIN_TYPE_STRING;
    
    public function __construct(private array $properties = [])
    {
    }

    public function getDescription(string $resourceClass): array
    {
        if (!$this->properties) {
            return [];
        }
        $description = [];
        foreach ($this->properties as $property=> $value) {
            $description["$property"] = [
                'property' => $property,
                'type' => $this->dataType,
                'required' => false,
                'description' => "query de type $this->type",
                'openapi' => [
                    'allowReserved' => false,// if true, query parameters will be not percent-encoded
                    'allowEmptyValue' => true,
                    'explode' => false, // to be true, the type must be Type::BUILTIN_TYPE_ARRAY, ?product=blue,green will be ?product=blue&product=green
                ],
            ];
        }

        return $description;
    }
}