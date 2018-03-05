<?php

namespace App\DataFixtures;

use App\Entity\Worker;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class WorkerFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 6; $i++) {
            $worker = (new Worker())
                ->setFirstName('Gruh')
                ->setLastName('Jean')
                ->setJobTitle('Facteur-CEO')
                ->setWorkingTime('23.5')
                ->setWage('14.22');

            $manager->persist($worker);
        }
        $manager->flush();
    }
}
