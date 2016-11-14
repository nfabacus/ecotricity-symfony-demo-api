<?php
/**
 * Created by PhpStorm.
 * User: nobuyukifujioka
 * Date: 13/11/2016
 * Time: 05:03
 */

namespace AppBundle\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="connector")
 */
class Connector
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $connectorId;

    /**
     * @ORM\Column(type="string")
     */
    private $compatible;

    /**
     * @ORM\Column(type="string")
     */
    private $type;

    /**
     * @ORM\Column(type="string")
     */
    private $status;

    /**
     * @ORM\Column(type="string")
     */
    private $name;

    /**
     * @ORM\Column(type="string")
     */
    private $sessionDuration;


    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\ManyToOne(targetEntity="pump")
     */
    private $pump;

    /**
     * @return mixed
     */
    public function getConnectorId()
    {
        return $this->connectorId;
    }

    /**
     * @return mixed
     */
    public function getCompatible()
    {
        return $this->compatible;
    }

    /**
     * @param mixed $compatible
     */
    public function setCompatible($compatible)
    {
        $this->compatible = $compatible;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getSessionDuration()
    {
        return $this->sessionDuration;
    }

    /**
     * @param mixed $sessionDuration
     */
    public function setSessionDuration($sessionDuration)
    {
        $this->sessionDuration = $sessionDuration;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param mixed $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return mixed
     */
    public function getPump()
    {
        return $this->pump;
    }

    /**
     * @param mixed $pump
     */
    public function setPump(Pump $pump)
    {
        $this->pump = $pump;
    }


}