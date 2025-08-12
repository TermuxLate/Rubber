<?php
// Website Configuration
define('SITE_NAME', 'Your Website');
define('SITE_URL', 'http://localhost'); // Change this to your domain
define('ADMIN_EMAIL', 'info@yourwebsite.com'); // Change this to your email

// Database Configuration (if needed)
define('DB_HOST', 'localhost');
define('DB_NAME', 'your_database');
define('DB_USER', 'your_username');
define('DB_PASS', 'your_password');

// Contact Form Settings
define('CONTACT_EMAIL', 'info@yourwebsite.com');
define('ENABLE_EMAIL', false); // Set to true when email is configured

// Social Media Links
define('FACEBOOK_URL', '#');
define('TWITTER_URL', '#');
define('LINKEDIN_URL', '#');
define('INSTAGRAM_URL', '#');

// Company Information
define('COMPANY_NAME', 'YourBrand');
define('COMPANY_PHONE', '+1 (555) 123-4567');
define('COMPANY_ADDRESS', '123 Web Street, Digital City, DC 12345');

// Error Reporting (set to false in production)
define('DEBUG_MODE', true);

if (DEBUG_MODE) {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
} else {
    error_reporting(0);
    ini_set('display_errors', 0);
}
?>