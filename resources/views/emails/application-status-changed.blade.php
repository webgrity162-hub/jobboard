```html
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Status Updated</title>
</head>
<body style="margin:0;padding:0;background-color:#f4f7fa;font-family:Arial,sans-serif;">

    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:#f4f7fa;padding:30px 15px;">
        <tr>
            <td align="center">

                <!-- Email Container -->
                <table role="presentation" width="600" cellpadding="0" cellspacing="0" border="0" style="max-width:600px;width:100%;background:#ffffff;border-radius:8px;overflow:hidden;">

                    <!-- Header -->
                    <tr>
                        <td style="background:#0A66C2;padding:30px;text-align:center;">
                            <div style="font-size:30px;font-weight:bold;color:#ffffff;">
                                JobBoard
                            </div>
                            <div style="font-size:14px;color:#dcecff;margin-top:5px;">
                                Career Opportunities Platform
                            </div>
                        </td>
                    </tr>

                    <!-- Content -->
                    <tr>
                        <td style="padding:40px 30px;">

                            <p style="margin:0 0 20px 0;font-size:18px;color:#333333;">
                                Hello <strong>{{$candidate_name}}</strong>,
                            </p>

                            <p style="margin:0 0 30px 0;font-size:16px;line-height:24px;color:#555555;">
                                Your application status has been updated. Please review the latest information below.
                            </p>

                            <!-- Status Card -->
                            <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="background:#f8fafc;border:1px solid #e5e7eb;border-radius:8px;">
                                <tr>
                                    <td style="padding:25px;text-align:center;">

                                        <div style="font-size:12px;color:#6b7280;text-transform:uppercase;letter-spacing:1px;margin-bottom:12px;">
                                            Status Update
                                        </div>

                                        <span style="display:inline-block;padding:8px 16px;background:#9ca3af;color:#ffffff;border-radius:20px;font-size:14px;font-weight:bold;">
                                            {{$old_status}}
                                        </span>

                                        <span style="display:inline-block;padding:0 15px;font-size:22px;color:#6b7280;">
                                            →
                                        </span>

                                        <!-- Change color dynamically based on new status -->
                                        <span style="display:inline-block;padding:8px 16px;background:{{$new_status_color}};color:#ffffff;border-radius:20px;font-size:14px;font-weight:bold;">
                                            {{$new_status}}
                                        </span>

                                    </td>
                                </tr>
                            </table>

                            <!-- Job Details -->
                            <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="margin-top:30px;border:1px solid #e5e7eb;border-radius:8px;">
                                <tr>
                                    <td style="padding:25px;">

                                        <h3 style="margin:0 0 20px 0;color:#111827;font-size:18px;">
                                            Job Details
                                        </h3>

                                        <p style="margin:0 0 12px 0;color:#374151;">
                                            <strong>Job Title:</strong>
                                            {{$job_title}}
                                        </p>

                                        <p style="margin:0 0 12px 0;color:#374151;">
                                            <strong>Company:</strong>
                                            {{$company_name}}
                                        </p>

                                        <p style="margin:0;color:#374151;">
                                            <strong>Location:</strong>
                                            {{$job_location}}
                                        </p>

                                    </td>
                                </tr>
                            </table>

                            <!-- CTA Button -->
                            <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="margin-top:35px;">
                                <tr>
                                    <td align="center">
                                        <a href="{{$application_url}}"
                                           style="display:inline-block;background:#0A66C2;color:#ffffff;text-decoration:none;padding:14px 32px;font-size:16px;font-weight:bold;border-radius:6px;">
                                            View Your Application
                                        </a>
                                    </td>
                                </tr>
                            </table>

                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td style="background:#f8fafc;padding:25px;text-align:center;border-top:1px solid #e5e7eb;">

                            <p style="margin:0 0 10px 0;font-size:13px;color:#6b7280;">
                                You received this email because you applied on JobBoard.
                            </p>

                            <p style="margin:0 0 10px 0;font-size:13px;">
                                <a href="{{$unsubscribe_url}}" style="color:#0A66C2;text-decoration:none;">
                                    Unsubscribe
                                </a>
                            </p>

                            <p style="margin:0;font-size:12px;color:#9ca3af;">
                                © 2026 JobBoard. All rights reserved.
                            </p>

                        </td>
                    </tr>

                </table>

            </td>
        </tr>
    </table>

</body>
</html>
```
