<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\User;
use AppBundle\Entity\Accommodation;
use AppBundle\Entity\Mission;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;


class MissionsFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create();
        $accommodations = $manager->getRepository(Accommodation::class)->findAll();
        $users = $manager->getRepository(User::class)->findAll();

        for ($i = 0; $i < 20; $i++) {
            $mission = new Mission();
            $mission->setCheckoutHour($faker->time);
            $mission->setCheckinHour($faker->time);
            $mission->setCheckinDate($faker->dateTime);
            $mission->setCheckoutDate($faker->dateTime);
            $mission->setCheckinDetails($faker->text);
            $mission->setCheckoutDetails($faker->text);
            $mission->setNbPersons($faker->numberBetween(1,10));
            $isActive = $faker->boolean;
            $isBooked = $faker->boolean;
            if($isActive){
                $mission->setIsActive($isActive);
                $mission->setIsBooked($isBooked);
            } else {
                $mission->setIsActive(false);
                $mission->setIsBooked(false);
            }
            $mission->setDescription($faker->text);
            $mission->setNbNights($faker->numberBetween(1,14));
            $mission->setAccommodation($accommodations[rand(0, 19)]);
            $mission->setTraveller($users[rand(0, 19)]);
            $manager->persist($mission);
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            UsersFixtures::class,
            AccommodationsFixtures::class,
        );
    }
}