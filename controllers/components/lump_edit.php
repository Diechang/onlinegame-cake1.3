<?php
/*
 * 一括編集コンポーネント
 */
class LumpEditComponent extends Object
{
/**
 * 既存データと比較して、変更あるものだけ返す
 *
 * @param	array	$data
 * @param	Model	$model
 * @param	string	$keyField
 * @return	array
 * @access	public
 */
	function changeCheck(&$data , &$model , $keyField = "id")
	{
		$modelName = $model->name;

		$ids	= Set::extract("/" . $keyField, $data);
		$fields	= array();
		foreach($data[0] as $key => $val)
		{
			$fields[$key] = $key;
		}
//		pr($fields);
//		pr($ids);
		$befores = $model->find("all" , array(
			"recursive" => -1,
			"conditions" => array($keyField => $ids),
			"fields" => $fields,
			"order" => $keyField . " DESC",
		));
//		pr($befores);
//		pr($data);
		$changed = array();
		$index = 0;
		foreach($data as $key => $val)
		{
			if($val !== $befores[$key][$modelName])
			{
				$changed[$index] = $val;
				$index++;
			}
		}
//		pr($data);
//		pr($changed);
//		exit;
		$data = $changed;
		return (!empty($data)) ? true : false;
	}
}