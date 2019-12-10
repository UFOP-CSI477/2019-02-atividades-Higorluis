<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subjects;
use App\Requests;
class UserController extends Controller
{
    public function registrar(){
        $subjects = Subjects::orderBy('name')->get();
        // 
        return view('registrar',compact('subjects'));
    }

    public function registrados(){
        $requests = Subjects::join('requests','requests.subject_id','=','subjects.id')
        ->where('user_id',auth()->user()->id)
        ->orderBy('date')->get();
        $subjects = Subjects::orderBy('name')->get();
        return view("registrados",compact('requests'), compact('subjects'));
    }
    public function store(){
        $requests = new Requests;
        $requests -> subject_id = request("protocolo");
        $requests -> date = request("data");
        $requests -> description = request("descricao");
        $requests -> user_id = auth() -> user() -> id;
        $requests -> save();
        return redirect("/home"); 

    }
    public function destroy($id){
        $requestObj = Requests::findOrFail($id);
        $requestObj->delete();
        return redirect('/home');
    }
    public function update(Request $request, $id){
        $newRequest = Requests::findOrFail($id);
        $newRequest->subject_id = $request->protocolo;
        $newRequest->date = $request->data;
        $newRequest->description = $request->descricao;
        $newRequest->save();
        return redirect('/home');    
    }
}
