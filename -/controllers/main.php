<?php namespace ewma\access\controllers;

// todo удалить. предварительно поменять в роутерах \ewma\access~:hasPermission на \ewma~access:hasPermission

class Main extends \Controller
{
    public function isUser()
    {
        return $this->_user() ? true : false;
    }

    public function isGuest()
    {
        return $this->_user() ? false : true;
    }

    public function hasPermission()
    {
        return $user = $this->_user() and $user->hasPermission($this, $this->data('path'));
    }

    public function otherUserHasPermission()
    {
        if ($userModel = \ewma\access\models\User::find($this->data('user_id'))) {
            return $user = $this->app->access->getUser($userModel) and $user->hasPermission($this, $this->data('path'));
        }
    }

    public function getUserModelById()
    {
        return \ewma\access\models\User::find($this->data('id'));
    }

    public function logout()
    {
        $this->app->access->auth->logout();

        $this->app->response->redirect($this->data('redirect'));
    }
}
