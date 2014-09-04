<?php
namespace GunFE;

class LeadTracking extends \Gun\LeadTracking {
	
	private $_offer;
	private $_client;
	private $_campaign;
	
	/**
	 * Returns the offer details
	 * @return \Gun\Offer
	 */
	function getOffer() {
		if (is_null($this->_offer)) {
			$this->_offer = new \GunFE\Offer();
			$this->_offer->setId($this->getOfferId());
			$this->_offer->query();
		}
		return $this->_offer;
	}
	
	/**
	 * Returns the client details
	 * @return \Gun\Client
	 */
	function getClient() {
		if (is_null($this->_client)) {
			$this->_client = new \GunFE\Client();
			$this->_client->setId($this->getClientId());
			$this->_client->query();
		}
		return $this->_client;
	}
	
	/**
	 * Returns the campaign details
	 * @return \Gun\Campaign
	 */
	function getCampaign() {
		if (is_null($this->_campaign)) {
			$this->_campaign = new \GunFE\Campaign();
			$this->_campaign->setId($this->getCampaignId());
			$this->_campaign->query();
		}
		return $this->_campaign;
	}
	
	/**
	 * Sets the _campaign_id
	 * @var string
	 */
	function setCampaignId($arg0) {
		$this->_campaign_id = $arg0;
		$this->_campaign = null;
		$this->addModifiedColumn("_campaign_id");
		// Fetch the offer and client from the campaign
		$this->setOfferId($this->getCampaign()->getOfferId());
		$this->setClientId($this->getCampaign()->getClientId());
		return $this;
	}
	
}