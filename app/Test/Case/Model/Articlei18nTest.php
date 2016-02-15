<?php
App::uses('Articlei18n', 'Model');

/**
 * Articlei18n Test Case
 */
class Articlei18nTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.articlei18n'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Articlei18n = ClassRegistry::init('Articlei18n');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Articlei18n);

		parent::tearDown();
	}

}
