<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.google.com/schemas/sitemap/0.84 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
<?php $domain = "http://onlinegame.dz-life.net";?>
<!--ランキング-->
<url><loc><?php echo $domain . $html->url(array("controller" => "ranking" , "path" => "index" , "ext" => "html"))?></loc></url>
<?php foreach($categories as $category):?>
<url><loc><?php echo $domain . $html->url(array("controller" => "ranking" , "path" => $category["Category"]["path"] , "ext" => "html"))?></loc></url>
<?php endforeach;?>

<!--ジャンル別-->
<?php foreach($categories as $category):?>
<url><loc><?php echo $domain . $html->url(array("controller" => "categories" , "path" => $category["Category"]["path"] , "ext" => "html"))?></loc></url>
<?php endforeach;?>

<!--スタイル・環境別-->
<?php foreach($styles as $style):?>
<url><loc><?php echo $domain . $html->url(array("controller" => "styles" , "path" => $style["Style"]["path"] , "ext" => "html"))?></loc></url>
<?php endforeach;?>

<!--サービス状態別-->
<?php foreach($services as $service):?>
<url><loc><?php echo $domain . $html->url(array("controller" => "services" , "path" => $service["Service"]["path"] , "ext" => "html"))?></loc></url>
<?php endforeach;?>

<!--オンラインゲーム一覧-->
<?php foreach($titles as $t):?>
<url><loc><?php echo $domain . $html->url(array("controller" => "titles" , "action" => "index" , "path" => $t["Title"]["url_str"] , "ext" => "html"))?></loc></url>
<url><loc><?php echo $domain . $html->url(array("controller" => "titles" , "action" => "rating" , "path" => $t["Title"]["url_str"] , "ext" => "html"))?></loc></url>
<url><loc><?php echo $domain . $html->url(array("controller" => "titles" , "action" => "review" , "path" => $t["Title"]["url_str"] , "ext" => "html"))?></loc></url>
<url><loc><?php echo $domain . $html->url(array("controller" => "titles" , "action" => "allvotes" , "path" => $t["Title"]["url_str"] , "ext" => "html"))?></loc></url>
<url><loc><?php echo $domain . $html->url(array("controller" => "titles" , "action" => "link" , "path" => $t["Title"]["url_str"] , "ext" => "html"))?></loc></url>
<url><loc><?php echo $domain . $html->url(array("controller" => "titles" , "action" => "search" , "path" => $t["Title"]["url_str"] , "ext" => "html"))?></loc></url>
<?php if(!empty($t["Titlesummary"]["pc_count"])):?>
<url><loc><?php echo $domain . $html->url(array("controller" => "titles" , "action" => "pc" , "path" => $t["Title"]["url_str"] , "ext" => "html"))?></loc></url>
<?php endif;?>
<?php endforeach;?>

<!--ポータル-->
<url><loc><?php echo $domain . $html->url(array("controller" => "portals" , "action" => "index" , "ext" => "html"))?></loc></url>
<?php foreach($portals as $portal):?>
<url><loc><?php echo $domain . $html->url(array("controller" => "portals" , "action" => "view" , "path" => $portal["Portal"]["url_str"] , "ext" => "html"))?></loc></url>
<?php endforeach;?>

<!--ゲーム代を稼ぐ-->
<url><loc><?php echo $domain . $html->url(array("controller" => "monies" , "action" => "index" , "ext" => "html"))?></loc></url>
<?php foreach($moneycategories as $moneycategory):?>
<url><loc><?php echo $domain . $html->url(array("controller" => "monies" , "action" => "view" , "path" => $moneycategory["Moneycategory"]["path"] , "ext" => "html"))?></loc></url>
<?php endforeach;?>

<!--ゲーム用PC-->
<url><loc><?php echo $domain . $html->url(array("controller" => "pcs" , "action" => "index" , "ext" => "html"))?></loc></url>

<!--サイトメニュー-->
<url><loc><?php echo $domain . $html->url(array("controller" => "pages" , "action" => "about" , "ext" => "html"))?></loc></url>
*<url><loc><?php echo $domain . $html->url(array("controller" => "links" , "path" => "index" , "ext" => "html"))?></loc></url>
<url><loc><?php echo $domain . $html->url(array("controller" => "pages" , "action" => "sitemap" , "ext" => "html"))?></loc></url>
<url><loc><?php echo $domain . $html->url(array("controller" => "pages" , "action" => "contact" , "ext" => "html"))?></loc></url>

</urlset>