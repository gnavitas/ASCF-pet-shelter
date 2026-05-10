# Animal Shelter and Care Facility (ASCF)
<img width="1032" height="581" alt="image" src="https://github.com/user-attachments/assets/e6a61b33-6552-42f3-9e1b-939791dc088b" />

<img width="1071" height="606" alt="image" src="https://github.com/user-attachments/assets/cd4a540a-b8fc-4dc5-8d88-a9b4dd1bb7e0" />
<img width="923" height="519" alt="image" src="https://github.com/user-attachments/assets/e7a6abb0-0e1b-41c2-87ab-a3ddb51ee51a" />
<img width="1055" height="519" alt="image" src="https://github.com/user-attachments/assets/680418e5-cada-4b76-b197-e5834467b9a6" />
<img width="923" height="519" alt="image" src="https://github.com/user-attachments/assets/cec31437-4513-41bb-8182-76f110d2a080" />




[![PHP Version](https://img.shields.io/badge/php-%3E%3D%207.2-8892bf.svg)](https://www.php.net/)
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)

**ASCF** is a comprehensive Online Pet Adoption and Shelter Management System designed to streamline the operations of the Animal Shelter. Established as a sanctuary for homeless and abandoned animals, this platform serves as a bridge between the shelter and the community, fostering a culture of kindness and responsible pet ownership.

## 🐾 Overview

The Animal Shelter and Care Facility (ASCF) was established on July 8, 2021. This digital platform was developed to modernize the shelter's mission of rescuing, rehabilitating, and rehoming animals.

### 🌟 Mission
To reduce the number of stray and abandoned animals by providing spay/neuter services and anti-rabies vaccinations, while promoting responsible pet ownership and animal welfare.

### 🔭 Vision
A community where every animal is valued, loved, and cared for, free from homelessness and neglect.

---
<img width="923" height="519" alt="image" src="https://github.com/user-attachments/assets/cc9a95e9-70b6-4297-a348-a50b3f405d3e" />
<img width="923" height="519" alt="image" src="https://github.com/user-attachments/assets/ff7f95ca-08ce-4bae-ba2c-f9cdf6c5333e" />


## 🚀 Key Features

- **🐶 Pet Adoption System**: A complete workflow for users to view available pets and submit adoption applications online.
- **📢 Abuse Reporting**: Allows citizens to report animal abuse cases with photo evidence and GPS location (Latitude/Longitude).
- **🔍 Missing Pet Registry**: A dedicated section to report and view missing pets to facilitate reunions.
- **🏥 Medical Services**: Online scheduling for essential services including:
  - Spay/Neuter
  - Anti-Rabies Vaccination
  - Deworming
  - Flea and Tick Treatment
- **📊 Admin Dashboard**: A robust management interface for shelter staff to handle:
  - Adoption application vetting (CI - Credit Investigation/Community Inspection)
  - Pet record management
  - User verification
  - Report processing and action tracking
- **📜 Activity Logs**: Comprehensive tracking of all administrative and user actions for transparency and security.
- **💳 Payment Integration**: Track adoption fees and service payments within the system.
- **📱 Content Management (CMS)**: Manage announcements, educational videos, and shelter updates.

---

## 🛠️ Tech Stack

- **Backend**: PHP 7.2+
- **Database**: MySQL / MariaDB
- **Frontend**: HTML5, CSS3, JavaScript, Bootstrap
- **Analysis**: Naive Bayes Algorithm implementation for report/data classification.
- **Mapping**: Integrated location services for reporting.

---

## 📥 Installation

1. **Clone the Repository**
   ```bash
   git clone https://github.com/your-username/masacf.git
   ```

2. **Database Setup**
   - Import the provided SQL file `u739402240_masacf.sql` into your MySQL database (e.g., using phpMyAdmin).
   - Configure your database credentials in `SYSTEM/db/db_con.php`.

3. **Web Server Configuration**
   - Host the `SYSTEM` directory on a local server like XAMPP, WAMP, or Laragon.
   - Ensure PHP 7.2 or higher is enabled.

4. **Access the System**
   - Open your browser and navigate to `http://localhost/masacf/SYSTEM/index.php`.

---

## 📂 Project Structure

- `SYSTEM/`: Core application files.
  - `admin/`: Administrative dashboard and functions.
  - `assets/`: Images, icons, and static resources.
  - `db/`: Database connection and configuration.
  - `function/`: Core business logic and helper scripts.
  - `uploads/`: User-uploaded images for adoptions and reports.
  - `naive_bayes/`: Implementation of the Naive Bayes classification logic.

---

## 🤝 Credits

Developed as a Thesis/Capstone project by:
- Gnavitas 2024-2025


---

## 📄 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.
