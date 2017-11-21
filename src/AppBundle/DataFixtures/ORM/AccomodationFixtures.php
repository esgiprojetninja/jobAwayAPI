<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Accomodation;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;


class AccomodationFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create();

        $accomodations = [];
        for ($i = 0; $i < 20; $i++) {
            $accomodation = new Accomodation();
            $accomodation->setTitle($faker->title);
            $accomodation->setDescription($faker->text);
            $accomodation->setCity($faker->city);
            $accomodation->setCountry($faker->country);
            $accomodation->setRegion($faker->text);
            $accomodation->setAddress($faker->address);
            $accomodation->setLong($faker->longitude);
            $accomodation->setLat($faker->latitude);
            $accomodation->setPictures(1);
            $accomodation->setAvailabilities(1);
            $accomodation->setHost(1);
            $accomodation->setNbBedroom($faker->numberBetween());
            $accomodation->setNbBathroom($faker->numberBetween());
            $accomodation->setNbToilet($faker->numberBetween());
            $accomodation->setNbMaxBaby($faker->numberBetween());
            $accomodation->setNbMaxAdult($faker->numberBetween());
            $accomodation->setNbMaxGuest($faker->numberBetween());
            $accomodation->setNbMaxChild($faker->numberBetween());
            $accomodation->setAnimalsAllowed($faker->boolean);
            $accomodation->setSmokersAllowed($faker->boolean);
            $accomodation->setHasInternet($faker->boolean);
            $accomodation->setPropertySize($faker->randomFloat);
            $accomodation->setFloor($faker->numberBetween());
            $accomodation->setMinStay($faker->numberBetween());
            $accomodation->setMaxStay($faker->numberBetween());
            $accomodation->setType($faker->text);
            $accomodation->setCheckinHour($faker->datetime);
            $accomodation->setCheckoutHour($faker->datetime);

            $accomodations[] = $accomodation;
            $manager->persist($accomodation);
        }

        $manager->flush();
    }
}