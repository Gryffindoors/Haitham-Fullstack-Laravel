# Database Structure Reference

This document describes each table in the project schema in the order of their migrations. It outlines the purpose, structure, and relationships of each table.

---

### 1. `user_roles`

* **Purpose**: Defines system roles such as admin, cashier, etc.
* **Key Columns**: `role`
* **Use**: Referenced in `users` table.

### 2. `time_tables`

* **Purpose**: Defines shift templates for staff scheduling.
* **Key Columns**: `start`, `end`, `name_ar`
* **Use**: Referenced in `staff`, `attendances`

### 3. `departments`

* **Purpose**: Organizational units for staff.
* **Key Columns**: `name`, `manager_id`
* **Relations**: FK to `staff` via separate migration.

### 4. `staff`

* **Purpose**: Stores staff member records.
* **Key Columns**: `department_id`, `timetable_id`, `image_url`
* **Relations**: Linked to users, created\_by, and updated\_by (self-ref).

### 5. `departments (FK manager_id)`

* **Purpose**: Separate FK constraint for circular dependency resolution.
* **Use**: Allows assigning manager to department after staff exists.

### 6. `staff_phones`

* **Purpose**: Allows multiple phones per staff.
* **Key Columns**: `staff_id`, `phone_number`

### 7. `users`

* **Purpose**: Authentication users of the system.
* **Key Columns**: `username`, `password`, `role_id`, `staff_id`
* **Notes**: Uses softDeletes. Created\_by/updated\_by are also staff.

### 8. `attendances`

* **Purpose**: Tracks daily staff attendance.
* **Key Columns**: `staff_id`, `day`, `start`, `end`, `status`

### 9. `salaries`

* **Purpose**: Defines salary settings per staff member.
* **Key Columns**: `base_salary`, `hourly_rate`, `tips`
* **Relations**: `staff_id`, `created_by`, `updated_by`

### 10. `inventories`

* **Purpose**: Stocked materials for menu preparation.
* **Key Columns**: `name`, `quantity`, `unit`, `cost`
* **Use**: Connected to ingredients.

### 11. `menu_categories`

* **Purpose**: Hierarchical categories for menu items.
* **Key Columns**: `parent_id`, `name_ar`

### 12. `menu_items`

* **Purpose**: Actual food and beverage entries.
* **Key Columns**: `price`, `category_id`, multilingual fields

### 13. `menu_items_ingredients`

* **Purpose**: Ingredient breakdown of menu items.
* **Key Columns**: `menu_item_id`, `inventory_id`, `quantity`

### 14. `special_offers`

* **Purpose**: Promotions and discount codes.
* **Key Columns**: `discount_type`, `valid_from`, `description_ar`

### 15. `table_statuses`

* **Purpose**: Dynamic table status definitions.
* **Options**: `empty`, `reserved`, `occupied`, etc.

### 16. `tables`

* **Purpose**: Physical restaurant tables.
* **Key Columns**: `capacity`, `status_id`, `table_number`

### 17. `table_locations`

* **Purpose**: Coordinate/zone locations of tables (for floor layout).
* **Key Columns**: `location_code`, `is_reserved`, `reserved_until`

### 18. `table_location_assignments`

* **Purpose**: Many-to-many between tables and locations.
* **Key Columns**: `table_location_id`, `table_id`

### 19. `customers`

* **Purpose**: Guest/customer info.
* **Key Columns**: `first_name`, `phone_number`
* **Use**: Referenced in orders, bills, etc.

### 20. `order_statuses`

* **Purpose**: Defines progress status of any order.
* **Options**: `pending`, `preparing`, `completed`, etc.

### 21. `order_types`

* **Purpose**: Categorize orders by channel.
* **Options**: `table`, `delivery`, `takeaway`

### 22. `orders`

* **Purpose**: Central order record.
* **Key Columns**: `customer_id`, `order_type_id`, `table_id`, `status_id`, `total`
* **Notes**: Links optionally to special offers.

### 23. `order_items`

* **Purpose**: Items attached to an order.
* **Key Columns**: `menu_item_id`, `order_id`, `quantity`

### 24. `deliveries`

* **Purpose**: Delivery tracking table.
* **Key Columns**: `customer_id`, `order_id`, `delivery_time`

### 25. `takeaways`

* **Purpose**: Records takeaway requests.
* **Key Columns**: `order_id`, `order_completed_time`

### 26. `payment_methods`

* **Purpose**: Lookup of available payment types (e.g., Cash, Visa).

### 27. `bills`

* **Purpose**: Aggregated bill covering one or more orders.
* **Key Columns**: `total_cost`, `tax`, `service_charge`, `bill_number`

### 28. `bill_orders`

* **Purpose**: Many-to-many link between orders and bills.
* **Use**: Enables bill merging (e.g., for shared table).

### 29. `bill_payments`

* **Purpose**: Tracks payments for a given bill.
* **Key Columns**: `bill_id`, `amount`, `paid_at`, `transaction_number`

### 30. `deduction_rules`

* **Purpose**: Master list of deduction types (e.g., tax, insurance).
* **Key Columns**: `type`, `value`, `is_active`

### 31. `salary_deductions`

* **Purpose**: Actual salary deductions per staff.
* **Key Columns**: `staff_id`, `amount`, `reason`, `deduction_date`


### 32. `tax_brackets`

* **Purpose**: define tax brackets and thresholds.
* **Key Columns**: `min_income`, `max_income`, `rate`
