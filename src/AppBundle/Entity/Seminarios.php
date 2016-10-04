<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Seminarios
 *
 * @ORM\Table(name="seminarios")
 * @ORM\Entity
 */
class Seminarios
{
    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=false)
     */
    private $title;

    /**
     * @var boolean
     *
     * @ORM\Column(name="visible", type="boolean", nullable=true)
     */
    private $visible;

    /**
     * @var string
     *
     * @ORM\Column(name="summary", type="text", nullable=false)
     */
    private $summary;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text", nullable=false)
     */
    private $content;

    /**
     * @var string
     *
     * @ORM\Column(name="source", type="string", length=255, nullable=false)
     */
    private $source;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdate", type="datetime", nullable=false)
     */
    private $createdate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="editdate", type="datetime", nullable=false)
     */
    private $editdate;

    /**
     * @var boolean
     *
     * @ORM\Column(name="hasimage", type="boolean", nullable=false)
     */
    private $hasimage;

    /**
     * @var string
     *
     * @ORM\Column(name="imagesource", type="string", length=255, nullable=false)
     */
    private $imagesource;

    /**
     * @var boolean
     *
     * @ORM\Column(name="hasdocument", type="boolean", nullable=false)
     */
    private $hasdocument;

    /**
     * @var string
     *
     * @ORM\Column(name="documentsource", type="string", length=255, nullable=false)
     */
    private $documentsource;

    /**
     * @var string
     *
     * @ORM\Column(name="aforo", type="string", length=255, nullable=false)
     */
    private $aforo;

    /**
     * @var string
     *
     * @ORM\Column(name="preinscripcion", type="string", length=255, nullable=false)
     */
    private $preinscripcion;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set title
     *
     * @param string $title
     *
     * @return Seminarios
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set visible
     *
     * @param boolean $visible
     *
     * @return Seminarios
     */
    public function setVisible($visible)
    {
        $this->visible = $visible;

        return $this;
    }

    /**
     * Get visible
     *
     * @return boolean
     */
    public function getVisible()
    {
        return $this->visible;
    }

    /**
     * Set summary
     *
     * @param string $summary
     *
     * @return Seminarios
     */
    public function setSummary($summary)
    {
        $this->summary = $summary;

        return $this;
    }

    /**
     * Get summary
     *
     * @return string
     */
    public function getSummary()
    {
        return $this->summary;
    }

    /**
     * Set content
     *
     * @param string $content
     *
     * @return Seminarios
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set source
     *
     * @param string $source
     *
     * @return Seminarios
     */
    public function setSource($source)
    {
        $this->source = $source;

        return $this;
    }

    /**
     * Get source
     *
     * @return string
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * Set createdate
     *
     * @param \DateTime $createdate
     *
     * @return Seminarios
     */
    public function setCreatedate($createdate)
    {
        $this->createdate = $createdate;

        return $this;
    }

    /**
     * Get createdate
     *
     * @return \DateTime
     */
    public function getCreatedate()
    {
        return $this->createdate;
    }

    /**
     * Set editdate
     *
     * @param \DateTime $editdate
     *
     * @return Seminarios
     */
    public function setEditdate($editdate)
    {
        $this->editdate = $editdate;

        return $this;
    }

    /**
     * Get editdate
     *
     * @return \DateTime
     */
    public function getEditdate()
    {
        return $this->editdate;
    }

    /**
     * Set hasimage
     *
     * @param boolean $hasimage
     *
     * @return Seminarios
     */
    public function setHasimage($hasimage)
    {
        $this->hasimage = $hasimage;

        return $this;
    }

    /**
     * Get hasimage
     *
     * @return boolean
     */
    public function getHasimage()
    {
        return $this->hasimage;
    }

    /**
     * Set imagesource
     *
     * @param string $imagesource
     *
     * @return Seminarios
     */
    public function setImagesource($imagesource)
    {
        $this->imagesource = $imagesource;

        return $this;
    }

    /**
     * Get imagesource
     *
     * @return string
     */
    public function getImagesource()
    {
        return $this->imagesource;
    }

    /**
     * Set hasdocument
     *
     * @param boolean $hasdocument
     *
     * @return Seminarios
     */
    public function setHasdocument($hasdocument)
    {
        $this->hasdocument = $hasdocument;

        return $this;
    }

    /**
     * Get hasdocument
     *
     * @return boolean
     */
    public function getHasdocument()
    {
        return $this->hasdocument;
    }

    /**
     * Set documentsource
     *
     * @param string $documentsource
     *
     * @return Seminarios
     */
    public function setDocumentsource($documentsource)
    {
        $this->documentsource = $documentsource;

        return $this;
    }

    /**
     * Get documentsource
     *
     * @return string
     */
    public function getDocumentsource()
    {
        return $this->documentsource;
    }

    /**
     * Set aforo
     *
     * @param string $aforo
     *
     * @return Seminarios
     */
    public function setAforo($aforo)
    {
        $this->aforo = $aforo;

        return $this;
    }

    /**
     * Get aforo
     *
     * @return string
     */
    public function getAforo()
    {
        return $this->aforo;
    }

    /**
     * Set preinscripcion
     *
     * @param string $preinscripcion
     *
     * @return Seminarios
     */
    public function setPreinscripcion($preinscripcion)
    {
        $this->preinscripcion = $preinscripcion;

        return $this;
    }

    /**
     * Get preinscripcion
     *
     * @return string
     */
    public function getPreinscripcion()
    {
        return $this->preinscripcion;
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
