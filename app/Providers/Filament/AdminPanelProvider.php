<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Filament\Navigation\NavigationItem;
use Filament\Navigation\NavigationGroup;
use Filament\Support\Facades\FilamentView;
use Illuminate\Support\Facades\Blade;

class AdminPanelProvider extends PanelProvider
{
    public function boot()
    {
        FilamentView::registerRenderHook(
            'panels::head.end',
            fn (): string => Blade::render('<style>
                ::-webkit-scrollbar { display: none; }
                html { scrollbar-width: none; -ms-overflow-style: none; }
                
                /* Shadow elegan ke kanan */
                .fi-sidebar {
                    box-shadow: 2px 0 8px rgba(0, 0, 0, 0.1);
                }
                
                /* Shadow dengan gradient */
                .fi-sidebar::after {
                    content: "";
                    position: absolute;
                    top: 0;
                    right: -10px;
                    width: 10px;
                    height: 100%;
                    background: linear-gradient(to right, rgba(0,0,0,0.1), transparent);
                    pointer-events: none;
                }
            </style>')
        );
    }

    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            // ->brandName('Admin Panel SIXSKA DPS')
            ->brandLogo(asset('images/Admin-Prof.png'))
            ->brandLogoHeight('1.7rem')
            ->favicon(asset('images/SMKN6.svg'))
            ->login()
            ->colors([
                'primary' => Color::Amber,
            ])
            // ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->resources([
                \App\Filament\Resources\ImageCarouselResource::class,
                \App\Filament\Resources\IconContentResource::class,
                \App\Filament\Resources\ProfileInfoResource::class,
                \App\Filament\Resources\ProfilSekolahResource::class,
                \App\Filament\Resources\StafResource::class,
                \App\Filament\Resources\KepalaSekolahResource::class,
                \App\Filament\Resources\FasilitasResource::class,
                \App\Filament\Resources\JurusanResource::class,
                \App\Filament\Resources\OsisResource::class,
                \App\Filament\Resources\EkstrakurikulerResource::class,
                \App\Filament\Resources\PrestasiResource::class,
                \App\Filament\Resources\BeritaResource::class,
                \App\Filament\Resources\PengumumanResource::class,
                \App\Filament\Resources\KontakResource::class,
                \App\Filament\Resources\KontakHeaderResource::class,
            ])
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,
                Widgets\FilamentInfoWidget::class,
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
            ]);
    }

    public function navigationItems(): array
    {
        return [
            NavigationGroup::make('Home Page')
                ->items([
                    NavigationItem::make('Image Carousel')
                        ->url(route('filament.admin.resources.image-carousels.index')),

                    NavigationItem::make('Konten Cards')
                        ->url(route('filament.admin.resources.icon-contents.index')),

                    NavigationItem::make('Profil Info')
                        ->url(route('filament.admin.resources.profile-infos.index')),

                    NavigationItem::make('Daftar Jurusan')
                        ->url(route('filament.admin.resources.jurusans.index')),
                    
                    NavigationItem::make('Profil Sekolah')
                        ->url(route('filament.admin.resources.profil-sekolahs.index')),
                    
                    NavigationItem::make('Staf')
                        ->url(route('filament.admin.resources.stafs.index')),
                    
                    NavigationItem::make('Kepala Sekolah')
                        ->url(route('filament.admin.resources.kepala-sekolahs.index')),
                    
                    NavigationItem::make('Berita dan Kegiatan')
                        ->url(route('filament.admin.resources.beritas.index')),
                    
                    NavigationItem::make('Pengumuman')
                        ->url(route('filament.admin.resources.pengumumans.index')),
                    
                    NavigationItem::make('Kontak Navbar')
                        ->url(route('filament.admin.resources.kontak-headers.index')),
                    
                    NavigationItem::make('Struktur Osis')
                        ->url(route('filament.admin.resources.osis.index')),
                    
                    NavigationItem::make('Ekstrakurikuler')
                        ->url(route('filament.admin.resources.ekstrakurikulers.index')),
                    
                    NavigationItem::make('Prestasi Siswa')
                        ->url(route('filament.admin.resources.prestasis.index')),
                    
                    NavigationItem::make('Kontak')
                        ->url(route('filament.admin.resources.kontaks.index')),
                    
                    NavigationItem::make('Fasilitas')
                        ->url(route('filament.admin.resources.fasilitas.index')),
                ]),
        ];
    }
}
