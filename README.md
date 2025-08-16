# 🚗 CarLux - Multi Brand Vehicle Showroom

A comprehensive, modern, and secure vehicle showroom management system built with PHP, MySQL, Bootstrap, and JavaScript. This project features a complete admin panel, user management system, vehicle inventory management, booking system, and review system.

## ✨ Key Features

### 🏠 **Frontend Features**
- **Interactive Hero Slideshow**: Dynamic image carousel with navigation controls
- **Vehicle Showcase**: Separate sections for Electric and Fuel vehicles
- **Responsive Design**: Mobile-first approach with Bootstrap 5
- **Modern UI/UX**: Professional automotive theme with smooth animations
- **Search Functionality**: Advanced vehicle search with filters
- **User Dashboard**: Personal profile management and booking history
- **Review System**: Customer feedback and rating system
- **Contact Forms**: Multiple contact methods and inquiry forms

### 🔐 **User Management System**
- **User Registration**: Secure sign-up with arithmetic captcha
- **User Login**: Protected authentication with captcha validation
- **Profile Management**: Update personal information and preferences
- **Session Management**: Secure user sessions and logout functionality
- **Password Security**: Encrypted password storage and validation

### 🚙 **Vehicle Management**
- **Electric Vehicles**: Complete electric car catalog with details
- **Fuel Vehicles**: Comprehensive fuel car inventory
- **Brand Management**: Multi-brand vehicle organization
- **Vehicle Details**: Detailed specifications, images, and pricing
- **Image Gallery**: High-quality vehicle images and galleries
- **Category Filtering**: Easy navigation between vehicle types

### 📅 **Booking System**
- **Online Booking**: Real-time vehicle booking functionality
- **Booking Management**: Track and manage all reservations
- **Status Tracking**: Pending, approved, and completed bookings
- **User Notifications**: Booking confirmation and status updates
- **Calendar Integration**: Date and time selection for bookings

### ⭐ **Review & Rating System**
- **Customer Reviews**: User-generated vehicle reviews
- **Rating System**: 5-star rating mechanism
- **Review Management**: Admin approval and moderation
- **User Feedback**: Comprehensive customer experience tracking

### 🛡️ **Admin Panel**
- **Dashboard Analytics**: Real-time statistics and insights
- **User Management**: Complete user account administration
- **Vehicle Management**: Add, edit, and delete vehicle listings
- **Booking Administration**: Approve, reject, and manage bookings
- **Review Moderation**: Approve and manage customer reviews
- **Brand Management**: Add and manage vehicle brands
- **Content Management**: Update website content and images

## 🔧 Technical Architecture

### **Frontend Technologies**
- **HTML5**: Semantic markup and accessibility
- **CSS3**: Modern styling with animations and transitions
- **Bootstrap 5**: Responsive grid system and components
- **JavaScript**: Interactive functionality and form validation
- **jQuery**: DOM manipulation and AJAX requests
- **Slick Carousel**: Advanced image slider functionality
- **Bootstrap Icons**: Professional iconography

### **Backend Technologies**
- **PHP 7.4+**: Server-side logic and business rules
- **MySQL**: Relational database management
- **Apache/Nginx**: Web server compatibility
- **Session Management**: Secure user authentication
- **File Upload**: Image and document handling

### **Database Schema**
- **User Management**: `user_detail`, `admin_detail`
- **Vehicle Inventory**: `electric_car`, `fuel_car`, `brands`
- **Booking System**: `bookings`, `booking_status`
- **Review System**: `reviews`, `ratings`
- **Content Management**: `website_content`, `images`

## 🚀 Installation & Setup

### **Prerequisites**
- PHP 7.4 or higher
- MySQL 5.7 or higher
- Apache/Nginx web server
- Composer (for dependency management)

### **Step-by-Step Installation**

1. **Clone the Repository**
   ```bash
   git clone https://github.com/yourusername/carlux-vehicle-showroom.git
   cd carlux-vehicle-showroom
   ```

2. **Database Setup**
   ```bash
   # Import the database schema
   mysql -u root -p < Database/carlux.sql
   
   # Or use phpMyAdmin to import carlux.sql
   ```

3. **Configuration**
   ```bash
   # Update database credentials in config.php
   nano config.php
   
   # Update admin credentials in admin/config.php
   nano admin/config.php
   ```

4. **Web Server Configuration**
   ```bash
   # For Apache (.htaccess already included)
   # Ensure mod_rewrite is enabled
   
   # For Nginx
   # Copy nginx.conf to your server configuration
   ```

5. **Permissions Setup**
   ```bash
   # Set proper permissions for upload directories
   chmod 755 admin/vehicleimg/
   chmod 755 images/
   chmod 644 *.php
   ```

6. **Access the Application**
   - Frontend: `http://yourdomain.com/`
   - Admin Panel: `http://yourdomain.com/admin/`
   - Default Admin: `admin@carlux.com` / `admin123`

## 🔒 Security Features

### **Authentication & Authorization**
- **Arithmetic Captcha**: Government-style mathematical validation
- **Session Security**: Secure session management with timeout
- **Password Encryption**: Bcrypt password hashing
- **Input Sanitization**: Protection against XSS and injection attacks
- **CSRF Protection**: Cross-site request forgery prevention

### **Data Protection**
- **SQL Injection Prevention**: Prepared statements and parameterized queries
- **XSS Protection**: Output encoding and input validation
- **File Upload Security**: Type and size validation for uploads
- **Access Control**: Role-based permissions and authorization

### **Network Security**
- **HTTPS Ready**: SSL/TLS configuration support
- **Header Security**: Security headers implementation
- **Error Handling**: Secure error reporting and logging
- **Rate Limiting**: Protection against brute force attacks

## 📱 Responsive Design

### **Device Compatibility**
- **Mobile First**: Optimized for mobile devices
- **Tablet Support**: Responsive grid system
- **Desktop Experience**: Full-featured interface
- **Touch Friendly**: Mobile-optimized interactions

### **Browser Support**
- Chrome 90+
- Firefox 88+
- Safari 14+
- Edge 90+
- Mobile browsers (iOS Safari, Chrome Mobile)

## 🗄️ Database Structure

### **Core Tables**
```sql
-- User Management
user_detail (id, name, email, contact, password, created_at)
admin_detail (id, username, email, password, role)

-- Vehicle Management
electric_car (id, carname, brand, fueltype, price, description, images)
fuel_car (id, carname, brand, fueltype, price, description, images)
brands (id, brand_name, logo, description)

-- Booking System
bookings (id, user_id, vehicle_id, booking_date, status, created_at)

-- Review System
reviews (id, user_id, vehicle_id, rating, comment, approved, created_at)
```

## 🚀 Deployment

### **Local Development**
```bash
# Using XAMPP/WAMP
# Place project in htdocs/www folder
# Access via localhost/carlux-vehicle-showroom
```

### **Production Deployment**
```bash
# Upload to web server
# Configure virtual host
# Set up SSL certificate
# Configure database
# Set proper file permissions
```

### **GitHub Pages (Static Version)**
```bash
# For static demo version
# Remove PHP dependencies
# Convert to static HTML/CSS/JS
# Deploy to GitHub Pages
```

## 🧪 Testing

### **Functionality Testing**
- User registration and login
- Vehicle browsing and search
- Booking system workflow
- Admin panel operations
- Review system functionality

### **Security Testing**
- SQL injection attempts
- XSS vulnerability testing
- Session hijacking prevention
- File upload security
- Authentication bypass attempts

### **Performance Testing**
- Page load times
- Database query optimization
- Image optimization
- Mobile responsiveness
- Cross-browser compatibility

## 📊 Performance Optimization

### **Frontend Optimization**
- Minified CSS and JavaScript
- Optimized images and assets
- Lazy loading for images
- CDN integration for libraries
- Browser caching implementation

### **Backend Optimization**
- Database query optimization
- Connection pooling
- Session management efficiency
- File upload optimization
- Error logging and monitoring

## 🔧 Maintenance

### **Regular Tasks**
- Database backups
- Security updates
- Performance monitoring
- Error log review
- User feedback analysis

### **Updates & Upgrades**
- PHP version updates
- Security patches
- Feature additions
- Bug fixes
- Performance improvements

## 🤝 Contributing

### **Development Guidelines**
1. Fork the repository
2. Create a feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

### **Code Standards**
- Follow PSR-12 coding standards
- Add proper documentation
- Include error handling
- Test thoroughly before submission
- Update documentation as needed

## 📄 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## 📞 Support & Contact

### **Getting Help**
- **GitHub Issues**: Report bugs and request features
- **Documentation**: Check this README and code comments
- **Community**: Join our development community
  

## 🙏 Acknowledgments

- Bootstrap team for the responsive framework
- jQuery team for JavaScript library
- PHP community for excellent documentation
- All contributors and testers

## 📈 Roadmap

### **Version 2.0 (Planned)**
- [ ] Mobile app development
- [ ] Advanced analytics dashboard
- [ ] Multi-language support
- [ ] Payment gateway integration
- [ ] Advanced search filters
- [ ] Social media integration

### **Version 1.1 (Current)**
- [x] Complete admin panel
- [x] User management system
- [x] Vehicle inventory management
- [x] Booking system
- [x] Review system
- [x] Responsive design
- [x] Security features

---

**⭐ Star this repository if you find it helpful!**

**🔒 Security Notice**: This project implements industry-standard security practices. Always keep your dependencies updated and follow security best practices in production environments.
