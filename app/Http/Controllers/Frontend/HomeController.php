<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Jobs\ChangeLocale;
use App\Repositories\BlogRepository;

class HomeController extends Controller {
	/**
	 * The UsProductRepository instance.
	 *
	 * @var App\Repositories\ProductRepository
	 */
	protected $blog;

	/**
	 * Create a new UserController instance.
	 *
	 * @param  App\Repositories\BlogRepository $product
	 * @return void
	 */
	public function __construct(BlogRepository $blog)
	{
		$this->blog = $blog;
	}
	/**
	 * Display the home page.
	 *
	 * @return Response
	 */
	public function index()
	{
		die('home');
	}

	/**
	 * Change language.
	 *
	 * @param  App\Jobs\ChangeLocaleCommand $changeLocaleCommand
	 * @return Response
	 */
	public function language(
		ChangeLocale $changeLocale)
	{
		$this->dispatch($changeLocale);

		return redirect()->back();
	}

}
