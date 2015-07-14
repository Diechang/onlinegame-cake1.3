<?php
/*
 * タイトルデータ用コンポーネント
 */
class TitleDataComponent extends Object
{
/**
 * 投稿可能フラグ
 *
 * @param	number	$service_id
 * @param	date	$test_start
 * @return	bool
 * @access	public
 */
	function votable($service_id , $test_start)
	{
		switch($service_id)
		{
			//休止・終了 or ティザー
			case 1:
			case 5:
				return false;
				break;
			//正式サービス
			case 2:
			case 3:
				return true;
				break;
			//クローズドテスト
			case 4:
				if(empty($test_start))
				{//期間データなし
					return false;
				}
				else
				{
					return (strtotime($test_start) < time());
				}
				break;
		}
	}

/**
 * span付きタイトル
 *
 * @param	string	$title
 * @param	string	$read
 * @return	html
 * @access	public
 */
	function titleWithSpan($title , $read)
	{
		$ret = $title;
		if(!empty($read))
		{
			$ret .= "<span>" . $read . "</span>";
		}
		return $ret;
	}
	function titleWithCase($title , $read)
	{
		$ret = $title;
		if(!empty($read))
		{
			$ret .= "(" . $read . ")";
		}
		return $ret;
	}

/**
 * カッコ付きタイトル読み
 *
 * @param	string	$read
 * @return	String
 * @access	public
 */
	function titleReadWithCase($read)
	{
		return (!empty($read)) ? "(" . $read . ")" : "";
	}

/**
 * タイトルタグ用全部のせ
 *
 * @param	string	$official
 * @param	string	$read
 * @param	string	$abbr
 * @param	string	$sub
 * @return	String
 * @access	public
 */
	function titleTag($official , $read = null , $abbr = null , $sub = null)
	{
		$ret = "";
		if(!empty($abbr))
		{
			$ret .= $abbr . "：";
		}
		$ret .= $this->titleWithCase($official , $read);
		if(!empty($sub))
		{
			$ret .= "〜" . $sub . "〜";
		}
		return $ret;
	}
}
?>