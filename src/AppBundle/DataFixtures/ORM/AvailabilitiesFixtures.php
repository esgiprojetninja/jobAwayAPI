<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Availability;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;


class AvailabilitiesFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 20; $i++) {
            $availability = new Availability();
            $availability->setFromDate($faker->dateTime);
            $availability->setToDate($faker->dateTime);
            $manager->persist($availability);
        }
        $manager->flush();
    }
}