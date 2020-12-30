<?php

namespace Issues;

use PHPUnit\Framework\TestCase;

class Issue736Test extends TestCase
{

	public function testNoNoticeWithUnicodeCharacterAndFontSubDisabled()
	{
		$mpdf = new \Mpdf\Mpdf();
		$mpdf->WriteHTML('&#66352;');

		$output = $mpdf->output('', 'S');
		$this->assertStringStartsWith('%PDF-', $output);
	}

}
