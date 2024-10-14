<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PythonTestController extends Controller
{
    //
    public function runPythonScript()
    {
        // Pythonスクリプトのパスを指定
        $pythonScriptPath = base_path('app/Python/test.py');

        // Pythonスクリプトを実行
        $output = null;
        $resultCode = null;

        // exec関数を使ってPythonスクリプトを実行
        exec("python3 $pythonScriptPath", $output, $resultCode);

        // 実行結果とステータスコードを返す
        if ($resultCode === 0) {
            $result = implode("\n", $output);  // 出力を文字列に変換
        } else {
            $result = "Python script failed with result code: $resultCode";
        }

        // ビューに結果を渡す
        return view('python_test', ['result' => $result]);
    }
}
