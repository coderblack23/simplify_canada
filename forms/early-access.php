<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $business_name = $_POST['business_name'];
    $email = $_POST['email'];
    $pain_point = $_POST['pain_point'];
    
    $to = "info@simplifycanada.com"; // Replace with your email
    $subject = "New Early Access Request";
    
    $message = "New early access request received:\n\n";
    $message .= "Name: " . $name . "\n";
    $message .= "Business Name: " . $business_name . "\n";
    $message .= "Email: " . $email . "\n";
    $message .= "Pain Point: " . $pain_point . "\n";
    
    $headers = "From: " . $email . "\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();
    
    // Send email
    if(mail($to, $subject, $message, $headers)) {
        echo json_encode(['status' => 'success', 'message' => 'Thank you for signing up! We\'ll be in touch soon.']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Sorry, there was an error sending your message. Please try again.']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
}
?> 