<?php
namespace App\Http\Repositories;

use App\Http\Interfaces\SizeInterface;
use App\Http\Traits\SizeTrait;
use App\Http\Traits\SizeUnitTrait;
use App\Models\Size;
use App\Models\SizeUnit;
use Illuminate\Http\Request;

class SizeRepository implements SizeInterface
{
    use SizeTrait;
    use SizeUnitTrait;

    private $sizeModel;
    private $sizeUnitModel;
    public function __construct(Size $size, SizeUnit $sizeUnit)
    {
        $this->sizeModel = $size;
        $this->sizeUnitModel = $sizeUnit;
    }

    public function get_sizes()
    {
        $sizes = $this->get_all_sizes(); //SizeTrait
        $unitSize = $this->get_sizes_with_unit_size(); //SizeUnitTrait
        return view('admin.sizes.index',compact('sizes','unitSize'));
    }

    public function create_new_size()
    {
        $sizeUnits = $this->get_size_units();//SizeUnitTrait
        return view('admin.sizes.create',compact('sizeUnits'));
    }

    public function store_size(Request $request)
    {
        $this->sizeModel::create([
            'name' => $request->name,
            'size_unit_id' => $request->select
        ]);
        Session()->flash('done','Size Created Successfully');
        return redirect(route('sizes.index'));
    }

    public function edit_size($id)
    {
        $size = $this->get_size_by_id($id);
        $sizeUnits = $this->get_size_units();//SizeUnitTrait
        return view('admin.sizes.edit',compact('size','sizeUnits'));

    }

    public function update_size(Request $request)
    {
        $size = $this->get_size_by_id($request->size_id);
        $size->update([
            'name' => $request->name,
            'size_unit_id' => $request->select
        ]);
        Session()->flash('done','Size Has Been Updated');
        return redirect()->route('sizes.index');
    }

    public function delete_size(Request $request)
    {
        $size = $this->get_size_by_id($request->size_id);
        if ($size) {
            $size->delete();
            Session()->flash('done','Size Has Been Deleted');
            return redirect()->back();
        }
        return abort(404);
    }


}
