<?php
namespace GunFE;

use Mojavi\Logging\LoggerManager;

class Lead extends \Gun\Lead {

	const COOKIE_NAME = 'gunLocal';

	private static $_lead;

	/* Used to store the current campaign, offer and client */
	private $_offer_page;
	
	// these are dirty arrays that store data until it is persisted to the database
	private $__di = array();
	private $__ei = array();

	//private data storage
	private $__p = array();

	// used to generate a uniform timestamp each time this lead is accessed
	private $__uniformTimestamp;

	private $errors;

	public function __construct() {
		parent::__construct();		
	}

	/**
	 * Returns a new instance of this lead
	 * @return \Gun\LocalLead
	 */
	public static function getInstance() {
		if (is_null(self::$_lead)) {
			self::$_lead = new \GunFE\Lead();

			// Load the lead in from the cookie (if it exists)
			$found_lead = false;
			if (session_id() != '') {
				if (defined('COOKIE_NAME') && isset($_SESSION[COOKIE_NAME]) && is_string($_SESSION[COOKIE_NAME])) {
					$request_array = json_decode(rawurldecode($_SESSION[COOKIE_NAME]), true);
					if (is_array($request_array)) {
						$found_lead = true;
						self::$_lead->populate($request_array);
						if (self::$_lead->getId() != '') {
							self::$_lead->query();
						}
					}
				}
			}

			// A cookie should copy the _d, but create a new lead
			if ($found_lead === false && defined('COOKIE_NAME') &&  isset($_COOKIE[COOKIE_NAME]) && is_string($_COOKIE[COOKIE_NAME])) {
				$request_array = json_decode(rawurldecode($_COOKIE[COOKIE_NAME]), true);
				if (is_array($request_array) && isset($request_array['_d'])) {
					$found_lead = true;
					self::$_lead->populate($request_array['_d']);
				}
			}

			// Populate the lead from the request variables
			self::$_lead->populate($_REQUEST);

			// Save our populated lead to the session
			self::$_lead->save();
		}
		self::$_lead->__uniformTimestamp = new \MongoDate();
		return self::$_lead;
	}

	/**
	 * Populates this lead by setting values into the internal _d variable
	 * @return \Gun\Lead
	 */
	function populate($arg0, $modify_columns = true) {
		parent::populate($arg0, $modify_columns);
		if (is_array($arg0)) {
			foreach ($arg0 as $name => $value) {
				
				// Handle our main data array
				/*
				if (strpos($name, \Gun\DataField::DATA_FIELD_DEFAULT_CONTAINER) === 0 && is_array($value)) {
					foreach ($value as $key => $val) {
						if (strpos($key, 'd') === 0 && isset($val['v'])) {
							$this->setValue($key, $val['v'], $val['m']);
						}
					}
					$this->_d = $value;
					if ($modify_columns) { $this->addModifiedColumn(\Gun\DataField::DATA_FIELD_DEFAULT_CONTAINER); }
					continue;
				}
				
				// Handle the _t tracking array
				if (strpos($name, '_t') === 0 && is_array($value)) {
					$this->setT($value);
					if ($modify_columns) { $this->addModifiedColumn('_t'); }
					continue;
				}

				// This is our event array, so populate it to the data
				if (strpos($name, \Gun\DataField::DATA_FIELD_EVENT_CONTAINER) === 0 && is_array($value)) {
					if (!is_array($this->_e)) { $this->_e = array(); }
					foreach ($value as $ev) {
						$lead_event = new \Gun\LeadEvent();
						$lead_event->populate($ev);
						$this->_e[] = $lead_event;
					}	
					if ($modify_columns) { $this->addModifiedColumn(\Gun\DataField::DATA_FIELD_EVENT_CONTAINER); }
					continue;
				}
				*/
				/*
				if (strpos($name, \Gun\DataField::DATA_FIELD_REF_CAMPAIGN_KEY) === 0 && $name == \Gun\DataField::DATA_FIELD_REF_CAMPAIGN_KEY) {
					$this->setCampaignKey($value); // Save the campaign key
					continue;
				}
				if (strpos($name, \Gun\DataField::DATA_FIELD_REF_CAMPAIGN_ID) === 0 && $name == \Gun\DataField::DATA_FIELD_REF_CAMPAIGN_ID) {
					$this->setCampaignId($value); // Save the campaign id
					continue;
				}
				
				if (strpos($name, \Gun\DataField::DATA_FIELD_REF_OFFER_ID) === 0 && $name == \Gun\DataField::DATA_FIELD_REF_OFFER_ID) {
					$this->setOfferId($value); // Save the offer id
					continue;
				}
				if (strpos($name, \Gun\DataField::DATA_FIELD_REF_CLIENT_ID) === 0 && $name == \Gun\DataField::DATA_FIELD_REF_CLIENT_ID) {
					$this->setClientId($value); // Save the client id
					continue;
				}
				if (strpos($name, \Gun\DataField::DATA_FIELD_ID_NAME) === 0) {
					$this->setId($value); // Save the lead id
					if ($modify_columns) { $this->addModifiedColumn(\Gun\DataField::DATA_FIELD_ID_NAME); }
					continue;
				}
				*/
				if (strpos($name, '_') === 0) { continue; } // All other internal variables all begin with an underscore
				LoggerManager::error(__METHOD__ . " :: " . "populating: " . $name . ': ' . VAR_EXPORT($value, true));
				$this->setValue($name, $value, self::LEAD_REQUEST_CODE_DEFAULT);
			}
		} else {
			$this->setValue($name, $value, self::LEAD_REQUEST_CODE_DEFAULT);
		}
		return $this;
	}

	/**
	 * Saves the lead to the session
	 * @return void
	 */
	function save($persist_to_database = false) {
		// If we need to save to the database, then we can do that here
		if ($persist_to_database) {
			$this->persist();
		}		
		
		$lead_array = $this->toArray(false);
		$lead_array['_d'] = array_merge((array)$this->getD(), $this->getDirtyData());
		
		$lead_array = json_encode($lead_array);
		// Save to the session
		if (session_id() != '' && defined('COOKIE_NAME')) {
			//we could just save the class into the session, but for consistency let's just serialize the variables anyway			
			$_SESSION[COOKIE_NAME] = rawurlencode($lead_array);
		} else {
			LoggerManager::error(__METHOD__ . " :: [ " . $_SERVER['SERVER_NAME'] . " ] SESSION NOT SAVED BECAUSE session_id is blank or COOKIE_NAME is not defined");
		}
				
		if (defined('COOKIE_NAME')) { // Paths use the COOKIE_NAME constant
			header('P3P: CP="NOI ADM DEV PSAi COM NAV OUR OTRo STP IND DEM"');
			setcookie(COOKIE_NAME, rawurlencode($lead_array), time()+60*60*24*300, '/');
		} else if (defined('MO_COOKIE_NAME')) { // Frontend and redirects use the MO_COOKIE_NAME constant
			header('P3P: CP="NOI ADM DEV PSAi COM NAV OUR OTRo STP IND DEM"');
			setcookie(MO_COOKIE_NAME, rawurlencode($lead_array), time()+60*60*24*300, '/');
		} else {
			LoggerManager::error(__METHOD__ . " :: [ " . $_SERVER['SERVER_NAME'] . " ] cookie NOT SAVED BECAUSE COOKIE_NAME and MO_COOKIE_NAME are not defined");
		}
		return $this;
	}

	/**
	 * Persists this lead to the database by saving everything in the dirty arrays (__di and __ei)
	 * This function will convert the __di and __ei to Mongo update arrays
	 * @return boolean
	 */
	private function persist() {
		$update_array = array();
		if ($this->getId() == '') {
/*
			$this->setValue(\Gun\DataField::DATA_FIELD_REF_CLIENT_ID, array('_id' => $this->getClientId(), 'name' => $this->getClient()->getName()), self::LEAD_REQUEST_CODE_INSERT);
			$this->setValue(\Gun\DataField::DATA_FIELD_REF_OFFER_ID, array('_id' => $this->getOfferId(), 'name' => $this->getOffer()->getName()), self::LEAD_REQUEST_CODE_INSERT);
*/
			// Setup a created event that will be saved on this lead
			$created_event = \GunFE\DataField::retrieveDataFieldFromKeyName(\GunFE\DataField::DATA_FIELD_EVENT_CREATED_NAME);
			if (!is_null($created_event)) {
				$this->setValue(\GunFE\DataField::DATA_FIELD_EVENT_CREATED_NAME, $this->__uniformTimestamp, self::LEAD_REQUEST_CODE_INSERT);
			} else {
				LoggerManager::error(__METHOD__ .  " :: " . 'Cannot find created event from name: ' . \GunFE\DataField::DATA_FIELD_EVENT_CREATED_NAME);
			}
			
			// First save the lead if we haven't yet
			$insert_id = $this->insert();
			$this->setId($insert_id);
		} else if (!empty($this->createUpdateArray())) {
			$this->update();
		}

		// Store our criteria (in this case, we just need the lead id)
		$criteria_array = array('_id' => new \MongoId($this->getId()));

		/*
		 * Process the dirty data array by creating an upsert statement and saving the lead
		 * Save everything from __di
		 */
		foreach($this->getDirtyData() as $key => $dirty_data_element) {
			$dataFieldDbId = \GunFE\DataField::DATA_FIELD_DEFAULT_CONTAINER . '.' . $dirty_data_element['n'];
			$operator = self::convertRequestCodeToOperator($dirty_data_element['m']);
			if (is_array($dirty_data_element['v'])) {
				//we have a validated object type (unvalidated object types would not have made it this far)
				$partial_name = $dataFieldDbId;
				$set_notation_array = $this->createSetNotation($dirty_data_element['v']);
				foreach($set_notation_array AS $set_node_id => $set_node_value) {
					$update_array[$operator][$partial_name . '.' . $set_node_id] = $set_node_value;
				}
			} else {
				$update_array[$operator][$dataFieldDbId] = $dirty_data_element['v'];
			}
		}
		if (!empty($update_array)) {
			// Save this lead to the database
			$this->getCollection()->update($criteria_array, $update_array, array('upsert' => true));
		}

		/*
		 * Process the dirty event array by creating an upsert statement and saving the lead
		 * Save everything from __ei
		 */
		$update_array = array();
		$criteria_array_event = array('_id' => new \MongoId($this->getId()));
		foreach ($this->getE() as $event) {
			$criteria_array_event[\GunFE\DataField::DATA_FIELD_EVENT_CONTAINER] = array('$not' => array('$elemMatch' => array(
				'n' => $event->getEventId(), // event id
				'o' => $event->getOfferId(), // offer id
				'c' => $event->getClientId() // client id
			)));
			$update_array = array('$push' => array(\GunFE\DataField::DATA_FIELD_EVENT_CONTAINER => $event->toArray()));
				
			if (!empty($update_array)) {
				// Save this lead to the database
				$this->getCollection()->update($criteria_array_event, $update_array);
			}
		}

		
		// Now clear the dirty arrays, since they were synced
		$this->__di = array();
		$this->__ei = array();

		// Requery the lead after we have updated it
		$this->query();

		return true;
	}

	/**
	 * Returns a data value from the lead
	 * @return string
	 */
	function getValue($data_name, $default_value = '', $assign_if_not_set = true) {
		$data_field = \GunFE\DataField::retrieveDataFieldFromName($data_name);
		if (!is_null($data_field)) {
			if ($data_field->getStorageType() == \GunFE\DataField::DATA_FIELD_STORAGE_TYPE_DEFAULT) {
				// First check if the value exists in the dirty array
				if (isset($this->__di[$data_field->getKeyName()])) {
					return $this->__di[$data_field->getKeyName()]['v'];
				}

				// Next check if the value exists in the main data array
				if (isset($this->_d[$data_field->getKeyName()])) {
					return $this->_d[$data_field->getKeyName()];
				}
				// Assign the default value if the data is not found
				if ($assign_if_not_set) { $this->setValue($data_field->getKeyName(), $default_value); }
			}
		} else {
			if (isset($this->__p[$data_name])) {
				return $this->__p[$data_name];
			}
		}
		return $default_value;
	}

	/**
	 * Sets a data value in the lead
	 * @param string $data_name
	 * @param string $data_value
	 * @return \Gun\LocalLead
	 */
	function setValue($data_name, $data_value, $request_code = self::LEAD_REQUEST_CODE_UPDATE) {
		/* @var $data_field \GunFE\DataField */
		$data_field = \GunFE\DataField::retrieveDataFieldFromName($data_name);
		if (!is_null($data_field)) {
			// if we are incrementing, decrementing, min, or max'ing then make sure that the data field supports it
			if (in_array($request_code, array(self::LEAD_REQUEST_CODE_INC, self::LEAD_REQUEST_CODE_DEC))) {
				if (!in_array($data_field->getType(), \GunFE\DataField::typesCanIncDec())) {
					$this->getErrors()->addError('warning', 'The dataField ' . $data_field->getName() . ' cannot be incremented or decremented');
					return false;
				}
			} else if (in_array($request_code, array(self::LEAD_REQUEST_CODE_MAX, self::LEAD_REQUEST_CODE_MIN))) {
				if (!in_array($data_field->getType(), \GunFE\DataField::typesCanMaxMin())) {
					$this->getErrors()->addError('warning', 'The dataField ' . $data_field->getName() . ' cannot be maximized or minimized');
					return false;
				}
			}

			//unset operations shouldn't need any validation
			if ($request_code === self::LEAD_REQUEST_CODE_UNSET) {
				$result = true;
			} else {
				$result = $data_field->doValidationAndFormat($data_value, $this);
			}

			if ($result === true) {
				if ($data_field->getStorageType() === \GunFE\DataField::DATA_FIELD_STORAGE_TYPE_MAIN) {
					// right now we do nothing with these
				} else if($data_field->getStorageType() === \GunFE\DataField::DATA_FIELD_STORAGE_TYPE_DEFAULT) {
					// save the data
					$data_field_subdoc = array(
							'h' => $data_field->getName(),
							'm' => $request_code,
							'n' => $data_field->getKeyName(),
							'v' => $data_value
					);
					$this->setDirtyDataValue($data_field->getKeyname(), $data_field_subdoc);
					$this->setPrivateValue($data_field->getKeyname(), $data_value);
				} else if ($data_field->getStorageType() === \GunFE\DataField::DATA_FIELD_STORAGE_TYPE_TRACKING) {
					// save the tracking data
					$tracking = $this->getT();
					$tracking->populate(array($data_field->getKeyName() => $data_value));
					$this->setT($tracking);
				} else if($data_field->getStorageType() === \GunFE\DataField::DATA_FIELD_STORAGE_TYPE_EVENT) {
					// Find the payout and revenue
					$this->addEvent($data_field->getKeyName(), $data_value);
				}
				return true;
			} else {
				$this->getErrors()->addError('warning', 'The value passed for ' . $data_field->getName() . ' is not valid');
				LoggerManager::error(__METHOD__ . " :: " . "The value passed for " . $data_field->getName() . " is not valid");
				return false;
			}
		} else {
			$this->setPrivateValue($data_name, $data_value);
		}
		return $this;
	}
	
	/**
	 * Returns the _t
	 * @return array
	 */
	function getT() {
		if (is_null($this->_t)) {
			$this->_t = new \GunFE\LeadTracking();
		}
		return $this->_t;
	}

	/**
	 * Returns the __di
	 * @return string
	 */
	function getDirtyData() {
		if (is_null($this->__di)) {
			$this->__di = array();
		}
		return $this->__di;
	}

	/**
	 * Sets the __di
	 * @var string
	 */
	function setDirtyData($arg0) {
		$this->__di = $arg0;
		return $this;
	}

	/**
	 * Sets data to the dirty event array
	 * @var $data_name
	 * @var $data_value
	 */
	function setDirtyDataValue($data_name, $data_value) {
		$tmp_array = $this->getDirtyData();
		$tmp_array[$data_name] = $data_value;
		$this->setDirtyData($tmp_array);
		return $this;
	}

	/**
	 * Returns the __ei
	 * @return array
	 */
	function getDirtyEvent() {
		if (is_null($this->__ei)) {
			$this->__ei = array();
		}
		return $this->__ei;
	}

	/**
	 * Sets the __ei
	 * @var array
	 */
	function setDirtyEvent($arg0) {
		$this->__ei = $arg0;
		return $this;
	}

	/**
	 * Sets an event to the dirty event array
	 * @var $data_name
	 * @var $data_value
	 */
	function setDirtyEventValue($data_name, $data_value) {
		$tmp_array = $this->getDirtyEvent();
		$tmp_array[$data_name] = $data_value;
		$this->setDirtyEvent($tmp_array);
		return $this;
	}

	/**
	 * Returns the __p
	 * @return array
	 */
	protected function getPrivateData() {
		if (is_null($this->__p)) {
			$this->__p = array();
		}
		return $this->__p;
	}

	/**
	 * Sets the __p
	 * @var array
	 */
	protected function setPrivateData($arg0) {
		$this->__p = (array)$arg0;
		return $this;
	}

	/**
	 * Sets a value to the private data array
	 * @param string $data_name
	 * @param mixed $data_value
	 */
	function setPrivateValue($data_name, $data_value) {
		$tmp_array = $this->getPrivateData();
		$tmp_array[$data_name] = $data_value;
		$this->setPrivateData($tmp_array);
		return $this;
	}

	/**
	 * Returns a data value from the lead
	 * @return string
	 */
	protected function getValues() {
		return $this->getD();
	}

	/**
	 * Returns a data value from the lead formatted for html
	 * @return string
	 */
	function getValueHtml($data_name, $default_value = '', $assign_if_not_set = false) {
		return rawurlencode($this->getValue($data_name, $default_value));
	}

	/**
	 * Returns a data value from the lead formatted for a url
	 * @return string
	 */
	function getValueUrl($data_name, $default_value = '', $assign_if_not_set = false) {
		return htmlspecialchars($this->getValue($data_name, $default_value));
	}

	// +------------------------------------------------------------------------+
	// | HELPER METHODS															|
	// +------------------------------------------------------------------------+
	/**
	 * Returns the client (from the cache or it pulls it via the api)
	 * @return \GunFE\OFferPage
	 */
	function getOfferPage($requery = false) {
		if (is_null($this->_offer_page) || $requery || ($this->_offer_page->getId() == 0)) {
			$this->_offer_page = new \GunFE\OfferPage();
			$this->_offer_page->setOfferId($this->getOffer()->getId());
			$this->_offer_page->setFilePath($_SERVER['SCRIPT_FILENAME']);
			$this->_offer_page->setPageName(basename($_SERVER['SCRIPT_FILENAME']));
			$this->_offer_page->setPreviewUrl($_SERVER['SCRIPT_URI']);
			$this->_offer_page->queryByPageName();
		}
		return $this->_offer_page;
	}

	/**
	 * Returns the name of the cookie
	 * @param string $prefix
	 * @return string
	 */
	public static function createCookieName($prefix = '') {
		//right now we do a cookie per offer_id (prefix)
		return $prefix . COOKIE_NAME;
	}

	/**
	 * Returns the id from the cookie (if exists)
	 * @param string $prefix
	 * @return string
	 */
	public static function findCookieId($prefix = '') {
		$_id = null;
		if(array_key_exists(self::createCookieName($prefix), $_COOKIE)) {
			if(is_string($_COOKIE[self::createCookieName($prefix)])) {
				$_id = $_COOKIE[self::createCookieName($prefix)];
			}
		}
		return $_id;
	}

	/**
	 * Clears the id from the cookie
	 * @param string $prefix
	 */
	public static function clearCookieId($prefix = '') {
		if(array_key_exists(self::createCookieName($prefix), $_COOKIE)) {
			unset($_COOKIE[self::createCookieName($prefix)]);
			header('P3P: CP="NOI ADM DEV PSAi COM NAV OUR OTRo STP IND DEM"');
			setcookie(self::createCookieName($prefix), null, -1, '/');
		}
	}

	/**
	 * Saves the lead it into the cookie
	 * @param string $_id
	 * @param string $prefix
	 */
	public static function saveCookieId($_id, $prefix = '') {
		header('P3P: CP="NOI ADM DEV PSAi COM NAV OUR OTRo STP IND DEM"');
		setcookie(self::createCookieName($prefix), $_id, time()+(60*60*24*300), '/');
	}

	/**
	 * Returns the errors
	 * @return \Mojavi\Error\Errors
	 */
	function getErrors() {
		if (is_null($this->errors)) {
			$this->errors = new \Mojavi\Error\Errors();
		}
		return $this->errors;
	}

	/**
	 * Sets the errors
	 * @var \Mojavi\Error\Errors
	 */
	function setErrors($arg0) {
		$this->errors = $arg0;
		return $this;
	}
	
	/**
	 * Clears the lead from the session
	 * @return void
	 */
	public static function clear() {
		if (session_id() != '') {
			if (defined('COOKIE_NAME') && array_key_exists(COOKIE_NAME, $_SESSION)) {
				unset($_SESSION[COOKIE_NAME]);
			}
		}
		if (defined('COOKIE_NAME') && array_key_exists(COOKIE_NAME, $_COOKIE)) {
			if(is_string($_COOKIE[COOKIE_NAME])) {
				unset($_COOKIE[COOKIE_NAME]);
				setcookie(COOKIE_NAME, null, -1, '/');
			}
		}
		self::$_lead = null;
	}
	
	/**
	 * Returns the redirect url with parameters replaced
	 * @param array $additional_params
	 * @return string
	 */
	public function retrieveRedirectUrl($additional_params = array()) {
		$redirect_url = $this->getOffer()->getRedirectUrl();
		if (trim($redirect_url) == '') {
			throw new \Exception('Redirect url is blank for _o (' . $this->getOfferId() . ') from _ck (' . $this->getCampaignId() . ')');
		}
		$lead_params = $this->toArray(false);
		$formatted_redirect_url = preg_replace_callback('/\#(.*?)\#/', function($matches) use ($lead_params, $additional_params) {
			//first, check to see if this is special case parameter
			if ($matches[1] === \GunFE\DataField::DATA_FIELD_ID_NAME) {
				return $this->getId();
			} else if ($matches[1] === \GunFE\DataField::DATA_FIELD_REF_CAMPAIGN_ID) {
				return $this->getCampaign()->getId();
			} else if ($matches[1] === \GunFE\DataField::DATA_FIELD_REF_CLIENT_ID) {
				return $this->getCampaign()->getClientId();
			} else if ($matches[1] === \GunFE\DataField::DATA_FIELD_REF_OFFER_ID) {
				return $this->getCampaign()->getOfferId();
			} else if ($matches[1] === \GunFE\DataField::DATA_FIELD_AGG_CKID) {
				return $this->getCampaign()->getCampaignKey() . '_' . $this->getId();
			}
	
			// now check the data scope of lead
			/* @var $match \Gun\DataField */
			$match = \Gun\DataField::retrieveDataFieldFromName($matches[1]);
			if (isset($match)) {
				return rawurlencode($match);
			}
	
			// lastly check the additional_params array
			if (array_key_exists($matches[1], $additional_params)) {
				return rawurlencode($additional_params[$matches[1]]);
			}
	
			return '';
		}, $redirect_url);
		
		return $formatted_redirect_url;
	}
	
	// +---------------------------------------------------------------+
	// | Debugging functions used for testing						  |
	// +---------------------------------------------------------------+
	/*
	 * These functions are used for debugging the lead when in development
	 * They are used like so:
	 * \GunFE\Lead::debug();
	 */
	/**
	 * Returns the internal data for this lead for debugging
	 * @return string
	 */
	function debugData() {
		return var_export($this->_d, true);
	}
	
	/**
	 * Returns the internal data for this lead for debugging
	 * @return string
	 */
	function debugTracking() {
		return var_export($this->getT()->toArray(true), true);
	}
	
	/**
	 * Returns the internal data for this lead for debugging
	 * @return string
	 */
	function debugEventData() {
		return var_export($this->_e, true);
	}
	
	/**
	 * Returns the internal data for this lead for debugging
	 * @return string	
	 */
	function debugInternalData() {
		return var_export($this->__di, true);
	}

	/** 
	 * Returns the internal data for this lead for debugging
	 * @return string
	 */
	function debugInternalEventData() {		
		return var_export($this->__ei, true);
	}

	/**
	 * Returns the internal data for this lead for debugging
	 * @return string
	 */
	function debugPrivateData() {
		return var_export($this->__p, true);
	}

	/**
	 * Debugs this lead by outputting a header
	 * @return void
	 */
	public static function debug() {
		$output = array();
		$output[] = '<div class="well">';
		$output[] = '<legend>Debugging Information</legend>';
		$output[] = '<b>Offer Key:</b> ' . (defined('OFFER_KEY') ? OFFER_KEY : '<i>not set</i>') . '<br />';
		$output[] = '<b>Document Root:</b> ' . (isset($_SERVER['DOCUMENT_ROOT']) ? $_SERVER['DOCUMENT_ROOT'] : '<i>not set</i>') . '<br />';
		$output[] = '<b>Campaign:</b> ' . (self::getInstance()->getCampaignId()) . ' (' . self::getInstance()->getCampaign()->getId() . ')' . '<br />';
		$output[] = '<b>Offer:</b> ' . (self::getInstance()->getOffer()->getName()) . ' (' . self::getInstance()->getOffer()->getId() . ')' . '<br />';
		$output[] = '<b>Page:</b> ' . (self::getInstance()->getOfferPage()->getName()) . ' (' . self::getInstance()->getOfferPage()->getId() . ')' . '<br />';
		$output[] = '<b>Client:</b> ' . (self::getInstance()->getClient()->getName()) . ' (' . self::getInstance()->getClient()->getId() . ')' . '<br />';
		$output[] = '<b>Lead:</b> ' . (self::getInstance()->getId()) . '<p />';
		$output[] = '<p />';
		$output[] = '<b>Data:</b> ' . self::getInstance()->debugData() . '<br />';
		$output[] = '<b>Dirty Data:</b> ' . self::getInstance()->debugInternalData() . '<br />';
		$output[] = '<b>Private Data:</b> ' . self::getInstance()->debugPrivateData() . '<br />';
		$output[] = '<b>Events:</b> ' . self::getInstance()->debugEventData() . '<br />';
		$output[] = '<b>Tracking:</b> ' . self::getInstance()->debugTracking() . '<br />';
		$output[] = '<p />';
		$output[] = '<b>$_SESSION:</b> ' . var_export($_SESSION, true) . '<br />';
		$output[] = '<b>$_COOKIE:</b> ' . var_export($_COOKIE, true) . '<br />';
		$output[] = '<b>$_REQUEST:</b> ' . var_export($_REQUEST, true) . '<br />';
		$output[] = '</div>';
		echo implode("\n", $output);
	}
}