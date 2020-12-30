<?php

namespace Issues;

use PHPUnit\Framework\TestCase;

class Issue1197Test extends TestCase
{

	public function testDontThrowUninitializedStringOffsetException()
	{
		$mpdf = new \Mpdf\Mpdf();

		$mpdf->setCSS(['FONT-SIZE' => ''], 'INLINE');
	}
}
