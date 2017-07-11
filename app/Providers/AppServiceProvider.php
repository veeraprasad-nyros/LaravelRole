<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Auth;
use App\Team;
use Validator;
use App\User;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Validator::extend('team_name_validation', function($attribute, $value, $parameters, $validator) {

            $rule = Team::select('name')->where('user_id', '=', Auth::user()->id)->get();
        
             $count = 0;

            for($i = 0; $i < count($rule); $i++ )
            {
                if(strtoupper($rule[$i]->name) == strtoupper($value))
                {
                    $count++;
                }
            }
            if($count == 0){
                return true;
            }
            return false;
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
