<?php

namespace App\Repositories\Stream;

use App\Repositories\Stream\Stream;
use Illuminate\Support\Facades\Schema;

class StreamRepository
{
    public function __construct(Stream $stream)
    {
        $this->model = $stream;
    }

    /**
     * Returns all streams
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function all()
    {
        return $this->model->orderBy('created_at', 'desc')->get();
    }

    /**
     * Returns all paginated $MODEL_NAME_PLURAL$
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function paginated($paginate)
    {
        return $this->model->orderBy('created_at', 'desc')->paginate($paginate);
    }

    /**
     * Search Stream
     *
     * @param string $input
     *
     * @return Stream
     */
    public function search($input, $paginate)
    {
        $query = $this->model->orderBy('created_at', 'desc');

        $columns = Schema::getColumnListing('streams');

        foreach ($columns as $attribute) {
            $query->orWhere($attribute, 'LIKE', '%'.$input.'%');
        };

        return $query->paginate($paginate);
    }

    /**
     * Stores Stream into database
     *
     * @param array $input
     *
     * @return Stream
     */
    public function create($input)
    {
        return $this->model->create($input);
    }

    /**
     * Find Stream by given id
     *
     * @param int $id
     *
     * @return \Illuminate\Support\Collection|null|static|Stream
     */
    public function find($id)
    {
        return $this->model->find($id);
    }

    /**
     * Destroy Stream
     *
     * @param int $id
     *
     * @return \Illuminate\Support\Collection|null|static|Stream
     */
    public function destroy($id)
    {
        return $this->model->find($id)->delete();
    }

    /**
     * Updates Stream in the database
     *
     * @param int $id
     * @param array $inputs
     *
     * @return Stream
     */
    public function update($id, $inputs)
    {
        $stream = $this->model->find($id);
        $stream->fill($inputs);
        $stream->save();

        return $stream;
    }
}
