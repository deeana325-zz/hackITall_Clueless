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
        $name = $company['name'];
        $bg = $company['backgroundImage']['ios:size=small']['url'];
        $dailyGain = $company['dailyPercentGain'];

        return [
            "name" => $name,
            "backgroundImage" => $bg,
            "dailyPercentGain" => $dailyGain
        ];
    }
    public function showStocks(Request $request)
    {
        DB::table('stocks')-> delete();
        $response = Http::withHeaders(
            [
                'x-rapidapi-host' => 'yh-finance.p.rapidapi.com',
                'x-rapidapi-key' => '9b3c453479msh69ce199e5570e12p16b0d4jsn8c821f34ab2f'
            ]

    )->get('https://yh-finance.p.rapidapi.com/market/get-popular-watchlists');

        $data = $response->json();

        $companies = $data['finance']['result'][0]['portfolios'];

        //return $companies;
       foreach ($companies as $company) {
           DB::table('stocks')->insert($this->Stock($company));
       }

           //return $companies;
           return DB::table('stocks')->take(10)->get();
    }


    final function showStats($company){

        $response = Http::withHeaders(
            [
                'x-rapidapi-host' => 'yh-finance.p.rapidapi.com',
                'x-rapidapi-key' => '9b3c453479msh69ce199e5570e12p16b0d4jsn8c821f34ab2f'
            ]

        )->get('https://yh-finance.p.rapidapi.com/stock/v3/get-statistics', [
            'symbol' => 'AMD'
        ]);

        $data = $response->json();
        return $data;
    }


}
