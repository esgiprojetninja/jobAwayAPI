<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Accomodation;
use AppBundle\Entity\User;
use AppBundle\Entity\Picture;
use AppBundle\Entity\Availability;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AccomodationsFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create();
        $pictures = $manager->getRepository(Picture::class)->findAll();
        $availabilities = $manager->getRepository(Availability::class)->findAll();
        $users = $manager->getRepository(User::class)->findAll();

        for ($i = 0; $i < 20; $i++) {
            $accomodation = new Accomodation();
            $accomodation->setTitle($faker->title);
            $accomodation->setDescription($faker->text);
            $accomodation->setCity($faker->city);
            $accomodation->setCountry($faker->country);
            $accomodation->setRegion($faker->text);
            $accomodation->setAddress($faker->address);
            $accomodation->setLongitude($faker->longitude);
            $accomodation->setLatitude($faker->latitude);

            $accomodationPictures = [];
            for($i2 = 0; $i2 < 5; $i2++) {
                $picture = $pictures[rand(0, 19)];
                if (!in_array($pictures, $accomodationPictures)) {
                    $accomodationPictures[] = $picture;
                    $accomodation->setPictures($picture);
                }
            }
            $accomodationAvailabilities = [];
            for($i2 = 0; $i2 < 5; $i2++) {
                $availability = $availabilities[rand(0, 19)];
                if (!in_array($availability, $accomodationAvailabilities)) {
                    $accomodationAvailabilities[] = $availability;
                    $accomodation->setAvailabilities($availability);
                }
            }

            $accomodation->setHost($users[rand(0, 19)]);

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
            $manager->persist($accomodation);
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            UsersFixtures::class,
            AvailabilitiesFixtures::class,
            PicturesFixtures::class,
        );
    }
}