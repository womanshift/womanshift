<?php

use Aws\S3\S3Client;

class Controller_Admin_Answers extends Controller_Admin
{

	public function action_index()
	{
		$data['answers'] = Model_Answer::find('all');
		$questions = Model_Question::find('all');
		foreach ($questions as $key => $val) {
			$data['questions'][$key] = $val->title;
		}
		$councilors = Model_Councilor::find('all');
		foreach ($councilors as $key => $val) {
			$data['councilors'][$key] = $val->name;
		}
		$this->template->title = "回答";
		$this->template->content = View::forge('admin/answers/index', $data);

	}

	public function action_view($id = null)
	{
		$data['answers'] = Model_Answer::find($id);
		$data['questions'] = Model_Question::find($data['answers']->question_id);
		$data['councilors'] = Model_Councilor::find($data['answers']->councilor_id);
		$this->template->title = "回答";
		$this->template->content = View::forge('admin/answers/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Answer::validate('create');

			if ($val->run())
			{
				$answers = Model_Answer::forge(array(
					'councilor_id' => Input::post('councilor_id'),
					'question_id' => Input::post('question_id'),
					'text' => Input::post('text'),
				));

				if ($answers and $answers->save())
				{
					Session::set_flash('success', e('Added answers #'.$answers->id.'.'));

					Response::redirect('admin/answers');
				}

				else
				{
					Session::set_flash('error', e('Could not save answers.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$questions = array();
		$_questions = Model_Question::find('all');
		foreach ($_questions as $key => $val) {
			$questions[$key] = $val->title;
		}
		$this->template->set_global('questions', $questions, false);
		$councilors = array();
		$_councilors = Model_Councilor::find('all');
		foreach ($_councilors as $key => $val) {
			$councilors[$key] = $val->name;
		}
		$this->template->set_global('councilors', $councilors, false);

		$this->template->title = "回答";
		$this->template->content = View::forge('admin/answers/create');

	}

	public function action_edit($id = null)
	{
		$answers = Model_Answer::find($id);
		$val = Model_Answer::validate('edit');

		if ($val->run())
		{
			$answers->councilor_id = Input::post('councilor_id');
			$answers->question_id = Input::post('question_id');
			$answers->text = Input::post('text');

			if ($answers->save())
			{
				Session::set_flash('success', e('Updated answers #' . $id));

				Response::redirect('admin/answers');
			}

			else
			{
				Session::set_flash('error', e('Could not update answers #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$answers->councilor_id = $val->validated('councilor_id');
				$answers->question_id = $val->validated('question_id');
				$answers->text = $val->validated('text');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('answers', $answers, false);
		}

		$questions = array();
		$_questions = Model_Question::find('all');
		foreach ($_questions as $key => $val) {
			$questions[$key] = $val->title;
		}
		$this->template->set_global('questions', $questions);
		$councilors = array();
		$_councilors = Model_Councilor::find('all');
		foreach ($_councilors as $key => $val) {
			$councilors[$key] = $val->name;
		}
		$this->template->set_global('councilors', $councilors);

		$this->template->title = "回答";
		$this->template->content = View::forge('admin/answers/edit');

	}

	public function action_delete($id = null)
	{
		if ($answers = Model_Answer::find($id))
		{
			$answers->delete();

			Session::set_flash('success', e('Deleted answers #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete answers #'.$id));
		}

		Response::redirect('admin/answers');

	}

	private function upload_s3()
	{
		$config = array(
			'path' => APPPATH.'tmp',
			'overwrite' => true,
			'randomize' => true,
			'ext_whitelist' => array('img', 'jpg', 'jpeg', 'gif', 'png'),
		);
		Upload::process($config);

		if (Upload::is_valid())
		{
			Upload::save(0);
		}

		$s3 = S3Client::factory(['credentials' => [
				'key' => 'AKIAIZES7BN3X6NLRHEA',
				'secret' => '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',
			],
			'region' => 'us-east-1',
			'version' => 'latest',
		]);
		$bucket = 'womanshift';

		$icon_url = null;
		foreach (Upload::get_files() as $file)
		{
			$result = $s3->putObject(array(
				'Bucket' => 'womanshift',
				'Key' => $file['saved_as'],
				'Body' => file_get_contents($file['saved_to'].$file['saved_as']),
				'ACL' => 'public-read',
			));
			File::delete($file['saved_to'].$file['saved_as']);
			$icon_url = $result['ObjectURL'];
		}

		return $icon_url;
	}

}
