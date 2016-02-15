<?php
App::uses('ArticleI18n', 'Model');

/**
 * ArticleI18n Test Case
 */
class ArticleI18nTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.article_i18n'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ArticleI18n = ClassRegistry::init('ArticleI18n');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ArticleI18n);

		parent::tearDown();
	}

}
