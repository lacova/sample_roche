<?php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * FosUser
 *
 * @ORM\Table(name="fos_user", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_957A647992FC23A8", columns={"username_canonical"}), @ORM\UniqueConstraint(name="UNIQ_957A6479A0D96FBF", columns={"email_canonical"}), @ORM\UniqueConstraint(name="UNIQ_957A6479C05FB297", columns={"confirmation_token"})})
 * @ORM\Entity
 */
class FosUser extends BaseUser
{

    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="surname", type="string", length=255, nullable=false)
     */
    private $surname;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=15, nullable=false)
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="fax", type="string", length=15, nullable=false)
     */
    private $fax;

    /**
     * @var string
     *
     * @ORM\Column(name="phoneext", type="string", length=10, nullable=false)
     */
    private $phoneext;

    /**
     * @var string
     *
     * @ORM\Column(name="center", type="string", length=255, nullable=false)
     */
    private $center;

    /**
     * @var string
     *
     * @ORM\Column(name="facultad", type="string", length=255, nullable=false)
     */
    private $facultad;

    /**
     * @var string
     *
     * @ORM\Column(name="departamento", type="string", length=255, nullable=false)
     */
    private $departamento;

    /**
     * @var string
     *
     * @ORM\Column(name="zip", type="string", length=5, nullable=false)
     */
    private $zip;

    /**
     * @var string
     *
     * @ORM\Column(name="ciudad", type="string", length=255, nullable=false)
     */
    private $ciudad;

    /**
     * @var string
     *
     * @ORM\Column(name="direccion", type="string", length=255, nullable=false)
     */
    private $direccion;

    /**
     * Set name
     *
     * @param string $name
     *
     * @return FosUser
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set surname
     *
     * @param string $surname
     *
     * @return FosUser
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;

        return $this;
    }

    /**
     * Get surname
     *
     * @return string
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * Set phone
     *
     * @param string $phone
     *
     * @return FosUser
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set fax
     *
     * @param string $fax
     *
     * @return FosUser
     */
    public function setFax($fax)
    {
        $this->fax = $fax;

        return $this;
    }

    /**
     * Get fax
     *
     * @return string
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * Set phoneext
     *
     * @param string $phoneext
     *
     * @return FosUser
     */
    public function setPhoneext($phoneext)
    {
        $this->phoneext = $phoneext;

        return $this;
    }

    /**
     * Get phoneext
     *
     * @return string
     */
    public function getPhoneext()
    {
        return $this->phoneext;
    }

    /**
     * Set center
     *
     * @param string $center
     *
     * @return FosUser
     */
    public function setCenter($center)
    {
        $this->center = $center;

        return $this;
    }

    /**
     * Get center
     *
     * @return string
     */
    public function getCenter()
    {
        return $this->center;
    }

    /**
     * Set facultad
     *
     * @param string $facultad
     *
     * @return FosUser
     */
    public function setFacultad($facultad)
    {
        $this->facultad = $facultad;

        return $this;
    }

    /**
     * Get facultad
     *
     * @return string
     */
    public function getFacultad()
    {
        return $this->facultad;
    }

    /**
     * Set departamento
     *
     * @param string $departamento
     *
     * @return FosUser
     */
    public function setDepartamento($departamento)
    {
        $this->departamento = $departamento;

        return $this;
    }

    /**
     * Get departamento
     *
     * @return string
     */
    public function getDepartamento()
    {
        return $this->departamento;
    }

    /**
     * Set zip
     *
     * @param string $zip
     *
     * @return FosUser
     */
    public function setZip($zip)
    {
        $this->zip = $zip;

        return $this;
    }

    /**
     * Get zip
     *
     * @return string
     */
    public function getZip()
    {
        return $this->zip;
    }

    /**
     * Set ciudad
     *
     * @param string $ciudad
     *
     * @return FosUser
     */
    public function setCiudad($ciudad)
    {
        $this->ciudad = $ciudad;

        return $this;
    }

    /**
     * Get ciudad
     *
     * @return string
     */
    public function getCiudad()
    {
        return $this->ciudad;
    }

    /**
     * Set direccion
     *
     * @param string $direccion
     *
     * @return FosUser
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }

    /**
     * Get direccion
     *
     * @return string
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

}
