<h2>カテゴリリスト</h2>
<br>
<?php if ($categories): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>タイトル</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($categories as $item): ?>
	  <tr>
			<td><?php echo $item->name; ?></td>
			<td>
				<?php echo Html::anchor('admin/categories/view/'.$item->id, 'View'); ?> |
				<?php echo Html::anchor('admin/categories/edit/'.$item->id, 'Edit'); ?> |
				<?php echo Html::anchor('admin/categories/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('削除しますか？')")); ?>
			</td>
		</tr>
    <?php endforeach; ?>
  </tbody>
</table>
<?php else: ?>
<p>まだ登録されていません</p>
<?php endif; ?>
<p>
	<?php echo Html::anchor('admin/categories/create', 'カテゴリを追加する', array('class' => 'btn btn-success')); ?>
</p>
