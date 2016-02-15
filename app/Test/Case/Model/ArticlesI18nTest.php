<?php
App::uses('ArticlesI18n', 'Model');

/**
 * ArticlesI18n Test Case
 */
class ArticlesI18nTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.articles_i18n'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ArticlesI18n = ClassRegistry::init('ArticlesI18n');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ArticlesI18n);

		parent::tearDown();
	}

}
