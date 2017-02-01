<?php

/*
 * License: MIT
 *    Time: 2017-01-20 11:15:12
 *    Name: Shadowrocket.php
 *    Note: CloudGate Shadowrocket Basic Rule
 *  Author: Eval,BurpSuite
 */

# 触发下载
header('Content-Disposition: attachment; filename='.'Shadowrocket.Conf');

# ClouGate控制器
require_once "../Controller/Controller.php";

# Cloud配置信息
echo "[General]\r\n";
echo "bypass-system = true\r\n";
echo "loglevel = notify\r\n";
echo "skip-proxy = {$SKIP}\r\n";
echo "bypass-tun = {$Bypass}\r\n";
echo "dns-server = 8.8.8.8,8.8.4.4\r\n";
echo "#  \r\n";
echo "# Shadowrocket Config File [CloudGate]\r\n";
echo "# Download Time: " . date("Y-m-d H:i:s") . "\r\n";
echo "#  \r\n";

# CloudGate模块
echo "[Rule]\r\n";
echo "# Default\r\n".Replace(CURL(true,$RuleList['Default']).$CURLContent,false,true,false,false,false).$Shadowrocket_Default;
echo "# PROXY\r\n".Replace(CURL(true,$RuleList['Advanced']).$CURLContent,false,true,false,false,false).$Shadowrocket_Advanced;
echo "# DIRECT\r\n".Replace(CURL(true,$RuleList['DIRECT']).$CURLContent,false,true,false,false,false).$Shadowrocket_DIRECT;
echo "# REJECT\r\n".Replace(CURL(true,$RuleList['REJECT']).$CURLContent,false,true,false,false,false).$Shadowrocket_REJECT;
echo "# KEYWORD\r\n".Replace(CURL(true,$RuleList['KEYWORD']).$CURLContent,false,true,false,false,false).$Shadowrocket_KEYWORD;
echo "# IPCIDR\r\n".Replace(CURL(true,$RuleList['IPCIDR']).$CURLContent,false,true,false,false,false).$Shadowrocket_IPCIDR;
echo "# Other\r\n".Replace(CURL(true,$RuleList['Other']).$CURLContent,false,true,false,false,false).$Shadowrocket_Other;
echo "[URL Rewrite]\r\n";
echo "# Rewrite\r\n".Replace(CURL(true,$RuleList['Rewrite']).$CURLContent,false,true,false,false,false).$Shadowrocket_Rewrite;

?>