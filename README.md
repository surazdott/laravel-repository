# Laravel Repository Design Pattern

## Introduction
Laravel Repository Design Pattern package provides an overview of the design pattern used in a Laravel service and repository structure. The primary goal of this pattern is to separate concerns, improve code organization, and enhance maintainability.

## Repository Pattern Components
- Service Layer: This layer contains the business logic of your application. It abstracts the application's functionality from the controller, promoting better separation of concerns.

- Repository Layer: The repository acts as an interface to interact with the database. It abstracts the database operations from the service layer, making it easy to switch to a different data source without affecting the business logic.

## Get Started

> **Requires [PHP 8.1+](https://php.net/releases/)**

First, install package via the [Composer](https://getcomposer.org/) package manager:

```bash
composer require surazdott/laravel-repository
```
#### Generating Classes
You can also generate repository class indivisually or can be generated with options.

#### `Basic Commands`

```bash
// Generate repository class
php artisan make:repository UserRepository

// Generate repository with service
php artisan make:repository UserRepository --service

// Generate repository with interface
php artisan make:repository UserRepository --interface

// Generate repository with interface and service
php artisan make:repository UserRepository --all

// Generate service class
php artisan make:repository-service UserService

Generate interface class
php artisan make:repository-interface UserRepositoryInterface
```

To find help and options
```bash
php artisan make:repository --help
```

## Basic usages
As the software development industry continues to evolve, there has been a focus on improving code maintainability, leading to modifications in design patterns.

#### `Base Class`
- `use SurazDott\Repositories\BaseRepository;`
- `use SurazDott\Services\BaseService;`

Let's look at a simple example:

#### Repository Interface
Make your initial repository interface first.

```
php artsian make:repository-interface UserRepositoryInterface
```

`App\Repositories\Interfaces\UserRepositoryInterface.php`

```php
<?php

namespace App\Repositories\Interfaces;

use Illuminate\Database\Eloquent\Model;

interface UserRepositoryInterface
{
    /**
     * Find database record by id.
     *
     * @param  mixed  $id
     */
    public function findById(string $id): ?Model;
}
```

#### Repository Class
Use this command to create your first repository class.

```
php artisan make:repository UserRepository
```

`App\Repositories\UserRepository.php`

```php
<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use SurazDott\Repositories\BaseRepository;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    /**
     * Create new repository instance.
     */
    public function __construct(
        protected User $model
    ) {
    }

    /**
     * Find database record by id.
     */
    public function findById(string $id): ?Model
    {
        return $this->model->find($id);
    }
}
```

#### Service Class

Use the following command to create the service class after the interface and repository.

```
php artisan make:repository-service UserService
```

`App\Service\UserService.php`

```php
<?php

namespace App\Services;

use App\Repositories\UserRepository;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use SurazDott\Services\BaseService;

class UserService extends BaseService
{
    /**
     * Create new service instance.
     */
    public function __construct(
        protected UserRepository $repository
    ) {
    }

    /**
     * Find database record by id.
     *
     * @param  string  $id
     */
    public function findById($id): ?Model
    {
        return $this->repository->findById($id);
    }
}
```

#### Controller Class

Now create a Laravel controller file and use the service class as below.

```
php artsian make:controller UserController
```

`App\Http\Controllers\UserController.php`

```php
<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\View\View;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct(
        private UserService $users
    ) {
    }

    /**
     * Display a listing of the resource.
     */
    public function edit(Request $request): View
    {
        $data['user'] = $this->users->findById($id);

        return view('admin.users.edit', $data);
    }
}

```
#### Eloquent Query Builder

If you want to run eloquent queries, you can call the `query()` function to get an eloquent builder. Example: ` $this->users->query()->latest()->get();`

```php
<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\View\View;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct(
        private UserService $users
    ) {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {   
        // get all users
        $data['users'] = $this->users->query()->latest()->get();

        // get active users
        $data['activeUsers'] = $this->users->query()->where('status', true)->get();

        return view('admin.users.index', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request): View
    {
        $data['user'] = $this->users->findById($id);

        return view('admin.users.edit', $data);
    }
}

```

## Contributing
If you find any issues or have suggestions for improvements, feel free to open an issue or create a pull request. Contributions are welcome!

## License
This package is open-sourced software licensed under the [MIT license](https://opensource.org/license/mit/).