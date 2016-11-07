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


