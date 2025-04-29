<?php



namespace App\Services;

use App\DTO\CreateSuporteDTO;
use App\DTO\UpdateSuporteDTO;
use App\Repositories\SuporteRepositoryInterface;
use App\Repository\SuporteRepositoryInterface as RepositorySuporteRepositoryInterface;
use stdClass;

class SupportServices
{
 
    public function __construct(
        protected RepositorySuporteRepositoryInterface $repository
    ){}

    public function getAll(?string $filter = null): array
    {

        return $this->repository->getAll($filter);
    }
    public function paginate(
        ?string $filter = null,
        int $page = 1, 
        int $totalPage = 15,
    )
    {

        return $this->repository->paginate(
            page:$page,
            totalPage:$totalPage,
            filter: $filter
        );
    }


    public function findOne(string $id): stdClass|null
    {
        return $this->repository->findOne($id);
    }


    public function new(CreateSuporteDTO $dto): stdClass
    {
        return $this->repository->new($dto);
    }



    public function update(UpdateSuporteDTO  $dto): stdClass|null
    {
        return $this->repository->update($dto);
    }



    public function delete(string $id): bool
    {
       return  $this->repository->delete($id);


    }










}