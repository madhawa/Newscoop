<?php
// Call CampURITest::main() if this source file is executed directly.
if (!defined("PHPUnit_MAIN_METHOD")) {
    define("PHPUnit_MAIN_METHOD", "CampURITest::main");
}

require_once('PHPUnit/Framework/TestCase.php');
require_once('PHPUnit/Framework/TestSuite.php');

require_once('template_engine/classes/CampURI.php');

require_once('set_path.php');

/**
 * Class wrapper for CampURI as it is abstract class.
 */
class CampURIWrapper extends CampURI
{
    public function __construct($p_uri = null)
    {
        parent::__construct($p_uri);
    }

    public function getURI($p_param = null) {}

    public function getURIPath($p_param = null) {}

    public function getURLParameters($p_param = null) {}

    public function getParameterName($p_paramKey) {}

    public function isRestrictedParameter($p_parameterName) {}

    /**
     * Wrapper method for the actual protected CampURI::QueryArrayToString() method
     */
    public static function QueryArrayToString(array $p_queryArray)
    {
        return CampURI::QueryArrayToString($p_queryArray);
    }
}

/**
 * Test class for CampURI.
 * Generated by PHPUnit_Util_Skeleton on 2007-08-01 at 12:24:00.
 */
class CampURITest extends PHPUnit_Framework_TestCase
{
    /**
     * Holds the URI object
     */
     private $m_uriObj = null;


    /**
     * Runs the test methods of this class.
     *
     * @access public
     * @static
     */
    public static function main()
    {
        require_once('PHPUnit/TextUI/TestRunner.php');

        $suite  = new PHPUnit_Framework_TestSuite('CampURITest');
        $result = PHPUnit_TextUI_TestRunner::run($suite);
    }

    /**
     * Sets up the fixture, for example, open a network connection.
     * This method is called before a test is executed.
     *
     * @access protected
     */
    protected function setUp()
   	{
        $uri = 'http://campsite.localhost.localdomain/look/article.tpl?IdPublication=1&IdLanguage=1&NrIssue=1&NrSection=40&NrArticle=43';
        $this->m_uriObj = new CampURIWrapper($uri);
    }

    /**
     * Tears down the fixture, for example, close a network connection.
     * This method is called after a test is executed.
     *
     * @access protected
     */
    protected function tearDown()
    {
    }

    public function testGetBase()
    {
        $this->assertEquals('http://campsite.localhost.localdomain', $this->m_uriObj->getBase());
    }

    public function testGetBasePath()
    {
        $this->assertEquals('http://campsite.localhost.localdomain/look/article.tpl', $this->m_uriObj->getBasePath());
    }

    public function testGetScheme()
    {
    	$this->assertEquals('http', $this->m_uriObj->getScheme());
    }

    public function testGetHost()
    {
        $this->assertEquals('campsite.localhost.localdomain', $this->m_uriObj->getHost());
    }

    public function testGetPort()
    {
        $this->assertEquals('', $this->m_uriObj->getPort());
    }

    public function testGetUser()
    {
        $this->assertEquals('', $this->m_uriObj->getUser());
    }

    public function testGetPassword()
    {
        $this->assertEquals('', $this->m_uriObj->getPassword());
    }

    public function testGetPath()
    {
        $this->assertEquals('/look/article.tpl', $this->m_uriObj->getPath());
    }

    public function testGetQuery()
    {
        $this->assertEquals('IdPublication=1&IdLanguage=1&NrIssue=1&NrSection=40&NrArticle=43', $this->m_uriObj->getQuery());
    }

    public function testIsSSL()
    {
        $this->assertEquals(false, $this->m_uriObj->isSSL());
    }

    public function testQueryArrayToString()
    {
        $queryArray = array('IdPublication' => 1,
                            'IdLanguage' => 1,
                            'NrIssue' => 1,
                            'NrSection' => 40,
                            'NrArticle' => 43);
        $toString = CampURIWrapper::QueryArrayToString($queryArray);
        $this->assertEquals('IdPublication=1&IdLanguage=1&NrIssue=1&NrSection=40&NrArticle=43', $toString);
    }

}

// Call CampURITest::main() if this source file is executed directly.
if (PHPUnit_MAIN_METHOD == "CampURITest::main") {
    CampURITest::main();
}
?>