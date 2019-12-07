<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subjects;
use App\Requests;
class AdmController extends Controller
{
    public function protocolo(){
        $subjects = Subjects::orderBy('name')->get();
        // 
        return view('admprotocolo',compact('subjects'));
    }

    public function registrarProtocolos(){
         return view("admregistrar");
    }
    public function store(Request $request){
        $subject = new Subjects;
        $subject->name = $request->nome;
        $subject->price = $request->preco;
        $subject->save();
        return redirect('/adm');
    }
    public function destroy($id){
        if(Requests::where('subject_id',$id)->exists()){
            return redirect('/adm');
        }
        $subjects = Subjects::findOrFail($id);
        $subjects->delete();
        return redirect('/adm');
    }
    public function update(Request $request,$id){
        $newRequest = Subjects::findOrFail($id);
        $newRequest->price = $request->preco;
        $newRequest->name = $request->nome;
        $newRequest->save();
        return redirect('/adm');
    }
}