<?php

use Naneau\SemVer\Parser;

use \PHPUnit_Framework_TestCase as TestCase;

/**
 * ParseTest
 *
 * Testing the parsers
 *
 * @category      Naneau
 * @package       SemVer
 * @subpackage    Tests
 **/
class ToStringTest extends TestCase
{
    /**
     * Test parsing of versionable X.Y.Z
     *
     * @return void
     **/
    public function testCleanedString()
    {
        $version = Parser::parse('0.1.1-rc.1');

        $this->assertEquals('0.1.1-rc.1', (string)$version);

        $version->setMajor(3);
        $this->assertEquals('3.1.1-rc.1', (string)$version);

        $version->setMinor(3);
        $this->assertEquals('3.3.1-rc.1', (string)$version);

        $version->setPatch(3);
        $this->assertEquals('3.3.3-rc.1', (string)$version);

        $version->setPreRelease($version->getPreRelease()->setReleaseNumber(3));
        $this->assertEquals('3.3.3-rc.3', (string)$version);

        $version->setPreRelease($version->getPreRelease()->setGreek('beta'));
        $this->assertEquals('3.3.3-beta.3', (string)$version);

    }

}
