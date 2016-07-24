<h2><?php echo $councilors->name; ?>(<?php echo $councilors->nickname; ?>)</h2>

<p>
	<?php echo $councilors->location; ?></p>
<p>
	<?php echo $councilors->icon_url; ?></p>

<?php echo Html::anchor('admin/councilors/edit/'.$councilors->id, '登録'); ?> |
<?php echo Html::anchor('admin/councilors', '戻る'); ?>
