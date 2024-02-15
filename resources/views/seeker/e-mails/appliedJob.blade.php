<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Application Confirmation</title>
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
                <p class="text-gray-800">Dear {{ $data['seeker'] }},</p>
                <p class="text-gray-800">Thank you for applying for the {{ $data['job_title'] }} position through our job portal. We appreciate your interest in trusting  our platform.</p>
                <p class="text-gray-800">Your application has been received and will be reviewed by {{ $data['company'] }}'s  hiring team. If your qualifications match their requirements, they will reach out to you for the next steps in the hiring process.</p>
                <p class="text-gray-800">In the meantime, feel free to explore more opportunities on our platform and update your profile with any additional information that may enhance your candidacy.</p>
                <p class="text-gray-800">If you have any questions or need further assistance, please don't hesitate to contact our support team at <a href="mailto:support@jobhub.com"> support@jobhub.com </a></p>
                <p class="text-gray-800">Thank you for considering {{ $data['company'] }} as your potential employer. We wish you the best of luck in your job search!</p>
                <br>
                <p>Regards,</p>
                <p>Job Hubs Support Team</p>
            </td>
        </tr>
    </table>
<div class="text-center">Copyright &copy; @php echo date('Y'); @endphp | All Rights Reserved | {{ env('APP_NAME') }} </div>
</body>

</html>
