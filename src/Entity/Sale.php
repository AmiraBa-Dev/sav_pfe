<?php

namespace App\Entity;

use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\User;
use App\Entity\SaleProduct;
use App\Entity\SaleSav;

/**
 * Sale
 *
 * @ORM\Table(name="mz_sale", indexes={@ORM\Index(name="status_idx", columns={"status"}), @ORM\Index(name="increment_id_idx", columns={"increment_id"}), @ORM\Index(name="sale_id_idx", columns={"sale_id"}), @ORM\Index(name="source_idx", columns={"source"}), @ORM\Index(name="created_at_idx", columns={"created_at"}), @ORM\Index(name="store_id_idx", columns={"store_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\SaleRepository")
 */
class Sale
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    private $saleService;

    /**
     * @var string
     *
     * @ORM\Column(name="sale_id", type="string", length=255)
     */
    private $saleId;

    /**
     * @var string
     *
     * @ORM\Column(name="source", type="string", length=255)
     */
    private $source;

    /**
     * @var string
     *
     * @ORM\Column(name="increment_id", type="string", length=255)
     */
    private $incrementId;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=255)
     */
    private $status;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_code", type="string", length=255, nullable=true)
     */
    private $couponCode;

    /**
     * @var int
     *
     * @ORM\Column(name="store_id", type="integer", nullable=true)
     */
    private $storeId;

    /**
     * @var int
     *
     * @ORM\Column(name="customer_id", type="integer", nullable=true)
     */
    private $customerId;

    /**
     * @var string
     *
     * @ORM\Column(name="grand_total", type="decimal", precision=12, scale=4)
     */
    private $grandTotal;

    /**
     * @var string
     *
     * @ORM\Column(name="customer_email", type="string", length=255)
     */
    private $customerEmail;


    /**
     * @var string
     *
     * @ORM\Column(name="billing_email", type="string", length=255, nullable=true)
     */
    private $billingEmail;

    /**
     * @var string
     *
     * @ORM\Column(name="customer_firstname", type="string", length=255, nullable=true)
     */
    private $customerFirstname;

    /**
     * @var string
     *
     * @ORM\Column(name="customer_lastname", type="string", length=255, nullable=true)
     */
    private $customerLastname;

    /**
     * @var string
     *
     * @ORM\Column(name="shipping_method", type="string", length=255, nullable=true)
     */
    private $shippingMethod;

    /**
     * @var string
     *
     * @ORM\Column(name="real_shipping_method", type="string", length=255, nullable=true)
     */
    private $realShippingMethod;

    /**
     * @var string
     *
     * @ORM\Column(name="shipping_region", type="string", length=255, nullable=true)
     */
    private $shippingRegion;

    /**
     * @var string
     *
     * @ORM\Column(name="shipping_postcode", type="string", length=255, nullable=true)
     */
    private $shippingPostcode;

    /**
     * @var string
     *
     * @ORM\Column(name="shipping_street", type="string", length=255, nullable=true)
     */
    private $shippingStreet;

    /**
     * @var string
     *
     * @ORM\Column(name="shipping_city", type="string", length=255, nullable=true)
     */
    private $shippingCity;

    /**
     * @var string
     *
     * @ORM\Column(name="shipping_telephone", type="string", length=255, nullable=true)
     */
    private $shippingTelephone;

    /**
     * @var string
     *
     * @ORM\Column(name="shipping_country_id", type="string", length=255, nullable=true)
     */
    private $shippingCountryId;

    /**
     * @var string
     *
     * @ORM\Column(name="shipping_company", type="string", length=255, nullable=true)
     */
    private $shippingCompany;

    /**
     * @var string
     *
     * @ORM\Column(name="payment_method", type="string", length=255, nullable=true)
     */
    private $paymentMethod;

    /**
     * @var string
     *
     * @ORM\Column(name="payment_amount_paid", type="decimal", precision=12, scale=4)
     */
    private $paymentAmountPaid;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=true)
     */
    private $createdAt;

    /**
     * @var text
     *
     * @ORM\Column(name="comment", type="text", nullable=true)
     */
    private $comment;

    /**
     * @var int
     *
     * @ORM\Column(name="id_refund", type="integer", nullable=true)
     */
    private $idRefund;

    /**
     * @ORM\OneToMany(targetEntity="SaleProduct", mappedBy="sale")
     */
    private $saleproducts;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="shipped_at", type="datetime", nullable=true)
     */
    private $shippedAt;

    /**
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User")
     *
     */
    private $user;

    /**
     * @var text
     *
     * @ORM\Column(name="sale_shipping_description", type="text", nullable=true)
     */
    private $saleShippingDescription;

    /**
     * @var string
     *
     * @ORM\Column(name="shipping_amount", type="decimal", precision=12, scale=4)
     */
    private $shippingAmount;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Refund", mappedBy="sale")
     */
    private $saleRefunds;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\SaleSav", mappedBy="sale")
     */
    private $saleSavs;

    /**
     * @var string
     *
     * @ORM\Column(name="transaction_id", type="string", length=255, nullable=true)
     */
    private $transaction_id;

    /**
     * @var string
     *
     * @ORM\Column(name="payment_status", type="integer", nullable=true, options={"default":0})
     */
    private $paymentStatus;

    /**
     * @var text
     *
     * @ORM\Column(name="payment_info", type="text", nullable=true)
     */
    private $paymentInfo;


    /**
     * Constructor
     */
    public function __construct() {
        $this->saleproducts = new ArrayCollection();
        $this->saleRefunds = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getSaleService()
    {
        return $this->saleService;
    }

    /**
     * @param mixed $saleService
     */
    public function setSaleService($saleService)
    {
        $this->saleService = $saleService;

        return $this;
    }

    /**
     * @return string
     */
    public function getSaleId(): string
    {
        return $this->saleId;
    }

    /**
     * @param string $saleId
     */
    public function setSaleId(string $saleId)
    {
        $this->saleId = $saleId;

        return $this;
    }

    /**
     * @return string
     */
    public function getSource(): string
    {
        return $this->source;
    }

    /**
     * @param string $source
     */
    public function setSource(string $source)
    {
        $this->source = $source;

        return $this;
    }

    /**
     * @return string
     */
    public function getIncrementId(): string
    {
        return $this->incrementId;
    }

    /**
     * @param string $incrementId
     */
    public function setIncrementId(string $incrementId)
    {
        $this->incrementId = $incrementId;

        return $this;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus(string $status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return string
     */
    public function getCouponCode(): string
    {
        return $this->couponCode;
    }

    /**
     * @param string $couponCode
     */
    public function setCouponCode(string $couponCode)
    {
        $this->couponCode = $couponCode;

        return $this;
    }

    /**
     * @return int
     */
    public function getStoreId(): int
    {
        return $this->storeId;
    }

    /**
     * @param int $storeId
     */
    public function setStoreId(int $storeId)
    {
        $this->storeId = $storeId;

        return $this;
    }

    /**
     * @return int
     */
    public function getCustomerId(): int
    {
        return $this->customerId;
    }

    /**
     * @param int $customerId
     */
    public function setCustomerId(int $customerId)
    {
        $this->customerId = $customerId;

        return $this;
    }

    /**
     * @return string
     */
    public function getGrandTotal(): string
    {
        return $this->grandTotal;
    }

    /**
     * @param string $grandTotal
     */
    public function setGrandTotal(string $grandTotal)
    {
        $this->grandTotal = $grandTotal;

        return $this;
    }

    /**
     * @return string
     */
    public function getCustomerEmail(): string
    {
        return $this->customerEmail;
    }

    /**
     * @param string $customerEmail
     */
    public function setCustomerEmail(string $customerEmail)
    {
        $this->customerEmail = $customerEmail;

        return $this;
    }

    /**
     * @return string
     */
    public function getBillingEmail(): string
    {
        return $this->billingEmail;
    }

    /**
     * @param string $billingEmail
     */
    public function setBillingEmail(string $billingEmail)
    {
        $this->billingEmail = $billingEmail;

        return $this;
    }

    /**
     * @return string
     */
    public function getCustomerFirstname(): string
    {
        return $this->customerFirstname;
    }

    /**
     * @param string $customerFirstname
     */
    public function setCustomerFirstname(string $customerFirstname)
    {
        $this->customerFirstname = $customerFirstname;

        return $this;
    }

    /**
     * @return string
     */
    public function getCustomerLastname(): string
    {
        return $this->customerLastname;
    }

    /**
     * @param string $customerLastname
     */
    public function setCustomerLastname(string $customerLastname)
    {
        $this->customerLastname = $customerLastname;

        return $this;
    }

    /**
     * @return string
     */
    public function getShippingMethod(): string
    {
        return $this->shippingMethod;
    }

    /**
     * @param string $shippingMethod
     */
    public function setShippingMethod(string $shippingMethod)
    {
        $this->shippingMethod = $shippingMethod;

        return $this;
    }

    /**
     * @return string
     */
    public function getRealShippingMethod(): string
    {
        return $this->realShippingMethod;
    }

    /**
     * @param string $realShippingMethod
     */
    public function setRealShippingMethod(string $realShippingMethod)
    {
        $this->realShippingMethod = $realShippingMethod;

        return $this;
    }

    /**
     * @return string
     */
    public function getShippingRegion(): string
    {
        return $this->shippingRegion;
    }

    /**
     * @param string $shippingRegion
     */
    public function setShippingRegion(string $shippingRegion)
    {
        $this->shippingRegion = $shippingRegion;

        return $this;
    }

    /**
     * @return string
     */
    public function getShippingPostcode(): string
    {
        return $this->shippingPostcode;
    }

    /**
     * @param string $shippingPostcode
     */
    public function setShippingPostcode(string $shippingPostcode)
    {
        $this->shippingPostcode = $shippingPostcode;

        return $this;
    }

    /**
     * @return string
     */
    public function getShippingStreet(): string
    {
        return $this->shippingStreet;
    }

    /**
     * @param string $shippingStreet
     */
    public function setShippingStreet(string $shippingStreet)
    {
        $this->shippingStreet = $shippingStreet;

        return $this;
    }

    /**
     * @return string
     */
    public function getShippingCity(): string
    {
        return $this->shippingCity;
    }

    /**
     * @param string $shippingCity
     */
    public function setShippingCity(string $shippingCity)
    {
        $this->shippingCity = $shippingCity;

        return $this;
    }

    /**
     * @return string
     */
    public function getShippingTelephone(): string
    {
        return $this->shippingTelephone;
    }

    /**
     * @param string $shippingTelephone
     */
    public function setShippingTelephone(string $shippingTelephone)
    {
        $this->shippingTelephone = $shippingTelephone;

        return $this;
    }

    /**
     * @return string
     */
    public function getShippingCountryId(): string
    {
        return $this->shippingCountryId;
    }

    /**
     * @param string $shippingCountryId
     */
    public function setShippingCountryId(string $shippingCountryId)
    {
        $this->shippingCountryId = $shippingCountryId;

        return $this;
    }

    /**
     * @return string
     */
    public function getShippingCompany(): string
    {
        return $this->shippingCompany;
    }

    /**
     * @param string $shippingCompany
     */
    public function setShippingCompany(string $shippingCompany)
    {
        $this->shippingCompany = $shippingCompany;

        return $this;
    }

    /**
     * @return string
     */
    public function getPaymentMethod(): string
    {
        return $this->paymentMethod;
    }

    /**
     * @param string $paymentMethod
     */
    public function setPaymentMethod(string $paymentMethod)
    {
        $this->paymentMethod = $paymentMethod;

        return $this;
    }

    /**
     * @return string
     */
    public function getPaymentAmountPaid(): string
    {
        return $this->paymentAmountPaid;
    }

    /**
     * @param string $paymentAmountPaid
     */
    public function setPaymentAmountPaid(string $paymentAmountPaid)
    {
        $this->paymentAmountPaid = $paymentAmountPaid;

        return $this;
    }

    /**
     * @return DateTime
     */
    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    /**
     * @param DateTime $createdAt
     */
    public function setCreatedAt(DateTime $createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * @return text
     */
    public function getComment(): text
    {
        return $this->comment;
    }

    /**
     * @param text $comment
     */
    public function setComment(text $comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * @return int
     */
    public function getIdRefund(): int
    {
        return $this->idRefund;
    }

    /**
     * @param int $idRefund
     */
    public function setIdRefund(int $idRefund)
    {
        $this->idRefund = $idRefund;

        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getSaleproducts(): ArrayCollection
    {
        return $this->saleproducts;
    }

    /**
     * @param ArrayCollection $saleproducts
     */
    public function setSaleproducts(ArrayCollection $saleproducts)
    {
        $this->saleproducts = $saleproducts;

        return $this;
    }

    /**
     * @return DateTime
     */
    public function getShippedAt(): DateTime
    {
        return $this->shippedAt;
    }

    /**
     * @param DateTime $shippedAt
     */
    public function setShippedAt(DateTime $shippedAt)
    {
        $this->shippedAt = $shippedAt;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return text
     */
    public function getSaleShippingDescription(): text
    {
        return $this->saleShippingDescription;
    }

    /**
     * @param text $saleShippingDescription
     */
    public function setSaleShippingDescription(text $saleShippingDescription)
    {
        $this->saleShippingDescription = $saleShippingDescription;

        return $this;
    }

    /**
     * @return string
     */
    public function getShippingAmount(): string
    {
        return $this->shippingAmount;
    }

    /**
     * @param string $shippingAmount
     */
    public function setShippingAmount(string $shippingAmount)
    {
        $this->shippingAmount = $shippingAmount;

        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getSaleRefunds(): ArrayCollection
    {
        return $this->saleRefunds;
    }

    /**
     * @param ArrayCollection $saleRefunds
     */
    public function setSaleRefunds(ArrayCollection $saleRefunds)
    {
        $this->saleRefunds = $saleRefunds;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getSaleSavs()
    {
        return $this->saleSavs;
    }

    /**
     * @param mixed $saleSavs
     */
    public function setSaleSavs($saleSavs)
    {
        $this->saleSavs = $saleSavs;

        return $this;
    }

    /**
     * @return string
     */
    public function getTransactionId(): string
    {
        return $this->transaction_id;
    }

    /**
     * @param string $transaction_id
     */
    public function setTransactionId(string $transaction_id)
    {
        $this->transaction_id = $transaction_id;

        return $this;
    }

    /**
     * @return string
     */
    public function getPaymentStatus(): string
    {
        return $this->paymentStatus;
    }

    /**
     * @param string $paymentStatus
     */
    public function setPaymentStatus(string $paymentStatus)
    {
        $this->paymentStatus = $paymentStatus;

        return $this;
    }

    /**
     * @return text
     */
    public function getPaymentInfo(): text
    {
        return $this->paymentInfo;
    }

    /**
     * @param text $paymentInfo
     */
    public function setPaymentInfo(text $paymentInfo)
    {
        $this->paymentInfo = $paymentInfo;

        return $this;
    }

}
