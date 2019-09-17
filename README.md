## Nova Google Map Field

A [Laravel Nova](https://nova.laravel.com) field that uses Google Maps to update latitude/longitude model fields.

## Requirements

Package supports Nova 2.x (Laravel 5.8.x), Vue 2.6.x 

## Installation

Install the package in to a Laravel app that uses Nova via composer:

```bash
composer require jfeid/nova-google-maps
```
Publish the package configuration to your Laravel config directory:

```bash
php artisan vendor:publish --provider="Jfeid\NovaGoogleMaps\FieldServiceProvider" --tag="config"
```
You need to type your Google Map API key in the `.env` file as follows:

```bash
GMAPS_API_KEY=YOUR_API_KEY_HERE
```
Optionally, you can adjust the following configuration options in the `.env` file:

```bash
# Default latitude value when empty
GMAPS_DEFAULT_LATITUDE=
# Default longitude value when empty
GMAPS_DEFAULT_LONGITUDE=
# Default map zoom value
GMAPS_DEFAULT_ZOOM=9
```

## Usage
Add the following to a Nova resource:

```php

NovaGoogleMaps::make('Location')->setValue($this->location_lat, $this->location_lng)
```

The field requires to initialize its value using the `setValue` method by passing your model's lat/lng fields as parameters.

Also the field requires to know your names of the model's lat/lng fields in order to use them in POST requests.
By default, the field will use the base attribute ('location' in this example) suffixed with `_lat` and `_lng`.
For example:

```bash
// POST data
...
location_lat=40.2711861
location_lng=22.4755078
...
```  

If the default naming does not work for you, you can explicitly set the attribute names for lat/lng as follows:
```php
NovaGoogleMaps::make('Location')->setAttributes('my_latitude', 'my_longitude')
``` 

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.
