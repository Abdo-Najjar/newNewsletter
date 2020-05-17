<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mail extends Model
{
    protected $guarded = [];

    public function path()
    {
        return route('mails.show' , ['mail'=>$this->id]);
    }

    public function newsletter()
    {
        return $this->belongsTo(Newsletter::class);
    }

    public function components()
    {
        
        return $this->hasMany(Component::class);
    }

    public function getImage()
    {
        return $this->components()->where('type_id' , 1)->get()->first()->content;
    }

    public function getText()
    {
        return $this->components()->where('type_id' , 2)->get()->first()->content;
    }

    public function getLogo()
    {
        return $this->components()->where('type_id' , 4)->get()->first()->content;
    }

    public function getTitle()
    {
        return $this->components()->where('type_id' , 3)->get()->first()->content;
    }

    public function getButton()
    {
        return $this->components()->where('type_id' , 5)->get()->first()->content;
    }
}
