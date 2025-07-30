# HelloEveryone 🌐👥

> A modern, multi-user collaboration platform built with PHP, MySQL, and XAMPP — featuring secure authentication, file sharing, and direct file links for convenient access.

---

## 🚀 Project Overview

**HelloEveryone** is a professional-grade multi-user web application designed for collaborative workspaces, file sharing, and user management with a focus on simplicity, security, and scalability.

With HelloEveryone, users can:

- Register and log in securely 🔐
- Manage their profiles 🧑‍💻
- Upload and download files 📤📥
- Collaborate through shared file centers
- Share files instantly via **public URL generator** for quick access and direct downloads 🚀 (planned future feature!)

This project is perfect as a foundation for school, office, or team collaboration portals and can evolve into a full-featured platform with admin controls and real-time communication.

---

## 🛠️ Technology Stack

- **PHP** (7.x/8.x) – Server-side scripting  
- **MySQL / MariaDB** (via XAMPP) – Database management  
- **XAMPP** – Local development environment  
- **HTML5, CSS3, JavaScript** – Frontend UI and interactivity  
- **PDO** – Secure database connections with prepared statements  
- **Apache** (via XAMPP) – Web server

---

## 📁 Project Folder Structure

HelloEveryone/  
├── assets/  
│   ├── css/ # Stylesheets (includes advanced CSS for responsive UI)  
│   ├── js/ # JavaScript files for client-side interactivity (optional)  
│   └── images/ # Logos, icons, and static images  
├── auth/ # Authentication pages: login, register, logout  
├── config/ # Configuration files for DB connection, app constants  
├── database/ # SQL schema files and migration scripts  
├── includes/ # Reusable UI fragments: header, footer, nav  
├── pages/ # Main application pages (dashboard, file center, profile, about)  
├── uploads/ # Uploaded user files (excluded from git)  
├── tests/ # Optional test scripts (manual or automated)  
├── download.php # Direct download handler by token  
├── index.php # Landing/welcome page of the app  
└── .gitignore # Git ignore rules to exclude sensitive and unnecessary files  

---

## 🏗️ Development Steps Completed

1. **Project setup and folder organization** for maintainability and scalability  
2. **Database creation** and `users` table design to support multiple roles  
3. **Secure PDO-based database connection setup**  
4. **User authentication system** with registration, login, logout, and session management  
5. **User dashboard** with role display and protected pages  
6. **File center** for authenticated users to upload/download files  
7. **User profile management** allowing email and password updates  
8. **About page** describing the project and developer contact  
9. **Advanced CSS styling** for a modern and responsive UI  
10. **Messaging system (optional, can be added later)**  
11. **Direct File Share (planned):**  
    - Allows anonymous uploads without login  
    - Generates public, unique URLs for instant file sharing and direct downloads  

---

## 🎯 Benefits of Using HelloEveryone

- **Simple yet powerful multi-user structure**, ideal for small to medium teams  
- **Secure authentication** with password hashing and session control  
- **Flexible file sharing and management**, supporting any file type  
- **Modular and extensible codebase**, easy to maintain or add new features  
- **Direct file sharing via public URLs** (future enhancement) makes quick file access effortless  
- **Clean UI and responsive design** for great user experience across devices  
- **Self-hosted on XAMPP**, easily deployable on local networks or production servers

---

## 📷 App Screenshot Gallery

### 📝 Registration Page  
![Registration](https://github.com/shodhanshetty12/HelloEveryone/blob/main/img/reg.jpg?raw=true)

### 🔑 Login Page  
![Login](https://github.com/shodhanshetty12/HelloEveryone/blob/main/img/log.jpg?raw=true)

### ✅ Logged-in View  
![Logged In](https://github.com/shodhanshetty12/HelloEveryone/blob/main/img/loggedin.jpg?raw=true)

### 📂 File Section  
![File Section](https://github.com/shodhanshetty12/HelloEveryone/blob/main/img/file%20section.jpg?raw=true)

### ⬆️ Uploaded Confirmation  
![Uploaded](https://github.com/shodhanshetty12/HelloEveryone/blob/main/img/uploaded.jpg?raw=true)

### 👤 New User Page  
![New User](https://github.com/shodhanshetty12/HelloEveryone/blob/main/img/newuser.jpg?raw=true)

### ⬇️ Downloading as New User  
![Downloading](https://github.com/shodhanshetty12/HelloEveryone/blob/main/img/downloadinginnewuser.jpg?raw=true)

### 📌 Misc Image  
![Custom Screenshot](https://github.com/shodhanshetty12/HelloEveryone/blob/main/img/7e0268b5-3af1-4818-bb9b-b5331ce2610c.png?raw=true)


---

## 📄 How to Set Up Locally (Summary of Core Steps)

1. Install and run **XAMPP** (start Apache & MySQL services)  
2. Import provided **database schema** into phpMyAdmin or via MySQL shell  
3. Configure **database connection** in `config/database.php` (default user: root, password: empty)  
4. Place files in `htdocs/HelloEveryone` folder of your XAMPP install  
5. Access `http://localhost/HelloEveryone/` in your web browser  
6. Register new users and explore features (dashboard, file center, profile)  
7. For direct file sharing (when added), visit the dedicated **Direct Share** section for anonymous uploads and link generation

---
## 🔐 Authentication Flow

### 📝 Registration Page  
![Registration](https://github.com/shodhabshetty12/HelloEveryone/img/reg.jpg?raw=true)

### 🔑 Login Page  
![Login](https://github.com/shodhabshetty12/HelloEveryone/img/log.jpg?raw=true)

### ✅ Logged-in View  
![Logged In](https://github.com/shodhabshetty12/HelloEveryone/img/loggedin.jpg?raw=true)

---

## 📁 File Handling Section

### 📂 File Section  
![File Section](https://github.com/shodhabshetty12/HelloEveryone/img/file%20section.jpg?raw=true)

### ⬆️ File Uploaded  
![Uploaded](https://github.com/shodhabshetty12/HelloEveryone/img/uploaded.jpg?raw=true)

---

## 👥 New User Interaction

### 🙋‍♂️ New User Page  
![New User](https://github.com/shodhabshetty12/HelloEveryone/img/newuser.png?raw=true)

### ⬇️ Download as New User  
![Download New User](https://github.com/shodhabshetty12/HelloEveryone/img/downloadinginnewuser.png?raw=true)

---


## 📬 Contact & Contribution

- **Developer:** Shodhan Kumar Shetty  
- **Email:** [shodhankumarshetty963@gmail.com](mailto:shodhankumarshetty963@gmail.com)  
- **GitHub:** [https://github.com/shodhanshetty12](https://github.com/shodhanshetty12) (Add your repo link here)  
- Contributions, suggestions, and issue reports are warmly welcome!

---

## ❤️ Thank You for Exploring HelloEveryone!

This project is designed to be your starting point for creating collaborative, secure, and user-friendly web platforms. Whether a school application, file-sharing site, or internal team hub, HelloEveryone grows with you.

Feel free to fork, improve, and share your ideas! Together, we can build a more connected and productive web.

---

*Made  by Shodhan Kumar Shetty*
