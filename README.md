# TranchePay V4 - Payment in installments API

Laravel 11 / PHP 8.3 / MySQL

What it does:
- Manage installment payments
- REST API with Sanctum auth
- Webhook for payment status
- Queue for sending SMS receipts

Stack: Laravel, Sanctum, MySQL, Queues, Docker

How to run:
composer install
cp .env.example .env
php artisan migrate
php artisan serve
