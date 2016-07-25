<h2>編集</h2>
<br>

<?php echo render('admin/questions/_form'); ?>
<p>
	<?php echo Html::anchor('admin/questions/view/'.$questions->id, '確認'); ?> |
	<?php echo Html::anchor('admin/questions', '戻る'); ?></p>
