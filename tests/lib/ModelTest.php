<?php
/**
 * Unit tests for the Lib_Model class
 * 
 * @category    MVCLite
 * @package     Tests
 * @subpackage  Model
 * @since       File available since release 1.0.6
 * @author      Cory Collier <corycollier@corycollier.com>
 */
/**
 * Unit tests for the Lib_Model class
 * 
 * @category    MVCLite
 * @package     Tests
 * @subpackage  Model
 * @since       Class available since release 1.0.6
 * @author      Cory Collier <corycollier@corycollier.com>
 */

class Tests_Lib_ModelTest
extends PHPUnit_Framework_TestCase
{
    
    /**
     * The setup method, called before each test
     */
    public function setUp ( )
    {
        $this->fixture = new Lib_Model_Test;
        
    } // END function setup
    
    /**
     * The tear down hook, called after each test
     */
    public function tearDown ( )
    {
        
    } // END function tearDown

    /**
     * tests the constructor of the library model class
     *
     * @param array|null $data
     * @dataProvider provide___construct
     */
    public function test___construct ($data)
    {
        $this->fixture = new Lib_Model_Test;

        $property = new ReflectionProperty('Lib_Model', '_database');
        $property->setAccessible(true);
        $result = $property->getValue($this->fixture);

        $this->assertInstanceOf('Lib_Database', $result);

        $property = new ReflectionProperty('Lib_Model', '_data');
        $property->setAccessible(true);
        $result = $property->getValue($this->fixture);

        $this->assertTrue(is_array($result));
        
    } // END function test___construct

    /**
     * Provides data to use for testing the lib model's constructor
     *
     * @return array
     */
    public function provide___construct ( )
    {
        return array(
            'empty' => array(null),
            'empty array'   => array(array()),
            'object'        => array(new stdClass),
        );
        
    } // END function provide___construct

    /**
     * method to test the magic method __toString for the lib model
     *
     * @param Lib_Model $model
     * @dataProvider provide___toString
     */
    public function test___toString ($model)
    {
        $this->assertEquals($model->__toString(), get_class($model));
        
    } // END function test___toString

    /**
     * Provides data to use for testing the lib model's toString method
     *
     * @return array
     */
    public function provide___toString ( )
    {
        return array(
            array(new Lib_Model_Test),
        );
        
    } // END function provide___toString

    /**
     * Test the lib model's ability to determine if it's loaded or not
     *
     * @param array $data
     * @param boolean $expected
     * @dataProvider provide_isLoaded
     */
    public function test_isLoaded ($data, $expected = true)
    {
        $property = new ReflectionProperty('Lib_Model_Test', '_data');
        $property->setAccessible(true);
        $property->setValue($this->fixture, $data);

        $this->assertSame($expected, $this->fixture->isLoaded());
        
    } // END function test_isLoaded

    /**
     * provides data to use for testing the model's ability to notify if it is 
     * loaded with data
     *
     * @return array
     */
    public function provide_isLoaded ( )
    {
        return array(
            array(null          , false),
            array(false         , false),
            array(''            , false),
            array(new stdClass  , false),
            array(array()       , false),
            array(range(0,1)    , true),
        );
        
    } // END function provide_isLoaded

    /**
     * tests the model's _filterParams method
     * 
     * @param array $fields
     * @param array $params
     * @dataProvider provide__filterParams
     */
    public function test__filterParams ($fields, $params)
    {
        $property = new ReflectionProperty('Lib_Model_Test', '_fields');
        $property->setAccessible(true);
        $property->setValue($this->fixture, $fields);

        $method = new ReflectionMethod('Lib_Model_Test', '_filterParams');
        $method->setAccessible(true);
        $result = $method->invoke($this->fixture, $params);

        $this->assertEquals(array_intersect_key($params, $fields), $result);
        
    } // END function test__filterParams

    /**
     * provides data to use for testing the model's ability to filter params
     *
     * @return array
     */
    public function provide__filterParams ( )
    {
        return array(
            array(
                array(
                    'id'    => array(),
                    'name'  => array(),
                    'desc'  => array(),
                ),
                array(
                    'id'            => 1,
                    'controller'    => 'test-controller',
                    'action'        => 'test-action'
                ),
            ),
        );
    }

    /**
     * tests the model's rewind method
     */
    public function test_rewind ( )
    {
        $this->fixture->rewind();

        $property = new ReflectionProperty('Lib_Model_Test', '_cursor');
        $property->setAccessible(true);
        $result = $property->getValue($this->fixture);


        $this->assertSame(0, $result);

    } // END function test_rewind

    /**
     * method to test the model's ability to shift it's cursor to the next place
     */
    public function test_next ( )
    {
        $property = new ReflectionProperty('Lib_Model_Test', '_cursor');
        $property->setAccessible(true);
        $originalValue = $property->getValue($this->fixture);

        $this->fixture->next();

        $nextValue = $property->getValue($this->fixture);

        $this->assertTrue(($originalValue + 1) == $nextValue);
        
    } // END function test_text

    /**
     * tests the model's ability to return the key of it's iteration index
     */
    public function test_key ( )
    {
        $property = new ReflectionProperty('Lib_Model_Test', '_cursor');
        $property->setAccessible(true);
        $result = $property->getValue($this->fixture);

        $this->assertSame($result, $this->fixture->key());
        
    } // END function test_key

    /**
     * Test the creation of data using the model's create method
     */
    public function test_create ( )
    {
        $this->markTestIncomplete(
            "Test not yet implemented. Model functionality still forthcoming"
        );
        
    } // END function test_create

    /**
     * Test the updating of data using the model's update method
     */
    public function test_update ( )
    {
        $this->markTestIncomplete(
            "Test not yet implemented. Model functionality still forthcoming"
        );
        
    } // END function test_update
    
    /**
     * Test the deletion of data using the model's delete method
     */
    public function test_delete ( )
    {
        $this->markTestIncomplete(
            "Test not yet implemented. Model functionality still forthcoming"
        );
        
    } // END function test_delete

} // END class ModelTest

class Lib_Model_Test
extends Lib_Model { }
