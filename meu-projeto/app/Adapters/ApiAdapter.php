<?php


namespace App\Adapters;

use App\Http\Resources\DefaultResource;
use App\Repository\PaginationInterface;

class ApiAdapter{


    public static function toJson(

        PaginationInterface $data
    ){

        return DefaultResource::collection($data->items())
        ->additonal([
            'meta'=> [
                'total' => $data->total(),
                'is_first_page' => $data->isFirstPage(),
                'is_last_page' => $data->isLastPage(),
                'currente_page' => $data->currentPage(),
                'next_page' => $data->getNumberNextPage(),
                'prev_page' => $data->getNumberPrevPage(),
                
            ]
        ]);

        
    }



}