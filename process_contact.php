<?php
// Contact form processing
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $subject = trim($_POST['subject'] ?? '');
    $message = trim($_POST['message'] ?? '');
    
    // Basic validation
    $errors = [];
    
    if (empty($name)) {
        $errors[] = "Name is required";
    }
    
    if (empty($email)) {
        $errors[] = "Email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Please enter a valid email address";
    }
    
    if (empty($subject)) {
        $errors[] = "Subject is required";
    }
    
    if (empty($message)) {
        $errors[] = "Message is required";
    }
    
    // If no errors, process the form
    if (empty($errors)) {
        // Sanitize inputs
        $name = htmlspecialchars($name);
        $email = htmlspecialchars($email);
        $subject = htmlspecialchars($subject);
        $message = htmlspecialchars($message);
        
        // Email headers
        $to = "info@yourwebsite.com"; // Change this to your email
        $email_subject = "New Contact Form Submission: $subject";
        
        $email_body = "You have received a new message from your website contact form.\n\n";
        $email_body .= "Name: $name\n";
        $email_body .= "Email: $email\n";
        $email_body .= "Subject: $subject\n";
        $email_body .= "Message:\n$message\n";
        
        $headers = "From: $email\r\n";
        $headers .= "Reply-To: $email\r\n";
        $headers .= "X-Mailer: PHP/" . phpversion();
        
        // Send email (uncomment the line below when you have email configured)
        // $mail_sent = mail($to, $email_subject, $email_body, $headers);
        
        // For now, we'll just log the submission
        $log_entry = date('Y-m-d H:i:s') . " - Name: $name, Email: $email, Subject: $subject\n";
        file_put_contents('contact_log.txt', $log_entry, FILE_APPEND | LOCK_EX);
        
        // Redirect back with success message
        header("Location: index.php?contact=success#contact");
        exit();
    } else {
        // Redirect back with errors
        $error_string = implode(', ', $errors);
        header("Location: index.php?contact=error&message=" . urlencode($error_string) . "#contact");
        exit();
    }
} else {
    // If not POST request, redirect to home page
    header("Location: index.php");
    exit();
}
?>