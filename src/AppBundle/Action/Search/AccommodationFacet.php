<?php

namespace AppBundle\Action\Search;

use AppBundle\Action\Search\Search;
use AppBundle\Entity\Accommodation;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpKernel\Exception\HttpException;

class AccommodationFacet
{
    private $request;
    private $search;
    private $ids = [];
    private $filterBy = [];
    private $zone = null;
    private $region = null;

    /**
     * Constructor.
     *
     * @param Request       $requestStack
     * @param Search $search
     */
    public function __construct(RequestStack $requestStack, Search $search)
    {
        $this->request = $requestStack->getCurrentRequest();
        $this->search = $search;
        $this->setQuery();
        $this->setFilterBy();
        $this->setIds();
        $this->setZone();
        $this->setRegion();
    }

    /**
     * [getIds description].
     *
     * @return [type]
     */
    public function getIds()
    {
        return $this->ids;
    }

    /**
     * [getZone description].
     *
     * @return [type]
     */
    public function getZone()
    {
        return $this->zone;
    }

    /**
     * [getRegion description].
     *
     * @return [type]
     */
    public function getRegion()
    {
        return $this->region;
    }

    private function setQuery()
    {
        if (!$this->request->query->has('query')) {
            return;
        }

        $query = $this->request->query->get('query');

        if (empty($query)) {
            return;
        }

        $ids = $this->search->searchAccommodationsByQuery($query);
        if (!$ids) {
            $ids = [0];
        }
        $this->ids = $ids;
    }

    private function setZone()
    {
        if ($this->request->query->has('zone')) {
            $this->zone = $this->request->query->get('zone');
        }
    }

    private function setRegion()
    {
        if ($this->request->query->has('region')) {
            $this->region = (int) $this->request->query->get('region');
        }
    }

    private function setIds()
    {
        if ($this->request->query->has('ids')) {
            $ids = $this->request->query->get('ids');
            if ($ids) {
                if (!is_array($ids)) {
                    throw new HttpException(400, 'Parameter "ids" must be an array');
                }
                $this->ids = $ids;
            }
        }
    }

    public function getService()
    {
        if (!$this->request->query->has('service')) {
            return null;
        }

        return $this->request->query->getInt('service');
    }
}
