# NCS Lab Database Schema Documentation

## Entity Relationship Diagram (ERD)

```
┌─────────────────────────────────┐
│            Members              │
│                                 │
├─────────────────────────────────┤
│ - id (PK)                       │
│ - member_name (varchar(255))    │
│ - member_role (varchar(255))    │
│ - member_phone (varchar(255))   │
│ - member_email (varchar(255))   │
│ - member_address (text)         │
│ - created_at (timestamp)        │
│ - updated_at (timestamp)        │
└─────────────────────────────────┘
                │
                │ 1:N (member_id)
                ▼
┌─────────────────────────────────┐
│            Admins               │
│                                 │
├─────────────────────────────────┤
│ - id (PK)                       │
│ - username (varchar(255))       │
│ - email (varchar(255))          │
│ - password_hash (varchar(255))  │
│ - role (varchar(255))           │
│ - member_id (FK)                │
│ - created_at (timestamp)        │
│ - updated_at (timestamp)        │
└─────────────────────────────────┘
                │
                │ 1:N (uploaded_by)
                ├─────────────────────────────────┐
                │                                 │
                ▼                                 ▼
┌─────────────────────────────────┐    ┌─────────────────────────────────┐
│           Archives              │    │           Galleries             │
│                                 │    │                                 │
├─────────────────────────────────┤    ├─────────────────────────────────┤
│ - id (PK)                       │    │ - id (PK)                       │
│ - title (varchar(255))          │    │ - title (varchar(255))          │
│ - description (text)            │    │ - description (text)            │
│ - file_path (varchar(255))      │    │ - file_path (varchar(255))      │
│ - category (varchar(255))       │    │ - gallery_type (varchar(255))   │
│ - type (varchar(255))           │    │ - event_date (date)             │
│ - publication (varchar(255))    │    │ - event_time (time)             │
│ - year (varchar(255))           │    │ - location (varchar(255))       │
│ - cover_image (varchar(255))    │    │ - max_slots (integer)           │
│ - author_id (FK)                │    │ - registered_count (integer)    │
│ - uploaded_by (FK)              │    │ - event_status (varchar(255))   │
│ - created_at (timestamp)        │    │ - event_mode (varchar(255))     │
│ - updated_at (timestamp)        │    │ - event_category (text)         │
└─────────────────────────────────┘    │ - uploaded_by (FK)              │
                ▲                      │ - created_at (timestamp)        │
                │ N:1 (author_id)      │ - updated_at (timestamp)        │
                │                      └─────────────────────────────────┘
                │
┌─────────────────────────────────┐
│            Members              │
│         (Author relation)       │
└─────────────────────────────────┘

┌─────────────────────────────────┐
│            Admins               │
│                                 │
└─────────────────────────────────┘
                │
                │ 1:N (admin_id)
                ▼
┌─────────────────────────────────┐
│          Admin_Logs             │
│                                 │
├─────────────────────────────────┤
│ - id (PK)                       │
│ - admin_id (FK)                 │
│ - action (varchar(255))         │
│ - table_name (varchar(255))     │
│ - record_id (bigint)            │
│ - description (text)            │
│ - created_at (timestamp)        │
│ - updated_at (timestamp)        │
└─────────────────────────────────┘

┌─────────────────────────────────┐
│            Admins               │
│                                 │
└─────────────────────────────────┘
                │
                │ 1:N (uploaded_by)
                ▼
┌─────────────────────────────────┐
│       Community_Services        │
│                                 │
├─────────────────────────────────┤
│ - id (PK)                       │
│ - title (varchar(255))          │
│ - description (text)            │
│ - date (date)                   │
│ - location (varchar(255))       │
│ - participants (integer)        │
│ - category (enum)               │
│ - status (enum)                 │
│ - image (varchar(255))          │
│ - uploaded_by (FK)              │
│ - created_at (timestamp)        │
│ - updated_at (timestamp)        │
└─────────────────────────────────┘

┌─────────────────────────────────┐
│          Categories             │
│                                 │
├─────────────────────────────────┤
│ - id (PK)                       │
│ - name (varchar(255))           │
│ - created_at (timestamp)        │
│ - updated_at (timestamp)        │
└─────────────────────────────────┘

┌─────────────────────────────────┐
│            Links                │
│                                 │
├─────────────────────────────────┤
│ - id (PK)                       │
│ - name (varchar(255))           │
│ - url (varchar(255))            │
│ - description (text)            │
│ - created_at (timestamp)        │
│ - updated_at (timestamp)        │
└─────────────────────────────────┘
```

## Database Relationships

### 1. Members → Admins (1:N)
- **Relationship**: One member can be linked to one admin account
- **Foreign Key**: `admins.member_id` → `members.id`
- **Purpose**: Links admin accounts to actual laboratory members for profile information

### 2. Members → Archives (1:N as Author)
- **Relationship**: One member can author multiple research documents
- **Foreign Key**: `archives.author_id` → `members.id`
- **Purpose**: Tracks who authored each research publication

### 3. Admins → Archives (1:N as Uploader)
- **Relationship**: One admin can upload multiple archives
- **Foreign Key**: `archives.uploaded_by` → `admins.id`
- **Purpose**: Tracks who uploaded each document to the system

### 4. Admins → Galleries (1:N)
- **Relationship**: One admin can upload multiple gallery items
- **Foreign Key**: `galleries.uploaded_by` → `admins.id`
- **Purpose**: Tracks who uploaded each gallery item/event

### 5. Admins → Community_Services (1:N)
- **Relationship**: One admin can create multiple community service events
- **Foreign Key**: `community_services.uploaded_by` → `admins.id`
- **Purpose**: Tracks who created each community service event

### 6. Admins → Admin_Logs (1:N)
- **Relationship**: One admin can have multiple log entries
- **Foreign Key**: `admin_logs.admin_id` → `admins.id`
- **Purpose**: Audit trail for admin activities

## Complete SQL Schema

```sql
-- Members table
CREATE TABLE `members` (
    `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
    `member_name` varchar(255) NOT NULL,
    `member_role` varchar(255) NOT NULL,
    `member_phone` varchar(255) DEFAULT NULL,
    `member_email` varchar(255) DEFAULT NULL,
    `member_address` text DEFAULT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL,
    PRIMARY KEY (`id`)
);

-- Admins table
CREATE TABLE `admins` (
    `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
    `username` varchar(255) NOT NULL,
    `email` varchar(255) NOT NULL,
    `password_hash` varchar(255) NOT NULL,
    `role` varchar(255) NOT NULL DEFAULT 'admin',
    `member_id` bigint(20) UNSIGNED DEFAULT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `admins_username_unique` (`username`),
    UNIQUE KEY `admins_email_unique` (`email`),
    KEY `admins_member_id_foreign` (`member_id`),
    CONSTRAINT `admins_member_id_foreign` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`) ON DELETE SET NULL
);

-- Categories table
CREATE TABLE `categories` (
    `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
    `name` varchar(255) NOT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `categories_name_unique` (`name`)
);

-- Archives table
CREATE TABLE `archives` (
    `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
    `title` varchar(255) NOT NULL,
    `description` text DEFAULT NULL,
    `publication` varchar(255) DEFAULT NULL,
    `year` varchar(255) DEFAULT NULL,
    `cover_image` varchar(255) DEFAULT NULL,
    `author_id` bigint(20) UNSIGNED DEFAULT NULL,
    `file_path` varchar(255) NOT NULL,
    `category` varchar(255) NOT NULL,
    `type` varchar(255) NOT NULL DEFAULT 'document',
    `uploaded_by` bigint(20) UNSIGNED DEFAULT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `archives_author_id_foreign` (`author_id`),
    KEY `archives_uploaded_by_foreign` (`uploaded_by`),
    CONSTRAINT `archives_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `members` (`id`) ON DELETE SET NULL,
    CONSTRAINT `archives_uploaded_by_foreign` FOREIGN KEY (`uploaded_by`) REFERENCES `admins` (`id`) ON DELETE SET NULL
);

-- Galleries table
CREATE TABLE `galleries` (
    `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
    `title` varchar(255) NOT NULL,
    `description` text DEFAULT NULL,
    `event_date` date DEFAULT NULL,
    `event_time` time DEFAULT NULL,
    `location` varchar(255) DEFAULT NULL,
    `max_slots` int(11) DEFAULT NULL,
    `registered_count` int(11) NOT NULL DEFAULT 0,
    `event_status` varchar(255) NOT NULL DEFAULT 'upcoming',
    `event_mode` varchar(255) DEFAULT NULL,
    `event_category` text DEFAULT NULL,
    `file_path` varchar(255) NOT NULL,
    `gallery_type` varchar(255) NOT NULL DEFAULT 'agenda',
    `uploaded_by` bigint(20) UNSIGNED DEFAULT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `galleries_uploaded_by_foreign` (`uploaded_by`),
    CONSTRAINT `galleries_uploaded_by_foreign` FOREIGN KEY (`uploaded_by`) REFERENCES `admins` (`id`) ON DELETE SET NULL
);

-- Community Services table
CREATE TABLE `community_services` (
    `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
    `title` varchar(255) NOT NULL,
    `description` text NOT NULL,
    `date` date NOT NULL,
    `location` varchar(255) NOT NULL,
    `participants` int(11) NOT NULL DEFAULT 0,
    `category` enum('workshop','seminar','training','webinar','consultation') NOT NULL,
    `status` enum('upcoming','ongoing','completed') NOT NULL DEFAULT 'upcoming',
    `image` varchar(255) DEFAULT NULL,
    `uploaded_by` bigint(20) UNSIGNED NOT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `community_services_uploaded_by_foreign` (`uploaded_by`),
    CONSTRAINT `community_services_uploaded_by_foreign` FOREIGN KEY (`uploaded_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE
);

-- Admin Logs table
CREATE TABLE `admin_logs` (
    `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
    `admin_id` bigint(20) UNSIGNED NOT NULL,
    `action` varchar(255) NOT NULL,
    `table_name` varchar(255) DEFAULT NULL,
    `record_id` bigint(20) UNSIGNED DEFAULT NULL,
    `description` text DEFAULT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `admin_logs_admin_id_foreign` (`admin_id`),
    CONSTRAINT `admin_logs_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE
);

-- Links table
CREATE TABLE `links` (
    `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
    `name` varchar(255) NOT NULL,
    `url` varchar(255) NOT NULL,
    `description` text DEFAULT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL,
    PRIMARY KEY (`id`)
);
```

## Table Descriptions

### Core Tables

#### 1. **Members**
- Stores laboratory member information (researchers, staff)
- Used for author attribution and admin profile linking
- Contains contact information and roles

#### 2. **Admins**
- System administrators who can manage content
- Linked to members table for profile information
- Role-based access control (admin, superadmin)

#### 3. **Archives**
- Research documents, publications, and general documents
- Supports cover images and author attribution
- Categorized by type (research, publication, document)

#### 4. **Galleries**
- Dual purpose: image galleries and event management
- Supports both agenda (upcoming events) and past_activity types
- Event-specific fields for scheduling and registration

#### 5. **Community_Services**
- Laboratory community service events and activities
- Categorized by type (workshop, seminar, training, etc.)
- Status tracking (upcoming, ongoing, completed)

### Supporting Tables

#### 6. **Categories**
- Content categorization system
- Used across different content types

#### 7. **Admin_Logs**
- Audit trail for administrative actions
- Tracks all CRUD operations by admins

#### 8. **Links**
- External links for footer and reference purposes
- Simple name-URL mapping with descriptions

## Key Features

1. **Role-Based Access Control**: Admins have different permission levels
2. **Audit Trail**: All admin actions are logged
3. **Author Attribution**: Research documents linked to actual members
4. **Event Management**: Galleries double as event management system
5. **File Management**: All uploaded files tracked with paths
6. **Flexible Categorization**: Content can be categorized and filtered
7. **Status Tracking**: Events and services have status management

## Data Integrity

- Foreign key constraints ensure referential integrity
- Cascade deletes for dependent records (logs, community services)
- Set null for optional relationships (uploaded_by, author_id)
- Unique constraints on critical fields (username, email, category names)


FTS

SELECT id, title, description, category, year, ts_rank(to_tsvector('english', title || ' ' || COALESCE(description, '')), to_tsquery('english', 'search_term')) as rank
FROM archives 
WHERE to_tsvector('english', title || ' ' || COALESCE(description, '')) @@ to_tsquery('english', 'search_term')
ORDER BY rank DESC, created_at DESC 
LIMIT 10;
