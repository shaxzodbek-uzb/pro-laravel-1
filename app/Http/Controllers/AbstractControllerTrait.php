<?php
namespace App\Http\Controllers;

use App\Events\ProductCreated;
use App\Events\ProductUpdated;
use Illuminate\Http\Request;
use Inertia\Inertia;

trait AbstractControllerTrait
{
    
    public function index()
    {
        $items = $this->modelClass::all();
        return Inertia::render($this->folderName . '/Index', compact('items'));
    }

    public function create()
    {
        return Inertia::render($this->folderName . '/Create');
    }

    public function store(Request $request)
    {
        $data = $this->validate($request, $this->validationRules);
        $model = $this->modelClass::create($data);
        event(new ProductCreated($model));
        return redirect()->route($this->routeName . '.index');
    }

    public function show($id)
    {
        $item = $this->modelClass::findOrFail($id);
        return view($this->routeName . '.show', compact('item'));
    }

    public function edit($id)
    {
        $item = $this->modelClass::findOrFail($id);
        return Inertia::render($this->folderName . '/Edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $data = $this->validate($request, $this->validationRules);
        $item = $this->modelClass::findOrFail($id)->update($data);
        event(new ProductUpdated($item));

        return redirect()->route($this->routeName . '.index');
    }

    public function destroy($id)
    {
        $this->modelClass::findOrFail($id)->delete();
        return redirect()->route($this->routeName . '.index');
    }
}