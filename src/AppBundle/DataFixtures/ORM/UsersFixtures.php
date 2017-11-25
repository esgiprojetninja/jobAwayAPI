<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;


class UsersFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create();
        $usersEmail = [];
        $usersUsername = [];

        $userAdmin = new User();
        $userAdmin->setUsername("app.admin");
        $userAdmin->setEmail("lambot.rom@gmail.com");
        $userAdmin->setLastName("Lambot");
        $userAdmin->setFirstName("Romain");
        $userAdmin->setSkills("Some skills line Admin");
        $userAdmin->setLanguages("Anglais, Français");
        $userAdmin->setPassword(password_hash("Rootroot9", PASSWORD_BCRYPT));
        $manager->persist($userAdmin);

        for ($i = 0; $i < 20; $i++) {
            $validMail = false;
            $validUsername = false;
            $email = $faker->email;
            $username = $faker->userName;
            $user = new User();
            $user->setEmail($faker->email);
            $user->setFirstName($faker->firstName);
            $user->setLastName($faker->lastName);
            $user->setPassword($faker->password);
            $user->setLanguages($faker->text);
            $user->setSkills($faker->text);
            $user->setIsActive($faker->boolean);
            while ($validMail != true) {
                if (!in_array($email, $usersEmail)){
                    $validMail = true;
                    $user->setEmail($email);
                }
            }
            while ($validUsername != true) {
                if (!in_array($username, $usersUsername)){
                    $validUsername = true;
                    $user->setUsername($username);
                }
            }
            $manager->persist($user);
        }
        $manager->flush();
    }
}