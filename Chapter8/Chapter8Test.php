<?php

require_once 'PHPUnit\Framework\TestCase.php';
require_once 'PermissionReader.php';

/**
 *  8.1 Write tests for a class PermissionReader that has a __toString() 
 *  method which produces a human readable string, containing the 
 *  permissions of a SplFileInfo which is passed to it in the constructor. No 
 *  actual file should be used, only mocks (you can use actual files to learn 
 *  about Spl api but they should not be present in the final production code 
 *  and unit tests).
 */
class Chapter8Test extends PHPUnit_Framework_TestCase
{    
    public static function permissionValues()
    {
        // getPerms() returns permission in octal not decimal format so we convert the number
        return array
                   (
                       array(octdec(777), 'rwxrwxrwx'),
                       array(octdec(666), 'rw-rw-rw-'),
                       array(octdec(555), 'r-xr-xr-x'),
                       array(octdec(444), 'r--r--r--'),
                       array(octdec(754), 'rwxr-xr--'),
                       array(octdec(550), 'r-xr-x---')
                   );
    }
    
    /**
     * @dataProvider permissionValues
     */
    public function testFilesPermissions($permissionNumber, $permissionString)
    {
        $splFileInfoMock = $this->getMock('SplFileInfo', array('getPerms'), NULL, '', NULL);
        $splFileInfoMock->expects($this->once())
                        ->method('getPerms')
                        ->will($this->returnValue($permissionNumber)); // 16895
                        
        $permissionReader = new PermissionReader($splFileInfoMock);
        $this->assertEquals($permissionString, $permissionReader->__toString());
    }
    
    /**
     * @expectedException InvalidArgumentException
     */
    public function testPermissionReaderThrowsExceptionOnNoArgument()
    {
        $permissionReader = new PermissionReader();
    }
    
    /**
     * @expectedException InvalidArgumentException
     */
    public function testPermissionReaderThrowsExceptionOnInvalidArgumentType()
    {
        $permissionReader = new PermissionReader('string');
    }
}