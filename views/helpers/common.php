<?php
/**
 * 共用ヘルパー
 */
class CommonHelper extends AppHelper
{
	//Use Helper
	var $helpers = array('Html' , 'RichSnippets');

/**
 * 投稿者名初期値
 *
 * @var		string
 * @access	public
 */
	var $emptyPosterName = "名無し";

/**
 * メタタグマップ
 *
 * @var		array
 * @access	public
 */
	var $metaTagMaps = array(
		"noindex" => array("name" => "robots" , "contents" => "noindex"),
	);

/** Util
------------------------------ **/

/**
 * metaタグ出力
 *
 * @param	array	$data Array(Array(cakephp meta options))
 * @return	html
 * @access	public
 */
	function metaTags(&$data)
	{
		$ret = "";
		if(!empty($data))
		{
			foreach($data as $val)
			{
				if(is_string($val))
				{
					$ret .= $this->Html->meta($this->metaTagMaps[$val]) . "\n";
				}
				elseif(is_array($val))
				{
					$ret .= $this->Html->meta($val) . "\n";
				}
			}
		}
		return $this->output($ret);
	}


/**
 * パンクズ出力
 *
 * @param	mixed	$data String or Array(String or Array(["str"],["url"]))
 * @return	html
 * @access	public
 */
	function pankuz($data)
	{
		if(!empty($data))
		{
			if(is_array($data))
			{//配列
				$ret = "";
				foreach($data as $val)
				{
					$ret .= "<span" . $this->RichSnippets->typeof("Breadcrumb") . ">";
					if(is_array($val))
					{//文字列["str"]とURL配列["url"]の配列
						$ret .= " ＞ " . $this->Html->link($val["str"] , $val["url"] , array("rel" => $this->RichSnippets->rels["url"] , "property" => $this->RichSnippets->properties["title"]));
					}
					else
					{//文字列
						$ret .= " ＞ " . $val;
					}
					$ret .= "</span>";
				}
				return $ret;
			}
			elseif(is_string($data))
			{//文字列
				return " ＞ " . $data;
			}
		}
		else
		{
			return "";
		}
	}

/**
 * コピーライト
 *
 * @param	string	$val
 * @return	html
 * @access	public
 */
	function copyright($val)
	{
		return (!empty($val)) ? '<div class="content copyright"><p>' . nl2br($val) . '</p></div>' : "";
	}

/**
 * 日付フォーマット
 *
 * @param	string	$date
 * @param	string	$type "datetime" or "date" or "time" or "term
 * @return	date
 * @access	publicx
 */
	function dateFormat($date , $type = "datetime")
	{
		if(!empty($date))
		{
			$types	= array(
				"datetime"	=> "Y年n月j日 H時i分",
				"date"		=> "Y年n月j日",
				"time"		=> "H時i分",
			);

			$dateData	= getdate(strtotime($date));
//			pr($dateData);
			//00:00の場合
			if($type == "term")
			{
				if(empty($dateData["hours"]) && empty($dateData["minutes"]))
				{
					$type = "date";
				}
				else
				{
					$type = "datetime";
				}
			}
			return date($types[$type] , strtotime($date));
		}
		else
		{
			return "";
		}
	}

/**
 * カウントフォーマット
 *
 * @param	number	$num
 * @return	number
 * @access	public
 */
	function countFormat($num)
	{
		return (!empty($num)) ? $num : 0;
	}

/**
 * 数値から"zero"を返す ex class="zero"
 *
 * @param	number	$count
 * @param	string	$def
 * @return	string
 * @access	public
 */
	function addClassZero($count , $def = null)
	{
		if(empty($def))
		{
			return ($count == 0) ?  "zero" : null;
		}
		else
		{
			return ($count == 0) ? $def . " zero" : $def;
		}
	}

/**
 * 期間判定
 *
 * @param	string	$start
 * @param	string	$end
 * @return	string	current, future, back
 * @access	public
 */
	function checkTerm($start = null, $end = null)
	{
		$now = date("Y-m-d H:i:s");
		if($now >= $start and $now <= $end)
		{
			return "current";
		}
		if($now <= $start)
		{
			return "future";
		}
		if($now >= $end)
		{
			return "back";
		}
		return "";
	}


/** Titles & more
------------------------------ **/

/**
 * span付きタイトル：ゲームタイトルでもポータルでも
 *
 * @param	string	$title_official
 * @param	string	$title_read
 * @return	html
 * @access	public
 */
	function titleWithSpan($title_official , $title_read = null)
	{
		$title = $title_official;
		if(!empty($title_read))
		{
			$title .= "<span>" . $title_read . "</span>";
		}
		return $this->output($title);
	}

/**
 * カッコ付きタイトル：ゲームタイトルでもポータルでも
 *
 * @param	string	$title_official
 * @param	string	$title_read
 * @return	html
 * @access	public
 */
	function titleWithCase($title_official , $title_read = null)
	{
		$title = $title_official;
		if(!empty($title_read))
		{
			$title .= "(" . $title_read . ")";
		}
		return $this->output($title);
	}

/**
 * タイトル（省略）：ゲームタイトルでもポータルでも
 *
 * @param	string	$official
 * @param	string	$read
 * @param	string	$abbr
 * @return	String
 * @access	public
 */
	function titleWithAbbr($official , $read = null , $abbr = null)
	{
		$title = "";
		if(!empty($abbr))
		{
			$title .= $abbr . "：";
		}
		$title .= $this->titleWithCase($official , $read);
		return $this->output($title);
	}

/**
 * タイトル（サブ）：ゲームタイトルでもポータルでも
 *
 * @param	string	$official
 * @param	string	$read
 * @param	string	$sub
 * @return	String
 * @access	public
 */
	function titleWithSub($official , $read = null , $sub = null)
	{
		$title = "";
		$title .= $this->titleWithCase($official , $read);
		if(!empty($sub))
		{
			$title .= "～" . $sub . "～";
		}
		return $this->output($title);
	}

/**
 * タイトル全部のせ：ゲームタイトルでもポータルでも
 *
 * @param	string	$official
 * @param	string	$read
 * @param	string	$abbr
 * @param	string	$sub
 * @return	String
 * @access	public
 */
	function titleAll($official , $read = null , $abbr = null , $sub = null)
	{
		$title = "";
		if(!empty($abbr))
		{
			$title .= $abbr . "：";
		}
		$title .= $this->titleWithCase($official , $read);
		if(!empty($sub))
		{
			$title .= "～" . $sub . "～";
		}
		return $this->output($title);
	}

/**
 * サムネイルパス
 *
 * @param	string	$thumb_name
 * @return	string
 * @access	public
 */
	function thumbName($thumb_name = null)
	{
		return $this->output("thumb/" . ((!empty($thumb_name)) ? $thumb_name : "thumb_00.jpg"));
	}

/**
 * 料金データ
 *
 * @param	string	$fee_test
 * @param	number	$fee_id
 * @param	string	$fee_str
 * @param	number	$service_id
 * @param	string	$service_str
 * @return	html
 * @access	public
 */
	function feeData($fee_text , $fee_id , $fee_str , $service_id , $service_str)
	{
		$ret	= "";
		switch($service_id)
		{
			case 1:	//休止
				$ret = $service_str;
				break;
			case 2: //正式
				$ret = $fee_str;
				if($fee_id == 3 && !empty($fee_text)) //月額
				{
					$ret .= " [" . $fee_text . "]";
				}
				break;
			case 3: //テスト
			case 4:
				$ret = $service_str . "のため無料";
				break;
			case 5: //ティザーサイト
				$ret = $service_str . "先行公開中";
				break;
		}
		return $ret;
	}

/**
 * 期間フォーマット
 *
 * @param	date	$start
 * @param	date	$end
 * @return	html
 * @access	public
 */
	function termFormat($start = null , $end = null)
	{
		return $this->dateFormat($start , "term") . "～" . $this->dateFormat($end , "term");
	}


/** Votes
------------------------------ **/

/**
 * 投稿者名
 *
 * @param	string	$name
 * @return	string
 * @access	public
 */
	function posterName($name)
	{
		$ret = (!empty($name)) ? $name : $this->emptyPosterName;
		return h($ret . "さん");
	}

/**
 * 投稿タイトル
 *
 * @param	array	$vote
 * @return	string
 * @access	public
 */
	function voteTitle(&$vote)
	{
		if(!empty($vote["title"]))
		{
			return h($vote["title"]);
		}
		else
		{
			return $this->posterName($vote["poster_name"]) . "の" . (!empty($vote["review"]) ? "レビュー" : "評価");
		}
	}

/**
 * 点数フォーマット
 *
 * @param	number	$num
 * @param	string	$empty
 * @return	number
 * @access	public
 */
	function pointFormat($num , $empty = 0)
	{
		return (!empty($num)) ? sprintf("%.2f" , $num) : $empty;
	}

/**
 * スター幅
 *
 * @param	number	$type
 * @param	number	$point
 * @return	ntring
 * @access	public
 */
	function starWidthPx($type , $point)	//$type - 50, 100, 200
	{
		if(!empty($point))
		{
			(is_numeric($point)) ? $width = ceil($point * ($type / 5)) : 0;
		}
		else
		{
			$width = 0;
		}

		return $this->output("width:" . $width . "px;");
	}

/**
 * スター表示
 *
 * @param	number	$type
 * @param	number	$point
 * @param	string	$alt
 * @param	string	$color	"white" or "black"
 * @return	html
 * @access	public
 */
	function starBlock($type , $point , $alt = "総合評価" , $color = "white")
	{
		$point = $this->pointFormat($point);
		switch($color)
		{
			case "white" :
				$col = "";
				break;
			case "black":
				$col = "b";
				break;
		}

		$ret  = "";
		$ret .= "<div class=\"star" . $type . $col . "Back\">\n";
		$ret .=	"<div class=\"star" . $type . "\" style=\"" . $this->starWidthPx($type , $point) . "\">\n";
		$ret .= $this->Html->image("design/rating_star" . $type . $col . ".gif" , array("alt" => $alt . "：" . $point . "点"));
		$ret .= "\n</div>\n";
		$ret .= "</div>\n";

		return $this->output($ret);
	}


/** Links
------------------------------ **/

/**
 * タイトルページリンク
 *
 * @param	string	$str
 * @param	string	$path
 * @param	string	$action
 * @param	string	$hash
 * @param	bool	$escape
 * @return	html
 * @access	public
 */
	function titleLinkText($str = null , $path = null , $action = "index" , $hash = null , $escape = false)
	{
		return $this->Html->link($str , array("controller" => "titles" , "action" => $action , "path" => $path , "ext" => "html" , "#" => $hash) , array("escape" => $escape));
	}

/**
 * サムネイルリンク
 *
 * @param	string	$thumb_name
 * @param	string	$alt
 * @param	string	$path
 * @param	number	$width
 * @param	string	$action
 * @return	html
 * @access	public
 */
	function titleLinkThumb($thumb_name , $alt = null , $path = null , $width = 160 , $action = "index")
	{
		return $this->Html->image($thumb_name , array(
			"alt"	=> $alt,
			"width"	=> $width,
			"url"	=> array("controller" => "titles" , "action" => $action , "path" => $path , "ext" => "html")
		));
	}

/**
 * 公式リンク
 *
 * @param	string	$str
 * @param	bool	$ad_use
 * @param	string	$ad_text
 * @param	string	$official_url
 * @param	number	$service_id
 * @param	bool	$titleName
 * @return	html
 * @access	public
 */
	function officialLinkText($str , $ad_use , $ad_text , $official_url , $service_id = null , $titleName = false)
	{
		if($service_id != 1 or $service_id == null)
		{
			return (!empty($ad_use) && !empty($ad_text)) ? $ad_text : $this->Html->link($str , $official_url , array("target" => "_blank" , "escape" => false));
		}
		else
		{//Titles only
			if($titleName)
			{
				$ret = $str;
			}
			else
			{
				$ret = "サービス終了・休止中";
			}
			return "<span>" . $ret . "</span>";
		}
	}

/**
 * カテゴリリンク/テキスト
 *
 * @param	array	$categories
 * @param	string	$tag
 * @return	html
 * @access	public
 */
	function categoriesLink($categories , $tag = null)
	{
		$tagStart	= (!empty($tag)) ? "<" . $tag . ">" : "";
		$tagEnd		= (!empty($tag)) ? "</" . $tag . ">" : "";

		if(!empty($categories))
		{
			if(is_array($categories))
			{
				$text = "";
				foreach($categories as $category)
				{
					$text .= $tagStart . $this->Html->link($category['str'], array('controller' => 'categories', 'path' => $category['path'], 'ext' => 'html')) . $tagEnd . "\n";
				}
			}
			else
			{
				$text = $tagStart . $categories . $tagEnd;
			}
		}
		else
		{
			$text = "データ未登録";
		}
		return $text;
	}

/**
 * スタイルリンク/テキスト
 *
 * @param	array	$styles
 * @param	string	$tag
 * @return	html
 * @access	public
 */
	function stylesLink($styles , $tag = null)
	{
		$tagStart	= (!empty($tag)) ? "<" . $tag . ">" : "";
		$tagEnd		= (!empty($tag)) ? "</" . $tag . ">" : "";

		if(!empty($styles))
		{
			$text = "";
			foreach($styles as $style)
			{
				$text .= $tagStart . $this->Html->link($style['str'], array('controller' => 'styles', 'path' => $style['path'], 'ext' => 'html')) . $tagEnd . "\n";
			}
		}
		else
		{
			$text = "データ未登録";
		}
		return $text;
	}

/**
 * 広告リンク text
 *
 * @param	array $modelData
 * @return	html
 * @access	public
 */
	function adLinkText($modelData , $action)
	{
		if($modelData["ad_noredirect"])
		{
			return $modelData["ad_src_text"];
		}
		else
		{
			return $this->Html->link($modelData["ad_part_text"],
					array("controller" => "jump" , "action" => $action , $modelData["id"]),
					array("target" => "_blank" , "rel" => "nofollow"));
		}
	}

/**
 * 広告リンク image
 *
 * @param	array $modelData
 * @return	html
 * @access	public
 */
	function adLinkImage($modelData , $action)
	{
		if($modelData["ad_noredirect"])
		{
			return $modelData["ad_src_image"];
		}
		else
		{
			return $this->Html->link($this->Html->image($modelData["ad_part_img_src"] , array("alt" => (!empty($modelData["ad_part_text"])) ? $modelData["ad_part_text"] : "")),
					array("controller" => "jump" , "action" => $action , $modelData["id"] , "sys" => false),
					array("target" => "_blank" , "rel" => "nofollow" , "escape" => false));
		}
	}

/**
 * トラッキング画像 src
 *
 * @param	array $modelData
 * @return	html
 * @access	public
 */
	function adTrackImg($modelData)
	{
		if($modelData["ad_noredirect"])
		{
			return "";
		}
		else
		{
			return (!empty($modelData["ad_part_track_src"])) ? $this->Html->image($modelData["ad_part_track_src"] , array("class" => "countSrc")) : "";
		}
	}

/**
 * 楽天検索結果URL
 *
 * @param	string $words
 * @return	html
 * @access	public
 */
	function adLinkRakutenSearch($word)
	{
		return $this->output($this->Html->link("楽天で最安、関連商品を探す",
					array("controller" => "jump" , "action" => "rakutensearch" , urlencode($word) , "sys" => false),
					array("target" => "_blank")));
	}

/**
 * 外部リンクURL確認
 *
 * @param	string $u url
 * @return	html
 * @access	public
 */
	function linkConf($u = null , $str = null)
	{
		if(isset($u))
		{
			$linkStr = (isset($str)) ? $str : mb_strimwidth($u, 0, 50, "...", "UTF-8");
			return $this->Html->link($linkStr , array("controller" => "pages" , "action" => "jump" , "?" => array("u" => $u) , "sys" => false) , array("target" => "_blank"));
		}
	}

}
?>