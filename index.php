<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Currency Calculator</title>
</head>
<body>
<h1>Currency Calculator</h1>

<?php
// Default values
$inputDollarCurrency = 1;
$currencyName = "lira";
$currenciesForeignValue = 1;

$dollarValue = "Dollar";
$euroValue = "Euro";

if(isset($_POST["currencyForeignInput"]))
  $inputDollarCurrency = $_POST["currencyForeignInput"];

if(isset($_POST["currencyEuroInput"])) {
  $inputEuroCurrency = $_POST["currencyEuroInput"];
}

function calculateEurDollar($inputVal): float {
  return ($inputVal / 100) * 88;
}

$calculatedEuroCurrency = calculateEurDollar($inputDollarCurrency);

if(isset($_POST["currenciesName"]))
  $currencyName = $_POST["currenciesName"];

if(isset($_POST["currenciesForeignInput"]))
  $currenciesForeignValue = $_POST["currenciesForeignInput"];

if(isset($_POST["switch"])) {
  switchVal($inputDollarCurrency, $inputEuroCurrency, $euroValue, $dollarValue);
}

function switchVal(&$inputDollarCurrency, &$inputEuroCurrency, &$euroValue, &$dollarValue) {
  $x = $inputDollarCurrency;
  $inputDollarCurrency = $inputEuroCurrency;
  $inputEuroCurrency = $x;

  $y = $dollarValue;
  $dollarValue = $euroValue;
  $euroValue = $y;
}

function currencyConvert($currencyType, $amount) : float {
  if($currencyType === "lira") {
    return $amount * 0.064;
  }
  if($currencyType === "yen") {
    return $amount * 0.0076;
  }
  if($currencyType === "pound") {
    return $amount * 1.19;
  }
  if($currencyType === "franc") {
    return $amount * 0.95;
  }
  return 0;
}

function showCurrencyName($currencyName) : string {
    if($currencyName === "lira") {
        return "Turkish Lira";
    }
    if($currencyName === "yen") {
        return "Japanese Yen";
    }
    if($currencyName === "pound") {
        return "British Pound";
    }
    if($currencyName === "franc") {
        return "Swiss Franc";
    }
    return "";
}

$correctCurrencyName = showCurrencyName($currencyName);
$calculate = currencyConvert($currencyName, $currenciesForeignValue);
?>

<form action="" method="post">
    <label for="currencyForeign"><?php echo $dollarValue ?></label><br>
    <input type="text" id="currencyForeign" name="currencyForeignInput" value="<?php echo $inputDollarCurrency ?>">
    <input type="submit" name="switch" value="Switch"><br>

    <label for="currencyEuro"><?php echo $euroValue ?></label><br>
    <input type="text" id="currencyEuro" name="currencyEuroInput" value="<?php echo $calculatedEuroCurrency ?>" disabled><br><br>
    <input type="submit" value="Convert">
</form>

<br><br>

<form action="" method="post">
    <label for="currenciesForeign">Choose your currency:</label>
    <select id="currenciesForeign" name="currenciesName">
        <option value="lira">Turkish Lira</option>
        <option value="yen">Japanese Yen</option>
        <option value="pound">British Pound</option>
        <option value="franc">Swiss Franc</option>
    </select><br><br>

    <label for="currenciesForeignValue"><?php echo $correctCurrencyName ?> Amount:</label>
    <input type="text" id="currenciesForeignValue" name="currenciesForeignInput" value="<?php echo $currenciesForeignValue ?>">
    <input type="submit" name="switch" value="Switch"><br><br>

    <label for="currenciesLocalValue">Amount in Euro:</label>
    <input type="text" id="currenciesLocalValue" name="currenciesLocalInput" value="<?php echo $calculate ?>" disabled><br><br>

    <input type="submit" value="Convert">
</form>
</body>
</html>