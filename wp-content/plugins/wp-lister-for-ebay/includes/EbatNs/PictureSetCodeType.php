<?php
/* Generated on 14.02.18 14:28 by globalsync
 * $Id: $
 * $Log: $
 */

require_once 'EbatNs_FacetType.php';

class PictureSetCodeType extends EbatNs_FacetType
{
	const CodeType_Standard = 'Standard';
	const CodeType_Supersize = 'Supersize';
	const CodeType_Large = 'Large';
	const CodeType_CustomCode = 'CustomCode';

	/**
	 * @return 
	 **/
	function __construct()
	{
		parent::__construct('PictureSetCodeType', 'urn:ebay:apis:eBLBaseComponents');
	}
}
$Facet_PictureSetCodeType = new PictureSetCodeType();
?>