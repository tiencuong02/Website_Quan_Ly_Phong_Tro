<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class UsersSeeds extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:seeds';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Khoi tao tai khoan quan tri he thong';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        \App\Models\User::truncate();
        $data = [
            [
                'name' => 'dev',
                'username' => 'dev',
                'password' => bcrypt('dev@#'),
                'role'     => 1,
            ]
        ];
        \App\Models\User::insert($data);
        $this->info('khoi tao du lieu thanh cong dev - dev@#');
    }
}
