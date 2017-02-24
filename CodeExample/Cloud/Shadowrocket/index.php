<?php

/*
 * License: MIT
 *    Time: 2017-02-12 01:52:12
 *    Name: Shadowrocket.php
 *    Note: CloudGate Shadowrocket Cloud Rule
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

# Cloud配置信息
echo CURL(Cloud($Data,$Shadowrocket_Config_Module,$Cache).$ConfigFile).$CURLContent."\r\n";

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