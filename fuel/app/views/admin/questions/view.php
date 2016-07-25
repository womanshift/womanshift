<h2><?php echo $questions->id; ?></h2>

<p>
	<?php echo $questions->title; ?></p>

<?php echo Html::anchor('admin/questions/edit/'.$questions->id, '登録'); ?> |
<?php echo Html::anchor('admin/questions', '戻る'); ?>
