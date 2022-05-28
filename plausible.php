<?php
/**
*  @author    mrdotb <hello@mrdotb.com>
*  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*/

if (!defined('_PS_VERSION_')) {
    exit;
}

class Plausible extends Module
{
    protected $config_form = false;

    public function __construct()
    {
        $this->name = 'plausible';
        $this->tab = 'front_office_features';
        $this->version = '1.0.0';
        $this->author = 'mrdotb';
        $this->need_instance = 0;
        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->l('plausible');
        $this->description = $this->l('A module to integrate plausible tracking');

        $this->ps_versions_compliancy = array('min' => '1.7', 'max' => _PS_VERSION_);
    }

    public function install()
    {
        return parent::install() && $this->registerHook('displayHeader');
    }

    public function uninstall()
    {
        return parent::uninstall();
    }

    /**
     * Add the template with the Plausible JavaScript.
     */
    public function hookDisplayHeader($params)
    {
        return $this->display(__FILE__, 'plausible.tpl');
    }
}
