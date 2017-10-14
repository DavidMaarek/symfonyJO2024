<?php

namespace DavidBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Country
 *
 * @ORM\Table(name="country")
 * @ORM\Entity(repositoryClass="DavidBundle\Repository\CountryRepository")
 */
class Country
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
     * @ORM\Column(name="name", type="string", length=255)
     * @Assert\NotBlank(message = "country.name.not_blank")
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="flag", type="string")
     *
     * @Assert\NotBlank(message = "country.flag.not_blank")
     * @Assert\Image(
     *     mimeTypes = {"image/jpg", "image/jpeg", "image/png"},
     *     mimeTypesMessage = "country.flag.filetype"
     * )
     */
    private $flag;


    /**
     * @ORM\OneToMany(targetEntity="DavidBundle\Entity\Athlete", mappedBy="country", orphanRemoval=true)
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
     * @return Country
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
     * Set flag
     *
     * @param string $flag
     *
     * @return Country
     */
    public function setFlag($flag)
    {
        $this->flag = $flag;

        return $this;
    }

    /**
     * Get flag
     *
     * @return string
     */
    public function getFlag()
    {
        return $this->flag;
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

