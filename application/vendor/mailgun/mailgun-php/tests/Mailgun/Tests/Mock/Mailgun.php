<?PHP

namespace Mailgun\Tests\Mock;

use Mailgun\Mailgun as Base;
use Mailgun\Tests\Mock\Connection\TestBroker;

class Mailgun extends Base
{
    protected $debug;
    protected $restClient;

<<<<<<< HEAD
    public function __construct($apiKey = null, $apiEndpoint = "api.mailgun.net", $apiVersion = "v3")
=======
    public function __construct($apiKey = null, $apiEndpoint = "api.mailgun.net", $apiVersion = "v2")
>>>>>>> Merge remote-tracking branch 'refs/remotes/waifung0207/master'
    {
        $this->restClient = new TestBroker($apiKey, $apiEndpoint, $apiVersion);
    }
}
