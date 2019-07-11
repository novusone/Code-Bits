<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// https://coinmarketcap.com/api/documentation/v1/

class CoinMarketCapController extends Controller {
    function cmcGetCoinMap( $symbol ) {
        $url = 'https://pro-api.coinmarketcap.com/v1/cryptocurrency/map';
        $parameters = [ 'symbol' => $symbol ];
        $headers = [ 'Accepts: application/json', 'X-CMC_PRO_API_KEY: 17bdc3b5-049d-4b16-8a9c-12e62fc58812' ];
        $qs = http_build_query( $parameters );
        $request = "{$url}?{$qs}";
        $curl = curl_init(); 
        curl_setopt_array( $curl, array( CURLOPT_URL => $request, CURLOPT_HTTPHEADER => $headers, CURLOPT_RETURNTRANSFER => 1 ) );
        $response = curl_exec( $curl );
        print_r( json_decode( $response ) );
        curl_close( $curl );

        if( $response->error != 0 ) {
            /**
             * status {
             *      status->timestamp
             *      status->error_code
             *      status->error_message
             *      status->elapsed
             *      status->credit_count
             * }
             */
            return "Error: " . $response->status->error_code . "( " . $response->satus->error_message . " )";
        } else {
            /**
             * {
             *data {
             *      data->id
             *      data->name
             *      data->symbol
             *      data->slug
             *      data->is_active
             *      data->first_historical_data
             *      data->last_historical_data
             *      data->platform
             * }
             * }
             */
            return $response;
        }
    }

    function cmcGetCoinInfo( $id ) {
        $url = 'https://pro-api.coinmarketcap.com/v1/cryptocurrency/info';
        $parameters = [ 'symbol' => $id ];
        $headers = [ 'Accepts: application/json', 'X-CMC_PRO_API_KEY: 17bdc3b5-049d-4b16-8a9c-12e62fc58812' ];
        $qs = http_build_query( $parameters );
        $request = "{$url}?{$qs}";
        $curl = curl_init(); 
        curl_setopt_array( $curl, array( CURLOPT_URL => $request, CURLOPT_HTTPHEADER => $headers, CURLOPT_RETURNTRANSFER => 1 ) );
        $response = curl_exec( $curl );
        print_r( json_decode( $response ) );
        curl_close( $curl );

        if( $response->error != 0 ) {
            /**
             * status {
             *      status->timestamp
             *      status->error_code
             *      status->error_message
             *      status->elapsed
             *      status->credit_count
             * }
             */
            return "Error: " . $response->status->error_code . "( " . $response->satus->error_message . " )";
        } else {
            /**
             * {
             * data {
             *      # {
             *          data->#->urls {
             *              data->#->urls->website [ ]
             *              data->#->urls->technical_doc [ ]
             *              data->#->urls->twitter [ ]
             *              data->#->urls->reddit [ ]
             *              data->#->urls->message_board [ ]
             *              data->#->urls->announcement [ ]
             *              data->#->urls->chat [ ]
             *              data->#->urls->explorer [ ]
             *              data->#->urls->source_code [ ]
             *          },
             *          data->#->logo
             *          data->#->id
             *          data->#>name
             *          data->#->symbol
             *          data->#->slug
             *          data->#->description
             *          data->#->date_added
             *          data->#->tags [ ]
             *          data->#->platform
             *          data->#->category
             *          }
             *      }
             * }
             */
            return $response;
        }
    }

    function cmcGetCoinListingsLatest( $start, $limit, $convert ) {
        $url = 'https://pro-api.coinmarketcap.com/v1/cryptocurrency/listings/latest';
        $parameters = [ 'start' => $start, 'limit' => $limit, 'convert' => $convert ];
        $headers = [ 'Accepts: application/json', 'X-CMC_PRO_API_KEY: 17bdc3b5-049d-4b16-8a9c-12e62fc58812' ];
        $qs = http_build_query( $parameters );
        $request = "{$url}?{$qs}";
        $curl = curl_init(); 
        curl_setopt_array( $curl, array( CURLOPT_URL => $request, CURLOPT_HTTPHEADER => $headers, CURLOPT_RETURNTRANSFER => 1 ) );
        $response = curl_exec( $curl );
        print_r( json_decode( $response ) );
        curl_close( $curl );

        if( $response->error != 0 ) {
            /**
             * status {
             *      status->timestamp
             *      status->error_code
             *      status->error_message
             *      status->elapsed
             *      status->credit_count
             * }
             */
            return "Error: " . $response->status->error_code . "( " . $response->satus->error_message . " )";
        } else {
            /**
             * {
             * data [
             *      {
             *          data->id
             *          data->name
             *          data->symbol
             *          data->slug
             *          data->cmc_rank
             *          data->num_market_pairs
             *          data->circulating_supply
             *          data->total_supply
             *          data->max_supply
             *          data->last_updated
             *          data->date_added
             *          data->tags [ ]
             *          data->platform
             *          data->quote {
             *                  data->quote->$convert {
             *                          data->quote->$convert->price
             *                          data->quote->$convert->volume_24h
             *                          data->quote->$convert->percent_change_1h
             *                          data->quote->$convert->percent_change_24h
             *                          data->quote->$convert->percent_change_7d
             *                          data->quote->$convert->market_cap
             *                          data->quote->$convert->last_updated
             *                  }
             *          }
             * }]
             * }
             */
            return $response;
        }
    }

    function cmcGetCoinListingsHistorical( $start, $limit, $convert, $date ) {
        $url = 'https://pro-api.coinmarketcap.com/v1/cryptocurrency/listings/historical';
        $parameters = [ 'start' => $start, 'limit' => $limit, 'convert' => $convert, $date => 'date' ];
        $headers = [ 'Accepts: application/json', 'X-CMC_PRO_API_KEY: 17bdc3b5-049d-4b16-8a9c-12e62fc58812' ];
        $qs = http_build_query( $parameters );
        $request = "{$url}?{$qs}";
        $curl = curl_init(); 
        curl_setopt_array( $curl, array( CURLOPT_URL => $request, CURLOPT_HTTPHEADER => $headers, CURLOPT_RETURNTRANSFER => 1 ) );
        $response = curl_exec( $curl );
        print_r( json_decode( $response ) );
        curl_close( $curl );

        if( $response->error != 0 ) {
            /**
             * status {
             *      status->timestamp
             *      status->error_code
             *      status->error_message
             *      status->elapsed
             *      status->credit_count
             * }
             */
            return "Error: " . $response->status->error_code . "( " . $response->satus->error_message . " )";
        } else {
            /**
             * {
             * data [
             *      {
             *          data->id
             *          data->name
             *          data->symbol
             *          data->slug
             *          data->cmc_rank
             *          data->circulating_supply
             *          data->total_supply
             *          data->max_supply
             *          data->last_updated
             *          data->date_added
             *          data->tags [ ]
             *          data->platform
             *          data->quote {
             *                  data->quote->$convert {
             *                          data->quote->$convert->price
             *                          data->quote->$convert->volume_24h
             *                          data->quote->$convert->percent_change_1h
             *                          data->quote->$convert->percent_change_24h
             *                          data->quote->$convert->percent_change_7d
             *                          data->quote->$convert->market_cap
             *                          data->quote->$convert->last_updated
             *                  }
             *          }
             * }]
             * }
             */
            return $response;
        }
    }

    function cmcGetCoinQuotesLatest( $id ) {
        $url = 'https://pro-api.coinmarketcap.com/v1/cryptocurrency/quotes/latest';
        $parameters = [ 'id' => $id ];
        $headers = [ 'Accepts: application/json', 'X-CMC_PRO_API_KEY: 17bdc3b5-049d-4b16-8a9c-12e62fc58812' ];
        $qs = http_build_query( $parameters );
        $request = "{$url}?{$qs}";
        $curl = curl_init(); 
        curl_setopt_array( $curl, array( CURLOPT_URL => $request, CURLOPT_HTTPHEADER => $headers, CURLOPT_RETURNTRANSFER => 1 ) );
        $response = curl_exec( $curl );
        print_r( json_decode( $response ) );
        curl_close( $curl );

        if( $response->error != 0 ) {
            /**
             * status {
             *      status->timestamp
             *      status->error_code
             *      status->error_message
             *      status->elapsed
             *      status->credit_count
             * }
             */
            return "Error: " . $response->status->error_code . "( " . $response->satus->error_message . " )";
        } else {
            /**
             * {
             * data {
             *          data->#->id
             *          data->$id->name
             *          data->#->symbol
             *          data->#->slug
             *          data->#->circulating_supply
             *          data->#->total_supply
             *          data->#->max_supply
             *          data->#->date_added
             *          data->#->num_market_pairs
             *          data->#->cmc_rank
             *          data->#->last_updated
             *          data->#->tags [ ]
             *          data->#->platform
             *          data->#->quote {
             *                  data->#->quote->$convert {
             *                          data->quote->$convert->price
             *                          data->quote->$convert->volume_24h
             *                          data->quote->$convert->percent_change_1h
             *                          data->quote->$convert->percent_change_24h
             *                          data->quote->$convert->percent_change_7d
             *                          data->quote->$convert->market_cap
             *                          data->quote->$convert->last_updated
             *                  }
             *          }
             * }
             * }
             */
            return $response;
        }
    }

    function cmcGetCoinQuotesHistorical( $id, $count, $time_end, $convert ) {
        $url = 'https://pro-api.coinmarketcap.com/v1/cryptocurrency/quotes/historical';
        $parameters = [ 'id' => $id, 'count' => $count, 'time_end' => $time_end  ];
        $headers = [ 'Accepts: application/json', 'X-CMC_PRO_API_KEY: 17bdc3b5-049d-4b16-8a9c-12e62fc58812' ];
        $qs = http_build_query( $parameters );
        $request = "{$url}?{$qs}";
        $curl = curl_init(); 
        curl_setopt_array( $curl, array( CURLOPT_URL => $request, CURLOPT_HTTPHEADER => $headers, CURLOPT_RETURNTRANSFER => 1 ) );
        $response = curl_exec( $curl );
        print_r( json_decode( $response ) );
        curl_close( $curl );

        if( $response->error != 0 ) {
            /**
             * status {
             *      status->timestamp
             *      status->error_code
             *      status->error_message
             *      status->elapsed
             *      status->credit_count
             * }
             */
            return "Error: " . $response->status->error_code . "( " . $response->satus->error_message . " )";
        } else {
            /**
             * {
             * data {
             *      data->id
             *      data->name
             *      data->symbol
             *      data->quotes [
             *              {
             *                      data->quotes->timestamp
             *                      data->quotes->quote {
             *                              data->quotes->quote {
             *                                      data->quotes->quote->$convert {
             *                                          data->quotes->quote->$convert->price
             *                                          data->quotes->quote->$convert->volume_24h
             *                                          data->quotes->quote->$convert->market_cap
             *                                          data->quotes->quote->$convert->last_updated
             *                                      }
             *                              }
             *                      }
             *              }]
             * }
             * }
             */
            return $response;
        }
    }

    function cmcGetCoinQuotesHistorical( $id, $start, $limit, $convert ) {
        $url = 'https://pro-api.coinmarketcap.com/v1/cryptocurrency/market-pairs/latest';
        $parameters = [ 'id' => $id, 'start' => $start, 'limit' => $limit, 'convert' => $convert  ];
        $headers = [ 'Accepts: application/json', 'X-CMC_PRO_API_KEY: 17bdc3b5-049d-4b16-8a9c-12e62fc58812' ];
        $qs = http_build_query( $parameters );
        $request = "{$url}?{$qs}";
        $curl = curl_init(); 
        curl_setopt_array( $curl, array( CURLOPT_URL => $request, CURLOPT_HTTPHEADER => $headers, CURLOPT_RETURNTRANSFER => 1 ) );
        $response = curl_exec( $curl );
        print_r( json_decode( $response ) );
        curl_close( $curl );

        if( $response->error != 0 ) {
            /**
             * status {
             *      status->timestamp
             *      status->error_code
             *      status->error_message
             *      status->elapsed
             *      status->credit_count
             * }
             */
            return "Error: " . $response->status->error_code . "( " . $response->satus->error_message . " )";
        } else {
            /**
             * {
             * data {
             *      data->id
             *      data->name
             *      data->symbol
             *      data->num_market_pairs
             *      data->market_pairs [
             *          {
             *                  data->market_pairs->exchange->id
             *                  data->market_pairs->exchange->name
             *                  data->market_pairs->exchange->slug
             *           },
             *          data->market_pairs->market_id
             *          data->market_pairs->market_pair
             *          data->market_pairs->category
             *          data->market_pairs->fee_type
             *          data->market_pairs->market_pair_base {
             *                  data->market_pairs->market_pair_base->currency_id
             *                  data->market_pairs->market_pair_base->currency_symbol
             *                  data->market_pairs->market_pair_base->exchange_symbol
             *                  data->market_pairs->market_pair_base->currency_type
             *          },
             *          data->market_pairs->market_pair_quote {
             *                  data->market_pairs->market_pair_quote->currency_id
             *                  data->market_pairs->market_pair_quote->currency_symbol
             *                  data->market_pairs->market_pair_quote->exchange_symbol
             *                  data->market_pairs->market_pair_quote->currency_type
             *          },
             *          data->market_pairs->quote {
             *                  data->market_pairs->quote->exchange_reported {
             *                          data->market_pairs->quote->exchange_reported->price
             *                          data->market_pairs->quote->exchange_reported->volume_24h_base
             *                          data->market_pairs->quote->exchange_reported->volume_24h_quote
             *                          data->market_pairs->quote->exchange_reported->last_updated
             *                  },
             *                  data->market_pairs->quote->$convert {
             *                          data->market_pairs->quote->$convert->price
             *                          data->market_pairs->quote->$convert->volume_24h
             *                          data->market_pairs->quote->$convert->last_updated
             *                  }
             *          }
             * }
             * }
             */
            return $response;
        }
    }

    function cmcGetCoinMarketPairsLatest( $id, $start, $limit, $convert ) {
        $url = 'https://pro-api.coinmarketcap.com/v1/cryptocurrency/market-pairs/latest';
        $parameters = [ 'id' => $id, 'start' => $start, 'limit' => $limit, 'convert' => $convert   ];
        $headers = [ 'Accepts: application/json', 'X-CMC_PRO_API_KEY: 17bdc3b5-049d-4b16-8a9c-12e62fc58812' ];
        $qs = http_build_query( $parameters );
        $request = "{$url}?{$qs}";
        $curl = curl_init(); 
        curl_setopt_array( $curl, array( CURLOPT_URL => $request, CURLOPT_HTTPHEADER => $headers, CURLOPT_RETURNTRANSFER => 1 ) );
        $response = curl_exec( $curl );
        print_r( json_decode( $response ) );
        curl_close( $curl );

        if( $response->error != 0 ) {
            /**
             * status {
             *      status->timestamp
             *      status->error_code
             *      status->error_message
             *      status->elapsed
             *      status->credit_count
             * }
             */
            return "Error: " . $response->status->error_code . "( " . $response->satus->error_message . " )";
        } else {
            /**
             * {
             * data {
             *      data->id
             *      data->name
             *      data->symbol
             *      data->num_market_pairs
             *      data->market_pairs [
             *              {
             *                      data->market_pairs->exchange {
             *                              data->market_pairs->exchange->id
             *                              data->market_pairs->exchange->name
             *                              data->market_pairs->exchange->slug
             *                      },
             *                      data->market_pairs->market_id
             *                      data->market_pairs->market_pair
             *                      data->market_pairs->category
             *                      data->market_pairs->fee_type
             *                      data->market_pairs->market_pair_base {
             *                              data->market_pairs->market_pair_base->currency_id
             *                              data->market_pairs->market_pair_base->currency_symbol
             *                              data->market_pairs->market_pair_base->exchange_symbol
             *                              data->market_pairs->market_pair_base->currency_type
             *                      },
             *                      data->market_pairs->market_pair_quote {
             *                              data->market_pairs->market_pair_quote->currency_id
             *                              data->market_pairs->market_pair_quote->currency_symbol
             *                              data->market_pairs->market_pair_quote->exchange_symbol
             *                              data->market_pairs->market_pair_quote->currency_type
             *                      },
             *                      data->market_pairs->quote {
             *                              data->market_pairs->quote->exchange_reported {
             *                                      data->market_pairs->quote->exchange_reported->price
             *                                      data->market_pairs->quote->exchange_reported->volume_24h_base
             *                                      data->market_pairs->quote->exchange_reported->volume_24h_quote
             *                                      data->market_pairs->quote->exchange_reported->last_updated
             *                              }
             *                       },
             *                      data->market_pairs->$convert {
             *                              data->market_pairs->$convert->price
             *                              data->market_pairs->$convert->volume_24h
             *                              data->market_pairs->$convert->last_updated
             *                      }
             *              }]
             * }
             * }
             */
            return $response;
        }
    }

    function cmcGetCoinOHLCVLatest( $id, $convert ) {
        $url = 'https://pro-api.coinmarketcap.com/v1/cryptocurrency/ohlcv/latest';
        $parameters = [ 'id' => $id  ];
        $headers = [ 'Accepts: application/json', 'X-CMC_PRO_API_KEY: 17bdc3b5-049d-4b16-8a9c-12e62fc58812' ];
        $qs = http_build_query( $parameters );
        $request = "{$url}?{$qs}";
        $curl = curl_init(); 
        curl_setopt_array( $curl, array( CURLOPT_URL => $request, CURLOPT_HTTPHEADER => $headers, CURLOPT_RETURNTRANSFER => 1 ) );
        $response = curl_exec( $curl );
        print_r( json_decode( $response ) );
        curl_close( $curl );

        if( $response->error != 0 ) {
            /**
             * status {
             *      status->timestamp
             *      status->error_code
             *      status->error_message
             *      status->elapsed
             *      status->credit_count
             * }
             */
            return "Error: " . $response->status->error_code . "( " . $response->satus->error_message . " )";
        } else {
            /**
             * {
             * data {
             *      data-># {
             *              data->#->id
             *              data->#->name
             *              data->#->symbol
             *              data->#->last_updated
             *              data->#->time_open
             *              data->#->time_close
             *              data->#->quote {
             *                      data->#->quote->$convert {
             *                              data->#->quote->$convert->open
             *                              data->#->quote->$convert->high
             *                              data->#->quote->$convert->low
             *                              data->#->quote->$convert->close
             *                              data->#->quote->$convert->volume
             *                              data->#->quote->$convert->last_updated
             *                      }
             *              }
             *      }
             * }
             */
            return $response;
        }
    }

    function cmcGetCoinOHLCVHistorical( $id, $time_start, $time_end, $convert ) {
        $url = 'https://pro-api.coinmarketcap.com/v1/cryptocurrency/ohlcv/historical';
        $parameters = [ 'id' => $id, 'time_start' => $time_start, 'time_end' => $time_end  ];
        $headers = [ 'Accepts: application/json', 'X-CMC_PRO_API_KEY: 17bdc3b5-049d-4b16-8a9c-12e62fc58812' ];
        $qs = http_build_query( $parameters );
        $request = "{$url}?{$qs}";
        $curl = curl_init(); 
        curl_setopt_array( $curl, array( CURLOPT_URL => $request, CURLOPT_HTTPHEADER => $headers, CURLOPT_RETURNTRANSFER => 1 ) );
        $response = curl_exec( $curl );
        print_r( json_decode( $response ) );
        curl_close( $curl );

        if( $response->error != 0 ) {
            /**
             * status {
             *      status->timestamp
             *      status->error_code
             *      status->error_message
             *      status->elapsed
             *      status->credit_count
             * }
             */
            return "Error: " . $response->status->error_code . "( " . $response->satus->error_message . " )";
        } else {
            /**
             * {
             * data {
             *      data->id
             *      data->name
             *      data->symbol
             *      data->quotes [
             *              {
             *                  data->quotes->time_open
             *                  data->quotes->time_close
             *                  data->quotes->quote {
             *                          data->quotes->quote->$convert {
             *                                  data->quotes->quote->$convert->open
             *                                  data->quotes->quote->$convert->high
             *                                  data->quotes->quote->$convert->low
             *                                  data->quotes->quote->$convert->close
             *                                  data->quotes->quote->$convert->volume
             *                                  data->quotes->quote->$convert->market_cap
             *                                  data->quotes->quote->$convert->timestamp
             *                             }
             *                      }
             *              }
             *       ]
             * }
             * }
             */
            return $response;
        }
    }

    function cmcGetCoinExchangeMap( $slug ) {
        $url = 'https://pro-api.coinmarketcap.com/v1/exchange/map';
        $parameters = [ 'slug' => $slug  ];
        $headers = [ 'Accepts: application/json', 'X-CMC_PRO_API_KEY: 17bdc3b5-049d-4b16-8a9c-12e62fc58812' ];
        $qs = http_build_query( $parameters );
        $request = "{$url}?{$qs}";
        $curl = curl_init(); 
        curl_setopt_array( $curl, array( CURLOPT_URL => $request, CURLOPT_HTTPHEADER => $headers, CURLOPT_RETURNTRANSFER => 1 ) );
        $response = curl_exec( $curl );
        print_r( json_decode( $response ) );
        curl_close( $curl );

        if( $response->error != 0 ) {
            /**
             * status {
             *      status->timestamp
             *      status->error_code
             *      status->error_message
             *      status->elapsed
             *      status->credit_count
             * }
             */
            return "Error: " . $response->status->error_code . "( " . $response->satus->error_message . " )";
        } else {
            /**
             * {
             * data [
             *      {
             *          data->id
             *          data->name
             *          data->slug
             *          data->is_active
             *          data->first_historical_data
             *          data->last_historical_data
             *      }
             * ]
             * }
             */
            return $response;
        }
    }

    function cmcGetCoinExchangeInfo( $id ) {
        $url = 'https://pro-api.coinmarketcap.com/v1/exchange/info';
        $parameters = [ 'id' => $id  ];
        $headers = [ 'Accepts: application/json', 'X-CMC_PRO_API_KEY: 17bdc3b5-049d-4b16-8a9c-12e62fc58812' ];
        $qs = http_build_query( $parameters );
        $request = "{$url}?{$qs}";
        $curl = curl_init(); 
        curl_setopt_array( $curl, array( CURLOPT_URL => $request, CURLOPT_HTTPHEADER => $headers, CURLOPT_RETURNTRANSFER => 1 ) );
        $response = curl_exec( $curl );
        print_r( json_decode( $response ) );
        curl_close( $curl );

        if( $response->error != 0 ) {
            /**
             * status {
             *      status->timestamp
             *      status->error_code
             *      status->error_message
             *      status->elapsed
             *      status->credit_count
             * }
             */
            return "Error: " . $response->status->error_code . "( " . $response->satus->error_message . " )";
        } else {
            /**
             * {
             * data 
             *      {
             *          data-># {
             *                  data->#->urls {
             *                          data->#->urls->website [ ]
             *                          data->#->urls->twitter [ ]
             *                          data->#->urls->blog [ ]
             *                          data->#->urls->chat [ ]
             *                          data->#->urls->fee [ ]
             *                  },
             *                  data->#->logo
             *                  data->#->id
             *                  data->#->name
             *                  data->#->slug
             *                  data->#->notice
             *                  data->#->date_launched
             *      }
             * }
             */
            return $response;
        }
    }

    function cmcGetCoinExchangeListingsLatest( $start, $limit, $sort, $sort_dir, $convert ) {
        $url = 'https://pro-api.coinmarketcap.com/v1/exchange/listings/latest';
        $parameters = [ 'start' => $start, 'limit' => $limit, 'sort' => $sort, 'sort_dir' => $sort_dir  ];
        $headers = [ 'Accepts: application/json', 'X-CMC_PRO_API_KEY: 17bdc3b5-049d-4b16-8a9c-12e62fc58812' ];
        $qs = http_build_query( $parameters );
        $request = "{$url}?{$qs}";
        $curl = curl_init(); 
        curl_setopt_array( $curl, array( CURLOPT_URL => $request, CURLOPT_HTTPHEADER => $headers, CURLOPT_RETURNTRANSFER => 1 ) );
        $response = curl_exec( $curl );
        print_r( json_decode( $response ) );
        curl_close( $curl );

        if( $response->error != 0 ) {
            /**
             * status {
             *      status->timestamp
             *      status->error_code
             *      status->error_message
             *      status->elapsed
             *      status->credit_count
             * }
             */
            return "Error: " . $response->status->error_code . "( " . $response->satus->error_message . " )";
        } else {
            /**
             * {
             * data [
             *      {
             *          data->id
             *          data->name
             *          data->slug
             *          data->num_market_pairs
             *          data->last_updated
             *          data->quote {
             *                  data->quote->$convert {
             *                          data->quote->$convert->volume_24h
             *                          data->quote->$convert->volume_24h_adjusted
             *                          data->quote->$convert->volume_7d
             *                          data->quote->$convert->volume_30d
             *                          data->quote->$convert->percent_change_volume_24h
             *                          data->quote->$convert->percent_change_volume_7d
             *                          data->quote->$convert->percent_change_volume_30d
             *                  }
             *          }
             *      }]
             * }
             */
            return $response;
        }
    }

    function cmcGetCoinExchangeListingsHistorical(  ) {
        // CMC is missing the example for this function
    }

    function cmcGetCoinExchangeQuotesLatest( $id, $convert ) {
        $url = 'https://pro-api.coinmarketcap.com/v1/exchange/listings/latest';
        $parameters = [ 'id' => $id  ];
        $headers = [ 'Accepts: application/json', 'X-CMC_PRO_API_KEY: 17bdc3b5-049d-4b16-8a9c-12e62fc58812' ];
        $qs = http_build_query( $parameters );
        $request = "{$url}?{$qs}";
        $curl = curl_init(); 
        curl_setopt_array( $curl, array( CURLOPT_URL => $request, CURLOPT_HTTPHEADER => $headers, CURLOPT_RETURNTRANSFER => 1 ) );
        $response = curl_exec( $curl );
        print_r( json_decode( $response ) );
        curl_close( $curl );

        if( $response->error != 0 ) {
            /**
             * status {
             *      status->timestamp
             *      status->error_code
             *      status->error_message
             *      status->elapsed
             *      status->credit_count
             * }
             */
            return "Error: " . $response->status->error_code . "( " . $response->satus->error_message . " )";
        } else {
            /**
             * {
             * data {
             *          data->ExchangeName {
             *                  data->id
             *                  data->name
             *                  data->slug
             *                  data->num_market_pairs
             *                  data->last_updated
             *                  data->quote {
             *                          data->quote->$convert {
             *                                  data->quote->$convert->volume_24h
             *                                  data->quote->$convert->volume_24h_adjusted
             *                                  data->quote->$convert->volume_7d
             *                                  data->quote->$convert->volume_30d
             *                                  data->quote->$convert->percent_change_volume_24h
             *                                  data->quote->$convert->percent_change_volume_7d
             *                                  data->quote->$convert->percent_change_volume_30d
             *                          }
             *                  }
             *          }
             * }
             * }
             */
            return $response;
        }
    }

    function cmcGetCoinExchangeQuotesHistorical( $id, $time_end, $count, $interval, $convert ) {
        $url = 'https://pro-api.coinmarketcap.com/v1/exchange/quotes/historical';
        $parameters = [ 'id' => $id, 'time_end' => $time_end, 'count' => $count, 'interval' => $interval ];
        $headers = [ 'Accepts: application/json', 'X-CMC_PRO_API_KEY: 17bdc3b5-049d-4b16-8a9c-12e62fc58812' ];
        $qs = http_build_query( $parameters );
        $request = "{$url}?{$qs}";
        $curl = curl_init(); 
        curl_setopt_array( $curl, array( CURLOPT_URL => $request, CURLOPT_HTTPHEADER => $headers, CURLOPT_RETURNTRANSFER => 1 ) );
        $response = curl_exec( $curl );
        print_r( json_decode( $response ) );
        curl_close( $curl );

        if( $response->error != 0 ) {
            /**
             * status {
             *      status->timestamp
             *      status->error_code
             *      status->error_message
             *      status->elapsed
             *      status->credit_count
             * }
             */
            return "Error: " . $response->status->error_code . "( " . $response->satus->error_message . " )";
        } else {
            /**
             * {
             * data {
             *          data->id
             *          data->name
             *          data->slug
             *          data->quotes [
             *                  {
             *                          data->quotes->timestamp
             *                          data->quotes->quote {
             *                                  data->quotes->quote->$convert {
             *                                          data->quotes->quote->$convert->volume_24h
             *                                          data->quotes->quote->$convert->timestamp
             *                                  }
             *                          },
             *                          data->quotes->num_market_pairs
             *                  }
             *          ]
             * }
             * }
             */
            return $response;
        }
    }

    function cmcGetCoinMarketPairsLatest( $id, $start, $limit, $convert ) {
        $url = 'https://pro-api.coinmarketcap.com/v1/exchange/market-pairs/latest';
        $parameters = [ 'id' => $id, 'start' => $start, 'limit' => $limit ];
        $headers = [ 'Accepts: application/json', 'X-CMC_PRO_API_KEY: 17bdc3b5-049d-4b16-8a9c-12e62fc58812' ];
        $qs = http_build_query( $parameters );
        $request = "{$url}?{$qs}";
        $curl = curl_init(); 
        curl_setopt_array( $curl, array( CURLOPT_URL => $request, CURLOPT_HTTPHEADER => $headers, CURLOPT_RETURNTRANSFER => 1 ) );
        $response = curl_exec( $curl );
        print_r( json_decode( $response ) );
        curl_close( $curl );

        if( $response->error != 0 ) {
            /**
             * status {
             *      status->timestamp
             *      status->error_code
             *      status->error_message
             *      status->elapsed
             *      status->credit_count
             * }
             */
            return "Error: " . $response->status->error_code . "( " . $response->satus->error_message . " )";
        } else {
            /**
             * {
             * data {
             *          data->id
             *          data->name
             *          data->slug
             *          data->num_market_pairs
             *          data->market_pairs [
             *                  {
             *                          data->market_pairs->market_id
             *                          data->market_pairs->market_pair
             *                          data->market_pairs->category
             *                          data->market_pairs->fee_type
             *                          data->market_pairs->market_pair_base {
             *                                  data->market_pairs->market_pair_base->currency_id
             *                                  data->market_pairs->market_pair_base->currency_symbol
             *                                  data->market_pairs->market_pair_base->exchange_symbol
             *                                  data->market_pairs->market_pair_base->currency_type
             *                          },
             *                          data->market_pairs->market_pair_quote {
             *                                  data->market_pairs->market_pair_quote->currency_id
             *                                  data->market_pairs->market_pair_quote->currency_symbol
             *                                  data->market_pairs->market_pair_quote->exchange_symbol
             *                                  data->market_pairs->market_pair_quote->currency_type
             *                          },
             *                          data->market_pairs->quote {
             *                                  data->market_pairs->quote->exchange_reported {
             *                                          data->market_pairs->quote->exchange_reported->price
             *                                          data->market_pairs->quote->exchange_reported->volume_24h_base
             *                                          data->market_pairs->quote->exchange_reported->volume_24h_quote
             *                                          data->market_pairs->quote->exchange_reported->last_updated
             *                                  },
             *                                  data->market_pairs->quote->$convert {
             *                                          data->market_pairs->quote->$convert->price
             *                                          data->market_pairs->quote->$convert->volume_24h
             *                                          data->market_pairs->quote->$convert->last_updated
             *                                  }
             *                          }
             *                  }
             *          ]
             * }
             * }
             */
            return $response;
        }
    }

    function cmcGetCoinGlobalMetricsQuotesLatest( $convert ) {
        $url = 'https://pro-api.coinmarketcap.com/v1/exchange/market-pairs/latest';
        $parameters = [ 'convert' => $convert ];
        $headers = [ 'Accepts: application/json', 'X-CMC_PRO_API_KEY: 17bdc3b5-049d-4b16-8a9c-12e62fc58812' ];
        $qs = http_build_query( $parameters );
        $request = "{$url}?{$qs}";
        $curl = curl_init(); 
        curl_setopt_array( $curl, array( CURLOPT_URL => $request, CURLOPT_HTTPHEADER => $headers, CURLOPT_RETURNTRANSFER => 1 ) );
        $response = curl_exec( $curl );
        print_r( json_decode( $response ) );
        curl_close( $curl );

        if( $response->error != 0 ) {
            /**
             * status {
             *      status->timestamp
             *      status->error_code
             *      status->error_message
             *      status->elapsed
             *      status->credit_count
             * }
             */
            return "Error: " . $response->status->error_code . "( " . $response->satus->error_message . " )";
        } else {
            /**
             * {
             * data {
             *          data->btc_dominance
             *          data->eth_dominance
             *          data->active_cryptocurrencies
             *          data->active_market_pairs
             *          data->active_exchanges
             *          data->last_updated
             *          data->quote {
             *                  data->quote->$convert {
             *                          data->quote->$convert->total_market_cap
             *                          data->quote->$convert->total_volume_24h
             *                          data->quote->$convert->last_updated
             *                  }
             *          }
             * }
             * }
             */
            return $response;
        }
    }
}
