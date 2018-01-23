<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Accommodation;
use AppBundle\Entity\User;
use AppBundle\Entity\Picture;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AccommodationsFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create();
        $pictures = $manager->getRepository(Picture::class)->findAll();
        $users = $manager->getRepository(User::class)->findAll();

        for ($i = 0; $i < 20; $i++) {
            $accommodation = new Accommodation();
            $accommodation->setTitle($faker->catchPhrase());
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

            $accommodation->setHost($users[rand(0, 19)]);

            $accommodation->setNbBedroom($faker->numberBetween(1,5));
            $accommodation->setNbBathroom($faker->numberBetween(1,3));
            $accommodation->setNbToilet($faker->numberBetween(1,3));
            $accommodation->setNbMaxBaby($faker->numberBetween(0,5));
            $accommodation->setNbMaxAdult($faker->numberBetween(1,14));
            $accommodation->setNbMaxGuest($faker->numberBetween(0,8));
            $accommodation->setNbMaxChild($faker->numberBetween(1,10));
            $accommodation->setAnimalsAllowed($faker->boolean);
            $accommodation->setSmokersAllowed($faker->boolean);
            $accommodation->setHasInternet($faker->boolean);
            $accommodation->setPropertySize($faker->randomFloat);
            $accommodation->setFloor($faker->numberBetween(1,5));
            $accommodation->setMinStay($faker->numberBetween(1,7));
            $accommodation->setMaxStay($faker->numberBetween(7,14));
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
            PicturesFixtures::class,
        );
    }
}