<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
        //Mengatur Hak Akses Untuk User
        Gate::define('Apoteker-only', function ($user) {
            if ($user->level == 'Apoteker'){
                return true;
            }
            return false;
        });

        $this->registerPolicies();
        //Mengatur Hak Akses Untuk Obat
        Gate::define('Apoteker-only', function ($user) {
            if ($user->level == 'Apoteker'){
                return true;
            }
            return false;
        });

        $this->registerPolicies();
        //Mengatur Hak Akses Untuk Distributor
        Gate::define('Apoteker-only', function ($user) {
            if ($user->level == 'Apoteker'){
                return true;
            }
            return false;
        });

        $this->registerPolicies();
        //Mengatur Hak Akses Untuk Pembelian
        Gate::define('Gudang-only', function ($user) {
            if ($user->level == 'Gudang'){
                return true;
            }
            return false;
        });

        $this->registerPolicies();
        //Mengatur Hak Akses Untuk Detail Pembelian
        Gate::define('Gudang-only', function ($user) {
            if ($user->level == 'Gudang'){
                return true;
            }
            return false;
        });

        $this->registerPolicies();
        //Mengatur Hak Akses Untuk Penjualan
        Gate::define('Kasir-only', function ($user) {
            if ($user->level == 'Kasir'){
                return true;
            }
            return false;
        });

        $this->registerPolicies();
        //Mengatur Hak Akses Untuk Detail Penjualan
        Gate::define('Kasir-only', function ($user) {
            if ($user->level == 'Kasir'){
                return true;
            }
            return false;
        });
        
        $this->registerPolicies();
        //Mengatur Hak Akses Untuk generate laporan Penjualan
        Gate::define('Pemilik-only', function ($Laporan) {
            if ($Laporan->level == 'Pemilik'){
                return true;
            }
            return false;
        });

        $this->registerPolicies();
        //Mengatur Hak Akses Untuk generate laporan pembelian
        Gate::define('Pemilik-only', function ($generate_Laporan) {
            if ($generate_Laporan->level == 'Pemilik'){
                return true;
            }
            return false;
        });
    }
}
