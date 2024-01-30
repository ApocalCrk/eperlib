<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Notification;
use Illuminate\Support\Facades\Log;

class ViewUserServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        View::composer('user.*', function($view) {
            if(Route::getCurrentRoute()->getPrefix() == '/user' && Auth::check()) {
                $notifikasi = Notification::where('npm', Auth::user()->npm)->where('status', 'belum dibaca')->orderBy('created_at', 'desc')->get();
                $view->with('notifikasi', $notifikasi);
            }
        });
    }
}
