<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Casts\Attribute;

trait HasDates
{
    public function announced(): Attribute
    {
        return Attribute::make(
            get: function () {
                $date = date_create($this->created_at);
                $formattedDate = date_format($date, 'j F Y H m');

                $formattedDatePieces = explode(' ', $formattedDate);

                [$day, $month, $year, $hour, $minute] = $formattedDatePieces;

                return "$day ".__("months.$month")." $year, $hour:$minute";
            }
        );
    }
}
