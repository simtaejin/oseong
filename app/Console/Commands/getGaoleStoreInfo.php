<?php

namespace App\Console\Commands;

use App\Models\gaolestore;
use Illuminate\Console\Command;
use Ixudra\Curl\Facades\Curl;

class getGaoleStoreInfo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crawling:store {limit}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command limit 6-469';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->limit = $this->argument('limit');

        $limits = explode("-", $this->limit);
        $start = $limits[0];
        $end = $limits[1];

//        $this->info($start."-".$end);

        foreach (range($start, $end) as $index) {
            $response = Curl::to('https://pokemongaole.co.kr/lib/store/view.ajax.php')
                ->withHeaders(
                    array(
                        'Referer: https://pokemongaole.co.kr/html/store.php',
                        'Content-Type: application/x-www-form-urlencoded',
                        'Cookie: PHPSESSID=bvs9hrsppm2ti4l0277hfga5fv')
                )
                ->withData(
                    array(
                        'k_id' => $index
                    )
                )
                ->post();

            $result = json_decode($response, true);

            if ($result['result'] == 'suc') {
                $this->info($index.'==='.$result['title'].'==='.$result['time']);
                $pattern = '/(\d+)(대|층)/';
                if (preg_match($pattern, $result['time'], $matches)){
                    $units = $matches[1];
                } else {
                    $units = 0;
                }

                gaolestore::create([
                    'title' => $result['title'],
                    'addr' => $result['addr'],
                    'units' => $units,
                    'xlang' => $result['xlang'],
                    'ylang' => $result['ylang'],
                ]);

            }
        }

        return Command::SUCCESS;
    }
}
