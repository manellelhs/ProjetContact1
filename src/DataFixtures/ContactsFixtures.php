<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Contact;
use App\Entity\Categorie;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class ContactsFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        
        $faker=Factory::create("fr_FR");

        $categorie=new Categorie();
        $categorie  ->setLibelle("PROFESSIONNEL")
                    ->setDescription($faker->sentence(50))
                    ->setImage("images/categorie/professionnel.jpg");
        $manager->persist($categorie);
        $categorie=new Categorie();
        $categorie  ->setLibelle("SPORT")
                    ->setDescription($faker->sentence(50))
                    ->setImage("images/categorie/sport.jpg");
        $manager->persist($categorie);
        $categorie=new Categorie();
        $categorie  ->setLibelle("PRIVE")
                    ->setDescription($faker->sentence(50))
                    ->setImage("images/categorie/prive.jpg");
        $manager->persist($categorie);



        
        $genres=["male","female"];
       
        for($i=0; $i < 100; $i++){

        $sexe=mt_rand(0,1);
        if ($sexe==0){
            $type="men";
            $type2="male";
        }    
        else {
            
                $type="women";
                $type2= "female";
            }     
        $contact=new Contact();
        $contact->setNom($faker->lastName())
                ->setPrenom($faker->firstName($type2))
                ->setRue($faker->streetAddress())
                ->setCp($faker->numberBetween(7500,92000))
                ->setVille($faker->city()) 
                ->setMail($faker->email())   
                ->setAvatar("https://randomuser.me/api/portraits/" . $type."/". $i.".jpg")
                ->setSexe($sexe);
        $manager->persist($contact);
        }
                                                   
        $manager->flush();
    }
}
