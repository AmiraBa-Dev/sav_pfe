<?php

namespace App\Entity;

use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\Exclude;
use JMS\Serializer\Annotation\Groups;

/**
 * SaleSav
 *
 * @ORM\Table(name="mz_sale_sav")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SaleSavRepository")
 */
class SaleSav
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @Groups({"sav"})
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="canal", type="string", length=255)
     * @Groups({"sav"})
     */
    private $canal;

    /**
     * @var string
     *
     * @ORM\Column(name="customer_name", type="string", length=255, nullable=true)
     * @Groups({"sav"})
     */
    private $customerName;

    /**
     * @var string
     *
     * @ORM\Column(name="sale_ref", type="string", length=255, nullable=true)
     * @Groups({"sav"})
     */
    private $saleRef;

	/**
     * @var bool
     *
     * @ORM\Column(name="from_canceled", type="boolean", nullable=true)
     * @Groups({"sav"})
     */
    private $fromCanceled;

    /**
     * @var string
     *
     * @ORM\Column(name="customer_email", type="string", length=255 , nullable=true)
     * @Groups({"sav"})
     */
    private $customerEmail;

    /**
     * @var string
     *
     * @ORM\Column(name="customer_phone", type="string", length=255 , nullable=true)
     * @Groups({"sav"})
     */
    private $customerPhone;

    /**
     * @var string
     *
     * @ORM\Column(name="sale_date", type="string", length=255, nullable=true)
     * @Groups({"sav"})
     */
    private $saleDate;

    /**
     * @var string
     *
     * @ORM\Column(name="product_name", type="text", nullable=true)
     * @Groups({"sav"})
     */
    private $productName;

    /**
     * @var string
     *
     * @ORM\Column(name="product_sku", type="text", nullable=true)
     * @Groups({"sav"})
     */
    private $productSku;

    /**
     * @var string
     *
     * @ORM\Column(name="product_qty", type="text", nullable=true)
     * @Groups({"sav"})
     */
    private $productQty;

    /**
     * @var string
     *
     * @ORM\Column(name="product_stock", type="text", nullable=true)
     * @Groups({"sav"})
     */
    private $productStock;

    /**
     * @var string
     *
     * @ORM\Column(name="order_tot", type="decimal", precision=12, scale=4, nullable=true)
     * @Groups({"sav"})
     */
    private $orderTot;

    /**
     * @var string
     *
     * @ORM\Column(name="shipment_tot", type="decimal", precision=12, scale=4, nullable=true)
     * @Groups({"sav"})
     */
    private $shipmentTot;

    /**
     * @var string
     *
     * @ORM\Column(name="shipping_name", type="string", length=255, nullable=true)
     * @Groups({"sav"})
     */
    private $shippingName;

    /**
     * @var string
     *
     * @ORM\Column(name="payment_method", type="string", length=255, nullable=true)
     * @Groups({"sav"})
     */
    private $paymentMethod;

    /**
     * @var string
     *
     * @ORM\Column(name="discount_code", type="string", length=255, nullable=true)
     * @Groups({"sav"})
     */
    private $discountCode;

    /**
     * @var string
     *
     * @ORM\Column(name="discount_amount", type="decimal", precision=12, scale=4, nullable=true)
     * @Groups({"sav"})
     */
    private $discountAmount;


	/**
     * @var string
     *
     * @ORM\Column(name="status", type="integer", nullable=true)
     * @Groups({"sav"})
     */
    private $status;


    /**
     * @var DateTime
     *
     * @ORM\Column(name="claim_date", type="datetime", nullable=true)
     * @Groups({"sav"})
     */
    private $claimDate;

	/**
     * @var DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=true)
     * @Groups({"sav"})
     */
    private $createdAt;

	/**
     * @var DateTime
     *
     * @ORM\Column(name="delivery_date", type="datetime", nullable=true)
     * @Groups({"sav"})
     */
    private $deliveryDate;

	/**
     * @var string
     *
     * @ORM\Column(name="photo", type="text", nullable=true)
     * @Groups({"sav"})
     */
    private $photo;

	/**
     * @var int
     *
     * @ORM\Column(name="reserve", type="string", length=255, nullable=true)
     * @Groups({"sav"})
     */
    private $reserve;

	/**
     * @var int
     *
     * @ORM\Column(name="litige", type="string", length=255, nullable=true)
     * @Groups({"sav"})
     */
    private $litige;

	/**
     * @var int
     *
     * @ORM\Column(name="final_litige", type="string", length=255, nullable=true)
     * @Groups({"sav"})
     */
    private $finalLitige;

	/**
     * @var int
     *
     * @ORM\Column(name="transporteur", type="string", length=255, nullable=true)
     * @Groups({"sav"})
     */
    private $transporteur;


	/**
     * @var int
     *
     * @ORM\Column(name="num_recep", type="string", length=255, nullable=true)
     * @Groups({"sav"})
     */
    private $numRecep;

	/**
     * @var int
     *
     * @ORM\Column(name="type_pb", type="string", length=255, nullable=true)
     * @Groups({"sav"})
     */
    private $typePb;

	/**
     * @var int
     *
     * @ORM\Column(name="proposition", type="text", nullable=true)
     * @Groups({"sav"})
     */
    private $proposition;


	/**
     * @var int
     *
     * @ORM\Column(name="observation", type="text", nullable=true)
     * @Groups({"sav"})
     */
    private $observation;

	/**
     * @var int
     *
     * @ORM\Column(name="final_action", type="string", length=255, nullable=true)
     * @Groups({"sav"})
     */
    private $finalAction;

	/**
     * @var int
     *
     * @ORM\Column(name="final_final_action", type="string", length=255, nullable=true)
     * @Groups({"sav"})
     */
    private $finalFinalAction;

	/**
     * @var int
     *
     * @ORM\Column(name="retour", type="string", length=255, nullable=true)
     * @Groups({"sav"})
     */
    private $retour;

	/**
     * @var DateTime
     *
     * @ORM\Column(name="validation_date", type="datetime", nullable=true)
     * @Groups({"sav"})
     */
    private $validationDate;

	/**
     * @var int
     *
     * @ORM\Column(name="date_retour", type="string", length=255, nullable=true)
     * @Groups({"sav"})
     */
    private $dateRetour;

	/**
     * @var int
     *
     * @ORM\Column(name="mode_remboursement", type="string", length=255, nullable=true)
     * @Groups({"sav"})
     */
    private $modeRemboursement;

	/**
	 * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User")
	 * @ORM\JoinColumn(nullable=true)
     * @exclude
	 */
	private $user;

    /**
     * @ORM\OneToOne(targetEntity="Refund")
	 * @ORM\JoinColumn(name="refund_id", referencedColumnName="id", onDelete="CASCADE")
     * @exclude
     */
    private $refund;


    /**
     * @var int
     *
     * @ORM\Column(name="num_retour", type="string", length=255, nullable=true)
     * @Groups({"sav"})
     */
    private $numRetour;

    /**
     * @var bool
     *
     * @ORM\Column(name="priority", type="boolean", nullable=true, options={"default": 0})
     * @Groups({"sav"})
     */
    private $priority;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Sale")
     * @ORM\JoinColumn(nullable=true)
     * @Exclude
     */
    private $sale;

    /**
     * @ORM\ManyToMany(targetEntity="SaleProduct", inversedBy="saleSavs", cascade={"persist"})
     * @Exclude
     */
    private $saleProducts;

    /**
     * @var string
     *
     * @ORM\Column(name="return_carrier", type="string", length=255, nullable=true)
     * @Groups({"sav"})
     */
    private $returnCarrier;

    /**
     * @var string
     *
     * @ORM\Column(name="num_check", type="text", nullable=true)
     */
    private $numCheque;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="date_check", type="datetime", nullable=true)
     */
    private $dateCheck;

    /**
     * @var string
     *
     * @ORM\Column(name="check_bank", type="text", nullable=true)
     */
    private $checkBank;













    /**
     * @return string
     */
    public function getReturnCarrier(): ?string
    {
        return $this->returnCarrier;
    }

    /**
     * @param string $returnCarrier
     */
    public function setReturnCarrier($returnCarrier): self
    {
        $this->returnCarrier = $returnCarrier;
        return $this;
    }


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->saleProducts = new ArrayCollection();

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
     * Set canal
     *
     * @param string $canal
     *
     * @return SaleSav
     */
    public function setCanal($canal)
    {
        $this->canal = $canal;

        return $this;
    }

    /**
     * Get canal
     *
     * @return string
     */
    public function getCanal()
    {
        return $this->canal;
    }

    /**
     * Set customerName
     *
     * @param string $customerName
     *
     * @return SaleSav
     */
    public function setCustomerName($customerName)
    {
        $this->customerName = $customerName;

        return $this;
    }

    /**
     * Get customerName
     *
     * @return string
     */
    public function getCustomerName()
    {
        return $this->customerName;
    }

    /**
     * Set saleRef
     *
     * @param string $saleRef
     *
     * @return SaleSav
     */
    public function setSaleRef($saleRef)
    {
        $this->saleRef = $saleRef;

        return $this;
    }

    /**
     * Get saleRef
     *
     * @return string
     */
    public function getSaleRef()
    {
        return $this->saleRef;
    }

    /**
     * Set customerEmail
     *
     * @param string $customerEmail
     *
     * @return SaleSav
     */
    public function setCustomerEmail($customerEmail)
    {
        $this->customerEmail = $customerEmail;

        return $this;
    }

    /**
     * Get customerEmail
     *
     * @return string
     */
    public function getCustomerEmail()
    {
        return $this->customerEmail;
    }

    /**
     * Set customerPhone
     *
     * @param string $customerPhone
     *
     * @return SaleSav
     */
    public function setCustomerPhone($customerPhone)
    {
        $this->customerPhone = $customerPhone;

        return $this;
    }

    /**
     * Get customerPhone
     *
     * @return string
     */
    public function getCustomerPhone()
    {
        return $this->customerPhone;
    }

    /**
     * Set saleDate
     *
     * @param string $saleDate
     *
     * @return SaleSav
     */
    public function setSaleDate($saleDate)
    {
        $this->saleDate = $saleDate;

        return $this;
    }

    /**
     * Get saleDate
     *
     * @return string
     */
    public function getSaleDate()
    {
        return $this->saleDate;
    }

    /**
     * Set productName
     *
     * @param string $productName
     *
     * @return SaleSav
     */
    public function setProductName($productName)
    {
        $this->productName = $productName;

        return $this;
    }

    /**
     * Get productName
     *
     * @return string
     */
    public function getProductName()
    {
        return $this->productName;
    }

    /**
     * Set productSku
     *
     * @param string $productSku
     *
     * @return SaleSav
     */
    public function setProductSku($productSku)
    {
        $this->productSku = $productSku;

        return $this;
    }

    /**
     * Get productSku
     *
     * @return string
     */
    public function getProductSku()
    {
        return $this->productSku;
    }

    /**
     * Set productQty
     *
     * @param string $productQty
     *
     * @return SaleSav
     */
    public function setProductQty($productQty)
    {
        $this->productQty = $productQty;

        return $this;
    }

    /**
     * Get productQty
     *
     * @return string
     */
    public function getProductQty()
    {
        return $this->productQty;
    }

    /**
     * Set productStock
     *
     * @param string $productStock
     *
     * @return SaleSav
     */
    public function setProductStock($productStock)
    {
        $this->productStock = $productStock;

        return $this;
    }

    /**
     * Get productStock
     *
     * @return string
     */
    public function getProductStock()
    {
        return $this->productStock;
    }

    /**
     * Set orderTot
     *
     * @param string $orderTot
     *
     * @return SaleSav
     */
    public function setOrderTot($orderTot)
    {
        $this->orderTot = $orderTot;

        return $this;
    }

    /**
     * Get orderTot
     *
     * @return string
     */
    public function getOrderTot()
    {
        return $this->orderTot;
    }

    /**
     * Set shipmentTot
     *
     * @param string $shipmentTot
     *
     * @return SaleSav
     */
    public function setShipmentTot($shipmentTot)
    {
        $this->shipmentTot = $shipmentTot;

        return $this;
    }

    /**
     * Get shipmentTot
     *
     * @return string
     */
    public function getShipmentTot()
    {
        return $this->shipmentTot;
    }

    /**
     * Set shippingName
     *
     * @param string $shippingName
     *
     * @return SaleSav
     */
    public function setShippingName($shippingName)
    {
        $this->shippingName = $shippingName;

        return $this;
    }

    /**
     * Get shippingName
     *
     * @return string
     */
    public function getShippingName()
    {
        return $this->shippingName;
    }

    /**
     * Set paymentMethod
     *
     * @param string $paymentMethod
     *
     * @return SaleSav
     */
    public function setPaymentMethod($paymentMethod)
    {
        $this->paymentMethod = $paymentMethod;

        return $this;
    }

    /**
     * Get paymentMethod
     *
     * @return string
     */
    public function getPaymentMethod()
    {
        return $this->paymentMethod;
    }

    /**
     * Set discountCode
     *
     * @param string $discountCode
     *
     * @return SaleSav
     */
    public function setDiscountCode($discountCode)
    {
        $this->discountCode = $discountCode;

        return $this;
    }

    /**
     * Get discountCode
     *
     * @return string
     */
    public function getDiscountCode()
    {
        return $this->discountCode;
    }

    /**
     * Set discountAmount
     *
     * @param string $discountAmount
     *
     * @return SaleSav
     */
    public function setDiscountAmount($discountAmount)
    {
        $this->discountAmount = $discountAmount;

        return $this;
    }

    /**
     * Get discountAmount
     *
     * @return string
     */
    public function getDiscountAmount()
    {
        return $this->discountAmount;
    }

    /**
     * Set createdAt
     *
     * @param DateTime $createdAt
     *
     * @return SaleSav
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set status
     *
     * @param integer $status
     *
     * @return SaleSav
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return integer
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set user
     *
     * @param \UserBundle\Entity\User $user
     *
     * @return SaleSav
     */
    public function setUser(\UserBundle\Entity\User $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \UserBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set claimDate
     *
     * @param DateTime $claimDate
     *
     * @return SaleSav
     */
    public function setClaimDate($claimDate)
    {
        $this->claimDate = $claimDate;

        return $this;
    }

    /**
     * Get claimDate
     *
     * @return DateTime
     */
    public function getClaimDate()
    {
        return $this->claimDate;
    }



    /**
     * Set deliveryDate
     *
     * @param DateTime $deliveryDate
     *
     * @return SaleSav
     */
    public function setDeliveryDate($deliveryDate)
    {
        $this->deliveryDate = $deliveryDate;

        return $this;
    }

    /**
     * Get deliveryDate
     *
     * @return DateTime
     */
    public function getDeliveryDate()
    {
        return $this->deliveryDate;
    }

    /**
     * Set photo
     *
     * @param string $photo
     *
     * @return SaleSav
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * Get photo
     *
     * @return string
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * Set reserve
     *
     * @param string $reserve
     *
     * @return SaleSav
     */
    public function setReserve($reserve)
    {
        $this->reserve = $reserve;

        return $this;
    }

    /**
     * Get reserve
     *
     * @return string
     */
    public function getReserve()
    {
        return $this->reserve;
    }

    /**
     * Set litige
     *
     * @param string $litige
     *
     * @return SaleSav
     */
    public function setLitige($litige)
    {
        $this->litige = $litige;

        return $this;
    }

    /**
     * Get litige
     *
     * @return string
     */
    public function getLitige()
    {
        return $this->litige;
    }

    /**
     * Set finalLitige
     *
     * @param string $finalLitige
     *
     * @return SaleSav
     */
    public function setFinalLitige($finalLitige)
    {
        $this->finalLitige = $finalLitige;

        return $this;
    }

    /**
     * Get finalLitige
     *
     * @return string
     */
    public function getFinalLitige()
    {
        return $this->finalLitige;
    }

    /**
     * Set transporteur
     *
     * @param string $transporteur
     *
     * @return SaleSav
     */
    public function setTransporteur($transporteur)
    {
        $this->transporteur = $transporteur;

        return $this;
    }

    /**
     * Get transporteur
     *
     * @return string
     */
    public function getTransporteur()
    {
        return $this->transporteur;
    }

    /**
     * Set numRecep
     *
     * @param string $numRecep
     *
     * @return SaleSav
     */
    public function setNumRecep($numRecep)
    {
        $this->numRecep = $numRecep;

        return $this;
    }

    /**
     * Get numRecep
     *
     * @return string
     */
    public function getNumRecep()
    {
        return $this->numRecep;
    }

    /**
     * Set typePb
     *
     * @param string $typePb
     *
     * @return SaleSav
     */
    public function setTypePb($typePb)
    {
        $this->typePb = $typePb;

        return $this;
    }

    /**
     * Get typePb
     *
     * @return string
     */
    public function getTypePb()
    {
        return $this->typePb;
    }

    /**
     * Set proposition
     *
     * @param string $proposition
     *
     * @return SaleSav
     */
    public function setProposition($proposition)
    {
        $this->proposition = $proposition;

        return $this;
    }

    /**
     * Get proposition
     *
     * @return string
     */
    public function getProposition()
    {
        return $this->proposition;
    }

    /**
     * Set observation
     *
     * @param string $observation
     *
     * @return SaleSav
     */
    public function setObservation($observation)
    {
        $this->observation = $observation;

        return $this;
    }

    /**
     * Get observation
     *
     * @return string
     */
    public function getObservation()
    {
        return $this->observation;
    }

    /**
     * Set finalAction
     *
     * @param string $finalAction
     *
     * @return SaleSav
     */
    public function setFinalAction($finalAction)
    {
        $this->finalAction = $finalAction;

        return $this;
    }

    /**
     * Get finalAction
     *
     * @return string
     */
    public function getFinalAction()
    {
        return $this->finalAction;
    }

    /**
     * Set finalFinalAction
     *
     * @param string $finalFinalAction
     *
     * @return SaleSav
     */
    public function setFinalFinalAction($finalFinalAction)
    {
        $this->finalFinalAction = $finalFinalAction;

        return $this;
    }

    /**
     * Get finalFinalAction
     *
     * @return string
     */
    public function getFinalFinalAction()
    {
        return $this->finalFinalAction;
    }

    /**
     * Set retour
     *
     * @param string $retour
     *
     * @return SaleSav
     */
    public function setRetour($retour)
    {
        $this->retour = $retour;

        return $this;
    }

    /**
     * Get retour
     *
     * @return string
     */
    public function getRetour()
    {
        return $this->retour;
    }

    /**
     * Set dateRetour
     *
     * @param string $dateRetour
     *
     * @return SaleSav
     */
    public function setDateRetour($dateRetour)
    {
        $this->dateRetour = $dateRetour;

        return $this;
    }

    /**
     * Get dateRetour
     *
     * @return string
     */
    public function getDateRetour()
    {
        return $this->dateRetour;
    }

    /**
     * Set modeRemboursement
     *
     * @param string $modeRemboursement
     *
     * @return SaleSav
     */
    public function setModeRemboursement($modeRemboursement)
    {
        $this->modeRemboursement = $modeRemboursement;

        return $this;
    }

    /**
     * Get modeRemboursement
     *
     * @return string
     */
    public function getModeRemboursement()
    {
        return $this->modeRemboursement;
    }


	public function getDeliveryMethod($method = null)
	{

		$data =[
			'RETRAIT' => 'RETRAIT',
			'TDL' => 'TDL',
			'SIC' => 'SIC',
			'TNT' => 'TNT',
			'VIR' => 'VIR',
			'ECO IDF' => 'ECO IDF',
			'IDF PLUS' => 'IDF PLUS',
			'CALBERSON' => 'CALBERSON',
            'CHRONOPOST'=> 'CHRONOPOST',

		];
		if($method)
			return $data[$method];
		else
			return $data;

	}


	public function getTypePbl($method = null)
	{

		$data =[
            'annulation avt expe'               => 'annulation avt expe',
            'annulaton apres expe'              => 'annulaton apres expe',
            'défaut fabrication'                => 'défaut fabrication',
            'erreur coloris logidav'            => 'erreur coloris logidav',
            'erreur fournisseur'                => 'erreur fournisseur',
            'erreur logidav'                    => 'erreur logidav',
            'erreur produit logidav'            => 'erreur produit logidav',
            'garantie'                          => 'garantie',
            'mécanisme'                         => 'mécanisme',
            'modification coloris'              => 'modification coloris',
            'modifiction produit'               => 'modifiction produit',
            'oubli logidav'                     => 'oubli logidav',
            'oublie de code promo'              => 'oublie de code promo',
            'petit defaut'                      => 'petit defaut',
            'rattrapage de commande'            => 'rattrapage de commande',
            'refus a la liv car annulation'     => 'refus a la liv car annulation',
            'refus a la liv casse'              => 'refus a la liv casse',
            'refus a la liv defaut'             => 'refus a la liv defaut',
            'retard de liv logidav'             => 'retard de liv logidav',
            'retard de liv trsp'                => 'retard de liv trsp',
           // 'retard logidav'                    => 'retard logidav',
            'retard produit'                    => 'retard produit',
            'rétractation'                      => 'rétractation',
            'rétractation partiel'              => 'rétractation partiel',
            'souci transporteur'                => 'souci transporteur',
            'soucis de Transport - absence du client a la livraison' => 'soucis de Transport - absence du client a la livraison',
            'soucis de Transport - casse' => 'soucis de Transport - casse',
            'soucis de Transport - colis non récupéré par le client' => 'soucis de Transport - colis non récupéré par le client',
            'soucis de Transport - colis perdus' => 'soucis de Transport - colis perdus',
            'soucis de transport - défaut de fabrication' => 'soucis de transport - défaut de fabrication',
            'soucis de Transport - mauvaise destination du transporteur' => 'soucis de Transport - mauvaise destination du transporteur',

		];
		if($method)
			return $data[$method];
		else
			return $data;

	}

	public function getModeRemb($method = null)
	{

		$data =[
            "PaylineCPT"=>"PaylineCPT",
			"Cheque"=>"Cheque",
			"paybox"=>"paybox",
			"3 fois"=>"3 fois",
			"Paypal"=>"Paypal",
			"cdiscount"=>"cdiscount",
			"delamaison"=>"delamaison",
			"darty"=>"darty",
			"rdc"=>"rdc",
			"auchan"=>"auchan",

		];
		if($method)
			return $data[$method];
		else
			return $data;

	}

	public function getActionFinal($method = null)
	{

		$data =[
			"rb integral"=>"rb integral",
			"piece detachée"=>"piece detachée",
			"pd + geste co"=>"pd + geste co",
			"geste co"=>"geste co",
			"reexpedition"=>"reexpedition",
			"repparation"=>"repparation",
			"rb hfdp"=>"rb hfdp",
			"Echange dépôt"=>"Echange dépôt",
			"Remboursement partiel"=>"Remboursement partiel",
			"Echange dépôt + remboursement partiel"=>"Echange dépôt + remboursement partiel",
			"Echange + geste co"=>"Echange + geste co",
			"Bon d'achat"=>"Bon d'achat",
			"Remboursement totale"=>"Remboursement totale",
            "Récupération d'annulation" => "Récupération d'annulation"

		];
		if($method)
			return $data[$method];
		else
			return $data;

	}


	public function getYesNo($method = null)
	{
		$data =[
			'y' => 'Oui',
			'n' => 'Non'
		];
		if($method)
			return $data[$method];
		else
			return $data;
	}


	public function getLitigeFinal($method = null)
	{
		$data =[
			'accepté'=>'accepté',
			'refuse' =>'refuse',
			'5%'     =>'5%',
			'10%'    =>'10%',
			'15%'    =>'15%',
			'20%'    =>'20%',
			'25%'    =>'25%',
			'30%'    =>'30%',
			'35%'    =>'35%',
			'40%'    =>'40%',
			'45%'    =>'45%',
			'50%'    =>'50%',
		];
		if($method)
			return $data[$method];
		else
			return $data;
	}

	public function getListStatus($method = null)
	{
		$data =[
			'0' => 'En cours',
            '6' => 'En attente',
            '4' => 'Annulé',
            '5' => 'Urgent',
            '2' => 'Complet',
			'1' => 'Validé',
		];
		if(null !== $method)
			return $data[$method];
		else
			return $data;
	}

    /**
     * Set sale
     *
     * @param \AppBundle\Entity\Sale $sale
     *
     * @return SaleSav
     */
    // public function setSale(\AppBundle\Entity\Sale $sale)
    // {
        // $this->sale = $sale;

        // return $this;
    // }

    /**
     * Get sale
     *
     * @return \AppBundle\Entity\Sale
     */
    // public function getSale()
    // {
        // return $this->sale;
    // }

    /**
     * Set validationDate
     *
     * @param DateTime $validationDate
     *
     * @return SaleSav
     */
    public function setValidationDate($validationDate)
    {
        $this->validationDate = $validationDate;

        return $this;
    }

    /**
     * Get validationDate
     *
     * @return DateTime
     */
    public function getValidationDate()
    {
        return $this->validationDate;
    }

    /**
     * Set fromCanceled
     *
     * @param boolean $fromCanceled
     *
     * @return SaleSav
     */
    public function setFromCanceled($fromCanceled)
    {
        $this->fromCanceled = $fromCanceled;

        return $this;
    }

    /**
     * Get fromCanceled
     *
     * @return boolean
     */
    public function getFromCanceled()
    {
        return $this->fromCanceled;
    }

    public function getModeRemList($method = null)
    {

        $data =[
            "Paypal"=>"Paypal",
            "CB"=>"CB",
            "Cheque"=>"Cheque",
            "3 fois"=>"3 fois",
		];
		if($method)
			return $data[$method];
		else
			return $data;

    }

    /**
     * Set refund
     *
     * @param \AppBundle\Entity\Refund $refund
     *
     * @return SaleSav
     */
    public function setRefund(\AppBundle\Entity\Refund $refund)
    {
        $this->refund = $refund;

        return $this;
    }

	/**
     * remove refund
     *
     * @return SaleSav
     */
    public function removeRefund()
    {
        $this->refund = Null;

        return $this;
    }

    /**
     * Get refund
     *
     * @return \AppBundle\Entity\Refund
     */
    public function getRefund()
    {
        return $this->refund;
    }

    /**
     * Set numRetour
     *
     * @param string $numRetour
     *
     * @return SaleSav
     */
    public function setNumRetour($numRetour)
    {
        $this->numRetour = $numRetour;

        return $this;
    }

    /**
     * Get numRetour
     *
     * @return string
     */
    public function getNumRetour()
    {
        return $this->numRetour;
    }

    public function getListProposition ($method = null)
    {
        $data =[
            'geste co 5%' => 'geste co 5%',
            'geste co 10%' => 'geste co 10%',
            'geste co 15%' => 'geste co 15%',
            'geste co 20%' => 'geste co 20%',
            'geste co 25%' => 'geste co 25%',
            'geste co 30%' => 'geste co 30%',
            'remboursement intégral ' => 'remboursement intégral',
            'remboursement partiel' => 'remboursement partiel',
            'remboursement hors frais de port' => 'remboursement hors frais de port',
            'remboursement des fdp' => 'remboursement des fdp ',
            'piece detachée' => 'piece detachée',
            're-expédition' => 're-expédition',
            'bon d achat' => 'bon d achat',

        ];
        if($method)
            return $data[$method];
        else
            return $data;
    }


    /**
     * Get proposation list for priority
     * @param null $method
     * @return array|mixed
     */
    public function getPriorityFinalAction($method = null)
    {
        $data =[
            'gest-co-avec-montant' => 'Gest co avec montant',
            'remboursement-avec-retour-marchandise' => 'Remboursement avec retour marchandise',
            'remboursement-sans-retour-marchandise' => 'remboursement sans retour marchandise',
            're-expedition' => 'Re-Expedition'
        ];
        if($method)
            return $data[$method];
        else
            return $data;
    }

    /**
     * @return bool
     */
    public function isPriority() {
        return $this->priority;
    }

    /**
     * @param bool $priority
     */
    public function setPriority($priority) {
        $this->priority = $priority;
    }

    /**
     * @return mixed|Sale
     */
    public function getSale() {
        return $this->sale;
    }

    /**
     * @param mixed $sale
     */
    public function setSale($sale): void {
        $this->sale = $sale;
    }

    /**
     * Get saleProduct
     *
     * @return Collection
     */
    public function getSaleProducts()
    {
        return $this->saleProducts;
    }

    /**
     *
     * @param SaleProduct $saleProduct
     * @return SaleSav
     */
    public function addSaleProducts(SaleProduct $saleProduct): SaleSav
    {
        $this->saleProducts[] = $saleProduct;

        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getDateCheck(): ?DateTime
    {
        return $this->dateCheck;
    }

    /**
     * @return string|null
     */
    public function getCheckBank(): ?string
    {
        return $this->checkBank;
    }

    /**
     * @return string|null
     */
    public function getNumCheque(): ?string
    {
        return $this->numCheque;
    }

    /**
     * @param string $checkBank
     */
    public function setCheckBank(string $checkBank): void
    {
        $this->checkBank = $checkBank;
    }

    /**
     * @param string $numCheque
     */
    public function setNumCheque(string $numCheque): void
    {
        $this->numCheque = $numCheque;
    }

    /**
     * @param DateTime $dateCheck
     */
    public function setDateCheck(DateTime $dateCheck): void
    {
        $this->dateCheck = $dateCheck;
    }

}
