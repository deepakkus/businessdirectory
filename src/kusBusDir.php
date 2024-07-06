<?php
class KusBusDir
{
    private static $_instance;
    public static function init()
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->run();
    }

    function run()
    {
        (new Assets())->init();
        (new BusSidebarMenu())->init();
        $business_handle = new BusDataHandle();
        $business_handle->init();
        $business_List=new BusinessList();
         $business_List->init();
    }
}
