<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Artisan;

class DatabaseMigrationController extends Controller
{
    public function migrate()
    {
        try {
            Artisan::call('migrate');
            return 'Migration completed successfully.';
        } catch (\Exception $e) {
            return 'Migration failed: ' . $e->getMessage();
        }
    }

    public function scheduleRun()
    {
        try {
            Artisan::call('schedule:run');
            return 'Completed successfully.';
        } catch (\Exception $e) {
            return 'Failed: ' . $e->getMessage();
        }
    }

    public function getStoreAttractionApi()
    {
        try {
            Artisan::call('app:store-attraction');
            return 'Get and store Attractions completed successfully.';
        } catch (\Exception $e) {
            return 'Attractions failed: ' . $e->getMessage();
        }
    }

    public function swaggerGenerate(){
        try{
            Artisan::call('l5-swagger:generate');
            return 'Swagger Generate successfully.';
        } catch (\Exception $e) {
            return 'Swagger Generate failed: ' . $e->getMessage();
        }
    }
}
