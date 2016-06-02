$(document).ready(function(){
	
		//$("p").css("border","2px solid grey");
		$("#div3").mouseout(function(){$("#div1").hide();
										$("#div2").hide();});
		$("#div3").click(function(){$("#div1").show();
									$("#div2").hide();});
		$("#div4").mouseout(function(){$("#div2").hide();
										$("#div1").hide();});
		$("#div4").click(function(){$("#div2").show();
									$("#div1").hide();});
		$("#div1").mouseover(function(){$("#div1").show();});
		$("#div2").mouseover(function(){$("#div2").show();});
		$("h1").mouseover(function(){
					$(this).css({"color":"#090"});		
		});
		$("h1").mouseout(function(){
					$(this).css({"color":"red"});		
		});
		
		
	});
	function miseazero(){
		selectComboValue("consigne",0);
			selectComboValue("securite",0);
			selectComboValue("spectacle",0);
			selectComboValue("dedicace",0);
	}
//	if(window.attachEvent) window.attachEvent("onload",selectComboValue("consigne",0));
	function selectComboValue(comboId, comboval) {
                comboBox=document.getElementById(comboId);
 
                if (comboBox) {
                    for(var i=0;i<=comboBox.length-1;i=i+1) {
                        var text=comboBox.options[i].value;
                        if(text==comboval)
                        {
                            comboBox.selectedIndex=i;
                            break;
                        }
                    }
                }
            }