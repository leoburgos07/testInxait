<?php

namespace App\Exports;

use App\User;
use DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {
        return [
            'Nombre',
            'Apellido',
            'CC',
            'Celular',
            'Departamento',
            'Ciudad',
            'Email',
        ];
    }
    public function collection()
    {
         $users = DB::table('Users')->select('name','last_name','dni','phone','dpto','city', 'email')->get();
         return $users;

    }
}