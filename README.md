# Nova Range Input Filter

[![Latest Version on Packagist](https://img.shields.io/packagist/v/digital-creative/nova-range-input-filter)](https://packagist.org/packages/digital-creative/nova-range-input-filter)
[![Total Downloads](https://img.shields.io/packagist/dt/digital-creative/nova-range-input-filter)](https://packagist.org/packages/digital-creative/nova-range-input-filter)
[![License](https://img.shields.io/packagist/l/digital-creative/nova-range-input-filter)](https://github.com/dcasia/nova-range-input-filter/blob/master/LICENSE)

A Laravel Nova range input filter.

<picture>
  <source media="(prefers-color-scheme: dark)" srcset="https://raw.githubusercontent.com/dcasia/resource-navigation-tab/nova-4-clean-up/screenshots/dark.png">
  <img alt="RangeInputFilter in Action" src="https://raw.githubusercontent.com/dcasia/resource-navigation-tab/nova-4-clean-up/screenshots/light/light.png">
</picture>

# Installation

You can install the package via composer:

```
composer require digital-creative/nova-range-input-filter
```

## Basic Usage

Create a filter as usual and extend the `DigitalCreative\RangeInputFilter\RangeInputFilter` class

```php
use DigitalCreative\RangeInputFilter\RangeInputFilter;

class MyFilter extends RangeInputFilter {

    public function apply(NovaRequest $request, $query, $value)
    {
        $from = data_get($value, 'from');
        $to = data_get($value, 'to');
    }

}
```

and use it as usual on the filters methods within your resource class:

```php
class ExampleNovaResource extends Resource {

    public function filters(NovaRequest $request): array
    {
        return [
            MyFilter::make()
        ];
    }

}
```

### Options

The available options are straight forward:

```php
class ExampleNovaResource extends Resource {

    public function filters(NovaRequest $request): array
    {
        return [
            MyFilter::make()
                ->dividerLabel('<>') // control the divider label in between the inputs
                ->inputType('week') // supports any html input type
                ->placeholder('From', 'To') // control the placeholder of the inputs
                ->fromAttributes([ 'min' => 0 ]) // some inputs type like number accepts more attributes like min/max/step etc..
                ->toAttributes([ 'max' => 100 ]) 
        ];
    }

}
```

Due to the size limitation of the native nova filter box some input types may not look as expected, for this reason you can
use [Nova Mega Filter](https://github.com/dcasia/nova-mega-filter) package instead which is a drop-in replacement for the native filter box.

```php

## License

The MIT License (MIT). Please see [License File](https://raw.githubusercontent.com/dcasia/nova-range-input-filter/master/LICENSE) for more information.
