<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdThesis;
use Illuminate\Http\Request;

class AdThesisController extends Controller
{
    public function index()
    {
        $adTheses = AdThesis::all();
        return view('admin.ad-theses.index', compact('adTheses'));
    }

    public function create()
    {
        return view('admin.ad-theses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'text' => 'required|string|max:255',
        ]);

        AdThesis::create($request->only('text'));

        return redirect()->route('ad-theses.index')->with('success', 'Тезис добавлен');
    }

    public function show($id)
    {
        $adThesis = AdThesis::findOrFail($id);
        return view('admin.ad-theses.show', compact('adThesis'));
    }

    public function edit($id)
    {
        $adThesis = AdThesis::findOrFail($id);
        return view('admin.ad-theses.edit', compact('adThesis'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'text' => 'required|string|max:255',
        ]);

        $adThesis = AdThesis::findOrFail($id);
        $adThesis->update($request->only('text'));

        return redirect()->route('ad-theses.index')->with('success', 'Тезис обновлён');
    }

    public function destroy($id)
    {
        $adThesis = AdThesis::findOrFail($id);
        $adThesis->delete();

        return redirect()->route('ad-theses.index')->with('success', 'Тезис удалён');
    }
}