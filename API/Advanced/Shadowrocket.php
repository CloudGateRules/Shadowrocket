<?php

# 关闭所有 Notice | Warning 级别的错误
error_reporting(E_ALL^E_NOTICE^E_WARNING);

# 页面禁止缓存 | UTF-8编码 | 触发下载
header("cache-control:no-cache,must-revalidate");
header("Content-Type:text/html;charset=UTF-8");
header('Content-Disposition: attachment; filename='.'Shadowrocket.Conf');

# 引用Controller控制器模块
require '../Controller/Controller.php';

# 检测GET参数
if(empty($Logo)){$Logo="true";}else{$Logo=$Logo;}
if(empty($Rule)){$Rule="false";}elseif($Rule=="true"){$Rule="true";}else{$Rule="false";}
if(empty($Apple)){$Apple="false";}elseif($Apple=="true"){$Apple="true";}else{$Apple="false";}
if(empty($DNS1)){$DNS1="8.8.8.8";}else{$DNS1=$DNS1;}
if(empty($DNS2)){$DNS2="8.8.4.4";}else{$DNS2=$DNS2;}

# 判断GET参数
if($Rule=="true"){$AdvancedCURLF=$BasicCURLF;}elseif($Rule=="false"){$AdvancedCURLF=$AdvancedCURLF;}

# 正则表达式替换规则格式
if($Apple=="true"){$Default  = preg_replace('/([^])([ \s]+)/','$1,Proxy$2',$DefaultCURLF."\r\n");}
elseif($Apple=="false"){$Default  = preg_replace('/([^])([ \s]+)/','$1,DIRECT$2',$DefaultCURLF."\r\n");}
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
if($Logo=="true"){echo "bypass-tun = 10.0.0.0/8,127.0.0.0/24,172.0.0.0/8,192.168.0.0/16\r\n";}
elseif($Logo=="false"){echo "bypass-tun = 0.0.0.0/8,10.0.0.0/8,127.0.0.0/24,172.0.0.0/8,192.168.0.0/16\r\n";}
if($DNS1&&$DNS2){echo "dns-server = $DNS1,$DNS2\r\n";}
elseif($DNS1!=NULL&&$DNS2!=NULL){echo "dns-server = 8.8.8.8,8.8.4.4\r\n";}
else{echo "dns-server = 8.8.8.8,8.8.4.4\r\n";}
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

?>