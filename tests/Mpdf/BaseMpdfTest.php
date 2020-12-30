<?php

namespace Mpdf;

use Mpdf\Mpdf;
use PHPUnit\Framework\TestCase;

abstract class BaseMpdfTest extends TestCase
{

	/**
	 * @var \Mpdf\Mpdf
	 */
	protected $mpdf;

	protected function setUp(): void
	{
		parent::setUp();

		$this->mpdf = new Mpdf(['mode' => 'c']);
	}

	protected function tearDown(): void
	{
		parent::tearDown();

		$this->mpdf->cleanup();
	}

}
