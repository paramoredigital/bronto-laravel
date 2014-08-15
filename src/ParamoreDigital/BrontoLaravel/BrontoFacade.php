<?php namespace ParamoreDigital\BrontoLaravel;

use Illuminate\Support\Facades\Facade;

class BrontoFacade extends Facade {

	protected static function getFacadeAccessor()
	{
		return 'bronto';
	}
}

/* End of BrontoFacade.php */ 