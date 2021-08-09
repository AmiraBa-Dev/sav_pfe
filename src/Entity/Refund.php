<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;

/**
 * Refund
 *
 * @ORM\Table(name="mz_refund")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\RefundRepository")
 *@Serializer\ExclusionPolicy("all")
 */
class Refund
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @Serializer\Groups({"detail", "list"})
     * @Serializer\Expose(true)
     */
    private $id;


    /**
     * @var string
     *
     * @ORM\Column(name="transaction", type="string", length=255  , nullable=true)
     */
    private $transaction;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Sale")
     * @ORM\JoinColumn(nullable=true)
     */
    private $sale;


    /**
     * @var string
     *
     * @ORM\Column(name="customer", type="string", length=50  , nullable=true)
     */
    private $customer;


    /**
     * @var string
     *
     * @ORM\Column(name="admin_applicant", type="string", length=50 , nullable=true)
     */
    private $adminapplicant;


    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255 , nullable=true)
     * @Serializer\Groups({"detail", "list"})
     * @Serializer\Expose(true)
     */
    private $type;
    /**
     * @var float
     *
     * @ORM\Column(name="amount", type="float", nullable=true, options={"default" = 0})
     * @Serializer\Groups({"detail", "list"})
     * @Serializer\Expose(true)
     */
    private $amount;

    /**
     * @var string
     *
     * @ORM\Column(name="information", type="string", length=255 , nullable=true)
     */
    private $information;


    /**
     * @var string
     *
     * @ORM\Column(name="file", type="string", length=255 , nullable=true)
     */
    private $file;

    /**
     * @var string
     *
     * @ORM\Column(name="pattern", type="string", length=255 , nullable=true)
     */
    private $pattern;
    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=255)
     * @Serializer\Groups({"detail", "list"})
     * @Serializer\Expose(true)
     */


    private $status;
    /**
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User")
     * @ORM\JoinColumn(nullable=false)
     *
     */
    private $user;

    /**
     * @var string
     *
     * @ORM\Column(name="return_code", type="string", length=255 , nullable=true)
     */
    private $returncode;


    /**
     * @var string
     *
     * @ORM\Column(name="return_longmessage", type="string", length=255 , nullable=true)
     */
    private $returnlongmessage;

    /**
     * @var string
     *
     * @ORM\Column(name="return_shortmessage", type="string", length=255 , nullable=true)
     */
    private $returnshortmessage;

    /**
     * @var string
     *
     * @ORM\Column(name="return_transactionid", type="string", length=255 , nullable=true)
     */
    private $returntransactionid;

    /**
     * @var string
     *
     * @ORM\Column(name="refund_request", type="string", length=255 , nullable=true)
     */
    private $refundrequest;
    /**
     * @var string
     *
     * @ORM\Column(name="return_data", type="text", nullable=true)
     */
    private $returndata;
    /**
     * @var string
     *
     * @ORM\Column(name="method_payment", type="string", length=255 , nullable=true)
     */
    private $methodpayment;


    /**
     * @var int
     *
     * @ORM\Column(name="increment_id", type="string", length=255 , nullable=true)
     *
     */
    private $incrementId;
    /**
     * @var \Date
     *
     * @ORM\Column(name="created_at", type="datetime")
     * @Serializer\Groups({"detail", "list"})
     * @Serializer\Expose(true)
     */
    private $createdAt;
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="autorisation", type="integer", nullable=true, options={"default" : 0})
     *
     */
    private $autorisation;

    /**
      * @var int
      *
      * @ORM\Column(name="is_ligne_color", type="integer", nullable=true, options={"default" : 0})
      */
    private $isLigneColor;

    /**
    * @var string
    *
    * @ORM\Column(name="code_coupon", type="string", length=255 , nullable=true)
    * @Serializer\Groups({"detail", "list"})
    * @Serializer\Expose(true)
    */
    private $codecoupon;


    /**
     * @var \DateTime
     *
     * @ORM\Column(name="called_at", type="datetime", nullable=true)
     */
    private $calledAt;


    /**
     * @var string
     *
     * @ORM\Column(name="called_status", type="string", length=255, nullable=true)
     */
    private $calledStatus;

	/**
     * @var string
     *
     * @ORM\Column(name="called_status_reason", type="string", length=255, nullable=true)
     */
    private $calledStatusReason;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="recall_at", type="datetime", nullable=true)
     */
    private $recallAt;

    /**
     * @var bool
     *
     * @ORM\Column(name="is_called", type="boolean", nullable=true, options={"default" : 0})
     */
    private $isCalled;


	/**
	 * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User")
	 *
	 */
	private $calledBy;

    /**
     * @var string
     *
     * @ORM\Column(name="send_sms", type="text", nullable=true)
     */
    private $sendSms;

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
     * Set transaction
     *
     * @param string $transaction
     *
     * @return Refund
     */
    public function setTransaction($transaction)
    {
        $this->transaction = $transaction;

        return $this;
    }

    /**
     * Get transaction
     *
     * @return string
     */
    public function getTransaction()
    {
        return $this->transaction;
    }


    /**
     * Set information
     *
     * @param string $information
     *
     * @return Refund
     */
    public function setInformation($information)
    {
        $this->information = $information;

        return $this;
    }

    /**
     * Get information
     *
     * @return string
     */
    public function getInformation()
    {
        return $this->information;
    }


    /**
     * Set status
     *
     * @param string $status
     *
     * @return Refund
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Refund
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }


    /**
     * Set user
     *
     * @param \UserBundle\Entity\User $user
     *
     * @return Refund
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
     * Set customer
     *
     * @param string $customer
     *
     * @return Refund
     */
    public function setCustomer($customer)
    {
        $this->customer = $customer;

        return $this;
    }

    /**
     * Get customer
     *
     * @return string
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * Set amount
     *
     * @param float $amount
     *
     * @return Refund
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Get amount
     *
     * @return float
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set file
     *
     * @param string $file
     *
     * @return Refund
     */
    public function setFile($file)
    {
        $this->file = $file;

        return $this;
    }

    /**
     * Get file
     *
     * @return string
     */
    public function getFile()
    {
        return $this->file;
    }


    /**
     * Set returnCode
     *
     * @param string $returnCode
     *
     * @return Refund
     */
    public function setReturnCode($returnCode)
    {
        $this->returncode = $returnCode;

        return $this;
    }

    /**
     * Get returnCode
     *
     * @return string
     */
    public function getReturnCode()
    {
        return $this->returncode;
    }

    /**
     * Set returnLongmessage
     *
     * @param string $returnLongmessage
     *
     * @return Refund
     */
    public function setReturnLongmessage($returnLongmessage)
    {
        $this->returnlongmessage = $returnLongmessage;

        return $this;
    }

    /**
     * Get returnLongmessage
     *
     * @return string
     */
    public function getReturnLongmessage()
    {
        return $this->returnlongmessage;
    }

    /**
     * Set returnShortmessage
     *
     * @param string $returnShortmessage
     *
     * @return Refund
     */
    public function setReturnShortmessage($returnShortmessage)
    {
        $this->returnshortmessage = $returnShortmessage;

        return $this;
    }

    /**
     * Get returnShortmessage
     *
     * @return string
     */
    public function getReturnShortmessage()
    {
        return $this->returnshortmessage;
    }

    /**
     * Set adminApplicant
     *
     * @param string $adminApplicant
     *
     * @return Refund
     */
    public function setAdminApplicant($adminApplicant)
    {
        $this->adminapplicant = $adminApplicant;

        return $this;
    }

    /**
     * Get adminApplicant
     *
     * @return string
     */
    public function getAdminApplicant()
    {
        return $this->adminapplicant;
    }


    /**
     * Set returnData
     *
     * @param string $returnData
     *
     * @return Refund
     */
    public function setReturnData($returnData)
    {
        $this->returndata = $returnData;

        return $this;
    }

    /**
     * Get returnData
     *
     * @return string
     */
    public function getReturnData()
    {
        return $this->returndata;
    }

    /**
     * Set returnTransactionid
     *
     * @param string $returnTransactionid
     *
     * @return Refund
     */
    public function setReturnTransactionid($returnTransactionid)
    {
        $this->returntransactionid = $returnTransactionid;

        return $this;
    }

    /**
     * Get returnTransactionid
     *
     * @return string
     */
    public function getReturnTransactionid()
    {
        return $this->returntransactionid;
    }

    /**
     * Set incrementId
     *
     * @param integer $incrementId
     *
     * @return Refund
     */
    public function setIncrementId($incrementId)
    {
        $this->incrementId = $incrementId;

        return $this;
    }

    /**
     * Get incrementId
     *
     * @return integer
     */
    public function getIncrementId()
    {
        return $this->incrementId;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Refund
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set pattern
     *
     * @param string $pattern
     *
     * @return Refund
     */
    public function setPattern($pattern)
    {
        $this->pattern = $pattern;

        return $this;
    }

    /**
     * Get pattern
     *
     * @return string
     */
    public function getPattern()
    {
        return $this->pattern;
    }

    /**
     * Set methodPayment
     *
     * @param string $methodPayment
     *
     * @return Refund
     */
    public function setMethodPayment($methodPayment)
    {
        $this->methodpayment = $methodPayment;

        return $this;
    }

    /**
     * Get methodPayment
     *
     * @return string
     */
    public function getMethodPayment()
    {
        return $this->methodpayment;
    }

    /**
     * Set refundRequest
     *
     * @param string $refundRequest
     *
     * @return Refund
     */
    public function setRefundRequest($refundRequest)
    {
        $this->refundrequest = $refundRequest;

        return $this;
    }

    /**
     * Get refundRequest
     *
     * @return string
     */
    public function getRefundRequest()
    {
        return $this->refundrequest;
    }

    public static function getStatusLabel($id = null)
    {
        $data = [
            0 => '',
            1 => 'Commande Valide',
            2 => 'Commande invalide',
            3 => 'Commande introuvable',
            4 => "Ce n'est pas une commande Payline"
        ];


        if ($id !== null && isset($data[$id])) {
            return $data[$id];
        }

        return $data;
    }

    public static function getStatusColor($id = null)
    {
        $data = [
            0 => '',
            1 => '#008000',
            2 => 'red',
            3 => 'red',
            4 => '#eca22e'
        ];
        if ($id !== null && isset($data[$id])) {
            return $data[$id];
        }

        return $data;
    }

    /**
     * Set autorisation
     *
     * @param integer $autorisation
     *
     * @return Refund
     */
    public function setAutorisation($autorisation)
    {
        $this->autorisation = $autorisation;

        return $this;
    }

    /**
     * Get autorisation
     *
     * @return integer
     */
    public function getAutorisation()
    {
        return $this->autorisation;
    }

    /**
       * Set isLigneColor
       *
       * @param integer $isLigneColor
       *
       * @return Refund
       */
    public function setIsLigneColor($isLigneColor)
    {
        $this->isLigneColor = $isLigneColor;

        return $this;
    }

    /**
     * Get isLigneColor
     *
     * @return integer
     */
    public function getIsLigneColor()
    {
        return $this->isLigneColor;
    }

    /**
  * Set codecoupon
  *
  * @param string $codecoupon
  *
  * @return Refund
  */
    public function setCodecoupon($codecoupon)
    {
        $this->codecoupon = $codecoupon;

        return $this;
    }

    /**
     * Get codecoupon
     *
     * @return string
     */
    public function getCodecoupon()
    {
        return $this->codecoupon;
    }
    public static function getListPattern($method = null){
        $data = [
            "Rétractation partiel" => "Rétractation partiel",
            "Annulation après expédition" => "Annulation après expédition",
            "Annulation avant expédition" => "Annulation avant expédition",
            "Défaut de fabrication" => "Défaut de fabrication",
            "Erreur logidav" => "Erreur logidav",
            "Mécanisme" => "Mécanisme",
            "Garantie" => "Garantie",
            "Retard logidav" => "Retard logidav",
            "Retard produit" => "Retard produit",
            "Souci transporteur" => "Souci transporteur",
            "Erreur fournisseur" => "Erreur fournisseur",
            "Modification de produit" => "Modification de produit",
            "Oubli de code promo" => "Oubli de code promo",
            "Refus à la livraison casse" => "Refus à la livraison casse",
            "Refus à la livraison défaut" => "Refus à la livraison défaut",
            "Retard de livraison transp" => "Retard de livraison transp",
            "Récupération d'annulation" => "Récupération d'annulation"

        ];

        if($method)
            return $data[$method];

        return $data;
    }

    public static function getListType($method = null){
        $data = [
            "Remboursement partiel" => "Remboursement partiel",
            "Rb integral" => "Rb integral",
            "Rb hfdp" => "Rb hfdp",
            "Geste co" => "Geste co",
            "Bon achat" => "Bon achat",
            "Récupération d'annulation" => "Récupération d'annulation",
            "autre" => "autre"

        ];

        if($method)
            return $data[$method];

        return $data;
    }






    /**
     * Set calledAt
     *
     * @param \DateTime $calledAt
     *
     * @return Refund
     */
    public function setCalledAt($calledAt)
    {
        $this->calledAt = $calledAt;

        return $this;
    }

    /**
     * Get calledAt
     *
     * @return \DateTime
     */
    public function getCalledAt()
    {
        return $this->calledAt;
    }

    /**
     * Set calledStatus
     *
     * @param string $calledStatus
     *
     * @return Refund
     */
    public function setCalledStatus($calledStatus)
    {
        $this->calledStatus = $calledStatus;

        return $this;
    }

    /**
     * Get calledStatus
     *
     * @return string
     */
    public function getCalledStatus()
    {
        return $this->calledStatus;
    }

    /**
     * Set calledStatusReason
     *
     * @param string $calledStatusReason
     *
     * @return Refund
     */
    public function setCalledStatusReason($calledStatusReason)
    {
        $this->calledStatusReason = $calledStatusReason;

        return $this;
    }

    /**
     * Get calledStatusReason
     *
     * @return string
     */
    public function getCalledStatusReason()
    {
        return $this->calledStatusReason;
    }

    /**
     * Set recallAt
     *
     * @param \DateTime $recallAt
     *
     * @return Refund
     */
    public function setRecallAt($recallAt)
    {
        $this->recallAt = $recallAt;

        return $this;
    }

    /**
     * Get recallAt
     *
     * @return \DateTime
     */
    public function getRecallAt()
    {
        return $this->recallAt;
    }

    /**
     * Set isCalled
     *
     * @param boolean $isCalled
     *
     * @return Refund
     */
    public function setIsCalled($isCalled)
    {
        $this->isCalled = $isCalled;

        return $this;
    }

    /**
     * Get isCalled
     *
     * @return boolean
     */
    public function getIsCalled()
    {
        return $this->isCalled;
    }

    /**
     * Set calledBy
     *
     * @param \UserBundle\Entity\User $calledBy
     *
     * @return Refund
     */
    public function setCalledBy(\UserBundle\Entity\User $calledBy = null)
    {
        $this->calledBy = $calledBy;

        return $this;
    }

    /**
     * Get calledBy
     *
     * @return \UserBundle\Entity\User
     */
    public function getCalledBy()
    {
        return $this->calledBy;
    }

    /**
     * Set sendSms
     *
     * @param string $sendSms
     *
     * @return Refund
     */
    public function setSendSms($sendSms)
    {
        $this->sendSms = $sendSms;

        return $this;
    }

    /**
     * Get sendSms
     *
     * @return string
     */
    public function getSendSms()
    {
        return $this->sendSms;
    }

    /**
     * @return Sale|mixed|null
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
}
