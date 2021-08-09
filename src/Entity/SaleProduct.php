<?php

namespace App\Entity;

use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;
use JMS\Serializer\Annotation\Accessor;

/**
 * SaleProduct
 *
 * @ORM\Table(name="mz_sale_product")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SaleProductRepository")
 */
class SaleProduct
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
     * @ORM\Column(name="sale_item_id", type="string", length=255)
     */
    private $saleItemId;


    /**
     * @var int
     *
     * @ORM\Column(name="qty", type="integer")
     */
    private $qty;

    /**
     * @var string
     *
     * @ORM\Column(name="price", type="decimal", precision=12, scale=4)
     */
    private $price;

    /**
     * @var string
     *
     * @ORM\Column(name="base_price", type="decimal", precision=12, scale=4)
     */
    private $basePrice;

    /**
     * @var string
     *
     * @ORM\Column(name="original_price", type="decimal", precision=12, scale=4)
     */
    private $originalPrice;

    /**
     * @var string
     *
     * @ORM\Column(name="tax_amount", type="decimal", precision=12, scale=4)
     */
    private $taxAmount;

    /**
     * @var string
     *
     * @ORM\Column(name="discount_amount", type="decimal", precision=12, scale=4)
     */
    private $discountAmount;

    /**
     * @var string
     *
     * @ORM\Column(name="row_total", type="decimal", precision=12, scale=4)
     */
    private $rowTotal;

    /**
     * @var int
     *
     * @ORM\Column(name="parent_item_id", type="integer", nullable=true)
     */
    private $parentItemId;


    /**
     * @var boolean
     *
     * @ORM\Column(name="is_printed", type="boolean")
     */
    private $isPrinted;

    /**
     * @var int
     *
     * @ORM\Column(name="to_print", type="integer", nullable=true, options={"default":0, "comment":"0 => can not be printed | 1 => can be printed | 2 => old sales | 3 => can not be printed and has no arrival"})
     */
    private $toPrint = 0;

    /**
     * @var DateTime|null
     *
     * @ORM\Column(name="sent_to_print_at", type="datetime", nullable=true)
     */
    private $sentToPrintAt;

    /**
     * @var string
     *
     * @ORM\Column(name="item_ref", type="string", length=255, nullable=true)
     */
    private $itemRef;

    /**
     * @var string
     *
     * @ORM\Column(name="available", type="string", length=255, nullable=true)
     */
    private $available;

    /**
     * @var string
     *
     * @ORM\Column(name="availability", type="string", length=255, nullable=true)
     */
    private $availability;


    /**
     * @var text
     *
     * @ORM\Column(name="product_options", type="text")
     */
    private $productOptions;


    /**
     * @var string
     *
     * @ORM\Column(name="customer_availability", type="string", length=255, nullable=true)
	 * @Serializer\Groups({"detail", "list"})
     */
    private $customerAvailability;


    /**
     * @var string
     *
     * @ORM\Column(name="is_sent_no_stock", type="boolean")
     */
    private $isSentNoStock;


    /**
     * @var string
     *
     * @ORM\Column(name="is_sent_in_stock", type="boolean")
     */
    private $isSentInStock;


    /**
     * @var string
     *
     * @ORM\Column(name="real_shipping_method", type="string", length=255, nullable=true)
     */
    private $realShippingMethod;


    /**
     * @var int
     *
     * @ORM\Column(name="diff_dates", type="integer", nullable=true)
     */
    private $diffDates;


    /**
     * @var string
     *
     * @ORM\Column(name="is_shipped", type="boolean")
     */
    private $isShipped;

    /**
     * @ORM\ManyToOne(targetEntity="Sale", inversedBy="saleproducts")
     * @ORM\JoinColumn(nullable=false)
     */
    private $sale;

    /**
     * @ORM\ManyToOne(targetEntity="Product")
     * @ORM\JoinColumn(nullable=false)
     * @Serializer\Groups({"detail"})
     */
    private $product;

    /**
     * @ORM\ManyToOne(targetEntity="SaleShipment", inversedBy="saleItems")
     *
     */
    private $saleShipment;

    /**
     * @var bool
     *
     * @ORM\Column(name="is_canceled", type="boolean")
     */
    private $isCanceled;

    /**
     * @var int
     *
     * @ORM\Column(name="shipment_id", type="string", nullable=true)
     */
    private $shipmentId;

    /**
     * @var int
     *
     * @ORM\Column(name="ship_increment_id", type="string", nullable=true)
     */
    private $shipIncrementId;

    /**
     * @var string
     *
     * @ORM\Column(name="carrier", type="string", length=255, nullable=true)
     */
    private $carrier;

    /**
     * @var string
     *
     * @ORM\Column(name="track_number", type="text", nullable=true)
     */
    private $trackNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="shipment_infos", type="text", nullable=true)
     */
    private $shipmentInfos;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="shipped_at", type="datetime", nullable=true)
     */
    private $shippedAt;

    /**
     * @ORM\OneToMany(targetEntity="SaleUpdate", mappedBy="saleProduct")
     */
    private $saleUpdate;

    /**
     * @var int
     *
     * @ORM\Column(name="accept_cancel", type="boolean", nullable=true)
     */
    private $acceptCancel;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_viewed", type="boolean")
     */
    private $isViewed;

    /**
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User")
     *
     */
    private $user;

    /**
     * @var string
     *
     * @ORM\Column(name="validation_comment", type="text", nullable=true)
     */
    private $validationComment;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dmd_cancel_at", type="datetime", nullable=true)
     */
    private $dmdCancelAt;

    /**
     * @var string
     *
     * @ORM\Column(name="tracking_id", type="string", length=255, nullable=true)
     */
    private $trackingId;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_idf", type="boolean", nullable=true, options={"default":false})
     */
    private $isIdf;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at_idf", type="datetime", nullable=true)
     *
     */
    private $createdAtIdf;

    /**
     * @var bool
     *
     * @ORM\Column(name="idf_is_called", type="boolean", nullable=true, options={"default":false})
     *
     */
    private $idfIsCalled;

    /**
     * @var string
     *
     * @ORM\Column(name="idf_called_status", type="string", length=15, nullable=true)
     */
    private $idfCalledStatus;

    /**
     * @var string
     *
     * @ORM\Column(name="idf_called_status_reason", type="string", length=255, nullable=true)
     */
    private $idfCalledStatusReason;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="idf_called_at", type="datetime", nullable=true)
     */
    private $idfCalledAt;

    /**
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User")
     *
     */
    private $transporter;

    /**
     * @var \Time
     *
     * @ORM\Column(name="idf_called_at_time", type="time", nullable=true)
     */
    private $idfCalledAtTime;

    /**
     * @var \Time
     *
     * @ORM\Column(name="idf_called_to_time", type="time", nullable=true)
     */
    private $idfCalledToTime;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_sent_retrait", type="boolean", nullable=true, options={"default":false})
     */
    private $isSentRetrait;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_updated", type="boolean", nullable=true, options={"default":false})
     */
    private $isUpdated;


    /**
     * @var boolean
     *
     * @ORM\Column(name="is_exported_csv", type="boolean", nullable=true, options={"default":false})
     */
    private $isExportedCsv;

    /**
     * @var int
     *
     * @ORM\Column(name="id_sellsy", type="integer", nullable=true)
     */
    private $idSellsy;

    /**
     * @var string
     *
     * @ORM\Column(name="sellsy_api_returned", type="text", nullable=true)
     */
    private $sellsyApiReturned;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="sellsy_invoiced_at", type="datetime", nullable=true)
     */
    private $sellsyInvoicedAt;

    /**
     * @var string
     *
     * @ORM\Column(name="idf_comment", type="text", nullable=true)
     */
    private $idfComment;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_old_retrait", type="boolean", nullable=true, options={"default":false})
     */
    private $isOldRetrait;

    /**
     * @ORM\OneToMany(targetEntity="SaleProductScan", mappedBy="saleProduct")
     */
    private $salePrdScans;

    /**
     * @var string
     *
     * @ORM\Column(name="idf_comment_rdv", type="text", nullable=true)
     */
    private $idfCommentRdv;


    /**
     * @var boolean
     *
     * @ORM\Column(name="is_up_stairs", type="boolean", nullable=true, options={"default":false})
     */
    private $isUpStairs;


    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at_up_stairs", type="datetime", nullable=true)
     */
    private $createdAtUpStairs;

    /**
     * @var bool
     *
     * @ORM\Column(name="up_stairs_is_called", type="boolean", nullable=true, options={"default":false})
     */
    private $upStairsIsCalled;

    /**
     * @var string
     *
     * @ORM\Column(name="up_stairs_called_status", type="string", length=15, nullable=true)
     */
    private $upStairsCalledStatus;

    /**
     * @var string
     *
     * @ORM\Column(name="up_stairs_called_status_reason", type="string", length=255, nullable=true)
     */
    private $upStairsCalledStatusReason;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="up_stairs_called_at", type="datetime", nullable=true)
     */
    private $upStairsCalledAt;

    /**
     * @var \Time
     *
     * @ORM\Column(name="up_stairs_called_at_time", type="time", nullable=true)
     */
    private $upStairsCalledAtTime;

    /**
     * @var \Time
     *
     * @ORM\Column(name="up_stairs_called_to_time", type="time", nullable=true)
     */
    private $upStairsCalledToTime;

    /**
     * @var string
     *
     * @ORM\Column(name="up_stairs_comment_rdv", type="text", nullable=true)
     */
    private $upStairsCommentRdv;

    /**
     * @var string
     *
     * @ORM\Column(name="up_stairs_comment", type="text", nullable=true)
     */
    private $upStairsComment;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_printed_chronopost", type="boolean", nullable=true, options={"default":false})
     */
    private $isPrintedChronopost;


    /**
     * @var string
     *
     * @ORM\Column(name="chronopost_files", type="text", nullable=true)
     */
    private $chronopostFiles;

	/**
     * @var bool
     *
     * @ORM\Column(name="sale_rdv_mail", type="boolean", nullable=true, options={"default":false})
     */
    private $saleRdvMail;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_pre_shipped", type="boolean", nullable=true, options={"default":false})
     */
    private $isPreShipped;

	/**
     * @var DateTime
     *
     * @ORM\Column(name="is_pre_shipped_at", type="datetime", nullable=true, options={"default":null})
     */
    private $isPreShippedAt;

    /**
     * @ORM\Column(name="track_links", type="json_array", nullable=true)
     */
    private $trackLinks;

    /**
     * @var string
     *
     * @ORM\Column(name="idf_delivery_form_pdf", type="string", length=255, nullable=true)
     */
    private $idfDeliveryFormPdf;

    /**
     * @var string
     *
     * @ORM\Column(name="imported_file", type="string", length=255, nullable=true)
     */
    private $importedFile;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_consolidated_stock", type="boolean", nullable=true, options={"default":false})
     */
    private $isConsolidatedStock;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_stock0", type="boolean", nullable=true, options={"default":false})
     */
    private $isStock0;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="sent_to_stock0_at", type="datetime", nullable=true)
     */
    private $sentToStock0At;

    /**
     * @var string
     *
     * @ORM\Column(name="alfy_contract_id", type="string", length=255, nullable=true)
     */
    private $alfyContractId;

    /**
     * @var string
     *
     * @ORM\Column(name="alfy_related_product_sku", type="string", length=255, nullable=true)
     */
    private $alfyRelatedProductSku;

    /**
     * @var int
     *
     * @ORM\Column(name="is_valid_stock0", type="boolean", nullable=true)
     */
    private $isValidStock0;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dispo_client_date", type="date", nullable=true)
     */

    private $dispoClientDate;


    /**
     * @var string|null
     *
     * @ORM\Column(name="bigbuy_order_id", type="string", nullable=true)
     */

    private $bigbuyOrderId;


    /**
     * @var boolean|null
     *
     * @ORM\Column(name="is_sent_to_palimi", type="boolean", nullable=true, options={"default":false})
     */

    private $isSentToPalimi = 0;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_updated_product", type="boolean", options={"default" = 0})
     */
    private $isUpdatedProduct = 0;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="updated_product_at", type="datetime", nullable=true)
     */
    private $updatedProductAt;

    /**
     * @ORM\OneToOne(targetEntity="SaleProduct")
     * @ORM\JoinColumn(name="updated_product_parent", referencedColumnName="id")
     */
    private $updatedProductParent;

    /**
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User")
     *
     */
    private $updatedProductUser;

    /**
     * @var \AppBundle\Entity\Container $container
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Container", inversedBy="saleProducts")
     */
    private $container;


    /**
     * @ORM\ManyToMany(targetEntity="SaleSav", inversedBy="saleProducts", cascade={"persist"})
     */
    private $saleSavs;


    /**
     * @var Date
     *
     * @ORM\Column(name="trusk_date", type="date", nullable=true)
     */
    private $truskDate;

    /**
     * @var text
     *
     * @ORM\Column(name="trusk_id", type="string", length=255, nullable=true)
     */
    private $truskId;


    /**
     * @var string|null
     *
     * @ORM\Column(name="vidaxl_order_id", type="string", nullable=true)
     */

    private $vidaxlOrderId;

    /**
     * @var string
     *
     * @ORM\Column(name="trusker_name", type="string", length=255, nullable=true)
     */
    private $truskerName;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_failed_ship_trusk", type="boolean", nullable=true, options={"default":false})
     */
    private $isFailedShipTrusk = 0;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_validated_trusk", type="boolean", nullable=true, options={"default":false})
     */
    private $isValidatedTrusk;

    /**
     * @var boolean
     *
     * @ORM\Column(name="trusk_rdv_notif", type="boolean", nullable=true, options={"default":false})
     */
    private $truskRdvNotif;

    /**
     * @var int
     *
     * @ORM\Column(name="idf_return", type="integer", nullable=true, options={"default":0, "comment":"0 => no return | 1 => return process | 2 => returned "})
     */
    private $idfReturn = 0;

    /**
     * @var int
     *
     * @ORM\Column(name="sav_idf", type="string", nullable=true)
     */
    private $savIdf;

    /**
     * @return int
     */
    public function getIdfReturn(): int
    {
        return $this->idfReturn;
    }

    /**
     * @param int $idfReturn
     */
    public function setIdfReturn(int $idfReturn): void
    {
        $this->idfReturn = $idfReturn;
    }

    /**
     * @return int
     */
    public function getSavIdf(): int
    {
        return $this->savIdf;
    }

    /**
     * @param int $savIdf
     */
    public function setSavIdf(int $savIdf): void
    {
        $this->savIdf = $savIdf;
    }


    /**
     * Constructor
     */
    public function __construct() {
        $this->saleUpdate = new ArrayCollection();
        $this->salePrdScans = new ArrayCollection();
        $this->saleSavs = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set qty
     *
     * @param integer $qty
     *
     * @return SaleProduct
     */
    public function setQty($qty) {
        $this->qty = $qty;

        return $this;
    }

    /**
     * Get qty
     *
     * @return int
     */
    public function getQty() {
        return $this->qty;
    }

    /**
     * Set price
     *
     * @param string $price
     *
     * @return SaleProduct
     */
    public function setPrice($price) {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return string
     */
    public function getPrice() {
        return $this->price;
    }

    /**
     * Set basePrice
     *
     * @param string $basePrice
     *
     * @return SaleProduct
     */
    public function setBasePrice($basePrice) {
        $this->basePrice = $basePrice;

        return $this;
    }

    /**
     * Get basePrice
     *
     * @return string
     */
    public function getBasePrice() {
        return $this->basePrice;
    }

    /**
     * Set originalPrice
     *
     * @param string $originalPrice
     *
     * @return SaleProduct
     */
    public function setOriginalPrice($originalPrice) {
        $this->originalPrice = $originalPrice;

        return $this;
    }

    /**
     * Get originalPrice
     *
     * @return string
     */
    public function getOriginalPrice() {
        return $this->originalPrice;
    }

    /**
     * Set taxAmount
     *
     * @param string $taxAmount
     *
     * @return SaleProduct
     */
    public function setTaxAmount($taxAmount) {
        $this->taxAmount = $taxAmount;

        return $this;
    }

    /**
     * Get taxAmount
     *
     * @return string
     */
    public function getTaxAmount() {
        return $this->taxAmount;
    }

    /**
     * Set discountAmount
     *
     * @param string $discountAmount
     *
     * @return SaleProduct
     */
    public function setDiscountAmount($discountAmount) {
        $this->discountAmount = $discountAmount;

        return $this;
    }

    /**
     * Get discountAmount
     *
     * @return string
     */
    public function getDiscountAmount() {
        return $this->discountAmount;
    }

    /**
     * Set rowTotal
     *
     * @param string $rowTotal
     *
     * @return SaleProduct
     */
    public function setRowTotal($rowTotal) {
        $this->rowTotal = $rowTotal;

        return $this;
    }

    /**
     * Get rowTotal
     *
     * @return string
     */
    public function getRowTotal() {
        return $this->rowTotal;
    }

    /**
     * Set parentItemId
     *
     * @param integer $parentItemId
     *
     * @return SaleProduct
     */
    public function setParentItemId($parentItemId) {
        $this->parentItemId = $parentItemId;

        return $this;
    }

    /**
     * Get parentItemId
     *
     * @return int
     */
    public function getParentItemId() {
        return $this->parentItemId;
    }

    /**
     * Set id
     *
     * @param integer $id
     *
     * @return SaleProduct
     */
    public function setId($id) {
        $this->id = $id;

        return $this;
    }

    /**
     * Set sale
     *
     * @param \AppBundle\Entity\Sale $sale
     *
     * @return SaleProduct
     */
    public function setSale(\AppBundle\Entity\Sale $sale) {
        $this->sale = $sale;

        return $this;
    }

    /**
     * Get sale
     *
     * @return \AppBundle\Entity\Sale
     */
    public function getSale() {
        return $this->sale;
    }

    /**
     * Set product
     *
     * @param \AppBundle\Entity\Product $product
     *
     * @return SaleProduct
     */
    public function setProduct(\AppBundle\Entity\Product $product) {
        $this->product = $product;

        return $this;
    }

    /**
     * Get product
     *
     * @return \AppBundle\Entity\Product
     */
    public function getProduct() {
        return $this->product;
    }

    /**
     * Set isPrinted
     *
     * @param boolean $isPrinted
     *
     * @return SaleProduct
     */
    public function setIsPrinted($isPrinted) {
        $this->isPrinted = $isPrinted;

        return $this;
    }

    /**
     * Get isPrinted
     *
     * @return boolean
     */
    public function getIsPrinted() {
        return $this->isPrinted;
    }

    /**
     * Set itemRef
     *
     * @param string $itemRef
     *
     * @return SaleProduct
     */
    public function setItemRef($itemRef) {
        $this->itemRef = $itemRef;

        return $this;
    }

    /**
     * Get itemRef
     *
     * @return string
     */
    public function getItemRef() {
        return $this->itemRef;
    }

    /**
     * Set available
     *
     * @param string $available
     *
     * @return SaleProduct
     */
    public function setAvailable($available) {
        $this->available = $available;

        return $this;
    }

    /**
     * Get available
     *
     * @return string
     */
    public function getAvailable() {
        return $this->available;
    }

    /**
     * Set availability
     *
     * @param string $availability
     *
     * @return SaleProduct
     */
    public function setAvailability($availability) {
        $this->availability = $availability;

        return $this;
    }

    /**
     * Get availability
     *
     * @return string
     */
    public function getAvailability() {
        return $this->availability;
    }

    /**
     * Set productOptions
     *
     * @param string $productOptions
     *
     * @return SaleProduct
     */
    public function setProductOptions($productOptions) {
        $this->productOptions = $productOptions;

        return $this;
    }

    /**
     * Get productOptions
     *
     * @return string
     */
    public function getProductOptions() {
        return $this->productOptions;
    }

    /**
     * Set customerAvailability
     *
     * @param string $customerAvailability
     *
     * @return SaleProduct
     */
    public function setCustomerAvailability($customerAvailability) {
        $this->customerAvailability = $customerAvailability;

        return $this;
    }

    /**
     * Get customerAvailability
     *
     * @return string
     */
    public function getCustomerAvailability() {
        return $this->customerAvailability;
    }


    /**
     * Set isSentNoStock
     *
     * @param boolean $isSentNoStock
     *
     * @return SaleProduct
     */
    public function setIsSentNoStock($isSentNoStock) {
        $this->isSentNoStock = $isSentNoStock;

        return $this;
    }

    /**
     * Get isSentNoStock
     *
     * @return boolean
     */
    public function getIsSentNoStock() {
        return $this->isSentNoStock;
    }

    /**
     * Set isSentInStock
     *
     * @param boolean $isSentInStock
     *
     * @return SaleProduct
     */
    public function setIsSentInStock($isSentInStock) {
        $this->isSentInStock = $isSentInStock;

        return $this;
    }

    /**
     * Get isSentInStock
     *
     * @return boolean
     */
    public function getIsSentInStock() {
        return $this->isSentInStock;
    }

    /**
     * Set isShipped
     *
     * @param boolean $isShipped
     *
     * @return SaleProduct
     */
    public function setIsShipped($isShipped) {
        $this->isShipped = $isShipped;

        return $this;
    }

    /**
     * Get isShipped
     *
     * @return boolean
     */
    public function getIsShipped() {
        return $this->isShipped;
    }

    /**
     * Set realShippingMethod
     *
     * @param string $realShippingMethod
     *
     * @return Sale
     */
    public function setRealShippingMethod($realShippingMethod) {
        $this->realShippingMethod = $realShippingMethod;

        return $this;
    }

    /**
     * Get realShippingMethod
     *
     * @return string
     */
    public function getRealShippingMethod() {
        return $this->realShippingMethod;
    }


    /**
     * Set isCanceled
     *
     * @param boolean $isCanceled
     *
     * @return SaleProduct
     */
    public function setIsCanceled($isCanceled) {
        $this->isCanceled = $isCanceled;

        return $this;
    }

    /**
     * Get isCanceled
     *
     * @return boolean
     */
    public function getIsCanceled() {
        return $this->isCanceled;
    }

    /**
     * Set saleShipment
     *
     * @param \AppBundle\Entity\SaleShipment $saleShipment
     *
     * @return SaleProduct
     */
    public function setSaleShipment(\AppBundle\Entity\SaleShipment $saleShipment = null) {
        $this->saleShipment = $saleShipment;

        return $this;
    }

    /**
     * Get saleShipment
     *
     * @return \AppBundle\Entity\SaleShipment
     */
    public function getSaleShipment() {
        return $this->saleShipment;
    }

    /**
     * Set shipmentId
     *
     * @param integer $shipmentId
     *
     * @return SaleProduct
     */
    public function setShipmentId($shipmentId) {
        $this->shipmentId = $shipmentId;

        return $this;
    }

    /**
     * Get shipmentId
     *
     * @return integer
     */
    public function getShipmentId() {
        return $this->shipmentId;
    }

    /**
     * Set shipIncrementId
     *
     * @param integer $shipIncrementId
     *
     * @return SaleProduct
     */
    public function setShipIncrementId($shipIncrementId) {
        $this->shipIncrementId = $shipIncrementId;

        return $this;
    }

    /**
     * Get shipIncrementId
     *
     * @return integer
     */
    public function getShipIncrementId() {
        return $this->shipIncrementId;
    }

    /**
     * Set carrier
     *
     * @param string $carrier
     *
     * @return SaleProduct
     */
    public function setCarrier($carrier) {
        $this->carrier = $carrier;

        return $this;
    }

    /**
     * Get carrier
     *
     * @return string
     */
    public function getCarrier() {
        return $this->carrier;
    }

    /**
     * Set trackNumber
     *
     * @param string $trackNumber
     *
     * @return SaleProduct
     */
    public function setTrackNumber($trackNumber) {
        $this->trackNumber = $trackNumber;

        return $this;
    }

    /**
     * Get trackNumber
     *
     * @return string
     */
    public function getTrackNumber() {
        return $this->trackNumber;
    }

    /**
     * Set shippedAt
     *
     * @param \DateTime $shippedAt
     *
     * @return SaleProduct
     */
    public function setShippedAt($shippedAt) {
        $this->shippedAt = $shippedAt;

        return $this;
    }

    /**
     * Get shippedAt
     *
     * @return \DateTime
     */
    public function getShippedAt() {
        return $this->shippedAt;
    }

    /**
     * Set shipmentInfos
     *
     * @param string $shipmentInfos
     *
     * @return SaleProduct
     */
    public function setShipmentInfos($shipmentInfos) {
        $this->shipmentInfos = $shipmentInfos;

        return $this;
    }

    /**
     * Get shipmentInfos
     *
     * @return string
     */
    public function getShipmentInfos() {
        return $this->shipmentInfos;
    }

    /**
     * Add saleUpdate
     *
     * @param \AppBundle\Entity\SaleUpdate $saleUpdate
     *
     * @return SaleProduct
     */
    public function addSaleUpdate(\AppBundle\Entity\SaleUpdate $saleUpdate) {
        $this->saleUpdate[] = $saleUpdate;

        return $this;
    }

    /**
     * Remove saleUpdate
     *
     * @param \AppBundle\Entity\SaleUpdate $saleUpdate
     */
    public function removeSaleUpdate(\AppBundle\Entity\SaleUpdate $saleUpdate) {
        $this->saleUpdate->removeElement($saleUpdate);
    }

    /**
     * Get saleUpdate
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSaleUpdate() {
        return $this->saleUpdate;
    }

    /**
     * Set acceptCancel
     *
     * @param boolean $acceptCancel
     *
     * @return SaleProduct
     */
    public function setAcceptCancel($acceptCancel) {
        $this->acceptCancel = $acceptCancel;

        return $this;
    }

    /**
     * Get acceptCancel
     *
     * @return boolean
     */
    public function getAcceptCancel() {
        return $this->acceptCancel;
    }

    /**
     * Set isViewed
     *
     * @param boolean $isViewed
     *
     * @return SaleProduct
     */
    public function setIsViewed($isViewed) {
        $this->isViewed = $isViewed;

        return $this;
    }

    /**
     * Get isViewed
     *
     * @return boolean
     */
    public function getIsViewed() {
        return $this->isViewed;
    }

    /**
     * Set user
     *
     * @param \UserBundle\Entity\User $user
     *
     * @return SaleProduct
     */
    public function setUser(\UserBundle\Entity\User $user = null) {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \UserBundle\Entity\User
     */
    public function getUser() {
        return $this->user;
    }

    /**
     * Set validationComment
     *
     * @param string $validationComment
     *
     * @return SaleProduct
     */
    public function setValidationComment($validationComment) {
        $this->validationComment = $validationComment;

        return $this;
    }

    /**
     * Get validationComment
     *
     * @return string
     */
    public function getValidationComment() {
        return $this->validationComment;
    }

    /**
     * Set diffDates
     *
     * @param integer $diffDates
     *
     * @return SaleProduct
     */
    public function setDiffDates($diffDates) {
        $this->diffDates = $diffDates;

        return $this;
    }

    /**
     * Get diffDates
     *
     * @return integer
     */
    public function getDiffDates() {
        return $this->diffDates;
    }


    public static function calculateDiffDates($product) {
        $diff = 0;
        $dateProduct = \DateTime::createFromFormat('Ymd', $product->getAvailability());
        if (strpos($product->getAvailability(), 'Fin de produit') !== false) {
            $diff = -500;
        } else {
            $t = new \Datetime();
            if($dateProduct){
                $diff = $t->diff($dateProduct);
            }
        }

        if (is_object($diff))
            return $diff->format('%R%a');

        return $diff;

    }

    /**
     * Set dmdCancelAt
     *
     * @param \DateTime $dmdCancelAt
     *
     * @return SaleProduct
     */
    public function setDmdCancelAt($dmdCancelAt) {
        $this->dmdCancelAt = $dmdCancelAt;

        return $this;
    }

    /**
     * Get dmdCancelAt
     *
     * @return \DateTime
     */
    public function getDmdCancelAt() {
        return $this->dmdCancelAt;
    }

    /**
     * Set trackingId
     *
     * @param string $trackingId
     *
     * @return SaleProduct
     */
    public function setTrackingId($trackingId) {
        $this->trackingId = $trackingId;

        return $this;
    }

    /**
     * Get trackingId
     *
     * @return string
     */
    public function getTrackingId() {
        return $this->trackingId;
    }

    /**
     * Set isIdf
     *
     * @param boolean $isIdf
     *
     * @return SaleProduct
     */
    public function setIsIdf($isIdf) {
        $this->isIdf = $isIdf;

        return $this;
    }

    /**
     * Get isIdf
     *
     * @return boolean
     */
    public function getIsIdf() {
        return $this->isIdf;
    }

    /**
     * Set createdAtIdf
     *
     * @param \DateTime $createdAtIdf
     *
     * @return SaleProduct
     */
    public function setCreatedAtIdf($createdAtIdf) {
        $this->createdAtIdf = $createdAtIdf;

        return $this;
    }

    /**
     * Get createdAtIdf
     *
     * @return \DateTime
     */
    public function getCreatedAtIdf() {
        return $this->createdAtIdf;
    }

    /**
     * Set idfIsCalled
     *
     * @param boolean $idfIsCalled
     *
     * @return SaleProduct
     */
    public function setIdfIsCalled($idfIsCalled) {
        $this->idfIsCalled = $idfIsCalled;

        return $this;
    }

    /**
     * Get idfIsCalled
     *
     * @return boolean
     */
    public function getIdfIsCalled() {
        return $this->idfIsCalled;
    }

    /**
     * Set idfCalledStatus
     *
     * @param string $idfCalledStatus
     *
     * @return SaleProduct
     */
    public function setIdfCalledStatus($idfCalledStatus) {
        $this->idfCalledStatus = $idfCalledStatus;

        return $this;
    }

    /**
     * Get idfCalledStatus
     *
     * @return string
     */
    public function getIdfCalledStatus() {
        return $this->idfCalledStatus;
    }

    /**
     * Set idfCalledStatusReason
     *
     * @param string $idfCalledStatusReason
     *
     * @return SaleProduct
     */
    public function setIdfCalledStatusReason($idfCalledStatusReason) {
        $this->idfCalledStatusReason = $idfCalledStatusReason;

        return $this;
    }

    /**
     * Get idfCalledStatusReason
     *
     * @return string
     */
    public function getIdfCalledStatusReason() {
        return $this->idfCalledStatusReason;
    }

    /**
     * Set idfCalledAt
     *
     * @param \DateTime $idfCalledAt
     *
     * @return SaleProduct
     */
    public function setIdfCalledAt($idfCalledAt) {
        $this->idfCalledAt = $idfCalledAt;

        return $this;
    }

    /**
     * Get idfCalledAt
     *
     * @return \DateTime
     */
    public function getIdfCalledAt() {
        return $this->idfCalledAt;
    }

    /**
     * Set transporter
     *
     * @param \UserBundle\Entity\User $transporter
     *
     * @return SaleProduct
     */
    public function setTransporter(\UserBundle\Entity\User $transporter = null) {
        $this->transporter = $transporter;

        return $this;
    }

    /**
     * Get transporter
     *
     * @return \UserBundle\Entity\User
     */
    public function getTransporter() {
        return $this->transporter;
    }


    /**
     * Set idfCalledAtTime
     *
     * @param \DateTime $idfCalledAtTime
     *
     * @return SaleProduct
     */
    public function setIdfCalledAtTime($idfCalledAtTime) {
        $this->idfCalledAtTime = $idfCalledAtTime;

        return $this;
    }

    /**
     * Get idfCalledAtTime
     *
     * @return \DateTime
     */
    public function getIdfCalledAtTime() {
        return $this->idfCalledAtTime;
    }

    /**
     * Set idfCalledToTime
     *
     * @param \DateTime $idfCalledToTime
     *
     * @return SaleProduct
     */
    public function setIdfCalledToTime($idfCalledToTime) {
        $this->idfCalledToTime = $idfCalledToTime;
        return $this;
    }


    /**
     * Set isSentRetrait
     *
     * @param boolean $isSentRetrait
     *
     * @return SaleProduct
     */
    public function setIsSentRetrait($isSentRetrait) {
        $this->isSentRetrait = $isSentRetrait;
        return $this;
    }

    /**
     * Get idfCalledToTime
     *
     * @return \DateTime
     */
    public function getIdfCalledToTime() {
        return $this->idfCalledToTime;
    }

    /**
     * Get isSentRetrait
     *
     * @return boolean
     */
    public function getIsSentRetrait() {
        return $this->isSentRetrait;
    }


    /**
     * Set isUpdated
     *
     * @param boolean $isUpdated
     *
     * @return SaleProduct
     */
    public function setIsUpdated($isUpdated) {
        $this->isUpdated = $isUpdated;
        return $this;
    }

    /**
     * Get isUpdated
     *
     * @return boolean
     */
    public function getIsUpdated() {
        return $this->isUpdated;
    }


    /**
     * Set isExportedCsv
     *
     * @param boolean $isExportedCsv
     *
     * @return SaleProduct
     */
    public function setIsExportedCsv($isExportedCsv) {
        $this->isExportedCsv = $isExportedCsv;
        return $this;
    }

    /**
     * Get isExportedCsv
     *
     * @return boolean
     */
    public function getIsExportedCsv() {
        return $this->isExportedCsv;
    }


    /**
     * Set idSellsy
     *
     * @param integer $idSellsy
     *
     * @return SaleProduct
     */
    public function setIdSellsy($idSellsy) {
        $this->idSellsy = $idSellsy;

        return $this;
    }

    /**
     * Get idSellsy
     *
     * @return integer
     */
    public function getIdSellsy() {
        return $this->idSellsy;
    }

    /**
     * Set sellsyApiReturned
     *
     * @param string $sellsyApiReturned
     *
     * @return SaleProduct
     */
    public function setSellsyApiReturned($sellsyApiReturned) {
        $this->sellsyApiReturned = $sellsyApiReturned;

        return $this;
    }

    /**
     * Get sellsyApiReturned
     *
     * @return string
     */
    public function getSellsyApiReturned() {
        return $this->sellsyApiReturned;
    }

    /**
     * Set sellsyInvoicedAt
     *
     * @param \DateTime $sellsyInvoicedAt
     *
     * @return SaleProduct
     */
    public function setSellsyInvoicedAt($sellsyInvoicedAt) {
        $this->sellsyInvoicedAt = $sellsyInvoicedAt;

        return $this;
    }

    /**
     * Get sellsyInvoicedAt
     *
     * @return \DateTime
     */
    public function getSellsyInvoicedAt() {
        return $this->sellsyInvoicedAt;
    }

    /**
     * Set idfComment
     *
     * @param string $idfComment
     *
     * @return SaleProduct
     */
    public function setIdfComment($idfComment) {
        $this->idfComment = $idfComment;

        return $this;
    }

    /**
     * Get idfComment
     *
     * @return string
     */
    public function getIdfComment() {
        return $this->idfComment;
    }

    /**
     * Set isOldRetrait
     *
     * @param boolean $isOldRetrait
     *
     * @return SaleProduct
     */
    public function setIsOldRetrait($isOldRetrait) {
        $this->isOldRetrait = $isOldRetrait;

        return $this;
    }

    /**
     * Get isOldRetrait
     *
     * @return boolean
     */
    public function getIsOldRetrait() {
        return $this->isOldRetrait;
    }

    /**
     * Add salePrdScan
     *
     * @param \AppBundle\Entity\SaleProductScan $salePrdScan
     *
     * @return SaleProduct
     */
    public function addSalePrdScan(\AppBundle\Entity\SaleProductScan $salePrdScan) {
        $this->salePrdScans[] = $salePrdScan;

        return $this;
    }

    /**
     * Remove salePrdScan
     *
     * @param \AppBundle\Entity\SaleProductScan $salePrdScan
     */
    public function removeSalePrdScan(\AppBundle\Entity\SaleProductScan $salePrdScan) {
        $this->salePrdScans->removeElement($salePrdScan);
    }

    /**
     * Get salePrdScans
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSalePrdScans() {
        return $this->salePrdScans;
    }

    /**
     * Set idfCommentRdv
     *
     * @param string $idfCommentRdv
     *
     * @return SaleProduct
     */
    public function setIdfCommentRdv($idfCommentRdv) {
        $this->idfCommentRdv = $idfCommentRdv;

        return $this;
    }

    /**
     * Get idfCommentRdv
     *
     * @return string
     */
    public function getIdfCommentRdv() {
        return $this->idfCommentRdv;
    }

    /**
     * @return bool
     */
    public function getIsUpStairs() {
        return $this->isUpStairs;
    }

    /**
     * @param bool $isUpStairs
     */
    public function setIsUpStairs($isUpStairs) {
        $this->isUpStairs = $isUpStairs;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAtUpStairs() {
        return $this->createdAtUpStairs;
    }

    /**
     * @param \DateTime $createdAtUpStairs
     */
    public function setCreatedAtUpStairs($createdAtUpStairs) {
        $this->createdAtUpStairs = $createdAtUpStairs;
    }

    /**
     * @return bool
     */
    public function getUpStairsIsCalled() {
        return $this->upStairsIsCalled;
    }

    /**
     * @param bool $upStairsIsCalled
     */
    public function setUpStairsIsCalled($upStairsIsCalled) {
        $this->upStairsIsCalled = $upStairsIsCalled;
    }

    /**
     * @return \DateTime
     */
    public function getUpStairsCalledAt() {
        return $this->upStairsCalledAt;
    }

    /**
     * @param \DateTime $upStairsCalledAt
     */
    public function setUpStairsCalledAt($upStairsCalledAt) {
        $this->upStairsCalledAt = $upStairsCalledAt;
    }

    /**
     * @return string
     */
    public function getUpStairsCalledStatusReason() {
        return $this->upStairsCalledStatusReason;
    }

    /**
     * @param string $upStairsCalledStatusReason
     */
    public function setUpStairsCalledStatusReason($upStairsCalledStatusReason) {
        $this->upStairsCalledStatusReason = $upStairsCalledStatusReason;
    }

    /**
     * @return string
     */
    public function getUpStairsCalledStatus() {
        return $this->upStairsCalledStatus;
    }

    /**
     * @param string $upStairsCalledStatus
     */
    public function setUpStairsCalledStatus($upStairsCalledStatus) {
        $this->upStairsCalledStatus = $upStairsCalledStatus;
    }

    /**
     * @return \Time
     */
    public function getUpStairsCalledAtTime() {
        return $this->upStairsCalledAtTime;
    }

    /**
     * @param \Time $upStairsCalledAtTime
     */
    public function setUpStairsCalledAtTime($upStairsCalledAtTime) {
        $this->upStairsCalledAtTime = $upStairsCalledAtTime;
    }

    /**
     * @return \Time
     */
    public function getUpStairsCalledToTime() {
        return $this->upStairsCalledToTime;
    }

    /**
     * @param \Time $upStairsCalledToTime
     */
    public function setUpStairsCalledToTime($upStairsCalledToTime) {
        $this->upStairsCalledToTime = $upStairsCalledToTime;
    }

    /**
     * @return string
     */
    public function getUpStairsCommentRdv() {
        return $this->upStairsCommentRdv;
    }

    /**
     * @param string $upStairsCommentRdv
     */
    public function setUpStairsCommentRdv($upStairsCommentRdv) {
        $this->upStairsCommentRdv = $upStairsCommentRdv;
    }

    /**
     * @return string
     */
    public function getUpStairsComment() {
        return $this->upStairsComment;
    }

    /**
     * @param string $up_StairsComment
     */
    public function setUpStairsComment($up_StairsComment) {
        $this->upStairsComment = $up_StairsComment;
    }

    /**
     * Set isPrintedChronopost
     *
     * @param boolean $isPrintedChronopost
     *
     * @return SaleProduct
     */
    public function setIsPrintedChronopost($isPrintedChronopost) {
        $this->isPrintedChronopost = $isPrintedChronopost;

        return $this;
    }

    /**
     * Get isPrintedChronopost
     *
     * @return boolean
     */
    public function getIsPrintedChronopost() {
        return $this->isPrintedChronopost;
    }

    /**
     * Set chronopostFiles
     *
     * @param string $chronopostFiles
     *
     * @return SaleProduct
     */
    public function setChronopostFiles($chronopostFiles) {
        $this->chronopostFiles = $chronopostFiles;

        return $this;
    }

    /**
     * Get chronopostFiles
     *
     * @return string
     */
    public function getChronopostFiles() {
        return $this->chronopostFiles;
    }

    /**
     * @return string
     */
    public function getSaleItemId() {
        return $this->saleItemId;
    }

    /**
     * @param string $saleItemId
     */
    public function setSaleItemId($saleItemId) {
        $this->saleItemId = $saleItemId;
    }


	 /**
     * Set saleRdvMail
     *
     * @param string $saleRdvMail
     *
     * @return SaleProduct
     */
    public function setSaleRdvMail($saleRdvMail)
    {
        $this->saleRdvMail = $saleRdvMail;

        return $this;
    }

    /**
     * Get saleRdvMail
     *
     * @return string
     */
    public function getSaleRdvMail()
    {
        return $this->saleRdvMail;
    }

    /**
     * Set isPreShipped
     *
     * @param string $isPreShipped
     *
     * @return SaleProduct
     */
    public function setIsPreShipped($isPreShipped)
    {
        $this->isPreShipped = $isPreShipped;

        return $this;
    }

    /**
     * Get isPreShipped
     *
     * @return string
     */
    public function getIsPreShipped()
    {
        return $this->isPreShipped;
    }


	 /**
     * Set isPreShippedAt
     *
     * @param string $isPreShippedAt
     *
     * @return SaleProduct
     */
    public function setIsPreShippedAt($isPreShippedAt)
    {
        $this->isPreShippedAt = $isPreShippedAt;

        return $this;
    }

    /**
     * Get isPreShippedAt
     *
     * @return string
     */
    public function getIsPreShippedAt()
    {
        return $this->isPreShippedAt;
    }

    /**
     * Checking if this
     * Sale product is printable
     */
    public function isPrintable($forse = false)
    {

        if ($this->getSale()->getSource() === 'GoogleShopping') {

            return $this->isInStockAndNotShippedForGoogle();
        }

        $product = $this->getFinalProduct();

        return (
            (
                (
                    $product->getAvailable() === 'En_Stock' || $this->getIsSentInStock() || $this->getToPrint() === 1
                )
                &&
                (
                    !$this->getIsShipped() && !$this->getIsPrinted() && !$this->getIsCanceled() && ($product->getIsActive() ||  $forse)
                )
            )
            ||
            (
                !$this->getIsShipped() && !$this->getIsPrinted() && !$this->getIsCanceled() && $this->getIsSentInStock()
            )
        );

    }

    /**
     * Get final product
     * @return Product
     */
    public function getFinalProduct() {

        $product = $this->getProduct();
        /*if (!$this->getSaleUpdate()->isEmpty()) {
            foreach ($this->getSaleUpdate() as $su) {
                if ($su->getIsValidated()) {
                    $product = $su->getProduct();
                }
            }
        }*/
        return $product;
    }

    /**
     * Is in stock and not shipped
     * and not printed and not canceled
     */
    public function isInStockAndNotShipped(){

        if($this->getSale()->getSource() === 'GoogleShopping'){

            return $this->isInStockAndNotShippedForGoogle();
        }

        $product = $this->getFinalProduct();

        return (
            (
                $product->getAvailable() === 'En_Stock' || $this->getIsSentInStock() || $this->getToPrint() === 1
            )
            &&
            (
                !$this->getIsShipped() && !$this->getIsPrinted() && !$this->getIsCanceled()
            )
        );
    }

    /**
     * Is not shipped and not printed and is not canceled
     */
    public function isInStockAndNotShippedForGoogle(){

        return (
                !$this->getIsShipped() && !$this->getIsPrinted() && !$this->getIsCanceled()
            );
    }

    /**
     * Is in stock and not shipped
     * and not printed and not canceled
     */
    public function isInStockAndNotShippedOnly(){


        $product = $this->getFinalProduct();

        return (
            (
                $product->getAvailable() === 'En_Stock' || $this->getIsSentInStock() || $this->getToPrint() === 1
            )
            &&
            (
                !$this->getIsShipped() && !$this->getIsCanceled()
            )
        );
    }


    /**
     * Is in stock and not shipped
     * and not printed and not canceled
     */
    public function isNotInStockAndNotShipped(){

        $product = $this->getFinalProduct();

        return (
            (
                ($product->getAvailable() !== 'En_Stock' && !$this->getIsSentInStock() ) || $this->getIsSentNoStock()
            )
            &&
            (
                !$this->getIsShipped() && !$this->getIsPrinted() && !$this->getIsCanceled()
            )
        );
    }

    /**
     * Checking if retrait
     * and not shipped
     * @return bool
     */
    public function isOldRetraitAndNotShipped(){

        return $this->getIsOldRetrait() && $this->getIsSentRetrait() && !$this->getIsShipped();
    }

    /**
     * Is up stairs
     * and shipped
     * @return bool
     */
    public function isShippedOrIsUpstairs(){
        return $this->getIsShipped() || $this->getIsUpStairs();
    }

    /**
     * Is printed and inStock
     * @return bool
     */
    public function isPrintedAndInStock(){

        return (
            $this->getIsSentInStock() || $this->getFinalProduct()->getAvailable() == 'En_Stock'
            ||
            ($this->getAvailable() == 'En_Stock' && $this->getIsPrinted()))
            && !$this->getIsShipped();
    }

    /**
     * Is in stock and not shipped
     * and printed and not canceled
     */
    public function isInStockAndPrintedAndNotShipped(){


        return (
                $this->getIsSentInStock() || $this->getFinalProduct()->getAvailable() == 'En_Stock'
                ||
                (
                    $this->getFinalProduct()->getAvailable() != 'En_Stock' && $this->getIsPrinted())) && !$this->getIsShipped();
    }

    /**
     * Check whether
     * is able to be
     * shipped
     * @return bool
     */
    public function isShippable() {
        if($this->getSale()->getSource() === 'GoogleShopping'){
            return $this->isShippableForGoogle();
        }
        return (
                ($this->getIsSentInStock() || $this->getFinalProduct()->getAvailable() == 'En_Stock' || $this->getToPrint() === 1)
                ||
                (
                    $this->getFinalProduct()->getAvailable() != 'En_Stock' && $this->getIsPrinted())
                )
            && !$this->getIsShipped() && !$this->getIsCanceled();
    }

    /**
     * Check whether
     * is able to be
     * shipped for google
     * @return bool
     */
    public function isShippableForGoogle() {

        return $this->getIsPrinted() && !$this->getIsShipped() && !$this->getIsCanceled();
    }

    /**
     * @return mixed
     */
    public function getTrackLinks() {
        return $this->trackLinks;
    }

    /**
     * @param mixed $trackLinks
     * @return SaleProduct
     */
    public function setTrackLinks($trackLinks) {
        $this->trackLinks = $trackLinks;
        return $this;
    }

    /**
     * Set idfDeliveryFormPdf
     *
     * @param string $idfDeliveryFormPdf
     *
     * @return SaleProduct
     */
    public function setIdfDeliveryFormPdf($idfDeliveryFormPdf)
    {
        $this->idfDeliveryFormPdf = $idfDeliveryFormPdf;

        return $this;
    }

    /**
     * Get idfDeliveryFormPdf
     *
     * @return string
     */
    public function getIdfDeliveryFormPdf()
    {
        return $this->idfDeliveryFormPdf;
    }

    /**
     * @return string
     */
    public function getImportedFile()
    {
        return $this->importedFile;
    }

    /**
     * @param string $importedFile
     */
    public function setImportedFile($importedFile)
    {
        $this->importedFile = $importedFile;
        return $this;
    }

    /**
     * @return bool
     */
    public function getIsConsolidatedStock()
    {
        return $this->isConsolidatedStock;
    }

    /**
     * @param bool $isConsolidatedStock
     */
    public function setIsConsolidatedStock($isConsolidatedStock)
    {
        $this->isConsolidatedStock = $isConsolidatedStock;
        return $this;
    }

    /**
     * @return bool
     */
    public function isStock0() {
        return $this->isStock0;
    }

    /**
     * @param bool $isStock0
     */
    public function setIsStock0($isStock0) {
        $this->isStock0 = $isStock0;
    }

    /**
     * @return DateTime
     */
    public function getSentToStock0At() {
        return $this->sentToStock0At;
    }

    /**
     * @param DateTime $sentToStock0At
     */
    public function setSentToStock0At(DateTime $sentToStock0At = null) {
        $this->sentToStock0At = $sentToStock0At;
    }

    /**
     * @return string
     */
    public function getAlfyContractId(): ?string {
        return $this->alfyContractId;
    }

    /**
     * @param string $alfyContractId
     */
    public function setAlfyContractId(?string $alfyContractId) {
        $this->alfyContractId = $alfyContractId;
    }

    /**
     * @return string
     */
    public function getAlfyRelatedProductSku():? string {
        return $this->alfyRelatedProductSku;
    }

    /**
     * @param string|null $alfyRelatedProductSku
     */
    public function setAlfyRelatedProductSku(?string $alfyRelatedProductSku): void {
        $this->alfyRelatedProductSku = $alfyRelatedProductSku;
    }

    /**
     * @return int
     */
    public function getIsValidStock0(): ?int {
        return $this->isValidStock0;
    }

    /**
     * @param int $isValidStock0
     */
    public function setIsValidStock0(int $isValidStock0): void {
        $this->isValidStock0 = $isValidStock0;
    }

    public static function getListAvailabilityForCustomer($isDispo = null) {
        $dispo = [
                'En_stock' => 'En stock',
                'Fin de produit' => 'Fin de produit',
                'Une semaine' => "Une semaine",
                '2_semaines' => "2 semaines",
                '3_semaines' => "3 semaines",
                '4_semaines' => "4 semaines",
                '5_semaines' => "5 semaines",
                '6_semaines' => "6 semaines",
                '7_semaines' => "7 semaines",
                '8_semaines' => "8 semaines",
                '9_semaines' => "9 semaines",
                '10_semaines' => "10 semaines",
                '11_semaines' => "11 semaines",
                '12_semaines' => "12 semaines",
                '13_semaines' => "13 semaines",
                '14_semaines' => "14 semaines",
                '15_semaines' => "15 semaines",
                '16_semaines' => "16 semaines",
                '+ de 16 semaines' => "+ de 16 semaines",
        ];

        if ($isDispo) {
            if (isset($dispo[$isDispo]))
                return $dispo[$isDispo];
            else
                return '--';

        } else {
            return $dispo;
        }
    }

    /**
     * @return string|null
     */
    public function getBigbuyOrderId(): ?string
    {
        return $this->bigbuyOrderId;
    }

    /**
     * @param string|null $bigbuyOrderId
     * @return SaleProduct
     */
    public function setBigbuyOrderId(?string $bigbuyOrderId): SaleProduct
    {
        $this->bigbuyOrderId = $bigbuyOrderId;
        return $this;
    }

    /**
     * @return int
     */
    public function getToPrint()
    {
        return $this->toPrint;
    }

    /**
     * @param int $toPrint
     * @return SaleProduct
     */
    public function setToPrint(int $toPrint): SaleProduct
    {
        $this->toPrint = $toPrint;
        return $this;
    }

    /**
     * @return mixed|Container
     */
    public function getContainer()
    {
        return $this->container;
    }

    /**
     * @param Container|null $container
     * @return SaleProduct
     */
    public function setContainer(?Container $container): SaleProduct
    {
        $this->container = $container;
        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getSentToPrintAt(): ?DateTime
    {
        return $this->sentToPrintAt;
    }

    /**
     * @param DateTime|null $sentToPrintAt
     */
    public function setSentToPrintAt(?DateTime $sentToPrintAt): void
    {
        $this->sentToPrintAt = $sentToPrintAt;
    }

    /**
     * @return bool|null
     */
    public function getIsSentToPalimi()
    {
        return $this->isSentToPalimi;
    }

    /**
     * @param bool|null $isSentToPalimi
     */
    public function setIsSentToPalimi($isSentToPalimi): void
    {
        $this->isSentToPalimi = $isSentToPalimi;
    }

    /**
     * @return bool
     */
    public function getIsUpdatedProduct(): bool
    {
        return $this->isUpdatedProduct;
    }

    /**
     * @param bool $isUpdatedProduct
     */
    public function setIsUpdatedProduct(bool $isUpdatedProduct)
    {
        $this->isUpdatedProduct = $isUpdatedProduct;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getUpdatedProductAt(): ?DateTime
    {
        return $this->updatedProductAt;
    }

    /**
     * @param DateTime $updatedProductAt
     */
    public function setUpdatedProductAt(DateTime $updatedProductAt)
    {
        $this->updatedProductAt = $updatedProductAt;
        return $this;
    }

    /**
     * @return SaleProduct|null
     */
    public function getUpdatedProductParent(): ?SaleProduct
    {
        return $this->updatedProductParent;
    }

    /**
     * @param SaleProduct $updatedProductParent
     * @return SaleProduct
     */
    public function setUpdatedProductParent(SaleProduct $updatedProductParent)
    {
        $this->updatedProductParent = $updatedProductParent;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUpdatedProductUser()
    {
        return $this->updatedProductUser;
    }

    /**
     * @param mixed $updatedProductUser
     */
    public function setUpdatedProductUser($updatedProductUser)
    {
        $this->updatedProductUser = $updatedProductUser;
        return $this;
    }



    /**
     * Get saleSav
     *
     * @return Collection
     */
    public function getSaleSavs(): Collection
    {
        return $this->saleSavs;
    }

    /**
     * Add saleProduct
     *
     * @param SaleSav $saleSavItem
     * @return SaleProduct
     */
    public function addSaleSavs(SaleSav $saleSavItem): SaleProduct
    {
        $this->saleSavs[] = $saleSavItem;

        return $this;
    }

    /**
     * @return DateTime
     */
    public function getDispoClientDate(): ?DateTime
    {
        return $this->dispoClientDate;
    }

    /**
     * @param DateTime $dispoClientDate
     */
    public function setDispoClientDate(DateTime $dispoClientDate): void
    {
        $this->dispoClientDate = $dispoClientDate;
    }

    /**
     * @return DateTime
     */
    public function getTruskDate()
    {
        return $this->truskDate;
    }

    /**
     * @param DateTime $truskDate
     * @return SaleProduct
     */
    public function setTruskDate(DateTime $truskDate): SaleProduct
    {
        $this->truskDate = $truskDate;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getTruskId(): ?string
    {
        return $this->truskId;
    }

    /**
     * @param string $truskId
     * @return SaleProduct
     */
    public function setTruskId($truskId): SaleProduct
    {
        $this->truskId = $truskId;
        return $this;
    }

    /**
     * @return string
     */
    public function getTruskerName(): ?string {
        return $this->truskerName;
    }

    /**
     * @param string $truskerName
     */
    public function setTruskerName(?string $truskerName){
        $this->truskerName = $truskerName;
        return $this;
    }

    /**
     * @return bool
     */
    public function getIsFailedShipTrusk()
    {
        return $this->isFailedShipTrusk;
    }

    /**
     * @param bool $isFailedShipTrusk
     */
    public function setIsFailedShipTrusk($isFailedShipTrusk)
    {
        $this->isFailedShipTrusk = $isFailedShipTrusk;
        return $this;
    }

    /**
     * @return bool
     */
    public function isValidatedTrusk(): ?bool {
        return $this->isValidatedTrusk;
    }

    /**
     * @param bool $isValidatedTrusk
     */
    public function setIsValidatedTrusk(bool $isValidatedTrusk): void {
        $this->isValidatedTrusk = $isValidatedTrusk;
    }

    /**
     * @return string|null
     */
    public function getVidaxlOrderId(): ?string
    {
        return $this->vidaxlOrderId;
    }

    /**
     * @param string|null $vidaxlOrderId
     * @return SaleProduct
     */
    public function setVidaxlOrderId(?string $vidaxlOrderId): SaleProduct
    {
        $this->vidaxlOrderId = $vidaxlOrderId;

        return $this;
    }

	 /**
     * @return bool
     */
    public function isTruskRdvNotif(): ?bool
    {
        return $this->truskRdvNotif;
    }

    /**
     * @param bool $truskRdvNotif
     */
    public function setTruskRdvNotif(bool $truskRdvNotif): void
    {
        $this->truskRdvNotif = $truskRdvNotif;
    }

}
