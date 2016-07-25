<h2><?php echo $answers->id; ?></h2>

<p>
	<?php echo $answers->councilor_id; ?></p>
<p>
	<?php echo $answers->question_id; ?></p>
<p>
	<?php echo $answers->text; ?></p>

<?php echo Html::anchor('admin/answers/edit/'.$answers->id, '登録'); ?> |
<?php echo Html::anchor('admin/answers', '戻る'); ?>
