# Database Migration Structure

## ✅ Clean Migration Order

### 1. Laravel Default Tables
- `0001_01_01_000000_create_users_table.php`
- `0001_01_01_000001_create_cache_table.php`
- `0001_01_01_000002_create_jobs_table.php`

### 2. Core Tables (2025-11-17)
- `2025_11_17_072408_create_links_table.php` - External links
- `2025_11_17_072417_create_members_table.php` - Lab members
- `2025_11_17_072441_create_admins_table.php` - Admin users (includes member_id, name)
- `2025_11_17_072532_create_archives_table.php` - Documents/Research (includes type, publication, year, cover_image, author_id)
- `2025_11_17_072540_create_admin_logs_table.php` - Activity logs
- `2025_11_17_072552_create_contents_table.php` - Content management
- `2025_11_17_072600_create_categories_table.php` - Categories
- `2025_11_17_072609_create_content_categories_table.php` - Content-Category pivot
- `2025_11_17_072610_create_archive_categories_table.php` - Archive-Category pivot (with unique constraint)
- `2025_11_17_072623_create_galleries_table.php` - Media gallery (includes all event fields)

### 3. Additional Features (2025-12-04)
- `2025_12_04_151101_create_consultations_table.php` - Consultation requests

### 4. Search Enhancement (2025-12-08)
- `2025_12_08_000001_add_fulltext_search_indexes.php` - PostgreSQL full-text search

## Key Features

### Archives Table
- **type**: document, research, publication
- **publication**: Journal/conference name
- **year**: Publication year
- **cover_image**: Cover image for research/publications
- **author_id**: Links to members table
- **Categories**: Many-to-many via archive_categories (required, minimum 1)

### Galleries Table
- **gallery_type**: image, video, event, agenda, past_activity
- **event_date**: Event date
- **event_time**: Event time
- **event_location**: Event location (primary)
- **location**: Location (backward compatibility)
- **max_slots**: Maximum participants
- **registered_count**: Current registrations
- **event_status**: upcoming, ongoing, completed, cancelled
- **event_mode**: online, offline, hybrid
- **event_category**: workshop, seminar, competition, training

### Admins Table
- **username**: Unique username
- **password**: Hashed password (not password_hash)
- **name**: Admin display name
- **email**: Email address
- **member_id**: Links admin account to member profile

### Full-Text Search
- Indexes on: contents, galleries, archives, members
- Uses PostgreSQL tsvector and GIN indexes
- Automatic updates via triggers
- Archives indexed by: title, description, type

## Seeders

All seeders are working and use proper relationships:

1. **MemberSeeder** - Creates lab members
2. **AdminSeeder** - Creates admin accounts (uses `password` not `password_hash`)
3. **CategorySeeder** - Creates categories
4. **LinkSeeder** - Creates external links
5. **ContentSeeder** - Creates content with category relationships
6. **EventSeeder** - Creates gallery events (agenda & past activities)
7. **ArchiveSeeder** - Creates archives with category relationships
8. **ResearchSeeder** - Creates research publications with category relationships

## Running Migrations

```bash
# Fresh migration with seeding (recommended for development)
php artisan migrate:fresh --seed

# Regular migration
php artisan migrate

# Rollback
php artisan migrate:rollback

# Check migration status
php artisan migrate:status
```

## Database Schema Summary

**Total Tables**: 20
- users, cache, cache_locks, jobs, job_batches, failed_jobs
- password_reset_tokens, sessions
- links, members, admins, admin_logs
- archives, archive_categories
- contents, categories, content_categories
- galleries
- consultations
- migrations

## Changes from Previous Version

### ✅ Consolidated Migrations
- Removed messy "add_" and "update_" migrations
- All fields included in base table creation
- Proper ordering and dependencies

### ✅ Fixed Issues
- Admin model uses `password` (not `password_hash`)
- Archives uses categories pivot table (no category column)
- Galleries includes all event fields from the start
- All seeders use proper category relationships

### ✅ Clean Structure
- 15 migration files (down from 19)
- No redundant migrations
- All tables created with complete schema
- Proper foreign key constraints
