<?php

use Aws\S3\S3Client;

class Controller_Admin_Categories extends Controller_Admin
{

	public function action_index()
	{
		$data['categories'] = Model_Category::find('all');
		$this->template->title = "カテゴリ";
		$this->template->content = View::forge('admin/categories/index', $data);

	}

	public function action_view($id = null)
	{
		$data['categories'] = Model_Category::find($id);
		$this->template->title = "カテゴリ";
		$this->template->content = View::forge('admin/categories/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Category::validate('create');

			if ($val->run())
			{
				$categories = Model_Category::forge(array(
					'name' => Input::post('name'),
				));

				if ($categories and $categories->save())
				{
					Session::set_flash('success', e('Added categories #'.$categories->id.'.'));

					Response::redirect('admin/categories');
				}

				else
				{
					Session::set_flash('error', e('Could not save categories.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "カテゴリ";
		$this->template->content = View::forge('admin/categories/create');

	}

	public function action_edit($id = null)
	{
		$categories = Model_Category::find($id);
		$val = Model_Category::validate('edit');

		if ($val->run())
		{
			$categories->name = Input::post('name');

			if ($categories->save())
			{
				Session::set_flash('success', e('Updated categories #' . $id));

				Response::redirect('admin/categories');
			}

			else
			{
				Session::set_flash('error', e('Could not update categories #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$categories->name = $val->validated('name');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('categories', $categories, false);
		}

		$this->template->title = "カテゴリ";
		$this->template->content = View::forge('admin/categories/edit');

	}

	public function action_delete($id = null)
	{
		if ($categories = Model_Category::find($id))
		{
			$categories->delete();

			Session::set_flash('success', e('Deleted categories #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete categories #'.$id));
		}

		Response::redirect('admin/categories');

	}
}
