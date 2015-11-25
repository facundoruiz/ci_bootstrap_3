<?PHP

namespace Mailgun\Messages;

<<<<<<< HEAD
use Mailgun\Constants\Api;
use Mailgun\Constants\ExceptionMessages;
use Mailgun\Messages\Exceptions\TooManyParameters;
use Mailgun\Messages\Exceptions\MissingRequiredMIMEParameters;

/**
 * This class is used for batch sending. See the official documentation (link below)
 * for usage instructions.
 *
 * @link https://github.com/mailgun/mailgun-php/blob/master/src/Mailgun/Messages/README.md
 */
class BatchMessage extends MessageBuilder{

    /**
     * @var array
     */
	private $batchRecipientAttributes;

    /**
     * @var boolean
     */
	private $autoSend;

    /**
     * @var \Mailgun\Connection\RestClient
     */
	private $restClient;

    /**
     * @var string
     */
	private $workingDomain;

    /**
     * @var array
     */
	private $messageIds = array();

    /**
     * @param \Mailgun\Connection\RestClient $restClient
     * @param string $workingDomain
     * @param boolean $autoSend
     */
=======
use Mailgun\Messages\MessageBuilder;
use Mailgun\Messages\Exceptions\TooManyParameters;
use Mailgun\Messages\Exceptions\MissingRequiredMIMEParameters;

/*
   This class is used for batch sending. See the official documentation
   for usage instructions.
*/

class BatchMessage extends MessageBuilder{

	private $batchRecipientAttributes;
	private $autoSend;
	private $restClient;
	private $workingDomain;
	private $messageIds = array();

>>>>>>> Merge remote-tracking branch 'refs/remotes/waifung0207/master'
	public function __construct($restClient, $workingDomain, $autoSend){
		$this->batchRecipientAttributes = array();
		$this->autoSend = $autoSend;
		$this->restClient = $restClient;
		$this->workingDomain = $workingDomain;
		$this->endpointUrl = $workingDomain . "/messages";
	}

<<<<<<< HEAD
    /**
     * @param string $headerName
     * @param string $address
     * @param array $variables
     * @throws MissingRequiredMIMEParameters
     * @throws TooManyParameters
     */
	protected function addRecipient($headerName, $address, $variables){
		if(array_key_exists($headerName, $this->counters['recipients'])){
			if($this->counters['recipients'][$headerName] == Api::RECIPIENT_COUNT_LIMIT){
				if($this->autoSend == false){
					throw new TooManyParameters(ExceptionMessages::TOO_MANY_RECIPIENTS);
=======
	protected function addRecipient($headerName, $address, $variables){
		if(array_key_exists($headerName, $this->counters['recipients'])){
			if($this->counters['recipients'][$headerName] == RECIPIENT_COUNT_LIMIT){
				if($this->autoSend == false){
					throw new TooManyParameters(TOO_MANY_RECIPIENTS);
>>>>>>> Merge remote-tracking branch 'refs/remotes/waifung0207/master'
				}
				$this->sendMessage();
			}
		}

		$compiledAddress = $this->parseAddress($address, $variables);

		if(isset($this->message[$headerName])){
			array_push($this->message[$headerName], $compiledAddress);
		}
		elseif($headerName == "h:reply-to"){
			$this->message[$headerName] = $compiledAddress;
		}
		else{
			$this->message[$headerName] = array($compiledAddress);
		}

		if(array_key_exists($headerName, $this->counters['recipients'])){
			$this->counters['recipients'][$headerName] += 1;
			if(!array_key_exists("id", $variables)){
				$variables['id'] = $this->counters['recipients'][$headerName];
			}
		}
		$this->batchRecipientAttributes["$address"] = $variables;
	}

<<<<<<< HEAD
    /**
     * @param array $message
     * @param array $files
     * @throws MissingRequiredMIMEParameters
     */
=======
>>>>>>> Merge remote-tracking branch 'refs/remotes/waifung0207/master'
	public function sendMessage($message = array(), $files = array()){
		if(count($message) < 1){
			$message = $this->message;
			$files = $this->files;
		}
		if(!array_key_exists("from", $message)){
<<<<<<< HEAD
			throw new MissingRequiredMIMEParameters(ExceptionMessages::EXCEPTION_MISSING_REQUIRED_MIME_PARAMETERS);
		}
		elseif(!array_key_exists("to", $message)){
			throw new MissingRequiredMIMEParameters(ExceptionMessages::EXCEPTION_MISSING_REQUIRED_MIME_PARAMETERS);
		}
		elseif(!array_key_exists("subject", $message)){
			throw new MissingRequiredMIMEParameters(ExceptionMessages::EXCEPTION_MISSING_REQUIRED_MIME_PARAMETERS);
		}
		elseif((!array_key_exists("text", $message) && !array_key_exists("html", $message))){
			throw new MissingRequiredMIMEParameters(ExceptionMessages::EXCEPTION_MISSING_REQUIRED_MIME_PARAMETERS);
=======
			throw new MissingRequiredMIMEParameters(EXCEPTION_MISSING_REQUIRED_MIME_PARAMETERS);
		}
		elseif(!array_key_exists("to", $message)){
			throw new MissingRequiredMIMEParameters(EXCEPTION_MISSING_REQUIRED_MIME_PARAMETERS);
		}
		elseif(!array_key_exists("subject", $message)){
			throw new MissingRequiredMIMEParameters(EXCEPTION_MISSING_REQUIRED_MIME_PARAMETERS);
		}
		elseif((!array_key_exists("text", $message) && !array_key_exists("html", $message))){
			throw new MissingRequiredMIMEParameters(EXCEPTION_MISSING_REQUIRED_MIME_PARAMETERS);
>>>>>>> Merge remote-tracking branch 'refs/remotes/waifung0207/master'
		}
		else{
			$message["recipient-variables"] = json_encode($this->batchRecipientAttributes);
			$response = $this->restClient->post($this->endpointUrl, $message, $files);
			$this->batchRecipientAttributes = array();
			$this->counters['recipients']['to'] = 0;
			$this->counters['recipients']['cc'] = 0;
			$this->counters['recipients']['bcc'] = 0;
			unset($this->message["to"]);
			array_push($this->messageIds, $response->http_response_body->id);
		}
	}

<<<<<<< HEAD
    /**
     * @throws MissingRequiredMIMEParameters
     */
	public function finalize(){
		$this->sendMessage();
	}

    /**
     * @return string[]
     */
=======
	public function finalize(){
		return $this->sendMessage();
	}

>>>>>>> Merge remote-tracking branch 'refs/remotes/waifung0207/master'
	public function getMessageIds(){
		return $this->messageIds;
	}
}
