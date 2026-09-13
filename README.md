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
- Server-side validation and HTML5 form constraints
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
