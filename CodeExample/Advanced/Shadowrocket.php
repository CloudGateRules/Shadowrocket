<?php

/*
 * License: MIT
 *    Time: 2017-01-20 11:24:57
 *    Name: Shadowrocket.php
 *    Note: CloudGate Shadowrocket Advanced Rule
 *  Author: Eval,BurpSuite
 */

# 触发下载
header('Content-Disposition: attachment; filename='.'Shadowrocket.Conf');

# ClouGate控制器
require_once "../Controller/Controller.php";

# 处理URI参数
GET().parse_str($REQUEST_QUERY_URI);
Verify($DNS,$SERVER1,$SERVER2,$SERVER3,$SERVER4,$SERVER5,$SERVER6,$SERVER7,$SERVER8,$SERVER9,$SERVER0,$Group,$Rule,$IPV6,$Apple,$WIFIAccess,$AutoGroup,$Interval,$Tolerance);
Exp_lode($Group,$DNS,$SERVER1,$SERVER2,$SERVER3,$SERVER4,$SERVER5,$SERVER6,$SERVER7,$SERVER8,$SERVER9,$SERVER0);

# REQUEST配置信息
echo "[General]\r\n";
echo "bypass-system = true\r\n";
echo "skip-proxy = {$SKIP}\r\n";
echo "bypass-tun = {$Bypass}\r\n";
if($DNS_ExpA[0]==='true'){echo "dns-server = {$DNS_Implode}\r\n";}
echo "loglevel = notify\r\n";
echo "replica = false\r\n";
echo "#  \r\n";
echo "# Shadowrocket Config File [CloudGate]\r\n";
echo "# Download Time: " . date("Y-m-d H:i:s") . "\r\n";
echo "# \r\n";

# CloudGate模块
echo "[Rule]\r\n";
echo "# Default\r\n".Advanced(CURL(true,$RuleList['Default']).$CURLContent,$AutoGroup,$Apple).$Default;
if($Rule==='true'){echo "# PROXY\r\n".Advanced(CURL(true,$RuleList['Basic']).$CURLContent,$AutoGroup,$Apple).$Proxy;}
elseif($Rule==='false'){echo "# PROXY\r\n".Advanced(CURL(true,$RuleList['Advanced']).$CURLContent,$AutoGroup,$Apple).$Proxy;}
echo "# DIRECT\r\n".Advanced(CURL(true,$RuleList['DIRECT']).$CURLContent,$AutoGroup,$Apple).$DIRECT;
echo "# REJECT\r\n".Advanced(CURL(true,$RuleList['REJECT']).$CURLContent,$AutoGroup,$Apple).$REJECT;
echo "# KEYWORD\r\n".Advanced(CURL(true,$RuleList['KEYWORD']).$CURLContent,$AutoGroup,$Apple).$KEYWORD;
echo "# IP-CIDR\r\n".Advanced(CURL(true,$RuleList['IPCIDR']).$CURLContent,$AutoGroup,$Apple).$IPCIDR;
echo "# Other\r\n".Advanced(CURL(true,$RuleList['Other']).$CURLContent,$AutoGroup,$Apple).$Other;
echo "[URL Rewrite]\r\n";
echo "# Rewrite\r\n".Advanced(CURL(true,$RuleList['Rewrite']).$CURLContent,$AutoGroup,$Apple).$Rewrite;

?>