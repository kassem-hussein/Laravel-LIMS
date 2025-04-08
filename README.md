# Project Name: Comprehensive Management System

## Overview
The Comprehensive Management System is a robust platform designed to streamline the management of various entities in an organization. It leverages modern web technologies and middleware to provide role-based access, secure authentication, and efficient workflows. This project is particularly suited for industries like healthcare, laboratories, or business operations, where managing tests, patients, visits, samples, finances, and users is critical.

---

## Key Features
- **Authentication and Authorization**:
  - Secure login/logout system.
  - Role-based access control with middleware.
  - Differentiated permissions for admin, nurses, and guests.

- **Entity Management**:
  - Full CRUD (Create, Read, Update, Delete) operations for tests, parameters, groups, patients, visits, samples, materials, revenues, and expenditures.
  - Organized workflows for data management.

- **Printing Functionality**:
  - Ability to generate printable reports for key modules such as visits, samples, revenues, and more.

- **Financial Tracking**:
  - Manage expenditures and revenues.
  - Update statuses and generate revenue reports.

- **Inventory Management**:
  - Manage materials and inventory with real-time status updates and editing.

- **Custom Middleware**:
  - `AdminMiddleware` to restrict certain operations to administrators.
  - `NotNurseMiddleware` to restrict actions to users other than nurses.
  - `Authentication` for secured routes and actions.

---

## Modules and Endpoints

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
| Method | Endpoint          | Middleware             | Description             |
|--------|-------------------|------------------------|-------------------------|
| GET    | `/tests`          | `Authentication`, `NotNurseMiddleware` | List all tests. |
| POST   | `/tests`          | `Authentication`, `NotNurseMiddleware` | Create a new test. |
| GET    | `/tests/add`      | `Authentication`, `NotNurseMiddleware` | Form to add a test. |
| GET    | `/tests/{id}/edit` | `Authentication`, `NotNurseMiddleware` | Edit test details. |
| PUT    | `/tests/{id}`     | `Authentication`, `NotNurseMiddleware` | Update a test. |
| DELETE | `/tests/{id}`     | `Authentication`, `NotNurseMiddleware` | Delete a test. |
| GET    | `/tests/print`    | `Authentication`, `NotNurseMiddleware` | Print test details. |

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
- **Frontend**: Custom UI (not explicitly mentioned but implied)
- **Database**: Relational Database (MySQL)

