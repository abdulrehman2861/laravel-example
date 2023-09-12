<?php

namespace App\Providers;

use Stripe\Stripe;

use App\Repositories\CarRepository;
use App\Repositories\CartRepository;
use App\Repositories\UserRepository;
use App\Repositories\YearRepository;
use App\Repositories\GlassRepository;
use App\Repositories\CommentRepository;
use App\Repositories\ExpenseRepository;
use App\Repositories\FeatureRepository;
use App\Repositories\ProductRepository;
use App\Repositories\SettingRepository;
use Illuminate\Support\ServiceProvider;
use App\Repositories\CategoryRepository;
use App\Repositories\CurrencyRepository;
use App\Repositories\CustomerRepository;
use App\Repositories\SupplierRepository;
use App\Repositories\BodyStyleRepository;
use App\Repositories\InstallerRepository;
use App\Repositories\WarehouseRepository;
use App\Repositories\AdjustmentRepository;
use App\Repositories\CarCompanyRepository;
use App\Repositories\SaleReturnRepository;
use App\Repositories\SubCategoryRepository;
use App\Repositories\CustomerTypeRepository;
use App\Repositories\PurchaseReturnRepository;
use App\Repositories\ExpenseCategoryRepository;
use App\Repositories\SaleTransactionRepository;
use App\Repositories\DatabaseManagementRepository;
use App\Repositories\InventoryManagementRepository;
use App\Repositories\PurchaseTransactionRepository;
use App\Repositories\ServiceInstallationRepository;
use App\Repositories\Interfaces\CarRepositoryInterface;
use App\Repositories\Interfaces\CartRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\Interfaces\YearRepositoryInterface;
use App\Repositories\Interfaces\GlassRepositoryInterface;
use App\Repositories\Interfaces\CommentRepositoryInterface;
use App\Repositories\Interfaces\ExpenseRepositoryInterface;
use App\Repositories\Interfaces\FeatureRepositoryInterface;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use App\Repositories\Interfaces\SettingRepositoryInterface;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Repositories\Interfaces\CurrencyRepositoryInterface;
use App\Repositories\Interfaces\CustomerRepositoryInterface;
use App\Repositories\Interfaces\SupplierRepositoryInterface;
use App\Repositories\Interfaces\BodyStyleRepositoryInterface;
use App\Repositories\Interfaces\InstallerRepositoryInterface;
use App\Repositories\Interfaces\WarehouseRepositoryInterface;
use App\Repositories\Interfaces\AdjustmentRepositoryInterface;
use App\Repositories\Interfaces\CarCompanyRepositoryInterface;
use App\Repositories\Interfaces\SaleReturnRepositoryInterface;
use App\Repositories\Interfaces\SubCategoryRepositoryInterface;
use App\Repositories\Interfaces\CustomerTypeRepositoryInterface;
use App\Repositories\Interfaces\PurchaseReturnRepositoryInterface;
use App\Repositories\Interfaces\ExpenseCategoryRepositoryInterface;
use App\Repositories\Interfaces\SaleTransactionRepositoryInterface;
use App\Repositories\Interfaces\DatabaseManagementRepositoryInterface;
use App\Repositories\Interfaces\InventoryManagementRepositoryInterface;
use App\Repositories\Interfaces\PurchaseTransactionRepositoryInterface;
use App\Repositories\Interfaces\ServiceInstallationRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
        $this->app->bind(SubCategoryRepositoryInterface::class, SubCategoryRepository::class);
        $this->app->bind(YearRepositoryInterface::class, YearRepository::class);
        $this->app->bind(WarehouseRepositoryInterface::class, WarehouseRepository::class);
        $this->app->bind(SupplierRepositoryInterface::class, SupplierRepository::class);
        $this->app->bind(CarCompanyRepositoryInterface::class, CarCompanyRepository::class);
        $this->app->bind(CarRepositoryInterface::class, CarRepository::class);
        $this->app->bind(BodyStyleRepositoryInterface::class, BodyStyleRepository::class);
        $this->app->bind(GlassRepositoryInterface::class, GlassRepository::class);
        $this->app->bind(CustomerRepositoryInterface::class, CustomerRepository::class);
        $this->app->bind(CustomerTypeRepositoryInterface::class, CustomerTypeRepository::class);
        $this->app->bind(SaleTransactionRepositoryInterface::class, SaleTransactionRepository::class);
        $this->app->bind(PurchaseTransactionRepositoryInterface::class, PurchaseTransactionRepository::class);
        $this->app->bind(InstallerRepositoryInterface::class, InstallerRepository::class);
        $this->app->bind(PurchaseReturnRepositoryInterface::class, PurchaseReturnRepository::class);
        $this->app->bind(SaleReturnRepositoryInterface::class, SaleReturnRepository::class);
        $this->app->bind(ExpenseRepositoryInterface::class, ExpenseRepository::class);
        $this->app->bind(ExpenseCategoryRepositoryInterface::class, ExpenseCategoryRepository::class);
        $this->app->bind(InventoryManagementRepositoryInterface::class, InventoryManagementRepository::class);
        $this->app->bind(DatabaseManagementRepositoryInterface::class, DatabaseManagementRepository::class);
        $this->app->bind(FeatureRepositoryInterface::class, FeatureRepository::class);
        $this->app->bind(SettingRepositoryInterface::class, SettingRepository::class);
        $this->app->bind(CartRepositoryInterface::class, CartRepository::class);
        $this->app->bind(AdjustmentRepositoryInterface::class, AdjustmentRepository::class);
        $this->app->bind(ServiceInstallationRepositoryInterface::class, ServiceInstallationRepository::class);
        $this->app->bind(CommentRepositoryInterface::class, CommentRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(CurrencyRepositoryInterface::class, CurrencyRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        try {
            $setting = app(SettingRepositoryInterface::class)->getSmtpSetting();
            if ($setting) {
                config([
                    'mail.driver' => $setting->mail_driver,
                    'mail.host' => $setting->mail_host,
                    'mail.port' => $setting->mail_port,
                    'mail.encryption' => $setting->mail_encryption,
                    'mail.username' => $setting->mail_username,
                    'mail.password' => $setting->mail_password,
                    'mail.from.address' => $setting->mail_from_address,
                    'mail.from.name' => $setting->mail_from_name,
                ]);
            }

            $ups_setting = app(SettingRepositoryInterface::class)->getUpsSetting();
            if ($ups_setting) {
                config([
                    'ups.account_number' => $ups_setting->account_number,
                    'ups.user' => $ups_setting->user_id,
                    'ups.password' => $ups_setting->password,
                    'ups.client_id' => $ups_setting->client_id,
                    'ups.secret' => $ups_setting->client_secret,
                    'ups.ship_from_addressLine' => $ups_setting->ship_from_addressLine,
                    'ups.ship_from_city' => $ups_setting->ship_from_city,
                    'ups.ship_from_state' => $ups_setting->ship_from_state,
                    'ups.ship_from_postalCode' => $ups_setting->ship_from_postalCode,
                    'ups.ship_from_countryCode' => $ups_setting->ship_from_countryCode,
                    'ups.is_live' => $ups_setting->is_live,
                    'ups.is_active' => $ups_setting->is_active,
                ]);
            }

            $fedex_setting = app(SettingRepositoryInterface::class)->getFedexSetting();
            if ($fedex_setting) {
                config([
                    'fedex.key' => $fedex_setting->key,
                    'fedex.password' => $fedex_setting->password,
                    'fedex.account_number' => $fedex_setting->account_number,
                    'fedex.meter_number' => $fedex_setting->meter_number,
                    'fedex.ship_from_addressLine' => $fedex_setting->ship_from_addressLine,
                    'fedex.ship_from_city' => $fedex_setting->ship_from_city,
                    'fedex.ship_from_state' => $fedex_setting->ship_from_state,
                    'fedex.ship_from_postalCode' => $fedex_setting->ship_from_postalCode,
                    'fedex.ship_from_countryCode' => $fedex_setting->ship_from_countryCode,
                    'fedex.is_live' => $fedex_setting->is_live,
                    'fedex.is_active' => $fedex_setting->is_active,
                ]);
            }

            $stripe_setting = app(SettingRepositoryInterface::class)->getStripeSetting();
            if ($stripe_setting) {
                config([
                    'stripe.key' => $stripe_setting->api_key,
                    'stripe.secret' => $stripe_setting->api_secret,
                    'stripe.is_live' => $stripe_setting->is_live,
                    'stripe.is_active' => $stripe_setting->is_active,
                ]);
                Stripe::setApiKey(config('stripe.secret'));
            }

            $paypal_setting = app(SettingRepositoryInterface::class)->getPaypalSetting();
            if ($paypal_setting) {
                config([
                    'paypal.client' => $paypal_setting->client_id,
                    'paypal.secret' => $paypal_setting->client_secret,
                    'paypal.is_live' => $paypal_setting->is_live,
                    'paypal.is_active' => $paypal_setting->is_active,
                ]);
            }
        } catch (\Throwable $e) {
        }
    }
}
