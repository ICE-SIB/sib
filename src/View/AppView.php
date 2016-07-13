<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     3.0.0
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\View;

use Cake\View\View;

/**
 * Application View
 *
 * Your application’s default view class
 *
 * @link http://book.cakephp.org/3.0/en/views.html#the-app-view
 */
class AppView extends View
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading helpers.
     *
     * e.g. `$this->loadHelper('Html');`
     *
     * @return void
     */
    public function initialize()
    {
        $this->loadHelper('Paginator', ['templates' => 'paginator']);
        
        $this->Form->templates([
            'formStart' => '<form role="form" {{attrs}}><div class="form-group">',
            'formEnd' => '</div></form>',
            'select' => '<select class="form-control" name="{{name}}"{{attrs}}>{{content}}</select>',
            'label' => '<label class="control-label" {{attrs}}>{{text}}</label>',
            'input' => '<input class="form-control" type="{{type}}" name="{{name}}"{{attrs}}/>',
            'inputSubmit' => '<input class="btn btn-primary btn-block" type="{{type}}"{{attrs}}/>',
            'inputContainer' => '<div class="form-group">{{content}}</div>',
            'inputContainerError' => '<div class="form-group has-error" aria-describedby="helpBlock">{{content}}{{error}}</div>',
            'error' => '<span id="helpBlock" class="help-block">{{content}}</span>'
        ]);
    }
}
