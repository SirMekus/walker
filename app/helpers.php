<?php
use Carbon\Carbon;

function carbon($date_time=null)
{
	return new Carbon($date_time);
}

function startOfWeek($date=null)
{
    return carbon($date)->startOfWeek();
}

function endOfWeek($date=null)
{
    return carbon($date)->endOfWeek();
}

function generateDaysInAWeek($date=null)
{
    $days = [];

    $startOfWeek = startOfWeek($date);
    //dd($startOfWeek);
    $days []= $startOfWeek->toDateString();

    for($i=1;$i<7;$i++)
    {
        $days []= carbon($startOfWeek)->addDays($i)->toDateString();
    }

    return $days;
}
?>