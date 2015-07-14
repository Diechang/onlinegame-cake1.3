<?php
/**
 * Application model for Cake.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.cake.libs.model
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

/**
 * Application model for Cake.
 *
 * This is a placeholder class.
 * Create the same file in app/app_model.php
 * Add your application-wide methods to the class, your models will inherit them.
 *
 * @package       cake
 * @subpackage    cake.cake.libs.model
 */
class AppModel extends Model {

/**
 * コンストラクタ
 *
 */
	function __construct($id = false, $table = null, $ds = null)
	{
		$this->useDbConfig = Configure::read("UseDbConfig");
		parent::__construct($id, $table, $ds);
	}

/**
 * バーチャルフィールド用配列
 *
 * @var		array
 * @access	public
 */
	var $VF = array();

/**
 * バーチャルフィールド取得
 *
 * @params	array	$fleds
 * @return	string
 * @access	public
 */
	function getVF($fields = array())
	{
		$ret = array();
		foreach($fields as $field)
		{
			$ret[$field] = $this->VF[$field];
		}
		return $ret;
	}
/**
 * アソシエーション全解除
 * 引数に除外モデル配列
 *
 * @params	array	$models
 * @params	bool	$reset
 * @return	void
 * @access	public
 */
	function unbindAll($models = array() , $reset = true)
	{
		$unbind = array();
		$assocs	= array("belongsTo" , "hasOne" , "hasMany" , "hasAndBelongsToMany");
		foreach($assocs as $assoc)
		{
			if(isset($this->$assoc))
			{
				foreach($this->$assoc as $model => $info)
				{
					if(!in_array($model , $models))
					{
						$unbind[$assoc][] = $model;
					}
				}
			}
		}
//		pr($unbind);
		$this->unbindModel($unbind , $reset);
	}

/**
 * エレメントキャッシュ削除
 *
 * @param	string	$name
 * @param	string	$key
 */
	function clearElementCache($name , $key = null)
	{
		@unlink(CACHE . "views" . DS . "element_" . $key . "_" . $name);
	}

/**
 * 全角スペースを半角スペースに変換
 *
 * @param	string	$val
 * @return	string
 * @access	public
 */
	function mbSpaceReplace($val , $search = "/(　| )+/" , $replace = " ")
	{
		if(!empty($val))
		{
			return preg_replace($search, $replace, $val);
		}
		else
		{
			return $val;
		}
	}

/**
 * トリミング
 *
 * @param	string	$val
 * @return	string
 * @access	public
 */
	function trim($val)
	{
		if(!empty($val))
		{
			return trim($val);
		}
		else
		{
			return $val;
		}
	}

/**
 * emptyならnull返す
 *
 * @param	mixed	$val
 * @return	null
 * @access	public
 */
	function emptyToNull($val)
	{
		return (empty($val)) ? null : $val;
	}
}
?>