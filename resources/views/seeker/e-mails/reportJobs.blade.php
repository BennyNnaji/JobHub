<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Report Confirmation</title>
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
        <tr class="px-4">
            <td class="py-4 px-4">
                <p class="text-gray-800">Dear {{ $data['seeker'] }},</p>
                <p class="text-gray-800">Thank you for reporting a job on our portal. Your contribution helps us maintain the quality of our job listings and ensures a better experience for all users.</p>
                <p class="text-gray-800">Our team will review the reported job promptly. If any further action is required, we will take appropriate measures to address the issue.</p>
                <p class="text-gray-800">If you have any additional information or concerns, feel free to reach out to our support team at <a href="mailto:support@jobhub.com"> support@jobhub.com </a>.</p>
                <p class="text-gray-800">Thank you for being an active member of our community!</p>
                <br>
                <p>Regards,</p>
                <p>Job Hubs Support Team</p>
            </td>
        </tr>
    </table>
<div class="text-center">Copyright &copy; @php echo date('Y'); @endphp | All Rights Reserved | {{ env('APP_NAME') }} </div>
</body>

</html>
