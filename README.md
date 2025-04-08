# Project Name: Laboratory Management System

## Overview
This Laravel-based system offers a comprehensive solution for managing healthcare operations, including patient records, medical tests, user accounts, doctor profiles, revenue tracking, expenditure monitoring, and inventory of medical materials. It also incorporates robust authentication and authorization features to ensure secure access and efficient user role management

---

## Key Features
- **Authentication and Authorization**:
  - Secure login/logout system.
  - Role-based access control with middleware.
  - Differentiated permissions for admin, nurses, and doctors.

- **Entity Management**:
  - Full CRUD (Create, Read, Update, Delete) operations for tests, parameters, groups, patients, visits, samples, materials, revenues, and expenditures.
  - Organized workflows for data management.

- **Printing Functionality**:
  - Ability to generate printable reports for key modules such as visits, samples, revenues, and more.

- **Financial Tracking**:
  - Manage expenditures and revenues.
  - Update statuses and generate revenue reports.

- **Inventory Management**:
  - Manage materials and inventory updates and editing.

- **Custom Middleware**:
  - `AdminMiddleware` to restrict certain operations to administrators.
  - `NotNurseMiddleware` to restrict actions to users other than nurses.
  - `Authentication` for secured routes and actions.

---


### **1. Home**
- Displays the home page.
- **Route**: `/`
- **Methods**: `GET`

---

### **2. Authentication**
| Method | Endpoint    | Middleware | Description           |
|--------|-------------|------------|-----------------------|
| GET    | `/login`    | `guest`    | Displays login form.  |
| POST   | `/login`    | `guest`    | Logs in the user.     |
| POST   | `/logout`   | `auth`     | Logs out the user.    |

---

### **3. Tests Management**
Allows adding , updating , deleting , and printing tests records 

---

### **4. Parameters Management**
Similar to the tests module, this manages diagnostic parameters.

---

### **5. Patients Management**
Allows adding, updating, deleting, and printing patient records.

---

### **6. Visits Management**
Supports creating visits, assigning results, and printing reports.

---

### **7. Samples Management**
Tracks sample statuses and generates printable reports.

---

### **8. Financial Management**
Includes modules for expenditures and revenues:
- Record transactions.
- Update revenue statuses.
- Print financial reports.

---

### **9. Materials Management**
Supports inventory control, including CRUD operations and printable details.

---

### **10. User Management**
Admin-only module to manage platform users.

---

## Technologies Used
- **Backend Framework**: Laravel
- **Middleware**: Authentication, Role-Based Access Control
- **Frontend**: Blade, Tailwind
- **Database**: Relational Database (MySQL)

