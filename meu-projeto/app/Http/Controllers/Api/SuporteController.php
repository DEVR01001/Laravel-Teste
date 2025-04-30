<?php

namespace App\Http\Controllers\Api;

use App\Adapters\ApiAdapter;
use App\DTO\CreateSuporteDTO;
use App\DTO\UpdateSuporteDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateSupportRequest;
use App\Http\Resources\SuporteResource;
use App\Services\SupportServices;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SuporteController extends Controller


{


    
    public function __construct(     
        protected SupportServices $service
        ){}

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $suporte =  $this->service->paginate(
            page: $request->get('page', 1),
            totalPage: $request->get('per_page', 15),
            filter: $request->filter,
        );

        return ApiAdapter::toJson($suporte);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUpdateSupportRequest $request)
    {

        $suporte = $this->service->new(
            CreateSuporteDTO::makeFromRequest($request)
        );


        return new SuporteResource(($suporte));
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if(!$suporte = $this->service->findOne($id)){
            return response()->json([
                'error' => 'Not Found'
            ], Response::HTTP_NOT_FOUND);
        }

        return new SuporteResource($suporte);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUpdateSupportRequest $request, string $id)
    {
        $suporte = $this->service->update(
            UpdateSuporteDTO::makeFromRequest($request, $id)
        );

        if(!$suporte){

            return response()->json([
                'error' => 'Not found'
            ], Response::HTTP_NOT_FOUND);

        }


        return new SuporteResource($suporte);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if(!$this->service->findOne($id)){
            return response()->json([
                'error' => 'Not found'
            ], Response::HTTP_NOT_FOUND);
        }

        $this->service->delete($id);


        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
