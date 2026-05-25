<?php
use App\Models\Project;
use Illuminate\Support\Facades\Route;
use Livewire\Livewire;
use App\Models\SiteProfile;
use Illuminate\Support\Facades\Response;

/* NOTE: Do Not Remove
/ Livewire asset handling if using sub folder in domain
*/

Livewire::setUpdateRoute(function ($handle) {
    return Route::post(config('app.asset_prefix') . '/livewire/update', $handle);
});

Livewire::setScriptRoute(function ($handle) {
    return Route::get(config('app.asset_prefix') . '/livewire/livewire.js', $handle);
});
/*
/ END
*/

Route::get('/', function () {
    return view('welcome', [
        'siteProfile' => SiteProfile::first(),
        'projects' => Project::query()
            ->where('is_published', true)
            ->latest()
            ->get(),
    ]);
});
// Route::get('/', function () {
//     return view('welcome', [
//         'projects' => Project::query()
//             ->where('is_published', true)
//             ->latest()
//             ->get(),
//     ]);
// });
