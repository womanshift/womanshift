<?php echo Form::open(array("class"=>"form-horizontal", "enctype"=>"multipart/form-data", 'method'=>'post')); ?>
	<fieldset>
		<div class="form-group">
			<?php echo Form::label('質問', 'name', array('class'=>'control-label')); ?>
			<?php echo Form::textarea('title', Input::post('title', isset($questions) ? $questions->title : ''), array('class' => 'col-md-8 form-control', 'placeholder'=>'デートの時の服装は？')); ?>
		</div>
		<div class="form-group">
			<?php echo Form::label('カテゴリ', 'category_id', array('class'=>'control-label')); ?>
			<?php echo Form::select('category_id', Input::post('category_id', isset($questions) ? $questions->category_id : ''), $categories, array('class' => 'col-md-4 form-control')); ?>
		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', '登録', array('class' => 'btn btn-primary')); ?>
		</div>
	</fieldset>
<?php echo Form::close(); ?>
