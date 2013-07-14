<?php
class ExifTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \PHPExif\Exif
     */
    protected $exif;

    public function setUp()
    {
        $this->reader   = \PHPExif\Reader::factory(\PHPExif\Reader::TYPE_NATIVE);
        $file           = PHPEXIF_TEST_ROOT . '/files/morning_glory_pool_500.jpg';
        $this->exif     = $this->reader->getExifFromFile($file);
    }

    /**
     * @group exif
     */
    public function testGetRawData()
    {
        $reflProperty = new \ReflectionProperty('\PHPExif\Exif', 'data');
        $reflProperty->setAccessible(true);

        $this->assertEquals($reflProperty->getValue($this->exif), $this->exif->getRawData());
    }

    /**
     * @group exif
     */
    public function testSetRawData()
    {
        $testData = array('foo', 'bar', 'baz');
        $reflProperty = new \ReflectionProperty('\PHPExif\Exif', 'data');
        $reflProperty->setAccessible(true);

        $result = $this->exif->setRawData($testData);

        $this->assertEquals($testData, $reflProperty->getValue($this->exif));
        $this->assertEquals($this->exif, $result);
    }

    /**
     * @group exif
     */
    public function testGetAperture()
    {
        $expected = 'f/8.0';
        $this->assertEquals($expected, $this->exif->getAperture());
    }

    /**
     * @group exif
     */
    public function testGetIso()
    {
        $expected = 200;
        $this->assertEquals($expected, $this->exif->getIso());
    }

    /**
     * @group exif
     */
    public function testGetExposure()
    {
        $expected = '1/320';
        $this->assertEquals($expected, $this->exif->getExposure());
    }

    /**
     * @group exif
     */
    public function testGetExposureMilliseconds()
    {
        $expected = 1/320;
        $this->assertEquals($expected, $this->exif->getExposureMilliseconds());
    }

    /**
     * @group exif
     */
    public function testGetFocusDistance()
    {
        $expected = '7.94m';
        $this->assertEquals($expected, $this->exif->getFocusDistance());
    }

    /**
     * @group exif
     */
    public function testGetWidth()
    {
        $expected = 500;
        $this->assertEquals($expected, $this->exif->getWidth());
    }

    /**
     * @group exif
     */
    public function testGetHeight()
    {
        $expected = 332;
        $this->assertEquals($expected, $this->exif->getHeight());
    }

    /**
     * @group exif
     */
    public function testGetTitle()
    {
        $expected = 'Morning Glory Pool';
        $this->assertEquals($expected, $this->exif->getTitle());
    }

    /**
     * @group exif
     */
    public function testGetCaption()
    {
        $expected = false;
        $this->assertEquals($expected, $this->exif->getCaption());
    }

    /**
     * @group exif
     */
    public function testGetCopyright()
    {
        $expected = false;
        $this->assertEquals($expected, $this->exif->getCopyright());
    }

    /**
     * @group exif
     */
    public function testGetKeywords()
    {
        $expected = array('18-200', 'D90', 'USA', 'Wyoming', 'Yellowstone');
        $this->assertEquals($expected, $this->exif->getKeywords());
    }

    /**
     * @group exif
     */
    public function testGetCamera()
    {
        $expected = 'NIKON D90';
        $this->assertEquals($expected, $this->exif->getCamera());
    }

    /**
     * @group exif
     */
    public function testGetHorizontalResolution()
    {
        $expected = 240;
        $this->assertEquals($expected, $this->exif->getHorizontalResolution());
    }

    /**
     * @group exif
     */
    public function testGetVerticalResolution()
    {
        $expected = 240;
        $this->assertEquals($expected, $this->exif->getVerticalResolution());
    }

    /**
     * @group exif
     */
    public function testGetSoftware()
    {
        $expected = 'Adobe Photoshop Lightroom';
        $this->assertEquals($expected, $this->exif->getSoftware());
    }

    /**
     * @group exif
     */
    public function testGetFocalLength()
    {
        $expected = 18;
        $this->assertEquals($expected, $this->exif->getFocalLength());
    }

    /**
     * @group exif
     */
    public function testGetCreationDate()
    {
        $expected = '2011-06-07 20:01:50';
        $this->assertInstanceOf('DateTime', $this->exif->getCreationDate());
        $this->assertEquals($expected, $this->exif->getCreationDate()->format('Y-m-d H:i:s'));
    }
}