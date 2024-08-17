<?php

use Spatie\MediaLibrary\MediaLibraryServiceProvider;
use Spatie\Permission\PermissionServiceProvider;

return [
    App\Providers\AppServiceProvider::class,
    App\Providers\ContractServiceProvider::class,
    PermissionServiceProvider::class,
    MediaLibraryServiceProvider::class,
];
