<h2>質問リスト</h2>
<br>
<?php if ($questions): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>タイトル</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($questions as $item): ?>		<tr>

			<td><?php echo $item->title; ?></td>
			<td>
				<?php echo Html::anchor('admin/questions/view/'.$item->id, 'View'); ?> |
				<?php echo Html::anchor('admin/questions/edit/'.$item->id, 'Edit'); ?> |
				<?php echo Html::anchor('admin/questions/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('削除しますか？')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>まだ登録されていません</p>

<?php endif; ?><p>
	<?php echo Html::anchor('admin/questions/create', '質問を追加する', array('class' => 'btn btn-success')); ?>

</p>
