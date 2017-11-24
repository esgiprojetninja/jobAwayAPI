<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Candidate;
use AppBundle\Entity\Message;
use AppBundle\Entity\Accommodation;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;


class MessagesFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create();
        $accommodations = $manager->getRepository(Accommodation::class)->findAll();
        $candidates = $manager->getRepository(Candidate::class)->findAll();

        for ($i = 0; $i < 20; $i++) {
            $message = new Message();
            $message->setContent($faker->text);
            $message->setAccommodation($accommodations[rand(0, 19)]);
            $message->setCandidate($candidates[rand(0, count($candidates) -1)]);
            $manager->persist($message);
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            CandidatesFixtures::class,
            AccommodationsFixtures::class,
        );
    }
}