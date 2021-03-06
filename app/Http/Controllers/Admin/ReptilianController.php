<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReptilianController extends Controller
{	
	public function copynewsindex(Request $request)
	{	
		$pid = \DB::table('newslei')->select('id','title')->get();
		return view('Admin.reptilian.copynewsindex',['title'=>'爬取文章','pid'=>$pid]);
	}

    public function copynews_tx(Request $request)
    {	

    	// $data = $request->except("_token");
    	$res = [];
    	for($i=1;$i<=$request->page;$i++)
    	{	

    		$res_tmp = json_decode($this->sendhttp($request->url,['cid'=>$request->cid,'p'=>$request->start+$i],'GET'),True);
    		if($res_tmp)
    		{
    			$res = array_merge($res,$res_tmp);
    		}
    	}
    	$max = count($res);
    	if($max <= 0)
    	{
    		return response()->json(['status'=>'no','error'=>'没有爬取到文章!']);
    	}

    	$titles = \DB::table('news')->select('title')->get();
    	foreach($res as $k => $v)
    	{
    		foreach($titles as $kk => $vv)
    		{
    			if(trim($v['title']) == trim($vv->title))
    			{
    				unset($res[$k]);
    			}
    		}
    	}
    	$mymax = count($res);
    	if($mymax <= 0)
    	{
    		return response()->json(['status'=>'no','error'=>'数据库已过滤全部文章!']);
    	}

    	$keymax = 0;
    	if($request->key)
    	{
    		$keys = explode('-',$request->key);
    		foreach($res as $k => $v)
    		{	
    			foreach($keys as $kk => $vv)
    			{	
    				trim($vv);
    				$preg = "/{$vv}/";
    				if(preg_match($preg, trim($v['title'])))
    				{
    					unset($res[$k]);
    					$keymax += 1;
    				}
    			}
    		}
    	}
    	if(count($res) <= 0 )
    	{
    		return response()->json(['status'=>'no','error'=>"共爬取".$max."篇文章,数据库过滤".($max-$mymax)."篇,关键字过滤".$keymax."篇"]);
    	}
    	$result = [];
    	
    	foreach($res as $k => $v)
    	{	
    		$v['titleimg'] = json_decode($v['smeta'],True)['thumb'][0];
    		$result[$k]['title'] = $v['title'];
    		$result[$k]['titleimg'] = $v['titleimg'];
    		$result[$k]['time'] = time();
    		// $result[$k]['yuan'] = '建商联盟';
    		$result[$k]['click'] = 0;
    		$result[$k]['pid'] = $request->pid;
    		$result[$k]['leicon'] = $v['desc'];
    		$result[$k]['zhi'] = 0;
    		$result[$k]['szhi'] = 0;
    		$result[$k]['keyworlds'] = $v['title'].'建商联盟，建商新闻动态，宜宾装修新闻，宜宾家居新闻';
    		$result[$k]['description'] = $v['desc'];
    		$result[$k]['titles'] = $v['title'];
    		$content = (string) $this->sendhttp("http://www.jia360.com/new/".$v['id'].'.html',null,'GET');
    		
    		preg_match('/<div class="newsD_contend">(.*?)<\/div>/', $content,$contents);
    		if(!isset($contents[1]) or strlen($contents[1]) >65500 )
            {   
                $mymax += 1;
                unset($result[$k]);
                continue;
            }


            $result[$k]['yuan'] = '建商联盟';
            // （来源：九正建材网）
            preg_match('/（来源：(.*?)）/', $content,$yuan1);
            if(isset($yuan1[1]) && !empty($yuan1[1]))
            {
                $result[$k]['content'] = $contents[1].'<br>';
                continue;
            }else
            {
                preg_match('/<span class="source fr" style="margin-top: 12px;">来源：(.*?) <\/span>/', $content,$yuan2);
                $yuan3 = '<p style="margin-bottom: 15px; line-height: 1.75em; text-indent: 2em;">（来源：'.$yuan2[1].'）</p><br>';
                $result[$k]['content'] = $contents[1].$yuan3.'<br>';
                continue;
            }
    	}

        foreach ($result as $k => $v) 
        {   
                $sql = "INSERT INTO news (id,title,content,titleimg,time,click,pid,leicon,zhi,szhi,keyworlds,description,titles,yuan) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                \DB::insert($sql,[NULL,$v['title'],$v['content'],$v['titleimg'],$v['time'],$v['click'],$v['pid'],$v['leicon'],$v['zhi'],$v['szhi'],$v['keyworlds'],$v['description'],$v['titles'],$v['yuan']]);
        }
        return response()->json(['status'=>'ok','redirect'=>"/jslmadmin/newslei/newsindex/{$request->pid}",'info'=>"共爬取".$max."篇文章,数据库过滤".($max-$mymax)."篇,关键字过滤".$keymax."篇"]);

    }

    public function copynews_xl(Request $request)
    {
    	$res = [];

    	$titles = \DB::table('news')->select('title')->get();
    	
    	
    	for($i=1;$i<=$request->page;$i++)
    	{	
    		$res_tmp = $this->sendhttp($request->url.$request->cid.($request->start+$i),null,'GET');
    		if($res_tmp)
    		{	

    			$ads = [];
    			$list = [];
    			preg_match_all('/<dl class="clearfix onepic">.*?<\/dl>/s', $res_tmp,$list);
    			foreach($list[0] as $k => $v)
    			{	
    				preg_match('/<a href="(.*?)" target="_blank">(.*?)<\/a>/', $v,$title);
    				$ads[$k]['title'] = $title[2] ;
    				$ads[$k]['content'] = $title[1] ;
    				preg_match('/<img lsrc="(.*?)">/', $v,$imgurl);
    				$ads[$k]['titleimg'] = $imgurl[1];
    				$ads[$k]['time'] = time();
    				$ads[$k]['click'] = 0;
    				$ads[$k]['pid'] = $request->pid;
    				preg_match('/<p class="intro">(.*?)<\/p>/s', $v,$leicon);
    				$ads[$k]['leicon'] = $leicon[1];
    				$ads[$k]['zhi'] = 0;
    				$ads[$k]['szhi'] = 0;
    				$ads[$k]['keyworlds'] = $ads[$k]['title'].'建商联盟，建商新闻动态，宜宾装修新闻，宜宾家居新闻';
    				$ads[$k]['description'] = $ads[$k]['leicon'];
    				$ads[$k]['titles'] = $ads[$k]['title'];
    			}
    		}

    		$res = array_merge($res,$ads);
    	}

    	$max = count($res);
    	if($max <= 0)
    	{
    		return response()->json(['status'=>'no','error'=>'没有爬取到文章!']);
    	}

    	foreach($res as $k => $v)
    	{
    		foreach($titles as $kk => $vv)
    		{ 

    			if(trim($v['title']) == trim($vv->title))
    			{
    				unset($res[$k]);
    			}
    		}
    	}

    	$mymax = count($res);
    	if($mymax <= 0)
    	{
    		return response()->json(['status'=>'no','error'=>'数据库已过滤全部文章!']);
    	}

    	$keymax = 0;
    	if($request->key)
    	{
    		$keys = explode('-',$request->key);
    		foreach($res as $k => $v)
    		{	
    			foreach($keys as $kk => $vv)
    			{	
    				trim($vv);
    				$preg = "/{$vv}/";
    				if(preg_match($preg, trim($v['title'])))
    				{
    					unset($res[$k]);
    					$keymax += 1;
    				}
    			}
    		}
    	}

    	if(count($res) <= 0 )
    	{
    		return response()->json(['status'=>'no','error'=>"共爬取".$max."篇文章,数据库过滤".($max-$mymax)."篇,关键字过滤".$keymax."篇"]);
    	}

    	foreach ($res as $k => $v) 
    	{
    		$content = (string) $this->sendhttp($v['content'],null,'GET');

			preg_match('/<div id="b09" class="articleTextad"><\/div>(.*?)<\/div>/s', $content,$contents);
			
            if(!isset($contents[1]) or strlen($contents[1]) >65500 )
            {   
                $mymax += 1;
                unset($res[$k]);
                continue;
            }
            $res[$k]['yuan'] = '建商联盟';
			// $res[$k]['content'] = $contents[1].'<br>';
			preg_match('/（来源：(.*?)）/s', $content,$yuan1);
            if(isset($yuan1[1]) && !empty($yuan1[1]))
            {   
                if(strlen($yuan1[1]) < 20)
                {   
                    $res[$k]['content'] = str_replace($yuan1[0],'',$contents[1]).'<p style="margin-bottom: 15px; line-height: 1.75em; text-indent: 2em;">（来源：'.$yuan1[1].'）</p><br>';
                    continue;
                    
                }else
                {
                    preg_match('/<span style="font-family: 宋体, SimSun; font-size: 16px;">(.*?)<\/span>/',$yuan1[1],$yuan2);
                    $res[$k]['content'] = str_replace($yuan2[0],'',$contents[1]).'<p style="margin-bottom: 15px; line-height: 1.75em; text-indent: 2em;">（来源：'.$yuan2[1].'）</p><br>';
                    continue;
                }
                
            }else
            {
                $res[$k]['content'] = $contents[1].'<p style="margin-bottom: 15px; line-height: 1.75em; text-indent: 2em;">（来源：新浪家居）</p><br>';
            }
    	}
        foreach ($res as $k => $v) 
        {   
                $sql = "INSERT INTO news (id,title,content,titleimg,time,click,pid,leicon,zhi,szhi,keyworlds,description,titles,yuan) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                $v['content'] = str_replace('font-size: 14px;','font-size: 16px;',$v['content']);
                $v['content'] = str_replace('font-size: 12px;','font-size: 14px;',$v['content']);
                \DB::insert($sql,[NULL,$v['title'],$v['content'],$v['titleimg'],$v['time'],$v['click'],$v['pid'],$v['leicon'],$v['zhi'],$v['szhi'],$v['keyworlds'],$v['description'],$v['titles'],$v['yuan']]);
        }
        return response()->json(['status'=>'ok','redirect'=>"/jslmadmin/newslei/newsindex/{$request->pid}",'info'=>"共爬取".$max."篇文章,数据库过滤".($max-$mymax)."篇,关键字过滤".$keymax."篇"]);
    	
    }

    public function copynews_tbt(Request $request)
    {   
        $res = [];
        for($i=1;$i<=$request->page;$i++)
        {   
            $res_tmp = $this->sendhttp($request->url.$request->cid.($request->start+$i),null,'GET');
            if($res_tmp)
            {   

                $ads = [];
                $list = [];
                preg_match('/<div class="news_list">.*?<div class="mod_pages">/s', $res_tmp,$lists);
                preg_match_all('/<li>.*?<\/li>/s', $lists[0],$list);
                
                foreach($list[0] as $k => $v)
                {   
                    preg_match('/<a title="(.*?)" target="_blank" href="(.*?)" class="news_img"><img src="(.*?)" alt="(.*?)" width="140" height="102"><\/a>/', $v,$title);
                    $ads[$k]['title'] = $title[1];
                    $ads[$k]['content'] = $request->url.$title[2];
                    $ads[$k]['titleimg'] = $title[3];
                    $ads[$k]['time'] = time();
                    $ads[$k]['click'] = 0;
                    $ads[$k]['pid'] = $request->pid;
                    preg_match('/<div class="news_cont">(.*?)<a target="_blank"/s', $v,$leicon);
                    $ads[$k]['leicon'] = $leicon[1];
                    $ads[$k]['zhi'] = 0;
                    $ads[$k]['szhi'] = 0;
                    $ads[$k]['keyworlds'] = $ads[$k]['title'].'建商联盟，建商新闻动态，宜宾装修新闻，宜宾家居新闻';
                    $ads[$k]['description'] = $ads[$k]['leicon'];
                    $ads[$k]['titles'] = $ads[$k]['title'];
                }
            }

            $res = array_merge($res,$ads);
        }

        $max = count($res);
        if($max <= 0)
        {
            return response()->json(['status'=>'no','error'=>'没有爬取到文章!']);
        }

        $titles = \DB::table('news')->select('title')->get();
        foreach($res as $k => $v)
        {
            foreach($titles as $kk => $vv)
            { 

                if(trim($v['title']) == trim($vv->title))
                {
                    unset($res[$k]);
                }
            }
        }

        $mymax = count($res);
        if($mymax <= 0)
        {
            return response()->json(['status'=>'no','error'=>'数据库已过滤全部文章!']);
        }

        $keymax = 0;
        if($request->key)
        {
            $keys = explode('-',$request->key);
            foreach($res as $k => $v)
            {   
                foreach($keys as $kk => $vv)
                {   
                    trim($vv);
                    $preg = "/{$vv}/";
                    if(preg_match($preg, trim($v['title'])))
                    {
                        unset($res[$k]);
                        $keymax += 1;
                    }
                }
            }
        }

        if(count($res) <= 0 )
        {
            return response()->json(['status'=>'no','error'=>"共爬取".$max."篇文章,数据库过滤".($max-$mymax)."篇,关键字过滤".$keymax."篇"]);
        }

        foreach ($res as $k => $v) 
        {
            $content = (string) $this->sendhttp($v['content'],null,'GET');

            preg_match('/<div class="news_detail_txt">(.*?)<\/div>/s', $content,$contents);
            
            if(!isset($contents[1]) or strlen($contents[1]) >65500 )
            {   
                $mymax += 1;
                unset($res[$k]);
                continue;
            }                                 

            $res[$k]['yuan'] = '建商联盟';
            $str_content = str_replace('<span style="font-size:14px">','<span style="font-size:16px">',$contents[1]);
            $str_content = str_replace('<span style="font-size:14px;">','<span style="font-size:16px;">',$str_content);
            preg_match('/&emsp;&emsp;来源：(.*?)        <\/div>/', $content,$yuans);

            if(isset($yuans[1]) && !empty($yuans[1]) && $yuans[1] != '企业供稿')
            {
                $res[$k]['content'] = $str_content.'<p style="margin-bottom: 15px; line-height: 1.75em; text-indent: 2em;">（来源：'.$yuans[1].'）</p><br>';
                
            }else
            {
                $res[$k]['content'] = $str_content.'<p style="margin-bottom: 15px; line-height: 1.75em; text-indent: 2em;">（来源：土巴兔）</p><br>';
            }
        }
        foreach ($res as $k => $v) 
        {   
                $sql = "INSERT INTO news (id,title,content,titleimg,time,click,pid,leicon,zhi,szhi,keyworlds,description,titles,yuan) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                \DB::insert($sql,[NULL,$v['title'],$v['content'],$v['titleimg'],$v['time'],$v['click'],$v['pid'],$v['leicon'],$v['zhi'],$v['szhi'],$v['keyworlds'],$v['description'],$v['titles'],$v['yuan']]);
        }
        return response()->json(['status'=>'ok','redirect'=>"/jslmadmin/newslei/newsindex/{$request->pid}",'info'=>"共爬取".$max."篇文章,数据库过滤".($max-$mymax)."篇,关键字过滤".$keymax."篇"]);
    }

    public function sendhttp($url,$data,$init)
    {	
    	
    	// 拼接参数
    	$urlData = '';
    	if($data)
    	{	
    		foreach($data as $k => $v)
    		{
    			$urlData .= '&'.$k.'='.$v;
    		}
    		$urlData = preg_replace('/&/','?',$urlData,1);
    	}
    	$ip = $this->Rand_IP();
    	$header = array('CLIENT-IP:'.$ip,'X-FORWARDED-FOR:'.$ip,);
	    
	    $curlobj = curl_init();
	    //设置访问的url
	    curl_setopt($curlobj, CURLOPT_URL, $url.$urlData ); 
	    curl_setopt($curlobj, CURLOPT_HTTPHEADER, $header);
		curl_setopt($curlobj, CURLOPT_REFERER, $this->Rand_Url());
	    //执行后不直接打印出
	    curl_setopt($curlobj, CURLOPT_RETURNTRANSFER, true);  
	 
	    //设置https 支持
	    date_default_timezone_get('PRC');   //使用cookies时，必须先设置时区
	    curl_setopt($curlobj, CURLOPT_SSL_VERIFYPEER, 0);  //终止从服务端验证
	 
	    $output = curl_exec($curlobj);  //执行获取内容
	    curl_close($curlobj); 
	    return $output;
    }

  	public function Rand_IP(){

	    $ip2id= round(rand(600000, 2550000) / 10000); //第一种方法，直接生成
	    $ip3id= round(rand(600000, 2550000) / 10000);
	    $ip4id= round(rand(600000, 2550000) / 10000);
	    //下面是第二种方法，在以下数据中随机抽取
	    $arr_1 = array("218","218","66","66","218","218","60","60","202","204","66","66","66","59","61","60","222","221","66","59","60","60","66","218","218","62","63","64","66","66","122","211");
	    $randarr= mt_rand(0,count($arr_1)-1);
	    $ip1id = $arr_1[$randarr];
	    return $ip1id.".".$ip2id.".".$ip3id.".".$ip4id;
	}
	public function Rand_Url()
	{
		$url = array('http://www.csdn.net/','http://www.baidu.com','https://www.so.com/','https://www.google.com','http://www.sogou.com','http://www.bing.com');
		return array_rand($url);
	}
}
