# LaraImp - CoinImp Implementation for Laravel

An easy [CoinImp](https://www.coinimp.com/invite/e6bd25d1-70cb-49b4-9a19-3aa23c9d1994) implementation for your Laravel 5.6+ application.

## CoinImp

CoinImp's [Documentation](https://www.coinimp.com/documentation).

You'll also need a CoinImp Site Key, which you can retrieve by [signing up](https://www.coinimp.com/invite/e6bd25d1-70cb-49b4-9a19-3aa23c9d1994) and creating an account for your website.

## Install

You can install the package via Composer:

```bash
composer require cryptoqo/laraimp
```

In Laravel 5.5 and up, the package will automatically register the service provider and facade

```php
// config/app.php

'providers' => [
    ...
    Zabanya\LaraImp\LaraImpServiceProvider::class,
],

'aliases' => [
    ...
    "LaraImp": Zabanya\LaraImp\LaraImpFacade::class,
],
```

*The facade is optional, but the rest of this guide assumes you're using the facade.*

Next, publish the config files:

```bash
php artisan vendor:publish --provider="Zabanya\LaraImp\LaraImpServiceProvider" --tag="config"
```

Optionally publish the view files. Recommended if you want to add extra implementations.

```bash
php artisan vendor:publish --provider="Zabanya\LaraImp\LaraImpServiceProvider" --tag="views"
```

## Usage

### Basic Example

First you'll need to include LaraImp's script. Put it before closing body tag.

```
{{-- layout.blade.php --}}
<html>
  {{-- ... --}}
  <body>
    {{-- ... --}}
    @include('laraimp::script')
  </body>
</html>
```

If you discover any security related issues, please email chaeril@gmail.com instead of using the issue tracker.

## Support me

You could support me by using my referral at:

[CoinImp](https://www.coinimp.com/invite/e6bd25d1-70cb-49b4-9a19-3aa23c9d1994)
[STEX](https://app.stex.com?ref=42774431)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
