<?php
declare(strict_types=1);
/**
 * This file is part of ModulposLaravel package.
 *
 * @author Anton Kartsev <anton@alarmcrm.ru>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Bigperson\ModulposLaravel\Commands;

use Illuminate\Console\Command;

class Associate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'modulpos:associate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create an account and retail bundle';

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
        $login = $this->ask('What is your login modulkassa?');
        $password =  $this->secret('What is the password modulkassa?');
        $retailPointUuid = $this->ask('What is your retail point Uuid?');
        $testMode = (bool)$this->choice('Use test mode?', [true => 'Yes', false => 'No'], 'Yes');

        $associate = new \Bigperson\ModulposApiClient\Associate($login, $password, $retailPointUuid, $testMode);
        $result = $associate->init();

        $this->info('Please add to your env file:');
        $this->info('MODULPOS_LOGIN='.$result['userName']);
        $this->info('MODULPOS_PASSWORD='.$result['password']);
        $this->info('MODULPOS_TEST_MODE='.$testMode);
    }
}
