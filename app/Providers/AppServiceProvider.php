<?php

namespace NhaThieuNhi\Providers;

use Illuminate\Support\ServiceProvider;
use Symfony\Component\Console\Output\ConsoleOutput;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $sharedVars = [
            'ps' => config('params')
        ];

        view()->share($sharedVars);

        if (env('APP_ENV') == 'local' AND env('APP_DEBUG')) {
            \DB::listen(function ($sql, $bindings, $time) {
                $op = new ConsoleOutput();
                $op->writeln('');
                $op->writeln('');
                $op->writeln('=====>>>>>>>>>>');
                $op->writeln("<info>Query:</info> $sql");
                $op->writeln('<info>Bindings:</info> ' . print_r($bindings, TRUE));
                $op->writeln("<info>Time:</info> $time");
                $op->writeln('');
                $op->writeln('');
            });
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
