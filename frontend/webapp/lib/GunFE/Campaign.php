<?php
namespace GunFE;

use Mojavi\Form\MongoForm;
use Mojavi\Util\Ajax;

class Campaign extends \Gun\Campaign {

	private $offer;
	private $client;

	// +------------------------------------------------------------------------+
	// | HELPER METHODS															|
	// +------------------------------------------------------------------------+

	/**
	 * Returns the client
	 * @return \GunFE\Client
	 */
	function getClient() {
		if (is_null($this->client)) {
			$this->client = new \GunFE\Client();
			$this->client->setId($this->getClientId());
			$this->client->query();
		}
		return $this->client;
	}

	/**
	 * Returns the offer
	 * @return \GunFE\Offer
	 */
	function getOffer() {
		if (is_null($this->offer)) {
			$this->offer = new \GunFE\Offer();
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
		$response = Ajax::sendAjaxAndCache(MO_CACHE_DIR . '/campaign_' . $this->getId() . '.json', '/campaign/campaign', array('_id' => (string)$this->getId()));
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