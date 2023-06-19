<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Support Request</title>
    <style>
        body {
            background-color: lightblue;
        }
        
        h2, p {
            color: black;
        }
    </style>
</head>
<body>
    <h2>Support Request from: {{ $contactData['name'] }}, {{ $contactData['email'] }}</h2>
    <br>
    <br>
    <p>The message:</p>
    <p>{{ $contactData['message'] }}</p>
    <br>
    <br>
    <p>Regards,</p>
    <p>Team Nova</p>
</body>
</html>
