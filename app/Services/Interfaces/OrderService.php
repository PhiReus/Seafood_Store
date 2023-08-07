<?php
namespace App\Services;

use App\Services\Interfaces\OrderServiceInterface;

use App\Repositories\Interfaces\OrderRepositoryInterface;

class OrderService implements OrderServiceInterface
{
    protected $orderRepository;

    public function __construct(OrderRepositoryInterface $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    /* Triển khai các phương thức trong PostServiceInterface */
    public function all($request){

        return $this->orderRepository->all($request);
    }
    public function find($id){
        return $this->orderRepository->find($id);
    }
    public function store($request){
        return $this->orderRepository->store($request);
    }
    public function update($request, $id){
        return $this->orderRepository->update($request,$id);
    }
    public function destroy($id){
        return $this->orderRepository->destroy($id);
    }

}
