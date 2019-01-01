<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProduitCommande
 *
 * @ORM\Table(name="produit_commande")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProduitCommandeRepository")
 */
class ProduitCommande
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
     * @var int
     *
     * @ORM\Column(name="qte", type="smallint")
     */
    private $qte;

    /**
     * @var string
     *
     * @ORM\Column(name="prix", type="decimal", precision=10, scale=0)
     */
    private $prix;

    /**
     *
     * @ORM\ManyToOne(targetEntity="Product")
     */
    private $product;
    /**
     *
     * @ORM\ManyToOne(targetEntity="Commande")
     */
    private $commande;


    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set qte.
     *
     * @param int $qte
     *
     * @return ProduitCommande
     */
    public function setQte($qte)
    {
        $this->qte = $qte;

        return $this;
    }

    /**
     * Get qte.
     *
     * @return int
     */
    public function getQte()
    {
        return $this->qte;
    }

    /**
     * Set prix.
     *
     * @param string $prix
     *
     * @return ProduitCommande
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get prix.
     *
     * @return string
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Set commande
     *
     * @param \AppBundle\Entity\Commande $commande
     *
     * @return ProduitCommande
     */
    public function setCommande(\AppBundle\Entity\Commande $commande)
    {
        $this->commande = $commande;

        return $this;
    }

    /**
     * Get commande
     *
     * @return \AppBundle\Entity\Commande
     */
    public function getCommande()
    {
        return $this->commande;
    }


    /**
     * Set produit
     *
     * @param \AppBundle\Entity\Product $produit
     *
     * @return ProduitCommande
     */
    public function setProduit(\AppBundle\Entity\Product $produit)
    {
        $this->produit = $produit;

        return $this;
    }

    /**
     * Get produit
     *
     * @return \AppBundle\Entity\Product
     */
    public function getProduit()
    {
        return $this->produit;
    }
}
