<?php

namespace Issues;

use PHPUnit\Framework\TestCase;

class Issue1194Test extends TestCase
{

	public function testHandelUnknownTextAlign()
	{
		$mpdf = new \Mpdf\Mpdf();

		$mpdf->WriteHTML('<table><tbody><tr><td style="text-align: inherit">foo</td></tr></tbody></table>');
	}

}
