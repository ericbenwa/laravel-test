<?php

class AuthorsController extends BaseController {

	public function getIndex()
	{
		return View::make('authors.index')
			->with('title', 'Authors and Books')
			->with('authors', Author::orderBy('name')->get());
	}

	public function getView($id)
	{
		return View::make('authors.view')
			->with('title', 'Author View Page')
			->with('author', Author::find($id));
	}

	public function getNew()
	{
		return View::make('authors.new')
			->with('title', 'Add New Author');
	}

	public function postCreate()
	{
		$validation = Author::validate(Input::all());

		if($validation->fails()) {
			return Redirect::route('new_author')->withErrors($validation)->withInput();
		} else {
			Author::create(array(
				'name' => Input::get('name'),
				'bio' => Input::get('bio')
			));
			return Redirect::route('authors')
				->with('message', 'Author was created successfuly.');
		}
	}

	public function getEdit($id)
	{
		return View::make('authors.edit')
			->with('title', 'Edit Author')
			->with('author', Author::find($id));
	}

	public function putUpdate()
	{
		$id = Input::get('id');
		$validation = Author::validate(Input::all());

		if($validation->fails()) {
			return Redirect::route('edit_author', $id)->withErrors($validation)->withInput();
		} else {
			Author::find($id)->update(array(
				'name' => Input::get('name'),
				'bio' => Input::get('bio')
			));
			return Redirect::route('author', $id)
				->with('message', 'Author was updated successfuly.');
		}
	}

	public function deleteDestroy() {
		Author::find(Input::get('id'))->delete();
		return Redirect::route('authors')
			->with('message', 'Author was deleted successfully.');
	}

}