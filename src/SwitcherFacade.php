<?php
namespace Etermed\Switcher;
use Illuminate\Support\Facades\Facade;

class MyPackageFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'switcher';
    }
}