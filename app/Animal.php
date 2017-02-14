<?php

namespace ProjetoJetv2;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    //protected $table = nomedatabela

    protected $fillable = array('ani_nome', 'ani_descricao', 'ani_raca', 'ani_peso');
}
