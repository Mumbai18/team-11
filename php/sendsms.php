<?php
include('way2sms-api.php');
if (isset($_REQUEST['v_contact']) && isset($_REQUEST['msg'])) {
    $res = sendWay2SMS($_REQUEST['v_contact'], $_REQUEST['msg']);
    if (is_array($res))
        echo $res[0]['result'] ? 'true' : 'false';
    else
        echo $res;
    exit;
}
?>
