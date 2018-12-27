<?php

namespace Laravel\Telegram;

use Illuminate\Support\ServiceProvider;

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
            $this->publishes([
                __DIR__ . '/../config/telegram.php' => config_path('telegram.php'),
            ], 'config');

            $this->commands([
                \Laravel\Telegram\Console\Commands\TelegramWebhook::class,
            ]);
        }
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
