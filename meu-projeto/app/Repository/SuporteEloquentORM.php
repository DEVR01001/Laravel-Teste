<?php


namespace App\Repository;

use App\DTO\CreateSuporteDTO;
use App\DTO\UpdateSuporteDTO;
use App\Models\Suporte;

use stdClass;



class SuporteEloquentORM implements SuporteRepositoryInterface
{
    
    public function __construct(
        protected Suporte $model
    ){}

    public function paginate(int $page = 1, int $totalPage = 15, ?string $filter = null): PaginationInterface{

        $result =  $this->model
                    ->where(function ($query) use ($filter){
                        if($filter){
                            $query->where('subject', $filter);
                            $query->orWhere('body', 'like', "%{$filter}%");

                        }
                    })
                    ->paginate($totalPage, ['*'], 'page', $page);
                     // Uso de query get()
                    // Pegar tudo all()
                    
        return new PaginationPresenter($result);
    }



    public function getAll(?string $filter = null): array
    {
        return $this->model
                    ->where(function ($query) use ($filter){
                        if($filter){
                            $query->where('subject', $filter);
                            $query->orWhere('body', 'like', "%{$filter}%");

                        }
                    })
                    ->get() 
                     // Uso de query get()
                    // Pegar tudo all()
                    ->toArray();
    }
    
    public function findOne(string $id): stdClass|null{

        $suporte = $this->model->find($id);

        if(!$suporte){
            return null;
        }
        
        return (object) $suporte->toArray();
    }


    public function delete(string $id):bool {
        $this->model->findOrFail($id)->delete();

        return true;
    }



    public function new(CreateSuporteDTO $dto): stdClass {
        $suporte = $this->model->create((array) $dto);
        return (object) $suporte->toArray(); 
    }
    

    public function update(UpdateSuporteDTO $dto): stdClass|null {
        if(!$suporte = $this->model->find($dto->id)){
            return  null;
        }

        $suporte->update(
            (array) $dto
        );

        return (object) $suporte->toArray();
    }
    
}