<?php

Yii::import('zii.widgets.CPortlet');

class UserMenu extends CPortlet {

    public $title = 'Formularios';
    
    /**
     * Get the rol start the rol id.
     * @return array
     */
    public function getRecentRols() {
        return User::model()->getRecentRols(Yii::app()->user->id);
    }

    /**
     * Get the recent forms from rol.
     * @param type $id_rol
     * @return array
     */
    public function getRecentForms($id_rol) {
        return Rol::model()->getRecentForms($id_rol);
    }
    
    /**
     * Redirect the view userMenu.
     */
    protected function renderContent() {
        $this->render('userMenu');
    }

}
