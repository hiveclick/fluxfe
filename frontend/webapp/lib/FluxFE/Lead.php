<?php
namespace FluxFE;

use Mojavi\Logging\LoggerManager;

class Lead extends \Flux\Lead {

	const COOKIE_NAME = 'FluxLocal';

	private static $_lead;

	/* Used to store the current campaign, offer and client */
	private $_offer_page;
	
	// used to generate a uniform timestamp each time this lead is accessed
	private $__uniformTimestamp;

	private $errors;

	public function __construct() {
		parent::__construct();		
	}

	/**
	 * Returns a new instance of this lead
	 * @return \Flux\LocalLead
	 */
	public static function getInstance() {
		if (is_null(self::$_lead)) {
			self::$_lead = new \FluxFE\Lead();

			// Load the lead in from the cookie (if it exists)
			$found_lead = false;
						
			if (session_id() != '') {
				if (defined('COOKIE_NAME') && isset($_SESSION[COOKIE_NAME])) {
				    if (\MongoId::isValid($_SESSION[COOKIE_NAME])) {
					   self::$_lead->setId($_SESSION[COOKIE_NAME]);
					   self::$_lead->query();
					   $found_lead = true;
				    }
				}
				if (defined('MO_COOKIE_NAME') && isset($_SESSION[MO_COOKIE_NAME])) {
				    if (\MongoId::isValid($_SESSION[MO_COOKIE_NAME])) {
				        self::$_lead->setId($_SESSION[MO_COOKIE_NAME]);
				        self::$_lead->query();
				        $found_lead = true;
				    }
				}
			}

			// A cookie should copy the data, but create a new lead with a new campaign
			if ($found_lead === false && defined('COOKIE_NAME') &&  isset($_COOKIE[COOKIE_NAME])) {
                if (\MongoId::isValid($_COOKIE[COOKIE_NAME])) {
				   self::$_lead->setId($_COOKIE[COOKIE_NAME]);
				   self::$_lead->query();
				   self::$_lead->setId(null);
				   self::$_lead->setTracking(null);
				   $found_lead = true;
			    }
			}
			if ($found_lead === false && defined('MO_COOKIE_NAME') &&  isset($_COOKIE[MO_COOKIE_NAME])) {
			    if (\MongoId::isValid($_COOKIE[MO_COOKIE_NAME])) {
			        self::$_lead->setId($_COOKIE[MO_COOKIE_NAME]);
			        self::$_lead->query();
			        self::$_lead->setId(null);
			        self::$_lead->setTracking(null);
			        $found_lead = true;
			    }
			}

			// Populate the lead from the request variables
			self::$_lead->populate($_REQUEST);
			
			// Find the default campaign if we don't have one yet
			if (self::$_lead->getTracking()->getCampaign()->getCampaignId() == '') {
			    
			    self::$_lead->getTracking()->setCampaign(self::findDefaultCampaign());
			} else {
			    \Mojavi\Logging\LoggerManager::error(__METHOD__ . " :: " . "Using saved campaign id: " . self::$_lead->getTracking()->getCampaign()->getCampaignId());
			}

			// Save our populated lead to the session
			self::$_lead->save();
		}
		self::$_lead->__uniformTimestamp = new \MongoDate();
		return self::$_lead;
	}

	/**
	 * Populates this lead by setting values into the internal _d variable
	 * @return \Flux\Lead
	 */
	/*
	function populate($arg0, $modify_columns = true) {
		parent::populate($arg0, $modify_columns);
		if (is_array($arg0)) {
			foreach ($arg0 as $name => $value) {
				//if (strpos($name, '_') === 0) { continue; } // All other internal variables all begin with an underscore
				self::$_lead->setValue($name, $value, self::LEAD_REQUEST_CODE_DEFAULT);
			}
		} else {
			self::$_lead->setValue($name, $value, self::LEAD_REQUEST_CODE_DEFAULT);
		}
		return $this;
	}
	*/

	/**
	 * Saves the lead to the session
	 * @return void
	 */
	function save($persist_to_database = false) {
		// If we need to save to the database, then we can do that here
		$this->persist();
		
		// Save to the session
		if (session_id() != '' && defined('COOKIE_NAME')) {
			//we could just save the class into the session, but for consistency let's just serialize the variables anyway			
			$_SESSION[COOKIE_NAME] = (string)self::getInstance()->getId();
		} else if (session_id() != '' && defined('MO_COOKIE_NAME')) {
		    $_SESSION[MO_COOKIE_NAME] = (string)self::getInstance()->getId();
		} else {
			\Mojavi\Logging\LoggerManager::error(__METHOD__ . " :: [ " . $_SERVER['SERVER_NAME'] . " ] SESSION NOT SAVED BECAUSE session_id is blank or COOKIE_NAME is not defined");
		}
				
		if (defined('COOKIE_NAME')) { // Paths use the COOKIE_NAME constant
			header('P3P: CP="NOI ADM DEV PSAi COM NAV OUR OTRo STP IND DEM"');
			setcookie(COOKIE_NAME, (string)self::getInstance()->getId(), time()+60*60*24*300, '/');
		} else if (defined('MO_COOKIE_NAME')) { // Frontend and redirects use the MO_COOKIE_NAME constant
			header('P3P: CP="NOI ADM DEV PSAi COM NAV OUR OTRo STP IND DEM"');
			setcookie(MO_COOKIE_NAME, (string)self::getInstance()->getId(), time()+60*60*24*300, '/');
		}
		return $this;
	}

	/**
	 * Persists this lead to the database by saving everything
	 * @return boolean
	 */
	private function persist() {
		if (!\MongoId::isValid(self::getInstance()->getId())) {
			// Setup a created event that will be saved on this lead
			$created_event = \FluxFE\DataField::retrieveDataFieldFromKeyName(\FluxFE\DataField::DATA_FIELD_EVENT_CREATED_NAME);
			self::getInstance()->addEvent(\FluxFE\DataField::DATA_FIELD_EVENT_CREATED_NAME, "1");
			
			// First save the lead if we haven't yet
			$insert_id = self::getInstance()->insert();
			self::getInstance()->setId($insert_id);
		} else {
		    // Update the lead 
            self::getInstance()->update();
		}

		// Requery the lead after we have updated it
		self::getInstance()->query();

		return true;
	}

	// +------------------------------------------------------------------------+
	// | HELPER METHODS															|
	// +------------------------------------------------------------------------+
	/**
	 * Returns the client (from the cache or it pulls it via the api)
	 * @return \FluxFE\OFferPage
	 */
	function getOfferPage($requery = false) {
		if (is_null($this->_offer_page) || $requery || ($this->_offer_page->getId() == 0)) {
			$this->_offer_page = new \FluxFE\OfferPage();
			$this->_offer_page->setOfferId($this->getOffer()->getId());
			$this->_offer_page->setFilePath($_SERVER['SCRIPT_FILENAME']);
			$this->_offer_page->setPageName(basename($_SERVER['SCRIPT_FILENAME']));
			$this->_offer_page->setPreviewUrl($_SERVER['SCRIPT_URI']);
			$this->_offer_page->queryByPageName();
		}
		return $this->_offer_page;
	}
	
	/**
	 * Finds the default campaign if we don't have one
	 *
	 */
	static function findDefaultCampaign() {
	    if (isset($_SERVER['DOCUMENT_ROOT'])) {
	        if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/.cache/config.php')) {
	            include_once($_SERVER['DOCUMENT_ROOT'] . '/.cache/config.php');
	            if (defined('DEFAULT_CAMPAIGN_ID')) {
	                return DEFAULT_CAMPAIGN_ID;
	            } else {
	                \Mojavi\Logging\LoggerManager::error(__METHOD__ . " :: " . "Cannot retrieve default campaign because DEFAULT_CAMPAIGN_ID is missing");
	                throw new \Exception("Cannot retrieve default campaign because DEFAULT_CAMPAIGN_ID is missing");
	            }
	        } else {
	            \Mojavi\Logging\LoggerManager::error(__METHOD__ . " :: " . "Cannot retrieve default campaign because config.php is missing in " . $_SERVER['DOCUMENT_ROOT'] . '/.cache/');
	            throw new \Exception("Cannot retrieve default campaign because config.php is missing in " . $_SERVER['DOCUMENT_ROOT'] . '/.cache/');
	        }
	    } else {
	        \Mojavi\Logging\LoggerManager::error(__METHOD__ . " :: " . "Cannot retrieve default campaign because S_SERVER[DOCUMENT_ROOT] is missing");
	        throw new \Exception("Cannot retrieve default campaign because S_SERVER[DOCUMENT_ROOT] is missing");
	    }
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
	 * Clears the lead from the session
	 * @return void
	 */
	public static function clear() {
		if (session_id() != '') {
			if (defined('COOKIE_NAME') && isset($_SESSION[COOKIE_NAME])) {
				unset($_SESSION[COOKIE_NAME]);
			}
			if (defined('MO_COOKIE_NAME') && isset($_SESSION[MO_COOKIE_NAME])) {
			    unset($_SESSION[MO_COOKIE_NAME]);
			}
		}
		if (defined('COOKIE_NAME') && isset($_COOKIE[COOKIE_NAME])) {
			unset($_COOKIE[COOKIE_NAME]);
			setcookie(COOKIE_NAME, null, -1, '/');
		}
		if (defined('MO_COOKIE_NAME') && isset($_COOKIE[MO_COOKIE_NAME])) {
		    unset($_COOKIE[MO_COOKIE_NAME]);
		    setcookie(MO_COOKIE_NAME, null, -1, '/');
		}
		
		self::$_lead = null;
	}
	
	/**
	 * Returns the redirect url with parameters replaced
	 * @param array $additional_params
	 * @return string
	 */
	public function retrieveRedirectUrl($additional_params = array()) {
		$redirect_url = self::$_lead->getTracking()->getCampaign()->getCampaign()->getRedirectUrl();
		if (trim($redirect_url) == '') {
			throw new \Exception('Redirect url is blank for _ck (' . $this->getCampaignId() . ')');
		}
		$lead_params = self::$_lead->toArray(false);
		$formatted_redirect_url = preg_replace_callback('/\#(.*?)\#/', function($matches) use ($lead_params, $additional_params) {
			//first, check to see if this is special case parameter
			if ($matches[1] === \Flux\DataField::DATA_FIELD_ID_NAME) {
				return self::$_lead->getId();
			} else if ($matches[1] === \Flux\DataField::DATA_FIELD_REF_CAMPAIGN_ID) {
				return self::$_lead->getTracking()->getCampaign()->getCampaign()->getId();
			} else if ($matches[1] === \Flux\DataField::DATA_FIELD_REF_CLIENT_ID) {
				return self::$_lead->getTracking()->getCampaign()->getCampaign()->getClientId();
			} else if ($matches[1] === \Flux\DataField::DATA_FIELD_REF_OFFER_ID) {
				return self::$_lead->getTracking()->getCampaign()->getCampaign()->getOfferId();
			} else if ($matches[1] === \Flux\DataField::DATA_FIELD_AGG_CKID) {
				return self::$_lead->getTracking()->getCampaign()->getCampaign()->getCampaignKey() . '_' . self::$_lead->getId();
			}
	
			// now check the data scope of lead
			/* @var $match \Flux\DataField */
			$match = \Flux\DataField::retrieveDataFieldFromName($matches[1]);
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
	
	/**
	 * Finds the next page to go to based on the flow
	 * @todo check this code
	 * @return string
	 */
	function findNextPage() {
		// First find out what page we are on
		$source_page = basename($_SERVER['SCRIPT_FILENAME']);

		/* @var $offer_page \Flux\OfferPage */
		$offer_page = new \FluxFE\OfferPage();
		$offer_page->setOfferId($this->getOffer()->getId());
		$offer_page->setFilePath($_SERVER['SCRIPT_FILENAME']);
		$offer_page->setPageName(basename($_SERVER['SCRIPT_FILENAME']));
		$offer_page->queryByPageName();
		if ($offer_page->getId() == 0) {
			\Mojavi\Logging\LoggerManager::error(__METHOD__ . " :: " . "Could not find an offer page based on the page name (Offer: " . $this->getOffer()->getId() . ", PageName: " . basename($_SERVER['SCRIPT_FILENAME']) . ", FilePath: " . $_SERVER['SCRIPT_FILENAME'] . '), attempting short page name...');
			$offer_page = new \FluxFE\OfferPage();
			$offer_page->setOfferId($this->getOffer()->getId());
			$offer_page->setFilePath($_SERVER['SCRIPT_FILENAME']);
			$offer_page->setPageName(basename($_SERVER['SCRIPT_FILENAME'], '.php'));
			$offer_page->queryByPageName();
		}
		
		if ($offer_page->getId() > 0) {
			if (count($offer_page->getOfferPageFlows()) > 0) {
				\Mojavi\Logging\LoggerManager::error(__METHOD__ . " :: " . "Checking offer page flow for page (" . $offer_page->getPageName() . "): " . count($offer_page->getOfferPageFlows()) . " Flows found");
				/* @var $offer_page_flow \Flux\OfferPageFlow */
				foreach ($offer_page->getOfferPageFlows() as $offer_page_flow) {
					
					if (count($offer_page_flow->getFilterConditions()) == 0) { 
						\Mojavi\Logging\LoggerManager::error(__METHOD__ . " :: " . "Checking offer page flow for page (" . $offer_page->getPageName() . "): No filters, processing flow");
						$filter_pass = true;
					} else {
						// Check if the conditions apply
						if ($offer_page_flow->getFilterType() == \Flux\OfferPageFlow::FILTER_TYPE_ALL) {
							\Mojavi\Logging\LoggerManager::error(__METHOD__ . " :: " . "Checking offer page flow for page (" . $offer_page->getPageName() . "): " . count($offer_page_flow->getFilterConditions()) . " filters, processing ALL conditions");
							$filter_pass = true;
							/* @var $filter_condition \Flux\OfferPageFlowFilter */
							foreach ($offer_page_flow->getFilterConditions() as $filter_condition) {
								$old_value = $this->getValue($filter_condition->getDataField()->getKeyName());
								\Mojavi\Logging\LoggerManager::error(__METHOD__ . " :: " . "Checking offer page flow for page (" . $offer_page->getPageName() . "): Checking if " . $old_value . " " . $filter_condition->getFilterOpText($filter_condition->getFilterOp()) . " " . implode(", ", $filter_condition->getFilterValue()));
								$filter_pass &= $filter_condition->checkCondition($old_value);
							}
						} else {
							\Mojavi\Logging\LoggerManager::error(__METHOD__ . " :: " . "Checking offer page flow for page (" . $offer_page->getPageName() . "): " . count($offer_page_flow->getFilterConditions()) . " filters, processing ANY conditions");
							$filter_pass = false;
							foreach ($offer_page_flow->getFilterConditions() as $filter_condition) {
								$old_value = $this->getValue($filter_condition->getDataField()->getKeyName());
								\Mojavi\Logging\LoggerManager::error(__METHOD__ . " :: " . "Checking offer page flow for page (" . $offer_page->getPageName() . "): Checking if " . $old_value . " " . $filter_condition->getFilterOpText($filter_condition->getFilterOp()) . " " . implode(", ", $filter_condition->getFilterValue()));
								$filter_pass |= $filter_condition->checkCondition($old_value);
							}
						}
					}
					
					if ($filter_pass) {
						\Mojavi\Logging\LoggerManager::error(__METHOD__ . " :: " . "Checking offer page flow for page (" . $offer_page->getPageName() . "): FILTER PASSES");
						// There are no conditions, so use this flow
						/* @var $setter \Flux\OfferPageFlowSetter */
						foreach ($offer_page_flow->getSetters() as $setter) {
							if ($setter->getSetterOp() == \Flux\OfferPageFlowSetter::SETTER_SET_IF_EMPTY) {
								$old_value = (int)$this->getValue($setter->getDataField()->getKeyName());
								$this->setValue($setter->getDataField()->getKeyName(), $setter->getSetterValue());
							} else if ($setter->getSetterOp() == \Flux\OfferPageFlowSetter::SETTER_INCREMENT) {
								$old_value = (int)$this->getValue($setter->getDataField()->getKeyName());
								$this->setValue($setter->getDataField()->getKeyName(), $old_value + (int)$setter->getSetterValue());
							} else if ($setter->getSetterOp() == \Flux\OfferPageFlowSetter::SETTER_DECREMENT) {
								$old_value = (int)$this->getValue($setter->getDataField()->getKeyName());
								$this->setValue($setter->getDataField()->getKeyName(), $old_value - (int)$setter->getSetterValue());
							} else {
								$this->setValue($setter->getDataField()->getKeyName(), $setter->getSetterValue());
							}
						}
						
						// Decide if we are going to a remote url or to another page within the flow
						\Mojavi\Logging\LoggerManager::error(__METHOD__ . " :: " . "Checking offer page flow for page (" . $offer_page->getPageName() . "): Navigation Type is " . $offer_page_flow->getNavigation()->getNavigationType());
						if ($offer_page_flow->getNavigation()->getNavigationType() == \Flux\OfferPageFlowNavigation::NAVIGATION_TYPE_REMOTE) {
							$destination_page = $offer_page_flow->getNavigation()->getRemoteUrl();
						} else {
							$destination_page = $offer_page_flow->getNavigation()->getDestinationOfferPage()->getPageName();
						}
						\Mojavi\Logging\LoggerManager::error(__METHOD__ . " :: " . "Returning destination page for source page (" . $offer_page->getPageName() . "): " . $destination_page);
						return $destination_page;
					}
				}
			} else {
				\Mojavi\Logging\LoggerManager::error(__METHOD__ . " :: " . "Checking offer page flow for page (" . $offer_page->getPageName() . "): No Flows found, using next page: " . $offer_page->getNextPage()->getPageName());
				return $offer_page->getNextPage()->getPageName();
			}
		} else {
			\Mojavi\Logging\LoggerManager::error(__METHOD__ . " :: " . "Could not find an offer page (" . $source_page . ") based on the page name (Offer: " . $this->getOffer()->getId() . ", PageName: " . basename($_SERVER['SCRIPT_FILENAME'], '.php') . ", FilePath: " . $_SERVER['SCRIPT_FILENAME']);
			throw new \Exception("Could not find an offer page (" . $source_page . ") based on the page name (Offer: " . $this->getOffer()->getId() . ", PageName: " . basename($_SERVER['SCRIPT_FILENAME'], '.php') . ", FilePath: " . $_SERVER['SCRIPT_FILENAME']);
		}
		
		return $source_page;
	}
	
	// +---------------------------------------------------------------+
	// | Debugging functions used for testing						  |
	// +---------------------------------------------------------------+
	/*
	 * These functions are used for debugging the lead when in development
	 * They are used like so:
	 * \FluxFE\Lead::debug();
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
	    $events = array();
	    foreach (self::getInstance()->getE() as $lead_event) {
	        $events[] = array('event' => $lead_event->getDataField()->getDataFieldName(), 'value' => $lead_event->getValue(), 'time' => $lead_event->getT()->toDateTime());
	    }
		return var_export($events, true);
	}

	/**
	 * Debugs this lead by outputting a header
	 * @return void
	 */
	public static function debug() {
		$output = array();
		$output[] = '<div class="alert alert-warning alert-dismissible" role="alert">';
		$output[] = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
		$output[] = '<legend>Debugging Information</legend>';
		$output[] = '<b>Offer Key:</b> ' . (defined('OFFER_KEY') ? OFFER_KEY : '<i>not set</i>') . '<br />';
		$output[] = '<b>Document Root:</b> ' . (isset($_SERVER['DOCUMENT_ROOT']) ? $_SERVER['DOCUMENT_ROOT'] : '<i>not set</i>') . '<br />';
		$output[] = '<b>Campaign:</b> ' . (self::getInstance()->getTracking()->getCampaign()->getCampaignId()) . '<br />';
		$output[] = '<b>Offer:</b> ' . (self::getInstance()->getTracking()->getOffer()->getOfferName()) . ' (' . self::getInstance()->getTracking()->getOffer()->getOfferId() . ')' . '<br />';
		$output[] = '<b>Client:</b> ' . (self::getInstance()->getTracking()->getClient()->getClientName()) . ' (' . self::getInstance()->getTracking()->getClient()->getClientId() . ')' . '<br />';
		$output[] = '<b>Lead:</b> ' . (self::getInstance()->getId()) . '<p />';
		$output[] = '<p />';
		$output[] = '<b>Data:</b> ' . self::getInstance()->debugData() . '<br />';
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