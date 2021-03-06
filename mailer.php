<?php

    // Get the form fields, removes html tags and whitespace.
    $name = strip_tags(trim($_POST["name"]));
    $name = str_replace(array("\r","\n"),array(" "," "),$name);
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $mobile = trim($_POST["mobile"]);
    $user = trim($_POST["user"]);
    $message = trim($_POST["message"]);

    // Check the data.
    if (empty($name) OR empty($mobile) OR empty($message) OR !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: http://www.techindustry.in/index.php?success=-1#contact");
        exit;
    }

    // Set the recipient email address. Update this to YOUR desired email address.
    $recipient = "keeplearning@techindustry.in";

    // Set the email subject.
    $subject = "New email from $name";

    // Build the email content.
    $email_content = "Name: $name\n";
    $email_content .= "Mobile: $mobile\n";
    $email_content .= "Email: $email\n";
    $email_content .= "User: $user\n";
    $email_content .= "Message: $message\n";

    // Build the email headers.
    $email_headers = "From: $name <$email>";

    // Send the email.
    mail($recipient, $subject, $email_content, $email_headers);
    
    // Redirect to the index.html page with success code
    header("Location: http://www.techindustry.in/index.php?success=1#contact");

?>