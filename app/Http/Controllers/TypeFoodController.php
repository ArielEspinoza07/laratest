<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\TypeFood;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Http\Request;

class TypeFoodController extends Controller
{

    public function index(): View
    {
        if (request()->has('archived')) {
            $typeFoods = TypeFood::with(['createdBy', 'updatedBy', 'deletedBy'])
                                 ->onlyTrashed()
                                 ->paginate(10);

            return view('foods.types.index')->with(compact('typeFoods'));
        }
        $typeFoods = TypeFood::with(['createdBy', 'updatedBy'])
                             ->paginate(10);

        return view('foods.types.index')->with(compact('typeFoods'));
    }


    public function create(): View
    {

        return view('foods.types.create');
    }


    public function store(Request $request)
    {
        $payLoad               = $request->except('_token');
        $payLoad['created_by'] = User::query()
                                     ->select('id')
                                     ->inRandomOrder()
                                     ->value('id');
        TypeFood::query()
                ->create($payLoad);
        session()->flash('success', 'Type Food was successfully created.');

        return redirect()->route('foods.types.index');
    }


    public function show(TypeFood $type): View
    {
        return view('foods.types.show')->with(compact('type'));
    }


    public function update(Request $request, TypeFood $type)
    {
        $payLoad               = $request->except('_token');
        $payLoad['updated_by'] = User::query()
                                     ->select('id')
                                     ->inRandomOrder()
                                     ->value('id');
        $type->update($payLoad);
        session()->flash('success', 'Type Food was successfully updated.');

        return redirect()->route('foods.types.index');
    }


    public function destroy(TypeFood $type)
    {
        $type->update([
            'deleted_by' => User::query()
                                ->select('id')
                                ->inRandomOrder()
                                ->value('id')
        ]);
        $type->delete();
        session()->flash('success', 'Type Food was successfully deleted.');

        return redirect()->route('foods.types.index');
    }


    public function restore($type)
    {
        TypeFood::query()
                ->withTrashed()
                ->findOrFail($type)
                ->restore();
        session()->flash('success', 'Type Food was successfully restored.');

        return redirect()->route('foods.types.index');
    }
}
