/**
 * Created by Administrator on 2018\1\31 0031.
 */

    

$(".Next a").click(function(){

	var fengge = $("input[type='radio']:checked").val();
	var id = $("input[type='hidden']").val();
		if(fengge == null || id == null)
		{
			return false;
		}else
		{
			$.ajax('/newpro/defu/questionnaire/ors',{
				type : 'GET',
				data:{id:id,fengge:fengge},
				dataType:'json',
				success : function(data)
				{
					if(data == 1)
					{	
						$('.Next a').html('问卷调查完成');
						if (confirm("问卷调查完成即将关闭页面")){
        					window.opener=null;
        					window.open('','_self');
        					window.close();
    						}
    						else{}
						$('.Next a').unbind();
    							

					}else
					{
						alert('提交失败！');
						return false;
					}
				},
				error : function(data)
				{
					alert('提交失败！');
				}
			})
		}
    
});