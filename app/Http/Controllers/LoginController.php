<?php

namespace ProjetoJetv2\Http\Controllers;

use Request;
use Auth;
use ProjetoJetv2\Animal;

class LoginController extends Controller{
    
    public function formLogin(){
    	return view('form-login');
    }

    public function autenticarLogin(){

    	$credenciais = Request::only('email','password');

    	if (Auth::attempt($credenciais)) {
    		$animals = Animal::all();
    		return view('ver-todos')->with('animals', $animals);
    	}

    	return 'Usuário não Existe';

    }
}
