# Flexible Width Fieldtype

<!-- statamic:hide -->
![Statamic 4.0+](https://img.shields.io/badge/Statamic-4.0+-FF269E?style=for-the-badge&link=https://statamic.com)
<!-- /statamic:hide -->

The Flexible Width Fieldtype for Statamic allows easy control of any content area or media element width. It offers more flexibility than the default "Width" Fieldtype, supporting any key-value pairs.

<img src="images/fieldtype-features.gif" />

## How to Install

Run the following command from your project root:

``` bash
composer require o1y/statamic-flexible-width
```

## How to Use

To use the Flexible Width Fieldtype, navigate to the "Buttons & Controls" section in the Blueprint configuration. Add key-value pairs as needed.

<img src="images/options.gif" />

Alternatively, edit the Blueprint directly in your `.yaml` file:

```yaml
-
  handle: column_width
  field:
    options:
      col-1: 1/3
      col-6: 2/3
      col-12: 3/3
    type: flexible_width
    display: 'Column Width'
    icon: width
    listable: hidden
    instructions_position: above
    visibility: visible
    hide_display: false
    width: 25
```

Use the augmented value in your template:

```html
<div class="{{ column_width }}">
  <p>My column</p>
</div>
```

## Buy me a coffee

I'm happy to share this addon with the community for free. If you'd like to support my work, please [sponsor me on GitHub](https://github.com/sponsors/o1y/).
## Credits

This addon is an extension of the [Width Fieldtype for Statamic](https://statamic.com/). 
