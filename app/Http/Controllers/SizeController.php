<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\SizeInterface;
use App\Http\Requests\Sizes\AddSizeRequest;
use App\Http\Requests\Sizes\DeleteSizeRequest;
use App\Http\Requests\Sizes\UpdateSizeRequest;


class SizeController extends Controller
{
    private $sizeInterface;

    public function __construct(SizeInterface $size)
    {
        $this->sizeInterface = $size;
    }

    public function index()
    {
        return $this->sizeInterface->get_sizes();
    }

    public function create()
    {
        return $this->sizeInterface->create_new_size();
    }

    public function store(AddSizeRequest $request)
    {
        return $this->sizeInterface->store_size($request);
    }

    public function edit($id)
    {
        return $this->sizeInterface->edit_size($id);
    }

    public function update(UpdateSizeRequest $request)
    {
        return $this->sizeInterface->update_size($request);
    }

    public function delete(DeleteSizeRequest $request)
    {
        return $this->sizeInterface->delete_size($request);
    }
}
