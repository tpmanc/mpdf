<?php

namespace Mpdf\Pdf\Protection;

use PHPUnit\Framework\TestCase;

class UniqidGeneratorTest extends TestCase
{

	public function testGenerate()
	{
		$generator = new UniqidGenerator();
		$this->assertNotEquals(
			$generator->generate(),
			$generator->generate()
		);
	}

}
