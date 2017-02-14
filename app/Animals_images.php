<?php

namespace ProjetoJetv2;

use Illuminate\Database\Eloquent\Model;

class Animals_images extends Model
{
    protected $table = 'animals_images';

    protected $fillable = array('id_animal', 'id_image');
}
