<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Woocomerce;
use Illuminate\Support\Facades\Http;

class OrderController extends Controller
{
    public function index()
    {
        $woocomerces = Woocomerce::all();

        $urls = [];

        foreach ($woocomerces as  $woocomerce) {



            $page = 1;
            $per_page = 50;

            while ($page <= 10) {
                $url = $woocomerce['api_url'] . 'wp-json/wc/v2/orders?consumer_key=' . $woocomerce['api_key'] . '&' . 'consumer_secret=' . $woocomerce['api_secret'] . '&per_page=' . $per_page . '&page=' . $page.'&order=desc';

                // asc
                array_push($urls, $url);
                $page++;
            }
        }

        $user_orders = $this->fetchData($urls);
        // dd($user_orders);
        return view('backend.order.index', compact('user_orders'));
    }



    public function fetchData($urls)
    {

        $orders = [];

        try {
            foreach ($urls as $url) {

                $response = Http::get($url);

                if ($response->successful()) {
                    $data = $response->json();
                    array_push($orders, $data);
                } else {
                    return "Failed to fetch data. Status Code: " . $response->status();
                }
            }
        } catch (\Throwable $th) {
            return 'Message: ' . $th->getMessage();
        }

        return $orders;
    }
}
