<?php

declare(strict_types=1);

namespace AppBundle\Action\Search;

use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class SearchAccommodation extends FOSRestController
{

    public function searchPropertyAction()
    {
        $facet = $this->get('AppBundle\Action\Search\AccommodationAction');
        $paginator = $this->get('doctrine')
                          ->getRepository(Property::class)
                          ->searchProperties($facet);

        $properties = $paginator->getIterator()->getArrayCopy();

        if (!$properties) {
            return;
        }
        $priceMin = null;
        $priceMax = null;
        foreach ($properties as $property) {
            $price = $property->getNightlyRateSellTtc();
            if ($price < $priceMin || !$priceMin) {
                $priceMin = $price;
            }
            if ($price > $priceMax || !$priceMax) {
                $priceMax = $price;
            }
        }
        if (!$priceMin) {
            $priceMin = 0;
        }
        if (!$priceMax) {
            $priceMax = 0;
        }

        return [
            'count' => count($paginator),
            'price_min' => $priceMin,
            'price_max' => $priceMax,
            'data' => $properties,
        ];
    }
}
