<?php
namespace GunFE;

use Mojavi\Form\MongoForm;
use Mojavi\Util\Ajax;

class OfferPage extends \Gun\OfferPage {

	/**
	 * Returns the offer
	 * @return integer
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
		$response = Ajax::sendAjaxAndCache(MO_CACHE_DIR . '/offer_page_' . $this->getId() . '.json', '/offer/offer-page', array('_id' => $this->getId()));
		if (isset($response['record'])) {
			$this->populate($response['record']);
		}
		return $this;
	}

	/**
	 * Queries for an offer_page
	 * @see \Mojavi\Form\MongoForm::query()
	 */
	function queryByPageName() {
		$response = Ajax::sendAjaxAndCache(MO_CACHE_DIR . '/offer_page_' . md5($this->getPageName()) . '.json', '/offer/offer-page', array('file_path' => $this->getFilePath(), 'preview_url' => $this->getPreviewUrl(), 'offer_id' => $this->getOfferId(), 'page_name' => $this->getPageName()));
		if (isset($response['record'])) {
			$this->populate($response['record']);
		}
		return $this;
	}

	/**
	 * Queries for an offer_page
	 * @see \Mojavi\Form\MongoForm::query()
	 */
	function queryAll(array $criteria = array(), $hydrate = true) {
		throw new Exception('OfferPage::queryAll is not supported on the frontend');
	}

	/**
	 * Inserts a new offer_page
	 * @see \Mojavi\Form\MongoForm::insert()
	 */
	function insert() {
		throw new Exception('OfferPage::insert is not supported on the frontend');
	}

	/**
	 * Updates an existing offer_page
	 * @see \Mojavi\Form\MongoForm::update()
	 */
	function update($criteria_array = array(), $update_array = array(), $options_array = array(), $use_set_notation = false) {
		throw new Exception('OfferPage::update is not supported on the frontend');
	}

	/**
	 * Deletes an existing offer_page
	 * @see \Mojavi\Form\MongoForm::delete()
	 */
	function delete() {
		throw new Exception('OfferPage::delete is not supported on the frontend');
	}
}