<?php

namespace App\Http\Controllers;

use App\Exports\RickAndMortyExport;
use App\Utils\APIConnector;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class RickAndMortyController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');

        //explode to get the page number
        $page = explode('=', $request->get('page'));
        $page = isset($page[1]) ? $page[1] : 1;
        //explode to get the page number when we have others params in the url
        $page = explode('&', $page);
        
        $connector = APIConnector::getInstance();
        $characters = $connector->get('character',['page'=>$page[0], 'name' => $search]);
        
        return view('RickAndMorty/index')->with([
            'characters' => isset($characters['results']) ? $characters['results'] :null,
            'info' => isset($characters['info']) ? $characters['info'] :null
        ]);

    }

    public function excelDownload(Request $request){
        $search = $request->get('search');

        //explode to get the page number
        $page = explode('=', $request->get('page'));
        $page = isset($page[1]) ? $page[1] : 1;
        //explode to get the page number when we have others params in the url
        $page = explode('&', $page);
        
        $connector = APIConnector::getInstance();
        
        $results=[];
        
        $page=2;
        
        $data = $connector->get('character');
        $results = array_merge($results,$data['results']);

        while (isset($data['info']['next'])){
            $data = $connector->get('character',['page'=>$page]);
            $results = array_merge($results,$data['results']);
            $page++;
        }
       
        return Excel::download(new RickAndMortyExport($results), 'characters.xls');
    }
}
