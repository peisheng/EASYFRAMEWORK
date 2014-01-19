// JavaScript Document
(function () {
	 $.fn.tbSwitching = function(options){
	 	options = $.extend({
					action:'click',       // hover ，click 
					ac:""	//  切换显示效果
					},options); 
		
		
		return this.each(function () {
			//初始化参数          
			
			var $tb_btns = $("div[rel='tb-btn']",this),
				$tb_btn = $tb_btns.find("div[rel='btn']"),
				$tb_boxs = $("> div[rel='tb-box']",this);
			
			
			
			// 1 先隐藏tb_boxs 
				$tb_boxs.hide();
			// 2 默认显示第一项内容
				changeTb(0);
			// 3 切换函数
			function changeTb(index){
				$tb_btn.removeClass(options.ac).eq(index).addClass(options.ac);
				$tb_boxs.hide().eq(index).show();
			}
			// 4 触发方法
			if(options.action == "hover")
				$tb_btn.mouseenter(function(){
					  
					changeTb($(this).index());
				});
			else if (options.action == "click")
			
				$tb_btn.click(function(){
					changeTb($(this).index());
				});
		});
	 };
})(jQuery);