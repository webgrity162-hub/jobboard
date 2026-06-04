<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { width: 80%; margin: 20px auto; padding: 20px; border: 1px solid #ddd; border-radius: 10px; }
        .header { background-color: #0a66c2; color: white; padding: 10px; text-align: center; border-radius: 10px 10px 0 0; }
        .content { padding: 20px; }
        .footer { text-align: center; font-size: 0.8em; color: #777; margin-top: 20px; }
        .button { display: inline-block; padding: 10px 20px; background-color: #0a66c2; color: white; text-decoration: none; border-radius: 5px; margin-top: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>New Application Received!</h1>
        </div>
        <div class="content">
            <p>Hello <strong>{{ $employerName }}</strong>,</p>
            <p>You have received a new application for the position of <strong>{{ $jobTitle }}</strong>.</p>
            <p><strong>Candidate Details:</strong></p>
            <ul>
                <li><strong>Name:</strong> {{ $candidateName }}</li>
                <li><strong>Email:</strong> {{ $candidateEmail }}</li>
                <li><strong>Applied On:</strong> {{ $appliedAt }}</li>
            </ul>
            <p>Please log in to your dashboard to review the application and candidate's profile.</p>
            <a href="{{ $dashboardUrl }}" class="button">View Application</a>
        </div>
        <div class="footer">
            <p>&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
