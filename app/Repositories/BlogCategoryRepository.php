<?php


namespace App\Repositories;

use App\Models\BlogCategory as Model;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class BlogCategoryRepository
 * @package App\Repositories
 */

class BlogCategoryRepository extends CoreRepository
{
    /**
     * @return string
     */

    protected function getModelClass()
    {
        return Model::class;
    }

    /**
     * Get the model for editing
     *
     * @param int $id
     *
     * @return Model
     */

    public function getEdit($id)
    {
        return $this->startConditions()->find($id);
    }

    /**
     * Get the list of categories
     *
     * @return Collection
     */
    public function getForComboBox()
    {
        $columns = implode(', ', [
           'id',
           'CONCAT (id, ". ", title) AS id_title',
        ]);

        /*$result[] = $this->startConditions()->all();
        $result[] = $this
            ->startConditions()
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

    /**
     * Get the category to output a pager
     *
     * @param int|null $perPage
     *
     * @return LengthAwarePaginator
     */
    public function getAllWithPaginate(int $perPage = null)
    {
        $columns = ['id', 'title', 'parent_id'];

        $result = $this
            ->startConditions()
            ->select($columns)
            ->paginate($perPage);

        return $result;
    }

}