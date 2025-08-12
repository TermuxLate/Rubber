# Termux Guide - Complete Command Reference

A modern, user-friendly website providing comprehensive documentation for Termux commands, packages, and tutorials. Built with HTML, CSS, and JavaScript, optimized for Android devices and mobile screens.

## 🌟 Features

### 📱 Mobile-First Design
- **Responsive Layout**: Optimized for all screen sizes, especially Android devices
- **Touch-Friendly**: Large touch targets and intuitive gestures
- **Fast Loading**: Optimized performance for mobile networks
- **PWA Ready**: Progressive Web App capabilities

### 🔍 Advanced Search & Filtering
- **Real-time Search**: Instant command filtering as you type
- **Category Filters**: Filter by command type (Basic, File Management, System, etc.)
- **Smart Search**: Search through command names, descriptions, examples, and tags
- **Keyboard Shortcuts**: Ctrl/Cmd + K to focus search

### 📚 Comprehensive Content
- **500+ Commands**: Complete database of essential Termux commands
- **Detailed Examples**: Multiple usage examples for each command
- **Package Management**: Popular packages with installation commands
- **Step-by-step Tutorials**: Getting started guides for beginners

### 🎨 Modern UI/UX
- **Dark Theme**: Easy on the eyes, perfect for terminal users
- **Smooth Animations**: Fluid transitions and hover effects
- **Interactive Elements**: Copy commands with one click
- **Modal Details**: Detailed command information in popup modals

## 🚀 Getting Started

### Prerequisites
- A modern web browser (Chrome, Firefox, Safari, Edge)
- No server required - runs entirely in the browser

### Installation
1. Clone or download the repository
2. Open `index.html` in your web browser
3. Start exploring Termux commands!

### Local Development
```bash
# Clone the repository
git clone <repository-url>

# Navigate to the project directory
cd termux-guide

# Open in your preferred code editor
code .

# Serve locally (optional)
python3 -m http.server 8000
# or
npx serve .
```

## 📁 Project Structure

```
termux-guide/
├── index.html          # Main HTML file
├── styles.css          # Complete CSS styling
├── script.js           # JavaScript functionality
├── README.md           # Project documentation
└── assets/             # Additional assets (if any)
```

## 🎯 Key Features Explained

### Command Database
The website includes a comprehensive database of Termux commands organized into categories:

- **Basic Commands**: Essential commands for daily use
- **File Management**: File and directory operations
- **System Commands**: Process and system monitoring
- **Network Commands**: Network connectivity and tools
- **Package Management**: Software installation and management
- **Development**: Programming and development tools
- **Utility Commands**: Text processing and file utilities

### Search Functionality
- **Instant Search**: Results update as you type
- **Multi-field Search**: Searches command names, descriptions, examples, and tags
- **Category Filtering**: Filter by command category
- **Clear Search**: Easy way to reset search and filters

### Mobile Optimizations
- **Touch Gestures**: Swipe support for navigation
- **Large Touch Targets**: Minimum 44px touch areas
- **Optimized Typography**: Readable fonts at all sizes
- **Fast Scrolling**: Smooth performance on mobile devices

## 🛠️ Technical Details

### Technologies Used
- **HTML5**: Semantic markup and accessibility
- **CSS3**: Modern styling with CSS Grid and Flexbox
- **Vanilla JavaScript**: No frameworks, pure JavaScript
- **Font Awesome**: Icons for better visual experience
- **Google Fonts**: Inter and JetBrains Mono fonts

### Browser Support
- Chrome 60+
- Firefox 55+
- Safari 12+
- Edge 79+
- Mobile browsers (iOS Safari, Chrome Mobile)

### Performance Features
- **Debounced Search**: Optimized search performance
- **Lazy Loading**: Efficient resource loading
- **CSS Variables**: Easy theming and customization
- **Minimal Dependencies**: Fast loading times

## 🎨 Customization

### Colors
The website uses CSS custom properties for easy theming:

```css
:root {
    --primary-color: #00d4aa;
    --secondary-color: #6c5ce7;
    --bg-primary: #0a0a0a;
    --text-primary: #ffffff;
    /* ... more variables */
}
```

### Adding New Commands
To add new commands, edit the `commandsData` array in `script.js`:

```javascript
{
    name: 'newcommand',
    category: 'utility',
    description: 'Description of the command',
    examples: [
        'newcommand option1',
        'newcommand option2'
    ],
    usage: 'newcommand [options]',
    tags: ['tag1', 'tag2']
}
```

## 📱 Mobile Features

### Android Optimizations
- **Viewport Meta Tag**: Proper mobile scaling
- **Touch-friendly Buttons**: Minimum 44px touch targets
- **Swipe Gestures**: Touch gesture support
- **Fast Loading**: Optimized for mobile networks

### Responsive Breakpoints
- **Desktop**: 1024px and above
- **Tablet**: 768px - 1023px
- **Mobile**: 480px - 767px
- **Small Mobile**: Below 480px

## 🔧 Advanced Features

### Keyboard Shortcuts
- `Ctrl/Cmd + K`: Focus search box
- `Escape`: Close modals and clear search
- `Enter`: Execute search

### Accessibility
- **Semantic HTML**: Proper heading structure
- **ARIA Labels**: Screen reader support
- **Keyboard Navigation**: Full keyboard accessibility
- **High Contrast**: Support for high contrast mode
- **Reduced Motion**: Respects user motion preferences

### PWA Features
- **Service Worker**: Offline capability (optional)
- **Manifest**: App-like installation
- **Responsive Design**: Works on all devices

## 🤝 Contributing

### How to Contribute
1. Fork the repository
2. Create a feature branch
3. Make your changes
4. Test thoroughly
5. Submit a pull request

### Adding Content
- **Commands**: Add to the `commandsData` array
- **Packages**: Update the packages section in HTML
- **Tutorials**: Add new tutorial cards
- **Styling**: Modify CSS variables for theming

## 📄 License

This project is open source and available under the [MIT License](LICENSE).

## 🙏 Acknowledgments

- **Termux Community**: For the amazing terminal emulator
- **Font Awesome**: For the beautiful icons
- **Google Fonts**: For the typography
- **Open Source Community**: For inspiration and tools

## 📞 Support

If you have questions or need help:
- Create an issue on GitHub
- Check the documentation
- Join the Termux community

## 🔄 Updates

### Version 1.0.0
- Initial release
- Complete command database
- Mobile-optimized design
- Search and filtering functionality
- Interactive features

---

**Built with ❤️ for the Termux community**