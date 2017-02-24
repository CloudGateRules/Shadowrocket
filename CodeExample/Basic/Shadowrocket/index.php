<?php

/*
 * License: MIT
 *    Time: 2017-02-12 00:18:41
 *    Name: Shadowrocket.php
 *    Note: CloudGate Shadowrocket Basic Rule
 *  Author: Eval,BurpSuite
 */

# 触发下载
header('Content-Disposition: attachment; filename='.'Shadowrocket.Conf');

# ClouGate控制器
require_once "../../Controller/Controller.php";

# Cloud配置信息
echo "[General]\r\n";
echo CURL(true,$RuleList['General']).$CURLContent."\r\n";
echo "dns-server = 8.8.8.8,8.8.4.4\r\n";
echo "#  \r\n";
echo "# Shadowrocket Config File [CloudGate]\r\n";
echo "# Download Time: " . date("Y-m-d H:i:s") . "\r\n";
echo "#  \r\n";

# CloudGate模块
echo "[Rule]\r\n";
echo Replace(CURL($RuleList['Default']).$CURLContent,'Shadowrocket').$Shadowrocket_Default;
echo Replace(CURL($RuleList['Advanced']).$CURLContent,'Shadowrocket').$Shadowrocket_Advanced;
echo Replace(CURL($RuleList['DIRECT']).$CURLContent,'Shadowrocket').$Shadowrocket_DIRECT;
echo Replace(CURL($RuleList['REJECT']).$CURLContent,'Shadowrocket').$Shadowrocket_REJECT;
echo Replace(CURL($RuleList['KEYWORD']).$CURLContent,'Shadowrocket').$Shadowrocket_KEYWORD;
echo Replace(CURL($RuleList['IPCIDR']).$CURLContent,'Shadowrocket').$Shadowrocket_IPCIDR;
echo Replace(CURL($RuleList['Other']).$CURLContent,'Shadowrocket').$Shadowrocket_Other;
echo "[Host]\r\n";
echo Replace(CURL($RuleList['Host']).$CURLContent,'Shadowrocket').$Shadowrocket_Host;
echo "[URL Rewrite]\r\n";
echo Replace(CURL($RuleList['Rewrite']).$CURLContent,'Shadowrocket').$Shadowrocket_Rewrite;

?>