<?php
/* Generated on 14.02.18 14:28 by globalsync
 * $Id: $
 * $Log: $
 */

require_once 'EbatNs_FacetType.php';

class SellingManagerAutomationPropertyTypeCodeType extends EbatNs_FacetType
{
	const CodeType_ItemListFailedAutomationRules = 'ItemListFailedAutomationRules';
	const CodeType_ItemRelistFailedAutomationRules = 'ItemRelistFailedAutomationRules';
	const CodeType_ItemListFailedSecondChanceOfferAutoRules = 'ItemListFailedSecondChanceOfferAutoRules';
	const CodeType_CustomCode = 'CustomCode';

	/**
	 * @return 
	 **/
	function __construct()
	{
		parent::__construct('SellingManagerAutomationPropertyTypeCodeType', 'urn:ebay:apis:eBLBaseComponents');
	}
}
$Facet_SellingManagerAutomationPropertyTypeCodeType = new SellingManagerAutomationPropertyTypeCodeType();
?>