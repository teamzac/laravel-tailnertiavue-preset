# Laravel preset for TailwindCSS/Inertia.js/Vue.js

[![Latest Version on Packagist](https://img.shields.io/packagist/v/teamzac/laravel-tailnertiavue-preset.svg?style=flat-square)](https://packagist.org/packages/teamzac/laravel-tailnertiavue-preset)

There is a quasi-official [Inertia.js preset available here](https://github.com/laravel-frontend-presets/inertiajs). We've taken several cues from the PingCRM demo, but have decided to structure some things a little differently. This preset is designed around the way that we architect our apps, so it may not work for you. If not, feel free to not use it.

## Installation

You can install the package via composer:

```bash
composer require teamzac/laravel-tailnertiavue-preset
```

## Usage

``` php
php artisan preset tailnertiavue 
```

An ```InertiaServiceProvider``` class will be included in your ```app\Providers``` directory, which is where we set up Inertia and add any shared data. If you'd like to use this, make sure to add it to the providers array in your ```config/app.php```.

Then run ```npm install``` and ```npm run dev``` to install dependencies and compile your assets.

There is currently a weird issue where you'll need to manually run ```npm install --save-dev @inertiajs/inertia @inertiajs/inertia-vue``` because if npm squaks about being unable to resolve the dependencies.

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email chad@zactax.com instead of using the issue tracker.

## Credits

- [Chad Janicek](https://github.com/teamzac)
- [Laravel Package Boilerplate](https://laravelpackageboilerplate.com)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.