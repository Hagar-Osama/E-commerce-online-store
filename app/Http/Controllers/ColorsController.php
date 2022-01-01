<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\ColorsInterface;
use App\Http\Requests\ColorsRequest;

class ColorsController extends Controller
{
    private $ColorInterface;
    public function __construct(ColorsInterface $ColorInterface_)
    {
        $this->ColorInterface = $ColorInterface_;

    }
    public function index()
    {
        return $this->ColorInterface->index();
    }

    public function create()
    {
        return $this->ColorInterface->create();
    }
    public function store(ColorsRequest $request)
    {
        return $this->ColorInterface->store($request);
    }
    public function updatePage($id)
    {
        return $this->ColorInterface->updatePage($id);
    }
    public function update(ColorsRequest $request,$id)
    {
        return $this->ColorInterface->update($request,$id);
    }
    public function delete($id)
    {
        return $this->ColorInterface->delete($id);
    }
}
