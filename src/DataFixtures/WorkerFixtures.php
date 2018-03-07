<?php

namespace App\DataFixtures;

use App\Entity\Worker;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class WorkerFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 6; $i++) {
            $worker = (new Worker())
                ->setFirstName('Gruh')
                ->setLastName('Jean')
                ->setJob($this->getReference("job-$i"))
                ->setWorkingTime('23.5');
            $manager->persist($worker);
        }
        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [JobFixtures::class];
    }
}
