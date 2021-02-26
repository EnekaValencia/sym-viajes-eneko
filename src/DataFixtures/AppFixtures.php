<?php

namespace App\DataFixtures;

use Faker;
use App\Entity\Destination;
use App\Entity\Offer;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // Crear 20 Viajes
        for ($i = 0; $i < 20; $i++) 
        {
            $jobFaker = Faker\Factory::create();
            
            // Ofertadores
            $offer = new Offer();
            $offer->setCif($i);
            $offer->setAddress($jobFaker->address);
            $offer->setCompany($jobFaker->company);
            $offer->setUser($user+$i);
            
            $manager->persist($offer);
            
            // Viaje
            $destination = new Destination();
            $destination->setCod($i);
            $destination->setImage($jobFaker->image());
            $destination->setName($jobFaker->name+$i);
            $destination->setStayingPlace('Hotel', 'Apartment', 'Rural House');
            $destination->setPrice($jobFaker->numberBetween(10, 200));
            $destination->setTrip($trip + $i);
            
            $manager->persist($destination);
        }

        $manager->flush();
    }
}
