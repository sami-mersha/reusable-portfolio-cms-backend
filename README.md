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

## Features

- CRUD for all portfolio components via **Filament**
- Resume/CV file uploads with secure storage
- Automatic public URLs for images and resumes
- Featured projects highlighting
- Skill and experience ordering
- Ready-to-use API endpoint: `/api/portfolio`

---

## Requirements

- PHP >= 8.1  
- Composer  
- MySQL / PostgreSQL / SQLite  
- Node.js & NPM (optional if integrating frontend)  

---

## Getting Started

### 1. Clone the repository
```bash
git clone https://github.com/sami-mersha/reusable-portfolio-cms-backend.git
cd reusable-portfolio-cms-backend
````

### 2. Install dependencies

```bash
composer install
```

### 3. Create environment file

```bash
cp .env.example .env
```

Update `.env` with your database credentials and settings.

### 4. Generate application key

```bash
php artisan key:generate
```

### 5. Run migrations and seeders

```bash
php artisan migrate --seed
```

### 6. Link storage

```bash
php artisan storage:link
```

### 7. Start the development server

```bash
php artisan serve
```

API available at `http://localhost:8000`

---

## Filament Admin Panel

Manage your content via a web-based admin interface:

* URL: `http://localhost:8000/admin`
* Create an admin user:

```bash
php artisan make:filament-user
```

All images and resumes are uploaded via Filament forms and stored in `storage/app/public`.

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