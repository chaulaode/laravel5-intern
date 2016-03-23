<?php namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesCommands;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Validation\ValidatesRequests;

abstract class BaseAdminController extends Controller {

	use DispatchesCommands, ValidatesRequests;

}
