<?php
namespace ChocolatineWp\Model;

class Controller
{
    public function getPost()
    {
        return global $post;
    }
}
