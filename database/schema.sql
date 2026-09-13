CREATE DATABASE IF NOT EXISTS learn_with_nazmul CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE learn_with_nazmul;

CREATE TABLE users (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  full_name VARCHAR(100) NOT NULL,
  email VARCHAR(150) NOT NULL UNIQUE,
  password_hash VARCHAR(255) NOT NULL,
  role ENUM('normal','member','admin') NOT NULL DEFAULT 'normal',
  created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

CREATE TABLE courses (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(120) NOT NULL,
  short_description VARCHAR(500) NOT NULL,
  description TEXT NOT NULL,
  topics VARCHAR(255) NOT NULL,
  level VARCHAR(40) NOT NULL,
  image VARCHAR(255) NOT NULL,
  is_active TINYINT(1) NOT NULL DEFAULT 1,
  created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

CREATE TABLE enrollments (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  user_id INT UNSIGNED NOT NULL,
  course_id INT UNSIGNED NOT NULL,
  enrolled_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  UNIQUE KEY uq_enrolment (user_id, course_id),
  CONSTRAINT fk_enrol_user FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
  CONSTRAINT fk_enrol_course FOREIGN KEY (course_id) REFERENCES courses(id) ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE contacts (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  user_id INT UNSIGNED NULL,
  name VARCHAR(100) NOT NULL,
  email VARCHAR(150) NOT NULL,
  subject VARCHAR(120) NOT NULL,
  message VARCHAR(1000) NOT NULL,
  created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  CONSTRAINT fk_contact_user FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL
) ENGINE=InnoDB;

INSERT INTO courses(title,short_description,description,topics,level,image) VALUES
('Web Development','Learn the foundations of website development using HTML, CSS and JavaScript.','Build an understanding of page structure, styling, responsive layouts and basic client-side interaction.','HTML, CSS, JavaScript','Beginners','course-web-development.jpg'),
('Data Analytics','Develop an introduction to data analysis, visualisation and interpreting information.','Explore basic data concepts, charts and practical ways of communicating information to support informed decision making.','Data, charts, visualisation','Beginners','course-data-analytics.jpg'),
('Artificial Intelligence','Explore the basic concepts of artificial intelligence and modern applications.','Understand introductory AI concepts and how intelligent technologies can be used in practical applications.','AI, machine learning, applications','Intermediate','course-artificial-intelligence.jpg'),
('Cyber Security','Learn fundamental concepts of cyber security and digital safety.','Develop awareness of online threats, password security, safe digital behaviour and responsible technology use.','Digital safety, threats, security','Intermediate','course-cyber-security.jpg'),
('Academic Skills','Develop useful academic skills for organising study activities.','Improve study organisation, research habits and digital learning practices.','Study skills, organisation, research','Students','course-academic-skills.jpg'),
('Digital Skills','Build practical digital skills and confidence with common online tools.','Develop confidence when using digital resources, productivity tools and everyday technology.','Digital tools, online resources, technology','Beginners','course-digital-skills.jpg');

-- Demo admin/member accounts. Change passwords before any real deployment.
INSERT INTO users(full_name,email,password_hash,role) VALUES
('Site Administrator','admin@learnwithnazmul.example','$2y$12$bMLjiv.RrVWmXFHG9d/okONY4EpsuoCKXZbL3usLXHb/./3lxIuTK','admin'),
('Demo Member','member@learnwithnazmul.example','$2y$12$bMLjiv.RrVWmXFHG9d/okONY4EpsuoCKXZbL3usLXHb/./3lxIuTK','member');
