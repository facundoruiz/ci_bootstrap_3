<?PHP

namespace Mailgun\Lists;

use Mailgun\Messages\Exceptions\InvalidParameter;
use Mailgun\Messages\Exceptions\TooManyParameters;
use Mailgun\Messages\Expcetions\InvalidParameterType;

<<<<<<< HEAD
/**
 * This class is used for creating a unique hash for
 * mailing list subscription double-opt in requests.
 *
 * @link https://github.com/mailgun/mailgun-php/blob/master/src/Mailgun/Lists/README.md
 */
class OptInHandler{

    /**
     * @param string $mailingList
     * @param string $secretAppId
     * @param string $recipientAddress
     * @return string
     */
=======
/* 
   This class is used for creating a unique hash for 
   mailing list subscription double-opt in requests.
*/

class OptInHandler{

	function __construct(){
		
	}
	
>>>>>>> Merge remote-tracking branch 'refs/remotes/waifung0207/master'
	public function generateHash($mailingList, $secretAppId, $recipientAddress){
		$innerPayload = array('r' => $recipientAddress, 'l' => $mailingList);
		$encodedInnerPayload = base64_encode(json_encode($innerPayload));

		$innerHash = hash_hmac("sha1", $encodedInnerPayload, $secretAppId);
		$outerPayload = array('h' => $innerHash, 'p' => $encodedInnerPayload);

		return urlencode(base64_encode(json_encode($outerPayload)));
	}

<<<<<<< HEAD
    /**
     * @param string $secretAppId
     * @param string $uniqueHash
     * @return array|bool
     */
=======
>>>>>>> Merge remote-tracking branch 'refs/remotes/waifung0207/master'
	public function validateHash($secretAppId, $uniqueHash){
		$decodedOuterPayload = json_decode(base64_decode(urldecode($uniqueHash)), true);

		$decodedHash = $decodedOuterPayload['h'];
		$innerPayload = $decodedOuterPayload['p'];

		$decodedInnerPayload = json_decode(base64_decode($innerPayload), true);
		$computedInnerHash = hash_hmac("sha1", $innerPayload, $secretAppId);

		if($computedInnerHash == $decodedHash){
			return array('recipientAddress' => $decodedInnerPayload['r'], 'mailingList' => $decodedInnerPayload['l']);
		}

		return false;
	}
}
