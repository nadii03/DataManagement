# Flight Booking System

This is a simple Flight Booking System developed using PHP and MySQL.

## Getting Started

Follow these instructions to get a copy of the project up and running on your local machine for development and testing purposes.

### Prerequisites

- [XAMPP](https://www.apachefriends.org/index.html) or [WampServer](https://www.wampserver.com/en/) or any other local server with PHP and MySQL.

### Installation

1. Clone the repository to your local machine:

```bash
https://github.com/Jumaana-bit/DataManagement-
```

2. Start your local server (XAMPP, WampServer, etc.).

3. Import the provided SQL file into phpMyAdmin to create the necessary database:
  - Open phpMyAdmin in your browser (usually [http://localhost/phpmyadmin](http://localhost/phpmyadmin)).
  
  - Create a new database (e.g., `phase2`).

  - Select the newly created database.

  - Import the SQL file provided (`phase2.sql`). This file is located in the project's root directory.

  - Open `config.php` in the `includes` folder.

  - Update the database connection details if necessary. You may need to modify the host, username, password, and database based on your local setup.
  
### Usage
1. Open the project in your web browser:
```bash
http://localhost/DataManagement-/home.php
``` 
2. Fill in the required information:
  - Start by entering IATA codes for the departure and destination airports (e.g., YYZ -> DXB).
  - The date range between departure and return should not exceed 30 days.
3. Explore the system:
  - Complete the booking process by entering passenger details and making the payment.
  - View your booking details and download the boarding pass.

### Built With
  - PHP
  - MySQL
  - HTML/CSS
  - Bootstrap (for styling)

### Demo
https://github.com/user-attachments/assets/242d7f6c-9198-42be-8856-34a77cb946af

