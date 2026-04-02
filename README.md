# Student Management System

This **Student Management System** is a robust, role-based platform designed to streamline academic operations, from enrollment and curriculum management to grading and official reporting. Built with a modern tech stack, the system provides a reactive, single-page application (SPA) experience tailored to the specific needs of administrators, faculty, and students.

---

## 🚀 Technology Stack

The system leverages a high-performance, full-stack architecture:

- **Frontend:** React + Inertia.js + Tailwind CSS for a reactive UI with server-side routing.  
- **Backend:** Laravel 11+ handling business logic, REST APIs, and authentication.  
- **Database:** MySQL or PostgreSQL for relational data integrity.  
- **Cache/Queue:** Redis for session caching, job queues, and real-time counters.  
- **Security:** Laravel Sanctum for token authentication and Spatie Permission for Role-Based Access Control (RBAC).  

---

## 🔑 Key Features

### 1. Role-Based Access Control (RBAC)

The interface dynamically adapts based on the user's role, ensuring data security and a focused user experience:

- **Super Admin:** Full system access and global configuration.  
- **Registrar:** Focuses on student records, enrollment, and sections.  
- **Dean/Program Head:** Manages academic programs, curricula, and teacher assignments.  
- **Teacher:** Handles grading, schedules, and assigned sections.  
- **Student:** Accesses personal profiles, grades, and enrollment tools.  

### 2. Academic & Curriculum Management

- **Flexible Curriculum:** Build structured programs by year level and term with a drag-and-drop builder.  
- **Prerequisite Tracking:** Define complex subject chains with visual builders and automated conflict/circular dependency detection.  
- **School Year/Term Management:** Easily activate, archive, and manage academic periods.  

### 3. Enrollment & Scheduling

- **Step-by-Step Enrollment:** A wizard-based process for students to select programs and subjects while enforcing prerequisite and unit limits.  
- **Section Management:** Create class sections with teacher and room assignments, featuring automated conflict detection to prevent double-booking.  
- **Weekly Calendar Views:** Visual grids for room utilization and teacher/student schedules.  

### 4. Grading & Reporting

- **Teacher Grade Entry:** Inline table entry supporting Midterm and Final breakdowns with automated final grade computation.  
- **Official Documents:** Generate print-ready Transcripts of Records (TOR), Enrollment Reports, and Teacher Load Reports in PDF or Excel formats.  

---

## 🛠️ System Requirements & Performance

- **Performance:** Optimized for page loads under 2 seconds and API responses under 500ms.  
- **Scalability:** Supports 5,000+ students and 500+ teachers.  
- **Auditability:** Every create, update, or delete action is logged with an actor and timestamp for full transparency.  
- **Accessibility:** Fully keyboard-navigable and WCAG 2.1 AA compliant.  

---

## 📂 Navigation Structure

The sidebar is organized into logical modules:

- **Dashboard:** System-wide KPIs and recent activity feeds.  
- **People:** Management of Students, Teachers, and User Accounts.  
- **Academic:** Departments, Programs, Subjects, and Curriculum building.  
- **Enrollment:** Section management, room assignments, and add/drop actions.  
- **System:** Audit logs, RBAC permissions, and global school settings.
