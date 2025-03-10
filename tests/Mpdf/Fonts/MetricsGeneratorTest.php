<?php

namespace Mpdf\Fonts;

use Mockery;
use PHPUnit\Framework\TestCase;

class MetricsGeneratorTest extends TestCase
{

	/**
	 * @var \Mpdf\Fonts\MetricsGenerator
	 */
	private $generator;

	/**
	 * @var \Mpdf\Fonts\FontCache
	 */
	private $fontCache;

	protected function setUp(): void
	{
		parent::setUp();

		$this->fontCache = Mockery::mock(FontCache::class);
		$this->generator = new MetricsGenerator($this->fontCache, 'win');
	}

	protected function tearDown(): void
	{
		parent::tearDown();

		Mockery::close();
	}

	public function testGenerateMetrics()
	{
		$this->fontCache->shouldReceive('jsonWrite')->with('angerthas.mtx.json', Mockery::any())->once();
		$this->fontCache->shouldReceive('binaryWrite')->with('angerthas.cw.dat', Mockery::any())->once();
		$this->fontCache->shouldReceive('binaryWrite')->with('angerthas.gid.dat', Mockery::any())->once();

		$this->fontCache->shouldReceive('has')->times(3)->andReturn(true);
		$this->fontCache->shouldReceive('remove')->times(3);

		$this->fontCache->shouldReceive('jsonHas')->times(1)->andReturn(true);
		$this->fontCache->shouldReceive('jsonRemove')->times(1);

		$file = __DIR__ . '/../../data/ttf/angerthas.ttf';
		$this->generator->generateMetrics($file, stat($file), 'angerthas', 0, false, false, false, false);
	}


}
