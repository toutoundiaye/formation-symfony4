<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class UserFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $usernames = ['Author', 'Admin'];
        $faker = Faker\Factory::create('fr_FR');
        foreach($usernames as $i => $username){
            $user = (new User())
                ->setUsername($username)
                ->setFirstname($faker->firstname())
                ->setPassword(
                    password_hash('secret', PASSWORD_BCRYPT, ['cost' => 7])
                )
                ->setWorker($this->getReference("worker-$i"));

            if ($username === 'Admin') {
                $user->setRoles(["ROLE_ADMIN"]);
            }

            $manager->persist($user);
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [WorkerFixtures::class];
    }
}
