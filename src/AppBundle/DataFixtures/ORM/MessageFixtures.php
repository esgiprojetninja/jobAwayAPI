<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Message;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;


class MessageFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create();

        $messages = [];
        for ($i = 0; $i < 20; $i++) {
            $message = new Message();
            $message->setContent($faker->text);
            $message->setAccomodationId(1);
            $message->setCandidateId(1);
            $messages[] = $message;
            $manager->persist($message);
        }

        $manager->flush();
    }
}