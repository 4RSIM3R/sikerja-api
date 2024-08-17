<?php

namespace App\Providers;

use App\Contract\ActivityContract;
use App\Contract\AnnouncementContract;
use App\Contract\AssignmentContract;
use App\Contract\AttendanceContract;
use App\Contract\AuthContract;
use App\Contract\BaseContract;
use App\Contract\SettingContract;
use App\Contract\UserContract;
use App\Service\AnnouncementService;
use App\Service\AttendanceService;
use App\Service\AuthService;
use App\Service\BaseService;
use App\Service\UserService;
use Illuminate\Support\ServiceProvider;

class ContractServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(AuthContract::class, AuthService::class);
        $this->app->bind(BaseContract::class, BaseService::class);
        $this->app->bind(ActivityContract::class, ActivityService::class);
        $this->app->bind(AssignmentContract::class, AssignmentService::class);
        $this->app->bind(UserContract::class, UserService::class);
        $this->app->bind(AnnouncementContract::class, AnnouncementService::class);
        $this->app->bind(SettingContract::class, SettingService::class);
        $this->app->bind(AttendanceContract::class, AttendanceService::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
