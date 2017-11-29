<?php
// src/AppBundle/Action/BookSpecial.php

namespace AppBundle\Action;

use AppBundle\Entity\Book;
use Doctrine\Common\Persistence\ManagerRegistry;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\Routing\Annotation\Route;

class BookSpecial
{
    private $myService;

    public function __construct(MyService $myService)
    {
        $this->myService = $myService;
    }

    /**
     * @Route(
     *     name="book_special",
     *     path="/books/{id}/special",
     *     defaults={"_api_resource_class"=Book::class, "_api_item_operation_name"="special"}
     * )
     * @Method("PUT")
     */
    public function __invoke($data) // API Platform retrieves the PHP entity using the data provider then (for POST and
        // PUT method) deserializes user data in it. Then passes it to the action. Here $data
        // is an instance of Book having the given ID. By convention, the action's parameter
        // must be called $data.
    {
        $this->myService->doSomething($data);

        return $data; // API Platform will automatically validate, persist (if you use Doctrine) and serialize an entity
        // for you. If you prefer to do it yourself, return an instance of Symfony\Component\HttpFoundation\Response
    }
}