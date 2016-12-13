<h2>編集</h2>
<br>
<?php echo render('admin/answers/_form'); ?>
<p>
	<?php echo Html::anchor('admin/answers/view/'.$answers->id, '確認'); ?> |
	<?php echo Html::anchor('admin/answers', '戻る'); ?>
</p>
