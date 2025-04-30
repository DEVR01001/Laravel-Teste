<?php

namespace App\Http\Controllers\Admin;

use App\DTO\CreateSuporteDTO;
use App\DTO\UpdateSuporteDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateSupportRequest;
use App\Models\Suporte;
use App\Services\SupportServices;
use Illuminate\Http\Request;

class SuporteController extends Controller
{

   public function __construct(
      protected SupportServices $service
   ){}



   public function index(Request $request)
   {
      $suportes = $this->service->paginate(
         page: $request->get('page', 1),
         totalPage: $request->get('per_page', 15),
         filter: $request->filter,
      );

      $filters = ['filter' => $request->get('filter', '')];

      return view('admin/suporte/index', compact('suportes', 'filters'));
   }


   public function create()
   {
      return view('admin/suporte/create');
   }


   public function store( StoreUpdateSupportRequest $request, Suporte $suporte)
   {
      
      $this->service->new(
         CreateSuporteDTO::makeFromRequest($request)
      );


      return redirect()->route('suporte.index');

   }


   public function show(string|int $id)
   {
      // Suporte::find($id);
      // Suporte::where('id', $id ); 

     if(!$suporte = $this->service->findOne(($id))){
      return back();
     }


   
     return view('admin/suporte/show', compact('suporte'));
   }





   public function edit(string $id)
   {

      if(!$suporte = $this->service->findOne($id)){
         return back();
        }


        return view('admin/suporte/edit', compact(('suporte')));

   }





   public function update( StoreUpdateSupportRequest $request, string $id)
   {


     $suporte = $this->service->update(

      UpdateSuporteDTO::makeFromRequest($request)
      
   );

   if(!$suporte){
      return back();
     }

     return redirect()->route('suporte.index');
   
   }




   public function destroy(string $id)
   {
      if(!$suporte = $this->service->delete($id)){
         return back();
        }

      return redirect()->route('suporte.index');
   }















}
