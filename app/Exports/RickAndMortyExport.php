<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;





class RickAndMortyExport implements FromArray,WithHeadings
{

    protected $characters;

    public function __construct($characters)
    {
        $this->characters = $characters;
    }

    public function array(): array
    {
        return [
            $this->characters
        ];
    }
    public function headings(): array
    {
        $header=[];
        foreach ($this->characters[0] as $key => $value){
            $header[]=$key; 
        }
        return [
            $header
        ];
    }
}
