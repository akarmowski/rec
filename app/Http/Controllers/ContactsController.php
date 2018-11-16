<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contacts;
use App\Http\Requests\Contacts\ImportContactsRequest;

class ContactsController extends Controller
{
    public function index()
    {
        $contacts = Contacts::orderBy('created_at', 'desc')->paginate(15);
        return view('pages.contacts.index', ['contacts' => $contacts]);
    }

    public function import()
    {
        return view('pages.contacts.import');
    }

    public function store_import(ImportContactsRequest $request)
    {
        $tmp = $request->file('file')->getRealPath();

        $num_file = 0;

        if (($handle = fopen ( $tmp, 'r' )) !== FALSE) 
        {
            $row = 1;
            while ( ($data = fgetcsv ( $handle, 1000, ',' )) !== FALSE ) 
            {
                if($row == 1)
                {
                    if($data [0] != 'id' && $data [1] != 'first_name' && $data [2] != 'last_name' && $data [3] != 'email' && $data [4] != 'country' && $data [5] != 'gender' && $data [6] != 'ip_address')
                    {
                        return redirect()->route('contacts.index')->withErrors([
                                                                        'error' => 'Błędny format pliku CSV. Pola muszą być w następującej kolejności:', 
                                                                        'error2' => '"id, first_name, last_name, email, country, gender, ip_address"',
                                                                        'error3' => 'W pierwszej linii muszą znajdować się nazwy pól oddzielonych przecinkami w celu weryfikacji.'
                                                                        ]);
                    }
                }

                if($data [1] != 'first_name' && $data [2] != 'last_name' && $row > 1)
                {
                    $num_file++;
                    $input = ['first_name' => $data [1], 'last_name' => $data [2], 'email' => $data [3], 'country' => $data [4], 'gender' => $data [5], 'ip_address' => $data [6]];
                    Contacts::create($input);
                }

                $row++;
            }
            fclose ( $handle );
        }

        $num_db = Contacts::count();
        if($num_db == $num_file)
        {
            return redirect()->route('contacts.index')->with('message', 'Import zakończony powodzeniem');
        }
        else
        {
            return redirect()->route('contacts.index')->withErrors(['error' => 'Import zakończony błędem']);
        }
    }
}
