<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class HolaCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'hola';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Descripción del comando Hola';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Hola, este es un comando de prueba.');
    }
}
