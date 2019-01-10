# Filterable Eloquent
Easily filter Laravel Eloquent queries by using URL query strings.

## Installation
Install the package via composer
```
composer require mohd-isa/eloquent-filters
```

## Usage
First you need to add Filterable trait and filters attribute to your model as the following:
```php
use Smartisan\Filters\Traits\Filterable;

class User extends Model
{
    use Filterable;
    
    protected $filters = App\Filters\UserFilter::class;
}
```

Then create UserFilter class and define your filters as public methods:
```php
use Smartisan\Filters\Filter;

class UserFilter extends Filter
{
    public function status($code)
    {
        return $this->builder->where('status', $code);
    }
}
```

Note that you are able to access the query builder instance of user by using ``$this->builder``.

Now in order to check for URL query strings and perform the corrosponding filter, you need to use ``User::filter($request)->get()``.

## Security
If you discover any security related issues, please email mohd.itcs@gmail.com instead of using the issue tracker.

## Credits
* [Mohammed Isa](https://github.com/mohd-isa)
* [All Contributors](https://github.com/mohd-isa/laravel-settings/graphs/contributors)

## License
The [MIT License (MIT)](https://github.com/mohd-isa/laravel-settings/blob/master/LICENSE.md). Please see License File for more information.
