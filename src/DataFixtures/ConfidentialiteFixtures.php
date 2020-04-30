<?php

namespace App\DataFixtures;

use App\Entity\SystemInformation;
use App\Entity\Confidentialite;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class ConfidentialiteFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker  =  Faker\Factory::create('fr_FR');
        for ($i = 1; $i <= 5; $i++) {
            $systemInformation = new SystemInformation();
            $systemInformation->setUsualInformationName($faker->firstname);
            $systemInformation->setSiiName($faker->lastname);
            $systemInformation->setDescription($faker->text);
            $manager->persist($systemInformation);
            $confidentialite = new Confidentialite();
            $confidentialite->setConfidentialiteName($faker->firstname);
            $confidentialite->setSystemInformation($systemInformation);
            $manager->persist($confidentialite);
        }
        $manager->flush();
    }
}
