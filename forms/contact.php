<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $business_name = $_POST['business_name'];
    $message = $_POST['message'];
    
    $to = "info@simplifycanada.com"; // Replace with your email
    $subject = "New Contact Form Submission";
    
    $message_body = "New contact form submission received:\n\n";
    $message_body .= "Name: " . $name . "\n";
    $message_body .= "Email: " . $email . "\n";
    $message_body .= "Business Name: " . $business_name . "\n";
    $message_body .= "Message: " . $message . "\n";
    
    $headers = "From: " . $email . "\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();
    
    // Send email
    if(mail($to, $subject, $message_body, $headers)) {
        echo json_encode(['status' => 'success', 'message' => 'Your message has been sent. Thank you!']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Sorry, there was an error sending your message. Please try again.']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
}
?>
