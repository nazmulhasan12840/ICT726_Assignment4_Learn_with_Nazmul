# Database setup
1. Open phpMyAdmin or MySQL CLI.
2. Import `schema.sql`.
3. Update database credentials in the root `config.php`.
4. Demo login: `admin@learnwithnazmul.example` / `Admin@12345` (change before real deployment).
5. Demo member login: `member@learnwithnazmul.example` / `Admin@12345`.

The schema uses foreign keys and a unique constraint on user/course enrolments.