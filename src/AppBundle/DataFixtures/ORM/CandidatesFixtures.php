<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Accomodation;
use AppBundle\Entity\User;
use AppBundle\Entity\Candidate;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;


class CandidatesFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create();
        $accomodations = $manager->getRepository(Accomodation::class)->findAll();
        $users = $manager->getRepository(User::class)->findAll();

        $candidates = [];
        for ($i = 0; $i < 20; $i++) {
            $candidate = new Candidate();
            $user = $users[rand(0, 19)];
            $candidate->setUser($user);
            $accomodation = $accomodations[rand(0,19)];
            $candidate->setAccomodation($accomodation);
            $candidate->setFromDate($faker->dateTime);
            $candidate->setToDate($faker->dateTime);
            if(in_array($user->getId().$accomodation->getId(), $candidates)) {
                continue;
            }
            $candidates[] = $user->getId().$accomodation->getId();
            $manager->persist($candidate);
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