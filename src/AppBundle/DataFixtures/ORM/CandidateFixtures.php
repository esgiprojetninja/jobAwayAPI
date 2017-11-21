<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Candidate;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;


class CandidateFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create();

        $candidates = [];
        for ($i = 0; $i < 20; $i++) {
            $candidate = new Candidate();
            $candidate->setUser(1);
            $candidate->setAccomodation(1);
            $candidate->setFrom($faker->dateTime);
            $candidate->setTo($faker->dateTime);
            $candidates[] = $candidate;
            $manager->persist($candidate);
        }

        $manager->flush();
    }
}