var commomModule = (function ($) {

	//验证码倒计时
	var codeCountDown = function ($me, time) {
		if (!$me.hasClass('active')) {
			$me.time = time || 60;
			$me.addClass('active');
			$me.html('重新获取(' + $me.time + '秒)');
			$me.timer = setInterval(function () {
				$me.time--;
				$me.html('重新获取(' + $me.time + '秒)');
				if ($me.time == 0) {
					clearInterval($me.timer);
					$me.html('重新发送验证码').removeClass('active');
				}
			}, 1000);
		} else {
			return false;
		}
	};

	return {
		// scrollbarWidth: scrollbarWidth,$(this),60
		codeCountDown: codeCountDown
	}
})(jQuery);



(function($){
	$().ready(function(){
		/*$('.level').animate({
			'width':$(this).attr('levelNum')
		},800)*/
		$('.level').each(function(){
			var levelNum=$(this).attr('levelNum');
			$(this).animate({
				'width':levelNum
			},800)
		})

		// $('.user_right').load('account_load.html')

		//header load
		$('.user_con').on('click','.userbasic_head a',function(){
			var loadUrl=$(this).attr('_href');
			$('.loading_shadow').show();
			$('.user_right').load(loadUrl,function(responseTxt,statusTxt,xhr){
				if(statusTxt=="success"){
					$('.loading_shadow').hide();
					$('.level').each(function(){
						var levelNum=$(this).attr('levelNum');
						$(this).animate({
							'width':levelNum
						},800)
					});
					//会员存款
					$('.bankchoose_list li:gt(5)').hide();
				}
			    if(statusTxt=="error"){
			    	alert("Error: "+xhr.status+": "+xhr.statusText);
			    	$('.loading_shadow').hide();
			    }
			      
			})
		})

		$('.user_con').on('click','.lock_list li .bot button',function(){
			var _this=$(this)
			$(this).hide();;
			$(this).next('.lock_line').show();
			$(this).next('.lock_line').children('.level').animate({
				'width':'100%'
			},800,function(){
				_this.addClass('success').show();
				_this.next('.lock_line').hide()
				_this.attr('disabled',true)
			})
		});

		$('.user_left').on('click','li',function(){
			$('.user_left li').removeClass('active');
			$(this).addClass('active');
		});

		$('.user_con').on('click','.toggle_more a',function(){
			$('.bankchoose_list li:gt(5)').toggle();
		})

		/*$('.user_con').on('click','.ways .show_bank',function(){
			$('.choosebank').show();
		})
		$('.user_con').on('click','.account_index .show_bank',function(){
			$('.choosebank').show();
			$('.green_pass').hide();
		})
		$('.user_con').on('click','.account_index .ways_box',function(){
			$('.account_index .ways_box').removeClass('active');
			$(this).addClass('active');
		})
		$('.user_con').on('click','.account_index .green_way',function(){
			$('.choosebank').show();
			$('.green_pass').show();
			$('.account_form .green_tips').show();

		})
		$('.user_con').on('click','.account_index .wechar_pay',function(){
			$('.choosebank').hide();
			$('.green_pass').hide();

		})*/
		$('.user_con').on('click','.account_index .wechar_pay',function(){
			$('.pay_toggle_tips').hide();

		})
		$('.user_con').on('click','.account_index .card_pay',function(){
			$('.pay_toggle_tips').show();

		})

		//nav 
		$(window).scroll(function(){
			navToggle();
			console.log('a');
		})
		navToggle();
		function navToggle(){
			if($('body').scrollTop()>=10){
				$('.header_hd').slideUp('fast');
				$('.header_bd').slideUp('fast');
				$('.nav').addClass('minnav');
			}else{
				$('.header_hd').slideDown('fast');
				$('.header_bd').slideDown('fast');
				$('.nav').removeClass('minnav');
			}
		}

		//egameslide
		$('.hot_recommond li').hover(function(){
			$('.hot_recommond li').removeClass('on');
			$(this).addClass('on');
		})

		//收藏 egame
		var offset = $(".love").offset(); 
		console.log(offset);
	    $(".addcar").click(function(event){
	        var addcar = $(this); 
	        var img = addcar.parents('.scrollLoading').find('img').attr('src'); 
	        var flyer = $('<img class="u-flyer" src="'+img+'">'); 
	        flyer.fly({ 
	            start: { 
	                left: event.pageX, //开始位置（必填）#fly元素会被设置成position: absolute 
	                top: event.pageY //开始位置（必填） 
	            }, 
	            end: { 
	                left: offset.left+50, //结束位置（必填） 
	                top: offset.top, //结束位置（必填） 
	                width: 0, //结束时宽度 
	                height: 0 //结束时高度 
	                

	            }, 
	            speed: 1.1, 
	            onEnd: function(){ //结束回调 
	                /*addcar.css("cursor","default").removeClass('orange').unbind('click'); 
	                this.destory(); //移除dom */
	               
	            } 
	        }); 
	    });


	})
})(jQuery);

/*导航下拉菜单 最新的JS  下拉菜单移到body外面 （如果banner挡住下拉菜单就把下拉菜单移到body外面做， 下拉菜单通栏也可以用这个来做)*/
//$(function () {
//	var options = {
//		nav_menuClass: ".nav",//一级导航的class名称
//		secMenu: ["#list2", "#list3", "#list4", "#list5", "#list6", "#list7"],   //下拉菜单的id 名称 要是多个下拉的话就在后面加（, "#list3"）
//		index: [1, 2, 3, 4, 5, 6]             //导航上的第几个菜单下面有下拉菜单 ，注释：从0开始计算的，要是多个下拉的话就在后面加（,4）
//	}
//	new InitNav(options);
//})
//function InitNav(options) {
//	this.nav_menuClass = options.nav_menuClass;
//	this.secMenu = options.secMenu;
//	this.index = options.index
//	this.menuHeight = $(this.nav_menuClass).height();
//	this.menuObj = $(this.nav_menuClass + " >li");
//
//	var _this = this;
//
//	for (var i = 0, l = this.index.length; i < l; i++) {
//		this.menuObj.eq(this.index[i]).bind({
//			mouseenter: function (ev) {
//
//				var targetObj = $((ev.currentTarget) ? ev.currentTarget : ev.srcElement);
//				var subMenuIdx = _this.getIdx(ev);
//
//				//console.log("menuIn. clear subMenuOutTimeId timeId", $(_this.secMenu[subMenuIdx]).data("subMenuOutTimeId"));
//
//				clearTimeout($(_this.secMenu[subMenuIdx]).data("subMenuOutTimeId"));
//
//				if ($(_this.secMenu[subMenuIdx]).is(":visible")) {
//					//console.log("二级菜单已经显示");
//					return;
//				}
//
//				var timeId = setTimeout(function () {
//					_this.showDropDownList(targetObj, ev);
//				}, 200);
//				targetObj.data("menuInTimeId", timeId);
//				//console.log("set menuInTimeId timeId", timeId);
//			},
//			mouseleave: function (ev) {
//				var targetObj = $((ev.currentTarget) ? ev.currentTarget : ev.srcElement);
//				clearTimeout(targetObj.data("menuInTimeId"));
//				var timeId = setTimeout(function () {
//					_this.hideDropDownList(ev);
//				}, 100);
//				targetObj.data("menuOutTimeId", timeId);
//				//console.log("set menuOutTimeId timeId", timeId);
//			}
//		});
//		//绑定二级菜单
//		$(this.secMenu[i]).bind({
//			mouseenter: function (ev) {
//				var parentIdx = _this.getParentIdx(ev);
//				//console.log("submenuIn. clear menuleave timeId", $(_this.menuObj[parentIdx]).data("menuOutTimeId"));
//				clearTimeout($(_this.menuObj[parentIdx]).data("menuOutTimeId"));
//				return false;
//			},
//			mouseleave: function (ev) {
//				var targetObj = $((ev.currentTarget) ? ev.currentTarget : ev.srcElement);
//				var timeId = setTimeout(function () {
//					targetObj.slideUp();
//				}, 100);
//				targetObj.data("subMenuOutTimeId", timeId);
//				//console.log("set subMenuOutTimeId timeId", timeId);
//			}
//		});
//	}
//}
//InitNav.prototype.hideDropDownList = function (ev) {
//	var idx = this.getIdx(ev);
//	$(this.secMenu[idx]).slideUp();
//}
//InitNav.prototype.getIdx = function (ev) {
//	var targetObj = $((ev.currentTarget) ? ev.currentTarget : ev.srcElement);
//	var idx;
//	for (var i = 0, l = this.index.length; i < l; i++) {
//		if (this.menuObj.index(targetObj) == this.index[i]) {
//			idx = i;
//		}
//	}
//	return idx;
//}
//InitNav.prototype.showDropDownList = function (targetObj, ev) {
//	var idx = this.getIdx(ev);
//	var leftRange = targetObj.offset().left;
//	var topRange = targetObj.offset().top + this.menuHeight;//targetObj.height();
////    console.log(targetObj.offset().top , targetObj.height(), topRange);
//
//	//若当前二级菜单的父级不为body，则移到body
//	//console.log("aaaa",$(this.secMenu[idx]));
//
//	//if ($(this.secMenu[idx]).parent()[0].tagName != "BODY") {
//		$(this.secMenu[idx]).appendTo("body");
//	//}
//
//
//	var _this = this;
//
//	$(this.secMenu[idx]).slideDown();
//
//	/*$(this.secMenu[idx]).css({
//	 "left" : leftRange + "px",
//	 "top" : topRange + "px",
//	 "position" : "absolute"
//	 }).slideDown();*/
//}
//InitNav.prototype.getParentIdx = function (ev) {
//	var targetObj = $((ev.currentTarget) ? ev.currentTarget : ev.srcElement);
//	var idx;
//	for (var i = 0, l = this.secMenu.length; i < l; i++) {
//		if ("#" + targetObj[0].id == this.secMenu[i]) {
//			idx = i;
//		}
//	}
//	return this.index[idx];
//}
////导航下拉菜单 end
//
////==================================首页导航文字滚动  end
//$(function () {
//	var _wrap = $('ul.webAdd'); //定义滚动区域 'ul.webAdd'
//	var _interval = 2000; //定义滚动间隙时间
//	var _moving; //需要清除的动画
//	_wrap.hover(function () {
//			clearInterval(_moving); //当鼠标在滚动区域中时,停止滚动
//		},
//		function () {
//			_moving = setInterval(function () {
//					var _field = _wrap.find('li:first'); //此变量不可放置于函数起始处,li:first取值是变化的
//					var _h = _field.height(); //取得每次滚动高度(多行滚动情况下,此变量不可置于开始处,否则会有间隔时长延时)
//					_field.animate({
//							marginTop: -_h + 'px'
//						},
//						600,
//						function () { //通过取负margin值,隐藏第一行
//							_field.css('marginTop', 0).appendTo(_wrap); //隐藏后,将该行的margin值置零,并插入到最后,实现无缝滚动
//						})
//				},
//				_interval) //滚动间隔时间取决于_interval
//		}).trigger('mouseleave'); //函数载入时,模拟执行mouseleave,即自动滚动
//});
////==================================首页导航文字滚动  end
//
//
$(function(){
	Init(); //==原地切换轮播 点击左右按钮播下一张上一张
	//initSlideBanner();//===滚动轮播

	//==========轮播 end
});
//====只能二选一


//============  原地切换轮播 点击左右按钮播下一张上一张
function Init(){
	var options = {
		imgAreaId :  ".mianbanner", //banner图容器的 Id 或者 class
		leftId : ".nivo-prevNav",//向左的按钮
		RightId : ".nivo-nextNav",//向右的按钮
		controlId : ".lunbo",   //banner图对应的导航点的容器的 Id 或者 class
		animate : "fade",//fade放在引号内就表示淡入淡出
		timer : "5000"  //动画间隔
	}

	var lunbo = new BannerSlide(options);
}

jQuery(".nivoSlider").hover(function() {
		jQuery(this).find(".nivo-prevNav,.nivo-nextNav").stop(true, true).fadeTo("show", 1)
	},
	function() {
		jQuery(this).find(".nivo-prevNav,.nivo-nextNav").fadeOut()
	});



var SlideAnimateCollection = {
	"default":function(scope){
		scope.sliderLis.has(":visible").hide();
		scope.sliderLis.eq(scope.current).show();
	},
	"fade":function(scope){
		scope.sliderLis.has(":visible").fadeOut(600);//括号为毫秒数  渐变淡出时间
		scope.sliderLis.eq(scope.current).fadeIn(600);//渐变淡入时间
	},
	"scroll":function(scope){
		scope.sliderLis.parent().append(scope.sliderLis.html());
		return;
		/*scope.sliderLis.eq(scope.current).find("img").animate({
		 "width" :
		 })*/
	}
}

function BannerSlide(option){
	this.imgAreaId = option.imgAreaId;
	this.leftId = option.leftId;
	this.RightId = option.RightId;
	this.controlId = option.controlId;
	this.animate = option.animate == "" ? "default" : option.animate;
	this.timer = option.timer;

	this.current = 0;
	//this.amount = $(this.imgAreaId + " li").length;

	this.sliderLis = $(this.imgAreaId + " li");
	this.amount = this.sliderLis.length;

	this.dotLis = $(this.controlId +" li");

	$(this.imgAreaId + " li:gt(0)").css("display", "none");

	var _this = this;
	this.timeId =  setTimeout(function(){
		_this.next();
	}, this.timer);

	$(this.leftId).bind("click", $.proxy(this.pre, this));
	$(this.RightId).bind("click", $.proxy(this.next, this));

	this.sliderLis.parent().hover(
		function(){
			clearTimeout(_this.timeId);
		},
		function(){
			_this.timeId = setTimeout(function(){
				_this.next();
			}, _this.timer);
		});
	//this.dotLis.bind("mouseover", $.proxy(this.specify, this));
	this.dotLis.bind({
		mouseover: function(event){
			_this.specify(event);
		},
		mouseout: function(){
			_this.timeId = setTimeout(function(){
				_this.next();
			}, _this.timer);
		}
	});
}

BannerSlide.prototype.play = function(){
	this.dotLis.parent().find("li.active").removeClass("active").addClass("bg");
	this.dotLis.eq(this.current).removeClass("bg").addClass("active");

	SlideAnimateCollection[this.animate](this);
}

BannerSlide.prototype.pre = function(){
	var _this = this;
	clearTimeout(this.timeId);

	this.current--;
	this.current = this.current % this.amount;

	this.play();

	this.timeId =  setTimeout(function(){
		_this.next();
	}, this.timer);

	return false;
}

BannerSlide.prototype.next = function(){
	var _this = this;
	clearTimeout(this.timeId);

	this.current++;
	this.current = this.current % this.amount;

	this.play();

	this.timeId =  setTimeout(function(){
		_this.next();
	}, this.timer);

	return false;
}

BannerSlide.prototype.specify = function(ev){
	clearTimeout(this.timeId);
	var _this = this,
		speIdx = this.dotLis.index($(ev.currentTarget));

	if(this.current != speIdx){
		this.current = speIdx;

		this.play();
	}
	return false;
}
































