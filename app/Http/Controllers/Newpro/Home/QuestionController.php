<?php

namespace App\Http\Controllers\Newpro\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuestionController extends Controller
{	
	public function defuindex(Request $request)
    {	
    return view('Newpro.Home.Question.defuindex',['or'=>1]);
    }

    public function defuname(Request $request)
    {	    
        if(isset($request->sid))
        {
            $data = \DB::table('question')->where('id',$request->sid)->where('or','!=',2)->first();
           
            return view('Newpro.Home.Question.defuname',['title'=>'你的名字','data'=>$data]);
            
        }else
        {
            return view('Newpro.Home.Question.defuname',['title'=>'你的名字']);
        }
    }
    

    public function defuphone(Request $request)
    {	
        $sid = $request->input('sid',false);
        if(!$sid)
        {


    	$request->setTrustedProxies(array('10.32.0.1/16'));  
		$ip = $request->getClientIp();
        $name = $request->name;
    	$sex = $request->sex;
        $id = $request->input('id',false);
    	if(!$ip || !$name || !$sex)
    	{	
    		return redirect('/newpro/defu/questionnaire/index')->with(['info'=>'数据无法提交']);
    	}
        
    	$res = \DB::table('question')
    		->where('ors','德福')
    		->where('ip',$ip)
    		->where('or','=',1)
    		->where('name',$name)
    		->first();
    	if($res)
    	{
    		return redirect('/newpro/defu/questionnaire/index')->with(['info'=>'你已参与过调查']);
    	}else
    	{	
            if(!$id)
            {
                $ress = \DB::table('question')
                ->where('ors','德福')
                ->where('ip',$ip)
                ->where('or','!=',1)
                ->where('name',$name)
                ->first();
            
                if(!$ress)
                 {
                    $id = \DB::table('question')
                    ->insertGetId(['ip'=>$ip,'or'=>0,'ors'=>'德福','name'=>$name,'sex'=>$sex,'time'=>time()]);
                    $data = \DB::table('question')->where('id',$id)->first();
                    if($id)
                    {
                        return view('Newpro.Home.Question.defuphone',['data'=>$data]);

                    }else
                    {
                        return redirect('/newpro/defu/questionnaire/index')->with(['info'=>'无法继续完成调查']);
                    }
                }else
                {
                    return view('Newpro.Home.Question.defuphone',['data'=>$ress]);

                 }
        }else
        {
            \DB::table('question')->where('id',$id)->update(['name'=>$name,'sex'=>$sex]);
            $data = \DB::table('question')->where('id',$id)->first();
            return view('Newpro.Home.Question.defuphone',['data'=>$data]);

        }
    		
    		
    	}
    }else
    {
         $data = \DB::table('question')->where('id',$sid)->first();
         return view('Newpro.Home.Question.defuphone',['data'=>$data]);
    }
    }

    public function defuqccupation(Request $request)
    {   

        $sid = $request->input('sid',false);
        if(!$sid)
        {
            $id = $request->id;
            $phone = $request->phone;

            if(!$id || !$phone )
            {   
                return redirect('/newpro/defu/questionnaire/index')->with(['info'=>'数据无法提交']);
            }
            \DB::table('question')->where('id',$id)->update(['phone'=>$phone]);
            $data = \DB::table('question')->where('id',$id)->first();
            return view('Newpro.Home.Question.defuqccupation',['data'=>$data]);

        }else

        {
            $data = \DB::table('question')->where('id',$sid)->first();
            return view('Newpro.Home.Question.defuqccupation',['data'=>$data]);
        }
    }
    public function defuresident(Request $request)
    {
        $sid = $request->input('sid',false);
        if(!$sid)
        {
            $id = $request->id;
            $qccupation = $request->qccupation;

            if(!$id || !$qccupation )
            {   
                return redirect('/newpro/defu/questionnaire/index')->with(['info'=>'数据无法提交']);
            }
            \DB::table('question')->where('id',$id)->update(['qccupation'=>$qccupation]);
            $data = \DB::table('question')->where('id',$id)->first();
            return view('Newpro.Home.Question.defuresident',['data'=>$data]);

        }else
        {   
            $data = \DB::table('question')->where('id',$sid)->first();

            return view('Newpro.Home.Question.defuresident',['data'=>$data]);
        }
    }

    public function defuservice(Request $request)
    {
        $sid = $request->input('sid',false);
        if(!$sid)
        {
            $id = $request->id;
            $resident = $request->population;

            if(!$id || !$resident )
            {   
                return redirect('/newpro/defu/questionnaire/index')->with(['info'=>'数据无法提交']);
            }
            \DB::table('question')->where('id',$id)->update(['resident'=>$resident]);
            $data = \DB::table('question')->where('id',$id)->first();
            return view('Newpro.Home.Question.defuservice',['data'=>$data]);

        }else
        {   

            $data = \DB::table('question')->where('id',$sid)->first();
            return view('Newpro.Home.Question.defuservice',['data'=>$data]);
        }
    }

    public function defucare(Request $request)
    {
        $sid = $request->input('sid',false);
        if(!$sid)
        {
            $id = $request->id;
            $service = $request->service;

            if(!$id || !$service )
            {   
                return redirect('/newpro/defu/questionnaire/index')->with(['info'=>'数据无法提交']);
            }
            \DB::table('question')->where('id',$id)->update(['service'=>$service]);
            $data = \DB::table('question')->where('id',$id)->first();
            if($data->care != null)
            {
                $data->care = explode(',',$data->care);

            }
            return view('Newpro.Home.Question.defucare',['data'=>$data]);

        }else
        {
            $data = \DB::table('question')->where('id',$sid)->first();
            if($data->care != null)
            {
                $data->care = explode(',',$data->care);

            }
            return view('Newpro.Home.Question.defucare',['data'=>$data]);
        }
    }
    public function defustyle(Request $request)
    {
        $sid = $request->input('sid',false);
        if(!$sid)
        {
            $id = $request->id;
            $care1 = $request->care1;
            $care2 = $request->care2;
            $care3 = $request->care3;
            $care4 = $request->care4;
            $care5 = $request->care5;
            $care6 = $request->care6;
            $care7 = $request->care7;
            $care = $care1.','.$care2.','.$care3.','.$care4.','.$care5.','.$care6.','.$care7;
            if(!$id)
            {   
                return redirect('/newpro/defu/questionnaire/index')->with(['info'=>'数据无法提交']);
            }
            
            \DB::table('question')->where('id',$id)->update(['care'=>$care]);
            $data = \DB::table('question')->where('id',$id)->first();
            return view('Newpro.Home.Question.defustyle',['data'=>$data]);

        }else
        {
            $data = \DB::table('question')->where('id',$sid)->first();
            return view('Newpro.Home.Question.defustyle',['data'=>$data]);
        }
    }

    public function defumoney(Request $request)
    {
        $sid = $request->input('sid',false);
        if(!$sid)
        {
            $id = $request->id;
            $style = $request->style;
            if(!$id || !$style)
            {   
                return redirect('/newpro/defu/questionnaire/index')->with(['info'=>'数据无法提交']);
            }
            
            \DB::table('question')->where('id',$id)->update(['style'=>$style]);
            $data = \DB::table('question')->where('id',$id)->first();
            return view('Newpro.Home.Question.defumoney',['data'=>$data]);

        }else
        {
            $data = \DB::table('question')->where('id',$sid)->first();
            return view('Newpro.Home.Question.defumoney',['data'=>$data]);
        }
    }

    public function defuintelligence(Request $request)
    {
        $sid = $request->input('sid',false);
        if(!$sid)
        {
            $id = $request->id;
            $money = $request->money;
            if(!$id || !$money)
            {   
                return redirect('/newpro/defu/questionnaire/index')->with(['info'=>'数据无法提交']);
            }
            
            \DB::table('question')->where('id',$id)->update(['money'=>$money]);
            $data = \DB::table('question')->where('id',$id)->first();
            return view('Newpro.Home.Question.defuintelligence',['data'=>$data]);

        }else
        {
            $data = \DB::table('question')->where('id',$sid)->first();
            return view('Newpro.Home.Question.defuintelligence',['data'=>$data]);
        }
    }

    function defudoor(Request $request)
    {
        $sid = $request->input('sid',false);
        if(!$sid)
        {
            $id = $request->id;
            $intelligence = $request->intelligence;
            if(!$id || !$intelligence)
            {   
                return redirect('/newpro/defu/questionnaire/index')->with(['info'=>'数据无法提交']);
            }
            
            \DB::table('question')->where('id',$id)->update(['intelligence'=>$intelligence]);
            $data = \DB::table('question')->where('id',$id)->first();
            return view('Newpro.Home.Question.defudoor',['data'=>$data]);

        }else
        {
            $data = \DB::table('question')->where('id',$sid)->first();
            return view('Newpro.Home.Question.defudoor',['data'=>$data]);
        }
    }

    public function defufeel(Request $request)
    {
        $sid = $request->input('sid',false);
        if(!$sid)
        {
            $id = $request->id;
            $door = $request->door;
            if(!$id || !$door)
            {   
                return redirect('/newpro/defu/questionnaire/index')->with(['info'=>'数据无法提交']);
            }
            
            \DB::table('question')->where('id',$id)->update(['door'=>$door]);
            $data = \DB::table('question')->where('id',$id)->first();
            if($data->feel != null)
            {
                $data->feel = explode(',',$data->feel);

            }
            return view('Newpro.Home.Question.defufeel',['data'=>$data]);

        }else
        {
            $data = \DB::table('question')->where('id',$sid)->first();
            if($data->feel != null)
            {
                $data->feel = explode(',',$data->feel);

            }
            
            return view('Newpro.Home.Question.defufeel',['data'=>$data]);
        }
    }

    public function defuors(Request $request)
    {
       
        
            $id = $request->id;
            $feel1 = $request->feel1;
            $feel2 = $request->feel2;
            $feel3 = $request->feel3;
            $feel4 = $request->feel4;
            $feel5 = $request->feel5;
            
            $feel = $feel1.','.$feel2.','.$feel3.','.$feel4.','.$feel5;
            if(!$id)
            {   
                return redirect('/newpro/defu/questionnaire/index')->with(['info'=>'数据无法提交']);
            }
            
            \DB::table('question')->where('id',$id)->update(['feel'=>$feel,'or'=>1]);
            $data = \DB::table('question')->where('id',$id)->first();

            $arr = [
                'A1户型' =>[
                    '北欧风格'=>'https://yun.kujiale.com/design/3FO4LR54FF3A/show',
                    '美式风格'=>'https://yun.kujiale.com/design/3FO4LR54CN4G/show',
                    '现代风格'=>'https://yun.kujiale.com/design/3FO4LR54MUVI/show'
                        ],
                'A2户型' =>[
                    '北欧风格'=>'https://yun.kujiale.com/design/3FO4LP7XDXQO/show',
                    '美式风格'=>'https://yun.kujiale.com/design/3FO4LR54M0S9/show',
                    '现代风格'=>'https://yun.kujiale.com/design/3FO4LR546MGN/show'
                        ],
                'B1户型' =>[
                    '北欧风格'=>'https://yun.kujiale.com/design/3FO4LR55T8OV/show',
                    '美式风格'=>'https://yun.kujiale.com/design/3FO4LPI8G9FO/show',
                    '现代风格'=>'https://yun.kujiale.com/design/3FO4LP7XALPO/show'
                        ],
            
                'B2户型' => [
                    '北欧风格'=>'https://yun.kujiale.com/design/3FO4LP7XN4QF/show',
                    '美式风格'=>'https://yun.kujiale.com/design/3FO4LP7X2455/show',
                    '现代风格'=>'https://yun.kujiale.com/design/3FO4LQQBIT2H/show'
                        ],
            
                'C1户型' => [
                    '北欧风格'=>'https://yun.kujiale.com/design/3FO4LPILYPOA/show',
                    '美式风格'=>'https://yun.kujiale.com/design/3FO4LPHL330G/show',
                    '现代风格'=>'https://yun.kujiale.com/design/3FO4LPHVP39P/show'
                    ],
                'C2户型' => [
                    '北欧风格'=>'https://yun.kujiale.com/design/3FO4LR53MC1V/show',
                    '美式风格'=>'https://yun.kujiale.com/design/3FO4LR53DCQ7/show',
                    '现代风格'=>'https://yun.kujiale.com/design/3FO4LR53TEH0/show'
                ],
                'C3户型' => [
                    '北欧风格'=>'https://yun.kujiale.com/design/3FO4LR66RLK8/show',
                    '美式风格'=>'https://yun.kujiale.com/design/3FO4LR67MS69/show',
                    '现代风格'=>'https://yun.kujiale.com/design/3FO4LR66KJ54/show'
                ]
            
            ];
            $url = isset($arr[$data->door])?$arr[$data->door]:false;
            if($url == false)
            {
                return redirect('/newpro/defu/questionnaire/index')->with(['info'=>'数据无法提交']);
            }
            $datas = [];
            foreach($url as $k => $v)
            {
                if($data->style == $k)
                {
                    $datas[10] = [$data->door.$k=>$v];
                }else
                {
                    array_push($datas,[$data->door.$k=>$v]);
                }
            }
            
            return view('Newpro.Home.Question.defuors',['datas'=>$datas,'data'=>$data]);

       
    }


///******************************************************************************///


    public function zhijinindex(Request $request)
    {   
    return view('Newpro.Home.Question.zhijinindex',['or'=>1]);
    }

    public function zhijinname(Request $request)
    {       
        if(isset($request->sid))
        {
            $data = \DB::table('question')->where('id',$request->sid)->where('or','!=',2)->first();
           
            return view('Newpro.Home.Question.zhijinname',['title'=>'你的名字','data'=>$data]);
            
        }else
        {
            return view('Newpro.Home.Question.zhijinname',['title'=>'你的名字']);
        }
    }
    

    public function zhijinphone(Request $request)
    {   
        $sid = $request->input('sid',false);
        if(!$sid)
        {


        $request->setTrustedProxies(array('10.32.0.1/16'));  
        $ip = $request->getClientIp();
        $name = $request->name;
        $sex = $request->sex;
        $id = $request->input('id',false);
        if(!$ip || !$name || !$sex)
        {   
            return redirect('/newpro/zhijin/questionnaire/index')->with(['info'=>'数据无法提交']);
        }
        
        $res = \DB::table('question')
            ->where('ors','织金')
            ->where('ip',$ip)
            ->where('or','=',1)
            ->where('name',$name)
            ->first();
        if($res)
        {
            return redirect('/newpro/zhijin/questionnaire/index')->with(['info'=>'你已参与过调查']);
        }else
        {   
            if(!$id)
            {
                $ress = \DB::table('question')
                ->where('ors','织金')
                ->where('ip',$ip)
                ->where('or','!=',1)
                ->where('name',$name)
                ->first();
            
                if(!$ress)
                 {
                    $id = \DB::table('question')
                    ->insertGetId(['ip'=>$ip,'or'=>0,'ors'=>'织金','name'=>$name,'sex'=>$sex,'time'=>time()]);
                    $data = \DB::table('question')->where('id',$id)->first();
                    if($id)
                    {
                        return view('Newpro.Home.Question.zhijinphone',['data'=>$data]);

                    }else
                    {
                        return redirect('/newpro/zhijin/questionnaire/index')->with(['info'=>'无法继续完成调查']);
                    }
                }else
                {
                    return view('Newpro.Home.Question.zhijinphone',['data'=>$ress]);

                 }
        }else
        {
            \DB::table('question')->where('id',$id)->update(['name'=>$name,'sex'=>$sex]);
            $data = \DB::table('question')->where('id',$id)->first();
            return view('Newpro.Home.Question.zhijinphone',['data'=>$data]);

        }
            
            
        }
    }else
    {
         $data = \DB::table('question')->where('id',$sid)->first();
         return view('Newpro.Home.Question.defuphone',['data'=>$data]);
    }
    }

    public function zhijinqccupation(Request $request)
    {   
        $sid = $request->input('sid',false);
        if(!$sid)
        {
            $id = $request->id;
            $phone = $request->phone;

            if(!$id || !$phone )
            {   
                return redirect('/newpro/zhijin/questionnaire/index')->with(['info'=>'数据无法提交']);
            }
            \DB::table('question')->where('id',$id)->update(['phone'=>$phone]);
            $data = \DB::table('question')->where('id',$id)->first();
            return view('Newpro.Home.Question.zhijinqccupation',['data'=>$data]);

        }else

        {
            $data = \DB::table('question')->where('id',$sid)->first();
            return view('Newpro.Home.Question.zhijinqccupation',['data'=>$data]);
        }
    }
    public function zhijinresident(Request $request)
    {
        $sid = $request->input('sid',false);
        if(!$sid)
        {
            $id = $request->id;
            $qccupation = $request->qccupation;

            if(!$id || !$qccupation )
            {   
                return redirect('/newpro/zhijin/questionnaire/index')->with(['info'=>'数据无法提交']);
            }
            \DB::table('question')->where('id',$id)->update(['qccupation'=>$qccupation]);
            $data = \DB::table('question')->where('id',$id)->first();
            return view('Newpro.Home.Question.zhijinresident',['data'=>$data]);

        }else
        {   
            $data = \DB::table('question')->where('id',$sid)->first();

            return view('Newpro.Home.Question.zhijinresident',['data'=>$data]);
        }
    }

    public function zhijinservice(Request $request)
    {
        $sid = $request->input('sid',false);
        if(!$sid)
        {
            $id = $request->id;
            $resident = $request->population;

            if(!$id || !$resident )
            {   
                return redirect('/newpro/zhijin/questionnaire/index')->with(['info'=>'数据无法提交']);
            }
            \DB::table('question')->where('id',$id)->update(['resident'=>$resident]);
            $data = \DB::table('question')->where('id',$id)->first();
            return view('Newpro.Home.Question.zhijinservice',['data'=>$data]);

        }else
        {   

            $data = \DB::table('question')->where('id',$sid)->first();
            return view('Newpro.Home.Question.zhijinservice',['data'=>$data]);
        }
    }

    public function zhijincare(Request $request)
    {
        $sid = $request->input('sid',false);
        if(!$sid)
        {
            $id = $request->id;
            $service = $request->service;

            if(!$id || !$service )
            {   
                return redirect('/newpro/zhijin/questionnaire/index')->with(['info'=>'数据无法提交']);
            }
            \DB::table('question')->where('id',$id)->update(['service'=>$service]);
            $data = \DB::table('question')->where('id',$id)->first();
            if($data->care != null)
            {
                $data->care = explode(',',$data->care);

            }
            return view('Newpro.Home.Question.zhijincare',['data'=>$data]);

        }else
        {
            $data = \DB::table('question')->where('id',$sid)->first();
            if($data->care != null)
            {
                $data->care = explode(',',$data->care);

            }
            return view('Newpro.Home.Question.zhijincare',['data'=>$data]);
        }
    }
    public function zhijinstyle(Request $request)
    {
        $sid = $request->input('sid',false);
        if(!$sid)
        {
            $id = $request->id;
            $care1 = $request->care1;
            $care2 = $request->care2;
            $care3 = $request->care3;
            $care4 = $request->care4;
            $care5 = $request->care5;
            $care6 = $request->care6;
            $care7 = $request->care7;
            $care = $care1.','.$care2.','.$care3.','.$care4.','.$care5.','.$care6.','.$care7;
            if(!$id)
            {   
                return redirect('/newpro/zhijin/questionnaire/index')->with(['info'=>'数据无法提交']);
            }
            
            \DB::table('question')->where('id',$id)->update(['care'=>$care]);
            $data = \DB::table('question')->where('id',$id)->first();
            return view('Newpro.Home.Question.zhijinstyle',['data'=>$data]);

        }else
        {
            $data = \DB::table('question')->where('id',$sid)->first();
            return view('Newpro.Home.Question.zhijinstyle',['data'=>$data]);
        }
    }

    public function zhijinmoney(Request $request)
    {
        $sid = $request->input('sid',false);
        if(!$sid)
        {
            $id = $request->id;
            $style = $request->style;
            if(!$id || !$style)
            {   
                return redirect('/newpro/zhijin/questionnaire/index')->with(['info'=>'数据无法提交']);
            }
            
            \DB::table('question')->where('id',$id)->update(['style'=>$style]);
            $data = \DB::table('question')->where('id',$id)->first();
            return view('Newpro.Home.Question.zhijinmoney',['data'=>$data]);

        }else
        {
            $data = \DB::table('question')->where('id',$sid)->first();
            return view('Newpro.Home.Question.zhijinmoney',['data'=>$data]);
        }
    }

    public function zhijinintelligence(Request $request)
    {
        $sid = $request->input('sid',false);
        if(!$sid)
        {
            $id = $request->id;
            $money = $request->money;
            if(!$id || !$money)
            {   
                return redirect('/newpro/zhijin/questionnaire/index')->with(['info'=>'数据无法提交']);
            }
            
            \DB::table('question')->where('id',$id)->update(['money'=>$money]);
            $data = \DB::table('question')->where('id',$id)->first();
            return view('Newpro.Home.Question.zhijinintelligence',['data'=>$data]);

        }else
        {
            $data = \DB::table('question')->where('id',$sid)->first();
            return view('Newpro.Home.Question.zhijinintelligence',['data'=>$data]);
        }
    }

    function zhijindoor(Request $request)
    {
        $sid = $request->input('sid',false);
        if(!$sid)
        {
            $id = $request->id;
            $intelligence = $request->intelligence;
            if(!$id || !$intelligence)
            {   
                return redirect('/newpro/zhijin/questionnaire/index')->with(['info'=>'数据无法提交']);
            }
            
            \DB::table('question')->where('id',$id)->update(['intelligence'=>$intelligence]);
            $data = \DB::table('question')->where('id',$id)->first();
            return view('Newpro.Home.Question.zhijindoor',['data'=>$data]);

        }else
        {
            $data = \DB::table('question')->where('id',$sid)->first();
            return view('Newpro.Home.Question.zhijindoor',['data'=>$data]);
        }
    }

    public function zhijinfeel(Request $request)
    {
        $sid = $request->input('sid',false);
        if(!$sid)
        {
            $id = $request->id;
            $door = $request->door;
            if(!$id || !$door)
            {   
                return redirect('/newpro/zhijin/questionnaire/index')->with(['info'=>'数据无法提交']);
            }
            
            \DB::table('question')->where('id',$id)->update(['door'=>$door]);
            $data = \DB::table('question')->where('id',$id)->first();
            if($data->feel != null)
            {
                $data->feel = explode(',',$data->feel);

            }
            return view('Newpro.Home.Question.zhijinfeel',['data'=>$data]);

        }else
        {
            $data = \DB::table('question')->where('id',$sid)->first();
            if($data->feel != null)
            {
                $data->feel = explode(',',$data->feel);

            }
            
            return view('Newpro.Home.Question.zhijinfeel',['data'=>$data]);
        }
    }

    public function zhijinors(Request $request)
    {
       
        
            $id = $request->id;
            $feel1 = $request->feel1;
            $feel2 = $request->feel2;
            $feel3 = $request->feel3;
            $feel4 = $request->feel4;
            $feel5 = $request->feel5;
            
            $feel = $feel1.','.$feel2.','.$feel3.','.$feel4.','.$feel5;
            if(!$id)
            {   
                return redirect('/newpro/zhijin/questionnaire/index')->with(['info'=>'数据无法提交']);
            }
            
            \DB::table('question')->where('id',$id)->update(['feel'=>$feel,'or'=>1]);
            $data = \DB::table('question')->where('id',$id)->first();
            $arr = [
                'A户型' =>[
                    '北欧风格'=>'https://yun.kujiale.com/design/3FO4LR56GV5N/show',
                    '美式风格'=>'https://yun.kujiale.com/design/3FO4LR63C1U6/show',
                    '现代风格'=>'https://yun.kujiale.com/design/3FO4LR54EQO3/show'
                        ],
            
                'B户型' => [
                    '北欧风格'=>'https://yun.kujiale.com/design/3FO4LP7WUIF6/show',
                    '美式风格'=>'https://yun.kujiale.com/design/3FO4LP7X2455/show',
                    '现代风格'=>'https://yun.kujiale.com/design/3FO4LP877M60/show'
                        ],
            
                'C户型' => [
                    '北欧风格'=>'https://yun.kujiale.com/design/3FO4LR63Y0VQ/show',
                    '美式风格'=>'https://yun.kujiale.com/design/3FO4LR63X5SH/show',
                    '现代风格'=>'https://yun.kujiale.com/design/3FO4LR56Y30S/show'
                    ]
            ];
            $url = isset($arr[$data->door])?$arr[$data->door]:false;
            if($url == false)
            {
                return redirect('/newpro/defu/questionnaire/index')->with(['info'=>'数据无法提交']);
            }
            $datas = [];
            foreach($url as $k => $v)
            {
                if($data->style == $k)
                {
                    $datas[10] = [$data->door.$k=>$v];
                }else
                {
                    array_push($datas,[$data->door.$k=>$v]);
                }
            }
            
            return view('Newpro.Home.Question.zhijinors',['datas'=>$datas,'data'=>$data]);

       
    }
}
