<?php

namespace App\DataFixtures;


use App\Entity\Departements;
use App\Entity\Cities;
use App\Entity\Dumpsters;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

use Faker;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');
        print('Vienne : ');

        // Departement
        $departement = new Departements();

        // VIENNE
        $departement->setName('Vienne');
        $manager->persist($departement);

        // Commune de Poitier
        $api_url = 'https://data.grandpoitiers.fr/api/records/1.0/search/?dataset=proprete-bornes-a-verre-grand-poitiers-donnees-metiers&q=&rows=5000';
        $json_data = file_get_contents($api_url);

        $response_data = json_decode($json_data);

        $villes_data = $response_data->records;
        $villesNames = [];

        foreach ($villes_data as $ville_data) {
            if (isset($ville_data->fields->commune)) {
                if (in_array($ville_data->fields->commune, $villesNames)) {
                } else {
                    array_push($villesNames, $ville_data->fields->commune);
                }
            } else {
                if (in_array('Commune de Poitier', $villesNames)) {
                } else {
                    array_push($villesNames, 'Commune de Poitier');
                }
            }
        }
        foreach ($villesNames as $value) {
            $ville =  new Cities();
            $ville->getDepartement('Vienne');

            $ville->setName($value);

            $ville->setDepartement($departement);

            $manager->persist($ville);
            $manager->flush();
            foreach ($villes_data as $benne_data) {
                if (isset($benne_data->fields->commune)) {
                    if ($benne_data->fields->commune == $value) {
                        $benne = new Dumpsters();
                        $benne->getCity($benne_data->fields->commune);
                        $benne->setCity($ville);
                        $benne->setLng($benne_data->geometry->coordinates[0]);
                        $benne->setLat($benne_data->geometry->coordinates[1]);
                        $manager->persist($benne);
                    }
                } else {
                    if ('Commune de Poitier' == $value) {
                        $benne = new Dumpsters();
                        $benne->getCity('Commune de Poitier');
                        $benne->setCity($ville);
                        $benne->setLng($benne_data->geometry->coordinates[0]);
                        $benne->setLat($benne_data->geometry->coordinates[1]);
                    }
                }
            }
        }
        print('OK, ');

        // TOULOUSE 
        print('Haute-Garonne : ');

        // Departement
        $departement = new Departements();

        $departement->setName('Haute-Garonne');
        $manager->persist($departement);
        $api_url = 'https://data.toulouse-metropole.fr/api/records/1.0/search/?dataset=points-dapport-volontaire-dechets-et-moyens-techniques&q=&rows=5000&facet=commune&facet=flux';
        $json_data = file_get_contents($api_url);

        $response_data = json_decode($json_data);

        $villes_data = $response_data->records;
        $villesNames = [];
        foreach ($villes_data as $ville_data) {
            if (isset($ville_data->fields->commune)) {
                if (in_array($ville_data->fields->commune, $villesNames)) {
                    # code...
                } else {
                    array_push($villesNames, $ville_data->fields->commune);
                }
            } else {
                if (in_array('Commune de Toulouse', $villesNames)) {
                } else {
                    array_push($villesNames, 'Commune de Toulouse');
                }
            }
        }
        foreach ($villesNames as $value) {
            $ville =  new Cities();
            $ville->getDepartement('Haute-Garonne');

            $ville->setName($value);

            $ville->setDepartement($departement);

            $manager->persist($ville);
            $manager->flush();
            foreach ($villes_data as $benne_data) {
                if (isset($benne_data->fields->commune)) {
                    if ($benne_data->fields->commune == $value) {

                        $benne = new Dumpsters();
                        $benne->getCity($benne_data->fields->commune);
                        $benne->setCity($ville);
                        $benne->setLng($benne_data->geometry->coordinates[0]);
                        $benne->setLat($benne_data->geometry->coordinates[1]);
                        $manager->persist($benne);
                    }
                } else {
                    if ('Commune de Toulouse' == $value) {
                        $benne = new Dumpsters();
                        $benne->getCity('Commune de Toulouse');
                        $benne->setCity($ville);
                        $benne->setLng($benne_data->geometry->coordinates[0]);
                        $benne->setLat($benne_data->geometry->coordinates[1]);
                    }
                }
            }
        }
        print('OK, ');
        // Departement
        print('RHONE : ');
        $departement = new Departements();

        $departement->setName('Rhône');
        $manager->persist($departement);
        $api_url = 'https://download.data.grandlyon.com/ws/grandlyon/gic_collecte.gicsiloverre/all.json?maxfeatures=-1&start=1';
        $json_data = file_get_contents($api_url);

        $response_data = json_decode($json_data);

        $villes_data = $response_data->values;
        $villesNames = [];
        foreach ($villes_data as $ville_data) {
            if (isset($ville_data->commune)) {
                if (in_array($ville_data->commune, $villesNames)) {
                    # code...
                } else {
                    array_push($villesNames, $ville_data->commune);
                }
            } // } else {
            //     if (in_array('Commune de Toulouse', $villesNames)) {
            //     } else {
            //         array_push($villesNames, 'Commune de Toulouse');
            //     }
            // }
        }
        foreach ($villesNames as $value) {
            $ville =  new Cities();
            $ville->getDepartement('Rhône');

            $ville->setName($value);

            $ville->setDepartement($departement);

            $manager->persist($ville);
            $manager->flush();
            foreach ($villes_data as $benne_data) {
                if (isset($benne_data->commune)) {
                    if ($benne_data->commune == $value) {
                        $benne = new Dumpsters();
                        $benne->getCity($benne_data->commune);
                        $benne->setCity($ville);
                        $benne->setLng($benne_data->lon);
                        $benne->setLat($benne_data->lat);
                        $manager->persist($benne);
                    }
                }
            }
        }
        print('OK, ');

        $manager->flush();
    }
}
