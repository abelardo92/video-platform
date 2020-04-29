<?php
namespace App\Helpers;

class FormatTime {

    public static function LongTimeFilter($date) {

        if ($date == null) {
            return "Sin fecha";
        }

        $start_date = $date;
        $since_start = $start_date->diff(new \DateTime(date("Y-m-d") . " " . date("H:i:s")));

        if ($since_start->y == 0) {
            if ($since_start->m == 0) {
                if ($since_start->d == 0) {
                    if ($since_start->h == 0) {
                        if ($since_start->i == 0) {
                            $result = $since_start->s . ($since_start->s == 1 ? ' second' : ' seconds');
                        } else {
                            $result = $since_start->i . ($since_start->i == 1 ? ' minute' : ' minutes');
                        }
                    } else {
                        $result = $since_start->h . ($since_start->h == 1 ? ' hour' : ' hours');
                    }
                } else {
                    $result = $since_start->d . ($since_start->d == 1 ? ' day' : ' days');
                }
            } else {
                $result = $since_start->m . ($since_start->m == 1 ? ' month' : ' months');
            }
        } else {
            $result = $since_start->y . ($since_start->y == 1 ? ' year' : ' years');
        }

        return "$result ago";
    }
}
