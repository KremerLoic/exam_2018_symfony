<?php
/**
 * Created by PhpStorm.
 * User: loic
 * Date: 11/06/18
 * Time: 15:45
 */

namespace App\Services;


use Faker\Factory;
use Faker\Generator;

class FixturesManager
{

    protected $faker;
    public function __construct()
    {
        $this->faker = Factory::create();
    }
    /**
     * @return Generator
     */
    public function getFaker(){
        return $this->faker;
    }

}
/*

public function add(FixturesManager $fm)
{
    $em = $this->getDoctrine()->getManager();
    for ($i = 0; $i < 10; $i++) {
        $news = new News();
        $news->setTitle($fm->getFaker()->text(5));
        $news->setContent($fm->getFaker()->paragraph(1));
        $news->setPublicationDate($fm->getFaker()->date('y-m-d'));
        $news->setImageUrl($fm->getFaker()->imageUrl(300,150));
        $em->persist($news);
    }
    $em->flush();
    return $this->redirectToRoute('news');

}

*/