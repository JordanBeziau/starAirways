<?php

namespace AirwaysBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Flight
 *
 * @ORM\Table(name="flight")
 * @ORM\Entity(repositoryClass="AirwaysBundle\Repository\FlightRepository")
 */
class Flight
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="flight_code", type="string", length=5, unique=true)
     */
    private $flightCode;

    /**
     * @var string
     *
     * @ORM\Column(name="departure", type="string", length=255)
     */
    private $departure;

    /**
     * @var string
     *
     * @ORM\Column(name="arrival", type="string", length=255)
     */
    private $arrival;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="time", type="time")
     */
    private $time;

    /**
     * @var int
     *
     * @ORM\Column(name="seat", type="integer")
     */
    private $seat;

    /**
     * @var int
     *
     * @ORM\Column(name="price", type="integer")
     * @Assert\LessThanOrEqual(value=300, message="Le prix doit être compris entre 100 et 300")
     * @Assert\GreaterThanOrEqual(value=100, message="Le prix doit être compris entre 100 et 300")
     */
    private $price;

    /**
     * @var bool
     *
     * @ORM\Column(name="information", type="boolean")
     */
    private $information = false;

    /**
     * @var bool
     *
     * @ORM\Column(name="alert", type="boolean")
     */
    private $alert = false;

  /**
   * @return bool
   * @Assert\IsTrue(message="Les villes de départ et d'arrivée doivent être différentes.")
   */
  public function isDepartureDifferentThanArrival() {
    return $this->arrival != $this->departure;
    }


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set flightCode
     *
     * @param string $flightCode
     *
     * @return Flight
     */
    public function setFlightCode($flightCode)
    {
        $this->flightCode = $flightCode;

        return $this;
    }

    /**
     * Get flightCode
     *
     * @return string
     */
    public function getFlightCode()
    {
        return $this->flightCode;
    }

    /**
     * Set departure
     *
     * @param string $departure
     *
     * @return Flight
     */
    public function setDeparture($departure)
    {
        $this->departure = $departure;

        return $this;
    }

    /**
     * Get departure
     *
     * @return string
     */
    public function getDeparture()
    {
        return $this->departure;
    }

    /**
     * Set arrival
     *
     * @param string $arrival
     *
     * @return Flight
     */
    public function setArrival($arrival)
    {
        $this->arrival = $arrival;

        return $this;
    }

    /**
     * Get arrival
     *
     * @return string
     */
    public function getArrival()
    {
        return $this->arrival;
    }

    /**
     * Set time
     *
     * @param \DateTime $time
     *
     * @return Flight
     */
    public function setTime($time)
    {
        $this->time = $time;

        return $this;
    }

    /**
     * Get time
     *
     * @return \DateTime
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * Set seat
     *
     * @param integer $seat
     *
     * @return Flight
     */
    public function setSeat($seat)
    {
        $this->seat = $seat;

        return $this;
    }

    /**
     * Get seat
     *
     * @return int
     */
    public function getSeat()
    {
        return $this->seat;
    }

    /**
     * Set price
     *
     * @param integer $price
     *
     * @return Flight
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return int
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set information
     *
     * @param boolean $information
     *
     * @return Flight
     */
    public function setInformation($information)
    {
        $this->information = $information;

        return $this;
    }

    /**
     * Get information
     *
     * @return bool
     */
    public function getInformation()
    {
        return $this->information;
    }

    /**
     * Set alert
     *
     * @param boolean $alert
     *
     * @return Flight
     */
    public function setAlert($alert)
    {
        $this->alert = $alert;

        return $this;
    }

    /**
     * Get alert
     *
     * @return bool
     */
    public function getAlert()
    {
        return $this->alert;
    }
}
