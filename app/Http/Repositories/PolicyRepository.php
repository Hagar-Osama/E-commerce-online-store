<?php
namespace App\Http\Repositories;

use App\Http\Interfaces\PolicyInterface;
use App\Http\Traits\Category_PolicyTrait;
use App\Http\Traits\PolicyTrait;
use App\Models\CategoryPolicy;
use App\Models\Policy;
use Illuminate\Http\Request;


class PolicyRepository implements PolicyInterface
{
    use PolicyTrait;
    use Category_PolicyTrait;
    private $policyModel;
    private $categoryPolicyModel;
    public function __construct(Policy $policy, CategoryPolicy $categoryPolicy)
    {
        $this->policyModel = $policy;
        $this->categoryPolicyModel = $categoryPolicy;
    }

    public function get_policy()
    {
        $policies = $this->show_policies(); //PolicyTrait
        $categoryPolicy = $this->get_policy_by_category(); //PolicyTrait
        return view('admin.policies.index',compact('policies','categoryPolicy'));
    }

    public function create_new_policy()
    {
        $catPolicies = $this->show_category_policies(); //Category_PolicyTrait
        return view('admin.policies.create', compact('catPolicies'));
    }

    public function store_new_policy(Request $request)
    {
        $this->policyModel::create([
            'title' => $request->name,
            'description' => $request->description,
            'category_policy_id' => $request->select
        ]);
        //dd($request);
        Session()->flash('done','Policy Has Been Created Successfully');
        return redirect(route('policy.index'));
    }

    public function edit_policy($id)
    {
        $policy = $this->get_policy_by_id($id); //PolicyTrait
        $catPolicies = $this->show_category_policies(); //Category_PolicyTrait
        return view('admin.policies.edit',compact('policy','catPolicies'));
    }

    public function update_policy(Request $request)
    {
        $policy = $this->get_policy_by_id($request->policy_id); //PolicyTrait
        if ($policy) {
            $policy->update([
                'title' => $request->name,
                'description' => $request->description,
                'category_policy_id' => $request->select
            ]);
            Session()->flash('done','Policy Has Been Updated');
            return redirect(route('policy.index'));
        }
        return redirect()->back();
    }

    public function delete_policy(Request $request)
    {
        $policy = $this->get_policy_by_id($request->policy_id); //PolicyTrait
        if ($policy) {
            $policy->delete();
            Session()->flash('done','Policy Has Been Deleted');
            return redirect(route('policy.index'));
        }
        return abort(404);
    }
}
