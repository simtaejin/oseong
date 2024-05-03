<?php

namespace App\Console\Commands;

use App\Models\gaoledisk;
use Goutte\Client;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Config;

class getGaoleDiskInfo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crawling:disk {k_id}';

    protected $baseUrl = "https://pokemongaole.co.kr";
    protected $k_id;

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command k_id=6';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->k_id = $this->argument('k_id');
//        dd($this->k_id);
//        $this->info($this->k_id);
//        echo Config::get('gaole.tan')[6];

        $parameterUrl = "/html/series.php?k_id=".$this->k_id;

        $client = new Client();
        $client = $this->getClient();
        $crawler = $client->request("GET", $this->baseUrl.$parameterUrl);
        $data = $this->getDiskContent($crawler);
        $data = $this->getDownloadImage($data);
        $this->setDiskInfo($data);

        return Command::SUCCESS;
    }

    public function getClient()
    {
        $client = new Client();
        $client->setServerParameter('HTTP_USER_AGENT', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.92 Safari/537.36');
        $client->setServerParameter('HTTP_ACCEPT_LANGUAGE', 'ko-KR,ko;q=0.9');

        return $client;
    }

    public function getDiskContent($crawler)
    {
        $data = $crawler->filter('#series > div > div.series_view > div.crad_ver1.ver1_2 > ul > li')->each(function ($node) {

            $diskNum = $node->filter('dl[class^=\'txtbox\'] > dt')->text();
            $diskName = $node->filter('dl[class^=\'txtbox\'] > dd')->text();
            $src = $node->filter('div[class^=\'imgbox\'] > img')->attr('src');

            return [
                'diskNum' => $diskNum,
                'diskName' => $diskName,
                'src' => $src
            ];
        });

        return $data;
    }

    public function getDownloadImage($data)
    {
        if (!is_dir(Storage::path('public').'/diskImage')) {
            mkdir(Storage::path('public').'/diskImage');
            chmod(Storage::path('public').'/diskImage', 0755);
        }

        $storage_path = Storage::path('public').'/diskImage';

        $_data = array_map(function ($item) use ($storage_path) {
            $file_name = basename($this->baseUrl.$item['src']);
            $origin_file_name = file_get_contents($this->baseUrl.$item['src']);
            file_put_contents($storage_path.'/'.$file_name, $origin_file_name);

            return [
                'diskName' => $item['diskName'],
                'diskNum' => $item['diskNum'],
                'diskImage' => $file_name
            ];
        }, $data);

        return $_data;
    }

    public function setDiskInfo($data)
    {
        array_map(function ($item) {
            gaoledisk::create([
                'tan'=> $this->k_id,
                'seong' => '4',
                'diskName' => $item['diskName'],
                'diskNumber' => $item['diskNum'],
                'diskImage' => $item['diskImage']
            ]);
        }, $data);
    }
}
