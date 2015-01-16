<?php namespace Facades;

class DBFacade extends \SlimFacades\Facade {
  // return the name of the component from the DI container
  protected static function getFacadeAccessor() { return 'Database';}
}