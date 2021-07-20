<?php

namespace App\Traits;

trait ResponseTrait{
    public function jsonA(){
        return [
            'message' => 'Hello',
            'text' => 'Welcome'
        ];
    }
}
