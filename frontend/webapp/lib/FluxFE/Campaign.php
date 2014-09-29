<?php
namespace FluxFE;

use Mojavi\Form\MongoForm;
use Mojavi\Util\Ajax;

class Campaign extends \Flux\Campaign {

	private $offer;
	private $client;

	// +------------------------------------------------------------------------+
	// | HELPER METHODS															|
	// +------------------------------------------------------------------------+

	/**
	 * Returns the cache filename
	 * @return string
	 */
	function getCacheFilename($cache_key) {
		return 'campaign_' . $cache_key . '.json';
	}
	
	/**
	 * Returns the cache filename
	 * @return string
	 */
	function getCacheFilenames() {
		$ret_val = array();
		$ret_val[] = $this->getCacheFilename($this->getId());
		return $ret_val;
	}
	
	/**
	 * Returns the client
	 * @return \FluxFE\Client
	 */
	function getClient() {
		if (is_null($this->client)) {
			$this->client = new \FluxFE\Client();
			$this->client->setId($this->getClientId());
			$this->client->query();
		}
		return $this->client;
	}

	/**
	 * Returns the offer
	 * @return \FluxFE\Offer
	 */
	function getOffer() {
		if (is_null($this->offer)) {
			$this->offer = new \FluxFE\Offer();
			$this->offer->setId($this->getOfferId());
			$this->offer->query();
		}
		return $this->offer;
	}

	/**
	 * Queries for an offer
	 * @see \Mojavi\Form\MongoForm::query()
	 */
	function query(array $criteria = array(), $merge_id = true) {
		if (defined('FLOW_CACHE_DIR')) {
			$response = Ajax::sendAjaxAndCache(FLOW_CACHE_DIR . '/' . $this->getCacheFilename($this->getId()) . '.json', '/campaign/campaign', array('_id' => (string)$this->getId()));
		} else if (defined('MO_CACHE_DIR')) {
			$response = Ajax::sendAjaxAndCache(MO_CACHE_DIR . '/' . $this->getCacheFilename($this->getId()) . '.json', '/campaign/campaign', array('_id' => (string)$this->getId()));
		} else {
			$response = Ajax::sendAjax('/campaign/campaign', array('_id' => (string)$this->getId()));
		}
		if (isset($response['record'])) {
			$this->populate($response['record']);
		}
		return $this;
	}

	/**
	 * Queries for an offer
	 * @see \Mojavi\Form\MongoForm::query()
	 */
	function queryAll(array $criteria = array(), $hydrate = true) {
		throw new Exception('Campaign::queryAll is not supported on the frontend');
	}

	/**
	 * Inserts a new offer
	 * @see \Mojavi\Form\MongoForm::insert()
	 */
	function insert() {
		throw new Exception('Campaign::insert is not supported on the frontend');
	}

	/**
	 * Updates an existing offer
	 * @see \Mojavi\Form\MongoForm::update()
	 */
	function update($criteria_array = array(), $update_array = array(), $options_array = array(), $use_set_notation = false) {
		throw new Exception('Campaign::update is not supported on the frontend');
	}

	/**
	 * Deletes an existing offer
	 * @see \Mojavi\Form\MongoForm::delete()
	 */
	function delete() {
		throw new Exception('Campaign::delete is not supported on the frontend');
	}

}