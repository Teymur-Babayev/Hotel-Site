(function (jQuery) {

    $.fn.ideaboxWeather = function (settings) {
		var defaults = {
			modulid		:'ideaboxWeather',
			width		:'100%',
			themecolor		:'transparent',
			todaytext		:'Hoje',
			radius			:true,
			location		:'Campo Largo, BR',
			daycount		:7,
			imgpath			:'img/', //or http://openweathermap.org/img/w/
			template		:'vertical',
			lang			:'pt',
			metric			:'C', //F:Fahrenheit, C:Celsius
			days			:["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
			dayssmall		:["Su", "Mo", "Tu", "We", "Th", "Fr", "Sa"]
        };
        var settings = $.extend(defaults, settings);

        return this.each(function () {
            settings.modulid = "#" + $(this).attr("id");
			$(settings.modulid).css({"width":settings.width,"background":settings.themecolor});
			
			if (settings.radius)
				$(settings.modulid).addClass("ow-border");
			
			getWeather();
			
			resizeEvent();
			
			$(window).on("resize",function(){
				resizeEvent();
			});
			
			function resizeEvent()
			{
				var mW=$(settings.modulid).width();
				
				if (mW<200)
				{
					$(settings.modulid).addClass("ow-small");
				}
				else
				{
					$(settings.modulid).removeClass("ow-small");
				}
			}
			
			function getWeather()
			{
				$.get("//api.openweathermap.org/data/2.5/forecast/daily?q="+settings.location+"&mode=xml&units=metric&cnt="+settings.daycount+"&lang="+settings.lang+"&appid=0ac06341513ff205b3e3f3b6188588e3", function(data) {
					var $XML = $(data);
					var sstr = "";
					var location = $XML.find("name").text();
					$XML.find("time").each(function(index,element) {
						var $this = $(this);
						var d = new Date($(this).attr("day"));
						var n = d.getDay();
						var metrics = "";
						if (settings.metric=="F")
						{
							metrics = Math.round($this.find("temperature").attr("day") * 1.8 + 32)+"&ordm;F";
						}
						else
						{
							metrics = Math.round($this.find("temperature").attr("day"))+"&ordm;C";
						}
						
						if (index==0)
						{
							if (settings.template=="vertical")
							{
								sstr=sstr+'<div class="ow-today">'+
											'<span><img src="'+settings.imgpath+$this.find("symbol").attr("var")+'.png"/></span>'+
											'<h2>'+metrics+'<span>'+ucFirst($this.find("symbol").attr("name"))+'</span><b>'+location+' - '+settings.todaytext+'</b></h2>'+
										  '</div>';
							}
							else
							{
								sstr=sstr+'<div class="ow-today">'+
											'<span><img src="'+settings.imgpath+$this.find("symbol").attr("var")+'.png"/></span>'+
											'<h2>'+metrics+'<span>'+ucFirst($this.find("symbol").attr("name"))+'</span><b>'+location+' - '+settings.todaytext+'</b></h2>'+
									  '</div>';
							}
						}
						else
						{
							if (settings.template=="vertical")
							{
								sstr=sstr+'<div class="ow-days">'+
											'<span>'+settings.days[n]+'</span>'+
											'<p><img src="'+settings.imgpath+$this.find("symbol").attr("var")+'.png" title="'+ucFirst($this.find("symbol").attr("name"))+'"> <b>'+metrics+'</b></p>'+
										'</div>';
							}
							else
							{
								sstr=sstr+'<div class="ow-dayssmall" style="width:'+100/(settings.daycount-1)+'%">'+
											'<span title='+settings.days[n]+'>'+settings.dayssmall[n]+'</span>'+
											'<p><img src="'+settings.imgpath+$this.find("symbol").attr("var")+'.png" title="'+ucFirst($this.find("symbol").attr("name"))+'"></p>'+
											'<b>'+metrics+'</b>'+
										'</div>';
							}
						}
					});
					
					$(settings.modulid).html(sstr);			
				});
			}
			
			
			function ucFirst(string) 
			{
				return string.substring(0, 1).toUpperCase() + string.substring(1).toLowerCase();
			}
        });


    };

})(jQuery);