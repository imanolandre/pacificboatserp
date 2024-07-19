<!DOCTYPE html>
<html>
<head>
    <title>Invoice</title>
</head>
<body>
    <h1>Your Invoice</h1>
    <p>Dear {{ $invoice->client->customer_name }},</p>
    <p>Please find attached your invoice.</p>
</body>
</html>
