<?php
namespace Mailgun\Tests\Mock\Connection;

<<<<<<< HEAD
use Mailgun\Connection\Exceptions\GenericHTTPError;
use Mailgun\Connection\Exceptions\InvalidCredentials;
use Mailgun\Connection\Exceptions\MissingEndpoint;
use Mailgun\Connection\RestClient;
use Mailgun\Messages\Exceptions\MissingRequiredMIMEParameters;
=======
use Mailgun\Connection\RestClient;
>>>>>>> Merge remote-tracking branch 'refs/remotes/waifung0207/master'

class TestBroker extends RestClient
{
    private $apiKey;

    protected $apiEndpoint;

<<<<<<< HEAD
    public function __construct($apiKey = null, $apiEndpoint = "api.mailgun.net", $apiVersion = "v3")
=======
    public function __construct($apiKey = null, $apiEndpoint = "api.mailgun.net", $apiVersion = "v2")
>>>>>>> Merge remote-tracking branch 'refs/remotes/waifung0207/master'
    {
        $this->apiKey      = $apiKey;
        $this->apiEndpoint = $apiEndpoint;
    }

    public function post($endpointUrl, $postData = array(), $files = array())
    {
<<<<<<< HEAD
        return $this->testResponseHandler($endpointUrl, $httpResponseCode = 200);
=======
        return $this->responseHandler($endpointUrl, $httpResponseCode = 200);
>>>>>>> Merge remote-tracking branch 'refs/remotes/waifung0207/master'
    }

    public function get($endpointUrl, $queryString = array())
    {
<<<<<<< HEAD
        return $this->testResponseHandler($endpointUrl, $httpResponseCode = 200);
=======
        return $this->responseHandler($endpointUrl, $httpResponseCode = 200);
>>>>>>> Merge remote-tracking branch 'refs/remotes/waifung0207/master'
    }

    public function delete($endpointUrl)
    {
<<<<<<< HEAD
        return $this->testResponseHandler($endpointUrl, $httpResponseCode = 200);
=======
        return $this->responseHandler($endpointUrl, $httpResponseCode = 200);
>>>>>>> Merge remote-tracking branch 'refs/remotes/waifung0207/master'
    }

    public function put($endpointUrl, $queryString)
    {
<<<<<<< HEAD
        return $this->testResponseHandler($endpointUrl, $httpResponseCode = 200);
    }

    public function testResponseHandler($endpointUrl, $httpResponseCode = 200)
=======
        return $this->responseHandler($endpointUrl, $httpResponseCode = 200);
    }

    public function responseHandler($endpointUrl, $httpResponseCode = 200)
>>>>>>> Merge remote-tracking branch 'refs/remotes/waifung0207/master'
    {
        if ($httpResponseCode === 200) {
            $result                     = new \stdClass();
            $result->http_response_body = new \stdClass();
            $jsonResponseData           = json_decode('{"message": "Some JSON Response Data", "id": "1234"}');
            foreach ($jsonResponseData as $key => $value) {
                $result->http_response_body->$key = $value;
            }
<<<<<<< HEAD
        } elseif ($httpResponseCode == 400) {
            throw new MissingRequiredMIMEParameters(EXCEPTION_MISSING_REQUIRED_MIME_PARAMETERS);
        } elseif ($httpResponseCode == 401) {
            throw new InvalidCredentials(EXCEPTION_INVALID_CREDENTIALS);
        } elseif ($httpResponseCode == 401) {
            throw new GenericHTTPError(EXCEPTION_INVALID_CREDENTIALS);
        } elseif ($httpResponseCode == 404) {
=======
        } elseif ($httpStatusCode == 400) {
            throw new MissingRequiredMIMEParameters(EXCEPTION_MISSING_REQUIRED_MIME_PARAMETERS);
        } elseif ($httpStatusCode == 401) {
            throw new InvalidCredentials(EXCEPTION_INVALID_CREDENTIALS);
        } elseif ($httpStatusCode == 401) {
            throw new GenericHTTPError(EXCEPTION_INVALID_CREDENTIALS);
        } elseif ($httpStatusCode == 404) {
>>>>>>> Merge remote-tracking branch 'refs/remotes/waifung0207/master'
            throw new MissingEndpoint(EXCEPTION_MISSING_ENDPOINT);
        } else {
            throw new GenericHTTPError(EXCEPTION_GENERIC_HTTP_ERROR);

            return false;
        }
        $result->http_response_code = $httpResponseCode;
        $result->http_endpoint_url  = $endpointUrl;

        return $result;
    }


}
