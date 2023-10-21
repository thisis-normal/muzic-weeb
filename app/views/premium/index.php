<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/index/style.css">

    <title>Premium Plan</title>
    <style>
        .tt {
            position: fixed;
            top: 50px;
            left: 50%;
            transform: translateX(-50%);
            color: #fff;
            text-align: center;
            font-size: 36px;
        }

        .paypal_popup {
            display: none;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 24px;
            text-align: center;
            position: fixed;
            width: 350px;
            background-color: #fff;
            z-index: 100;
            height: 400px;
            border-radius: 10px;
        }

        .paypal_popup h2 {
            margin: 24px;
            font-size: 36px;
        }

        .paypal_popup div {
            margin-left: 12px;
        }

        .payprice {
            color: #218838;
            font-size: 36px;
            margin: 12px 0 48px 0;
        }

        .bgpop {
            display: none;
            position: fixed;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 99;
        }
    </style>
</head>

<body>
    <div class="pay">
        <!--    create a table that contains the premium plan-->

        <h2 class="tt">Pricing Plans</h2>
        <ul class="price-list">
            <li class="price-item">
                <h2>Basic</h2>
                <ul class="feature-list">
                    <li><strong>Monthly Price:</strong> $9.99</li>
                    <li><strong>Songs Per Month:</strong> 100</li>
                    <li><strong>Audio Quality:</strong> 128 kbps</li>
                    <li><strong>Ad-free Listening:</strong> No</li>
                    <li><a href="#" data-namepr="Basic" data-price="$9.99" class="btn btn-success">Buy Now</a></li>
                </ul>
            </li>

            <li class="price-item">
                <h2>Premium</h2>
                <ul class="feature-list">
                    <li><strong>Monthly Price:</strong> $19.99</li>
                    <li><strong>Songs Per Month:</strong> Unlimited</li>
                    <li><strong>Audio Quality:</strong> 256 kbps</li>
                    <li><strong>Ad-free Listening:</strong> Yes</li>
                    <li><a href="#" data-namepr="Premium" data-price="$19.99" class="btn btn-success">Buy Now</a></li>
                </ul>
            </li>

            <li class="price-item">
                <h2>Platinum</h2>
                <ul class="feature-list">
                    <li><strong>Monthly Price:</strong> $29.99</li>
                    <li><strong>Songs Per Month:</strong> Unlimited</li>
                    <li><strong>Audio Quality:</strong> Lossless</li>
                    <li><strong>Ad-free Listening:</strong> Yes</li>
                    <li><a href="#" data-namepr="Platium" data-price="$29.99" class="btn btn-success">Buy Now</a></li>
                </ul>
            </li>
        </ul>
        <div id="form-container">
            <!-- Biểu mẫu sẽ được thêm vào đây -->
        </div>
    </div>
    <div class="bgpop" id="popup"></div>
    <div class="paypal_popup" id="paypal_popup">
        <h2 id="paypal-popup-title"></h2>
        <div class="payprice" id="payprice"></div>

        <div id="paypal-button-container" style="max-width:300px;"></div>
        <p id="result-message"></p>
    </div>
    <script src="https://www.paypal.com/sdk/js?client-id=ASGrPQD3Kl5Ju4m60cmOUF3srF__aWev3fERnjxYENaMZMQcPfK_SyjRcM6sBqLMnXXfr-YW22Ls-wCM&currency=USD"></script>


    <script>
        const btns = document.querySelectorAll(".btn");
        btns.forEach(btn => {
            btn.addEventListener("click", function(event) {
                event.preventDefault();
                let price = btn.getAttribute("data-price");
                let namepr = btn.getAttribute("data-namepr");
                document.getElementById("paypal-popup-title").textContent = namepr;
                document.getElementById("payprice").textContent = price;
                document.getElementById("paypal_popup").style.display = "block";
                document.getElementById("popup").style.display = "block";
                const pricex = document.getElementById("payprice").textContent.replace("$", "");
                console.log(pricex);
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
                                    value: `${pricex}`,
                                    currency_code: 'USD'
                                }
                            }]
                        });
                    },
                    onApprove: function(data, actions) {
                        return actions.order.capture().then(function(details) {
                            console.log(details);

                            // alert('Transaction completed by ' + details.payer.name.given_name + '!');
                            var form = document.createElement('form');
                            form.setAttribute('id', 'myForm');

                            var nameLabel = document.createElement('label');
                            nameLabel.textContent = 'Tên:';

                            var nameInput = document.createElement('input');
                            nameInput.setAttribute('type', 'text');
                            nameInput.setAttribute('name', 'name');

                            var emailLabel = document.createElement('label');
                            emailLabel.textContent = 'Email:';

                            var emailInput = document.createElement('input');
                            emailInput.setAttribute('type', 'text');
                            emailInput.setAttribute('name', 'email');

                            var submitButton = document.createElement('button');
                            submitButton.setAttribute('type', 'submit');
                            submitButton.textContent = 'Gửi';

                            // Thêm các trường vào biểu mẫu
                            form.appendChild(nameLabel);
                            form.appendChild(nameInput);
                            form.appendChild(emailLabel);
                            form.appendChild(emailInput);
                            form.appendChild(submitButton);

                            // Thêm biểu mẫu vào phần tử với id "form-container"
                            var formContainer = document.getElementById('form-container');
                            formContainer.appendChild(form);
                        });
                    }
                }).render('#paypal-button-container'); // Display payment options on your web page
            });
        })
        document.getElementById("popup").addEventListener("click", function() {
            document.getElementById("paypal_popup").style.display = "none";
            document.getElementById("popup").style.display = "none";
            location.reload();
        })
    </script>
</body>

</html>