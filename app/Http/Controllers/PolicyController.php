<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\PolicyInterface;
use App\Http\Requests\Policies\AddPolicyRequest;
use App\Http\Requests\Policies\DeletePolicyRequest;
use App\Http\Requests\Policies\UpdatePolicyRequest;


class PolicyController extends Controller
{
    private $policyInterface;
    public function __construct(PolicyInterface $policy)
    {
        $this->policyInterface = $policy;
    }

    public function index()
    {
        return $this->policyInterface->get_policy();
    }

    public function create()
    {
        return $this->policyInterface->create_new_policy();
    }

    public function store(AddPolicyRequest $request)
    {
        return $this->policyInterface->store_new_policy($request);
    }

    public function edit($id)
    {
        return $this->policyInterface->edit_policy($id);
    }

    public function update(UpdatePolicyRequest $request)
    {
        return $this->policyInterface->update_policy($request);
    }

    public function delete(DeletePolicyRequest $request)
    {
        return $this->policyInterface->delete_policy($request);
    }
}
