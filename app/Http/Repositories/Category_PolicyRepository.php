<?php
namespace App\Http\Repositories;

use App\Http\Interfaces\Category_PolicyInterface;
use App\Http\Traits\Category_PolicyTrait;
use App\Models\CategoryPolicy;
use Illuminate\Http\Request;

class Category_PolicyRepository implements Category_PolicyInterface
{
    use Category_PolicyTrait;
    private $categoryPolicyModel;

    public function __construct(CategoryPolicy $categoryPolicy)
    {
        $this->categoryPolicyModel = $categoryPolicy;
    }

    public function get_category_policy()
    {
        $categoryPolicies = $this->show_category_policies();
        return view('admin.category-policies.index',compact('categoryPolicies'));
    }

    public function create_category_policy()
    {
        return view('admin.category-policies.create');
    }

    public function store_category_policy(Request $request)
    {
        $this->categoryPolicyModel::create(['name' => $request->name]);
        Session()->flash('done','CategoryPolicy Has Been Added Successfully');
        return redirect(route('categoryPolicy.index'));
    }

    public function edit_category_policy($id)
    {
        $categoryPolicy = $this->get_category_policy_by_id($id);
        return view('admin.category-policies.edit',compact('categoryPolicy'));
    }

    public function update_category_policy(Request $request)
    {
        $categoryPolicy = $this->get_category_policy_by_id($request->cat_id);
        $categoryPolicy->update(['name'=> $request->name]);
        Session()->flash('done','CategoryPolicy Has Been Updated');
        return redirect(route('categoryPolicy.index'));
    }

    public function delete_category_policy(Request $request)
    {
        $categoryPolicy = $this->get_category_policy_by_id($request->cat_id);
        if ($categoryPolicy) {
            $categoryPolicy->delete();
            Session()->flash('done','CategoryPolicy Has Been Deleted Successfully');
            return redirect()->back();
        }
        return abort(404);
    }
}
