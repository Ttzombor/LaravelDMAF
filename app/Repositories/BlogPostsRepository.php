<?php
namespace App\Repositories;

use App\Models\BlogPost as Model;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class BlogPostsRepository
 * @package App\Repositories
 */

class BlogPostsRepository extends CoreRepository{

    /**
     * @return string
     */
    protected function getModelClass()
    {
        return Model::class;
    }

    /**
     * @return mixed
     */

    public function getAllWithPaginate()
    {
        $columns = [
            'id',
            'title',
            'slug',
            'category_id',
            'is_published',
            'published_at',
            'user_id'
        ];

        $result = $this
            ->startConditions()
            ->select($columns)
            ->orderBy('id', 'DESC')
           /* ->with(['category', 'user'])*/
               ->with([
                   'category' => function ($query) {
                   $query->select(['id', 'title']);
                   },
                   'user:id,name'
           ])
            ->paginate(25);


        return $result;
    }

}
