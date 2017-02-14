<?php

namespace ProjetoJetv2\Http\Controllers;

use Request;
use Illuminate\Support\Facades\DB;
use ProjetoJetv2\Animal;
use ProjetoJetv2\Image;
use ProjetoJetv2\Animals_images;
use Validator;
use ProjetoJetv2\Http\Requests\AnimalRequest;

class AnimalController extends Controller{
    //$routemiddleware
    public function __construct(){
        $this->middleware('autorizador');
    }
    public function lista(){
    	$html = '<h1>Listagem de Animais</h1>';
    	$animals = Animal::all();
    	
    	return view('ver-todos')->with('animals', $animals);
    }
    public function verAnimal($id){
    	$animal = Animal::find($id);
    	return view('ver-animal')->with('a', $animal);
    }

    public function novoAnimal(){
    	return view('formulario-animal');
    }

    public function removerAnimal(){
        //SE colocar o ID direto no parametro da função o Laravel sabe que é da rota.
        $id = Request::route('id');
        $id_imgs = DB::table('animals_images')->where('id_animal', $id)->get();
        foreach ($id_imgs as $lul) { 
            DB::table('animals_images')->where('id_animal', $id)->delete();
         $arr_imgs_src[] = DB::table('images')->where('id', $lul->id_image)->delete();
        }
        $animal = Animal::find($id);
        $animal->delete();
        return redirect('/animais');
    }

   public function adicionarAnimal(AnimalRequest $request){
        //tive que mudar o create pq agora estou passando uma classe request responsavel por validar os campos.
        //Validação no back, primeiro o nome e o request depois o tipo de validação.

    dd($_FILES);
    die();
            $animal = Animal::create($request->all());
            
            $ani_insertedId = $animal->id;

            $destinationPath = 'storage/app/imganimais/';
             $imgs = $request->file('imgs');

                $fileArray = array('image' => $imgs);

                 $rules = array(
                        'image' => 'mimes:jpeg,jpg,png,gif|max:10000' // max 10000kb
                    );
                    
                 
             foreach ($imgs as $key => $imagem) {
                $fileArray = array('image' => $imagem);
                $validator = Validator::make($fileArray, $rules);
                 if ($validator->fails())
                    {
            
                        return response()->json(['error' => $validator->errors()->getMessages()], 400);
                        die();
                    } 
                $imagem->store('imganimais');
                $img_nome = $imagem->getClientOriginalName();

                $imagem->move($destinationPath, $img_nome);
                //$ext = $imagem->getClientOriginalExtension();
                $path = $destinationPath.$img_nome;
                $arr_paths[] = $path;
                $im = new Image(array('img' => $path));
                $im->save();
                $a_i = new Animals_Images(array('id_animal'=> $ani_insertedId, 'id_image' => $im->id));
                $a_i->save();
             }
        
           
             
             //array('ani_nome' => $request->input('ani_nome'), 'ani_descricao' => $request->input('ani_descricao'), 'ani_peso' => $request-//input('ani_descricao')

             //die(print_r($_FILES));
        //Identificar na classe pra evitar MassAssignmentException
        /*
        $params = Request::all();
        $animal = new Animal($params);
        $animal->save();
        */

        //Mantem as requisições da requisição anterior
        return redirect('/animais')->withInput();
    }

 }
