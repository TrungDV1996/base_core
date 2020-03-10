<?php

namespace App\Repositories;

use App\Repositories\RepositoryInterface;

abstract class RepositoryAbstract implements RepositoryInterface
{
    /**
     * @var string Model name
     */
    protected $model;

    /**
     * @var string Table name
     */
    protected $table;

    /**
     * @var array Validation rules for store
     */
    protected $storeRules;

    /**
     * @var array Validation rules for update
     */
    protected $updateRules;

    /**
     * @var array Column names
     */
    protected $columnNames;

     /**
     * Construct
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Find.
     *
     * @param int $id
     *
     * @return array
     */
    public function find($id)
    {
        $model = $this->model::find($id);

        return empty($model) ? [] : $model->toArray();
    }

    
    /**
     * Get all.
     *
     * @return Collection
     */
    public function all()
    {
        return $this->model->all();
    }

    /**
     * Index.
     *
     * @param array $data
     *
     * @return array
     */
    // public function index($data = null)
    // {
    //     return $this->model::all()->toArray();
    // }

    /**
     * Store validation.
     *
     * @param array $data
     *
     * @return array Error messages
     */
    public function storeValidate($data)
    {
        $validator = Validator::make($data, $this->storeRules, [], $this->columnNames);

        if ($validator->fails()) {
            return $validator->errors();
        }

        return [];
    }

    /**
     * Store.
     *
     * @param array $data
     *
     * @return void
     */
    public function store($data)
    {
        $this->model::create($data);
    }

    /**
     * Show.
     *
     * @param int $id
     *
     * @return array
     */
    public function show($id)
    {
        $model = $this->model::find($id);

        if(empty($model)) {
            return [];
        }

        return $model->toArray();
    }

    /**
     * Update validation.
     *
     * @param int $id
     * @param array $data
     *
     * @return array Error messages
     */
    public function updateValidate($id, $data)
    {
        $validator = Validator::make($data, $this->updateRules, [], $this->columnNames);

        if ($validator->fails()) {
            return $validator->errors();
        }

        return [];
    }

    /**
     * Update.
     *
     * @param array $id
     * @param array $data
     *
     * @return void
     */
    public function update($id, $data)
    {
        $this->model::find($id)->update($data);
    }

    /**
     * Destroy.
     *
     * @param Collection|array|int $ids
     *
     * @return void
     */
    public function destroy($ids)
    {
        $this->model::destroy($ids);
    }
}
