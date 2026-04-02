# Task Manager

A beautiful and modern task management application built with **Laravel 12** and **Bootstrap 5.3**, featuring smooth animations and a responsive design.

![Task Manager](https://img.shields.io/badge/Laravel-12-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![Bootstrap](https://img.shields.io/badge/Bootstrap-5.3-7952B3?style=for-the-badge&logo=bootstrap&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-8.2+-777BB4?style=for-the-badge&logo=php&logoColor=white)
![License](https://img.shields.io/badge/License-MIT-green?style=for-the-badge)

## ✨ Features

- 🎨 **Modern UI** - Beautiful gradient colors and clean design
- 🎬 **Smooth Animations** - AOS (Animate On Scroll) library for engaging transitions
- 📱 **Fully Responsive** - Works seamlessly on desktop, tablet, and mobile devices
- ✅ **Task Management** - Create, read, update, and delete tasks
- 📊 **Status Tracking** - Track tasks with three statuses: To Do, In Progress, Done
- 📈 **Dashboard Stats** - Real-time statistics overview of all tasks
- 🗓️ **Due Dates** - Set and track task deadlines
- ⚠️ **Form Validation** - Client and server-side validation with helpful error messages
- 🔔 **Notifications** - Success and error alerts with auto-dismiss
- 💾 **Database Powered** - SQLite/MySQL database for persistent storage
- 🔐 **User Authentication** - Secure login and registration system
- 👤 **User Accounts** - Each user has their own private tasks
- 🚀 **Demo Mode** - Try the app instantly without creating an account

## 🚀 Screenshots

### Dashboard
- View all tasks in a beautiful table layout
- See task statistics at a glance
- Quick actions for edit and delete

### Create/Edit Tasks
- Clean and intuitive forms
- Status selection with visual indicators
- Due date picker

## 📋 Prerequisites

Before you begin, ensure you have the following installed:

- **PHP** 8.2 or higher
- **Composer** - PHP dependency manager
- **Node.js & NPM** - For frontend assets
- **SQLite** / **MySQL** / **PostgreSQL** - Database

## 🛠️ Installation

### 1. Clone the Repository

```bash
git clone https://github.com/Chrisjohanes/task-manager.git
cd task-manager
```

### 2. Install Dependencies

```bash
# Install PHP dependencies
composer install

# Install Node.js dependencies
npm install
```

### 3. Environment Setup

```bash
# Copy the example environment file
cp .env.example .env

# Generate application key
php artisan key:generate
```

### 4. Configure Database

Edit the `.env` file and set up your database connection:

```env
DB_CONNECTION=sqlite
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE=task_manager
# DB_USERNAME=root
# DB_PASSWORD=
```

For SQLite, simply create the database file:
```bash
touch database/database.sqlite
```

### 5. Run Migrations & Seeders

```bash
# Run migrations to create tables
php artisan migrate

# (Optional) Seed with sample data
php artisan db:seed
```

### 6. Build Frontend Assets

```bash
# For development
npm run dev

# For production
npm run build
```

### 7. Start the Application

```bash
# Option 1: Laravel development server
php artisan serve

# Option 2: Full development suite (server, queue, logs, vite)
composer dev
```

Visit `http://127.0.0.1:8000` in your browser.

## 🔐 Authentication & Demo Access

### Demo Mode (No Registration Required)
Click **"Try Demo"** on the homepage or login page to instantly access the app with a demo account. Perfect for exploring features before signing up!

### Demo Account Credentials
After seeding the database, you can also login with:
- **Email**: `user@example.com`
- **Password**: `password123`

### Create Your Account
Click **"Register"** to create a personal account. Your tasks will be saved permanently and synced across sessions.

## 📁 Project Structure

```
task-manager/
├── app/
│   ├── Http/Controllers/
│   │   └── TaskController.php      # Task CRUD operations
│   └── Models/
│       └── Task.php                 # Task model
├── database/
│   ├── migrations/                  # Database migrations
│   └── seeders/
│       └── TaskSeeder.php           # Sample data seeder
├── resources/
│   └── views/
│       ├── layouts/
│       │   └── app.blade.php        # Main layout with Bootstrap
│       ├── tasks/
│       │   ├── index.blade.php      # Task list view
│       │   ├── create.blade.php     # Create task form
│       │   └── edit.blade.php       # Edit task form
│       └── home.blade.php           # Landing page
└── routes/
    └── web.php                      # Application routes
```

## 🎨 Technologies Used

### Backend
- **Laravel 12** - PHP web framework
- **Eloquent ORM** - Database abstraction
- **Carbon** - Date/time handling

### Frontend
- **Bootstrap 5.3** - CSS framework
- **Bootstrap Icons** - Icon library
- **AOS (Animate On Scroll)** - Animation library
- **Google Fonts (Poppins)** - Typography

### Development Tools
- **Vite** - Frontend build tool
- **Composer** - PHP package manager
- **NPM** - Node package manager

## 📖 Usage Guide

### Creating a Task

1. Click **"Create New Task"** or the **+** button
2. Fill in the task title (required)
3. Add a description (optional)
4. Select a status: To Do, In Progress, or Done
5. Set a due date (optional)
6. Click **"Create Task"**

### Managing Tasks

- **View Tasks**: Navigate to `/tasks` to see all tasks
- **Edit Task**: Click the pencil icon (✏️) on any task
- **Delete Task**: Click the trash icon (🗑️) and confirm
- **Filter by Status**: Tasks are color-coded by status

### Task Statuses

| Status | Color | Description |
|--------|-------|-------------|
| To Do | 🟡 Yellow | Task not yet started |
| In Progress | 🔵 Blue | Task currently being worked on |
| Done | 🟢 Green | Task completed |

## 🔧 Available Commands

```bash
# Run database migrations
php artisan migrate

# Seed database with sample data
php artisan db:seed

# Clear application cache
php artisan cache:clear
php artisan config:clear
php artisan view:clear

# Run tests
composer test

# Development server with hot reload
composer dev
```

## 🤝 Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## 📄 License

This project is open-sourced software licensed under the [MIT License](https://opensource.org/licenses/MIT).

## 👨‍💻 Author

**Chrisjohanes**

- GitHub: [@Chrisjohanes](https://github.com/Chrisjohanes)
- Repository: [task-manager](https://github.com/Chrisjohanes/task-manager)

## 🙏 Acknowledgments

- [Laravel](https://laravel.com) - The PHP framework for web artisans
- [Bootstrap](https://getbootstrap.com) - Powerful front-end framework
- [AOS Animation](https://michalsnik.github.io/aos/) - Animate on scroll library
- [Bootstrap Icons](https://icons.getbootstrap.com) - Free icon library

---

<p align="center">Made with ❤️ using Laravel & Bootstrap</p>
