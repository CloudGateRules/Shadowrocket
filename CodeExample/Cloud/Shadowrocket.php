<?php

/*
 * License: MIT
 *    Time: 2017-02-02 00:53:33
 *    Name: Shadowrocket.php
 *    Note: CloudGate Shadowrocket Cloud Rule
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

# Cloud配置信息
echo CURL(true,Cloud($Data,$Shadowrocket_Config_Module,$Cache).$ConfigFile).$CURLContent."\r\n";

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