<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Accommodation;
use AppBundle\Entity\User;
use AppBundle\Entity\Candidate;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;


class CandidatesFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create();
        $accommodations = $manager->getRepository(Accommodation::class)->findAll();
        $users = $manager->getRepository(User::class)->findAll();

        $candidates = [];
        for ($i = 0; $i < 20; $i++) {
            $candidate = new Candidate();
            $user = $users[rand(0, 19)];
            $candidate->setUser($user);
            $accommodation = $accommodations[rand(0,19)];
            $candidate->setAccommodation($accommodation);
            $candidate->setStatus($faker->numberBetween(0,2));
            $candidate->setFromDate($faker->dateTime);
            $candidate->setToDate($faker->dateTime);
            if(in_array($user->getId().$accommodation->getId(), $candidates)) {
                continue;
            }
            $candidates[] = $user->getId().$accommodation->getId();
            $manager->persist($candidate);
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