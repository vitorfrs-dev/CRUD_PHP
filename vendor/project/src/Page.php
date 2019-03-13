<?php

namespace Project;

use Rain\Tpl;

class Page {

    private $tpl;
    private $options = [];

    private $defaults = [
        'header' => true,
        'footer' => true,
        'data' => []
    ];

    public function __construct($opts = [], $tpl_dir = "/views/")
    {

        $this->options = array_merge($this->defaults, $opts);

        $config = array(
            "base_url"      => null,
            "tpl_dir"       => $_SERVER["DOCUMENT_ROOT"] . $tpl_dir,
            "cache_dir"     => $_SERVER["DOCUMENT_ROOT"] . "/views-cache/",
            "debug"         => false, // set to false to improve the speed
        );
        Tpl::configure( $config );

        $this->tpl = new Tpl();

        if ($this->options['header'] === true) $this->tpl->draw('header');

    }

    private function setData($data = array())
    {
        foreach($data as $key => $value) {
            $this->tpl->assign($key, $value);
        }
    }

    public function setTpl($name, $data = array(),$returnHTML  = true)
    {

        $this->setData($data);

        $this->tpl->draw($name);

    }

    public function __destruct()
    {

        $this->tpl->draw('footer');      

    }

}