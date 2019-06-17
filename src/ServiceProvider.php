<?php
declare(strict_types=1);
/**
 * This file is part of ModulposLaravel package.
 *
 * @author Anton Kartsev <anton@alarmcrm.ru>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Bigperson\ModulposLaravel;

use Bigperson\ModulposApiClient\Client;
use Bigperson\ModulposLaravel\Commands\Associate;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            $this->configPath() => config_path('modulpos.php'),
        ]);

        if ($this->app->runningInConsole()) {
            $this->commands([
                Associate::class
            ]);
        }
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            $this->configPath(), 'modulpos'
        );

        $this->app->bind(Client::class, function ($app) {
            return new Client(
                (string)config('modulpos.login'),
                (string)config('modulpos.password'),
                (bool)config('modulpos.test_mode')
            );
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            Client::class
        ];
    }

    private function configPath()
    {
        return __DIR__.'/../resources/config.php';
    }
}
