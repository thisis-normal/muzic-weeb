<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PayPal JS SDK Standard Integration</title>
</head>
<body>
<div id="paypal-button-container"></div>
<p id="result-message"></p>
<!-- Replace the "test" client-id value with your client-id -->
<script src="https://www.paypal.com/sdk/js?client-id=ASGrPQD3Kl5Ju4m60cmOUF3srF__aWev3fERnjxYENaMZMQcPfK_SyjRcM6sBqLMnXXfr-YW22Ls-wCM&currency=USD"></script>
<script src="app.js"></script>
<script>
    paypal.Buttons({
        createOrder: function(data, actions) {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: '10.99'
                    }
                }]
            });
        },
        onApprove: function(data, actions) {
            return actions.order.capture().then(function(details) {
                alert('Transaction completed by ' + details.payer.name.given_name + '!');
            });
        }
    }).render('#paypal-button-container'); // Display payment options on your web page
</script>
</body>
</html>
