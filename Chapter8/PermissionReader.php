<?php

class PermissionReader
{
    protected $_splFileInfo;
    
    public function __construct($splFileInfo = NULL)
    {
    	if ($splFileInfo === NULL)
        {
            throw new InvalidArgumentException('Missing argument');
        }
                
        if (!is_a($splFileInfo, 'SplFileInfo'))
        {
            throw new InvalidArgumentException('Invalid argument type');
        }
        
        $this->_splFileInfo = $splFileInfo;    
    }
    
    public function __toString()
    {
        return $this->_getStringPermissions();
    }
    
    protected function _getStringPermissions()
    {
        $permissions = $this->_splFileInfo->getPerms();
        $stringPermissions = '';
 
        // Owner
        $stringPermissions .= (($permissions & 0x0100) ? 'r' : '-');
        $stringPermissions .= (($permissions & 0x0080) ? 'w' : '-');
        $stringPermissions .= (($permissions & 0x0040) ? (($permissions & 0x0800) ? 's' : 'x' ) : (($permissions & 0x0800) ? 'S' : '-'));
        
        // Group
        $stringPermissions .= (($permissions & 0x0020) ? 'r' : '-');
        $stringPermissions .= (($permissions & 0x0010) ? 'w' : '-');
        $stringPermissions .= (($permissions & 0x0008) ? (($permissions & 0x0400) ? 's' : 'x' ) : (($permissions & 0x0400) ? 'S' : '-'));
        
        // Other
        $stringPermissions .= (($permissions & 0x0004) ? 'r' : '-');
        $stringPermissions .= (($permissions & 0x0002) ? 'w' : '-');
        $stringPermissions .= (($permissions & 0x0001) ? (($permissions & 0x0200) ? 't' : 'x' ) : (($permissions & 0x0200) ? 'T' : '-'));
        
        return $stringPermissions;
    }
}