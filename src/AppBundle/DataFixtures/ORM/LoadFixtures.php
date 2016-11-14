<?php
/**
 * Created by PhpStorm.
 * User: nobuyukifujioka
 * Date: 13/11/2016
 * Time: 06:36
 */

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Station;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Nelmio\Alice\Fixtures;

class LoadFixtures implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        Fixtures::load(__DIR__.'/fixtures.yml', $manager);
//        $station = new Station();
//        $station->setLatitude(55.21963);
//        $station->setLongitude(-3.410563);
//        $station->setName('Station'.rand(1, 100));
//        $station->setPostcode('HP2 2AB');
//        $station->setLocation('M'.rand(1,30).'Jct '.rand(1,40));
//        $station->setPumpId(rand(1,10));
//        $station->setPumpModel('AC (RAPID) / DC (CHAdeMO)');
//        $station->setAvailable(true);
//        $station->setSwipeOnly(false);
//        $station->setDistance(21.2323224);
//
//        $manager->persist($station);
//        $manager->flush();
    }
}