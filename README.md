# Nova Slider Filter

[![Latest Version on Packagist](https://img.shields.io/packagist/v/digital-creative/nova-range-input-filter)](https://packagist.org/packages/digital-creative/nova-range-input-filter)
[![Total Downloads](https://img.shields.io/packagist/dt/digital-creative/nova-range-input-filter)](https://packagist.org/packages/digital-creative/nova-range-input-filter)
[![License](https://img.shields.io/packagist/l/digital-creative/nova-range-input-filter)](https://github.com/dcasia/nova-range-input-filter/blob/master/LICENSE)

A Laravel Nova range input filter.

![RangeInputFilter in Action](https://raw.githubusercontent.com/dcasia/nova-range-input-filter/master/screenshot.png)

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

    public function apply(Request $request, $query, $value)
    {
        // $value will always be [ "from" => ?, "to" => ? ]
    }
    
    public function options(Request $request)
    {
        return [
            'fromPlaceholder' => 0,
            'toPlaceholder' => 20,
            'dividerLabel' => 'to',
        ];
    }

}
```

and use it as usual on the filters methods within your resource class:

```php
class ExampleNovaResource extends Resource {

    public function filters(Request $request)
    {
        return [
            new MyFilter()
        ];
    }

}
```

## License

The MIT License (MIT). Please see [License File](https://raw.githubusercontent.com/dcasia/nova-range-input-filter/master/LICENSE) for more information.