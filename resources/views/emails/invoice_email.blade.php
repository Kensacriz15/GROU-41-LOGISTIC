<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice from {{ config('variables.templateName') }}</title>
</head>
<body>
    <h1>Invoice Attached</h1>
    <p>Dear Vendor,</p>
    <p>Please find your attached invoice (PDF). </p>
    <p>Thank you for your business!</p>
    <p>Best Regards,<br>
    {{ config('variables.templateName') }} Team</p>
</body>
</html>
