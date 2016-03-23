<?php

namespace App\Http\Controllers;

use App\Jobs\ChangeLocale;
use App\Repositories\ProductRepository;

class ProductController extends Controller
{
	/**
	 * The UsProductRepository instance.
	 *
	 * @var App\Repositories\ProductRepository
	 */
	protected $product;

	/**
	 * Create a new UserController instance.
	 *
	 * @param  App\Repositories\ProductRepository $product
	 * @return void
	 */
	public function __construct(ProductRepository $product)
	{
		$this->product = $product;
	}
	/**
	 * Display the home page.
	 *
	 * @return Response
	 */
	public function index()
	{
	    $counts = $this->product->count();
        var_dump($counts);die;
		return view('front.index');
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
