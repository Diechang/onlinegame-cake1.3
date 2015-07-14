<?php
/*
 * 投稿データ用コンポーネント
 */
class VoteDataComponent extends Object
{
/**
 * 投稿者名
 *
 * @param	string	$nameStr
 * @return	String
 * @access	public
 */
	function posterName($nameStr)
	{
		$ret = (!empty($nameStr)) ? $nameStr : "名無し";
		return $ret . "さん";
	}

/**
 * 点数フォーマット
 *
 * @param	number	$num
 * @return	Number
 * @access	public
 */
	function pointFormat($num)
	{
		return (!empty($num)) ? sprintf("%.2f" , $num) : 0;
	}

/**
 * 投稿日フォーマット
 *
 * @param	string	$dateStr
 * @return	Date
 * @access	public
 */
	function dateFormat($dateStr)
	{
		return date("Y年m月d日 H:i" , strtotime($dateStr));
	}
}