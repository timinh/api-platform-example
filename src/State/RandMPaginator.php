<?php

namespace App\State;

use ApiPlatform\State\Pagination\PaginatorInterface;

class RandMPaginator implements \IteratorAggregate, PaginatorInterface
{
    public function __construct(
        private readonly array $documents,
        private readonly int $limit,
        private readonly int $offset,
        private readonly int $total
    )
    {
    }

    /**
     * {@inheritdoc}
     */
    public function count(): int
    {
        return \count($this->documents);
    }

    /**
     * {@inheritdoc}
     */
    public function getLastPage(): float
    {
        if (0 >= $this->limit) {
            return 1.;
        }

        return ceil($this->getTotalItems() / $this->limit) ?: 1.;
    }

    /**
     * {@inheritdoc}
     */
    public function getTotalItems(): float
    {
        return $this->total ?? 0;
    }

    /**
     * {@inheritdoc}
     */
    public function getCurrentPage(): float
    {
        return $this->offset;
    }

    /**
     * {@inheritdoc}
     */
    public function getItemsPerPage(): float
    {
        return (float) $this->limit;
    }

    /**
     * {@inheritdoc}
     */
    public function getIterator(): \Traversable
    {
        foreach ($this->documents as $document) {            
            yield $document;
        }
    }
}