<?php

namespace App\DataFixtures;

use App\Entity\Worker;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Faker;
class WorkerFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $firstNames = ['Georges', 'Vincent'];
        $faker = Faker\Factory::create('fr_FR');
        foreach ($firstNames as $i => $firstName){
            $worker = (new Worker())
                ->setFirstName($firstName)
                ->setLastName($faker->lastname())
                ->setJob($this->getReference("job-$i"))
                ->setWorkingTime('23.5');

            $this->addReference("worker-$i", $worker);
            $manager->persist($worker);
        }
        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [JobFixtures::class];
    }
}
