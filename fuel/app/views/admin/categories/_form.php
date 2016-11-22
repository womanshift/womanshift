<?php echo Form::open(array("class"=>"form-horizontal", "enctype"=>"multipart/form-data", 'method'=>'post')); ?>
	<fieldset>
		<div class="form-group">
			<?php echo Form::label('カテゴリ名', 'name', array('class'=>'control-label')); ?>
			<?php echo Form::textarea('name', Input::post('name', isset($categories) ? $categories->name : ''), array('class' => 'col-md-8 form-control', 'placeholder'=>'恋愛')); ?>
		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', '登録', array('class' => 'btn btn-primary')); ?>
		</div>
	</fieldset>
<?php echo Form::close(); ?>
