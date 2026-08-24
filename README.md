# 🏨 Hotel Booking Platform

A modern **Hotel Booking Platform** built using **HTML, Bootstrap, PHP, and MySQL**. The system allows customers to browse hotels, view room details, check availability, make reservations, and receive booking notifications through email.

## 📌 Project Description

The Hotel Booking Platform is a web-based application designed to simplify the hotel reservation process. Customers can explore available rooms, select their preferred dates, provide booking information, and complete their reservation through an easy-to-use interface.

The platform also includes an **administration system** where administrators can manage hotels, rooms, bookings, customers, and other website content.

## 🚀 Technologies Used

* **HTML5** – Website structure
* **CSS3** – Custom styling
* **Bootstrap** – Responsive and modern UI design
* **JavaScript** – Client-side interactions and validation
* **PHP** – Backend development and server-side processing
* **MySQL** – Database management
* **PHPMailer** – Email notifications and booking confirmations

## ✨ Features

### 👤 Customer Features

* User registration and login
* Browse available hotels and rooms
* View detailed room information
* Check room availability
* Select check-in and check-out dates
* Make hotel reservations
* View booking information
* Receive booking confirmation emails
* Responsive design for desktop, tablet, and mobile devices

### 🔐 Admin Features

* Admin authentication
* Dashboard
* Manage rooms
* Manage room availability
* Manage customers
* View and manage bookings
* Update booking status
* Manage hotel information
* Monitor reservations

### 📧 Email Notifications

The system uses **PHPMailer** to send automated emails such as:

* Booking confirmation
* Reservation details
* Booking status notifications
* Customer communication

## 🗂️ Project Structure

```text
Hotel-Booking-Platform/
│
├── admin/
│   ├── dashboard.php
│   ├── bookings.php
│   ├── rooms.php
│   └── users.php
│
├── assets/
│   ├── css/
│   ├── js/
│   └── images/
│
├── includes/
│   ├── config.php
│   ├── database.php
│   └── functions.php
│
├── phpmailer/
│
├── index.php
├── login.php
├── register.php
├── rooms.php
├── booking.php
├── confirmation.php
└── README.md
```

> The exact folder structure may vary depending on your implementation.

## ⚙️ Installation

### 1. Clone the Repository

```bash
git clone https://github.com/Tshewangtjp/Hotel-Booking-Platform.git
```

### 2. Move the Project

Place the project inside your XAMPP `htdocs` directory:

```text
C:\xampp\htdocs\Hotel-Booking-Platform
```

### 3. Start XAMPP

Start:

* Apache
* MySQL

### 4. Create the Database

Open **phpMyAdmin** and create a database, for example:

```text
hotel_booking
```

Import the project's SQL database file if one is included.

### 5. Configure Database Connection

Update your PHP database configuration with your MySQL credentials:

```php
$host = "localhost";
$username = "root";
$password = "";
$database = "hotel_booking";
```

### 6. Configure PHPMailer

Configure your SMTP credentials in the email configuration file.

Example:

```php
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'your-email@gmail.com';
$mail->Password = 'your-app-password';
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 587;
```

**Do not upload real SMTP passwords or API credentials to GitHub.**

### 7. Run the Website

Open your browser and visit:

```text
http://localhost/Hotel-Booking-Platform/
```

## 🗄️ Database

The MySQL database stores information such as:

* Users
* Hotels
* Rooms
* Room availability
* Bookings
* Payments
* Booking status
* Customer information

## 🔒 Security

The application should use:

* Password hashing
* Prepared SQL statements
* Input validation
* Session authentication
* Secure email credentials
* Access control for admin pages

Never commit files containing production passwords, SMTP credentials, database passwords, or other secrets.

## 📱 Responsive Design

The platform uses **Bootstrap** to provide a responsive interface that works across:

* 💻 Desktop
* 💻 Laptop
* 📱 Mobile
* 📱 Tablet

## 🔮 Future Improvements

Possible future enhancements include:

* Online payment gateway integration
* Hotel reviews and ratings
* Advanced hotel filtering
* Google Maps integration
* Booking cancellation and refund system
* Customer dashboard
* Promotional coupons
* PDF booking invoices
* Multi-language support
* REST API integration

## 👨‍💻 Author

**Tshewang T. J. P.**

## 📄 License

This project is developed for **educational and project purposes**. You may modify and extend it according to your requirements.
