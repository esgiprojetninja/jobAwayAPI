<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Tag;
use AppBundle\Entity\Article;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;


class Fixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create();
        $tags = [];
        for ($i = 0; $i < 20; $i++) {
            $tag = new Tag();
            $tag->setName($faker->name);
            $tags[] = $tag;
            $manager->persist($tag);
        }

        $manager->flush();
    }
}