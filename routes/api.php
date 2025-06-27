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
use App\Http\Controllers\UsersController;



Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {

    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/me', [AuthController::class, 'me']);

    // Orders
    Route::prefix('orders')->group(function () {
        Route::post('/', [OrdersController::class, 'store']);
        Route::get('/{id}', [OrdersController::class, 'show']);
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



    // Staff (Admin only later)
    Route::prefix('staff')->middleware('role:owner')->group(function () {
        Route::get('/', [StaffController::class, 'index']);
        Route::post('/', [StaffController::class, 'store']);
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

    //user control
    Route::prefix('users')->middleware(['auth:sanctum', 'role:owner'])->group(function () {
        Route::get('/', [UsersController::class, 'index']);
        Route::post('/', [UsersController::class, 'store']);
        Route::put('/{id}', [UsersController::class, 'update']);
        Route::delete('/{id}', [UsersController::class, 'destroy']);

        // Dropdown helpers
        Route::get('/roles/list', [UsersController::class, 'roleList']);
        Route::get('/staff/list', [UsersController::class, 'staffList']);
    });

    //menu items
    Route::prefix('menu')->middleware('role:owner,supervisor')->group(function () {
        Route::get('/items', [MenuItemsController::class, 'index']);
        Route::post('/items', [MenuItemsController::class, 'store']);
        Route::put('/items/{id}', [MenuItemsController::class, 'update']);
        Route::delete('/items/{id}', [MenuItemsController::class, 'destroy']);

        Route::get('/categories', [MenuCategoriesController::class, 'index']);
    });

    //salary
    Route::prefix('salaries')->middleware('role:owner')->group(function () {
        Route::get('/', [SalaryController::class, 'index']);
        Route::post('/', [SalaryController::class, 'store']);
        Route::get('/rules', [DeductionRuleController::class, 'index']);
    });

    // Table Management
    // Table Management
    Route::prefix('tables')->middleware('role:owner,supervisor')->group(function () {
        Route::get('/', [TablesController::class, 'index']); // List logical groups (table numbers)
        Route::get('/map', [TablesController::class, 'getFullMap']); // Group + assigned locations
        Route::post('/assign', [TablesController::class, 'assignLocation']); // Assign physical locations to group

        // Physical seat controls (table_locations)
        Route::get('/locations', [TablesController::class, 'getLocations']); // List all physical seats
        Route::put('/location/{id}/status', [TablesController::class, 'updateLocationStatus']); // Update physical table status
    });
});
