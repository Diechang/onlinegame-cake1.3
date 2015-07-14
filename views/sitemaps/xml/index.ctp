<?php $domain = "http://onlinegame.dz-life.net";?>
<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
<?php foreach($files as $file):?>
<sitemap>
	<loc><?php echo $domain?><?php echo $html->url(array("controller" => "sitemaps" , "action" => $file , "ext" => "xml"))?></loc>
</sitemap>
<?php endforeach;?>
</sitemapindex>