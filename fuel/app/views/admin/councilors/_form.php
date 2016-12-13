<?php echo Form::open(array("class"=>"form-horizontal", "enctype"=>"multipart/form-data", 'method'=>'post')); ?>
	<fieldset>
		<div class="form-group">
			<?php echo Form::label('名前', 'name', array('class'=>'control-label')); ?>
			<?php echo Form::input('name', Input::post('name', isset($councilors) ? $councilors->name : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'長島有里')); ?>
		</div>
		<div class="form-group">
			<?php echo Form::label('ニックネーム', 'nickname', array('class'=>'control-label')); ?>
			<?php echo Form::input('nickname', Input::post('nickname', isset($councilors) ? $councilors->nickname : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'ゆりさん')); ?>
		</div>
		<div class="form-group">
			<?php echo Form::label('Twitter', 'twitter', array('class'=>'control-label')); ?>
			<?php echo Form::input('twitter', Input::post('twitter', isset($councilors) ? $councilors->twitter : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'')); ?>
		</div>
		<div class="form-group">
			<?php echo Form::label('Facebook', 'facebook', array('class'=>'control-label')); ?>
			<?php echo Form::input('facebook', Input::post('facebook', isset($councilors) ? $councilors->facebook : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'')); ?>
		</div>
		<div class="form-group">
			<?php echo Form::label('ホームページリンク', 'link', array('class'=>'control-label')); ?>
			<?php echo Form::input('link', Input::post('link', isset($councilors) ? $councilors->link : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'')); ?>
		</div>
		<div class="form-group">
			<?php echo Form::label('活動場所', 'location', array('class'=>'control-label')); ?>
			<?php echo Form::input('location', Input::post('location', isset($councilors) ? $councilors->location : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'逗子市議会')); ?>
		</div>
		<div class="form-group">
			<?php echo Form::label('キャッチフレーズ', 'catchphrase', array('class'=>'control-label')); ?>
			<?php echo Form::input('catchphrase', Input::post('location', isset($councilors) ? $councilors->catchphrase : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'')); ?>
		</div>
		<div class="form-group">
			<?php echo Form::label('力を入れていること', 'emphasis', array('class'=>'control-label')); ?>
			<?php echo Form::input('emphasis', Input::post('location', isset($councilors) ? $councilors->emphasis : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'')); ?>
		</div>
		<div class="form-group">
			<?php echo Form::label('アイコン', 'icon_url', array('class'=>'control-label')); ?>
			<?php echo Form::file('icon_url'); ?>
		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', '登録', array('class' => 'btn btn-primary')); ?>
		</div>
	</fieldset>
<?php echo Form::close(); ?>
