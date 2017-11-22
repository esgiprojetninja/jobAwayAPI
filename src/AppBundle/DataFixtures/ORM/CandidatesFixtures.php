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

        for ($i = 0; $i < 20; $i++) {
            $candidate = new Candidate();
            $candidate->setUser($users[rand(0, 2)]);
            $candidate->setAccomodation($accomodations[rand(0, 2)]);
            /*if($this->checkDupe($candidate, $manager) === 1){
                continue;
            }*/
            $candidate->setFromDate($faker->dateTime);
            $candidate->setToDate($faker->dateTime);
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

    /*public function checkDupe(Candidate $candidate, ObjectManager $manager) {
        //Si pour l'id accomodation passé en paramètre il existe déjà un record avec l'id user de l'objet courrant alors retourne une exception
        $accomodation = $manager->getRepository(Accomodation::class)->find($candidate->getAccomodation()->getId());
            var_dump( $candidate->getUser()->getId() . " - " . $accomodation->getHost()->getId() ) ;
        if($accomodation){
            if ($candidate->getUser()->getId() == $accomodation->getHost()->getId()){
                return 1;
            }
        }
        return 0;
    }*/
}