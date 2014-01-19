<?php
class Taoapi_Cache
{
    private $_CachePath  = '/Apicache/';
    private $_cachetime = false;
    private $_method = "";
    function __construct() {
        $this->_CachePath = WEBROOT."Apicache/";
    }
    public function setMethod ($method)
    {
        $this->_method = $method;
    }
    /**
     * @return Taoapi_Cache
     */
    public function setCacheTime ($time)
    {
        $this->_cachetime = intval($time);
        return $this;
    }
    /**
     * @return Taoapi_Cache
     */
    public function setCachePath ($CachePath)
    {
        $this->_CachePath = WEBROOT."/".$CachePath . '/';
        return $this;
    }
	public function delCache ($dir)
	{
		$dh=opendir($dir);
		while ($file=readdir($dh))
		{
			if($file!="." && $file!="..")
			{
				$fullpath=$dir."/".$file;
				
				
				if(!is_dir($fullpath))
				{
					$isfile = is_file($fullpath);
					$filetime = date('U', filemtime($fullpath));
					
					
					$cachetime = $this->_cachetime * 60 * 60;
					
					$cj = (time() - $filetime);
					
					
					if($isfile && $cj > $cachetime)
					{
						unlink($fullpath);
					}
				}
				else
				{
					//deldir($fullpath);
				}
			}
		}
		closedir($dh);
		return true;
	}
    public function saveCacheData ($id, $result)
    {
		
        if ($this->_cachetime) {
            if (! is_dir($this->_CachePath)) {
                mkdir($this->_CachePath);
            }
            if (! is_dir($this->_CachePath . $this->_method)) {
                mkdir($this->_CachePath . $this->_method);
            }

           $filepath = $this->_CachePath . $this->_method;
			

            if (is_dir($filepath)) {
                $filename = $filepath . '/' . $id . '.cache';
                @file_put_contents($filename, $result);
		    	//
				if((time() % 5)==0){
				//×Ô¶¯É¾³ı»º´æ
					$this->delCache($filepath);
				}
            }
        }
    }

    public function getCacheData ($id)
    {
		
        $filename = $this->_CachePath . $this->_method  . '/' . $id . '.cache';
        $folder = $this->_CachePath . $this->_method . '/';
        if ($this->_cachetime) {
            if (file_exists($filename)) {
                $filetime = date('U', filemtime($filename));
                $cachetime = $this->_cachetime * 60 * 60;

				$cj = (time() - $filetime);
				//echo($cj." ");
				//echo($cachetime."||");
                if ($this->_cachetime != 0 && $cj > $cachetime) {
		    		//$this->delCache($folder,$cachetime);
                    return false;
                }




                return @file_get_contents($filename);
            }
        }
        return false;
    }
	

}