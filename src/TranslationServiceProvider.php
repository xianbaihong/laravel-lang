<?php

namespace Xianbaihong\LaravelLang;

use Illuminate\Translation\TranslationServiceProvider as LaravelTranslationServiceProvider;
use Xianbaihong\LaravelLang\Commands\Publish as PublishCommand;

class TranslationServiceProvider extends LaravelTranslationServiceProvider
{
    /**
     * @var bool
     */
    protected $inLumen = false;

    /**
     * Register the service provider.
     */
    public function register()
    {
        if ($this->app instanceof \Laravel\Lumen\Application) {
            $this->inLumen = true;

            $this->app->configure('app');

            unset($this->app->availableBindings['translator']);
        }

        parent::register();

        $this->registerCommands();
    }

    /**
     * Register the translation line loader.
     */
    protected function registerLoader()
    {
        $this->app->singleton('translation.loader', function ($app) {
            $paths = [
                base_path('vendor/laravel-lang/lang/locales/'),
            ];

            if ($this->inLumen) {
                $this->app['path.lang'] = base_path('vendor/laravel/lumen-framework/resources/lang');
                $paths[] = base_path('lang');
            }

            $loader = new FileLoader($app['files'], $app['path.lang'], $paths);

            if (\is_callable([$loader, 'addJsonPath'])) {
                $loader->addJsonPath(base_path('vendor/laravel-lang/lang/locales/'));
            }

            return $loader;
        });
    }

    /**
     * Register lang:publish command.
     */
    protected function registerCommands()
    {
        $this->commands(PublishCommand::class);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides(): array
    {
        return array_merge(parent::provides(), [PublishCommand::class]);
    }
}
