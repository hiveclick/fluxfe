<?php
namespace GunFE;

use Mojavi\Form\MongoForm;
use Mojavi\Util\Ajax;

class DataField extends \Gun\DataField {

	// +------------------------------------------------------------------------+
	// | HELPER METHODS															|
	// +------------------------------------------------------------------------+

	/**
	 * Queries a data field by it's name
	 * @return Gun\DataField
	 */
	function query(array $criteria = array(), $merge_id = true) {
		$response = Ajax::sendAjaxAndCache(MO_CACHE_DIR . '/datafield_' . $this->getId() . '.json', '/admin/datafield', array('_id' => $this->getId()));
		if (isset($response['record'])) {
			$this->populate($response['record']);
		}
		return $this;
	}

	/**
	 * Queries a report column by it's name
	 * @return Gun\DataField
	 */
	function queryAll(array $criteria = array(), $hydrate = true) {
		$ret_val = array();
		$response = Ajax::sendAjaxAndCache(MO_CACHE_DIR . '/datafields.json', '/admin/datafield', array('ignore_pagination' => 1));
		if (isset($response['entries'])) {
			foreach ($response['entries'] as $entry) {
				$data_field = new \GunFE\DataField();
				$data_field->populate($entry);
				$ret_val[] = $data_field;
			}
		}
		return $ret_val;
	}
}
?>