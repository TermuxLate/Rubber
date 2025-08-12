<section id="contact" class="contact">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Get In Touch</h2>
            <p class="section-description">Ready to start your project? Let's talk!</p>
        </div>
        
        <div class="contact-content">
            <div class="contact-info">
                <div class="contact-item">
                    <div class="contact-icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div class="contact-details">
                        <h3>Email</h3>
                        <p>info@yourwebsite.com</p>
                    </div>
                </div>
                
                <div class="contact-item">
                    <div class="contact-icon">
                        <i class="fas fa-phone"></i>
                    </div>
                    <div class="contact-details">
                        <h3>Phone</h3>
                        <p>+1 (555) 123-4567</p>
                    </div>
                </div>
                
                <div class="contact-item">
                    <div class="contact-icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div class="contact-details">
                        <h3>Address</h3>
                        <p>123 Web Street, Digital City, DC 12345</p>
                    </div>
                </div>
            </div>
            
            <div class="contact-form">
                <?php
                // Display success/error messages
                if (isset($_GET['contact'])) {
                    if ($_GET['contact'] === 'success') {
                        echo '<div class="alert alert-success">Thank you for your message! We will get back to you soon.</div>';
                    } elseif ($_GET['contact'] === 'error') {
                        $error_message = $_GET['message'] ?? 'An error occurred. Please try again.';
                        echo '<div class="alert alert-error">' . htmlspecialchars($error_message) . '</div>';
                    }
                }
                ?>
                <form action="process_contact.php" method="POST">
                    <div class="form-group">
                        <input type="text" name="name" placeholder="Your Name" required>
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" placeholder="Your Email" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="subject" placeholder="Subject" required>
                    </div>
                    <div class="form-group">
                        <textarea name="message" placeholder="Your Message" rows="5" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Send Message</button>
                </form>
            </div>
        </div>
    </div>
</section>