<?php
/**
 * タイトルページ用ヘルパー
 */
class TitlePageHelper extends AppHelper
{
	//Use Helper
	var $helpers = array('Html');

/**
 * メタキーワード
 *
 * @param	string	$action
 * @param	string	$official
 * @param	string	$read
 * @param	string	$abbr
 * @param	string	$sub
 * @return	string
 * @access	public
 */
	function metaKeywords($action , $official , $read = null , $abbr = null , $sub = null)
	{
		$words	= array($official , $read , $abbr , $sub);
		$mores	= array(
			"index"		=> array("動作環境","スペック","ツイート","ニュース"),
			"rating"	=> array("評価"),
			"review"	=> array("レビュー"),
			"allvotes"	=> array("レビュー","評価"),
			"single"	=> array("レビュー","評価"),
			"events"	=> array("イベント","キャンペーン"),
			"event"		=> array("イベント","キャンペーン"),
			"pc"		=> array("推奨PC","パソコン","モデル"),
			"link"		=> array("攻略","WIKI","ファンサイト"),
			"search"	=> array("動画","ムービー","ブログ"),
		);
		$ret = array_merge(array_filter($words) , $mores[$action]);
		return $this->output(implode("," , $ret));
	}

/**
 * Youtube ビデオ埋め込み
 *
 * @param	string	$id Youtube video ID
 * @return	html
 * @access	public
 */
	function videoEmbed($id)
	{//$id = youtube v param
		if(!empty($id))
		{
			return '<div class="movie">
						<object width="500" height="295">
						<param name="movie" value="http://www.youtube.com/v/' . $id . '?fs=1&amp;hl=ja_JP"></param>
						<param name="allowFullScreen" value="true"></param>
						<param name="allowscriptaccess" value="always"></param>
						<embed src="http://www.youtube.com/v/' . $id . '?fs=1&amp;hl=ja_JP" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="500" height="295"></embed>
						</object>
					</div>';
		}
		else
		{
			return '<p class="none">関連動画が登録されていません。<br />ムービー・ブログページで探すことができます。</p>';
		}
	}

/**
 * スペックデータ列：左右同値なら一行化
 *
 * @param	string	$header
 * @param	string	$low
 * @param	string	$high
 * @return	html
 * @access	public
 */
	function specRows($header , $low , $high)
	{
		if(!empty($low) or !empty($high))
		{
			$ret = '<tr>';
			$ret .= '<th nowrap="nowrap">' . $header . '</th>';
			if($low == $high)
			{
				$ret .= '<td colspan="2" class="eq">' . nl2br($low) . '</td>';
			}
			else
			{
				$ret .= '<td>';
				$ret .= (!empty($low)) ? nl2br($low) : "-";
				$ret .= '</td>';
				$ret .= '<td>';
				$ret .= (!empty($high)) ? nl2br($high) : "-";
				$ret .= '</td>';
			}
			$ret .= '</tr>';
			//
			return $ret . "\n";
		}
	}


/**Links
------------------------------ **/

/**
 * 公式バナー
 *
 * @param	bool	$ad_use
 * @param	string	$ad_banner_l
 * @param	string	$title
 * @param	string	$official_url
 * @param	number	$service_id
 * @param	bool	$onlybanner
 * @return	html
 * @access	public
 */
	function officialLinkBanner($ad_use , $ad_banner_l , $title , $official_url , $service_id = null , $onlybanner = false)
	{
		if($service_id != 1 or $service_id == null)
		{
			$ret	 = "<div class=\"tCenter officialLink\">";
			$ret	.= (!$onlybanner) ? $title . "で遊ぶ！<br />\n" : "";
			if(!empty($ad_use))
			{
				$ret	.= $ad_banner_l;
			}
			else
			{
				$ret	.= $this->Html->link($title . "公式サイト" , $official_url , array("target" => "_blank"));
			}
			$ret	.= "</div>";
			//
			return $ret;
		}
	}

/**
 * 投稿リンクボタン
 *
 * @param	string	$path
 * @return	html
 * @access	public
 */
	function voteLinkButton($path)
	{
		return '<div class="voteButton">' . $this->Html->image("design/titles_common_button_vote.gif" , array("alt" => "評価点数・レビューを投稿する" , "url" => array("controller" => "titles" , "action" => "review" , "path" => $path , "ext" => "html" , "#" => "voteform"))) . '</div>';
	}

/**
 * 投稿ボタン
 *
 * @param	string	$path
 * @return	html
 * @access	public
 */
	function voteButton($path)
	{
		return '<div class="votebutton">' . $this->Html->image("design/titles_button_vote_normal.gif" , array("alt" => "レビュー・評価" , "url" => array("controller" => "titles" , "action" => "review" , "path" => $path , "ext" => "html" , "#" => "voteform"))) . '</div>';
	}
}
?>