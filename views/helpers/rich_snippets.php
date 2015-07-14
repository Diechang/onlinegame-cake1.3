<?php
/**
 * Rich Snippets用ヘルパー - RDFa
 */
class RichSnippetsHelper extends AppHelper
{
	//するかしないか - true:する, false:しない
	public $use = true;
	//types
	public $types = array(
		"Breadcrumb" => "v:Breadcrumb",		//パンクズ
		"Review" => "v:Review",				//個別レビュー
		"Reviews" => "v:Review-aggregate",	//集計レビュー
	);
	//rels
	public $rels = array(
		"url" => "v:url",
		"photo" => "v:photo",
	);
	//properties
	public $properties = array(
		"title" => "v:title",
		"itemreviewed" => "v:itemreviewed",
		"rating" => "v:rating",
		"count" => "v:count",
		"votes" => "v:votes",
		"reviewer" => "v:reviewer",
		"dtreviewed" => "v:dtreviewed",
		"summary" => "v:summary",
		"description" => "v:description",

	);

/**
 * XML Namespace
 *
 * @return	html attr
 * @access	public
 */
	function ns($type = null)
	{
		if($this->use)
		{
			$src = ' xmlns:v="http://rdf.data-vocabulary.org/#"' . $this->typeof($type);
			return $src;
		}
	}

/**
 * typeof
 *
 * @return	html attr
 * @access	public
 */
	function typeof($type = null)
	{
		if($this->use)
		{
			$src = (!empty($type)) ? ' typeof="' . $this->types[$type] . '"' : '';
			return $src;
		}
	}

/**
 * rel
 *
 * @return	html attr
 * @access	public
 */
	function rel($val = null)
	{
		if($this->use)
		{
			$src = (!empty($val)) ? ' rel="' . $this->rels[$val] . '"' : '';
			return $src;
		}
	}

/**
 * property
 *
 * @return	html attr
 * @access	public
 */
	function property($val = null)
	{
		if($this->use)
		{
			$src = (!empty($val)) ? ' property="' . $this->properties[$val] . '"' : '';
			return $src;
		}
	}

/**
 * content
 *
 * @return	html attr
 * @access	public
 */
	function content($val = null)
	{
		if($this->use)
		{
			$src = (!empty($val)) ? ' content="' . $val . '"' : '';
			return $src;
		}
	}
}
?>