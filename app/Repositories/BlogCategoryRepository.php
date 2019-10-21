<?php
namespace App\Repositories;

use App\Models\BlogCategory as Model;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class BlogCategoryRepository
 * @package App\Repositories
 */

class BlogCategoryRepository extends CoreRepository{

    /**
     * @return string
     */
    protected function getModelClass()
    {
        return Model::class;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getEdit($id){
       return  $this->startConditions()->find($id);
    }

    public function getComboBox(){

        $columns = implode(', ', [
            'id',
            'CONCAT (id, ". ", title) AS id_title',
        ] );
        /*$result[] = $this->startConditions()->all();
        $result[] = $this->startConditions()
            ->select('blog_categories.*',
                \DB::raw('CONCAT (id, ". ", title) AS id_title'))
            ->toBase()
            ->get();*/

        $result = $this
            ->startConditions()
            ->selectRaw($columns)
            ->toBase()
            ->get();


        return $result;
    }

    public function getAll(){
        return $this->startConditions()->all();
    }

    public function getById($id){
        return  $this->startConditions()->find($id);
    }


    /**
     * @param $perPage
     * @return mixed
     */
    public function getAllWithPaginate($perPage){
        $columns = ['title', 'id', 'parent_id'];

        $result = $this->startConditions()
            ->select($columns)
            ->paginate($perPage);
        return $result;
    }
}
