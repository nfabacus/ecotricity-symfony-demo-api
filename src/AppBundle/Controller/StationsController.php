<?php
/**
 * Created by PhpStorm.
 * User: nobuyukifujioka
 * Date: 06/11/2016
 * Time: 17:24
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Connector;
use AppBundle\Entity\Pump;
use AppBundle\Entity\Station;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class StationsController extends Controller
{
    /**
     * @Route("/station/new")
     */
    public function newAction()
    {
        $station = new Station();
        $station->setLatitude(55.21963);
        $station->setLongitude(-3.410563);
        $station->setName('Station'.rand(1, 100));
        $station->setPostcode('HP2 2AB');
        $station->setLocation('M'.rand(1,30).'Jct '.rand(1,40));
        $station->setAvailable(true);
        $station->setSwipeOnly(false);
        $station->setDistance(21.2323224);

        $pump = new Pump();
        $pump->setStatus('Available');
        $pump->setLatitude(55.21963);
        $pump->setLongitude(-3.410563);
        $pump->setName('Station'.rand(1, 100));
        $pump->setPostcode('HP2 2AB');
        $pump->setLocation('M'.rand(1,30).'Jct '.rand(1,40));
        $pump->setLastHeartbeat("2016-11-14T01:15:45Z");
        $pump->setPumpModel("AC (RAPID) / DC (CHAdeMO) / CCS");
        $pump->setStation($station);

        $connector = new Connector();
        $connector->setPump($pump);
        $connector->setName("DC (CHADEMO)");


        $em = $this->getDoctrine()->getManager();
        $em->persist($station);
        $em->persist($pump);
        $em->persist($connector);
        $em->flush();



        return new Response('<html><body>Station created!</body></html>');
    }

    /**
     * @Route("/pumps")
     */
    public function showAction()
    {
        return new Response('Hello, World!');
    }

    /**
     * @Route("/getPumpList")
     * @Method("POST")
     */
    public function getPumpListAction(Request $request)
    {
        $vehicleSpecification = $request->get('vehicleSpec');
        $vehicleModel = $request->get('vehicleModel');
        $vehicleMake = $request->get('vehicleMake');
        $latitude = $request->get('latitude');
        $longitude = $request->get('longitude');


        $myDetails = array(
            "vehicleSpec" => $vehicleSpecification,
            "vehicleMake" => $vehicleMake,
            "vehicleModel"=> $vehicleModel,
            "latitude" => $latitude,
            "longitude" => $longitude
        );

        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery(
            'SELECT c
        FROM AppBundle:Station c'
        );
        $stations = $query->getArrayResult();
        $stationsResult = array("result"=>$stations);

        $response = new Response(json_encode($stationsResult));
        $response->headers->set('Content-Type', 'application/json');


        return $response;

    }

    /**
     * @Route("/getLocationDetails")
     * @Method("POST")
     */
    public function getLocationDetailsAction(Request $request)
    {
        $vehicleSpecification = $request->get('vehicleSpecification');
        $vehicleModel = $request->get('vehicleModel');
        $vehicleMake = $request->get('vehicleMake');
        $locationId = $request->get('locationId');
        $locationDetails = array(
            "vehicleSpec" => $vehicleSpecification,
            "vehicleMake" => $vehicleMake,
            "vehicleModel" => $vehicleModel,
            "locationId" => $locationId
        );

        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery(
            'SELECT c
        FROM AppBundle:Pump c'
        );
        $pumps = $query->getArrayResult();
        $pumpsResult = array("result"=>array("pump"=>$pumps));

        $response = new Response(json_encode($pumpsResult));
        $response->headers->set('Content-Type', 'application/json');

        return $response;


//        return new JsonResponse($locationDetails);
    }

    /**
     * @Route("/getUserVehicleList")
     * @Method("POST")
     */
    public function getUserVehicleListAction(Request $request)
    {
        $identifier= $request->get('identifier');
        $password = $request->get('password');



        if ($identifier == "user" & $password == "123") {
            $myResult = array( "result" => array(
                array("id" => "0000015305", "registration" => "AB01 CDE", "specification" => "(2014-)", "model" => "A3 e-tron", "make" => "Audi"  ),
                array("id" => "0000015345", "registration" => "CD03 FGH", "specification" => "(2015-)", "model" => "e-NV200 Combi", "make" => "Nissan"  ),
                array("id" => "0000016235", "registration" => "NF16 OIE", "specification" => "(2015-)", "model" => "X5 xDrive40e", "make" => "BMW"  )
            ));
        } else {
            $myResult = array( "result" => false );
        }
        return new JsonResponse($myResult);
    }
}


