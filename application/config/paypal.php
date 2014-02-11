<?php  
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config['Sandbox'] = TRUE;
$config['APIVersion'] = '98.0';
$config['APIUsername'] = $config['Sandbox'] ? 'chrispinugu-facilitator_api1.gmail.com' : 'PRODUCTION_USERNAME_GOES_HERE';
$config['APIPassword'] = $config['Sandbox'] ? '1391741446' : 'PRODUCTION_PASSWORD_GOES_HERE';
$config['APISignature'] = $config['Sandbox'] ? 'An5ns1Kso7MWUdW4ErQKJJJ4qi4-AprVWXwNSL92I.DcibUHKZG9V7ak' : 'PRODUCTION_SIGNATURE_GOES_HERE';
$config['ApplicationID'] = $config['Sandbox'] ? 'APP-80W284485P519543T' : 'PRODUCTION_APP_ID_GOES_HERE';
$config['DeveloperEmailAccount'] = 'smoraga@n-hauz.com';
$config['DeviceID'] = 'DEVICE_ID_GOES_HERE';