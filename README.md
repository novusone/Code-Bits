# Code-Bits - Reusable Code Repo
------------------------------------------
## Table of Contents
- [CoinMarketCapController](#coinmarketcapcontroller)



------------------------------------------
## CoinMarketCapController


### Info
You will need to obtain an API Key from [HERE](https://pro.coinmarketcap.com/signup) (create a free or paid account). Once you have your key you can then replace the text "YOU-CMC-API-KEY" with your key. From there you can use the functions within the controller.
For more information on the API you can visit this link: [https://coinmarketcap.com/api/documentation/v1/](https://coinmarketcap.com/api/documentation/v1/)

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
