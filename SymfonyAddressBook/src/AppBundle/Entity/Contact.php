<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Contact
 *
 * @ORM\Table(name="contact")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ContactRepository")
 */
class Contact
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     * @Assert\NotBlank(message="Le prénom est obligatoire")
     * @ORM\Column(name="prenom", type="string", length=40)
     */
    protected $prenom;

    /**
     * @var string
     * @Assert\NotBlank(message="Le nom est obligatoire")
     * @ORM\Column(name="nom", type="string", length=40)
     */
    protected $nom;

    /**
     * @var string
     * @Assert\Email(message="Vérifiez votre adresse email", strict=true)
     * @ORM\Column(name="email", type="string", length=80, nullable=true, unique=true)
     */
    protected $email;
    
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_naissance", type="date", nullable=true)
     */
    protected $dateNaissance;

    /**
     * @var Societe
     * 
     * ORM\ManyToOne(targetEntity="AppBundle\Entity\Societe", fetch="EAGER") 
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Societe") 
     */
    protected $societe;
    
    /**
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Groupe", inversedBy="contacts")
     */
    protected $groupes;

    
    public function setId($id) {
        $this->id = $id;
        return $this;
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
     * Set prenom
     *
     * @param string $prenom
     *
     * @return Contact
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Contact
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Contact
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set dateNaissance
     *
     * @param \DateTime $dateNaissance
     *
     * @return Contact
     */
    public function setDateNaissance($dateNaissance)
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    /**
     * Get dateNaissance
     *
     * @return \DateTime
     */
    public function getDateNaissance()
    {
        return $this->dateNaissance;
    }

    /**
     * Set societe
     *
     * @param \AppBundle\Entity\Societe $societe
     *
     * @return Contact
     */
    public function setSociete(\AppBundle\Entity\Societe $societe = null)
    {
        $this->societe = $societe;

        return $this;
    }

    /**
     * Get societe
     *
     * @return \AppBundle\Entity\Societe
     */
    public function getSociete()
    {
        return $this->societe;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->groupes = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add groupe
     *
     * @param \AppBundle\Entity\Groupe $groupe
     *
     * @return Contact
     */
    public function addGroupe(\AppBundle\Entity\Groupe $groupe)
    {
        $this->groupes[] = $groupe;

        return $this;
    }

    /**
     * Remove groupe
     *
     * @param \AppBundle\Entity\Groupe $groupe
     */
    public function removeGroupe(\AppBundle\Entity\Groupe $groupe)
    {
        $this->groupes->removeElement($groupe);
    }

    /**
     * Get groupes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGroupes()
    {
        return $this->groupes;
    }
}
