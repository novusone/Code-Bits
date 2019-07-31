<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// https://coinmarketcap.com/api/documentation/v1/

define($apiKey, 'YOU-CMC-API-KEY');

class CoinMarketCapController extends Controller {
    //Internal use only
    private function buildAPICall($url, $parameters, $headers) {
        $qs = http_build_query( $parameters );
        $request = "{$url}?{$qs}";
        $curl = curl_init(); 
        curl_setopt_array( $curl, array( CURLOPT_URL => $request, CURLOPT_HTTPHEADER => $headers, CURLOPT_RETURNTRANSFER => 1 ) );
        $response = curl_exec( $curl );
        curl_close( $curl );
        $data = json_decode( $response );
        return $data;
    }

    public static function cmcGetCoinMap( $symbol ) {
        $url = 'https://pro-api.coinmarketcap.com/v1/cryptocurrency/map';
        $parameters = [ 'symbol' => $symbol ];
        $headers = [ 'Accepts: application/json', 'X-CMC_PRO_API_KEY: ' . $apiKey ];
      
        return buildAPICall($url, $parameters, $headers);
    }

    public static function cmcGetCoinInfo( $id ) {
        $url = 'https://pro-api.coinmarketcap.com/v1/cryptocurrency/info';
        $parameters = [ 'symbol' => $id ];
        $headers = [ 'Accepts: application/json', 'X-CMC_PRO_API_KEY: ' . $apiKey ];
      
        return buildAPICall($url, $parameters, $headers);
    }

    public static function cmcGetCoinListingsLatest( $start, $limit, $convert ) {
        $url = 'https://pro-api.coinmarketcap.com/v1/cryptocurrency/listings/latest';
        $parameters = [ 'start' => $start, 'limit' => $limit, 'convert' => $convert ];
        $headers = [ 'Accepts: application/json', 'X-CMC_PRO_API_KEY: ' . $apiKey ];
      
        return buildAPICall($url, $parameters, $headers);
    }

    public static function cmcGetCoinListingsHistorical( $start, $limit, $convert, $date ) {
        $url = 'https://pro-api.coinmarketcap.com/v1/cryptocurrency/listings/historical';
        $parameters = [ 'start' => $start, 'limit' => $limit, 'convert' => $convert, $date => 'date' ];
        $headers = [ 'Accepts: application/json', 'X-CMC_PRO_API_KEY: ' . $apiKey ];
      
        return buildAPICall($url, $parameters, $headers);
    }

    public static function cmcGetCoinQuotesLatest( $id, $convert ) {
        $url = 'https://pro-api.coinmarketcap.com/v1/cryptocurrency/quotes/latest';
        $parameters = [ 'id' => $id ];
        $headers = [ 'Accepts: application/json', 'X-CMC_PRO_API_KEY: ' . $apiKey ];
      
        return buildAPICall($url, $parameters, $headers);
    }

    public static function cmcGetCoinQuotesHistorical( $id, $count, $time_end, $convert ) {
        $url = 'https://pro-api.coinmarketcap.com/v1/cryptocurrency/quotes/historical';
        $parameters = [ 'id' => $id, 'count' => $count, 'time_end' => $time_end  ];
        $headers = [ 'Accepts: application/json', 'X-CMC_PRO_API_KEY: ' . $apiKey ];
      
        return buildAPICall($url, $parameters, $headers);
    }

    public static function cmcGetCoinOHLCVLatest( $id, $convert ) {
        $url = 'https://pro-api.coinmarketcap.com/v1/cryptocurrency/ohlcv/latest';
        $parameters = [ 'id' => $id  ];
        $headers = [ 'Accepts: application/json', 'X-CMC_PRO_API_KEY: ' . $apiKey ];
      
        return buildAPICall($url, $parameters, $headers);
    }

    public static function cmcGetCoinOHLCVHistorical( $id, $time_start, $time_end, $convert ) {
        $url = 'https://pro-api.coinmarketcap.com/v1/cryptocurrency/ohlcv/historical';
        $parameters = [ 'id' => $id, 'time_start' => $time_start, 'time_end' => $time_end  ];
        $headers = [ 'Accepts: application/json', 'X-CMC_PRO_API_KEY: ' . $apiKey ];
      
        return buildAPICall($url, $parameters, $headers);
    }

    public static function cmcGetCoinExchangeMap( $slug ) {
        $url = 'https://pro-api.coinmarketcap.com/v1/exchange/map';
        $parameters = [ 'slug' => $slug  ];
        $headers = [ 'Accepts: application/json', 'X-CMC_PRO_API_KEY: ' . $apiKey ];
      
        return buildAPICall($url, $parameters, $headers);
    }

    public static function cmcGetCoinExchangeInfo( $id ) {
        $url = 'https://pro-api.coinmarketcap.com/v1/exchange/info';
        $parameters = [ 'id' => $id  ];
        $headers = [ 'Accepts: application/json', 'X-CMC_PRO_API_KEY: ' . $apiKey ];
      
        return buildAPICall($url, $parameters, $headers);
    }

    public static function cmcGetCoinExchangeListingsLatest( $start, $limit, $sort, $sort_dir, $convert ) {
        $url = 'https://pro-api.coinmarketcap.com/v1/exchange/listings/latest';
        $parameters = [ 'start' => $start, 'limit' => $limit, 'sort' => $sort, 'sort_dir' => $sort_dir  ];
        $headers = [ 'Accepts: application/json', 'X-CMC_PRO_API_KEY: ' . $apiKey ];
      
        return buildAPICall($url, $parameters, $headers);
    }

    public static function cmcGetCoinExchangeListingsHistorical(  ) {
        // CMC is missing the example for this function
    }

    public static function cmcGetCoinExchangeQuotesLatest( $id, $convert ) {
        $url = 'https://pro-api.coinmarketcap.com/v1/exchange/listings/latest';
        $parameters = [ 'id' => $id  ];
        $headers = [ 'Accepts: application/json', 'X-CMC_PRO_API_KEY: ' . $apiKey ];
      
        return buildAPICall($url, $parameters, $headers);
    }

    public static function cmcGetCoinExchangeQuotesHistorical( $id, $time_end, $count, $interval, $convert ) {
        $url = 'https://pro-api.coinmarketcap.com/v1/exchange/quotes/historical';
        $parameters = [ 'id' => $id, 'time_end' => $time_end, 'count' => $count, 'interval' => $interval ];
        $headers = [ 'Accepts: application/json', 'X-CMC_PRO_API_KEY: ' . $apiKey ];
      
        return buildAPICall($url, $parameters, $headers);
    }

    public static function cmcGetCoinMarketPairsLatest( $id, $start, $limit, $convert ) {
        $url = 'https://pro-api.coinmarketcap.com/v1/exchange/market-pairs/latest';
        $parameters = [ 'id' => $id, 'start' => $start, 'limit' => $limit ];
        $headers = [ 'Accepts: application/json', 'X-CMC_PRO_API_KEY: ' . $apiKey ];
      
        return buildAPICall($url, $parameters, $headers);
    }

    public static function cmcGetCoinGlobalMetricsQuotesLatest( $convert ) {
        $url = 'https://pro-api.coinmarketcap.com/v1/exchange/market-pairs/latest';
        $parameters = [ 'convert' => $convert ];
        $headers = [ 'Accepts: application/json', 'X-CMC_PRO_API_KEY: ' . $apiKey ];
      
        return buildAPICall($url, $parameters, $headers);
    }
}
