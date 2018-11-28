## Nova Google Map Field

A Nova field to get the coordinates by typing a street adddress or by placing a marker on map
## Installation

Install the package in to a Laravel app that uses Nova via composer:

```bash
composer require jfeid/nova-google-maps
```
Publish the package configuration to your Laravel config directory:

```bash
php artisan vendor:publish --provider="Jfeid\NovaGoogleMaps\FieldServiceProvider"
```
You need to type your Google Map API key in the `.env` file as follows:

```bash
GMAPS_API_KEY=YOUR_API_KEY_HERE
```
Optionally, you can adjust the following configuration options in the `.env` file:

```bash
# Default latitude value when empty
GMAPS_DEFAULT_LATITUDE=51.509865
# Default longitude value when empty
GMAPS_DEFAULT_LONGITUDE=-0.118092
# Default map zoom value when empty
GMAPS_DEFAULT_ZOOM=9
```

## Usage:
Add the following to a Nova resource:

```php

NovaGoogleMaps::make('Location')
```

## Support:
support@jfeid.gr

Or use the [Issues](https://github.com/jfeid/nova-google-maps/issues)

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.
