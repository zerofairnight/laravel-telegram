<?php

namespace Laravel\Telegram;

use Illuminate\Support\ServiceProvider;
use Laravel\Telegram\Console\Commands\TelegramWebhook;

class TelegramServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any telegram services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                TelegramWebhook::class,
            ]);
        }

        $this->publishes([
            __DIR__.'../config/telegram.php' => config_path('telegram.php'),
        ], 'config');

        // $this->mergeConfigFrom(__DIR__.'../config/telegram.php', 'telegram');
    }

    /**
     * Register any telegram services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerManager();
    }

    /**
     * Register the telegram manager.
     *
     * @return void
     */
    protected function registerManager()
    {
        $this->app->singleton('telegram', function ($app) {
            return new TelegramManager($app);
        });

        // $this->app->alias('telegram', TelegramManager::class);
    }
}
