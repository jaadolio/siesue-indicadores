<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Model\Table\UniversityUsersTable;
use App\Model\Table\UserrolesTable;
use Cake\ORM\TableRegistry;
use App\Controller\UsersTraits\ImpersonateTrait;
use App\Controller\UsersTraits\CustomCrudTrait;
use App\Controller\UsersTraits\CustomPasswordManagementTrait;
use Cake\Event\Event;
use CakeDC\Users\Controller\Component\UsersAuthComponent;
use CakeDC\Users\Controller\Traits\LoginTrait;
use Cake\Datasource\ConnectionManager;

/**
 * Universityusers Controller
 */
class UniversityusersController extends AppController
{
    use LoginTrait;
    use ImpersonateTrait;
    use CustomCrudTrait;
    use CustomPasswordManagementTrait;

    //add your new actions, override, etc here

    /**
     * Función que obtiene la información del usuario
     * y la universidad a la que pertenece.
     * @param $idUsuario
     */

}