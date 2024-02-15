<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Application Acceptance</title>
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
                <p class="text-gray-800">We are thrilled to inform you that {{ $data['seeker'] }} has accepted the job offer for the
                    {{ $data['job_title'] }} position at your company, {{ $data['company'] }}, on JobHub.</p>
                <p class="text-gray-800">The application status has been updated to <span class="capitalize">offer accepted</span>.</p> <br>
              
                <p class="text-gray-800">Please feel free to reach out to the new hire to discuss further details, such as the start date, onboarding process, and any other necessary arrangements.</p>
                <p class="text-gray-800">If you have any questions or need assistance, please contact our support team at <a href="mailto:support@jobhub.com">support@jobhub.com</a></p>
                <p class="text-gray-800">Thank you for using JobHub to find the right talent for your company!</p>
                <br>
                <p>Regards,</p>
                <p>Job Hubs Support Team</p>
            </td>
        </tr>
    </table>
    <div class="text-center">Copyright &copy; @php echo date('Y'); @endphp | All Rights Reserved | {{ env('APP_NAME') }}</div>
</body>

</html>
