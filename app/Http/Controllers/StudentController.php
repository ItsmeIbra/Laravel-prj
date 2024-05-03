<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;
use App\Models\Student;
use Illuminate\View\View;

class StudentController extends Controller
{
    public function index(): View
    {
        $students = Student::paginate(2);
        return view('etudiant.index')->with('students', $students);
    }

    public function create()
    {
        return view('etudiant.create');
    }


    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'image' => 'required| mimes:png,jpg,jpeg,webp',
            'name' => 'required',

            'level' => 'required',
            'email' => 'required',
            'mobile' => 'required',
        ]);
        if ($request->has("image")) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . "_" . $extension;
            $path = public_path('images');
            $file->move($path, $filename);
        }
        $input = $request->all();
        $input["image"] = $filename;
        Student::create($input);

        return redirect()->route('etudiant.index')->with('success', 'New student is added successfully');
    }


    public function show(string $id): View
    {
        $students = Student::find($id);
        return view('etudiant.show')->with('students', $students);
    }


    public function edit(string $id): View
    {
        $students = Student::find($id);
        return view('etudiant.edit')->with('students', $students);
    }


    public function update(Request $request, string $id): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'level' => 'required|integer',
            'email' => 'max:255',
            'mobile' => 'required',
        ]);

        $students = Student::find($id);


        $students->name = $request->input('name');
        $students->level = $request->input('level');
        $students->email = $request->input('email');
        $students->mobile = $request->input('mobile');


        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = public_path('images');
            $file->move($path, $filename);
            $students->image = $filename;
        }


        $students->save();

        return redirect()->route('etudiant.index')->with('flash_message', 'Student Updated!');
    }

    public function destroy(string $id): RedirectResponse
    {
        Student::destroy($id);
        return redirect('etudiant')->with('flash_message', 'deleted!');
    }
}
