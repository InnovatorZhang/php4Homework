<?php

function success_encode($data = null, $info = "success")
{
    $content["info"] = $info;
    if ($data) {
        $content['data'] = $data;
    }
    header("Content-Type: application/json");
	$result["ErrorCode"] = 0;
	$result["ErrorMessage"] = "NONE";
	$result["content"] = $content;
    echo json_encode($result);
    exit(0);
}

function other_encode($info, $data = null)
{
    $content["info"] = $info;
    if ($data) {
        $content['data'] = $data;
    }
	
    header("Content-Type: application/json");
	
	$result["ErrorCode"] = 10086;
	$result["ErrorMessage"] = $info;
	$result["content"] = $content;
	
    echo json_encode($result);
    exit(0);
}

?>