<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Region;
use App\Entity\Room;

class AppFixtures extends Fixture
{
    // définit un nom de référence pour une instance de Region
    public const IDF_REGION_REFERENCE = 'idf-region';
    public const NOR_REGION_REFERENCE = 'nor-region';

    public function load(ObjectManager $manager)
    {

        /* REGIONS */

        $region = new Region();
        $region->setCountry("FR");
        $region->setName("Ile de France");
        $region->setPresentation("La région française capitale");
        $manager->persist($region);
        $manager->flush();
        $this->addReference(self::IDF_REGION_REFERENCE, $region);

        // ----------------------------------------------------//

        $region = new Region();
        $region->setCountry("FR");
        $region->setName("Normandie");
        $region->setPresentation("La campagne");
        $manager->persist($region);
        $manager->flush();
        $this->addReference(self::NOR_REGION_REFERENCE, $region);

        /* ROOMS */

        $room = new Room();
        $room->setSummary("Bel amphithéatre à Evry");
        $room->setDescription("Très bien équipé, de nombreuses chaises");
        $room->setCapacity(200);
        $room->setSuperficy(1000);
        $room->setPrice(200);
        $room->setAddress("9, Rue Charles Fourier, 91000, Evry-Courcouronnes");
        $room->addRegion($this->getReference(self::IDF_REGION_REFERENCE));
        $manager->persist($room);
        $manager->flush();

        /* ------------------------------------------------------------------ */

        $room = new Room();
        $room->setSummary("Camping-car au bord de la mer");
        $room->setDescription("Pour des vacances loin de tout");
        $room->setCapacity(2);
        $room->setSuperficy(10);
        $room->setPrice(50);
        $room->setAddress("Impasse de la plage, 12345, L'OCEAN");
        $room->addRegion($this->getReference(self::NOR_REGION_REFERENCE));
        $manager->persist($room);
        $manager->flush();

        /* ------------------------------------------------------------------ */

        $room = new Room();
        $room->setSummary("C15");
        $room->setDescription("Plus confortable qu'il n'y paraît");
        $room->setCapacity(2);
        $room->setSuperficy(3);
        $room->setPrice(30);
        $room->setAddress("9, Rue Charles Fourier, 91000, Evry-Courcouronnes");
        $room->addRegion($this->getReference(self::NOR_REGION_REFERENCE));
        $manager->persist($room);
        $manager->flush();

        /* ------------------------------------------------------------------ */

        $room = new Room();
        $room->setSummary("Cabanne dans les arbres");
        $room->setDescription("Pour se connecter avec la nature");
        $room->setCapacity(2);
        $room->setSuperficy(10);
        $room->setPrice(100);
        $room->setAddress("9, Rue Charles Fourier, 91000, Evry-Courcouronnes");
        $room->addRegion($this->getReference(self::NOR_REGION_REFERENCE));
        $manager->persist($room);
        $manager->flush();

        /* ------------------------------------------------------------------ */

        $room = new Room();
        $room->setSummary("Tente 2 secondes");
        $room->setDescription("À emmener partout (breakfast non compris)");
        $room->setCapacity(2);
        $room->setSuperficy(2);
        $room->setPrice(20);
        $room->setAddress("9, Rue Charles Fourier, 91000, Evry-Courcouronnes");
        $room->addRegion($this->getReference(self::IDF_REGION_REFERENCE));
        $manager->persist($room);
        $manager->flush();

        /* ------------------------------------------------------------------ */

        $room = new Room();
        $room->setSummary("Igloo");
        $room->setDescription("Glacial !");
        $room->setCapacity(200);
        $room->setSuperficy(10);
        $room->setPrice(20);
        $room->setAddress("9, Rue Charles Fourier, 91000, Evry-Courcouronnes");
        $room->addRegion($this->getReference(self::NOR_REGION_REFERENCE));
        $manager->persist($room);
        $manager->flush();

        /* ------------------------------------------------------------------ */

        $room = new Room();
        $room->setSummary("Pavillon en Ile de France");
        $room->setDescription("À 30 minutes de Paris");
        $room->setCapacity(6);
        $room->setSuperficy(150);
        $room->setPrice(200);
        $room->setAddress("9, Rue Charles Fourier, 91000, Evry-Courcouronnes");
        $room->addRegion($this->getReference(self::IDF_REGION_REFERENCE));
        $manager->persist($room);
        $manager->flush();

        /* ------------------------------------------------------------------ */

        $room = new Room();
        $room->setSummary("Maison traditionnelle en campagne");
        $room->setDescription("Espace au calme, loin de tout");
        $room->setCapacity(2);
        $room->setSuperficy(10);
        $room->setPrice(20);
        $room->setAddress("9, Rue Charles Fourier, 91000, Evry-Courcouronnes");
        $room->addRegion($this->getReference(self::NOR_REGION_REFERENCE));
        $manager->persist($room);
        $manager->flush();
    }
}
