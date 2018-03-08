<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cliente
 *
 * @ORM\Table(name="cliente")
 * @ORM\Entity
 */
class Cliente
{
    /**
     * @var string
     *
     * @ORM\Column(name="codigosap", type="string", length=10, nullable=false)
     */
    private $codigosap;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255, nullable=false)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo", type="string", length=255, nullable=true)
     */
    private $tipo;

    /**
     * @var string
     *
     * @ORM\Column(name="facultad", type="string", length=255, nullable=true)
     */
    private $facultad;

    /**
     * @var string
     *
     * @ORM\Column(name="departamento", type="string", length=255, nullable=true)
     */
    private $departamento;

    /**
     * @var string
     *
     * @ORM\Column(name="direccion", type="string", length=255, nullable=true)
     */
    private $direccion;

    /**
     * @var string
     *
     * @ORM\Column(name="zip", type="string", length=5, nullable=true)
     */
    private $zip;

    /**
     * @var string
     *
     * @ORM\Column(name="ciudad", type="string", length=255, nullable=true)
     */
    private $ciudad;

    /**
     * @var string
     *
     * @ORM\Column(name="fechaalta", type="datetime", nullable=true)
     */   
    private $fechaalta;

    /**
     * @var string
     *
     * @ORM\Column(name="eshospital", type="boolean", nullable=true)
     */     
    private $eshospital;

    /**
     * @var string
     *
     * @ORM\Column(name="clientede", type="string",length=255, nullable=true)
     */     
    private $clientede;
    
    /**
     * @var string
     *
     * @ORM\Column(name="status", type="boolean", nullable=true)
     */  
    private $status;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set codigosap
     *
     * @param string $codigosap
     *
     * @return Cliente
     */
    public function setCodigosap($codigosap)
    {
        $this->codigosap = $codigosap;

        return $this;
    }

    /**
     * Get codigosap
     *
     * @return string
     */
    public function getCodigosap()
    {
        return $this->codigosap;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Cliente
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set tipo
     *
     * @param string $tipo
     *
     * @return Cliente
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get tipo
     *
     * @return string
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set facultad
     *
     * @param string $facultad
     *
     * @return Cliente
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
     * @return Cliente
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
     * Set direccion
     *
     * @param string $direccion
     *
     * @return Cliente
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

    /**
     * Set zip
     *
     * @param string $zip
     *
     * @return Cliente
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
     * @return Cliente
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
     * Set fechaalta
     *
     * @param string $fechaalta
     *
     * @return Cliente
     */
    public function setFechaalta($fechaalta)
    {
        if ($fechaalta != "") {
            $this->fechaalta = $fechaalta;
        } else {
            $this->fechaalta = new \DateTime(date("Y-m-d H:i:s",time()));
        }

        return $this;
    }

    /**
     * Get fechaalta
     *
     * @return datetime
     */
    public function getFechaalta()
    {
        return $this->fechaalta;
    }
 
    
     /**
     * Set status
     *
     * @param string $status
     *
     * @return Cliente
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get fechaalta
     *
     * @return datetime
     */
    public function getStatus()
    {
        return $this->status;
    }
    
    /**
     * Set eshospital
     *
     * @param string $eshospital
     *
     * @return Cliente
     */
    public function setEshospital($eshospital)
    {
        $this->eshospital = $eshospital;

        return $this;
    }

    /**
     * Get eshospital
     *
     * @return boolean
     */
    public function getEshospital()
    {
        return $this->eshospital;
    }
    
    /**
     * Set eshospital
     *
     * @param string $eshospital
     *
     * @return Cliente
     */
    public function setClientede($clientede)
    {
        $this->clientede = $clientede;

        return $this;
    }

    /**
     * Get eshospital
     *
     * @return boolean
     */
    public function getClientede()
    {
        return $this->clientede;
    }    
    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
}
