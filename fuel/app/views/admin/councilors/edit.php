<h2>編集</h2>
<br>
<?php echo render('admin/councilors/_form'); ?>
<p>
	<?php echo Html::anchor('admin/councilors/view/'.$councilors->id, '確認'); ?> |
	<?php echo Html::anchor('admin/councilors', '戻る'); ?>
</p>
