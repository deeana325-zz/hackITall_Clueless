<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use HttpException;
use HttpRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;



class StockController extends Controller
{

    public function Stock($company)
    {
        $name = $company['symbol'];
        $dailyGain = $company['regularMarketChange'];

        return [
            "name" => $name,
            "dailyPercentGain" => $dailyGain
        ];
    }
    public function showStocks(Request $request)
    {

        $response = Http::withHeaders(
            [
                'x-rapidapi-host' => 'yh-finance.p.rapidapi.com',
                'x-rapidapi-key' => '31243ee858msh7a5e1ee05ca2952p1dc5c2jsn0503a5cb35c5'
            ]

    )->get('https://yh-finance.p.rapidapi.com/stock/v2/get-recommendations', [
            'symbol' => 'INTC'
        ]);

        $data = $response->json();

        $companies = $data['finance']['result'][0]['quotes'];


        $arr = array($this->Stock($companies[0]), $this->Stock($companies[1]), $this->Stock($companies[2]), $this->Stock($companies[3]));

        return $arr;
    }


    final function getInfo($company){

        $response = Http::withHeaders(
            [
                'x-rapidapi-host' => 'yh-finance.p.rapidapi.com',
                'x-rapidapi-key' => '31243ee858msh7a5e1ee05ca2952p1dc5c2jsn0503a5cb35c5'
            ]

        )->get('https://yh-finance.p.rapidapi.com/stock/v2/get-profile', [
            'symbol' => $company,
            'region' => 'US'
        ]);

        $data = $response->json();

        return $data['assetProfile']['longBusinessSummary'];

    }
    final function showStats($company){

        $response = Http::withHeaders(
            [
                'x-rapidapi-host' => 'yh-finance.p.rapidapi.com',
                'x-rapidapi-key' => '31243ee858msh7a5e1ee05ca2952p1dc5c2jsn0503a5cb35c5'
            ]

        )->get('https://yh-finance.p.rapidapi.com/stock/v3/get-statistics', [
            'symbol' => $company
        ]);

        $data = $response->json();

        $date = array();
        $prices = array();

        $name = $data['price']['longName'];
        $data = $data['timeSeries']['quarterlyEnterpriseValue'];
        $cnt = 0;
        $comp = array();
        foreach ($data as $i){
            $date[$cnt] = $i['asOfDate'];
            $prices[$cnt] = $i['reportedValue']['fmt'];
            $comp[$cnt] = [
               'date' => $date[$cnt],
               'price' => $prices[$cnt]
            ];
            $cnt = $cnt + 1;
        }

        return [
            'name' => $name,
            'description' => $this->getInfo($company),
           'stats' => $comp];


    }


}
