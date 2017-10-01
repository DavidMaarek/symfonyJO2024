<?php

namespace DavidBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Discipline
 *
 * @ORM\Table(name="discipline")
 * @ORM\Entity(repositoryClass="DavidBundle\Repository\DisciplineRepository")
 */
class Discipline
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
     * @ORM\Column(name="name", type="string", length=255, unique=true)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="DavidBundle\Entity\Athlete", mappedBy="discipline")
     */
    private $athletes;


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
     * Set name
     *
     * @param string $name
     *
     * @return Discipline
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
     * @return mixed
     */
    public function getAthletes()
    {
        return $this->athletes;
    }

    /**
     * @param mixed $athletes
     */
    public function setAthletes($athletes)
    {
        $this->athletes = $athletes;
    }


}

