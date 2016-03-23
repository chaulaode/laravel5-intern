<?php namespace App\Models;

use Jenssegers\Mongodb\Model as Moloquent;

class Product extends Moloquent  {

	protected $connection = 'mongodb';

	protected $collection = 'clublogs';

}
