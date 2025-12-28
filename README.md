# 🏡 3aqarat - Real Estate Management Platform

![Laravel](https://img.shields.io/badge/Laravel-12-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![React](https://img.shields.io/badge/React-18-61DAFB?style=for-the-badge&logo=react&logoColor=black)
![Inertia.js](https://img.shields.io/badge/Inertia.js-purple?style=for-the-badge&logo=inertia&logoColor=white)
![Filament](https://img.shields.io/badge/Filament-4-FDAE4B?style=for-the-badge&logo=data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAyNCAyNCI+PHBhdGggZmlsbD0iI0ZGRiIgZD0iTTEyIDJMMiAyMmgyMEwxMiAyeiIvPjwvc3ZnPg==&logoColor=white)
![Vite](https://img.shields.io/badge/Vite-646CFF?style=for-the-badge&logo=vite&logoColor=white)
![Tailwind CSS](https://img.shields.io/badge/Tailwind_CSS-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white)
![SQLite](https://img.shields.io/badge/SQLite-003B57?style=for-the-badge&logo=sqlite&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-8.2+-777BB4?style=for-the-badge&logo=php&logoColor=white)

## 📋 Project Overview

3aqarat is a comprehensive real estate management platform designed to streamline property listings, lead management, and agent operations. Built with modern technologies to provide a robust and scalable solution for real estate businesses.

## 🎨 Design Inspiration

Partially inspired by: [Real Estate Website Design on Dribbble](https://dribbble.com/shots/25373479-Real-Estate-Website)

## 📸 Screenshots

<div align="center">
  <img src="screenshots/1.png" alt="Homepage" width="45%" />
  <img src="screenshots/2.png" alt="Property Listings" width="45%" />
</div>

<div align="center">
  <img src="screenshots/3.png" alt="Property Details" width="45%" />
  <img src="screenshots/4.png" alt="Agent Management" width="45%" />
</div>

<div align="center">
  <img src="screenshots/5.png" alt="Projects" width="45%" />
  <img src="screenshots/6.png" alt="Lead Management" width="45%" />
</div>

<div align="center">
  <img src="screenshots/7.png" alt="Dashboard View" width="45%" />
  <img src="screenshots/8.png" alt="Mobile Responsive" width="45%" />
</div>

<div align="center">
  <img src="screenshots/dashboard.png" alt="Admin Dashboard" width="90%" />
</div>

## 🛠️ Tech Stack

### Backend
- **Laravel 12** - PHP framework for robust backend architecture
- **Filament 4** - Modern admin panel and resource management
- **Spatie Laravel Permission** - Role and permission management
- **SQLite** - Primary database

### Frontend
- **Inertia.js** - Modern monolith architecture
- **React 18** - UI component library
- **Vite** - Fast build tool and development server
- **Tailwind CSS** - Utility-first CSS framework

### Development Tools
- **Laravel Debugbar** - Development debugging
- **PHPUnit** - Testing framework
- **Composer** - PHP dependency management
- **NPM** - JavaScript package management

## 📦 Core Models

- **Agent** - Real estate agent management
- **Project** - Property development projects
- **Property** - Individual property listings
- **Lead** - Customer lead tracking
- **User** - System user authentication and authorization

## 🚀 Getting Started

### Prerequisites
- PHP 8.2 or higher
- Composer
- Node.js 18+ and NPM
- SQLite

### Installation

```bash
# Clone the repository
git clone https://github.com/kareem-codes/3aqarat.git
cd 3aqarat

# Install PHP dependencies
composer install

# Install JavaScript dependencies
npm install

# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate

# Configure your database in .env file
# Then run migrations
php artisan migrate

# Seed roles and permissions
php artisan db:seed

# Build frontend assets
npm run build

# Start development server
php artisan serve
```

### Development Mode

```bash
# Run Vite dev server
npm run dev

# In another terminal, run Laravel
php artisan serve
```

## 📝 Features

- ✅ User authentication and authorization
- ✅ Agent management system
- ✅ Property listings and management
- ✅ Project tracking and oversight
- ✅ Role-based access control
- ✅ Admin dashboard with Filament
- ✅ Lead capture and management
- ✅ Responsive UI with React components
