<?php

namespace App\DataFixtures;

use App\Entity\SystemInformation;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class SystemInformationFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker  =  Faker\Factory::create('fr_FR');
        for ($i = 1; $i <= 500; $i++) {
            $systemInformation = new systemInformation();
            $systemInformation->setUsualInformationName($faker->firstname);
            $systemInformation->setSiiName($faker->lastname);
            $systemInformation->setDescription($faker->text);
            $manager->persist($systemInformation);
        }
        $manager->flush();
    }
}
