<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\ColorsInterface;
use App\Models\Color;
use App\Http\Traits\ColorsTrait;
use PhpOffice\PhpSpreadsheet\Calculation\TextData\Replace;


class ColorsRepository implements ColorsInterface
{
    use ColorsTrait;

    private $colorModel;

    public function __construct(Color $color)
    {
        $this->colorModel = $color;
    }

    public function index()
    {
        $colors = $this->getColorsDataFromRedis();
        return view('admin.colors.index', compact('colors'));
    }

    public function create()
    {
        return view('admin.colors.create');
    }

    public function store($request)
    {

        $this->colorModel::create([
            'code' => str_replace('#','',$request->code),
            'name' => $request->name,
        ]);
        $this->setColorsDataToRedis();

        session()->flash('success', 'New Color Has Been Added Successfully');
        return redirect(route('colors.index'));
    }

    public function updatePage($id)
    {
        $color = $this->getColorByIDFromRedis($id);
        return view('admin.colors.edit', compact('color'));
    }

    public function update($request,$id)
    {

        $this->getColorByIdFromDB($id)->update([
            'code' =>str_replace('#','',$request->code),
            'name' => $request->name,
        ]);

        $this->setColorsDataToRedis();

        session()->flash('success', 'The Selected Color Has Been Updated Successfully');
        return redirect(route('colors.index'));
    }

    public function delete($id)
    {
        $this->getColorByIdFromDB($id)->delete();

        $this->setColorsDataToRedis();

        session()->flash('success', 'The Selected Color Has Been Deleted Successfully');
        return redirect(route('colors.index'));
    }

}
