# 🎟️ Event Booking API

A RESTful API built using Laravel for managing events and bookings.
This project allows users to register, login, browse events, and book tickets.

---

## 🚀 Features

* 🔐 Authentication (Register / Login / Logout)
* 👤 User Profile
* 📂 Category Management (CRUD)
* 🎉 Event Management (CRUD)
* 🎟️ Booking System
* 🛡️ Secure API with validation and protection (CSRF, XSS)

---

## 🛠️ Tech Stack

* PHP
* Laravel
* MySQL
* Postman

---

## 📌 API Endpoints

### 🔐 Auth

* `POST /api/register`
* `POST /api/login`
* `GET /api/profile`
* `POST /api/logout`

---

### 📂 Categories

* `GET /api/categories`
* `GET /api/categories/{id}`
* `POST /api/categories`
* `PUT /api/categories/{id}`
* `DELETE /api/categories/{id}`

---

### 🎉 Events

* `GET /api/events`
* `GET /api/events/{id}`
* `POST /api/events`
* `PUT /api/events/{id}`
* `DELETE /api/events/{id}`

---

### 🎟️ Bookings

* `POST /api/bookings`
* `GET /api/bookings`
* `GET /api/bookings/{id}`
* `PUT /api/bookings/{id}`
* `DELETE /api/bookings/{id}`

---

## 📦 Installation

```bash
git clone https://github.com/youssefmarey/event-booking-api.git
cd event-booking-api
composer install
cp .env.example .env
php artisan key:generate
```

---

## ⚙️ Setup

* Configure your database in `.env`
* Run migrations:

```bash
php artisan migrate
```

* Start the server:

```bash
php artisan serve
```

---

## 🔑 Authentication

This API uses token-based authentication.
Include the token in the header:

```
Authorization: Bearer YOUR_TOKEN
```

---

## 📬 Example Response

```json
{
  "status": true,
  "message": "Event created successfully",
  "data": {
    "id": 1,
    "title": "Music Event"
  }
}
```

---

## 📬 Postman Collection
Import it from: docs/postman_collection.json

---

## 📸 Testing

You can test all endpoints using Postman.

---

## 📈 Future Improvements

* Add payment integration
* Email notifications
* Admin dashboard

---

## 👨‍💻 Author

**Youssef Marey**
Backend Developer (PHP / Laravel)
