<?php
/**
 * Created by PhpStorm.
 * User: nobuyukifujioka
 * Date: 10/11/2016
 * Time: 14:44
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="pump")
 */
class Pump
{
    private $id;

    private $status;

    private $latitude;

    private $longitude;

    private $name;

    private $postcode;

    private $location;

    private $pumpId;

    private $lastHeartbeat;

    private $pumpModel;

    private $connector;


}