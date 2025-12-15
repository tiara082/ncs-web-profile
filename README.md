# NCS Lab - Network & Cyber Security Laboratory

A comprehensive web platform for the Network & Cyber Security Laboratory at Politeknik Negeri Malang, showcasing research, publications, team members, and laboratory activities.

![NCS Lab](https://img.shields.io/badge/NCS%20Lab-Cybersecurity%20Research-66bbf2)
![Laravel](https://img.shields.io/badge/Laravel-10.0-FF2D20)
![PHP](https://img.shields.io/badge/PHP-8.2-777BB4)
![Tailwind CSS](https://img.shields.io/badge/Tailwind%20CSS-3.x-38B2AC)

## 🌟 Features

### 🔐 Research & Publications
- **Research Documents**: Comprehensive collection of academic papers and research publications
- **Advanced Search**: Filter publications by year, author, keywords, and categories
- **DOI & ISSN Integration**: Direct links to academic databases and journals
- **Download Management**: Secure file access for research papers
- **Citation Support**: Easy citation generation for academic references

### 👥 Team Management
- **Member Profiles**: Detailed profiles of laboratory researchers and staff
- **Organizational Structure**: Interactive org chart showing team hierarchy
- **NIP Integration**: Professional staff identification system
- **Multiple Contact Channels**: Email, phone, and social media links
- **Skills & Expertise**: Specialization areas and research interests

### 📅 Events & Activities
- **Gallery Management**: Photo galleries of laboratory activities and events
- **Event Scheduling**: Upcoming agenda and past activities tracking
- **Community Service**: Documentation of community outreach programs
- **Event Categories**: Better organization by event types

### 🛠️ Admin Dashboard
- **Filament Admin**: Modern, responsive admin interface
- **Role-Based Access**: Different access levels for admins and superadmins
- **Content Management**: Easy content creation and editing
- **Activity Logging**: Comprehensive audit trail of admin actions
- **File Management**: Secure upload and organization of documents and images

## 🏗️ Technical Architecture

### Backend
- **Framework**: Laravel 10.x
- **Database**: PostgreSQL
- **Authentication**: Custom admin authentication system
- **File Storage**: Laravel's filesystem with local storage
- **Queue System**: Laravel Queues for background processing

### Frontend
- **Styling**: Tailwind CSS 3.x
- **JavaScript**: Vanilla JS with Feather Icons
- **Responsive Design**: Mobile-first approach
- **Progressive Enhancement**: Works without JavaScript
- **Accessibility**: WCAG 2.1 compliant where possible

### Key Components
- **Database Migrations**: Version-controlled schema management
- **Seeders**: Sample data for development and testing
- **Form Requests**: Input validation and sanitization
- **Policies**: Authorization and access control
- **Events & Listeners**: Decoupled application logic

## 📊 Database Schema

### Core Tables
- **Members**: Laboratory staff and researchers information
- **Archives**: Research papers and publications
- **Categories**: Publication categorization
- **Gallery**: Event photos and activities
- **Community Service**: Outreach program records
- **Admins**: System administrators
- **Admin Logs**: Activity audit trail

### Key Relationships
- Members can have multiple publications
- Publications belong to categories
- Galleries can be categorized as agenda or activities
- Admins can be linked to member profiles

## 🚀 Installation

### Prerequisites
- PHP 8.2 or higher
- Composer
- Node.js and NPM
- PostgreSQL database
- Web server (Apache/Nginx)

### Setup Instructions

1. **Clone the repository**
   ```bash
   git clone <repository-url>
   cd ncs-web-profile
   ```

2. **Install dependencies**
   ```bash
   composer install
   npm install
   ```

3. **Environment setup**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Configure database**
   ```bash
   # Edit .env file with your database credentials
   DB_CONNECTION=pgsql
   DB_HOST=127.0.0.1
   DB_PORT=5432
   DB_DATABASE=ncs_lab
   DB_USERNAME=your_username
   DB_PASSWORD=your_password
   ```

5. **Run migrations and seeders**
   ```bash
   php artisan migrate
   php artisan db:seed
   ```

6. **Build assets**
   ```bash
   npm run build
   ```

7. **Start development server**
   ```bash
   php artisan serve
   ```

## 📁 Project Structure

```
├── app/
│   ├── Filament/          # Admin panel resources
│   ├── Http/              # Controllers and middleware
│   ├── Models/            # Eloquent models
│   ├── Providers/         # Service providers
│   └── Traits/            # Reusable traits
├── database/
│   ├── factories/         # Model factories
│   ├── migrations/        # Database migrations
│   └── seeders/           # Database seeders
├── public/
│   ├── img/               # Static images
│   └── storage/           # Public storage files
├── resources/
│   ├── css/               # Custom CSS
│   ├── js/                # JavaScript files
│   └── views/             # Blade templates
└── routes/
    └── web.php            # Web routes
```

## 🎨 Custom Components

### Partials
- **Navbar**: Responsive navigation with mobile menu
- **Footer**: Comprehensive site footer
- **Scroll Progress**: Visual reading progress indicator
- **Back to Top**: Smooth scroll navigation

### Pages
- **Home**: Dynamic homepage with featured content
- **Organization**: Interactive team structure
- **Research Documents**: Academic publications browsing
- **Member Detail**: Individual researcher profiles
- **Community Service**: Outreach activities showcase

## 🔧 Development Commands

### Database Management
```bash
# Create new migration
php artisan make:migration create_table_name

# Run migrations
php artisan migrate

# Fresh migration with seeding
php artisan migrate:fresh --seed

# Create seeder
php artisan make:seeder TableNameSeeder
```

### Frontend Development
```bash
# Install packages
npm install

# Build for production
npm run build

# Watch for changes (development)
npm run dev
```

### Code Quality
```bash
# Laravel Pint (code formatting)
composer run lint

# Run tests
composer test

# Run specific test
php artisan test --filter TestName
```

### Development Server
```bash
# Start Laravel development server
php artisan serve

# Start with queue worker
composer dev
```

## 👥 Team

### Laboratory Head
- **Dr. Erfan Rohadi, ST., M.Eng., Ph.D.**
- NIP: 197201232008011006
- Email: erfan.rohadi@polinema.ac.id

### Researchers
- **Ade Ismail, S.Kom., M.TI** - Penetration Testing & Network Security
- **Vipkas Al Hadid Firdaus, ST., MT** - Cloud Security & Infrastructure
- **Sofyan Noor Arief, S.ST., M.Kom.** - Application Security & Testing
- **Meyti Eka Apriyani, ST., MT.** - Digital Forensics & Incident Response

## 🔐 Security Features

- **Input Validation**: Comprehensive form validation
- **CSRF Protection**: Cross-site request forgery prevention
- **SQL Injection Prevention**: Using Eloquent ORM
- **XSS Protection**: Output escaping in templates
- **File Upload Security**: Restricted file types and sizes
- **Admin Authentication**: Secure login system
- **Activity Logging**: Comprehensive audit trails

## 📱 Browser Support

- Chrome (latest 2 versions)
- Firefox (latest 2 versions)
- Safari (latest 2 versions)
- Edge (latest 2 versions)

## 📝 Contributing

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

### Development Guidelines
- Follow PSR-12 coding standards
- Use Laravel Pint for code formatting
- Write tests for new features
- Update documentation as needed
- Keep commits atomic and well-described

## 📄 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## 🤝 Acknowledgments

- **Politeknik Negeri Malang** for institutional support
- **Laravel Framework** for providing an excellent development platform
- **Tailwind CSS** for the utility-first CSS framework
- **Filament** for the beautiful admin panel
- **Feather Icons** for the icon set

## 📞 Contact

- **Email**: ncs-lab@polinema.ac.id
- **Website**: https://ncs-lab.polinema.ac.id
- **Address**: Politeknik Negeri Malang, Jl. Soekarno Hatta No.9, Malang

---

> 💡 **Note**: This project is actively maintained by the Network & Cyber Security Laboratory team. For technical support or contributions, please contact the development team.