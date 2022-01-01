<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\SizeUnitInterface;
use App\Http\Requests\SizeUnit\AddSizeUnitRequest;
use App\Http\Requests\SizeUnit\DeleteSizeUnitRequest;
use App\Http\Requests\SizeUnit\UpdateSizeUnitRequest;

class SizeUnitsController extends Controller
{
    private $sizeUnitInterface;
    public function __construct(SizeUnitInterface $sizeUnit)
    {
        $this->sizeUnitInterface = $sizeUnit;
    }

    public function index()
    {
        return $this->sizeUnitInterface->get_size_unit();
    }

    public function create()
    {
        return $this->sizeUnitInterface->create_new_size_unit();
    }

    public function store(AddSizeUnitRequest $request)
    {
        return $this->sizeUnitInterface->store_size_unit($request);
    }

    public function edit($id)
    {
        return $this->sizeUnitInterface->edit_size_unit($id);
    }

    public function update(UpdateSizeUnitRequest $request)
    {
        return $this->sizeUnitInterface->update_size_unit($request);
    }

    public function delete(DeleteSizeUnitRequest $request)
    {
        return $this->sizeUnitInterface->delete_size_unit($request);
    }
}
