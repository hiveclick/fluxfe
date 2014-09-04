<?php
namespace GunFE;

use Mojavi\Form\MongoForm;
use Mojavi\Util\Ajax;

class Offer extends \Gun\Offer {

	/**
	 * Returns the client
	 * @return integer
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
	 * Queries for an offer
	 * @see \Mojavi\Form\MongoForm::query()
	 */
	function query(array $criteria = array(), $merge_id = true) {
		$response = Ajax::sendAjaxAndCache(MO_CACHE_DIR . '/offer_' . $this->getId() . '.json', '/offer/offer', array('_id' => $this->getId()));
		if (isset($response['record'])) {
			$this->populate($response['record']);
		}
		return $this;
	}

	/**
	 * Queries for an offer
	 * @see \Mojavi\Form\MongoForm::query()
	 */
	function queryByFolderName() {
		$response = Ajax::sendAjaxAndCache(MO_CACHE_DIR . '/offer_' . $this->getFolderName() . '.json', '/offer/offer', array('folder_name' => $this->getFolderName()));
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
		throw new Exception('Offer::queryAll is not supported on the frontend');
	}

	/**
	 * Inserts a new offer
	 * @see \Mojavi\Form\MongoForm::insert()
	 */
	function insert() {
		throw new Exception('Offer::insert is not supported on the frontend');
	}

	/**
	 * Updates an existing offer
	 * @see \Mojavi\Form\MongoForm::update()
	 */
	function update($criteria_array = array(), $update_array = array(), $options_array = array(), $use_set_notation = false) {
		throw new Exception('Offer::update is not supported on the frontend');
	}

	/**
	 * Deletes an existing offer
	 * @see \Mojavi\Form\MongoForm::delete()
	 */
	function delete() {
		throw new Exception('Offer::delete is not supported on the frontend');
	}
}