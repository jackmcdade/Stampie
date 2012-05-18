<?php

namespace Stampie\Tests\GitHub;

use Stampie\Adapter\Response;
use Stampie\Mailer\Postmark;

/**
 * @author Henrik Bjornskov <henrik@bjrnskov.dk>
 */
class Issue4Test extends \PHPUnit_Framework_TestCase
{
    public function testMissingErrorMessageInResponse()
    {
        $response = new Response(422, '{}');
        $mailer = new Postmark($this->getMock('Stampie\Adapter\AdapterInterface'), 'ServerToken');

        $this->setExpectedException('Stampie\Exception\ApiException', 'Unprocessable Entity');

        $mailer->handle($response);
    }
}
