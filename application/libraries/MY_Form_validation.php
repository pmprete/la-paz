<?php
class MY_Form_validation extends CI_Form_validation {
    public function __construct()
    {
        parent::__construct();
        $this->_error_prefix    = '<div class="panel panel-danger"><div class="panel-heading"> ';
        $this->_error_suffix    = '</div></div>';
    }
}