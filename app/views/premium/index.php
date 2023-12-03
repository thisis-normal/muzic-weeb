<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link class="logo" rel="shortcut icon" href="https://user-images.githubusercontent.com/73392859/275700777-0e4f5ba8-7ac9-4826-904a-06cade4a593b.png" type="image/x-icon" />
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
            <?php
            /** @var array $data */
            foreach ($data['subscription_plans'] as $subscription_plans) {
            ?>
                <li class="price-item">


                    <h2><?= $subscription_plans->name ?></h2>
                    <ul class="feature-list">
                        <li><strong>Price:</strong>
                            $<?= $subscription_plans->price ?>
                            <?php
                            //show original price if that subscription plan has discount
                            if ($subscription_plans->discount != 0) { ?>
                                <span style='color: red'><s> $<?= (int)($subscription_plans->price + $subscription_plans->price * $subscription_plans->discount / 100) ?></s></span>
                            <?php } ?>
                        </li>
                        <li><strong>Period:</strong><?= $subscription_plans->period ?></li>
                        <li><strong>Ad-free Listening:</strong> <?= $subscription_plans->ads_disable ?></li>
                        <li><strong>Download music:</strong><?= $subscription_plans->download_music ?></li>
                        <?php if (isUserLoggedIn()) { ?>
                            <li><a href="#" data-namepr="<?= $subscription_plans->name ?>" data-price="$<?= $subscription_plans->price ?>" data-planid="<?= $subscription_plans->id ?>" data-period="<?= $subscription_plans->period ?>" data-planname="<?= $subscription_plans->name ?>" class="btn btn-success">Buy Now</a></li>
                        <?php } else { ?>
                            <li style="color: #1db954"><a href="<?= URLROOT ?>/users/login" class="btn btn-success">Login to
                                    buy</a></li>
                        <?php } ?>
                    </ul>
                </li>
            <?php } ?>
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
        var planId;
        var period;
        var planname;
        btns.forEach(btn => {
            btn.addEventListener("click", function(event) {
                if (btn.innerHTML === "Buy Now") {
                    event.preventDefault();
                    let price = btn.getAttribute("data-price");
                    let namepr = btn.getAttribute("data-namepr");
                    planId = btn.getAttribute("data-planid");
                    period = btn.getAttribute("data-period");
                    planname = btn.getAttribute("data-planname");
                    document.getElementById("paypal-popup-title").textContent = namepr;
                    document.getElementById("payprice").textContent = price;
                    document.getElementById("paypal_popup").style.display = "block";
                    document.getElementById("popup").style.display = "block";
                    const pricex = document.getElementById("payprice").textContent.replace("$", "");
                    console.log(pricex);
                    paypal.Buttons({
                        onClick() {},
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

                                // Tạo một biểu mẫu (form) bằng JavaScript
                                var form = document.createElement('form');
                                form.setAttribute('id', 'myform');
                                form.setAttribute('method', 'post');
                                form.setAttribute('action', '<?= URLROOT ?>/premium/success');
                                // Tạo và cấu hình các trường (input) bằng JavaScript
                                var fields = [{
                                        label: 'ID',
                                        name: 'id',
                                        value: ''
                                    },
                                    {
                                        label: 'Email',
                                        name: 'email',
                                        value: ''
                                    },
                                    {
                                        label: 'Amount',
                                        name: 'amount',
                                        value: ''
                                    },
                                    {
                                        label: 'Shipping Name',
                                        name: 'shippingName',
                                        value: ''
                                    },
                                    {
                                        label: 'Shipping Address',
                                        name: 'shippingAddress',
                                        value: ''
                                    },
                                    {
                                        label: 'PayPal Fee',
                                        name: 'paypalFee',
                                        value: ''
                                    },
                                    {
                                        label: 'Net Amount',
                                        name: 'netAmount',
                                        value: ''
                                    },
                                    {
                                        label: 'Create Time',
                                        name: 'createTime',
                                        value: ''
                                    }, {
                                        label: 'id plan',
                                        name: 'plan_id',
                                        value: ''
                                    },
                                    {
                                        label: 'period',
                                        name: 'period',
                                        value: ''
                                    }, {
                                        label: 'planname',
                                        name: 'plan_name',
                                        value: ''
                                    },
                                ];

                                fields.forEach(function(field) {
                                    var label = document.createElement('label');
                                    label.textContent = field.label;
                                    var input = document.createElement('input');
                                    input.setAttribute('type', 'text');
                                    input.setAttribute('id', field.name);
                                    input.setAttribute('name', field.name);
                                    input.setAttribute('value', field.value);
                                    input.setAttribute('readonly', 'readonly');
                                    form.appendChild(label);
                                    form.appendChild(input);
                                });
                                var input = document.createElement('input');
                                input.setAttribute('type', 'submit');
                                // input.setAttribute('id', field.name);
                                input.setAttribute('name', 'submit');
                                input.setAttribute('value', 'submit');
                                var formContainer = document.getElementById('form-container');
                                formContainer.appendChild(form);
                                // Thêm biểu mẫu vào phần tử có id "form-container"
                                //    lưu bảng sub

                                // lưu bảng payment
                                document.getElementById("id").value = details.id;
                                document.getElementById("email").value = details.payer.email_address;
                                document.getElementById("amount").value = details.purchase_units[0].amount.value;
                                document.getElementById("shippingName").value = details.purchase_units[0].shipping.name.full_name;
                                document.getElementById("shippingAddress").value = details.purchase_units[0].shipping.address.address_line_1 +
                                    ", " + details.purchase_units[0].shipping.address.admin_area_2 +
                                    ", " + details.purchase_units[0].shipping.address.admin_area_1 +
                                    ", " + details.purchase_units[0].shipping.address.postal_code +
                                    ", " + details.purchase_units[0].shipping.address.country_code;
                                document.getElementById("paypalFee").value = ((details.purchase_units[0].amount.value) * 0.1).toFixed(2);
                                document.getElementById("netAmount").value = ((details.purchase_units[0].amount.value) * 0.9).toFixed(2);
                                document.getElementById("createTime").value = details.create_time;
                                document.getElementById("plan_id").value = planId;
                                document.getElementById("period").value = period;
                                document.getElementById("plan_name").value = planname;
                                console.log(planId, period)
                                form.submit();
                            });
                        }
                    }).render('#paypal-button-container'); // Display payment options on your web page
                }

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


<script>
    // create a json object
    const data = {
        "id": "80U66854Y3885415C",
        "intent": "CAPTURE",
        "status": "COMPLETED",
        "payment_source": {
            "paypal": {
                "email_address": "ntc@personal.example.com",
                "account_id": "B3223W7UPR6TA",
                "account_status": "VERIFIED",
                "name": {
                    "given_name": "Nguyen Thanh",
                    "surname": "Chung"
                },
                "address": {
                    "country_code": "US"
                }
            }
        },
        "purchase_units": [{
            "reference_id": "default",
            "amount": {
                "currency_code": "USD",
                "value": "9.99"
            },
            "payee": {
                "email_address": "sb-qy1nh27739152@business.example.com",
                "merchant_id": "T3CHYVRXCCTP6"
            },
            "shipping": {
                "name": {
                    "full_name": "Nguyen Thanh Chung"
                },
                "address": {
                    "address_line_1": "1 Main St",
                    "admin_area_2": "San Jose",
                    "admin_area_1": "CA",
                    "postal_code": "95131",
                    "country_code": "US"
                }
            },
            "payments": {
                "captures": [{
                    "id": "92R40672J7030310E",
                    "status": "COMPLETED",
                    "amount": {
                        "currency_code": "USD",
                        "value": "9.99"
                    },
                    "final_capture": true,
                    "seller_protection": {
                        "status": "ELIGIBLE",
                        "dispute_categories": [
                            "ITEM_NOT_RECEIVED",
                            "UNAUTHORIZED_TRANSACTION"
                        ]
                    },
                    "seller_receivable_breakdown": {
                        "gross_amount": {
                            "currency_code": "USD",
                            "value": "9.99"
                        },
                        "paypal_fee": {
                            "currency_code": "USD",
                            "value": "0.84"
                        },
                        "net_amount": {
                            "currency_code": "USD",
                            "value": "9.15"
                        }
                    },
                    "links": [{
                            "href": "https://api.sandbox.paypal.com/v2/payments/captures/92R40672J7030310E",
                            "rel": "self",
                            "method": "GET"
                        },
                        {
                            "href": "https://api.sandbox.paypal.com/v2/payments/captures/92R40672J7030310E/refund",
                            "rel": "refund",
                            "method": "POST"
                        },
                        {
                            "href": "https://api.sandbox.paypal.com/v2/checkout/orders/80U66854Y3885415C",
                            "rel": "up",
                            "method": "GET"
                        }
                    ],
                    "create_time": "2023-10-21T09:07:07Z",
                    "update_time": "2023-10-21T09:07:07Z"
                }]
            }
        }],
        "payer": {
            "name": {
                "given_name": "Nguyen Thanh",
                "surname": "Chung"
            },
            "email_address": "ntc@personal.example.com",
            "payer_id": "B3223W7UPR6TA",
            "address": {
                "country_code": "US"
            }
        },
        "create_time": "2023-10-21T09:06:43Z",
        "update_time": "2023-10-21T09:07:07Z",
        "links": [{
            "href": "https://api.sandbox.paypal.com/v2/checkout/orders/80U66854Y3885415C",
            "rel": "self",
            "method": "GET"
        }]
    }
    /*data need to retrieve
    1. "id"
    2. email_address
    3. amount.value
    4. shipping.name & shipping.address
    5. paypal_fee.value
    6. net_amount.value
    7. create_time

    */
</script>