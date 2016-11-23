<?php

# 页面禁止缓存 | UTF-8编码 | 触发下载
header("cache-control:no-cache,must-revalidate");
header("Content-Type:text/html;charset=UTF-8");
header('Content-Disposition: attachment; filename='.'Shadowrocket.Conf');

# 默认模块API托管在Github[GithubUserContent] | 模块数组 | 请求模块禁止缓存
$ModuleAPI    = "https://raw.githubusercontent.com/BurpSuite/CloudGate-RuleList/master/Rule/";
$ModuleArray  = array("Advanced","Basic","DIRECT","Default","HostsFix","IPCIDR","KEYWORD","REJECT","Rewrite","YouTube","Other","USERAGENT");
$Cache        = '?Cache='.sha1(mt_rand()).'&TimeStamp='.time();

# 参数组合一起就是完整的模块地址
$AdvancedFile  = $ModuleAPI.$ModuleArray[0].$Cache;
$BasicFile     = $ModuleAPI.$ModuleArray[1].$Cache;
$DIRECTFile    = $ModuleAPI.$ModuleArray[2].$Cache;
$DefaultFile   = $ModuleAPI.$ModuleArray[3].$Cache;
$HostsFixFile  = $ModuleAPI.$ModuleArray[4].$Cache;
$IPCIDRFile    = $ModuleAPI.$ModuleArray[5].$Cache;
$KEYWORDFile   = $ModuleAPI.$ModuleArray[6].$Cache;
$REJECTFile    = $ModuleAPI.$ModuleArray[7].$Cache;
$RewriteFile   = $ModuleAPI.$ModuleArray[8].$Cache;
$YouTubeFile   = $ModuleAPI.$ModuleArray[9].$Cache;
$OtherFile     = $ModuleAPI.$ModuleArray[10].$Cache;
$USERAGENTFile = $ModuleAPI.$ModuleArray[11].$Cache;

# 现在暂时还是单线程,后续可能会改成循环请求或多线程请求
$DefaultModuleCURL = curl_init();
curl_setopt($DefaultModuleCURL,CURLOPT_URL,"$DefaultFile");
curl_setopt($DefaultModuleCURL,CURLOPT_RETURNTRANSFER,true);
$DefaultCURLF      = curl_exec($DefaultModuleCURL);
curl_close($DefaultModuleCURL);
$AdvancedModuleCURL   = curl_init();
curl_setopt($AdvancedModuleCURL,CURLOPT_URL,"$AdvancedFile");
curl_setopt($AdvancedModuleCURL,CURLOPT_RETURNTRANSFER,true);
$AdvancedCURLF        = curl_exec($AdvancedModuleCURL);
curl_close($AdvancedModuleCURL);
$DIRECTModuleCURL  = curl_init();
curl_setopt($DIRECTModuleCURL,CURLOPT_URL,"$DIRECTFile");
curl_setopt($DIRECTModuleCURL,CURLOPT_RETURNTRANSFER,true);
$DIRECTCURLF       = curl_exec($DIRECTModuleCURL);
curl_close($DIRECTModuleCURL);
$REJECTModuleCURL  = curl_init();
curl_setopt($REJECTModuleCURL,CURLOPT_URL,"$REJECTFile");
curl_setopt($REJECTModuleCURL,CURLOPT_RETURNTRANSFER,true);
$REJECTCURLF       = curl_exec($REJECTModuleCURL);
curl_close($REJECTModuleCURL);
$KEYWORDModuleCURL = curl_init();
curl_setopt($KEYWORDModuleCURL,CURLOPT_URL,"$KEYWORDFile");
curl_setopt($KEYWORDModuleCURL,CURLOPT_RETURNTRANSFER,true);
$KEYWORDCURLF      = curl_exec($KEYWORDModuleCURL);
curl_close($KEYWORDModuleCURL);
$IPCIDRModuleCURL  = curl_init();
curl_setopt($IPCIDRModuleCURL,CURLOPT_URL,"$IPCIDRFile");
curl_setopt($IPCIDRModuleCURL,CURLOPT_RETURNTRANSFER,true);
$IPCIDRCURLF       = curl_exec($IPCIDRModuleCURL);
curl_close($IPCIDRModuleCURL);
$RewriteModuleCURL = curl_init();
curl_setopt($RewriteModuleCURL,CURLOPT_URL,"$RewriteFile");
curl_setopt($RewriteModuleCURL,CURLOPT_RETURNTRANSFER,true);
$RewriteCURLF      = curl_exec($RewriteModuleCURL);
curl_close($RewriteModuleCURL);
$OtherModuleCURL    = curl_init();
curl_setopt($OtherModuleCURL,CURLOPT_URL,"$OtherFile");
curl_setopt($OtherModuleCURL,CURLOPT_RETURNTRANSFER,true);
$OtherCURLF         = curl_exec($OtherModuleCURL);
curl_close($OtherModuleCURL);

# 正则表达式替换规则格式
$Default  = preg_replace('/([^])([ \s]+)/','$1,DIRECT$2',$DefaultCURLF."\r\n");
$Advanced = preg_replace('/([^])([ \s]+)/','$1,Proxy$2',$AdvancedCURLF."\r\n");
$DIRECT   = preg_replace('/([^])([ \s]+)/','$1,DIRECT$2',$DIRECTCURLF."\r\n");
$REJECT   = preg_replace('/([^])([ \s]+)/','$1,REJECT$2',$REJECTCURLF."\r\n");
$KEYWORD  = preg_replace('/([^])([ \s]+)/','DOMAIN-KEYWORD,$1$2,force-remote-dns',$KEYWORDCURLF."\r\n");
$IPCIDR   = preg_replace('/([^])([ \s]+)/','IP-CIDR,$1$2,no-resolve',$IPCIDRCURLF."\r\n");
$Rewrite  = preg_replace('/([^])([ \s]+)/','$1$2',$RewriteCURLF."\r\n");
$Other    = preg_replace('/([^])([ \s]+)/','$1$2',$OtherCURLF."\r\n");

# Shadowrocket[General]规则模板
echo "[General]\r\n";
echo "bypass-system = true\r\n";
echo "loglevel = notify\r\n";
echo "skip-proxy = 10.0.0.0/8,17.0.0.0/8,172.16.0.0/12,192.168.0.0/16,localhost,*.local,::ffff:0:0:0:0/1,::ffff:128:0:0:0/1,*.crashlytics.com\r\n";
echo "bypass-tun = 10.0.0.0/8,127.0.0.0/24,172.0.0.0/8,192.168.0.0/16\r\n";
echo "dns-server = 8.8.8.8,8.8.4.4\r\n";
echo "#  \r\n";
echo "# Shadowrocket Config File [CloudGate]\r\n";
echo "# Download Time: " . date("Y-m-d H:i:s") . "\r\n";
echo "#  \r\n";

# 最后模块内容输出
echo "[Rule]\r\n";
echo "# Default\r\n".$Default;
echo "# PROXY\r\n".$Advanced;
echo "# DIRECT\r\n".$DIRECT;
echo "# REJECT\r\n".$REJECT;
echo "# KEYWORD\r\n".$KEYWORD;
echo "# IP-CIDR\r\n".$IPCIDR;
echo "# Other\r\n".$Other;
echo "[URL Rewrite]\r\n";
echo "# Rewrite\r\n".$Rewrite;