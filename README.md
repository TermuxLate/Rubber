# Modern PHP Website

A beautiful, responsive website built with PHP, featuring modern design and functionality.

## Features

- ✅ **Responsive Design** - Works perfectly on desktop, tablet, and mobile
- ✅ **Modern UI/UX** - Clean, professional design with smooth animations
- ✅ **Contact Form** - Functional contact form with validation
- ✅ **Modular Structure** - Easy to customize and maintain
- ✅ **SEO Friendly** - Proper HTML structure and meta tags
- ✅ **Fast Performance** - Optimized CSS and JavaScript
- ✅ **Cross-browser Compatible** - Works on all modern browsers

## File Structure

```
├── index.php              # Main entry point
├── config.php             # Configuration settings
├── process_contact.php    # Contact form processing
├── includes/              # PHP components
│   ├── header.php
│   ├── hero.php
│   ├── features.php
│   ├── about.php
│   ├── contact.php
│   └── footer.php
├── assets/                # Static assets
│   ├── css/
│   │   └── style.css
│   └── js/
│       └── script.js
└── README.md
```

## Setup Instructions

### 1. Upload Files
Upload all files to your web hosting server's public directory (usually `public_html` or `www`).

### 2. Configure Settings
Edit `config.php` to update:
- Site name and URL
- Contact email address
- Company information
- Social media links

### 3. Email Configuration (Optional)
To enable email functionality:
1. Uncomment the mail() line in `process_contact.php`
2. Ensure your hosting supports PHP mail() function
3. Or configure SMTP settings if needed

### 4. Customize Content
Update the content in the include files:
- `includes/hero.php` - Main headline and description
- `includes/features.php` - Feature cards
- `includes/about.php` - Company information
- `includes/contact.php` - Contact details

### 5. Test the Website
- Visit your domain to see the website
- Test the contact form
- Check mobile responsiveness
- Verify all links work correctly

## Customization

### Colors
The main color scheme is defined in `assets/css/style.css`:
- Primary: `#6366f1` (Indigo)
- Secondary: `#fbbf24` (Yellow)
- Background: `#f8fafc` (Light Gray)

### Fonts
The website uses Inter font from Google Fonts. You can change this in the CSS file.

### Adding Pages
To add new pages:
1. Create a new PHP file
2. Include the header and footer
3. Add your content in between
4. Update navigation links

## Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- Mobile browsers

## Performance Tips

1. **Enable Gzip compression** on your server
2. **Use a CDN** for external resources
3. **Optimize images** before uploading
4. **Enable browser caching** for static assets

## Security Notes

- The contact form includes basic validation
- Input sanitization is implemented
- Consider adding CSRF protection for production
- Keep PHP version updated

## Support

For questions or issues:
- Check your hosting provider's PHP documentation
- Ensure all files have proper permissions (usually 644 for files, 755 for directories)
- Verify PHP is enabled on your hosting

## License

This project is open source and available under the MIT License.