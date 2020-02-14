<?php

namespace DigitalCreative\RangeInputFilter;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class RangeDateFilter extends RangeInputFilter
{

    /**
     * @var string
     */
    public $component = 'range-date-filter';

    /**
     * @var array
     */
    public $defaults = [
        'fromPlaceholder' => null,
        'toPlaceholder' => null,
        'dividerLabel' => 'to',
        'dateFormat' => 'Y/m/d',
        'enableTime' => false,
        'enableSeconds' => false,
        'fullWidth' => true
    ];

}
