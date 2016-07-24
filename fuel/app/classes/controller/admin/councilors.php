<?php
class Controller_Admin_Councilors extends Controller_Admin
{

	public function action_index()
	{
		$data['councilors'] = Model_Councilor::find('all');
		$this->template->title = "議員メンバー";
		$this->template->content = View::forge('admin/councilors/index', $data);

	}

	public function action_view($id = null)
	{
		$data['councilors'] = Model_Councilor::find($id);

		$this->template->title = "議員メンバー";
		$this->template->content = View::forge('admin/councilors/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Councilor::validate('create');

			if ($val->run())
			{
				$councilors = Model_Councilor::forge(array(
					'location' => Input::post('location'),
					'name' => Input::post('name'),
					'nickname' => Input::post('nickname'),
					'icon_url' => Input::post('icon_url'),
				));

				if ($councilors and $councilors->save())
				{
					Session::set_flash('success', e('Added councilors #'.$councilors->id.'.'));

					Response::redirect('admin/councilors');
				}

				else
				{
					Session::set_flash('error', e('Could not save councilors.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Councilors";
		$this->template->content = View::forge('admin/councilors/create');

	}

	public function action_edit($id = null)
	{
		$councilors = Model_Councilor::find($id);
		$val = Model_Councilor::validate('edit');

		if ($val->run())
		{
			$councilors->location = Input::post('location');
			$councilors->name = Input::post('name');
			$councilors->nickname = Input::post('nickname');
			$councilors->icon_url = Input::post('icon_url');

			if ($councilors->save())
			{
				Session::set_flash('success', e('Updated councilors #' . $id));

				Response::redirect('admin/councilors');
			}

			else
			{
				Session::set_flash('error', e('Could not update councilors #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$councilors->location = $val->validated('location');
				$councilors->name = $val->validated('name');
				$councilors->nickname = $val->validated('nickname');
				$councilors->icon_url = $val->validated('icon_url');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('councilors', $councilors, false);
		}

		$this->template->title = "Councilors";
		$this->template->content = View::forge('admin/councilors/edit');

	}

	public function action_delete($id = null)
	{
		if ($councilors = Model_Councilor::find($id))
		{
			$councilors->delete();

			Session::set_flash('success', e('Deleted councilors #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete councilors #'.$id));
		}

		Response::redirect('admin/councilors');

	}

}
