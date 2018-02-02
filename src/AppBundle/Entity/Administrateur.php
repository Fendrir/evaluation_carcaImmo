<?php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;

use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="adm_administrateur")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AdministrateurRepository")
 */
class Administrateur extends BaseUser
{
    /**
     * @var int
     *
     * @ORM\Column(name="adm_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="adm_prenom", type="string", length=255)
     */
    private $Prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="adm_telephone", type="string", length=255)
     */
    private $Telephone;


    /**
     * Set prenom
     *
     * @param string $prenom
     *
     * @return Administrateur
     */
    public function setPrenom($prenom)
    {
        $this->Prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->Prenom;
    }

    /**
     * Set telephone
     *
     * @param string $telephone
     *
     * @return Administrateur
     */
    public function setTelephone($telephone)
    {
        $this->Telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone
     *
     * @return string
     */
    public function getTelephone()
    {
        return $this->Telephone;
    }
}
