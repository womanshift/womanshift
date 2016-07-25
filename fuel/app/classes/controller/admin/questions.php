<?php

use Aws\S3\S3Client;

class Controller_Admin_Questions extends Controller_Admin
{

	public function action_index()
	{
		$data['questions'] = Model_Question::find('all');
		$this->template->title = "質問";
		$this->template->content = View::forge('admin/questions/index', $data);

	}

	public function action_view($id = null)
	{
		$data['questions'] = Model_Question::find($id);
		$this->template->title = "質問";
		$this->template->content = View::forge('admin/questions/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Question::validate('create');

			if ($val->run())
			{
				$questions = Model_Question::forge(array(
					'title' => Input::post('title'),
				));

				if ($questions and $questions->save())
				{
					Session::set_flash('success', e('Added questions #'.$questions->id.'.'));

					Response::redirect('admin/questions');
				}

				else
				{
					Session::set_flash('error', e('Could not save questions.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Questions";
		$this->template->content = View::forge('admin/questions/create');

	}

	public function action_edit($id = null)
	{
		$questions = Model_Question::find($id);
		$val = Model_Question::validate('edit');

		if ($val->run())
		{
			$questions->title = Input::post('ltitle');

			if ($questions->save())
			{
				Session::set_flash('success', e('Updated questions #' . $id));

				Response::redirect('admin/questions');
			}

			else
			{
				Session::set_flash('error', e('Could not update questions #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$questions->title = $val->validated('title');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('questions', $questions, false);
		}

		$this->template->title = "Questions";
		$this->template->content = View::forge('admin/questions/edit');

	}

	public function action_delete($id = null)
	{
		if ($questions = Model_Question::find($id))
		{
			$questions->delete();

			Session::set_flash('success', e('Deleted questions #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete questions #'.$id));
		}

		Response::redirect('admin/questions');

	}
}
