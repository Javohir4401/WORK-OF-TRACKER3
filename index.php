<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Currency Converter</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .currency-card {
            max-width: 600px;
            margin: 0 auto;
            padding: 30px;
            background: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        .currency-section {
            padding: 60px 0;
        }
        .info-section {
            padding: 60px 0;
            text-align: center;
        }
        .btn-primary-custom {
            background-color: #d32f2f;
            border: none;
        }
    </style>
</head>
<body>
<div class="currency-section text-center pt-5 bg-primary-subtle">
    <h1>Currency Converter</h1>
    <p>Need to make an international business payment? Take a look at our live foreign exchange rates.</p>
    <div class="currency-card">
        <h3>Make fast and affordable international business payments</h3>
        <p>Send secure international business payments in XX currencies, all at competitive rates with no hidden
            fees.</p>
        <form id="currencyForm" onsubmit="convertCurrency(event)">
            <div class="row g-3 align-items-center">
                <div class="col-md-5">
                    <label for="amount" class="form-label visually-hidden">Amount</label>
                    <input type="number" id="amount" class="form-control" placeholder="Amount" value="10000" min="0" step="0.01" required>
                </div>
                <div class="col-md-3 text-center">
                    <select id="fromCurrency" class="form-select">
                        <option value="USD">USD</option>
                        <option value="EUR">EUR</option>
                        <option value="RUB">RUB</option>
                        <option value="KZT">KZT</option>
                        <option value="UZS">UZS</option>
                    </select>
                </div>
                <div class="col-md-1 text-center">
                    <span>⇆</span>
                </div>
                <div class="col-md-3">
                    <select id="toCurrency" class="form-select">
                        <option value="USD">USD</option>
                        <option value="EUR">EUR</option>
                        <option value="RUB">RUB</option>
                        <option value="KZT">KZT</option>
                        <option value="UZS">UZS</option>
                    </select>
                </div>
            </div>
            <p class="rate-info mt-2" id="rateInfo">Exchange rate info will appear here.</p>
            <button type="submit" class="btn btn-primary btn-primary-custom mt-3">Convert</button>
        </form>
        <p id="result" class="mt-3 fw-bold"></p>
    </div>
</div>
<div class="info-section bg-light">
    <h4 class="fw-bold">Let’s save you some time</h4>
    <p class="text-muted">If you’ve got a target exchange rate in mind but haven’t got time to keep tabs on market
        movement, then a firm order could be perfect for you. When your chosen rate is reached, we’ll act immediately,
        leaving you free to concentrate on your business.</p>
    <button class="btn btn-outline-danger">Find out more</button>
</div>

<script>

    const conversionRates = {
        "USD": { "USD": 1, "EUR": 0.85, "RUB": 80, "KZT": 470, "UZS": 12862.73 },
        "EUR": { "USD": 1.18, "EUR": 1, "RUB": 94, "KZT": 550, "UZS": 15132 },
        "RUB": { "USD": 0.0125, "EUR": 0.0106, "RUB": 1, "KZT": 5.85, "UZS": 161.25 },
        "KZT": { "USD": 0.0021, "EUR": 0.0018, "RUB": 0.17, "KZT": 1, "UZS": 27.5 },
        "UZS": { "USD": 0.000078, "EUR": 0.000066, "RUB": 0.0062, "KZT": 0.036, "UZS": 1 }
    };

    function convertCurrency(event) {
        event.preventDefault();
        const amount = parseFloat(document.getElementById('amount').value);
        const fromCurrency = document.getElementById('fromCurrency').value;
        const toCurrency = document.getElementById('toCurrency').value;

        if (fromCurrency === toCurrency) {
            document.getElementById('result').textContent = `No conversion needed. Result: ${amount.toFixed(2)} ${toCurrency}`;
            document.getElementById('rateInfo').textContent = "1 " + fromCurrency + " = 1 " + toCurrency;
            return;
        }

        const rate = conversionRates[fromCurrency][toCurrency];
        if (rate) {
            const convertedAmount = amount * rate;
            document.getElementById('result').textContent = `Converted Amount: ${convertedAmount.toFixed(2)} ${toCurrency}`;
            document.getElementById('rateInfo').textContent = `1 ${fromCurrency} = ${rate.toFixed(2)} ${toCurrency}`;
        } else {
            document.getElementById('result').textContent = "Conversion rate not available.";
            document.getElementById('rateInfo').textContent = "Rate information not found.";
        }
    }
</script>
</body>
</html>
