<?php

namespace Issues;

use PHPUnit\Framework\TestCase;

class Issue1257Test extends TestCase
{

	public function testHeaderByName()
	{
		$mpdf = new \Mpdf\Mpdf();

		$mpdf->DefHeaderByName('header', [
			'L' => [],
			'C' => [
				'content' => '{PAGENO}',
				'font-style' => 'B',
				'font-size' => 13
			],
			'R' => [],
		]);

		$html = '
			<style>
				@page {
					header: header;
				}
			</style>
		';

		$mpdf->WriteHTML($html);

		$output = $mpdf->output('', 'S');
		$this->assertStringStartsWith('%PDF-', $output);
	}

}
