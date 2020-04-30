<?php

namespace App\DataFixtures;

use App\Entity\SystemInformation;
use App\Entity\Domaine;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class DomaineFixtures extends Fixture
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
            $domaine = new domaine();
            $domaine->setDomaineName($faker->firstname);
            $domaine->setSystemInformation($systemInformation);
            $manager->persist($domaine);
        }
        $manager->flush();
    }
}
