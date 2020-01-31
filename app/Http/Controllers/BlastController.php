<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlastController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index()
    {
        return view('blast.index', [
            'results' => null,
        ]);
    }

    public function analyse(Request $request)
    {
        $sequence = fopen(public_path() . '/files/sequence.fa', 'w');
        fwrite($sequence, $request->sequence);
        fclose($sequence);

        $db = fopen('files/db.fsa', 'w');
        fwrite($db, $request->db);
        fclose($db);

        exec('makeblastdb -in files/db.fsa -title "Database" -dbtype nucl');
        exec('blastn -query files/sequence.fa -db files/db.fsa -out files/results.txt');
        $output = file_get_contents('files/results.txt');

        $files = glob('files/*');
        foreach ($files as $file){
            if (is_file($file)) {
                unlink($file);
            }
        }
        return view('blast.index', [
            'results' => $output,
        ]);
    }
}
