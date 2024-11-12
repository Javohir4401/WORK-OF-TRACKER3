<?php
include 'curl.php';

$currency = new Currency();
$rates = $currency->fetchRates();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Currency Converter</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #d0e7ff;
            font-family: Arial, sans-serif;
            color: #333;
        }
        .currency-section {
            padding: 60px 0;
            text-align: center;
        }
        .currency-card {
            max-width: 600px;
            margin: 0 auto;
            padding: 30px;
            background: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        h1, h3 {
            color: #333;
        }
        p.subtext {
            color: #666;
        }
        .form-control, .form-select {
            height: 50px;
            font-size: 16px;
        }
        .btn-primary-custom {
            background-color: #d9534f;
            border: none;
            color: white;
            font-size: 18px;
        }
        .btn-primary-custom:hover {
            background-color: #c9302c;
        }
        .info-section {
            padding: 40px 0;
            background-color: #f9f9f9;
            text-align: center;
        }
        .result {
            margin-top: 20px;
            font-weight: bold;
            color: #155724;
        }
    </style>
</head>
<body>

<div class="currency-section bg-primary-subtle">
    <h1>Currency Converter</h1>
    <p>Need to make an international business payment? Take a look at our live foreign exchange rates.</p>
    <div class="currency-card">
        <h3>Make fast and affordable international business payments</h3>
        <p>Send secure international business payments in XX currencies, all at competitive rates with no hidden fees.</p>
        <form id="currencyForm">
            <div class="row g-3 align-items-center mb-3">
                <div class="col-md-4">
                    <input type="number" id="amount" class="form-control" placeholder="Amount" value="100" min="0" step="0.01" required>
                </div>
                <div class="col-md-3 text-center">
                <select id="toCurrency" class="form-select">
                        <?php foreach ($rates as $rate) { ?>
                            <option value="<?php echo $rate['Rate']; ?>"><?php echo $rate['Ccy']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-md-1">
                <span>⇆</span> 
                </div>
                <div class="col-md-3 text-center"> 
                    
                <select id="fromCurrency" class="form-select">
                        <?php foreach ($rates as $rate) { ?>
                            <option value="<?php echo $rate['Rate']; ?>"><?php echo $rate['Ccy']; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <button type="button" id="convertButton" class="btn btn-primary-custom w-100">Convert</button>
        </form>
        <p id="result" class="result mt-3">Exchange rate info will appear here.</p>
    </div>
</div>

<div class="info-section">
    <h4 class="fw-bold">Let’s save you some time</h4>
    <p>If you’ve got a target exchange rate in mind but haven’t got time to keep tabs on market movement, then a firm order could be perfect for you. When your chosen rate is reached, 
        we’ll act immediately, leaving you free to concentrate on your business.</p>
    <button class="btn btn-outline-danger">Find out more</button>
</div>

<script>
document.getElementById('convertButton').addEventListener('click', function () {
    var amount = parseFloat(document.getElementById('amount').value);
    var fromRate = parseFloat(document.getElementById('fromCurrency').value);
    var toRate = parseFloat(document.getElementById('toCurrency').value);

    if (!isNaN(amount) && fromRate > 0 && toRate > 0) {
        var convertedAmount = (amount / fromRate) * toRate;
        // Format the converted amount with thousand separators
        var formattedAmount = convertedAmount.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        document.getElementById('result').textContent = 'Converted Amount: ' + formattedAmount;
    } else {
        document.getElementById('result').textContent = 'Please enter a valid amount and select currencies.';
    }
});

</script>

</body>
</html>
