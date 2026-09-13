# Database Setup

## Database Overview

The Learn with Nazmul website uses MySQL/MariaDB to store application data.

The database stores:

- User accounts and roles
- Course information
- Course enrolments
- Contact enquiries

## Database Setup

1. Open phpMyAdmin or MySQL CLI.
2. Import `schema.sql`.
3. Update the database credentials in the root `config.php`.
4. Make sure the database server is running.
5. Open the website through localhost.

## Database Relationships

The database uses foreign keys to maintain relationships between users, courses and enrolments.

A unique constraint is also used to prevent the same user from enrolling in the same course more than once.

## Main Tables

### Users

Stores registered user information, including account details and user roles.

### Courses

Stores course information displayed on the website.

### Enrolments

Connects users with the courses they have enrolled in.

### Contact Messages

Stores enquiries submitted through the contact form.

## Security

Passwords are stored using secure password hashing. Database queries use prepared statements to reduce SQL injection risks.

Database credentials should be configured locally and should not be exposed in a public repository.

## Files

- `schema.sql` – database structure and sample data
- `README.md` – database setup and documentation