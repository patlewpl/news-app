<?php

namespace App\DataFixtures;

use App\Entity\News;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class NewsFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $news = new News();
        $news->setTitle("Jak być dobrym gospodarzem?");
        $news->setReleaseDate("2022-09-27");
        $news->setImageUrl("https://images.pexels.com/photos/5840867/pexels-photo-5840867.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1");
        $manager->persist($news);

        $news2 = new News();
        $news2->setTitle("Yoga dla początkujących");
        $news2->setReleaseDate("2022-09-27");
        $news2->setImageUrl("https://images.pexels.com/photos/4834992/pexels-photo-4834992.jpeg?auto=compress&cs=tinysrgb&w=400&lazy=load");
        $manager->persist($news2);

        $news3 = new News();
        $news3->setTitle("Podróże małe i duże");
        $news3->setReleaseDate("2022-09-28");
        $news3->setImageUrl("https://images.pexels.com/photos/7806502/pexels-photo-7806502.jpeg?auto=compress&cs=tinysrgb&w=400&lazy=load");
        $manager->persist($news3);

        $news4 = new News();
        $news4->setTitle("Pomysły na randkę");
        $news4->setReleaseDate("2022-09-28");
        $news4->setImageUrl("https://images.pexels.com/photos/13516347/pexels-photo-13516347.jpeg?auto=compress&cs=tinysrgb&w=400&lazy=load");
        $manager->persist($news4);

        $news5 = new News();
        $news5->setTitle("Jak robić zdjęcia");
        $news5->setReleaseDate("2022-09-29");
        $news5->setImageUrl("https://images.pexels.com/photos/12928888/pexels-photo-12928888.jpeg?cs=srgb&dl=pexels-yuliia-tretynychenko-12928888.jpg&fm=jpg");
        $manager->persist($news5);

        $news6 = new News();
        $news6->setTitle("Budżetowy Paryż");
        $news6->setReleaseDate("2022-09-29");
        $news6->setImageUrl("https://images.pexels.com/photos/13291092/pexels-photo-13291092.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1");
        $manager->persist($news6);

        $news7 = new News();
        $news7->setTitle("Wakacje nad morzem");
        $news7->setReleaseDate("2022-09-30");
        $news7->setImageUrl("https://images.pexels.com/photos/13252401/pexels-photo-13252401.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1");
        $manager->persist($news7);

        $manager->flush();
    }
}
