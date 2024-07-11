<?php
/* Generated on 14.02.18 14:28 by globalsync
 * $Id: $
 * $Log: $
 */

require_once 'EbatNs_FacetType.php';

class TokenStatusCodeType extends EbatNs_FacetType
{
	const CodeType_Active = 'Active';
	const CodeType_Expired = 'Expired';
	const CodeType_RevokedByeBay = 'RevokedByeBay';
	const CodeType_RevokedByUser = 'RevokedByUser';
	const CodeType_RevokedByApp = 'RevokedByApp';
	const CodeType_Invalid = 'Invalid';
	const CodeType_CustomCode = 'CustomCode';

	/**
	 * @return 
	 **/
	function __construct()
	{
		parent::__construct('TokenStatusCodeType', 'urn:ebay:apis:eBLBaseComponents');
	}
}
$Facet_TokenStatusCodeType = new TokenStatusCodeType();
?>