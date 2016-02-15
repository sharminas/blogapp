<?php
App::uses('I18n', 'Model');

/**
 * I18n Test Case
 */
class I18nTest extends CakeTestCase {

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->I18n = ClassRegistry::init('I18n');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->I18n);

		parent::tearDown();
	}

}
