<?php
namespace App\Http\Repositories;

use App\Http\Interfaces\SizeUnitInterface;
use App\Http\Traits\SizeUnitTrait;
use App\Models\SizeUnit;
use Illuminate\Http\Request;

class SizeUnitRepository implements SizeUnitInterface
{
    use SizeUnitTrait;
    private $sizeUnitModel;

    public function __construct(SizeUnit $sizeUnit)
    {
        $this->sizeUnitModel = $sizeUnit;
    }

    public function get_size_unit()
    {
        $sizeUnits = $this->get_size_units(); //SizeUnitTrait
        return view('admin.size-units.index',compact('sizeUnits'));
    }

    public function create_new_size_unit()
    {
        return view('admin.size-units.create');
    }

    public function store_size_unit(Request $request)
    {
        $this->sizeUnitModel::create(['name' => $request->name]);
        Session()->flash('done','SizeUnit Has Been Created Successfully');
        return redirect(route('size-unit.index'));
    }

    public function edit_size_unit($id)
    {
        $sizeUnit = $this->get_size_units_by_id($id);
        return view('admin.size-units.edit',compact('sizeUnit'));
    }

    public function update_size_unit(Request $request)
    {
        $sizeUnit = $this->get_size_units_by_id($request->size_unit_id);
        $sizeUnit->update(['name' => $request->name]);
        Session()->flash('done','SizeUnit Has Been Updated');
        return redirect(route('size-unit.index'));
    }

    public function delete_size_unit(Request $request)
    {
        $sizeUnit = $this->get_size_units_by_id($request->size_unit_id);
        if ($sizeUnit) {
            $sizeUnit->delete();
            Session()->flash('done','SizeUnit Has Been Deleted Successfully');
            return redirect()->back();
        }
        return abort(404);
    }

}
