<?php

use App\Http\Controllers\MenuCategoriesController;
use App\Http\Controllers\MenuItemsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\BillsController;
use App\Http\Controllers\DeductionRuleController;
use App\Http\Controllers\OperatingCostController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\TablesController;
use App\Http\Controllers\OrderStatusController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderTypeController;



Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {

    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/me', [AuthController::class, 'me']);

    // Orders
    Route::prefix('orders')->group(function () {
        Route::get('/', [OrdersController::class, 'index']);
        Route::post('/', [OrdersController::class, 'store']);
        Route::get('/status', [OrderStatusController::class, 'index']);
        Route::get('/{id}', [OrdersController::class, 'show']);
    });

    Route::get('/order-types', [OrderTypeController::class, 'index']);


    //Customers
    Route::prefix('customers')->group(function () {
        Route::get('/', [CustomerController::class, 'index']);
        Route::post('/', [CustomerController::class, 'store']);
        Route::put('/{id}', [CustomerController::class, 'update']);
        Route::delete('/{id}', [CustomerController::class, 'destroy']);
    });


    // Billing & Payments
    Route::prefix('bills')->middleware('role:owner,supervisor,cashier')->group(function () {
        Route::post('{id}/pay', [BillsController::class, 'pay']);
        Route::get('/{id}', [BillsController::class, 'show']);
    });

    // Reports
    Route::prefix('reports')->middleware('role:owner,supervisor')->group(function () {
        Route::get('/profit', [ReportsController::class, 'monthlyProfit']);
        Route::get('/menu/top', [ReportsController::class, 'topMenuItems']);
        Route::get('/staff/performance', [ReportsController::class, 'staffPerformance']);
        Route::get('/inventory/usage', [ReportsController::class, 'ingredientUsage']);
        Route::get('/profit-trend', [ReportsController::class, 'profitTrend']);
        Route::get('/menu/low-stock', [ReportsController::class, 'lowStockIngredients']);
        Route::get('/staff/top', [ReportsController::class, 'topPerformers']);
        Route::get('/staff/discipline', [ReportsController::class, 'disciplineRanking']);
        Route::get('/costs/breakdown', [ReportsController::class, 'operatingCostBreakdown']);
        Route::get('/tables/usage', [ReportsController::class, 'tableUsage']);
    });

    // Staff & User Management (Owner Only)
    Route::prefix('staff')->middleware(['auth:sanctum', 'role:owner'])->group(function () {
        Route::get('/', [StaffController::class, 'index']);         // Get full staff listing
        Route::post('/', [StaffController::class, 'store']);        // Create new staff member
        Route::put('/{staff}', [StaffController::class, 'update']); // Update staff member
        Route::delete('/{staff}', [StaffController::class, 'destroy']); // Delete staff

        // Dropdown helpers
        Route::get('/roles/list', [StaffController::class, 'roleList']);   // List of user roles
        Route::get('/list', [StaffController::class, 'staffList']);        // List of staff IDs and names
        Route::get('/department', [StaffController::class, 'departmentList']);
    });

    // Inventory
    Route::prefix('inventory')->group(function () {
        Route::get('/low-stock', [InventoryController::class, 'lowStock']);
        Route::get('/items', [InventoryController::class, 'index']);
    });

    //Operating costs
    Route::prefix('costs')->middleware(['auth:sanctum', 'role:owner,supervisor'])->group(function () {
        Route::get('/', [OperatingCostController::class, 'index']);
        Route::post('/', [OperatingCostController::class, 'store']);
        Route::put('/{id}', [OperatingCostController::class, 'update']);
        Route::delete('/{id}', [OperatingCostController::class, 'destroy']);
    });

    //menu items
    // Routes accessible to all authenticated users
    Route::prefix('menu')->middleware('auth:sanctum')->group(function () {
        Route::get('/items', [MenuItemsController::class, 'index']);
        Route::get('/categories', [MenuCategoriesController::class, 'index']);
    });

    // Routes restricted to owner and supervisor
    Route::prefix('menu')->middleware('role:owner,supervisor')->group(function () {
        Route::post('/items', [MenuItemsController::class, 'store']);
        Route::put('/items/{menuItem}', [MenuItemsController::class, 'update']);
        Route::delete('/items/{menuItem}', [MenuItemsController::class, 'destroy']);
    });


    //salary
    Route::prefix('salaries')->middleware('role:owner')->group(function () {
        Route::get('/', [SalaryController::class, 'index']);
        Route::post('/', [SalaryController::class, 'store']);
        Route::get('/rules', [DeductionRuleController::class, 'index']);
    });

    // Table Management
    Route::prefix('tables')->middleware('role:owner,supervisor')->group(function () {
        Route::get('/', [TablesController::class, 'index']); // List logical groups (table numbers)
        Route::get('/map', [TablesController::class, 'getFullMap']); // Group + assigned locations
        Route::post('/assign', [TablesController::class, 'updateTableMapping']); // Assign physical locations to group

        // Physical seat controls (table_locations)
        Route::get('/locations', [TablesController::class, 'getLocations']); // List all physical seats
        Route::put('/location/{id}/status', [TablesController::class, 'updateLocationStatus']); // Update physical table status
    });
});
