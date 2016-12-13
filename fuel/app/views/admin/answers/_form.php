<?php echo Form::open(array("class"=>"form-horizontal", "enctype"=>"multipart/form-data", 'method'=>'post')); ?>
	<fieldset>
		<div class="form-group">
			<?php echo Form::label('議員', 'councilor_id', array('class'=>'control-label')); ?>
			<?php echo Form::select('councilor_id', Input::post('councilor_id', isset($answers) ? $answers->councilor_id : ''), $councilors, array('class' => 'col-md-4 form-control')); ?>
		</div>
		<div class="form-group">
			<?php echo Form::label('質問', 'question_id', array('class'=>'control-label')); ?>
			<?php echo Form::select('question_id', Input::post('question_id', isset($answers) ? $answers->question_id : ''), $questions, array('class' => 'col-md-4 form-control')); ?>
		</div>
		<div class="form-group">
			<?php echo Form::label('回答', 'text', array('class'=>'control-label')); ?>
			<?php echo Form::input('text', Input::post('text', isset($answers) ? $answers->text : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'仕事で着ないタイプの服。スカート。ワンピース')); ?>
		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', '登録', array('class' => 'btn btn-primary')); ?>
		</div>
	</fieldset>
<?php echo Form::close(); ?>
