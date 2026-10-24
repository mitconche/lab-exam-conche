# Student Manager

## Project Description

Student Manager is a Laravel-based web application for managing student records. It allows authenticated users to create, view, update, and delete student information.

## Features

- User login and logout
- Student CRUD operations
- Course selection and student-course relationships
- Input validation for student name, email, and course
- Student ownership authorization using policies
- API token authentication using Laravel Sanctum
- Protected API endpoint that returns student records with course information

## Technologies Used

- PHP 8.2
- Laravel 12
- MySQL
- Laravel Sanctum
- Blade templates
- Git and GitHub

## Installation and Setup

### 1. Install Dependencies

```bash
composer install
```

### 2. Configure the Environment

Copy `.env.example` to `.env`.

Update the database settings in `.env` to match your local MySQL configuration.

### 3. Generate the Application Key

```bash
php artisan key:generate
```

### 4. Create the Database

Create a MySQL database named `lab_exam`, or use another name and update `.env` accordingly.

### 5. Run Migrations and Seed the Database

```bash
php artisan migrate --seed
```

This command creates the database tables and seeds the admin account and course records.

### 6. Start the Application

```bash
php artisan serve
```

Open `http://127.0.0.1:8000` in your browser.

## API Endpoints

| Method | Endpoint | Description |
|---|---|---|
| POST | `/api/tokens/create` | Generate an API token using valid credentials |
| GET | `/api/students` | Retrieve student records with course information |

The students endpoint requires a valid Sanctum Bearer token.

## Security

- The `.env` file must not be committed to GitHub.
- API access requires a valid authentication token.
- Student updates and deletions are restricted by ownership policies.
- Student inputs are validated before saving.

## Author

April B. Conche
