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
?>
<?= $this->Html->script('sweetalert/sweetalert2') ?>
<?= $this->Html->css('sweetalert/sweetalert2') ?>
<title>Configurar Sistema - Usuarios</title>
<div>
  <?=$this->Html->link('<span class = "glyphicon glyphicon-menu-left"></span>&nbspAtrás', 
            '/administrator', 
            ['class'=>'btn btn-primary btn-sm','escape' => false])
          ?>
</div>
<div class="users index large-10 medium-9 columns">
    <h2>Listado de usuarios del sistema</h2>
    <table class="table" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th style="color: ">Correo</th>
            <th>Nombre</th>
            <th>Rol</th>
            <th><?='Acciones'?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach (${$tableAlias} as $user) : ?>
        <tr>
            <td><?= h($user->email) ?></td>
            <td><?= h($user->first_name).' '.h($user->last_name) ?></td>
            <td>
                <?php if($user->role == 'validador'){
                    echo 'Validador';
                  }else if ($user->role == 'digitador'){
                    echo 'Digitador';
                  }else if ($user->role == 'digivali'){
                    echo 'Digitador - Validador';
                  }else{
                    echo 'Administrador';
                  }
                ?>
            </td>
            <td class="actions">
                <?= 
                  $this->Html->link(
                    '<span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>&nbspVer', 
                    [
                      'controller' => 'Universityusers', 
                      'action' => 'userinformationuniversity', 
                      $user->id
                    ],
                    [
                      'escape' => false, 
                      'class' => 'text-success'
                    ]) 
                ?>
                &nbsp&nbsp
                <?php if($idUsuarioAdminActual != $user -> id){?>
                    <?= $this->Html->link('<span class="glyphicon glyphicon-option-vertical" aria-hidden="true"></span>&nbspCambiar contraseña', ['action' => 'changePassword', $user->id], ['escape' => false, 'class' => 'text-info']) ?>&nbsp&nbsp
                <?php } ?>
                <?= $this->Html->link('<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>&nbspEditar', ['action' => 'edit', $user->id], ['escape' => false, 'class' => 'text-warning']) ?>&nbsp&nbsp                
                <a onmouseover="" style="cursor: pointer;" onclick="eliminarUsuario('<?=$user->id?>')" id = eliminar class="text-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>&nbspEliminar</a>
            </td>
        </tr>

    <?php endforeach; ?>
    </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' .'anterior') ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next('siguiente'. ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Página {{page}} de {{pages}}, mostrando {{current}} registro(s) de {{count}}')]) ?>
        </p>
    </div>
    <div>
        <?= $this->Html->link('Crear nuevo usuario&nbsp<span class="glyphicon glyphicon-user"></span>', ['action' => 'add'], ['class'=>'btn btn-primary', 'escape' => false]) ?>
    </div>
</div>

<script type="text/javascript">

  $('#menuAdmin').css('border-bottom', '4px solid #24a339');

  /**
   * Función que extrae la primera parte de la url
   * del sitio Web activo antes de la referencia a la vista.
   */
  function extractUrlSite(){

    //Definimos la expresión regular
    const regex = /http\:{1}\/{2}.+\/{1}/gm;

    //Obtenemos la URL completa de la página activa
    const urlString = window.location.href;

    //Definimos variables auxiliares
    let m, mainUrl;

    //---------------------------------------------------------

    //Recorremos el resultado de la aplicación
    //de la expresión regular sobre el texto de la URL
    while ((m = regex.exec(urlString)) !== null) {
      
      // Mientras vamos avanzando sobre los caracteres
      // que cumplen con el detalle de la expresión regular
      if (m.index === regex.lastIndex) {

        //Vamos incrementando el avance sobre los caracteres
        regex.lastIndex++;

      }

      // Seguidamente recorremos los grupos de textos que
      // concuerdan con la expresión regular
      m.forEach((match, groupIndex) => {
        // Guardamos el primer grupo dentro de la
        // variable "mainUrl" ya que ahí se ubica
        // la información que nos interesa
        mainUrl = match;
      });

    }

    //Retornamos el texto de la URL del sitio antes
    //de la referencia al nombre de la vista
    return mainUrl;

  }

  
  /**
   * Función auxiliar encargada de manipular el proceso
   * de eliminación del usuario del sistema.
   */
  function eliminarUsuario(idUsuario){
      
      var request = new XMLHttpRequest();

      //------------------------------------------------

      let getMainURLPart = extractUrlSite();

      request.open('GET', '<?= $this->Url->build(["controller" => "Indicatorsubmissions", "action" => "tieneDatosAsociadosUsuario"])?>/'+ idUsuario );
      request.setRequestHeader('Accept', 'application/json');
      request.onreadystatechange = function () {
          var DONE = 4;
          var OK = 200;
          if (request.readyState === DONE && request.status === OK) {                
              if(JSON.parse(request.responseText).tieneDatosAsociados){
                  swal(
                    'Atención!',
                    'Este usuario no puede ser eliminado, ya que, cuenta con datos relacionados a él en el sistema. El usuario puede ponerse como <b>Inactivo</b> desde la opción de <b>Editar</b>, lo cual impedirá que inicie sesión el el sistema.',
                    'warning'
                  );
              }else{
                  swal({
                    title: 'Atención!',
                    text: "¿Está seguro(a) de eliminar permanentemente a este usuario?",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Aceptar',
                    cancelButtonText: 'Cancelar'
                  }).then(function () {
                    window.location = getMainURLPart + 'universityusers/delete/'+idUsuario;
                  })                    
              }
          }
      };
      request.send();
  }

</script>
