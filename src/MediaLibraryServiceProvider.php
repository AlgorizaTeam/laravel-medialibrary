<?php

namespace AlgorizaTeam\MediaLibrary;

use AlgorizaTeam\MediaLibrary\Conversions\Commands\RegenerateCommand;
use AlgorizaTeam\MediaLibrary\MediaCollections\Commands\CleanCommand;
use AlgorizaTeam\MediaLibrary\MediaCollections\Commands\ClearCommand;
use AlgorizaTeam\MediaLibrary\MediaCollections\Filesystem;
use AlgorizaTeam\MediaLibrary\MediaCollections\MediaRepository;
use AlgorizaTeam\MediaLibrary\MediaCollections\Models\Observers\MediaObserver;
use AlgorizaTeam\MediaLibrary\ResponsiveImages\TinyPlaceholderGenerator\TinyPlaceholderGenerator;
use AlgorizaTeam\MediaLibrary\ResponsiveImages\WidthCalculator\WidthCalculator;
use Illuminate\Support\ServiceProvider;

class MediaLibraryServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->registerPublishables();

        $mediaClass = config('media-library.media_model');

        $mediaClass::observe(new MediaObserver());

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'media-library');
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/media-library.php', 'media-library');

        $this->app->scoped(MediaRepository::class, function () {
            $mediaClass = config('media-library.media_model');

            return new MediaRepository(new $mediaClass());
        });

        $this->registerCommands();
    }

    protected function registerPublishables(): void
    {
        $this->publishes([
            __DIR__.'/../config/media-library.php' => config_path('media-library.php'),
        ], 'config');

        if (! class_exists('CreateMediaTable')) {
            $this->publishes([
                __DIR__.'/../database/migrations/create_media_table.php.stub' => database_path('migrations/'.date('Y_m_d_His', time()).'_create_media_table.php'),
            ], 'migrations');
        }

        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/media-library'),
        ], 'views');
    }

    protected function registerCommands(): void
    {
        $this->app->bind(Filesystem::class, Filesystem::class);
        $this->app->bind(WidthCalculator::class, config('media-library.responsive_images.width_calculator'));
        $this->app->bind(TinyPlaceholderGenerator::class, config('media-library.responsive_images.tiny_placeholder_generator'));

        $this->app->bind('command.media-library:regenerate', RegenerateCommand::class);
        $this->app->bind('command.media-library:clear', ClearCommand::class);
        $this->app->bind('command.media-library:clean', CleanCommand::class);

        $this->commands([
            'command.media-library:regenerate',
            'command.media-library:clear',
            'command.media-library:clean',
        ]);
    }
}
