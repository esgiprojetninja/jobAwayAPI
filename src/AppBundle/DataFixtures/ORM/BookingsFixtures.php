<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\User;
use AppBundle\Entity\Accomodation;
use AppBundle\Entity\Booking;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;


class BookingsFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create();
        $accomodations = $manager->getRepository(Accomodation::class)->findAll();
        $users = $manager->getRepository(User::class)->findAll();

        for ($i = 0; $i < 20; $i++) {
            $booking = new Booking();
            $booking->setCheckoutHour($faker->time);
            $booking->setCheckinHour($faker->time);
            $booking->setCheckinDate($faker->dateTime);
            $booking->setCheckoutDate($faker->dateTime);
            $booking->setCheckinDetails($faker->text);
            $booking->setCheckoutDetails($faker->text);
            $booking->setNbPersons($faker->randomNumber());
            $booking->setNbNights($faker->randomNumber());
            $booking->setAccommodation($accomodations[rand(0, 19)]);
            $booking->setTraveller($users[rand(0, 19)]);
            $manager->persist($booking);
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            UsersFixtures::class,
            AccomodationsFixtures::class,
        );
    }
}