<?php

namespace App\DataFixtures;

use App\Entity\SystemInformation;
use App\Entity\TypologyMI;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class TypologyFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker  =  Faker\Factory::create('fr_FR');
        for ($i = 1; $i <= 10; $i++) {
            $systemInformation = new SystemInformation();
            $systemInformation->setUsualInformationName($faker->firstname);
            $systemInformation->setSiiName($faker->lastname);
            $systemInformation->setDescription($faker->text);
            $manager->persist($systemInformation);
            $typologymi = new typologymi();
            $typologymi->setShortName($faker->firstname);
            $typologymi->setLongName($faker->lastname);
            $typologymi->setDescription($faker->firstname);
            $typologymi->setSystemInformation($systemInformation);
            $manager->persist($domaine);
        }
        $manager->flush();
    }
}
