<?php
namespace FluxFE;

class LeadTracking extends \Flux\LeadTracking {
	
	private $_offer;
	private $_client;
	private $_campaign;
	
	/**
	 * Returns the offer details
	 * @return \Flux\Offer
	 */
	function getOffer() {
		if (is_null($this->_offer)) {
			$this->_offer = new \FluxFE\Offer();
			if ($this->getOfferId() == 0) {
				$this->findDefaultCampaign();
			}
			$this->_offer->setId($this->getOfferId());
			$this->_offer->query();
		}
		return $this->_offer;
	}
	
	/**
	 * Returns the client details
	 * @return \Flux\Client
	 */
	function getClient() {
		if (is_null($this->_client)) {
			$this->_client = new \FluxFE\Client();
			if ($this->getClientId() == 0) {
				$this->findDefaultCampaign();
			}
			$this->_client->setId($this->getClientId());
			$this->_client->query();
		}
		return $this->_client;
	}
	
	/**
	 * Returns the campaign details
	 * @return \Flux\Campaign
	 */
	function getCampaign() {
		if (is_null($this->_campaign)) {
			$this->_campaign = new \FluxFE\Campaign();
			if ($this->getCampaignId() == 0) {
				$this->findDefaultCampaign();
			}
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
	
	/**
	 * Finds the default campaign if we don't have one
	 *
	 */
	function findDefaultCampaign() {
		if (isset($_SERVER['DOCUMENT_ROOT'])) {
			if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/.cache/config.php')) {
				include_once($_SERVER['DOCUMENT_ROOT'] . '/.cache/config.php');
				if (defined('DEFAULT_CAMPAIGN_ID')) {
					$this->setCampaignId(DEFAULT_CAMPAIGN_ID);
				} else {
					\Mojavi\Logging\LoggerManager::error(__METHOD__ . " :: " . "Cannot retrieve default campaign because DEFAULT_CAMPAIGN_ID is missing");
				}
			} else {
				\Mojavi\Logging\LoggerManager::error(__METHOD__ . " :: " . "Cannot retrieve default campaign because .config.php is missing");
			}
		} else {
			\Mojavi\Logging\LoggerManager::error(__METHOD__ . " :: " . "Cannot retrieve default campaign because S_SERVER[DOCUMENT_ROOT] is missing");
		}
	}
	
}