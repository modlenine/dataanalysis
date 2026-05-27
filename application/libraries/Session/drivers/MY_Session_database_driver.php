<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Session_database_driver extends CI_Session_database_driver
{
    public function __construct(&$params)
    {
        parent::__construct($params);
        $sess_db_group = config_item('sess_db_group');
        if ( ! empty($sess_db_group))
        {
            $CI =& get_instance();
            $this->_db = $CI->load->database($sess_db_group, TRUE);
            $db_driver = $this->_db->dbdriver
                . (empty($this->_db->subdriver) ? '' : '_' . $this->_db->subdriver);
            $this->_platform = '';
            if (strpos($db_driver, 'mysql') !== FALSE)
            {
                $this->_platform = 'mysql';
            }
            elseif (in_array($db_driver, array('postgre', 'pdo_pgsql'), TRUE))
            {
                $this->_platform = 'postgre';
            }
        }
    }
}
