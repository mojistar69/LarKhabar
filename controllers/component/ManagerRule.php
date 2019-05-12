<?php
namespace app\controllers\component;
use yii\rbac\Rule;
class ManagerRule extends Rule{
    public $name='isManager';
    public function execute($user, $item, $params)
    {
        var_dump($params);
        //return isset($params['manager'])  ? $params['manager']->id== $user :false;
    }
}


?>