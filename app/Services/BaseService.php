<?php
namespace App\Services;

use Illuminate\Database\Eloquent\Model;

class BaseService
{


    public function __construct()
    {
        
    }


   protected $model;
   
   public function all()
   {
       $all = $this->model->orderBy('id')->get();
       return $all;
   }

   public function paginated($paginate)
   {
       return $this
           ->model
           ->orderBy()
           ->paginate($paginate);
   }

   public function create($input)
   {
       $model = $this->model;
       $model->fill($input);
       $model->save();

       return $model;
   }

   public function find($id)
   {
       return $this->model->where('id', $id)->first();
   }

   public function destroy($id)
   {
       return $this->find($id)->delete();
   }

   public function update($id, array $input)
   {
       $model = $this->find($id);
       $model->fill($input);
       $model->save();

       return $model;
   }
}