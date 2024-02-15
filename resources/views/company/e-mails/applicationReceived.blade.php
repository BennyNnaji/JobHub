<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Application Notification</title>
    <style>
        @media only screen and (max-width: 600px) {
            .logo {
                max-width: 100%;
                margin: 0 auto;
            }
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 p-4">

    <table class="max-w-2xl mx-auto bg-white p-8 shadow-md rounded-md">
        <tr>
            <td class="text-center">
                <img src="{{ asset('images/front/logo.png') }}" alt="Logo" class="logo">
            </td>
        </tr>
        <tr>
            <td class="p-4">
                <p class="text-gray-800">Dear {{ $data['company'] }},</p>
                <p class="text-gray-800">A new job application has been received for the {{ $data['job_title'] }} position listed on JobHub.</p>
                <p class="text-gray-800">Seeker: {{ $data['seeker'] }}</p>
                <p class="text-gray-800">Please log in to your JobHub account to review the application and consider the candidate for the next steps in your hiring process.</p>
                <p class="text-gray-800">If you have any questions or need further assistance, feel free to contact our support team at <a href="mailto:support@jobhub.com">support@jobhub.com</a></p>
                <p class="text-gray-800">Thank you for using JobHub for your hiring needs!</p>
                <br>
                <p>Regards,</p>
                <p>Job Hubs Support Team</p>
            </td>
        </tr>
    </table>
    <div class="text-center">Copyright &copy; @php echo date('Y'); @endphp | All Rights Reserved | {{ env('APP_NAME') }}</div>
</body>

</html>
