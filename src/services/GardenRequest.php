<?php

namespace BishopB\Forum;

/**
 * Our own Request handler, which will be injected into Vanilla for its use.
 */
class GardenRequest extends \Gdn_Request
{
    /**
     * We specifically always want our web root inside our route.
     */
    public function WebRoot($WebRoot = NULL)
    {
        return forum_get_route_prefix();
    }
	
	/**
     * Use Laravel's routing instead of Vanilla's. This allows the vanilla integration
	 * to function properly even if the laravel application is in a subdirectory and 
	 * not hosted at the root of the the web server
     */
	public function Url($Path = '', $WithDomain = FALSE, $SSL = NULL) {
		return \URL::to($Path);		
	}

    /**
     * Some machinery to play nice with Vanilla's Garden Framework IOC.
     */
    public static function Create()
    {
        return new GardenRequest();
    }

    private function __construct()
    {
        $this->Reset();
    }
}
