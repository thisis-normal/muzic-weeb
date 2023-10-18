<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Premium Plan</title>
    <style>
        th {
            padding-left: 20px;
            padding-right: 20px;
        }

        td {
            padding-left: 20px;
            padding-right: 20px;
        }
    </style>
</head>

<body>
    <!--    create a table that contains the premium plan-->
    <h2>Pricing Plans</h2>

    <table>
        <thead>
            <tr>
                <th>Plan</th>
                <th>Basic</th>
                <th>Premium</th>
                <th>Platinum</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td>Monthly Price</td>
                <td>$9.99</td>
                <td>$19.99</td>
                <td>$29.99</td>
            </tr>

            <tr>
                <td>Songs Per Month</td>
                <td>100</td>
                <td>Unlimited</td>
                <td>Unlimited</td>
            </tr>

            <tr>
                <td>Audio Quality</td>
                <td>128 kbps</td>
                <td>256 kbps</td>
                <td>Lossless</td>
            </tr>

            <tr>
                <td>Ad-free Listening</td>
                <td>No</td>
                <td>Yes</td>
                <td>Yes</td>
            </tr>
            <tr>
                <td>Buy Now!!!</td>
                <td><a href="<?= URLROOT ?>/premium/payment" class="btn btn-success">Buy Now</a></td>
                <td><a href="<?= URLROOT ?>/premium/payment" class="btn btn-success">Buy Now</a></td>
                <td><a href="<?= URLROOT ?>/premium/payment" class="btn btn-success">Buy Now</a></td>
            </tr>
        </tbody>
    </table>
    <h1>Payment</h1>
    <div id="paypal-button-container" style="max-width:1000px;"></div>
    <p id="result-message"></p>
    <script src="https://www.paypal.com/sdk/js?client-id=ASGrPQD3Kl5Ju4m60cmOUF3srF__aWev3fERnjxYENaMZMQcPfK_SyjRcM6sBqLMnXXfr-YW22Ls-wCM&currency=USD"></script>
    <script>
        paypal.Buttons({
            onClick() {

            },
            style: {
                layout: 'vertical',
                color: 'gold',
                shape: 'pill',
                label: 'paypal',
                height: 50
            },
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: '10.99',
                            currency_code: 'USD'
                        }
                    }]
                });
            },
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(details) {
                    console.log(details);

                    // Succesful capture for dev/demo purpose
                    // console.log('Capture result', details, JSON.stringify(details, null, 2));
                    // const transaction = details.purchase_units[0].payment.captures[0];
                    alert('Transaction completed by ' + details.payer.name.given_name + '!');
                    // alert('Transaction ' + transaction.status + ': ' + transaction.id + '\n\nSee console for all available details');
                });
            }
        }).render('#paypal-button-container'); // Display payment options on your web page
    </script>
</body>

</html>