<?php

namespace Models\Menu;

use Core\Helper;
use Models\Usuario\ModelUsuario;

class ModelMenu extends Helper
{
    static function BuildMenuFromUser($user)
    {
        $getUsuarioMenu = self::simpleQuery(
            "nombre_menu, href_menu, icon_menu, color_menu, id_sg_estado as estado",
            "sg_menu_usuarios", 
            "id_sg_usuario = '". $user ."' ORDER BY posicion_menu ASC");

        foreach($getUsuarioMenu as $key => $value)
        {
            if($value['estado'] != 1)
                return false;
            else 
            {
                ?>          
                <a class="nav-link" href="<?php echo $value['href_menu']?>">
                    <i class="ni ni-<?php echo $value['icon_menu']?> text-<?php echo $value['color_menu']?>"></i>
                    <span class="nav-link-text"><?php echo $value['nombre_menu']?></span>                    
                </a>
                <?php
            }      
        }
    }
}