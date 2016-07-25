<?php

use Aws\S3\S3Client;

class Controller_Admin_Answers extends Controller_Admin
{

	public function action_index()
	{
		$data['answers'] = Model_Answer::find('all');
		$this->template->title = "回答";
		$this->template->content = View::forge('admin/answers/index', $data);

	}

	public function action_view($id = null)
	{
		$data['answers'] = Model_Answer::find($id);

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
					'answer_id' => Input::post('answer_id'),
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

		$this->template->title = "Answers";
		$this->template->content = View::forge('admin/answers/create');

	}

	public function action_edit($id = null)
	{
		$answers = Model_Answer::find($id);
		$val = Model_Answer::validate('edit');

		if ($val->run())
		{
			$answers->answer_id = Input::post('answer_id');
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
				$answers->answer_id = $val->validated('answer_id');
				$answers->question_id = $val->validated('question_id');
				$answers->icon_url = $val->validated('icon_url');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('answers', $answers, false);
		}

		$this->template->title = "Answers";
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
