<?php

namespace App\DataFixtures;

use App\Entity\Job;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;


class JobFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');
        for ($i = 0; $i < 6; $i++) {
            $job = (new Job())
                ->setTitle($faker->jobTitle())
                ->setDescription($faker->realText($maxNbChars = 50))
                ->setWage($faker->randomFloat($nbMaxDecimals = NULL, $min = 9.99, $max = 35.99));
            $this->addReference("job-$i", $job);
            $manager->persist($job);
        }
        $manager->flush();

    }
}
