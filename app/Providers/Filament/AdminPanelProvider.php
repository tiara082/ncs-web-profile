<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages\Dashboard;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\View\PanelsRenderHook;
use Filament\Widgets\AccountWidget;
use Filament\Widgets\FilamentInfoWidget;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Support\Facades\Blade;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            ->brandName('NCS Lab Admin')
            ->brandLogo(asset('img/logo.png'))
            ->brandLogoHeight('3rem')
            ->favicon(asset('img/logo.png'))
            ->font('Inter')
            ->darkMode(true)
            ->sidebarCollapsibleOnDesktop()
            ->navigationGroups([
                'Content Management',
                'Media & Gallery',
                'Team & Links',
                'System',
            ])
            ->colors([
                'primary' => [
                    50 => '#e6f5fd',
                    100 => '#b3e0f9',
                    200 => '#80cbf5',
                    300 => '#66bbf2',
                    400 => '#4daceb',
                    500 => '#339de4',
                    600 => '#2d8acc',
                    700 => '#2676b3',
                    800 => '#1f639a',
                    900 => '#195081',
                ],
                'secondary' => [
                    50 => '#e8ebf7',
                    100 => '#bfc7e8',
                    200 => '#96a3d9',
                    300 => '#6d7fca',
                    400 => '#445bbb',
                    500 => '#222f7f',
                    600 => '#1e2972',
                    700 => '#1a2365',
                    800 => '#161d58',
                    900 => '#12174b',
                ],
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\Filament\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\Filament\Pages')
            ->pages([
                Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\Filament\Widgets')
            ->widgets([
                \App\Filament\Widgets\StatsOverview::class,
                \App\Filament\Widgets\ContentChart::class,
                \App\Filament\Widgets\LatestContent::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ])
            ->renderHook(
                PanelsRenderHook::HEAD_END,
                fn (): string => view('filament.admin.styles')->render()
            );
    }
}
