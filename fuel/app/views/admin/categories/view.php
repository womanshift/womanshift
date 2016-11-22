<h2><?php echo $categories->id; ?></h2>
<p>
	<?php echo $categories->name; ?>
</p>
<?php echo Html::anchor('admin/categories/edit/'.$categories->id, '登録'); ?> |
<?php echo Html::anchor('admin/categories', '戻る'); ?>
