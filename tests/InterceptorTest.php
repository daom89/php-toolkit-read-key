<?php
namespace Zenithies\Toolkit\ReadKey;

use PHPUnit\Framework\TestCase;

class InterceptorTest extends TestCase
{
    public function testInitOnWindows()
    {
        $interceptor = Interceptor::I();
        $result = $interceptor->init();
        if (Interceptor::isWindows()) {
            $this->assertTrue($result);
        } else {
            $this->assertFalse($result);
        }
    }

    public function testInitOnNonWindows()
    {
        $interceptor = Interceptor::I();
        $result = $interceptor->init();
        if (!Interceptor::isWindows()) {
            $this->assertTrue($result);
        } else {
            $this->assertFalse($result);
        }
    }

    public function testIntercept()
    {
        $interceptor = Interceptor::I();
        $result = $interceptor->intercept();
        $this->assertIsInt($result);
    }

    public function testIsWindows()
    {
        $result = Interceptor::isWindows();
        $this->assertIsBool($result);
    }

    public function testIsCLI()
    {
        $result = Interceptor::isCLI();
        $this->assertIsBool($result);
    }

    public function testEprintln()
    {
        $value = 'Test message';
        ob_start();
        Interceptor::eprintln($value);
        $output = ob_get_clean();
        $this->expectOutputString($value . PHP_EOL);
        $this->assertEquals($value . PHP_EOL, $output);
    }
}
