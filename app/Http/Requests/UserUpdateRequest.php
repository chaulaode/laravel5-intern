<?php namespace App\Http\Requests;


use DebugBar\DebugBar;

class UserUpdateRequest extends Request {

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{

		$id = $this->id;
		return $rules = [
			'username' => 'required|max:30|alpha|unique:users,username,' . $id,
			'email' => 'required|email|unique:users,email,' . $id
		];
	}

}
