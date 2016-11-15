<h2>メンバーリスト</h2>
<br>
<?php if ($councilors): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>アイコン</th>
			<th>名前</th>
			<th>ニックネーム</th>
			<th>活動場所</th>
			<th>キャッチフレーズ</th>
			<th>力を入れていること</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
    <?php foreach ($councilors as $item): ?>
	  <tr>
			<td><img src="<?php echo $item->icon_url; ?>" width="25" height="25" /></td>
			<td><?php echo $item->name; ?></td>
			<td><?php echo $item->nickname; ?></td>
			<td><?php echo $item->location; ?></td>
			<td><?php echo $item->catchphrase; ?></td>
			<td><?php echo $item->emphasis; ?></td>
			<td>
				<?php echo Html::anchor('admin/councilors/view/'.$item->id, 'View'); ?>
				<?php echo Html::anchor('admin/councilors/edit/'.$item->id, 'Edit'); ?> |
				<?php echo Html::anchor('admin/councilors/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('削除しますか？')")); ?>
			</td>
		</tr>
  <?php endforeach; ?>
  </tbody>
</table>
<?php else: ?>
<p>まだ登録されていません</p>
<?php endif; ?>
<p>
	<?php echo Html::anchor('admin/councilors/create', 'メンバーを追加する', array('class' => 'btn btn-success')); ?>
</p>
