<?php

namespace AppBundle\Action\Search;

use Algolia\AlgoliaSearchBundle\Indexer\Indexer;
use AppBundle\Entity\Accommodation;
use Doctrine\Bundle\DoctrineBundle\Registry;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManager;

class Search
{
    private $indexer;
    private $accommodationIndex;
    private $options;
    private $searchIndexPrefix;

    /**
     * @param Indexer  $indexer
     * @param Registry $doctrine
     * @param string   searchIndexPrefix
     */
    public function __construct(
        Indexer $indexer,
        Registry $doctrine,
        string $searchIndexPrefix
    ) {
        $this->indexer = $indexer;
        $this->searchIndexPrefix = $searchIndexPrefix;
        $this->doctrine = $doctrine;
        $this->accommodationIndex = $searchIndexPrefix . '_Property';
        $this->options = [];
    }

    /**
     * Search accommodation by simple query.
     * @param string $query
     * @return array
     */
    public function searchAccommodationsByQuery(string $query)
    {
        $query = urldecode($query);
        return $this->searchIndex($this->accommodationIndex, $query);
    }

    /**
     * Search on an Index.
     *
     * @param string $indexName
     * @param string $query
     *
     * @return array
     */
    private function searchIndex(string $indexName, string $query = null): array
    {
        if (!$query) {
            $query = '';
        }
        $results = $this->indexer->rawSearch(
            $indexName,
            $query,
            $this->options
        )->getHits();

        $ids = [];
        foreach ($results as $value) {
            $ids[] = $value['id'];
        }

        return $ids;
    }

    /**
     * searchPropertyByLatAndLong.
     *
     * @param string $lat
     * @param string $long
     *
     * @return array
     */
    public function searchPropertyByLatAndLong(string $lat, string $long)
    {
        $this->options['aroundLatLng'] = $lat . ',' . $long;

        return $this->searchIndex($this->accommodationIndex);
    }

    public function search(
        string $indexName,
        string $query,
        array $filters = []
    ): array {
        $indexName = $this->searchIndexPrefix . '_' . ucfirst($indexName);
        $this->options += $filters;

        return $this->searchIndex($indexName, $query);
    }
}
