<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // 開発者のみ許可
        Gate::define('system-only', function ($user) {
            return ($user->role === 1);
        });
        // 管理者以上（管理者＆システム管理者）に許可
        Gate::define('admin-higher', function ($user) {
            return ($user->role > 0 && $user->role <= 5);
        });
        // 講師以上に許可
        Gate::define('teacher-higher', function ($user) {
            return ($user->role > 0 && $user->role <= 10);
        });
        // 生徒以上（つまり全権限）に許可
        Gate::define('student-higher', function ($user) {
            return ($user->role > 0 && $user->role <= 15);
        });

        // 作成者のみ許可
        Gate::define('owner', function ($user, $post) {
            return ($user->id === $post->user_id);
        });

        // 管理者以上または作成者に許可
        Gate::define('admin-higher-or-owner', function ($user, $post) {
            return  ($user->role > 0 && $user->role <= 5) || ($user->id === $post->user_id);
        });

    }
}
