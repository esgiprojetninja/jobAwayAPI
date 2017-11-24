<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Accommodation;
use AppBundle\Entity\User;
use AppBundle\Entity\Picture;
use AppBundle\Entity\Availability;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AccommodationsFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create();
        $pictures = $manager->getRepository(Picture::class)->findAll();
        $availabilities = $manager->getRepository(Availability::class)->findAll();
        $users = $manager->getRepository(User::class)->findAll();

        for ($i = 0; $i < 20; $i++) {
            $accommodation = new Accommodation();
            $accommodation->setTitle($faker->title);
            $accommodation->setDescription($faker->text);
            $accommodation->setCity($faker->city);
            $accommodation->setCountry($faker->country);
            $accommodation->setRegion($faker->text);
            $accommodation->setAddress($faker->address);
            $accommodation->setLongitude($faker->longitude);
            $accommodation->setLatitude($faker->latitude);

            $accommodationPictures = [];
            for($i2 = 0; $i2 < 5; $i2++) {
                $picture = $pictures[rand(0, 19)];
                if (!in_array($pictures, $accommodationPictures)) {
                    $accommodationPictures[] = $picture;
                    $accommodation->setPictures($picture);
                }
            }
            $accommodationAvailabilities = [];
            for($i2 = 0; $i2 < 5; $i2++) {
                $availability = $availabilities[rand(0, 19)];
                if (!in_array($availability, $accommodationAvailabilities)) {
                    $accommodationAvailabilities[] = $availability;
                    $accommodation->setAvailabilities($availability);
                }
            }

            $accommodation->setHost($users[rand(0, 19)]);

            $accommodation->setNbBedroom($faker->numberBetween());
            $accommodation->setNbBathroom($faker->numberBetween());
            $accommodation->setNbToilet($faker->numberBetween());
            $accommodation->setNbMaxBaby($faker->numberBetween());
            $accommodation->setNbMaxAdult($faker->numberBetween());
            $accommodation->setNbMaxGuest($faker->numberBetween());
            $accommodation->setNbMaxChild($faker->numberBetween());
            $accommodation->setAnimalsAllowed($faker->boolean);
            $accommodation->setSmokersAllowed($faker->boolean);
            $accommodation->setHasInternet($faker->boolean);
            $accommodation->setPropertySize($faker->randomFloat);
            $accommodation->setFloor($faker->numberBetween());
            $accommodation->setMinStay($faker->numberBetween());
            $accommodation->setMaxStay($faker->numberBetween());
            $accommodation->setType($faker->text);
            $accommodation->setCheckinHour($faker->datetime);
            $accommodation->setCheckoutHour($faker->datetime);
            $manager->persist($accommodation);
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