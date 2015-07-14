<?php if(!empty($specs)):?>
<?php foreach($specs as $spec):?>
<?php if(!empty($spec["caption"])):?><h3><?php echo $spec["caption"]?></h3><?php endif;?>
<table class="spec">
	<thead>
		<tr>
			<td>&nbsp;</td>
			<th>必須環境</th>
			<th>推奨環境</th>
		</tr>
	</thead>
	<?php echo $this->TitlePage->specRows("OS" , $spec["os_low"] , $spec["os_high"])?>
	<?php echo $this->TitlePage->specRows("CPU" , $spec["cpu_low"] , $spec["cpu_high"])?>
	<?php echo $this->TitlePage->specRows("メモリ" , $spec["memory_low"] , $spec["memory_high"])?>
	<?php echo $this->TitlePage->specRows("ディスク容量" , $spec["disc_low"] , $spec["disc_high"])?>
	<?php echo $this->TitlePage->specRows("グラフィック" , $spec["graphic_low"] , $spec["graphic_high"])?>
	<?php echo $this->TitlePage->specRows("サウンド" , $spec["sound_low"] , $spec["sound_high"])?>
	<?php echo $this->TitlePage->specRows("ネットワーク" , $spec["network_low"] , $spec["network_high"])?>
	<?php echo $this->TitlePage->specRows("ディスプレイ" , $spec["display_low"] , $spec["display_high"])?>
	<?php echo $this->TitlePage->specRows("DirectX" , $spec["directx_low"] , $spec["directx_high"])?>
	<?php echo $this->TitlePage->specRows("その他" , $spec["other_low"] , $spec["other_high"])?>
	<tfoot>
		<tr>
			<th>更新日</th>
			<td colspan="2"><?php echo $this->Common->dateFormat($spec["modified"] , "date")?></td>
		</tr>
	</tfoot>
</table>
<?php endforeach;?>
<?php else:?>
<p class="tCenter">動作環境データが登録されていません。<br />公式サイトで確認をお願いします。</p>
<?php endif;?>