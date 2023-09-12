<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions =  [
            "show_total_stats",
            "show_notifications",
            "show_month_overview",
            "show_weekly_sales_purchases",
            "show_monthly_cashflow",
            "access_user_management",
            "edit_own_profile",
            "access_products",
            "show_products",
            "create_products",
            "edit_products",
            "delete_products",
            "access_product_categories",
            "print_barcodes",
            "access_adjustments",
            "create_adjustments",
            "show_adjustments",
            "edit_adjustments",
            "delete_adjustments",
            "access_quotations",
            "create_quotations",
            "show_quotations",
            "edit_quotations",
            "delete_quotations",
            "send_quotation_mails",
            "create_quotation_sales",
            "access_expenses",
            "create_expenses",
            "edit_expenses",
            "delete_expenses",
            "access_expense_categories",
            "access_customers",
            "create_customers",
            "show_customers",
            "edit_customers",
            "delete_customers",
            "access_suppliers",
            "create_suppliers",
            "show_suppliers",
            "edit_suppliers",
            "access_sales",
            "create_sales",
            "edit_sales",
            "delete_sales",
            "create_pos_sales",
            "access_sale_payments",
            "access_sale_returns",
            "create_sale_returns",
            "show_sale_returns",
            "edit_sale_returns",
            "delete_sale_returns",
            "access_sale_return_payments",
            "access_purchases",
            "create_purchases",
            "show_purchases",
            "edit_purchases",
            "delete_purchases",
            "access_purchase_payments",
            "access_purchase_returns",
            "create_purchase_returns",
            "show_purchase_returns",
            "edit_purchase_returns",
            "delete_purchase_returns",
            "access_purchase_return_payments",
            "access_currencies",
            "create_currencies",
            "edit_currencies",
            "delete_currencies",
            "access_reports",
            "access_settings"
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        Role::create(['name' => 'Super_Admin']);

        $user = User::where('email','admin@autoglass.com')->first();

        if ($user) {
            $user->assignRole('Super_Admin');
        }
    }
}
