<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Picture;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;


class PicturesFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 20; $i++) {
            $picture = new Picture();
            $picture->setUrl($faker->imageUrl());
            $manager->persist($picture);
        }
        $manager->flush();
    }
}