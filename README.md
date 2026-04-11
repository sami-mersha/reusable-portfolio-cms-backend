## About

A **dynamic, headless CMS-based portfolio backend** for software engineers. Built with **Laravel** + **Filament**, this system lets you manage:

- Profiles (bio, title, tagline, links, profile image)
- Projects (tech stack, features, live URLs, GitHub URLs, images)
- Featured projects
- Skills
- Experiences
- Certificates
- Resume/CV uploads (PDF/DOCX)

The API is fully headless and ready to connect to any frontend framework. Filament admin panel provides a user-friendly interface for managing all content.

---

## Frontend

A companion frontend for this backend is available at [https://github.com/sami-mersha/reusable-portfolio-cms-frontend](https://github.com/sami-mersha/reusable-portfolio-cms-frontend). It provides a ready-to-use portfolio website that connects to this API.

---

## Features

- CRUD for all portfolio components via **Filament**
- Resume/CV file uploads with secure storage
- Automatic public URLs for images and resumes
- Featured projects highlighting
- Skill and experience ordering
- Ready-to-use API endpoint: `/api/portfolio`

---

## Requirements

Before setting up, ensure you have the following installed on your system:

- **PHP >= 8.1**: Download from [php.net](https://www.php.net/downloads.php)
- **Composer**: PHP dependency manager, download from [getcomposer.org](https://getcomposer.org/download/)
- **Database**: MySQL, PostgreSQL, or SQLite (MySQL recommended for beginners)
- **Node.js & NPM** (optional, only if you plan to integrate or customize the frontend)

For Windows users, you can use tools like XAMPP or WAMP to easily set up PHP and MySQL.

---

## Getting Started (Beginner-Friendly Setup)

Follow these step-by-step instructions to set up your own portfolio backend. This guide assumes you're new to Laravel and PHP.

### 1. Clone the Repository

Open your terminal (Command Prompt on Windows, Terminal on macOS/Linux) and run:

```bash
git clone https://github.com/sami-mersha/reusable-portfolio-cms-backend.git
cd reusable-portfolio-cms-backend
```

This downloads the project code to your computer.

### 2. Install PHP Dependencies

Laravel uses Composer to manage its dependencies. Run:

```bash
composer install
```

This might take a few minutes. If you get permission errors, try running as administrator (Windows) or with `sudo` (macOS/Linux).

### 3. Set Up Environment Configuration

Create a copy of the example environment file:

```bash
cp .env.example .env
```

Open the `.env` file in a text editor (like Notepad++ or VS Code) and update the database settings. For beginners using MySQL:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=portfolio_cms
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

Replace `your_username` and `your_password` with your MySQL credentials. If using SQLite (simpler for beginners):

```
DB_CONNECTION=sqlite
DB_DATABASE=/absolute/path/to/database/database.sqlite
```

### 4. Generate Application Key

Laravel needs a unique key for security:

```bash
php artisan key:generate
```

### 5. Set Up the Database

Create the database tables and populate with sample data:

```bash
php artisan migrate --seed
```

This creates all necessary tables and adds some example content.

### 6. Link Storage for File Uploads

To make uploaded files accessible via web:

```bash
php artisan storage:link
```

### 7. Start the Development Server

Launch the application:

```bash
php artisan serve
```

Your backend will be running at `http://localhost:8000`. The API is available at `http://localhost:8000/api/portfolio`.

---

## Filament Admin Panel

Manage your portfolio content through a web-based admin interface:

- **URL**: `http://localhost:8000/admin`
- **Create an admin user** (run this in terminal):

```bash
php artisan make:filament-user
```

Follow the prompts to create your admin account. All images and resumes are uploaded via Filament forms and stored securely.

---

## Next Steps

1. Visit `http://localhost:8000/admin` and log in with your admin credentials.
2. Add your profile information, projects, skills, etc.
3. Connect the frontend from [https://github.com/sami-mersha/reusable-portfolio-cms-frontend](https://github.com/sami-mersha/reusable-portfolio-cms-frontend) to display your portfolio.
4. Customize the frontend as needed for your personal branding.

For more advanced usage, check the Laravel and Filament documentation.

---

## API

### Endpoint

* **GET** `/api/portfolio` — Returns JSON with full portfolio data including `profile`, `projects`, `featured_projects`, `skills`, `experiences`, `certificates`, and resume `file_url`.

### File Access

* Images & resumes accessible via Laravel storage URLs:

```text
/storage/{filename}
```

---

## Contributing

1. Fork the repository
2. Create a new branch: `git checkout -b feature/my-feature`
3. Commit your changes: `git commit -m 'Add feature'`
4. Push: `git push origin feature/my-feature`
5. Open a Pull Request

---

## License

MIT License

---

## Author

**Samuel Mersha**

* GitHub: [sami-mersha](https://github.com/sami-mersha)
* LinkedIn: [sami-mersha](https://www.linkedin.com/in/sami-mersha)

```