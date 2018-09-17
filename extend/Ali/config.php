<?php
$config = array (	
		//应用ID,您的APPID。
		'app_id' => "2016091800536809",

		//商户私钥
		'merchant_private_key' => "MIIEpAIBAAKCAQEA1T8CwxjPWgP88EiqBFE80jcbGzkf8l4CeQVFx/N5r//2faSGc7zg/sSdmpRrbfSb/njC2xOLru78iZCSVk4L5N6c+ivjAd5ChoHndLkmSv4pAjjdYTHUhsv8RMMupdKkB3xva3rYjgDSHitNwO39cbEFUG7cVwbv1suXyjUAQ7bFx2Vm4DPqfsS3I6RYGR5/cTmwswFRDZfmZUdkojRO/9M9bj1/ohtwBBVFPOrVbCknyJmclJ/tTi9G0UxUAHHNf4ZzOhXXjHBvXhgOU5q1f8amvO9Q6vRP35D5bQzH25576uTjkyyvOQiln3q1DkkW2FXqkaWTyF4vgsgWNhHqQQIDAQABAoIBAGWAz7TD63cCbPSG8f6KGLRLLKjhoRZBr1Whr9yERUkEQnT9yk3u+v3p4scAnL5C77nKC54yCIwlD6n/Wdig38J6QChImY57GBlkXiLOOq75mdWH8cBg8rOTBypH6b1erVsu3O5BFDFLrLhVjnYmEjx6sXfevRzjnWgVktPaNJ0F1VhY0YdO3jtnHZk0jOwpz0V9QTvVge4MKWbZT60AcJ1jB+9GukZQk2WH5gzDC0uZsW8YicCZ9ysAbLC+IeoU/vSHn+aMbbYBJ+vaosR5OxCV4YFGMGKFZv4RyhaeKZGH1WqVjVywNwVF6Q0NdvdfoDRzmIPmjK0ibEC4ah/HZ90CgYEA7gp/ICguO0RkewLUSn2jG2jQD//qqLoGrnRfPlf4V6XKoNAvbYCL0oPp7BPXOg8jxM+3HMvDeKW82nWPUn7ADyABVKoH0L6VCQ7f7tax1LWkNr+nXET2zRNjb7+QSeGjg0VO5CtNibIearmisDLqmAfS68kP/w8NQEhGXxz5EvsCgYEA5VWg17FdD/BRcEs9IdSTkDjb8AOcvIBj3bPxiqkRI9LmqtQUrChQ7be/yBsskgcATnln9jgHJ9zEMd6h7Wx3CNFSe2rNlEmxf4cb1qekAVRjkCQVajuSJE4Bb2GCTPyNyw59OQ3Vg72+Jo3qbx+b6nUxKS6hgiWoJCR7u+fJ0vMCgYEA1yiLsaA/8XgnLnznMBGRrYO2lM+n5iyHP4aWVD6ljWug1Gx4ggyv1W9AsA9a+fKXTRzHEXMoUtPT+M5L5rAEn2c5bLJncAnjohVc2YAbqv0n2givmJoJTmIY/ffzzqPx7QRng5uUcUKbdbInWAYdv59Kya6qE8wiGRl66hvBEqMCgYEAoo24TUqtkR+hSfw6n6Ei20ZCNvUIguBqaPokCkneGUtjLtDWulR1UJo++OKyC+ukfvs1AmQiRlIISuToV/baxMhCM7K3dxVpF+C3jcYTzNF5JPE+sKb65nrYL4+pIVKeWsCxZ+BzaEb04jUTZ6K7DEv3BZ7E4hA5By1I+x7HgpsCgYBxZY54/pR3R+U7WwXqiuFTcxECWTqg2vH+f1a8Hh5cQ96uHX36pox+JSvsLnTZMIbsU3xQGNHtOzcDwOxzttM34s+7k9A0e0SpsZYZBDmoXkADi3OHTseDIlxkQw4toaXl4blEbkCsPVB47tjOEaYD9ijk1Alpz8TNVBanpucTbg==",
		
		//异步通知地址
		'notify_url' => "http://外网可访问网关地址/alipay.trade.page.pay-PHP-UTF-8/notify_url.php",
		
		//同步跳转
		'return_url' => "http://外网可访问网关地址/alipay.trade.page.pay-PHP-UTF-8/return_url.php",

		//编码格式
		'charset' => "UTF-8",

		//签名方式
		'sign_type'=>"RSA2",

		//支付宝网关
		'gatewayUrl' => "https://openapi.alipaydev.com/gateway.do",

		//支付宝公钥,查看地址：https://openhome.alipay.com/platform/keyManage.htm 对应APPID下的支付宝公钥。
		'alipay_public_key' => "MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEA1T8CwxjPWgP88EiqBFE80jcbGzkf8l4CeQVFx/N5r//2faSGc7zg/sSdmpRrbfSb/njC2xOLru78iZCSVk4L5N6c+ivjAd5ChoHndLkmSv4pAjjdYTHUhsv8RMMupdKkB3xva3rYjgDSHitNwO39cbEFUG7cVwbv1suXyjUAQ7bFx2Vm4DPqfsS3I6RYGR5/cTmwswFRDZfmZUdkojRO/9M9bj1/ohtwBBVFPOrVbCknyJmclJ/tTi9G0UxUAHHNf4ZzOhXXjHBvXhgOU5q1f8amvO9Q6vRP35D5bQzH25576uTjkyyvOQiln3q1DkkW2FXqkaWTyF4vgsgWNhHqQQIDAQAB",
);