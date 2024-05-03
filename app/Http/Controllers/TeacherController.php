<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;
use App\Models\Teachers;
use Illuminate\View\View;

class TeacherController extends Controller
{
    public function index(): View
    {
        $teachers = Teachers::paginate(2);
        return view('teachers.index')->with('teachers', $teachers);
    }
    
    public function create()
    {
        return view('teachers.create');
    }

    
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'img' => 'required| mimes:png,jpg,jpeg,webp',
            'name' => 'required',

            'material' => 'required', 
            'email' => 'required',
            'mobile' => 'required',
        ]);
        if ($request->has("img")) {
            $file = $request->file('img');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . "_" . $extension;
            $path = public_path('imgs');
            $file->move($path, $filename);
        }
        $input = $request->all();
        $input["img"] = $filename;
        Teachers::create($input);

        return redirect()->route('teachers.index')->with('success', 'New teacher is added successfully!');
    }

    
    public function show(string $id): View
    {
        $teachers = Teachers::find($id);
        return view('teachers.show')->with('teachers', $teachers);
    }

    
    
    public function edit(string $id): View
    {
        $teachers = Teachers::find($id);
        return view('teachers.edit')->with('teachers', $teachers);
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'material' => 'required|integer',
            'email' => 'max:255',
            'mobile' => 'required',
        ]);

        $teachers = Teachers::find($id);

        $teachers->name = $request->input('name');
        $teachers->material = $request->input('material');
        $teachers->email = $request->input('email');
        $teachers->mobile = $request->input('mobile');

        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = public_path('imgs');
            $file->move($path, $filename);
            $teachers->img = $filename;
        }

        $teachers->save();

        return redirect()->route('teachers.index')->with('flash_message', 'Student Updated!');
    }

    public function destroy(string $id): RedirectResponse
    {
        Teachers::destroy($id);
        return redirect('teachers')->with('flash_message', 'Teacher deleted!');
    }
}
