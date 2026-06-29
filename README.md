# Employee Task Planner

A task management web app built with Laravel 12 and Tailwind CSS.  
Allows tracking employee tasks with status management (Pending / In Progress / Completed).

## Tech Stack
- **Backend:** PHP 8.x, Laravel 12, Eloquent ORM
- **Frontend:** Blade Templates, Tailwind CSS, Vite
- **Database:** MySQL

## Features
- Create, edit, and delete tasks
- Assign tasks to employees with due dates
- Status tracking with colour-coded badges
- Form validation on all inputs

## Setup Instructions

### 1. Clone the repo
git clone https://github.com/afrath12/employee-task-planner.git
cd employee-task-planner

### 2. Install dependencies
composer install
npm install

### 3. Configure environment
cp .env.example .env
php artisan key:generate

Edit `.env` and set your DB credentials:
DB_DATABASE=employee_task_planner
DB_USERNAME=root
DB_PASSWORD=yourpassword

### 4. Run migrations
php artisan migrate

### 5. Start the dev server
npm run dev
php artisan serve

Visit http://127.0.0.1:8000