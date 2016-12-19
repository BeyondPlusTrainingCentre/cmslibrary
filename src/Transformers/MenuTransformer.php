<?php

namespace BeyondPlus\CmsLibrary\Transformers;

class MenuTransformer 
{
    public function transform($menu)
    {
        return [
            'menu' => $menu['menu'],
            'pages' => $menu['pages'],
            'posts' => $menu['posts']
            
        ];
    }
}