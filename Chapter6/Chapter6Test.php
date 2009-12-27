<?php

require_once 'PHPUnit/Framework/TestCase.php';

/**
 *  6.1 Refactor the tests you have written in the previous parts to 
 *  eliminate duplication, introducing creation methods and ensuring the 
 *  four/three phases of  tests are identifiable.
 *  
 *  6.2 Use the Pdo Sqlite driver to implement Table Truncation TearDown 
 *  for a small test database (one table will suffice). You should use the 
 *  tearDown() method to empty the table.
 */
class Chapter6Test extends PHPUnit_Framework_TestCase
{
    protected $_cursor;

    public function __construct()
    {
        $this->_cursor = new PDO('sqlite::memory');
        
        $this->_cursor->exec("CREATE TABLE users (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        username VARCHAR( 50 ) NOT NULL)");
    }
    
    public function testDataInsert()
    {
        $this->_cursor->exec("INSERT INTO users (username) VALUES ('user 1')");
        $this->_cursor->exec("INSERT INTO users (username) VALUES ('user 2')");
        $this->_cursor->exec("INSERT INTO users (username) VALUES ('user 3')");
        
        $result = $this->_cursor->query("SELECT COUNT(id) FROM users")->fetch();
        
        $this->assertEquals(3, $result[0]);
    }
    
    public function testTableIsEmptyAfterInsertAndTearDown()
    {
        $result = $this->_cursor->query("SELECT COUNT(id) FROM users")->fetch();
        
        $this->assertEquals(0, $result[0]);
    }
    
    public function tearDown()
    {
        $this->_cursor->exec("DELETE FROM users");
    }
}
