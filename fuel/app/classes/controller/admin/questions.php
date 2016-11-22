<?php

use Aws\S3\S3Client;

class Controller_Admin_Questions extends Controller_Admin
{

	public function action_index()
	{
		$data['questions'] = Model_Question::find('all');
		$categories = Model_Category::find('all');
		foreach ($categories as $key => $val) {
			$data['categories'][$key] = $val->name;
		}
		$this->template->title = "質問";
		$this->template->content = View::forge('admin/questions/index', $data);

	}

	public function action_view($id = null)
	{
		$data['questions'] = Model_Question::find($id);
		$data['categories'] = Model_Category::find($data['questions']->category_id);
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
					'category_id' => Input::post('category_id'),
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

		$categories = array();
		$_categories = Model_Category::find('all');
		foreach ($_categories as $key => $val) {
			$categories[$key] = $val->name;
		}
		$this->template->set_global('categories', $categories, false);

		$this->template->title = "質問";
		$this->template->content = View::forge('admin/questions/create');

	}

	public function action_edit($id = null)
	{
		$questions = Model_Question::find($id);
		$val = Model_Question::validate('edit');

		if ($val->run())
		{
			$questions->title = Input::post('title');
			$questions->category_id = Input::post('category_id');

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
				$questions->category_id = $val->validated('category_id');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('questions', $questions, false);
		}

		$categories = array();
		$_categories = Model_Category::find('all');
		foreach ($_categories as $key => $val) {
			$categories[$key] = $val->name;
		}
		$this->template->set_global('categories', $categories, false);

		$this->template->title = "質問";
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
