<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();


        // from me
        $this->mapDoctorRoutes();
        $this->mapAdminRoutes();
        $this->mapHrRoutes();
        $this->mapFrRoutes();
        $this->mapSecratryRoutes();
        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web','lang')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }





    protected function mapDoctorRoutes()
    {
        Route::middleware('web','IsStaff','IsDoctor','lang','maintance')
             ->namespace($this->namespace)
             ->group(base_path('routes/doctorroutes.php'));
    }


    protected function mapHrRoutes()
    {
        Route::middleware('web','IsStaff','IsAdmin','IsHR','lang','maintance')
             ->namespace($this->namespace)
             ->group(base_path('routes/hrroutes.php'));
    }


    protected function mapFrRoutes()
    {
        Route::middleware('web','IsStaff','IsAdmin','IsFR','lang','maintance')
             ->namespace($this->namespace)
             ->group(base_path('routes/frroutes.php'));
    }


    protected function mapAdminRoutes()
    {
        Route::middleware('web','IsStaff','IsAdmin','IsAdminstrator','lang')
             ->namespace($this->namespace)
             ->group(base_path('routes/adminroutes.php'));
    }
    protected function mapSecratryRoutes()
    {
        Route::middleware('web','IsStaff','IsSecratry','lang','maintance')
             ->namespace($this->namespace)
             ->group(base_path('routes/secratryroutes.php'));
    }


    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }
}
