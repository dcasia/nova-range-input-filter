# Nova Range Input Filter

[![Latest Version on Packagist](https://img.shields.io/packagist/v/digital-creative/nova-range-input-filter)](https://packagist.org/packages/digital-creative/nova-range-input-filter)
[![Total Downloads](https://img.shields.io/packagist/dt/digital-creative/nova-range-input-filter)](https://packagist.org/packages/digital-creative/nova-range-input-filter)
[![License](https://img.shields.io/packagist/l/digital-creative/nova-range-input-filter)](https://github.com/dcasia/nova-range-input-filter/blob/master/LICENSE)

A Laravel Nova range input filter.

<picture>
  <source media="(prefers-color-scheme: dark)" srcset="https://raw.githubusercontent.com/dcasia/nova-range-input-filter/main/screenshots/dark.png">
  <img alt="RangeInputFilter in Action" src="https://raw.githubusercontent.com/dcasia/nova-range-input-filter/main/screenshots/light.png">
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

## ⭐️ Show Your Support

Please give a ⭐️ if this project helped you!

### Other Packages You Might Like

- [Nova Welcome Card](https://github.com/dcasia/nova-welcome-card) - A configurable version of the `Help card` that comes with Nova.
- [Icon Action Toolbar](https://github.com/dcasia/icon-action-toolbar) - Replaces the default boring action menu with an inline row of icon-based actions.
- [Expandable Table Row](https://github.com/dcasia/expandable-table-row) - Provides an easy way to append extra data to each row of your resource tables.
- [Collapsible Resource Manager](https://github.com/dcasia/collapsible-resource-manager) - Provides an easy way to order and group your resources on the sidebar.
- [Resource Navigation Tab](https://github.com/dcasia/resource-navigation-tab) - Organize your resource fields into tabs.
- [Resource Navigation Link](https://github.com/dcasia/resource-navigation-link) - Create links to internal or external resources.
- [Nova Mega Filter](https://github.com/dcasia/nova-mega-filter) - Display all your filters in a card instead of a tiny dropdown!
- [Nova Pill Filter](https://github.com/dcasia/nova-pill-filter) - A Laravel Nova filter that renders into clickable pills.
- [Nova Slider Filter](https://github.com/dcasia/nova-slider-filter) - A Laravel Nova filter for picking range between a min/max value.
- [Nova Range Input Filter](https://github.com/dcasia/nova-range-input-filter) - A Laravel Nova range input filter.
- [Nova FilePond](https://github.com/dcasia/nova-filepond) - A Nova field for uploading File, Image and Video using Filepond.
- [Custom Relationship Field](https://github.com/dcasia/custom-relationship-field) - Emulate HasMany relationship without having a real relationship set between resources.
- [Column Toggler](https://github.com/dcasia/column-toggler) - A Laravel Nova package that allows you to hide/show columns in the index view.
- [Batch Edit Toolbar](https://github.com/dcasia/batch-edit-toolbar) - Allows you to update a single column of a resource all at once directly from the index page.

## License

The MIT License (MIT). Please see [License File](https://raw.githubusercontent.com/dcasia/nova-range-input-filter/master/LICENSE) for more information.
