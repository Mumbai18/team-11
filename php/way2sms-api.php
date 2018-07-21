<?php

class WAY2SMSClient
{

    var $curl;
    var $timeout = 30;
    var $jstoken;
    var $way2smsHost;
    var $refurl;

    /**
     * @param $username
     * @param $password
     * @return bool|string
     */
   

    /**
     * @param $phone
     * @param $msg
     * @return array
     */
    function send($v_contact, $msg)
    {
        $result = array();

        // Check the message
        $msg="There is a nearby donor";
        // Store the numbers from the string to an array
        $pharr = explode(",", $v_contact);

        // Send SMS to each number
        foreach ($pharr as $p) {
            // Check the mobile number
            if (strlen($p) != 10 || !is_numeric($p) || strpos($p, ".") != false) {
                $result[] = array('v_contact' => $p, 'msg' => $msg, 'result' => "invalid number");
                continue;
            }

            // Setup to send SMS
            curl_setopt($this->curl, CURLOPT_URL, $this->way2smsHost . 'smstoss.action');
            curl_setopt($this->curl, CURLOPT_REFERER, curl_getinfo($this->curl, CURLINFO_EFFECTIVE_URL));
            curl_setopt($this->curl, CURLOPT_POST, 1);

            curl_setopt($this->curl, CURLOPT_POSTFIELDS, "ssaction=ss&Token=" . $this->jstoken . "&mobile=" . $p . "&message=" . $msg . "&button=Login");
            $contents = curl_exec($this->curl);

            //Check Message Status
            $pos = strpos($contents, 'Message has been submitted successfully');
            $res = ($pos !== false) ? true : false;
            $result[] = array('phone' => $p, 'msg' => $msg, 'result' => $res);
        }
        return $result;
    }


   

}

/**
 * Helper Function to send to sms to single/multiple people via way2sms
 * @example sendWay2SMS ( '9000012345' , 'password' , '987654321,9876501234' , 'Hello World')
 */

function sendWay2SMS($v_contact, $msg)
{
    $client = new WAY2SMSClient();
    $result = $client->send($v_contact, $msg);
    return $result;
}

