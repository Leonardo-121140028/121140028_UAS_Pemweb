# Library User Account Management - README

## Description
This project demonstrates a comprehensive approach to web development, incorporating client-side and server-side programming, database management, and state management. It features a web interface for user interaction and backend processing using PHP and MySQL.

## Client-side Programming

### Web Page with DOM Manipulation
- **Overview**: A simple yet interactive web page using JavaScript for DOM manipulation.
- **Features**:
  - A form with various input elements like text, checkbox, radio buttons.
  - JavaScript is used to dynamically display data in a table format.

### Event Handling in JavaScript
- **Overview**: Implementing JavaScript events for enhanced user interaction.
- **Features**:
  - Events for form submission, input validation, and dynamic content updates.
  - Client-side validation for form inputs to ensure data integrity before submission.

## Server-side Programming

### PHP Script for Form Data Processing
- **Overview**: PHP scripts handle and process data from the client-side form.
- **Features**:
  - Utilizes `$_POST` and `$_GET` for data retrieval.
  - Server-side validation and data parsing.
  - Data storage in MySQL database, including user's browser type and IP address.

### Object-Oriented PHP
- **Overview**: Usage of object-oriented programming (OOP) concepts in PHP.
- **Features**:
  - PHP objects with methods relevant to web application functionalities.

## Database Management

### MySQL Database Table Creation
- **Overview**: Steps and syntax for creating a MySQL database table.
- **Syntax**: Provided in `perpustakaan.sql`.

### Database Connection Configuration
- **Overview**: Configuration of PHP file for MySQL database connection.
- **Details**: Uses constants/variables for database connection parameters.

### SQL Data Manipulation
- **Overview**: Manipulating data in the database using SQL queries.
- **Features**:
  - SQL queries for inserting, retrieving, and updating user data.

## State Management

### PHP Session Management
- **Overview**: Implementation of session management in PHP.
- **Features**:
  - Use of `session_start()` for session handling.
  - Storage of user information in session variables.


### Client-side State Management with JavaScript
- **Overview**: Managing state using cookies and browser storage in JavaScript.
- **Features**:
  - Functions to manage cookies.
  - Utilization of browser storage for storing local data.

Absolutely, the text can be formatted to fit into a `README.md` document for your project. Here's how you can incorporate it:

---

## Bonus (Web Hosting)

We embarked on our web development journey by securing a hosting plan and a domain at "geminiguys.my.id" with RumahWeb. The subsequent provision of cPanel access set the stage for our website's deployment.

### Subdomain Configuration

Each team member was allocated a subdomain, with mine being "rayhan.geminiguys.my.id". This action also generated a corresponding directory within the `public_html` folder, laying the groundwork for our individual web spaces.

### Database Setup and Import

Through the cPanel's MySQL database manager, I crafted a new database, ensuring to create and authorize a MySQL user for this database. Leveraging phpMyAdmin, I imported the essential "uas_pemweb.sql" file, setting the database's structure and initial content.

### File Management and Configuration

With the database ready, I uploaded the website files to the specified directory via the cPanel file manager. The final step in the setup involved tweaking the `koneksi.php` file to match the updated database configurations.

### Hosting Selection Rationale

Opting for RumahWeb's services fulfilled our requirements for the Web Programming Final Project splendidly. The balance between affordability for annual hosting, reliable customer service, and unwavering website uptime was crucial in our decision-making process.

### Security Measures

We safeguard our web project by diligently managing access to our database configurations and cPanel details, essential in preventing unauthorized intrusions. Enabling HTTPS has further solidified our website's security posture.

### Server Specifications

By utilizing subdomains, we've optimized our resource distribution strategy. Our chosen hosting package boasts unlimited bandwidth, ample storage, and an abundance of MySQL databases, all within RumahWeb's prescribed service parameters.
