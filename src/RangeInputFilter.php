<?php

declare(strict_types = 1);

namespace DigitalCreative\RangeInputFilter;

use Laravel\Nova\Filters\Filter;

abstract class RangeInputFilter extends Filter
{
    public $component = 'range-input-filter';

    public function placeholder(string $fromPlaceholder, string $toPlaceholder): self
    {
        return $this->withMeta([ 'fromPlaceholder' => $fromPlaceholder, 'toPlaceholder' => $toPlaceholder ]);
    }

    public function dividerLabel(string $dividerLabel): self
    {
        return $this->withMeta([ 'dividerLabel' => $dividerLabel ]);
    }

    public function inputType(string $inputType): self
    {
        return $this->withMeta([ 'inputType' => $inputType ]);
    }

    public function fromAttributes(array $attributes): self
    {
        return $this->withMeta([ 'fromAttributes' => $attributes ]);
    }

    public function toAttributes(array $attributes): self
    {
        return $this->withMeta([ 'toAttributes' => $attributes ]);
    }
}
