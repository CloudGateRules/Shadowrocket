<?php

/*
 * License: MIT
 *    Time: 2017-02-12 01:52:29
 *    Name: Shadowrocket.php
 *    Note: CloudGate Shadowrocket Advanced Rule
 *  Author: Eval,BurpSuite
 */

# 触发下载
header('Content-Disposition: attachment; filename='.'Shadowrocket.Conf');

# ClouGate控制器
require_once "../../Controller/Controller.php";

# 处理URI参数
GET().parse_str($REQUEST_QUERY_URI);
@Verify($DNS,$SERVER1,$SERVER2,$SERVER3,$SERVER4,$SERVER5,$SERVER6,$SERVER7,$SERVER8,$SERVER9,$SERVER0,$Group,$Rule,$IPV6,$Apple,$WIFIAccess,$AutoGroup,$Interval,$Tolerance,$TimeOut,$AGENT);
Exp_lode($Group,$DNS,$SERVER1,$SERVER2,$SERVER3,$SERVER4,$SERVER5,$SERVER6,$SERVER7,$SERVER8,$SERVER9,$SERVER0);

# REQUEST配置信息
echo "[General]\r\n";
echo CURL($RuleList['General']).$CURLContent."\r\n";
if($DNS_ExpA[0]==='true'){echo "dns-server = {$DNS_Implode}\r\n";}
echo "#  \r\n";
echo "# Shadowrocket Config File [CloudGate]\r\n";
echo "# Download Time: " . date("Y-m-d H:i:s") . "\r\n";
echo "# \r\n";

# CloudGate模块
echo "[Rule]\r\n";
echo Advanced(CURL($RuleList['Default']).$CURLContent,$AutoGroup,$Apple).$Default;
if($Rule==='true'){echo Advanced(CURL($RuleList['Basic']).$CURLContent,$AutoGroup,$Apple).$Proxy;}
elseif($Rule==='false'){echo Advanced(CURL($RuleList['Advanced']).$CURLContent,$AutoGroup,$Apple).$Proxy;}
echo Advanced(CURL($RuleList['DIRECT']).$CURLContent,$AutoGroup,$Apple).$DIRECT;
echo Advanced(CURL($RuleList['REJECT']).$CURLContent,$AutoGroup,$Apple).$REJECT;
echo Advanced(CURL($RuleList['KEYWORD']).$CURLContent,$AutoGroup,$Apple).$KEYWORD;
echo Advanced(CURL($RuleList['IPCIDR']).$CURLContent,$AutoGroup,$Apple).$IPCIDR;
echo Advanced(CURL($RuleList['Other']).$CURLContent,$AutoGroup,$Apple).$Other;
echo "[Host]\r\n";
echo Advanced(CURL($RuleList['Host']).$CURLContent,$AutoGroup,$Apple).$Hosts;
echo "[URL Rewrite]\r\n";
echo Advanced(CURL($RuleList['Rewrite']).$CURLContent,$AutoGroup,$Apple).$Rewrite;

?>