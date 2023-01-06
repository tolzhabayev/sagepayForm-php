<?php
/**
 * SagePay Class for Form Integration Method, utilizes Protocol V3
 * 
 * @author    Timur Olzhabayev
 * @copyright Copyright (c) 2013, Timur Olzhabayev
 * @license   http://www.opensource.org/licenses/mit-license.php
 */
 

class SagePay {

	protected $vendorTxCode;
	protected $amount;
	protected $currency;
	protected $description;
	protected $successURL;
	protected $failureURL;
	protected $customerName;
	protected $customerEMail;
	protected $vendorEMail;
	protected $sendEMail;
	protected $eMailMessage;
	protected $billingSurname;
	protected $billingFirstnames;
	protected $billingAddress1;
	protected $billingAddress2;
	protected $billingPostCode;
	protected $billingCountry;
	protected $billingCity;
	protected $billingState;
	protected $billingPhone;
	protected $deliverySurname;
	protected $deliveryFirstnames;
	protected $deliveryAddress1;
	protected $deliveryAddress2;
	protected $deliveryCity;
	protected $deliveryPostCode;
	protected $deliveryCountry;
	protected $deliveryState;
	protected $deliveryPhone;
	protected $basket;
	protected $allowGiftAid;
	protected $applyAVSCV2;
	protected $apply3DSecure;
	protected $billingAgreement;
	protected $basketXML;
	protected $customerXML;
	protected $surchargeXML;
	protected $vendorData;
	protected $referrerID;
	protected $language;
	protected $website;
	protected $encryptPassword = "PUTYOURPASSWORDHERE";
	protected $encryptMethod = "AES-128-CBC";
	
	public function __construct() {
		$this->setVendorTxCode($this->createVendorTxCode());
	}

	public function getCrypt() {
			$cryptString = 'VendorTxCode='.$this->getVendorTxCode();
			$cryptString.= '&ReferrerID='.$this->getReferrerID();
			$cryptString.= '&Amount='.$this->getAmount();
			$cryptString.= '&Currency='.$this->getCurrency();
			$cryptString.= '&Description='.$this->getDescription();
			$cryptString.= '&SuccessURL='.$this->getSuccessURL();
			$cryptString.= '&FailureURL='.$this->getFailureURL();
			$cryptString.= '&CustomerName='.$this->getCustomerName();
			$cryptString.= '&CustomerEMail='.$this->getCustomerEMail();
			$cryptString.= '&VendorEMail='.$this->getVendorEMail();
			$cryptString.= '&SendEMail='.$this->getSendEMail();
			$cryptString.= '&eMailMessage='.$this->getEMailMessage();
			$cryptString.= '&BillingSurname='.$this->getBillingSurname();
			$cryptString.= '&BillingFirstnames='.$this->getBillingFirstnames();
			$cryptString.= '&BillingAddress1='.$this->getBillingAddress1();
			$cryptString.= '&BillingAddress2='.$this->getBillingAddress2();
			$cryptString.= '&BillingCity='.$this->getBillingCity();
			$cryptString.= '&BillingPostCode='.$this->getBillingPostCode();
			$cryptString.= '&BillingCountry='.$this->getBillingCountry();
			$cryptString.= '&BillingState='.$this->getBillingState();
			$cryptString.= '&BillingPhone='.$this->getBillingPhone();
			$cryptString.= '&DeliverySurname='.$this->getDeliverySurname();
			$cryptString.= '&DeliveryFirstnames='.$this->getDeliveryFirstnames();
			$cryptString.= '&DeliveryAddress1='.$this->getDeliveryAddress1();
			$cryptString.= '&DeliveryAddress2='.$this->getDeliveryAddress2();
			$cryptString.= '&DeliveryCity='.$this->getDeliveryCity();
			$cryptString.= '&DeliveryPostCode='.$this->getDeliveryPostCode();
			$cryptString.= '&DeliveryCountry='.$this->getDeliveryCountry();
			$cryptString.= '&DeliveryState='.$this->getDeliveryState();
			$cryptString.= '&DeliveryPhone='.$this->getDeliveryPhone();
			$cryptString.= '&Basket='.$this->getBasket();
			$cryptString.= '&AllowGiftAid='.$this->getAllowGiftAid();
			$cryptString.= '&ApplyAVSCV2='.$this->getApplyAVSCV2();
			$cryptString.= '&Apply3DSecure='.$this->getApply3DSecure();
			$cryptString.= '&BillingAgreement='.$this->getBillingAgreement();
			$cryptString.= '&BasketXML='.$this->getBasketXML();
			$cryptString.= '&CustomerXML='.$this->getCustomerXML();
			$cryptString.= '&SurchargeXML='.$this->getSurchargeXML();
			$cryptString.= '&VendorData='.$this->getVendorData();
			$cryptString.= '&ReferrerID='.$this->getReferrerID();
			$cryptString.= '&Language='.$this->getLanguage();
			$cryptString.= '&Website='.$this->getWebsite();


			return $this->encryptAndEncode($cryptString);

	}



	protected function createVendorTxCode() {
	 $timestamp = date("y-m-d-H-i-s", time());
	 $random_number = rand(0,32000)*rand(0,32000);
	 return "{$timestamp}-{$random_number}";
	}

	public function setVendorTxCode($code) {
        $this->vendorTxCode = $code;

        return $this;
	}
	public function getVendorTxCode() {
		return $this->vendorTxCode;
	}

	public function setAmount($amount) {
		$this->amount = number_format($amount, 2);
    
        return $this;    
    }

	public function getAmount() {
		return $this->amount;
	}

	public function getCurrency() {
		return $this->currency;
	}

	public function setCurrency($currency) {
		$this->currency = strtoupper($currency);
    
        return $this;
    }

	public function getSuccessURL() {
		return $this->successURL;
	}
	public function setSuccessURL($url) {
		$this->successURL = $url;
    
        return $this;
    }
	public function getFailureURL() {
		return $this->failureURL;
	}
	public function setFailureURL($url) {
		$this->failureURL = $url;
    
        return $this;
    }

	public function getDescription() {
		return $this->description;
	}
	public function setDescription($description) {
		$this->description = mb_substr($description, 0, 100);
        return $this;
    }

	public function getCustomerName() {
		return $this->customerName;
	}
	public function setCustomerName($name) {
		$this->customerName = $name;
    
        return $this;
    }

	public function getCustomerEMail() {
		return $this->customerEMail;
	}
	public function setCustomerEMail($email) {
		$this->customerEMail = $email;
    
        return $this;
    }

	public function getVendorEMail() {
		return $this->vendorEMail;
	}
	public function setVendorEMail($email) {
		$this->vendorEMail = $email;
    
        return $this;
    }

	public function getSendEMail() {
		return $this->sendEMail;
	}
	public function setSendEMail($sendEmail = 1) {
		$this->sendEMail = $sendEmail;
    
        return $this;
    }

	public function getEMailMessage() {
		return $this->eMailMessage;
	}
	public function setEMailMessage($emailMessage) {
		$this->eMailMessage = $emailMessage;

        return $this;
    }

	public function setBillingFirstnames($billingFirstnames) {
		$this->billingFirstnames = $billingFirstnames;

        return $this;
    }

	public function getBillingFirstnames() {
		return $this->billingFirstnames;
	}

	public function setBillingSurname($billingSurname) {
		$this->billingSurname = $billingSurname;
    
        return $this;
    }

	public function getBillingSurname() {
		return $this->billingSurname;
	}

	public function setBillingAddress1($billingAddress1) {
		$this->billingAddress1 = $billingAddress1;
    
        return $this;
    }

	public function getBillingAddress1() {
		return $this->billingAddress1;
	}

	public function setBillingAddress2($billingAddress2) {
		$this->billingAddress2 = $billingAddress2;
    
        return $this;
    }

	public function getBillingAddress2() {
		return $this->billingAddress2;
	}

	public function setBillingCity($billingCity) {
		$this->billingCity = $billingCity;
    
        return $this;
    }

	public function getBillingCity() {
		return $this->billingCity;
	}

	public function setBillingPostCode($billingPostCode) {
		$this->billingPostCode = $billingPostCode;
        
        return $this;
    }

	public function getBillingPostCode() {
		return $this->billingPostCode;
	}

	public function setBillingState($billingState) {
		$this->billingState = $billingState;
    
        return $this;
    }

	public function getBillingState() {
		return $this->billingState;
	}

	public function getBillingCountry() {
		return $this->billingCountry;
	}
	public function setBillingCountry($countryISO3166) {
		$this->billingCountry = strtoupper($countryISO3166);

        return $this;
    }

	public function setBillingPhone($phone) {
		$this->billingPhone = $phone;
    
        return $this;
    }

	public function getBillingPhone() {
		return $this->billingPhone;
	}

	public function setDeliverySurname($surname) {
		$this->deliverySurname = $surname;

        return $this;
    }

	public function getDeliverySurname() {
		return $this->deliverySurname;
	}


	public function setDeliveryFirstnames($firstnames) {
		$this->deliveryFirstnames = $firstnames;
    
        return $this;
    }

	public function getDeliveryFirstnames() {
		return $this->deliveryFirstnames;
	}

	public function setDeliveryAddress1($address) {
		$this->deliveryAddress1 = $address;
    
        return $this;
    }

	public function getDeliveryAddress1() {
		return $this->deliveryAddress1;
	}

	public function setDeliveryAddress2($address) {
		$this->deliveryAddress2 = $address;
    
        return $this;
    }

	public function getDeliveryAddress2() {
		return $this->deliveryAddress2;
	}

	public function setDeliveryCity($city) {
		$this->deliveryCity = $city;
    
        return $this;
    }

	public function getDeliveryCity() {
		return $this->deliveryCity;
	}

	public function setDeliveryPostCode($zip) {
		$this->deliveryPostCode = $zip;
    
        return $this;
    }

	public function getDeliveryPostCode() {
		return $this->deliveryPostCode;
	}

	public function setDeliveryCountry($country) {
		$this->deliveryCountry = strtoupper($country);
    
        return $this;
    }

	public function getDeliveryCountry() {
		return $this->deliveryCountry;
	}


	public function setDeliveryState($state) {
		$this->deliveryState = $state;
    
        return $this;
    }

	public function getDeliveryState() {
		return $this->deliveryState;
	}

	public function setDeliveryPhone($phone) {
		$this->deliveryPhone = $phone;
    
        return $this;
    }

	public function getDeliveryPhone() {
		return $this->deliveryPhone;
	}

	public function setBasket($basket) {
		$this->basket = $basket;
    
        return $this;
    }

	public function getBasket() {
		return $this->basket;
	}

	public function setAllowGiftAid($allowGiftAid = 0) {
        $this->allowGiftAid = $allowGiftAid;

        return $this;
	}

	public function getAllowGiftAid() {
		return $this->allowGiftAid;
	}

	public function setApplyAVSCV2($avsCV2 = 0) {
		$this->applyAVSCV2 = $avsCV2;
    
        return $this;
    }

	public function getApplyAVSCV2() {
		return $this->applyAVSCV2;
	}

	public function setApply3DSecure($apply3DSecure = 0) {
		$this->apply3DSecure = $apply3DSecure;
    
        return $this;
    }

	public function getApply3DSecure() {
		return $this->apply3DSecure;
	}


	public function setBillingAgreement ($billingAgreement = 0) {
		$this->billingAgreement = $billingAgreement;
    
        return $this;
    }

	public function getBillingAgreement() {
		return $this->billingAgreement;
	}


	public function setBasketXML ($basketXML) {
		$this->basketXML = $basketXML;

        return $this;
    }

	public function getBasketXML() {
		return $this->basketXML;
	}

	public function setCustomerXML ($customerXML) {
		$this->customerXML = $customerXML;
    
        return $this;
    }

	public function getCustomerXML() {
		return $this->customerXML;
	}

	public function setSurchargeXML ($surchargeXML) {
		$this->surchargeXML = $surchargeXML;
    
        return $this;
    }

	public function getSurchargeXML() {
		return $this->surchargeXML;
	}

	public function setVendorData ($vendorData) {
		$this->vendorData = $vendorData;
    
        return $this;
    }

	public function getVendorData() {
		return $this->vendorData;
	}

	public function setReferrerID ($referrerID) {
		$this->referrerID = $referrerID;
    
        return $this;
    }

	public function getReferrerID() {
		return $this->referrerID;
	}


	public function setLanguage ($language) {
		$this->language = $language;
    
        return $this;
    }

	public function getLanguage() {
		return $this->language;
	}


	public function setWebsite ($website) {
		$this->website = $website;
    
        return $this;
    }

	public function getWebsite() {
		return $this->website;
	}


	public function setDeliverySameAsBilling() {
		$this->setDeliverySurname($this->getBillingSurname());
		$this->setDeliveryFirstnames($this->getBillingFirstnames());
		$this->setDeliveryAddress1($this->getBillingAddress1());
		$this->setDeliveryAddress2($this->getBillingAddress2());
		$this->setDeliveryCity($this->getBillingCity());
		$this->setDeliveryPostCode($this->getBillingPostCode());
		$this->setDeliveryCountry($this->getBillingCountry());
		$this->setDeliveryState($this->getBillingState());
		$this->setDeliveryPhone($this->getBillingPhone());

		return $this;
	}


	public function decode($strIn) {
		$decodedString =  $this->decodeAndDecrypt($strIn);
		parse_str($decodedString, $sagePayResponse);
		return $sagePayResponse;
	}
	
	protected function encryptAndEncode($strIn)
	{
		$strIn = $this->pkcs5_pad($strIn, 16);
		$encrypted = openssl_encrypt($strIn, $this->encryptMethod, $this->encryptPassword, OPENSSL_RAW_DATA, $this->encryptPassword);
		$encrypted = "@".bin2hex($encrypted);
		return $encrypted;

	}
	
	protected function decodeAndDecrypt($strIn)
	{
		$strIn = substr($strIn, 1);
		$strIn = pack('H*', $strIn);
		$decrypted = openssl_decrypt($strIn, $this->encryptMethod, $this->encryptPassword, OPENSSL_RAW_DATA, $this->encryptPassword);
		return $decrypted;

	}


	protected function pkcs5_pad($text, $blocksize)	{
		$pad = $blocksize - (strlen($text) % $blocksize);
		return $text . str_repeat(chr($pad), $pad);
	}
}
