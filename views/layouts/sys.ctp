<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>System Maintenance</title>

<link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="/css/bubblepopup/jquery.bubblepopup.css" rel="stylesheet" type="text/css" />
<link href="/css/sys_new.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript" src="/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/js/jquery.tablesorter.min.js"></script>
<script type="text/javascript" src="/js/jquery.bubblepopup.min.js"></script>
<script type="text/javascript" src="/js/tiny_mce/jquery.tinymce.js"></script>
<script type="text/javascript" src="/js/sys_new.js"></script>
</head>

<body>
<div id="wrap">
<!--Header-->
<div id="header">
	<div class="logo"><a href="/sys/"><?php echo $html->image("sys/logo.gif")?></a></div>
	<ul class="pankuz">
		<li><a href="/sys/"><i class="icon-home"></i> SYSTOP</a></li>
<?php
	if(!empty($pankuz_for_layout))
	{
		$ret = "";
		if(is_array($pankuz_for_layout))
		{//配列
			foreach($pankuz_for_layout as $val)
			{
				if(is_array($val))
				{//文字列["str"]とURL配列["url"]の配列
					$ret .= "<li>" . $this->Html->link($val["str"] , $val["url"]) . "</li>";
				}
				else
				{//文字列
					$ret .= "<li>" . $val . "</li>";
				}
			}
		}
		elseif(is_string($pankuz_for_layout))
		{//文字列
			$ret = "<li>" . $pankuz_for_layout . "</li>";
		}
		echo $ret;
	}
?>
	</ul>
</div>
<!--Menu-->
<div id="menu">
<?php if(!empty($loginUser)):?>
	<dl class="sidemenu">
		<dt><i class="icon-cog icon-white"></i> タイトル管理</dt>
		<dd>
			<ul>
<?php if($params["controller"] == "titles" && $params["action"] == "sys_add"):?>
				<li class="active"><?php else:?>
				<li><?php endif;?><?php echo $html->link("新規登録" , array("controller" => "titles" , "action" => "add" , "sys" => true))?></li>

<?php if($params["controller"] == "titles" && ($params["action"] == "sys_index" || $params["action"] == "sys_edit")):?>
				<li class="active"><?php else:?>
				<li><?php endif;?><?php echo $html->link("タイトル一覧" , array("controller" => "titles" , "action" => "index" , "sys" => true))?></li>

<?php if($params["controller"] == "specs" && ($params["action"] == "sys_index" || $params["action"] == "sys_edit")):?>
				<li class="active"><?php else:?>
				<li><?php endif;?><?php echo $html->link("動作環境一覧/登録" , array("controller" => "specs" , "action" => "index" , "sys" => true))?></li>

<?php if($params["controller"] == "titles" && ($params["action"] == "sys_updateall")):?>
				<li class="active"><?php else:?>
				<li><?php endif;?><?php echo $html->link("全タイトル集計更新" , array("controller" => "titles" , "action" => "updateall" , "sys" => true))?></li>
			</ul>
		</dd>

		<dt><i class="icon-cog icon-white"></i> 投稿管理</dt>
		<dd>
			<ul>
<?php if($params["controller"] == "votes"):?>
				<li class="active"><?php else:?>
				<li><?php endif;?><?php echo $html->link("投稿一覧" , array("controller" => "votes" , "action" => "index" , "sys" => true))?></li>
			</ul>
		</dd>

		<dt><i class="icon-cog icon-white"></i> リンク管理</dt>
		<dd>
			<ul>
<?php if($params["controller"] == "fansites"):?>
				<li class="active"><?php else:?>
				<li><?php endif;?><?php echo $html->link("ファンサイト一覧/登録" , array("controller" => "fansites" , "action" => "index" , "sys" => true))?></li>

<?php if($params["controller"] == "links" && ($params["action"] == "sys_index" || $params["action"] == "sys_edit")):?>
				<li class="active"><?php else:?>
				<li><?php endif;?><?php echo $html->link("相互リンク一覧" , array("controller" => "links" , "action" => "index" , "sys" => true))?></li>

<?php if($params["controller"] == "links" && $params["action"] == "sys_add"):?>
				<li class="active"><?php else:?>
				<li><?php endif;?><?php echo $html->link("相互リンク登録" , array("controller" => "links" , "action" => "add" , "sys" => true))?></li>
			</ul>
		</dd>

		<dt><i class="icon-cog icon-white"></i> マスタ管理</dt>
		<dd>
			<ul>
<?php if($params["controller"] == "portals"):?>
				<li class="active"><?php else:?>
				<li><?php endif;?><?php echo $html->link("ポータル" , array("controller" => "portals" , "action" => "index" , "sys" => true))?></li>

<?php if($params["controller"] == "categories"):?>
				<li class="active"><?php else:?>
				<li><?php endif;?><?php echo $html->link("カテゴリ" , array("controller" => "categories" , "action" => "index" , "sys" => true))?></li>

<?php if($params["controller"] == "styles"):?>
				<li class="active"><?php else:?>
				<li><?php endif;?><?php echo $html->link("スタイル" , array("controller" => "styles" , "action" => "index" , "sys" => true))?></li>

<?php if($params["controller"] == "fees"):?>
				<li class="active"><?php else:?>
				<li><?php endif;?><?php echo $html->link("料金設定" , array("controller" => "fees" , "action" => "index" , "sys" => true))?></li>

<?php if($params["controller"] == "services"):?>
				<li class="active"><?php else:?>
				<li><?php endif;?><?php echo $html->link("サービス状態" , array("controller" => "services" , "action" => "index" , "sys" => true))?></li>
			</ul>
		</dd>

		<dt><i class="icon-cog icon-white"></i> 商品管理</dt>
		<dd>
			<ul>
<?php if($params["controller"] == "packages" && $params["action"] == "sys_index"):?>
				<li class="active"><?php else:?>
				<li><?php endif;?><?php echo $html->link("パッケージ一覧/登録" , array("controller" => "packages" , "action" => "index" , "sys" => true))?></li>
<?php if($params["controller"] == "pcs" && $params["action"] == "sys_add"):?>
				<li class="active"><?php else:?>
				<li><?php endif;?><?php echo $html->link("新規PC登録" , array("controller" => "pcs" , "action" => "add" , "sys" => true))?></li>
<?php if($params["controller"] == "pcs" && $params["action"] == "sys_index"):?>
				<li class="active"><?php else:?>
				<li><?php endif;?><?php echo $html->link("PC一覧" , array("controller" => "pcs" , "action" => "index" , "sys" => true))?></li>
<?php if($params["controller"] == "pcshops"):?>
				<li class="active"><?php else:?>
				<li><?php endif;?><?php echo $html->link("ショップ一覧 / 登録" , array("controller" => "pcshops" , "action" => "index" , "sys" => true))?></li>
			</ul>
		</dd>

		<dt><i class="icon-cog icon-white"></i> 広告管理</dt>
		<dd>
			<ul>
<?php if($params["controller"] == "ad_left_tops"):?>
				<li class="active"><?php else:?>
				<li><?php endif;?><?php echo $html->link("左サイドバー上" , array("controller" => "ad_left_tops" , "action" => "index" , "sys" => true))?></li>
<?php if($params["controller"] == "ad_left_bottoms"):?>
				<li class="active"><?php else:?>
				<li><?php endif;?><?php echo $html->link("左サイドバー下" , array("controller" => "ad_left_bottoms" , "action" => "index" , "sys" => true))?></li>
<?php if($params["controller"] == "ad_right_tops"):?>
				<li class="active"><?php else:?>
				<li><?php endif;?><?php echo $html->link("右サイドバー上" , array("controller" => "ad_right_tops" , "action" => "index" , "sys" => true))?></li>
<?php if($params["controller"] == "ad_right_bottoms"):?>
				<li class="active"><?php else:?>
				<li><?php endif;?><?php echo $html->link("右サイドバー下" , array("controller" => "ad_right_bottoms" , "action" => "index" , "sys" => true))?></li>
<?php if($params["controller"] == "ad_center_bottoms"):?>
				<li class="active"><?php else:?>
				<li><?php endif;?><?php echo $html->link("中央コンテンツ下" , array("controller" => "ad_center_bottoms" , "action" => "index" , "sys" => true))?></li>
			</ul>
		</dd>

		<dt><i class="icon-cog icon-white"></i> 小遣い管理</dt>
		<dd>
			<ul>
<?php if($params["controller"] == "monies"):?>
				<li class="active"><?php else:?>
				<li><?php endif;?><?php echo $html->link("小遣いサイト" , array("controller" => "monies" , "action" => "index" , "sys" => true))?></li>

<?php if($params["controller"] == "moneycategories"):?>
				<li class="active"><?php else:?>
				<li><?php endif;?><?php echo $html->link("小遣いカテゴリ" , array("controller" => "moneycategories" , "action" => "index" , "sys" => true))?></li>
			</ul>
		</dd>

		<dt><i class="icon-cog icon-white"></i> その他</dt>
		<dd>
			<ul>
<?php if($params["controller"] == "updates"):?>
				<li class="active"><?php else:?>
				<li><?php endif;?><?php echo $html->link("更新履歴" , array("controller" => "updates" , "action" => "index" , "sys" => true))?></li>
<?php if($params["controller"] == "letters"):?>
				<li class="active"><?php else:?>
				<li><?php endif;?><?php echo $html->link("問い合わせ確認" , array("controller" => "letters" , "action" => "index" , "sys" => true))?></li>
<?php if($params["controller"] == "shares"):?>
				<li class="active"><?php else:?>
				<li><?php endif;?><?php echo $html->link("SNS投稿" , array("controller" => "shares" , "action" => "index" , "sys" => true))?></li>
				<li><a href="/mfm.php" target="_blank">Mad file manager</a></li>
				<li><a href="/ra/analyze/" target="_blank">アクセス解析</a></li>
<?php if($params["controller"] == "pages" && $params["action"] == "acr_pr"):?>
				<li class="active"><?php else:?>
				<li><?php endif;?><?php echo $html->link("ACR - PRテキスト" , array("controller" => "pages" , "action" => "acr_pr" , "sys" => true))?></li>
				<li><a href="http://pranking8.ziyu.net/edit.php?id=diechang" target="_blank">⇒ ACRページランク</a></li>
				<li><a href="http://rranking12.ziyu.net/edit.php?id=diechang" target="_blank">⇒ ACRアクセスランク</a></li>
				<li><?php echo $html->link("ログアウト" , array("controller" => "users" , "action" => "logout" , "sys" => true))?></li>
			</ul>
		</dd>

		<dt><i class="icon-remove icon-white"></i> イベント管理</dt>
		<dd>
			<ul>
<?php if($params["controller"] == "events" && $params["action"] == "sys_add"):?>
				<li class="active"><?php else:?>
				<li><?php endif;?><?php echo $html->link("イベント登録" , array("controller" => "events" , "action" => "add" , "sys" => true))?></li>
<?php if($params["controller"] == "events" && $params["action"] == "sys_index"):?>
				<li class="active"><?php else:?>
				<li><?php endif;?><?php echo $html->link("イベント一覧" , array("controller" => "events" , "action" => "index" , "sys" => true))?></li>
			</ul>
		</dd>
	</dl>
<?php endif;?>
</div>
<!-- -->
<!--Main-->
<div id="main">
<?php echo $session->flash()?>
<?php echo $session->flash("auth")?>

<?php echo $content_for_layout?>

<?php echo $this->element("sql_dump")?>
</div>
<!-- -->
<!--Footer-->
<div id="footer">
	<?php echo $html->link("ONLINE GAME LIFE" , "/" , array("target" => "_blank"))?> - SYSTEM MAINTENANCE　<?php echo date("Y/m/d G:i:s")?>
</div>
</div>
</body>
</html>
