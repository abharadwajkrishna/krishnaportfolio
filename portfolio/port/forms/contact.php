<?php
// Replace contact@example.com with your real receiving email address
$receiving_email_address = 'alapatibharadwaj1@gmail.com';

// Define the path to the PHP Email Form library
$php_email_form_path = __DIR__ . '/../vendor/php-email-form/php-email-form.php';

// Check if the library file exists
if (file_exists($php_email_form_path)) {
    // Include the PHP Email Form library
    require_once $php_email_form_path;

    // Initialize the PHP Email Form object
    $contact = new $PHP_Email_Form();
    $contact->ajax = true;
  
    $contact->to = $receiving_email_address;
    $contact->from_name = $_POST['name'];
    $contact->from_email = $_POST['email'];
    $contact->subject = $_POST['subject'];

    // Use SMTP to send emails. Enter your correct SMTP credentials
    $contact->smtp = array(
        'host' => 'smtp.example.com', // Update with your SMTP host
        'username' => 'your_smtp_username', // Update with your SMTP username
        'password' => 'your_smtp_password', // Update with your SMTP password
        'port' => '587', // Update with your SMTP port (usually 587 for TLS)
        'encryption' => 'tls' // Update with your encryption method (tls or ssl)
    );

    // Add message fields
    $contact->add_message($_POST['name'], 'From');
    $contact->add_message($_POST['email'], 'Email');
    $contact->add_message($_POST['message'], 'Message', 10);

    // Send the email and echo the result
    echo $contact->send();
} else {
    // Error message if the library file cannot be found
    die('Unable to load the "PHP Email Form" Library!');
}
?>
