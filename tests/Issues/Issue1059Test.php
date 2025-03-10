<?php

namespace Issues;

use PHPUnit\Framework\TestCase;

class Issue1059Test extends TestCase
{

	public function testNoWarningNestedTables()
	{
		$html = <<<HTML
<html>
<head>
    <style>
        table {
            font-size: 20%
        }
    </style>
</style>
</head>
<body>
    <table>
        <tr>
            <td>
                <table>
                    <tr>
                        <td>Test</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
HTML;

		$pdf = new \Mpdf\Mpdf();
		$pdf->WriteHTML($html);
		$output = $pdf->Output('', 'S');

		$this->assertStringStartsWith('%PDF-', $output);
	}

}
