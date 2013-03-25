<?php
namespace Kite\OhMyEmma\Interfaces;

use mocks\RequestMock as RequestMock;

/**
 * Generated by PHPUnit_SkeletonGenerator 1.2.0 on 2013-03-24 at 21:16:21.
 */
class FieldsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Fields
     */
    protected $fields;
    protected $request;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->request = new RequestMock();
        $this->assertEquals('', $this->request->baseURL);

        $this->fields = new Fields($this->request);
        $this->assertObjectHasAttribute('_request', $this->fields);
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     * @covers Kite\OhMyEmma\Interfaces\Fields::getField
     */
    public function testGetField()
    {
        $this->request = new RequestMock();
        $this->fields = new Fields($this->request);

        // Testing get all fields
        $this->assertEquals(
            '/fields', 
            $this->fields->getField()
        );
        // Testing get field by id
        $this->assertEquals(
            '/fields/200', 
            $this->fields->getField('200')
        );
        // Testing delete with id
        $this->assertEquals(
            '/fields/200?deleted=true', 
            $this->fields->getField('200', true)
        );
        // Testing delete with no id
        $this->assertEquals(
            '/fields?deleted=true', 
            $this->fields->getField('', true)
        );
    }

    /**
     * @covers Kite\OhMyEmma\Interfaces\Fields::addUpdateField
     */
    public function testAddUpdateField()
    {
        $this->request = new RequestMock();
        $this->fields = new Fields($this->request);

        $fieldData = array(
            "data1" => "200",
            "data2" => "300"
        );
        // Testing batch updating
        $this->assertEquals(
            '/fields?data1=200&data2=300', 
            $this->fields->addUpdateField($fieldData)
        );
        // Testing single update
        $this->assertEquals(
            '/fields/fieldId?data1=200&data2=300', 
            $this->fields->addUpdateField($fieldData, 'fieldId')
        );
    }

    /**
     * @covers Kite\OhMyEmma\Interfaces\Fields::removeField
     */
    public function testRemoveField()
    {
        $this->request = new RequestMock();
        $this->fields = new Fields($this->request);

        // Testing deleting field
        $this->assertEquals(
            '/fields/fieldId',
            $this->fields->removeField('fieldId')
        );
    }

    /**
     * @covers Kite\OhMyEmma\Interfaces\Fields::clearMemberData
     */
    public function testClearMemberData()
    {
        $this->request = new RequestMock();
        $this->fields = new Fields($this->request);

        // Testing deleting field
        $this->assertEquals(
            '/fields/fieldId',
            $this->fields->clearMemberData('fieldId')
        );
    }
}
