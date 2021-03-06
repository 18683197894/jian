<?php
	
	//电话号码   发送内容
	function zend_code($phone,$str)
    {	
    	$per = '/^1[34587](\d){9}/';
    	if( !preg_match($per,$phone) )
    	{
    		return '电话格式错误';
    	}
    	//短信接口地址
    	$url =ZENDCODEURL;

    	//地址参数
		$mttime=date("YmdHis");
		$post_data['action']   = 'send';
		$post_data['userid']   = USERID;
		$post_data['account']  = ACCOUNT;
		$post_data['password'] = PASSWORD;
		$post_data['mobile']   = $phone;
		$post_data['content']  = $str;
		$post_data['sendTime'] = '';
		$post_data['taskName']  = '注册验证';
		
		$o = "";

		foreach( $post_data as $k => $v )
		{
		     $o .= $k.'='.urlencode($v).'&';
		}

		$url_data = substr($o,0,-1);
		// dd($url_data);

		//发送短信的方法
		function request_post($url ='', $param = '') {
		   if (empty($url) ||empty($param)) {
		      return false;
		   }
		 
		   $postUrl= $url;
		   $curlPost= $param;
		   $ch =curl_init();//初始化curl
		   curl_setopt($ch,CURLOPT_URL,$postUrl);//抓取指定网页
		   curl_setopt($ch,CURLOPT_HEADER, 0);//设置header
		   curl_setopt($ch,CURLOPT_RETURNTRANSFER, 1);//要求结果为字符串且屏幕上
		   curl_setopt($ch,CURLOPT_POST, 1);//post提交方式
		   curl_setopt($ch,CURLOPT_POSTFIELDS, $curlPost);
		   $data= curl_exec($ch);//运行curl
		   curl_close($ch);
		   return $data;
		}

		//将发送短信返回的信息XML 转化为数组
		function xmlToArray($xml){ 
 
			 //禁止引用外部xml实体 
			 
			libxml_disable_entity_loader(true); 
			 
			$xmlstring = simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA); 
			 
			$val = json_decode(json_encode($xmlstring),true); 
			 
			return $val; 
			 
		}

		$res = request_post($url,$url_data);
		$resarr = xmlToArray($res);

		//直接return 成功或错误的信息 
		return urldecode($resarr['message']);
    }

    //获取网页关键字
    function getwebpage($url=null)
    {
    	$titles = \DB::table('webpage')->select('url','id','keyworlds','description','titles')->where('url','/'.$url)->get()->toArray();
        if($titles)
        {	
        	return array('title'=>$titles[0]->titles,'keyworlds'=>$titles[0]->keyworlds,'description'=>$titles[0]->description);
        }else
        {
        	return array('title'=>'建商联盟','keyworlds'=>'建商联盟','description'=>'建商联盟');
        }
    }
