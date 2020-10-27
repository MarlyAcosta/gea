<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MakeRepository extends Command
{
    protected $reposRoute = "app/Repositories/";
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'gea:make_repo';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Crea un repositorio para un modelo';

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
     * @return int
     */
    public function handle()
    {
        $nombreRepo = $this->ask('¿Nombre del repositorio?');
        $ubicacion = $this->ask('¿Ubicacion del repositorio?');

        return 0;
    }
}
