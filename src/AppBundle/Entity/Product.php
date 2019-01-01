<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Product
 *
 * @ORM\Table(name="product")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProductRepository")
 */
class Product
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
      * @ORM\ManyToOne(targetEntity="Categorie")
      * @ORM\JoinColumn(nullable=false)
      */
     private $categorie;


    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=255)
     */
    private $libelle;

    /**
     * @var string
     *
     * @ORM\Column(name="texte", type="text")
     */
    private $texte;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;


    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255)
     */
    private $image;

    /**
     * @var string
     *
     * @ORM\Column(name="prix", type="string", length=255)
     */
    private $prix;

    /**
     * @var string
     *
     * @ORM\Column(name="imageprimaire", type="string", length=255)
     */
    private $imageprimaire;

    /**
     * @var string
     *
     * @ORM\Column(name="imagesecondaire", type="string", length=255)
     */
    private $imagesecondaire;
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
     * Set libelle
     *
     * @param string $libelle
     *
     * @return Product
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle
     *
     * @return string
     */
    public function getLibelle()
    {
        return $this->libelle;
    }
    /**
     * Set description
     *
     * @param string $description
     *
     * @return Product
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set texte
     *
     * @param string $texte
     *
     * @return Product
     */
    public function setTexte($texte)
    {
        $this->texte = $texte;

        return $this;
    }

    /**
     * Get texte
     *
     * @return string
     */
    public function getTexte()
    {
        return $this->texte;
    }

    /**
     * Set image
     *
     * @param string $image
     *
     * @return Product
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }
    /**
     * Set imagesecondaire
     *
     * @param string $imagesecondaire
     *
     * @return Product
     */
    public function setImagesecondaire($imagesecondaire)
    {
        $this->imagesecondaire = $imagesecondaire;

        return $this;
    }
    /**
     * Set imageprimaire
     *
     * @param string $imageprimaire
     *
     * @return Product
     */
    public function setImageprimaire($imageprimaire)
    {
        $this->imageprimaire = $imageprimaire;

        return $this;
    }

    /**
     * Get imageprimaire
     *
     * @return string
     */
    public function getImageprimaire()
    {
        return $this->imageprimaire;
    }

    /**
     * Get imagesecondaire
     *
     * @return string
     */
    public function getImagesecondaire()
    {
        return $this->imagesecondaire;
    }

    /**
     * Get 
     *image
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }
    /**
     * Set prix
     *
     * @param string $prix
     *
     * @return Product
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get prix
     *
     * @return string
     */
    public function getPrix()
    {
        return $this->prix;
    }
    /**
     * Set categorie
     *
     * @param \AppBundle\Entity\Categorie $categorie
     *
     * @return Product
     */
    public function setCategorie(\AppBundle\Entity\Categorie $categorie)
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * Get categorie
     *
     * @return \AppBundle\Entity\Categorie
     */
    public function getCategorie()
    {
        return $this->categorie;
    }
}

