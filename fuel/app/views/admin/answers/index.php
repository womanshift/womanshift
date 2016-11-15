<h2>回答リスト</h2>
<br>
<?php if ($answers): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>議員</th>
			<th>質問</th>
			<th>回答</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
    <?php foreach ($answers as $item): ?>
	  <tr>
			<td><?php echo $councilors[$item->councilor_id]; ?></td>
			<td><?php echo $questions[$item->question_id]; ?></td>
			<td><?php echo $item->text; ?></td>
			<td>
				<?php echo Html::anchor('admin/answers/view/'.$item->id, 'View'); ?> |
				<?php echo Html::anchor('admin/answers/edit/'.$item->id, 'Edit'); ?> |
				<?php echo Html::anchor('admin/answers/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('削除しますか？')")); ?>
			</td>
		</tr>
    <?php endforeach; ?>
  </tbody>
</table>
<?php else: ?>
<p>まだ登録されていません</p>
<?php endif; ?>
<p>
	<?php echo Html::anchor('admin/answers/create', '回答を追加する', array('class' => 'btn btn-success')); ?>
</p>
