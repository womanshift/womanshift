<h2><?php echo $answers->id; ?></h2>

<p>
	<?php echo $councilors->name; ?></p>
<p>
	<?php echo $questions->title; ?></p>
<p>
	<?php echo $answers->text; ?></p>

<?php echo Html::anchor('admin/answers/edit/'.$answers->id, '登録'); ?> |
<?php echo Html::anchor('admin/answers', '戻る'); ?>
