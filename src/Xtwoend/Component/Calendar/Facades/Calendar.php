<?php 

namespace Xtwoend\Component\Calendar\Facades;

/**
 * Facades Calendar  
 */
use Illuminate\Support\Facades\Facade;

class Calendar extends Facade
{

    protected static function getFacadeAccessor()
    {
        return 'fullcalendar';
    }
}