<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Policies\FunboardPolicy;
use App\Models\Funboard;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Funboard::class => FunboardPolicy::class,
    ];
    public function boot(): void
    {    
    }
}