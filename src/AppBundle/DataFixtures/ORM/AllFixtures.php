<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Accomodation;
use AppBundle\Entity\Availability;
use AppBundle\Entity\Booking;
use AppBundle\Entity\Candidate;
use AppBundle\Entity\Message;
use AppBundle\Entity\Picture;
use AppBundle\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;


class AllFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create();

        $users = [];
        for ($i = 0; $i < 20; $i++) {
            $user = new User();
            $user->setEmail($faker->email);
            $user->setFirstName($faker->name);
            $user->setLastName($faker->name);
            $user->setPassword($faker->password);
            $user->setLanguages($faker->text);
            $user->setSkills($faker->text);
            $users[] = $user;
            $manager->persist($user);
        }

        $pictures = [];
        for ($i = 0; $i < 20; $i++) {
            $picture = new Picture();
            $picture->setUrl($faker->imageUrl());
            $pictures[] = $picture;
            $manager->persist($picture);
        }

        $availabilities = [];
        for ($i = 0; $i < 20; $i++) {
            $availability = new Availability();
            $availability->setFromDate($faker->dateTime);
            $availability->setToDate($faker->dateTime);
            $availabilities[] = $availability;
            $manager->persist($availability);
        }

        $accomodations = [];
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
            $accomodations[] = $accomodation;
            $manager->persist($accomodation);
        }

        $candidates = [];
        for ($i = 0; $i < 20; $i++) {
            $candidate = new Candidate();
            $candidate->setUser($users[rand(0, 2)]);
            $candidate->setAccomodation($accomodations[rand(0, 2)]);
            if($candidate->checkDupe() === 1){
                continue;
            }
            $candidate->setFromDate($faker->dateTime);
            $candidate->setToDate($faker->dateTime);
            $candidates[] = $candidate;
            $manager->persist($candidate);
        }
/*
        $messages = [];
        for ($i = 0; $i < 20; $i++) {
            $message = new Message();
            $message->setContent($faker->text);
            $message->addAccomodation($accomodations[rand(0, 19)]);
            $message->addCandidate($candidates[rand(0, 19)]);
            $messages[] = $message;
            $manager->persist($message);
        }

        $bookings = [];
        for ($i = 0; $i < 20; $i++) {
            $booking = new Booking();
            $booking->setCheckoutHour($faker->time);
            $booking->setCheckinHour($faker->time);
            $booking->setCheckinDate($faker->dateTime);
            $booking->setCheckoutDate($faker->dateTime);
            $booking->setCheckinDetails($faker->text);
            $booking->setCheckoutDetails($faker->text);
            $booking->addAccomodation($accomodations[rand(0, 19)]);
            $booking->addTraveller($users[rand(0, 19)]);
            $bookings[] = $booking;
            $manager->persist($booking);
        }
*/
        $manager->flush();
    }
}