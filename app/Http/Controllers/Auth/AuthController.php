<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Repositories\UserRepository;
use App\Services\MaxValueDelay;
use App\Jobs\SendMail;

/**
 * Class AuthController
 * @package App\Http\Controllers\Auth
 */
class AuthController extends Controller
{

	use AuthenticatesAndRegistersUsers;

    /**
     * AuthController constructor.
     */
    public function __construct()
	{
		$this->middleware('guest', ['except' => 'getLogout']);
	}

	/**
	 * Handle a login request to the application.
	 *
	 * @param  App\Http\Requests\LoginRequest  $request
	 * @param  App\Services\MaxValueDelay  $maxValueDelay
	 * @param  Guard  $auth
	 * @return Response
	 */
	public function postLogin(
		LoginRequest $request, 
		MaxValueDelay $maxValueDelay,
		Guard $auth)
	{
		$logValue = $request->input('log');

		if($maxValueDelay->check($logValue))
		{
			return redirect('/login')
			->with('error', trans('front/login.maxattempt'));
		}

		$logAccess = filter_var($logValue, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

		$credentials = [
			$logAccess  => $logValue, 
			'password'  => $request->input('password')
		];

		if(!$auth->validate($credentials)) {
			$maxValueDelay->increment($logValue);	

			return redirect('/login')
				->with('error', trans('front/login.credentials'))
				->withInput($request->only('log'));
		}
			
		$user = $auth->getLastAttempted();

		if($user->confirmed) {
			$auth->login($user, $request->has('memory'));

			if($request->session()->has('user_id'))	{
				$request->session()->forget('user_id');
			}

			return redirect('/admin');
		}
		
		$request->session()->put('user_id', $user->id);	

		return redirect('/login')->with('error', trans('front/verify.again'));
	}


	/**
	 * Handle a registration request for the application.
	 *
	 * @param  App\Http\Requests\RegisterRequest  $request
	 * @param  App\Repositories\UserRepository $user_gestion
	 * @return Response
	 */
	public function postRegister(
		RegisterRequest $request,
		UserRepository $user_gestion)
	{
		$user = $user_gestion->store(
			$request->all(), 
			$confirmation_code = str_random(30)
		);

		$this->dispatch(new SendMail($user));

		return redirect('/')->with('ok', trans('front/verify.message'));
	}

	/**
	 * Handle a confirmation request.
	 *
	 * @param  App\Repositories\UserRepository $user_gestion
	 * @param  string  $confirmation_code
	 * @return Response
	 */
	public function getConfirm(
		UserRepository $user_gestion,
		$confirmation_code)
	{
		$user = $user_gestion->confirm($confirmation_code);

        return redirect('/')->with('ok', trans('front/verify.success'));
	}

	/**
	 * Handle a resend request.
	 *
	 * @param  App\Repositories\UserRepository $user_gestion
	 * @param  Illuminate\Http\Request $request
	 * @return Response
	 */
	public function getResend(
		UserRepository $user_gestion,
		Request $request)
	{
		if($request->session()->has('user_id'))	{
			$user = $user_gestion->getById($request->session()->get('user_id'));

			$this->dispatch(new SendMail($user));

			return redirect('/')->with('ok', trans('front/verify.resend'));
		}

		return redirect('/');        
	}
	
}
