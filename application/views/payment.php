<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?= base_url('payment/charge') ?>" method="post">
    <script
        src="https://checkout.stripe.com/checkout.js"
        class="stripe-button"
        data-key="pk_test_51QR04mGDHNYxmN798hAT79jVxdb8qyOI0w6qAbF9sVwYiAvGl3qm2BzZpsXh2HTBN21z3izyCiPvNOVGNd4pJRUd0022uAUKSP"
        data-amount="5000"
        data-name="Test Payment"
        data-description="Example description"
        data-currency="usd">
    </script>
</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>