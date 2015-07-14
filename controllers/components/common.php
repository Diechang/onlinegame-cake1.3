<?php
/*
 * 汎用コンポーネント
 */
class CommonComponent extends Object
{
/**
 * スパムチェック：認証番号チェック
 *
 * @param	number	$val
 * @return	bool
 * @access	public
 */
	function spamCheck(&$val)
	{
		if($val == 1031)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
}