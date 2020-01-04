<?php

namespace DigitalCreative\RangeInputFilter;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Laravel\Nova\Filters\Filter;

class RangeInputFilter extends Filter
{

    /**
     * @var string
     */
    public $component = 'range-input-filter';

    /**
     * @var array
     */
    public $defaults = [
        'fromPlaceholder' => null,
        'toPlaceholder' => null,
        'inputType' => 'number',
        'dividerLabel' => 'to',
        'fullWidth' => true
    ];

    /**
     * @param Request $request
     * @param Builder $query
     * @param mixed $value
     *
     * @return Builder
     */
    public function apply(Request $request, $query, $value)
    {
        return $query;
    }

    /**
     * Get the filter's available options.
     *
     * @param Request $request
     *
     * @return array
     */
    public function options(Request $request): array
    {
        return [];
    }

    /**
     * Prepare the filter for JSON serialization.
     *
     * @return array
     */
    public function jsonSerialize(): array
    {
        return array_merge(
            parent::jsonSerialize(), [ 'options' => array_merge($this->defaults, $this->options(resolve(Request::class))) ]
        );
    }

}
