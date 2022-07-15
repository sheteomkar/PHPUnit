<?php

namespace drmonkeyninja;

use DateTime;

// class MyFunction
// {
function getNewDate($term, $old_date)
{
// An array having last 3 days which vary month to month
    $exception_dates_array = array(29, 30, 31);
// old date day
    $old_day = date("d", strtotime($old_date));
// Calculated approximated data for new auto renew value
    $appr_date = date("Y-m-d", strtotime("+" . $term, strtotime($old_date)));
// Get the new date year, month & day
    $new_date_day = date("d", strtotime($appr_date));
    $new_date_month = date("m", strtotime($appr_date));
    $new_date_year = date("Y", strtotime($appr_date));
// Check old date day is exists in array AND New date day is not exists in array AND Approximated dates day should not be next month date
    if (in_array($old_day, $exception_dates_array) && !in_array($new_date_day, $exception_dates_array) && $new_date_day >= "1") {
// Get last month
        $appr_date = date('Y-m-d', strtotime($appr_date . " - 1 Month"));
// Get the new date year & month
        $new_date_year = date("Y", strtotime($appr_date));
        $new_date_month = date("m", strtotime($appr_date));
// Get the last month days
        $new_date_day = cal_days_in_month(CAL_GREGORIAN, $new_date_month, $new_date_year);
    }

// Generate new date
    $new_date = DateTime::createFromFormat('Y-m-d', $old_date);
    $new_date->setDate($new_date_year, $new_date_month, $new_date_day);
    return $new_date->format('Y-m-d 00:00:00');
}
// }

// $n = new MyFunction();
// $term = "1 Month";
// $old_date = "2022-01-31";
// echo $n->getNewDate($term, $old_date);
