<?php

namespace App\DataFixtures;

use App\Entity\Article;
use App\Entity\Categorie;
use App\Entity\User;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    protected $faker;

    public function load(ObjectManager $manager)
    {

        $this->faker = Factory::create();
        for ($i = 0; $i<151; $i++)
       {

            $article = new Article();
            $article

                ->setName($this->faker->name)
                ->setDescription($this->faker->realText())
                ->setCategorie($this->faker->text)
                ->setPrice($this->faker->numberBetween(min([0.99]), max([35])))
                ->setCreatedAt($this->faker->dateTime)
                ->setUrlImage($this->faker->imageUrl(150,140));


            $manager->persist($article);

        }

        $this->faker = Factory::create();
        for ($i = 0; $i<11; $i++)

        {

                $article = new Categorie();
            $article

                ->setName($this->faker->name)
                ->setCreatedAt($this->faker->dateTime());



            $manager->persist($article);

        }


        $this->faker = Factory::create();
        for ($i = 0; $i<51; $i++)

        {

            $article = new User();
            $article

                ->setFullname($this->faker->name)
                ->setEmail($this->faker->email)
                ->setCreatedAt($this->faker->dateTime);



            $manager->persist($article);

        }




        $manager->flush();
    }




}
