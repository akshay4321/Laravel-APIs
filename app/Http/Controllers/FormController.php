<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Form;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function index()
    {
        return Form::all();
    }

    public function store(Request $request)
    {
//        return $request;
        $request->validate([
            'name' => 'required|string|max:255',
            'components' => 'required|array',
        ]);


        $form = new Form();
        $form->name = $request->input('name');
        $form->components = json_encode($request->input('components'));
        $form->save();

        // Return a success response
        return response()->json(['message' => 'Form saved successfully'], 200);
    }

    public function getAllForms(){
        $forms = Form::all();
        return response()->json(['message' => 'Data Fetch Succefully', 'formData' => $forms], 200);
    }

    public function getFormsDataById($id){
//        return $id;
        $forms = Form::find($id);
        return response()->json(['message' => 'Data Fetch Succefully', 'formData' => $forms], 200);
    }


}
