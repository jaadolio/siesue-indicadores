<?php

    /**
     * Copyright 2010 - 2015, Cake Development Corporation (http://cakedc.com)
     *
     * Licensed under The MIT License
     * Redistributions of files must retain the above copyright notice.
     *
     * @copyright Copyright 2010 - 2015, Cake Development Corporation (http://cakedc.com)
     * @license MIT License (http://www.opensource.org/licenses/mit-license.php)
     */

    //Hacemos referencia a la variable "rolesUsuario" definida desde el controlador.
    $roles_per_user = $rolesUsuario;

    //Hacemos referencia a la variable "usuarioVisualizar" definida desde el controlador.
    //Como dicha variable es un arreglo con registros hacemos referencia
    //a dicho arreglo en la posición 0
    $university_user = $usuarioVisualizar[0];

    //Hacemos una búsqueda del rol del usuario para obtener 
    //el detalle del nombre del rol
    $idx_role = array_search($university_user['role'], array_column($roles_per_user, 'role_text_id'));

    //Guardamos la descripción del rol del usuario
    $user_role_description = $roles_per_user[$idx_role]['role_description'];

    //Hacemos una concatenación del primer nombre y apellido del usuario
    $full_name_user = $university_user['first_name']." ".$university_user['last_name'];

    //Hacemos una concatenación del nombre de la universidad y las siglas
    $university_acronym = $university_user['university_name']." (".$university_user['sigla'].")";

?>

<title>Información Usuario Universitario</title>
<div>
  <?=
    $this->Html->link(
        '<span class = "glyphicon glyphicon-menu-left"></span>&nbspAtrás', 
        ['action' => 'index'], 
        ['class'=>'btn btn-primary btn-sm','escape' => false])
  ?>
</div>
<div class="users view large-10 medium-9 columns">
    <h1><?=$full_name_user?></h2>    
    <table class="table">
        <tr>
            <th>Correo Electrónico Usuario Universitario:</th>
            <td><?=$university_user['username']?></td>
        </tr>
        <?php if ($university_user['role'] != 'admin'){?>
                <tr>
                <th>Universidad a la que pertenece: </th>
                <td>
                  <?=$university_acronym?>
                  </td>
              </tr>
        <?php }
        ?>
        <tr>
            <th>Rol que posee:</th>
            <td><?=$user_role_description?></td>
        </tr>
        <tr>
            <th>Este usuario está activo desde:</th>
            <td><?=strtoupper($university_user['date_user_created'])?></td>
        </tr>
    </table>
</div>
<script type="text/javascript">
  $('#menuAdmin').css('border-bottom', '4px solid #24a339');
</script>