# Database Setup Guide

## Overview
This guide provides comprehensive instructions for setting up and maintaining the NCS Lab database with the latest schema and data structure.

## Database Structure

### Core Tables
- **admins** - User authentication and role management
- **members** - Lab member information and profiles
- **contents** - Dynamic content management system
- **categories** - Content categorization
- **galleries** - Image and media galleries
- **archives** - File and document storage
- **links** - External resource links
- **consultations** - Public consultation requests
- **admin_logs** - Administrative activity logs

### New Enhanced Tables
- **audit_trails** - Comprehensive audit logging
- **content_versions** - Content versioning system
- **user_sessions** - Session management and tracking

## Role System

### Super Admin (super_admin)
- Full system access
- Manage all users and content
- View system logs and analytics
- Administrative functions

### Content Admin (content_admin)
- Limited to own content only
- Cannot access system management
- Cannot view other users' content
- Focused dashboard view

## Migration Commands

### Fresh Installation
```bash
# Run all migrations from scratch
php artisan migrate:fresh --seed

# Use clean seeder for complete setup
php artisan db:seed --class=CleanDatabaseSeeder
```

### Production Setup
```bash
# Run migrations safely in production
php artisan migrate --force

# Use production seeder (safe for existing data)
php artisan db:seed --class=ProductionSeeder
```

### Development Setup
```bash
# Reset and reseed database
php artisan migrate:refresh --seed

# Run specific seeder
php artisan db:seed --class=CleanDatabaseSeeder
```

## Seeder Classes

### CleanDatabaseSeeder
- **Purpose**: Complete database reset and setup
- **Environment**: Development/Testing only
- **Features**:
  - Clears all existing data
  - Creates comprehensive sample data
  - Sets up proper role assignments
  - Creates sample content and resources

### ProductionSeeder
- **Purpose**: Safe production environment updates
- **Environment**: Production safe
- **Features**:
  - Preserves existing data
  - Updates missing roles
  - Creates default admin if needed
  - Adds basic categories

## Default Credentials

### Super Admin
- **Username**: admin
- **Password**: admin123
- **Email**: admin@ncslab.polinema.ac.id
- **Role**: super_admin

### Content Admins
- **Username**: erfan123 / ade123 / vipkas123 / sofyan123 / meyti123
- **Password**: [username]1234 (e.g., erfan1234)
- **Role**: content_admin

## Database Optimization

### Indexes Added
- Performance indexes on frequently queried columns
- Full-text search for content (PostgreSQL)
- Composite indexes for complex queries

### Constraints Added
- Foreign key constraints for data integrity
- Check constraints for enum validation
- Unique constraints for data consistency

### New Features
- Content versioning system
- Comprehensive audit trails
- Session management
- Flexible metadata storage

## Maintenance Commands

### Database Backup
```bash
# Create database backup
php artisan db:backup

# Restore database
php artisan db:restore backup_file.sql
```

### Data Validation
```bash
# Validate data integrity
php artisan db:validate

# Check for orphaned records
php artisan db:check-orphaned
```

### Performance Optimization
```bash
# Optimize database tables
php artisan db:optimize

# Analyze query performance
php artisan db:analyze
```

## Environment Configuration

### Development (.env)
```env
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=ncs_web_dev
DB_USERNAME=postgres
DB_PASSWORD=password
```

### Production (.env)
```env
DB_CONNECTION=pgsql
DB_HOST=your-db-host
DB_PORT=5432
DB_DATABASE=ncs_web_prod
DB_USERNAME=ncs_user
DB_PASSWORD=secure_password
```

## Troubleshooting

### Common Issues

1. **Migration Conflicts**
   - Check for duplicate migrations
   - Use `php artisan migrate:rollback` if needed

2. **Role Assignment Issues**
   - Run ProductionSeeder to fix missing roles
   - Check member_id associations

3. **Performance Issues**
   - Run database optimization
   - Check query indexes

### Reset Commands
```bash
# Reset everything (development only)
php artisan migrate:fresh
php artisan db:seed --class=CleanDatabaseSeeder

# Reset roles only
php artisan tinker
> App\Models\Admin::whereNull('role')->update(['role' => 'content_admin']);
> App\Models\Admin::whereNull('member_id')->update(['role' => 'super_admin']);
```

## Security Considerations

1. **Change Default Passwords** in production
2. **Use Environment Variables** for sensitive data
3. **Regular Backups** of production database
4. **Audit Logs** for compliance
5. **Role-Based Access** enforcement

## Data Flow

1. **Members** created first
2. **Admins** linked to members (content admins)
3. **Super Admin** created independently
4. **Content** assigned to creators
5. **Logs** track all activities
6. **Audit** maintains comprehensive history

## Future Enhancements

- Content scheduling system
- Advanced search capabilities
- Multi-language support
- API rate limiting
- Advanced analytics dashboard

---

**Note**: Always backup your database before running migrations in production!
