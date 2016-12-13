<h2>編集</h2>
<br>
<?php echo render('admin/categories/_form'); ?>
<p>
	<?php echo Html::anchor('admin/categories/view/'.$categories->id, '確認'); ?>|
	<?php echo Html::anchor('admin/categories', '戻る'); ?></p>
