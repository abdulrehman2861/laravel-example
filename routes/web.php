<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Website\CartController;
use App\Http\Controllers\Dashboard\CarController;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\YearController;
use App\Http\Controllers\Dashboard\AdminController;
use App\Http\Controllers\Dashboard\GlassController;
use App\Http\Controllers\Website\PaymentController;
use App\Http\Controllers\Dashboard\ReportController;
use App\Http\Controllers\Dashboard\ExpenseController;
use App\Http\Controllers\Dashboard\FeatureController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Dashboard\SettingController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\CurrencyController;
use App\Http\Controllers\Dashboard\CustomerController;
use App\Http\Controllers\Dashboard\SupplierController;
use App\Http\Controllers\Dashboard\BodyStyleController;
use App\Http\Controllers\Dashboard\InstallerController;
use App\Http\Controllers\Dashboard\QuotationController;
use App\Http\Controllers\Dashboard\WarehouseController;
use App\Http\Controllers\Dashboard\WorkorderController;
use App\Http\Controllers\Dashboard\AdjustmentController;
use App\Http\Controllers\Dashboard\CarCompanyController;
use App\Http\Controllers\Dashboard\PermissionController;
use App\Http\Controllers\Dashboard\SaleReturnController;
use App\Http\Controllers\Dashboard\SubCategoryController;
use App\Http\Controllers\Dashboard\CustomerTypeController;
use App\Http\Controllers\Dashboard\PurchaseReturnController;
use App\Http\Controllers\Dashboard\ExpenseCategoryController;
use App\Http\Controllers\Dashboard\SaleTransactionController;
use App\Http\Controllers\Website\ServiceInstallationController;
use App\Http\Controllers\Dashboard\DatabaseManagementController;
use App\Http\Controllers\Dashboard\InventoryManagementController;
use App\Http\Controllers\Dashboard\PurchaseTransactionController;
use App\Http\Controllers\FedExController;
use App\Http\Controllers\UpsController;
use App\Http\Controllers\Website\ProductController as WebsiteProductController;
use App\Http\Controllers\Website\CustomerController as websiteCustomerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index-2');
})->name('index');

// Route::get('index-2', function () {
//     return view('index-2');
// })->name('index-2');

// Route::get('index-3', function () {
//     return view('index-3');
// })->name('index-3');




// -------------shop---------------

Route::get('/shop', function () {
    return view('shop');
})->name('shop');

// Route::get('/product', function () {
//    return view('product');
//})->name('product'); -


Route::get('/myaccount', function () {
    return view('myaccount');
})->name('myaccount');



// Shopping Cart routes
Route::get('/shopingcart', [CartController::class, 'index'])->name('shopingCart');
Route::get('/add-to-cart/{item_id}/{fitting_id}', [CartController::class, 'addToCart'])->name('shopingCart.addToCart');
Route::post('/update-cart', [CartController::class, 'updateCart'])->name('shopingCart.updateCart');
Route::get('/delete-cart/{item_id}', [CartController::class, 'deleteProduct'])->name('shopingCart.deleteCart');

Route::get('/get-product-glass-type', [PaymentController::class, 'getGlassType'])->name('product.glassType');

// Quick product view
Route::get('/product/quick-view/{id}', [WebsiteProductController::class, 'quickView'])->name('quick.view');

Route::get('/blog', function () {
    return view('blog');
})->name('blog');


Route::get('/bloggrid', function () {
    return view('bloggrid');
})->name('bloggrid');


Route::get('/blog-single', function () {
    return view('blog-single');
})->name('blog-single');

Route::get('/services', function () {
    return view('services');
})->name('services');

Route::get('/services-single', function () {
    return view('services-single');
})->name('services-single');

Route::get('/payment', [PaymentController::class, 'create'])->name('payment.create');
Route::post('/payment/post', [PaymentController::class, 'store'])->name('payment.store');

// Services routes
Route::get('/vehicle', [ServiceInstallationController::class, 'create'])->name('vehicle');
Route::get('/vehicle/get-model', [ServiceInstallationController::class, 'getModel'])->name('vehicle.getModel');
Route::get('/vehicle/get-body-style', [ServiceInstallationController::class, 'getBodyStyle'])->name('vehicle.getBodyStyle');
Route::get('/vehicle/get-glass', [ServiceInstallationController::class, 'getGlasses'])->name('vehicle.getGlasses');
Route::get('/vehicle/get-feature', [ServiceInstallationController::class, 'getFeature'])->name('vehicle.getFeature');
Route::get('/vehicle/add-to-cart', [ServiceInstallationController::class, 'addToCart'])->name('vehicle.addToCart');
Route::post('/vehicle', [ServiceInstallationController::class, 'store'])->name('vehicle.store');

Route::post('/vehicle/payment', [PaymentController::class, 'paymentByStripe'])->name('vehicle.payment.stripe');


Route::get('/selectglass', function () {
    return view('selectglass');
})->name('selectglass');

Route::get('/quote', function () {
    return view('quote');
})->name('quote');

Route::get('/contectus', function () {
    return view('contectus');
})->name('contectus');

Route::get('/aboutus', function () {
    return view('aboutus');
})->name('aboutus');



Route::get('/availability', function () {
    return view('availability');
})->name('availability');


Route::get('/chat', function () {
    return view('new-chat');
})->name('chat');


Route::get('/thanks-order', function () {
    return view('thanks-order');
})->name('thanks-order');


Route::get('/blank', function () {
    return view('dashboard.test');
})->name('blank');



// Route::get('/calendar', function () {
//     return view('dashboard\calender\calendar');
// })->name('calendar');


Route::get('/dashboardsearch', function () {
    return view('dashboard.search.search');
})->name('dashboardsearch');

Route::get('/dashboardlogin', function () {
    return view('dashboard\login\dashboard-login');
})->name('dashboardlogin');

Route::get('/dashboardregister', function () {
    return view('dashboard\login\dashboard-signup');
})->name('dashboardregister');

Route::get('/dashboard-forget-password', function () {
    return view('dashboard\login\dashboard-forgetpass');
})->name('dashboard-forget-password');

Route::get('/all-items', function () {
    return view('dashboard\all-items\all-items');
})->name('all-items');

Route::get('/create', function () {
    return view('dashboard\suppliers\create');
})->name('create');


// Route::get('/dashboardsubcategories', function () {
//     return view('dashboard.all-parmeter.sub-categories');
// })->name('dashboardsubcategories');


// Route::get('/dashboardcategories', function () {
//     return view('dashboard.all-parmeter.catagories');
// })->name('dashboardcategories');

// Route::get('/dashboardyears', function () {
//     return view('dashboard\all-parmeter\years');
// })->name('dashboardyears');

// Route::get('/dashboardmake', function () {
//     return view('dashboard\all-parmeter\make');
// })->name('dashboardmake');

// Route::get('/dashboardfeature', function () {
//     return view('dashboard\all-parmeter\feature');
// })->name('dashboardfeature');

// Route::get('/dashboardmodel', function () {
//     return view('dashboard\all-parmeter\model');
// })->name('dashboardmodel');

// Route::get('/dashboardglasses', function () {
//     return view('dashboard\all-parmeter\glasess');
// })->name('dashboardglasses');

// Route::get('/dashboardbody-style', function () {
//     return view('dashboard\all-parmeter\body-style');
// })->name('dashboardbody-style');



Route::get('/create-adjustment', function () {
    return view('dashboard\adjustment\create-adjustment');
})->name('create-adjustment');



Route::get('/all-adjustment', function () {
    return view('dashboard\adjustment\all-adjustment');
})->name('all-adjustment');



// Route::get('/create-suppliers', function () {
//     return view('dashboard.create-suppliers.add-suppliers');
// })->name('create-suppliers');

// Route::get('/suppliers', function () {
//     return view('dashboard.create-suppliers.suppliers');
// })->name('suppliers');

// Route::get('/suppliers-details', function () {
//     return view('dashboard.create-suppliers.suppliers-details');
// })->name('suppliers-details');


// Route::get('/update-suppliers', function () {
//     return view('dashboard.create-suppliers.update-suppliers');
// })->name('update-suppliers');

Route::get('/dashboard1/export-db', [DatabaseManagementController::class, 'export'])->name('dashboard1');

// Route::get('/empty/{column}/ids', [InventoryManagementController::class, 'clear'])->name('inventory.clear');

// Shipment UPS Address Validation
Route::post('/ups/address/validation', [UpsController::class, 'validateAddress'])->name('shipment.ups.validateAddress');

// Admin Routes

Route::middleware(['guest'])
        ->prefix('admin')
        ->as('admin.')
        ->group(function () {

                Route::get('/login', [AdminController::class, 'index'])->name('login');
                Route::post('/login', [AdminController::class, 'loginProcess'])->name('login.process');

            });

Route::middleware(['guest'])
        ->prefix('customer')
        ->as('customer.')
        ->group(function () {

                Route::get('/login', [websiteCustomerController::class, 'index'])->name('login');
                Route::post('/login', [websiteCustomerController::class, 'loginProcess'])->name('login.process');
                Route::post('/register', [websiteCustomerController::class, 'register'])->name('register');

            });

            Route::get('/loginregister', function () {
                return view('loginregister');
            })->name('login');


            //Customer Route


            // Route::View('/profile/user','profile.profile');
            // Route::View('/profile/home','profile.home');
            // Route::View('/profile/allwork','profile.all-work.all-work');
            // Route::View('/profile/allwork/details','profile.all-work.details');
            // Route::View('/profile/signup','profile.login.profile-signup');
            // Route::View('/profile/login','profile.login.profile-login');
            // Route::View('/profile/forgetpassword','profile.login.profile-forgetpass');



Route:: middleware(['auth'])
    ->prefix('customer/dashboard')
    ->as('customer.dashboard.')
    ->group(function () {

                //Customer Route
                Route::get('/logout', [websiteCustomerController::class, 'logout'])->name('logout');

                Route::get('/services', [websiteCustomerController::class, 'workorders'])->name('home');
                Route::get('/services/show/{id}', [websiteCustomerController::class, 'showWorkorder'])->name('workorders.show');

            });



// Dashboard Routes



Route:: middleware(['auth','is.admin'])
    ->prefix('dashboard')
    ->as('dashboard.')
    ->group(function () {
        // usermanagment
        // Route::View('/adduser','dashboard.usermanagement.createuser');
        // Route::View('/allusers','dashboard.usermanagement.userslist');
        // Route::View('/addrole','dashboard.usermanagement.createrole');
        //Route::View('/roles','dashboard.usermanagement.raplist');

        // All Work

        // Route::View('/allwork','dashboard.all-work.all-work');
        // Route::View('/allwork/details','dashboard.all-work.details');


        // Settings + Currencies + System Settings

        // Route::View('/currencies/create','dashboard.settings.currencies-create')->middleware('can:create_currencies');
        // Route::View('/currencies','dashboard.settings.currencies-index')->middleware('can:access_currencies');
        // Route::View('/settings','dashboard.settings.system-settings')->middleware('can:access_settings');



        // Maintenance + Inventory + Db Management

        //Route::View('/inventory/management','dashboard.maintenance.inventory-management');
        Route::View('/database/management','dashboard.maintenance.database-management');

        // All Reports (System Statistics, Item Sold, Items Multi Report, Profit / Loss Report, Payments Report, Sales Report, Purchases Report, Sales Return Report, Purchases Return Report)

        // Route::View('/system-statistics','dashboard.reports.system-statistics')->middleware('can:access_reports');
        //Route::View('/item-sold','dashboard.reports.item-sold')->middleware('can:access_reports');
        // Route::View('/items-multi-report','dashboard.reports.items-multi-report')->middleware('can:access_reports');
        // Route::View('/profit-loss-report','dashboard.reports.profit-loss-report')->middleware('can:access_reports');
        Route::View('/payments-report','dashboard.reports.payments-report')->middleware('can:access_reports');
        Route::View('/sales-report','dashboard.reports.sales-report')->middleware('can:access_reports');
        Route::View('/purchases-report','dashboard.reports.purchases-report')->middleware('can:access_reports');
        Route::View('/sales-return-report','dashboard.reports.sales-return-report')->middleware('can:access_reports');
        Route::View('/purchases-return-report','dashboard.reports.purchases-return-report')->middleware('can:access_reports');

        Route::get('/system-statistics', [ReportController::class, 'systemStatReport'])->middleware('can:access_reports');
        Route::get('/item-sold', [ReportController::class, 'itemSoldReport'])->middleware('can:access_reports');
        Route::get('/items-multi-report', [ReportController::class, 'itemMultiReport'])->middleware('can:access_reports');
        Route::get('/profit-loss-report', [ReportController::class, 'profitLossReport'])->middleware('can:access_reports');



        Route::get('/inventory/management', [InventoryManagementController::class, 'index'])->name('inv.index');
        Route::get('/export-inv', [InventoryManagementController::class, 'export'])->name('inv.export');
        Route::post('/import-inv', [InventoryManagementController::class, 'import'])->name('inv.import');



        Route::get('/logout', [AdminController::class, 'logout'])->name('logout');

        Route::get('/', [HomeController::class, 'index'])->name('home');
        Route::post('/image/upload', [AdminController::class, 'uploadImage'])->name('image.upload');

        //Category routes
        Route::resource('/category', CategoryController::class)->except([
            'edit', 'update', 'destroy'
        ]);

        Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
        Route::post('/category/update/{id}', [CategoryController::class, 'update'])->name('category.update');
        Route::get('/category/delete/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
        Route::post('/category/fetch/subcategory', [CategoryController::class, 'fetchSubcategories'])->name('category.fetch.subcategory');

        //Sub Category routes
        Route::resource('/subcategory', SubCategoryController::class)->except([
            'edit', 'update', 'destroy'
        ]);

        Route::get('/subcategory/edit/{id}', [SubCategoryController::class, 'edit'])->name('subcategory.edit');
        Route::post('/subcategory/update/{id}', [SubCategoryController::class, 'update'])->name('subcategory.update');
        Route::get('/subcategory/delete/{id}', [SubCategoryController::class, 'destroy'])->name('subcategory.destroy');

        //Year routes
        Route::resource('/year', YearController::class)->except([
            'edit', 'update', 'destroy'
        ]);

        Route::get('/year/edit/{id}', [YearController::class, 'edit'])->name('year.edit');
        Route::post('/year/update/{id}', [YearController::class, 'update'])->name('year.update');
        Route::get('/year/delete/{id}', [YearController::class, 'destroy'])->name('year.destroy');

        //Make routes (Car Company)
        Route::resource('/make', CarCompanyController::class)->except([
            'edit', 'update', 'destroy'
        ]);

        Route::get('/make/edit/{id}', [CarCompanyController::class, 'edit'])->name('make.edit');
        Route::post('/make/update/{id}', [CarCompanyController::class, 'update'])->name('make.update');
        Route::get('/make/delete/{id}', [CarCompanyController::class, 'destroy'])->name('make.destroy');
        Route::post('/make/fetch/models', [CarCompanyController::class, 'fetchModels'])->name('make.fetch.models');

        //Model routes (Car)
        Route::resource('/model', CarController::class)->except([
            'edit', 'update', 'destroy'
        ]);

        Route::get('/model/edit/{id}', [CarController::class, 'edit'])->name('model.edit');
        Route::post('/model/update/{id}', [CarController::class, 'update'])->name('model.update');
        Route::get('/model/delete/{id}', [CarController::class, 'destroy'])->name('model.destroy');
        Route::post('/model/fetch/bodystyle', [CarController::class, 'fetchBodystyle'])->name('model.fetch.bodystyle');

        //BodyStyle routes
        Route::resource('/bodystyle', BodyStyleController::class)->except([
            'edit', 'update', 'destroy'
        ]);

        Route::get('/bodystyle/edit/{id}', [BodyStyleController::class, 'edit'])->name('bodystyle.edit');
        Route::post('/bodystyle/update/{id}', [BodyStyleController::class, 'update'])->name('bodystyle.update');
        Route::get('/bodystyle/delete/{id}', [BodyStyleController::class, 'destroy'])->name('bodystyle.destroy');

        //Glass routes
        Route::resource('/glass', GlassController::class)->except([
            'edit', 'update', 'destroy'
        ]);

        Route::get('/glass/edit/{id}', [GlassController::class, 'edit'])->name('glass.edit');
        Route::post('/glass/update/{id}', [GlassController::class, 'update'])->name('glass.update');
        Route::get('/glass/delete/{id}', [GlassController::class, 'destroy'])->name('glass.destroy');
        Route::post('/glass/fetch/feature', [GlassController::class, 'fetchFeature'])->name('glass.fetch.feature');

        //Feature routes
        Route::resource('/feature', FeatureController::class)->except([
            'edit', 'update', 'destroy'
        ]);

        Route::get('/feature/edit/{id}', [FeatureController::class, 'edit'])->name('feature.edit');
        Route::post('/feature/update/{id}', [FeatureController::class, 'update'])->name('feature.update');
        Route::get('/feature/delete/{id}', [FeatureController::class, 'destroy'])->name('feature.destroy');

        //Supplier routes
        Route::resource('/supplier', SupplierController::class)->except([
            'edit', 'update', 'destroy'
        ])->middleware('can:access_suppliers');

        Route::get('/supplier/edit/{id}', [SupplierController::class, 'edit'])->name('supplier.edit')->middleware('can:edit_suppliers');
        Route::post('/supplier/update/{id}', [SupplierController::class, 'update'])->name('supplier.update')->middleware('can:edit_suppliers');
        Route::get('/supplier/delete/{id}', [SupplierController::class, 'destroy'])->name('supplier.destroy')->middleware('can:edit_suppliers');

        //Warehouse routes
        Route::resource('/warehouse', WarehouseController::class)->except([
            'edit', 'update', 'destroy'
        ]);

        Route::get('/warehouse/edit/{id}', [WarehouseController::class, 'edit'])->name('warehouse.edit');
        Route::post('/warehouse/update/{id}', [WarehouseController::class, 'update'])->name('warehouse.update');
        Route::get('/warehouse/delete/{id}', [WarehouseController::class, 'destroy'])->name('warehouse.destroy');

        //Expenses routes
        Route::resource('/expense', ExpenseController::class)->except([
            'edit', 'update', 'destroy'
        ])->middleware('can:access_expenses');

        Route::get('/expense/edit/{id}', [ExpenseController::class, 'edit'])->name('expense.edit')->middleware('can:edit_expenses');
        Route::post('/expense/update/{id}', [ExpenseController::class, 'update'])->name('expense.update')->middleware('can:edit_expenses');
        Route::get('/expense/delete/{id}', [ExpenseController::class, 'destroy'])->name('expense.destroy')->middleware('can:delete_expenses');

        //Product routes
        Route::resource('/product', ProductController::class)->except([
            'edit', 'update', 'destroy'
        ])->middleware('can:access_products');

        Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit')->middleware('can:edit_products');
        Route::post('/product/update/{id}', [ProductController::class, 'update'])->name('product.update')->middleware('can:edit_products');
        Route::get('/product/delete/{id}', [ProductController::class, 'destroy'])->name('product.destroy')->middleware('can:delete_products');
        //Expense Categories routes
        Route::resource('/expenseCategory', ExpenseCategoryController::class)->except([
            'edit', 'update', 'destroy'
        ])->middleware('can:access_expense_categories');

        Route::get('/expenseCategory/edit/{id}', [ExpenseCategoryController::class, 'edit'])->name('expenseCategory.edit')->middleware('can:access_expense_categories');
        Route::post('/expenseCategory/update/{id}', [ExpenseCategoryController::class, 'update'])->name('expenseCategory.update')->middleware('can:access_expense_categories');
        Route::get('/expenseCategory/delete/{id}', [ExpenseCategoryController::class, 'destroy'])->name('expenseCategory.destroy')->middleware('can:access_expense_categories');

        //Installer routes
        Route::resource('/installer', InstallerController::class)->except([
            'edit', 'update', 'destroy'
        ]);

        Route::get('/installer/edit/{id}', [InstallerController::class, 'edit'])->name('installer.edit');
        Route::post('/installer/update/{id}', [InstallerController::class, 'update'])->name('installer.update');
        Route::get('/installer/delete/{id}', [InstallerController::class, 'destroy'])->name('installer.destroy');

        //Customer routes
        Route::resource('/customer', CustomerController::class)->except([
            'edit', 'update', 'destroy'
        ])->middleware('can:access_customers');

        Route::get('/customer/edit/{id}', [CustomerController::class, 'edit'])->name('customer.edit')->middleware('can:edit_customers');
        Route::post('/customer/update/{id}', [CustomerController::class, 'update'])->name('customer.update')->middleware('can:edit_customers');
        Route::get('/customer/delete/{id}', [CustomerController::class, 'destroy'])->name('customer.destroy')->middleware('can:delete_customers');

        //Purchase routes
        Route::resource('/purchase', PurchaseTransactionController::class)->except([
            'edit', 'update', 'destroy'
        ])->middleware('can:access_purchases');

        Route::get('/purchase/edit/{id}', [PurchaseTransactionController::class, 'edit'])->name('purchase.edit')->middleware('can:edit_purchases');
        Route::post('/purchase/update/{id}', [PurchaseTransactionController::class, 'update'])->name('purchase.update')->middleware('can:edit_purchases');
        Route::get('/purchase/delete/{id}', [PurchaseTransactionController::class, 'destroy'])->name('purchase.destroy')->middleware('can:delete_purchases');
        Route::get('/purchase/receive/stock', [PurchaseTransactionController::class, 'stockList'])->name('purchase.stock')->middleware('can:access_purchases');
        Route::get('/purchase/receive/stock/{id}', [PurchaseTransactionController::class, 'receiveStock'])->name('purchase.stock.receive')->middleware('can:access_purchases');
        Route::get('/purchase/receive/specific/stock', [PurchaseTransactionController::class, 'specificStockList'])->name('purchase.specific.stock')->middleware('can:access_purchases');
        Route::post('/purchase/receive/specific/stock/{id}', [PurchaseTransactionController::class, 'receiveSpecificStock'])->name('purchase.specific.stock.receive')->middleware('can:access_purchases');

        //WorkOrder routes
        Route::resource('/workorder', WorkorderController::class)->except([
            'edit', 'update', 'destroy', 'show'
        ])->middleware('can:access_sales');

        Route::get('/workorder/edit/{id}', [WorkorderController::class, 'edit'])->name('workorder.edit')->middleware('can:edit_sales');
        Route::get('/workorder/show/{id}', [WorkorderController::class, 'show'])->name('workorder.show')->middleware('can:access_sales');
        Route::post('/workorder/update/{id}', [WorkorderController::class, 'update'])->name('workorder.update')->middleware('can:edit_sales');
        Route::get('/workorder/delete/{id}', [WorkorderController::class, 'destroy'])->name('workorder.destroy')->middleware('can:delete_sales');

        //Quotation routes
        Route::get('/quotation', [QuotationController::class, 'index'])->name('quotation.index')->middleware('can:access_quotations');
        Route::get('/quotation/delete/{id}', [QuotationController::class, 'destroy'])->name('quotation.destroy')->middleware('can:delete_quotations');

        //sale routes
        Route::resource('/sale', SaleTransactionController::class)->except([
            'edit', 'update', 'destroy', 'show'
        ])->middleware('can:access_sales');

        Route::get('/sale/edit/{id}', [SaleTransactionController::class, 'edit'])->name('sale.edit')->middleware('can:edit_sales');
        Route::get('/sale/show/{id}', [SaleTransactionController::class, 'show'])->name('sale.show')->middleware('can:access_sales');
        Route::post('/sale/update/{id}', [SaleTransactionController::class, 'update'])->name('sale.update')->middleware('can:edit_sales');
        Route::get('/sale/delete/{id}', [SaleTransactionController::class, 'destroy'])->name('sale.destroy')->middleware('can:delete_sales');

        // Shipment routes
        Route::get('/fedex/create-shipment', [FedExController::class, 'createShipment'])->name('shipment.fedex.createShipment');
        Route::post('/ups/create-shipment', [UpsController::class, 'createShipment'])->name('shipment.ups.createShipment');
        Route::get('/ups/get-rates/{sale_detail_id}', [UpsController::class, 'getRates'])->name('shipment.ups.getRates');
        Route::get('/ups/get-label/{sale_detail_id}', [UpsController::class, 'getLabelImage'])->name('shipment.ups.getLabelImage');
        
        //Customer Type routes
        Route::resource('/customerType', CustomerTypeController::class)->except([
            'edit', 'update', 'destroy'
        ]);

        Route::get('/customerType/edit/{id}', [CustomerTypeController::class, 'edit'])->name('customerType.edit');
        Route::post('/customerType/update/{id}', [CustomerTypeController::class, 'update'])->name('customerType.update');
        Route::get('/customerType/delete/{id}', [CustomerTypeController::class, 'destroy'])->name('customerType.destroy');
        //adjustmemt routes
        Route::resource('/adjustment', AdjustmentController::class)->except([
            'edit', 'update', 'destroy'
        ])->middleware('can:access_adjustments');

        Route::get('/adjustment/edit/{id}', [AdjustmentController::class, 'edit'])->name('adjustment.edit')->middleware('can:edit_adjustments');
        Route::post('/adjustment/update/{id}', [AdjustmentController::class, 'update'])->name('adjustment.update')->middleware('can:edit_adjustments');
        Route::get('/adjustment/delete/{id}', [AdjustmentController::class, 'destroy'])->name('adjustment.destroy')->middleware('can:delete_adjustments');


        //permissions routes
        Route::resource('/permissions', PermissionController::class)->except([
            'edit', 'update', 'destroy'
        ])->middleware('can:access_user_management');

        Route::get('/permissions/edit/{id}', [PermissionController::class, 'edit'])->name('permissions.edit')->middleware('can:access_user_management');
        Route::post('/permissions/update/{id}', [PermissionController::class, 'update'])->name('permissions.update')->middleware('can:access_user_management');
        Route::get('/permissions/delete/{id}', [PermissionController::class, 'destroy'])->name('permissions.destroy')->middleware('can:access_user_management');

        //User routes
        Route::resource('/user', UserController::class)->except([
            'edit', 'update', 'destroy'
        ])->middleware('can:access_user_management');

        Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit')->middleware('can:access_user_management');
        Route::post('/user/update/{id}', [UserController::class, 'update'])->name('user.update')->middleware('can:access_user_management');
        Route::get('/user/delete/{id}', [UserController::class, 'destroy'])->name('user.destroy')->middleware('can:access_user_management');

        //Purchase Return routes
        Route::resource('/purchase-return', PurchaseReturnController::class)->except([
            'edit', 'update', 'destroy'
        ])->middleware('can:access_purchase_returns');

        Route::get('/purchase-return/edit/{id}', [PurchaseReturnController::class, 'edit'])->name('purchase.return.edit')->middleware('can:access_purchase_returns');
        Route::post('/purchase-return/update/{id}', [PurchaseReturnController::class, 'update'])->name('purchase.return.update')->middleware('can:access_purchase_returns');
        Route::get('/purchase-return/delete/{id}', [PurchaseReturnController::class, 'destroy'])->name('purchase.return.destroy')->middleware('can:access_purchase_returns');

        //Sale Return routes
        Route::resource('/sale-return', SaleReturnController::class)->except([
            'edit', 'update', 'destroy'
        ])->middleware('can:access_sale_returns');

        Route::get('/sale-return/edit/{id}', [SaleReturnController::class, 'edit'])->name('sale.return.edit')->middleware('can:access_sale_returns');
        Route::post('/sale-return/update/{id}', [SaleReturnController::class, 'update'])->name('sale.return.update')->middleware('can:access_sale_returns');
        Route::get('/sale-return/delete/{id}', [SaleReturnController::class, 'destroy'])->name('sale.return.destroy')->middleware('can:access_sale_returns');

        //Currency routes
        Route::resource('/currency', CurrencyController::class)->except([
            'edit', 'update', 'destroy'
        ])->middleware('can:access_currencies');

        Route::get('/currency/edit/{id}', [CurrencyController::class, 'edit'])->name('currency.edit')->middleware('can:access_currencies');
        Route::post('/currency/update/{id}', [CurrencyController::class, 'update'])->name('currency.update')->middleware('can:access_currencies');
        Route::get('/currency/delete/{id}', [CurrencyController::class, 'destroy'])->name('currency.destroy')->middleware('can:access_currencies');

        //Settings routes
        Route::resource('/setting', SettingController::class)->except([
            'edit', 'update', 'destroy'
        ])->middleware('can:access_settings');

        Route::post('/settings/general', [SettingController::class, 'update'])->name('setting.general.update')->middleware('can:access_settings');
        Route::post('/settings/smtp', [SettingController::class, 'smtpUpdate'])->name('setting.smtp.update')->middleware('can:access_settings');
        Route::post('/settings/shipping', [SettingController::class, 'shippingUpdate'])->name('setting.shipping.update')->middleware('can:access_settings');
        Route::put('/settings/ups', [SettingController::class, 'upsUpdate'])->name('setting.upsUpdate')->middleware('can:access_settings');
        Route::put('/settings/fedex', [SettingController::class, 'fedexUpdate'])->name('setting.fedexUpdate')->middleware('can:access_settings');
        Route::put('/settings/stripe', [SettingController::class, 'stripeUpdate'])->name('setting.stripeUpdate')->middleware('can:access_settings');
        Route::put('/settings/paypal', [SettingController::class, 'paypalUpdate'])->name('setting.paypalUpdate')->middleware('can:access_settings');

    });


    Route::get('/items-add-product', function () {
        return view('dashboard\all-items\add-product');
    })->name('items-add-product');


    Route::get('/product-id', function () {
        return view('dashboard\all-items\product-id');
    })->name('product-id');



    // Route::get('/order-parts', function () {
    //     return view('dashboard\purchase-order\order-parts');
    // })->name('order-parts');


    // Route::get('/stock', function () {
    //     return view('dashboard\purchase-order\stock');
    // })->name('stock');

    Route::get('/Specific-Part', function () {
        return view('dashboard\purchase-order\Specific-Part');
    })->name('Specific-Part');

    Route::get('/view-order', function () {
        return view('dashboard\purchase-order\view-order');
    })->name('view-order');

    Route::get('/view-payment', function () {
        return view('dashboard\purchase-order\view-payment');
    })->name('view-payment');


    Route::get('/order-details', function () {
        return view('dashboard\purchase-order\details');
    })->name('order-details');


    Route::get('/dashboard-chat', function () {
        return view('dashboard\chat\dashboard-chat');
    })->name('dashboard-chat');



    Route::get('/all-work-job', function () {
        return view('dashboard.all-work-job.all-work');
    })->name('all-work-job');

    Route::get('/create-all-work', function () {
        return view('dashboard.all-work-job.create-work');
    })->name('create-all-work');


    Route::get('/create-purchase-return', function () {
        return view('dashboard.purchase-return.create-purchase');
    })->name('create-purchase-return')->middleware('can:create_purchase_returns');

    Route::get('/purchase-return', function () {
        return view('dashboard.purchase-return.purchase-return');
    })->name('purchase-return')->middleware('can:access_purchase_returns');



    Route::get('/sale-return', function () {
        return view('dashboard.purchase-return.sale-return');
    })->name('sale-return')->middleware('can:access_sale_returns');


    Route::get('/all-sale', function () {
        return view('dashboard.all-sale.all-sale');
    })->name('all-sale');

    Route::get('/create-all', function () {
        return view('dashboard.all-sale.create-all');
    })->name('create-all');


    Route::get('/edit-all-sale', function () {
        return view('dashboard.all-sale.all-edit');
    })->name('edit-all-sale');








