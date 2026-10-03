# TranchePay V4 – Installment Payment API

A RESTful payment management API designed to handle installment-based
payment workflows.

## Features

- Installment payment management
- REST API
- Authentication with Laravel Sanctum
- Payment status webhooks
- Queue-based SMS notifications
- Database transaction management
- API validation and error handling

## Tech Stack

- PHP 8.3
- Laravel 11
- MySQL
- Laravel Sanctum
- Queues
- Docker
- REST API

## Architecture

Client
   ↓
REST API
   ↓
Laravel Application
   ├── Authentication
   ├── Payment Management
   ├── Webhooks
   └── Queues
         ↓
    SMS Notification

## Installation

composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve

## API Documentation

See `/docs` for API endpoints and examples.
