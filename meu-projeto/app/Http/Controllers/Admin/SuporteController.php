<?php

namespace App\Http\Controllers\Admin;

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
      $suportes = $this->service->getAll($request->filter);


        return view('admin/suporte/index', compact('suportes'));
   }




   public function create()
   {
      return view('admin/suporte/create');
   }


   public function store( StoreUpdateSupportRequest $request, Suporte $suporte)
   {
      
      $data = $request->validated();
      $data['status'] = 'a';
      $suporte->create($data);


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





   public function update(Suporte $suporte, StoreUpdateSupportRequest $request, string $id)
   {
     if(!$suporte = $suporte->find($id)){
      return back();
     }


     $suporte->update($request->only([
      'subject', 'body'
     ]));


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
