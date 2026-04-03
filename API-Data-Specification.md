# Student-Management-System

**Core**

### Rolind ###
### Dashboard
- Students Card
- Enrollments Card
- Sections Card
- Faculties Card

### Rolind ###
### User & Accounts
User Table
- name
- email
- role
- email_verified_at
View
- name
- email
- role
- email_verified_at
- fname
- mname
- lname
- gender
- birthday
- student_number/employee_number
- year_level(students)
- program_code
Store/Update
- name
- email
- role

### Rolind ###
### Faculties
Faculty Table
- fname
- mname
- lname
- gender
- employee_number
- program_code
View
- fname
- mname
- lname
- gender
- employee_number
- program_code
- birthday
Store/Update
- fname
- mname
- lname
- gender
- program_code
- birthday

### Rolind ###
### Students
Student Table
- fname
- mname
- lname
- gender
- student_number
- year_level
- program_code
View 
- fname
- mname
- lname
- gender
- student_number
- year_level
- program_code
- birthday
- enrollment
- enrollment_term
- enrollemnt_status
View Student (enrolled Subjects)
- section_code
- subject_code
- enrollment_status
Store/Update
- fname
- mname
- lname
- gender
- year_level
- program_code
- birthday

### Rolind ###
### College
College Table
- code
- title
- total_programs
- total_rooms
- total_faculties
View
- code
- title
- total_programs
- total_rooms
- total_faculties
- total_enrollments
- total_subjects
- created_at
- updated_at
Store/Update
- code
- title

### Rolind ###
### Program
Program Table
- code
- title
- college_code
- total_rooms
- total_faculties
- total_enrollments
View
- code
- title
- college_code
- total_rooms
- total_faculties
- total_enrollments
- total_subjects
Store/Update
- code
- title
- college_code

### Rolind ###
### Subjects
Subject Table
- code
- title
- program_code
- lecture
- lab
- type
View
- code
- title
- description
- program_code
- lecture
- lab
- type
- total_sections
- total_faculties
Store/Update
- code
- title
- description
- program_code
- lecture
- lab
- type

### Joseph ###
### School Years
School Year Table
- start_date
- end_date
- status
- total_enrollments
- total_sections
View
- start_date
- end_date
- status
- total_enrollments
- total_sections
Store/Update
- start_date
- end_date
- status

### Joseph ###
### Curriculum
Curriculum Table
- college_code
- program_code
- total_subjects
- year
- semester
View
- college_code
- program_code
- total_subjects
- year
- semester
- created_at
- updated_at
View Subjects (under this Curriculum)
- subject_code
- subject_title
- subject_lecture
- subject_lab
- subject_type
Store/Update
- college_code
- subjects
- year
- semester

### Joseph ###
### Terms and Semester
Terms and Semester Table
- start_date
- end_date
- status
- total_enrollments
- total_sections
View
- start_date
- end_date
- status
- total_enrollments
- total_sections
Store/Update
- start_date
- end_date
- status

### Reynard ###
### Enrollment
Enrollment Table
- student_number
- program_code
- term_semester
- student_status
View
- student_number
- program_code
- term_semester
- student_status
- created_at
- updated_at
View Enrolled Subjects 
- section_code
- subject_code
- enrollment_status
Store/Update
- student_number
- program_code
- term_semester
- student_status

### Reynard ###
### Sections
Section Table
- section_code
- faculty_employee_number
- room_code
- term_semester
- subject_code
View
- section_code
- faculty_employee_number
- room_code
- term_semester
- subject_code
- section_day
- time_start
- time_end
- max_slots
- status
View Students
- student_number
- grades
- status
Store/Update
- section_code
- faculty_employee_number
- room_code
- term_semester
- subject_code
- time_start
- time_end
- max_slots
- status
Load Student
- student_number

### Reynard ###
### Rooms
Room Table
- room_code
- room_college_code
- capacity
View
- room_code
- room_college_code
- capacity
- created_at
- updated_at
View Sections (occupying)
- section_code
- section_day
- section_start_time
- section_end_time
Store/Update
- room_code
- room_college_code
- capacity

**Core**

**Soon**
### Grade Reports
### Enrollment Reports
### Student Transcript
### Room Utilization
### Permission and Rules
### Audit Logs
**Soon**
