<?php

namespace App\Console\Commands;

use App\Model\Package;
use Illuminate\Console\Command;

class DataPackage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'data:packages';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Init and update packages reference data';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        Package::firstOrCreate(['name' => 'Paket 1', 'price' => 1000000]);
        Package::firstOrCreate(['name' => 'Paket 2', 'price' => 2000000]);
        Package::firstOrCreate(['name' => 'Paket 3', 'price' => 3000000]);
    }
}
