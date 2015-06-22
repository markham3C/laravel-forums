<?php

namespace BishopB\Forum;

/**
 * Our own Request handler, which will be injected into Vanilla for its use.
 */
class GardenRequest extends \Gdn_Request
{
    /**
     * Use Laravel's routing instead of Vanilla's. This allows the vanilla integration
	 * to function properly even if the laravel application is in a subdirectory and 
	 * not hosted at the root of the the web server
     */
    public function WebRoot($WebRoot = NULL)
    {
    	$full_url = \URL::to('/');
		
		//Remove the domain (http://www.example.com/) to create the the WebRoot that 
		//Vanilla needs
		$pos1 = strpos($full_url, '/');
		$pos2 = strpos($full_url, '/', $pos1 + strlen('/'));
		$pos3 = strpos($full_url, '/', $pos2 + strlen('/'));
					
    	$webroot = substr($full_url,$pos3);
    	
        return $webroot;
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
