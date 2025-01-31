# Task Manager

## Setup

1. Clone the repository:
    ```bash
    git clone https://github.com/jstortoise/task-manager.git
    cd task-manager
    ```

2. Install Composer and NPM dependencies:
    ```bash
    composer install
    npm install
    ```

3. Copy `.env.example` to `.env`:
    ```bash
    cp .env.example .env
    ```

4. Set up your database in `.env`:
    ```ini
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_DATABASE=task_manager
    DB_USERNAME=root
    DB_PASSWORD=
    ```

5. Run migrations:
    ```bash
    php artisan migrate
    ```

6. Run npm for frontend:
    ```bash
    npm run dev
    ```

7. Serve the application:
    ```bash
    php artisan serve
    ```

Visit **http://localhost:8000/tasks** to use your application.
