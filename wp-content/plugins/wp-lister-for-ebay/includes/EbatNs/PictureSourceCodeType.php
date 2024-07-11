<?php
/* Generated on 14.02.18 14:28 by globalsync
 * $Id: $
 * $Log: $
 */

require_once 'EbatNs_FacetType.php';

class PictureSourceCodeType extends EbatNs_FacetType
{
	const CodeType_EPS = 'EPS';
	const CodeType_PictureManager = 'PictureManager';
	const CodeType_Vendor = 'Vendor';
	const CodeType_CustomCode = 'CustomCode';

	/**
	 * @return 
	 **/
	function __construct()
	{
		parent::__construct('PictureSourceCodeType', 'urn:ebay:apis:eBLBaseComponents');
	}
}
$Facet_PictureSourceCodeType = new PictureSourceCodeType();
?>