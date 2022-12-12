<?php

namespace App\DataFixtures;

use App\Entity\Annonce;
use App\Entity\Marque;
use App\Entity\User;
use Faker\Factory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Generator;

class AppFixtures extends Fixture 
{
    /**
     * @var Generator
     */
    private Generator $faker;

    public function __construct()
    {
        $this->faker = Factory::create('fr_FR');
    }

    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $user = new User();
        $user->setUsername('user2');
        $user->setPassword('123456abcd');
        $manager->persist($user);
        // $marquesFix = [];
        // for($i = 1; $i <= 5; $i++){
        //     $marque = new Marque();
        //     $marque->setName('Marque'.$i);
        //     $marquesFix->$marque;
        // }
    
        for ($i=1; $i <= 10; $i++) {
            $annonce = new Annonce();
            $annonce->setAuthor($user)
            ->setTitle($this->faker->sentence(4))
            ->setDescription($this->faker->paragraph)
            ->setModel($this->faker->sentence(1))
            ->setPrice($this->faker->randomDigit())
            ->setYear($this->faker->year())
            ->setKm($this->faker->numberBetween())
            ->setFuel($this->faker->randomElement(['Essence','Diesel','Electrique']))
            ->setLicense($this->faker->numberBetween(0,1))
            ->setImgfile($this->faker->imageUrl(640,480, 'cars', true))
            ->setIsVisible($this->faker->numberBetween(0,1));
            $manager->persist($annonce);
        }
        $manager->flush();
    }
}
