# Hospital Triage Application

## Overview

The Hospital Triage application helps staff and patients better understand wait times while in the emergency room. The application provides two main interfaces:

**Admin Interface:** For triage staff to manage and view the full list of patients.
**User Interface:** For patients to check their approximate wait times.
## Features

- **Patient Sign-In**: Allows patients to enter their name and a 3-letter code to check their wait time.
- **Admin Interface**: Allows admin users to view a list of all patients in the system.
- **Authentication**: Admins must sign in to access the admin interface.

## Technologies

- **Frontend**: HTML, CSS, JavaScript
- **Backend**: PHP
- **Database**: PostgreSQL
- **Server**: XAMPP

## Setup Instructions

### 1. Prerequisites

- [XAMPP](https://www.apachefriends.org/index.html) installed and running.
- PostgreSQL database server installed and running.
### 2. Database Setup

1. **Create the Database**

   ```sql
   CREATE DATABASE hospital_triage;
   CREATE TABLE patients (
    id SERIAL PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    code CHAR(3) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    );
        CREATE TABLE admins (
        id SERIAL PRIMARY KEY,
        username VARCHAR(255) UNIQUE NOT NULL,
        password VARCHAR(255) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    );
    INSERT INTO admins (username, password) VALUES ('admin', crypt('adminpassword', gen_salt('bf')));
    ```
 ### Running the Application
 
Start XAMPP

Ensure Apache and PostgreSQL services are running.

Place Files in htdocs Directory

Move the hospital-triage directory to C:\xampp\htdocs\ or the appropriate directory for your XAMPP installation.

Access the Application

Open your browser and navigate to:

Patient Sign-In: http://localhost/hospital-triage/index.html
Admin Sign-In: http://localhost/hospital-triage/admin_sign_in.html