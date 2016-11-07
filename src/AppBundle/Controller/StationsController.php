<?php
/**
 * Created by PhpStorm.
 * User: nobuyukifujioka
 * Date: 06/11/2016
 * Time: 17:24
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class StationsController extends Controller
{
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
//        $params = json_decode($body, true);

        return new JsonResponse($myDetails);
//        return new Response($body);

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

        return new JsonResponse($locationDetails);
    }

    /**
     * @Route("/getUserVehicleList")
     * @Method("POST")
     */
    public function getUserVehicleListAction(Request $request)
    {
        $identifier= $request->get('identifier');
        $password = $request->get('password');
        $userCredentials = array(
            "identifier" => $identifier,
            "password" => $password
        );

        return new Response("User credential logged.");
    }
}


