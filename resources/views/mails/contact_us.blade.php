<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Us Submission</title>
</head>
<body>
    <h2>New Contact Us Submission</h2>
    <p>First Name: {{ $formData['first_name'] }}</p>
    <p>Last Name: {{ $formData['last_name'] }}</p>
    <p>Email: {{ $formData['email'] }}</p>
    <p>Subject: {{ $formData['subject'] }}</p>
    <p>Comments/Questions: {{ $formData['comments'] }}</p>
</body>
</html>