<?php

require_once './AbstractModel.php';

/**
 * Extend the abstract class for testing.
 */
class Document extends AbstractModel {
    
    protected $_fields = array(
        'title',
        'authors'
    );

}

/**
 * PHPUnit test case.
 */
class AbstractModelTest extends PHPUnit_Framework_TestCase {

    /**
     * @test
     * @dataProvider createModelInvalidPropertyDataProvider
     * @expectedException PropertyNotFoundException
     */
    public function createNewModelInvalidPropertyTest ($data) {
        $doc = new Document($data);
    }

    /**
     * @test
     * @dataProvider createModelDataProvider
     */
    public function createNewModelTest ($data) {
        $doc = new Document($data);
        $this->assertInstanceOf('Document', $doc);
        $this->assertInstanceOf('AbstractModel', $doc);
    }

    /**
     * Data provider for the create model test.
     */
    public function createModelDataProvider () {
        return array(
            array(array('title'=>'Another test?', 'authors'=>array('me', 'someone else')))
        );
    }

    /**
     * Data provider for the create model test exception.
     */
    public static function createModelInvalidPropertyDataProvider () {
        return array(
            array(array('title'=>'Another test?', 'bogus'=>'blah'))
        );
    }

    /**
     * Data provider for the get title test.
     */
    public static function getTitleTestDataProvider () {
        return array(
            array(array('title'=>'Test document', 'authors'=>array('me')), 'Test document'),
            array(array('title'=>'Another test?', 'authors'=>array('me', 'someone else')), 'Another test?'),
            array(array('title'=>'Testing: some test', 'authors'=>array('A man')), 'Testing: some test'),
            array(array('title'=>'Testing!', 'authors'=>array('Another man')), 'Testing!'), 
        );
    }

    /**
     * Data provider for the set title test.
     */
    public static function setTitleTestDataProvider () {
        return array(
            array('Dormouse survey'),
            array('Gentle zoo giant rescues baby bird')
        );
    }

    /**
     * @dataProvider getTitleTestDataProvider
     */
    public function testGetTitle ($data, $title) {
        $doc = new Document($data);
        $this->assertEquals($title, $doc->title);
    }

    /**
     * Also testing the magic __get here.
     * @dataProvider setTitleTestDataProvider 
     */
    public function testSetTitle ($title) {
        $doc = new Document();
        $doc->title = $title;
        $this->assertEquals($title, $doc->title);
    }

}
