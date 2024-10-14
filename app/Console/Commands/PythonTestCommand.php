<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class PythonTestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:python-test-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //追記ここから
                // Pythonスクリプトを実行するパス
                $pythonScriptPath = base_path('app/Python/test.py');

                // Pythonスクリプトを実行
                $output = null;
                $resultCode = null;
        
                // execを使ってPythonスクリプトを実行
                exec("python3 $pythonScriptPath", $output, $resultCode);
        
                // 実行結果の出力とステータスコードの表示
                if ($resultCode === 0) {
                    $this->info("Python script executed successfully:");
                    $this->line(implode("\n", $output));
                } else {
                    $this->error("Python script failed with result code: $resultCode");
                }
        // 追記ここまで
    }
}
