<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About This Project

This is a Laravel application built with the TALL stack (Tailwind CSS, Alpine.js, Laravel, Livewire). It serves as a content management system for 'Artikel' (Articles), 'Galeri' (Gallery), and 'Kesenian' (Arts). The application features an administrative panel powered by Filament and a public-facing frontend developed using Livewire components.

## Technologies Used

*   **Language:** PHP ^8.2
*   **Framework:** Laravel ^11.31
*   **Frontend Stack (TALL):**
    *   Tailwind CSS ^3.4.13
    *   Alpine.js (implicitly used with Livewire)
    *   Livewire
*   **Admin Panel:** Filament ^3.3
*   **Build Tool:** Vite ^6.0.11
*   **Other Key Libraries:**
    *   Spatie/laravel-permission ^6.20
    *   Spatie/laravel-sitemap ^7.3
    *   Intervention/image ^3.11
    *   Graham-campbell/markdown ^16.0

## Local Development Setup

Follow these steps to get the application running on your local machine:

1.  **Clone the repository:**

    ```bash
    git clone <repository_url>
    cd jawari-app
    ```

2.  **Install PHP Dependencies:**
    Make sure you have Composer installed.

    ```bash
    composer install
    ```

3.  **Install JavaScript Dependencies:**
    Make sure you have Node.js and npm (or Yarn) installed.

    ```bash
    npm install
    # or
    yarn install
    ```

4.  **Environment Configuration:**
    Copy the example environment file and generate an application key.

    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

    Edit the `.env` file and configure your database connection.

    ```dotenv
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database_name
    DB_USERNAME=your_database_user
    DB_PASSWORD=your_database_password
    ```

5.  **Run Database Migrations and Seeders:**
    This will create the necessary tables and populate them with some initial data.

    ```bash
    php artisan migrate --seed
    ```

6.  **Start the Development Server:**
    You can run both the Laravel development server and Vite for asset compilation concurrently.

    ```bash
    npm run dev
    # This command uses 'concurrently' to run:
    # - php artisan serve
    # - php artisan queue:listen --tries=1
    # - php artisan pail --timeout=0
    # - npm run dev (Vite)
    ```

    Alternatively, you can run them separately:

    ```bash
    php artisan serve
    # In a separate terminal:
    npm run dev
    ```

7.  **Access the Application:**
    Once the servers are running, you can access the application in your web browser, usually at `http://127.0.0.1:8000`.

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).