# Code-Bits
Reusable Code Repo
------------------------------------------
## Table of Contents
- [CoinMarketCapController](#coinmarketcapcontroller)



------------------------------------------
## CoinMarketCapController



Usage Example:
```
<?php
use Your\Controller\Path\CoinMarketCapController;

$coinID = 1; //Bitcoin
$currency = "USD";
$currencySymbol = "$";
$coinLogo = "https://s2.coinmarketcap.com/static/img/coins/64x64/" . CoinMarketCapController::cmcGetCoinQuotesLatest( $coinID, $currency )->data->$coinID->id. ".png";
$percent_change_24h = number_format( CoinMarketCapController::cmcGetCoinQuotesLatest( $coinID, $currency )->data->$coinID->quote->$currency->percent_change_24h, 2, '.', ',');

/*
Looking for the "-" to see if price is up or down

**/
$percent_change_24hDir = substr($percent_change_24h, 0, 1); 

/*
From here you can echo the php vars into your Javascript/HTML output.
**/
```
