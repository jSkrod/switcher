<?php
namespace Etermed\Switcher;
use Illuminate\Support\Facades\Facade;

class SwitcherFacade extends Facade
{
	protected static function getFacadeAccessor()
	{
		return 'switcher';
	}
}