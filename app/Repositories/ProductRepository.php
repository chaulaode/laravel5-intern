<?php namespace App\Repositories;

use App\Models\Product;

class ProductRepository {

	/**
	 * The Product instance.
	 *
	 * @var App\Models\Product
	 */
	protected $product;

	/**
	 * Create a new ProductRepository instance.
	 *
	 * @param  App\Models\Product $product
	 * @return void
	 */
	public function __construct(Product $product)
	{
		$this->product = $product;
	}

	/**
	 * Get all products.
	 *
	 * @return Illuminate\Support\Collection
	 */
	public function all()
	{
		return $this->product->all();
	}

	/**
	 * Get all products.
	 *
	 * @return Illuminate\Support\Collection
	 */
	public function count()
	{
		return $this->product->count();
	}

	/**
	 * Update products.
	 *
	 * @param  array  $inputs
	 * @return void
	 */
	public function update($inputs)
	{
		foreach ($inputs as $key => $value)
		{
			$product = $this->product->where('slug', $key)->firstOrFail();

			$product->title = $value;
			
			$product->save();
		}
	}
}
