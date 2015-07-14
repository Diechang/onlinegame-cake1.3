<?php
/**
 * Open Graph Protocol用ヘルパー
 */
class OgpHelper extends AppHelper
{
	var $fbAppId	= "293306697370465";
	var $fbAdmins	= "100001729714962";
	var $fbPageId	= "349894881721182";
	var $options	= array();

	/**
	 * 出力
	 *
	 * @access public
	 * @return html
	 */
	function output()
	{
		$site_url = Configure::read("Site.url");
		//Default params
		$params = Set::merge(array(
			"type" => "website",
			"title" => "オンラインゲームライフ",
			"url" => $site_url,
			"image" => $site_url . "img/design/logo_ogp.jpg",
			"description" => "無料オンラインゲーム情報サイト。ユーザーによるレビュー・評価の投稿による人気オンラインゲームランキングや攻略サイトリンク集、ムービー検索も可能。",
			"site_name" => "オンラインゲームライフ",
		),$this->options);

		$ret = array(
			"0" => '<meta property="fb:app_id" content="' . $this->fbAppId . '" />',
			"1" => '<meta property="fb:admins" content="' . $this->fbAdmins . '" />',
//			"2" => '<meta property="fb:page_id" content="' . $this->fbPageId . '" />',
		);

		foreach($params as $key => $v){
			$ret[] = '<meta property="og:' . $key . '" content="' . $v . '" />';
		}

		$ret = implode("\n",$ret);

		return $ret;
	}
}
?>