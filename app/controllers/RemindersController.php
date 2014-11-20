<?php

class RemindersController extends Controller {

	/**
	 * Display the password reminder view.
	 *
	 * @return Response
	 */
	public function getRemind()
	{
		return View::make('users.remind');
	}

	/**
	 * Handle a POST request to remind a user of their password.
	 *
	 * @return Response
	 */
	public function postRemind()
	{
		$response = Password::remind(Input::only('email'), function($message){
			$message -> subject('Password reminder');
		});
		
		switch ($response)
		{
			case Password::INVALID_USER:
				return Redirect::back()->withInput()->with('pwResetError', Lang::get($response));

			case Password::REMINDER_SENT:
				return Redirect::back()->with('pwReseStatus', Lang::get($response));
		}
	}

	/**
	 * Display the password reset view for the given token.
	 *
	 * @param  string  $token
	 * @return Response
	 */
	public function getReset($token = null)
	{
		if (is_null($token)) App::abort(404);

		return View::make('users.reset', compact('token'))->with('pwResetToken', $token);
	}

	/**
	 * Handle a POST request to reset a user's password.
	 *
	 * @return Response
	 */
	public function postReset()
	{
		$credentials = Input::only(
			'email' , 'password', 'password_confirmation', 'token'
		);

		$response = Password::reset($credentials, function($user, $password)
		{
			$user->password = Hash::make($password);

			$user->save();
		});
		
		switch ($response)
		{
			case Password::INVALID_PASSWORD:
			case Password::INVALID_TOKEN:
			case Password::INVALID_USER:
				return Redirect::back()->with('pwResetError', Lang::get($response))->withInput();

			case Password::PASSWORD_RESET:
				return Redirect::to('/')->with('message', 'You have successfully reset your password');
		}
	}

}
