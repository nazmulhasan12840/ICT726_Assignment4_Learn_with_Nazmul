# ICT726 Assignment 4 – Learn with Nazmul

Dynamic PHP/MySQL extension of the previous static Learn with Nazmul website.

## Features
- PHP + MySQL dynamic course catalogue
- Register, login and logout
- Password hashing with `password_hash()` / `password_verify()`
- Session authentication and role-based access control
- Normal/member/admin roles
- Course enrolment and learner dashboard
- Admin course CRUD
- Contact form stored in MySQL
- Server-side validation and HTML5 form constraints# Learn with Nazmul

## ICT726 Assignment 4 – Learning Management System

Learn with Nazmul is a PHP and MySQL based Learning Management System developed for ICT726 Assignment 4.

The system provides an online learning environment where users can register, log in, browse courses, enrol in courses and manage their learning through a dashboard.

## Main Features

- Home page with featured courses
- About Us page
- Course browsing
- Individual course details
- User registration and login
- Secure user sessions
- Course enrolment
- Student dashboard
- Admin dashboard
- Course CRUD management
- Contact/enquiry form
- Media and learning gallery
- Privacy Notice
- Responsive website design
- SEO support with `robots.txt` and `sitemap.xml`

## User Roles

### Member

Members can:

- Register an account
- Log in and log out
- Browse available courses
- Enrol in courses
- View enrolled courses from the dashboard
- Submit enquiries

### Administrator

The administrator can:

- Access the administration dashboard
- View system statistics
- Create courses
- Update courses
- Delete courses
- Manage course records

## Technologies Used

- PHP
- MySQL
- HTML5
- CSS3
- JavaScript
- XAMPP
- Git
- GitHub

## Database

The project uses MySQL to store:

- User accounts
- Course information
- Course enrolments
- Contact enquiries

The database schema is available in:

`database/schema.sql`

## Security Features

The project includes:

- Password hashing
- Prepared SQL statements
- CSRF protection for forms
- Server-side sessions
- Role-based access checks
- Restricted administration area

## SEO

The website includes:

- Page titles and descriptions
- SEO keywords
- `robots.txt`
- `sitemap.xml`
- Descriptive image alternative text

## Project Structure

```text
ICT726_Assignment4_Learn_with_Nazmul_final/
│
├── admin/
├── css/
├── database/
├── images/
├── includes/
├── js/
├── .htaccess
├── about.php
├── config.php
├── contact.php
├── course.php
├── courses.php
├── dashboard.php
├── enroll.php
├── index.php
├── login.php
├── logout.php
├── media.php
├── privacy.php
├── register.php
├── robots.txt
└── sitemap.xml
- CSRF protection on state-changing forms
- Prepared PDO statements
- Responsive CSS and accessible semantic HTML/ARIA
- SEO meta descriptions, canonical URLs, keywords, robots.txt, sitemap.xml and JSON-LD on the home page
- Interactive media gallery
- Privacy notice

## Local setup (XAMPP)
1. Copy the project folder to `htdocs`.
2. Start Apache and MySQL.
3. Import `database/schema.sql` in phpMyAdmin.
4. Check `config.php` credentials. Default XAMPP is root with an empty password.
5. Visit `http://localhost/ICT726_Assignment4_Learn_with_Nazmul_final/index.php`.

## Demo accounts
- Admin: admin@learnwithnazmul.example / Admin@12345
- Member: member@learnwithnazmul.example / Admin@12345

These credentials exist only for demonstration. Change them before real deployment.

## SEO configuration
- `config.php` uses the correct local XAMPP project path for canonical URLs and internal links.
- `sitemap.xml` contains the current local project URLs.
- `robots.txt` allows public pages while excluding admin, include and database directories.
- When deploying to a public host, update `BASE_URL`, sitemap URLs and the `Sitemap` value in `robots.txt` to the real HTTPS domain/path.

## Group contribution
This submission is being completed individually by Nazmul Hasan. The assessment brief describes a group assessment, so lecturer/tutor approval should be retained if required. Git commits should clearly show the student's individual development and progression.
