var _sf_startpt=(new Date()).getTime()
var headerSwap = {
	images: null,
	imagesDir: "/assets/clubimages/header-swap/",
	
	setImage: function(){
		var 
			randomIndex = Math.floor(Math.random() * headerSwap.images.length),
			imagePath = headerSwap.imagesDir + headerSwap.images[randomIndex];
		
		$('#header-swap').css("background", "url(" + imagePath + ") no-repeat top left");
	}
};

$.ns('nflcs.gbl.ThumbHover', {
	init: function(elements){
		this.load(elements);
	},
	load: function(elements){
		$(elements).each(function(){
			var imageLink = $(this).find('a'),
				itemLink = $(this).parent().find('h3 a');
			
			$(imageLink).hover(
				function(){
					$(itemLink).addClass('hover');
				},
				function(){
					$(itemLink).removeClass('hover');
				}
			);
			$(itemLink).hover(
				function(){
					$(imageLink).addClass('hover');
				},
				function(){
					$(imageLink).removeClass('hover');
				}
			);
		});
	}
});

$(document).ready(function(){
	nflcs.gbl.ThumbHover.init($('#footer-content .thumb, #lp-main-content .thumb, #featured-lp .thumb, #account-manager-tickets .content-list .thumb, #gameday-qwest-field .thumb, #hp-features .thumb, #hp-media .thumb'));
});

$.ns('nflcs.gbl.mod.PromoTabs', {
    init: function(options) {
		$.chainLoad([nflcsAssetPath+'nfl-assets/js/jquery.ui.core.min.js', nflcsAssetPath+'nfl-assets/js/jquery.ui.widget.min.js', nflcsAssetPath+'nfl-assets/js/jquery.ui.tabs.min.js'], function(){
			nflcs.gbl.mod.PromoTabs.load(options);
		});
	},
	settings:{
	},
	buildDOM: function(){
		var container = this.settings.container;
			tabsContainer = $(container).find('ul.tabs'),
			promoContent = this.settings.promoContent,
			tabIndex = 0;
		console.log(promoContent.length);
		$(promoContent).each(function(i, item){
			var //item = promoContent[i],
				newLi = $('<li>'),
				newPane = $('<div>');
			
			$(newPane).attr('id', 'pane-' + i).append(
				$('<a title="' + item.title + '" href="' + item.link + '"><img width=300 height=235 src="' + item.image + '"/></a>')
			);
			$(newLi).append($('<a href="#pane-' + i + '"></a>').data('title', item.title));
			$(tabsContainer).append(newLi);
			$(container).append(newPane);
			tabIndex++;
		});
	},
	load: function(options){
		if(options)
			$.extend(this.settings, options);
		this.buildDOM();
		var modTitle = $(this.settings.container).parent().find('div.mod-title h2 span');
		$(this.settings.container).tabs({
			show: function(event, ui){
				$(modTitle).html($(ui.tab).data('title'));
			}
		});
	}
});

//# jQuery - Horizontal Accordion
//# Version 2.00.00 Alpha 1
//#
//# portalZINE(R) - New Media Network
//# http://www.portalzine.de
//#
//# Alexander Graef
//# portalzine@gmail.com
//# Edited by Matthew Marcus, NFL Network
//#
//# Copyright 2007-2009

(function($) {
	$.hrzAccordion = {
	
		loadAds: function(i, container, adCount){
			for(var count = 1; count <= adCount; count++){
				var 
					paneContent = $("#"+container+"Content"+i).find('div.pane-content');
					ad = nflcsadsReg.pop();
				var adframe = "#iframe"+ad.id;
				var iframeAd = '<iframe width="' + ad.width + '" id="' + adframe.replace("#","") + '" height="' + ad.height + '" scrolling="no" frameborder="0" src="' + ad.url + ';ord=' + window.jsRand + '" marginwidth="0" marginheight="0"></iframe>';
				$(adframe,document).replaceWith(iframeAd); 
			};
		},
		
		animatePane: function(i, container, finalWidth, settings){
			var
				consolidatedWidth;
			$('#' + container + ' [id*='+container+'Handle]').attr("rel",""); 
			$('#' + container + ' [id*='+container+'Handle]').removeClass(settings.handleClassSelected);
			$("#"+container+"Content"+i).css({width: finalWidth+"px"}).show();
			$("#"+container+"Handle"+i).addClass(settings.handleClassSelected);
						
			if($('#' + container + ' [rel='+container+'ContainerSelected]').get(0)  ){
				$('#' + container + ' [rel='+container+'ContainerSelected]').data('status',1);
				$('#'+container+'Content'+i).css("opacity","1");
				$('#' + container + ' li [rel='+container+'ContainerSelected]').animate({width: "0px", opacity:"0"}, {
					queue:true,
					duration:settings.speed,
					easing:settings.easeAction,
					complete: function(){
						$('[rel='+container+'ContainerSelected]').data('status',0);
						$(this).hide();
						$("#" + container + ' .' + settings.listItemClass + ' .' + settings.handleClass).each(function(){
							if(!$(this).hasClass(settings.handleClassSelected)){
								$(this).show();
							}
							else{
								$(this).hide();
								if($('#' + container + 'Content' + i).hasClass('middle-' + settings.contentContainerClass)){
									$('#' + container + 'Content' + i).css('padding', '0 5px');
								}
							}
						});
						$('#' + container).show();
					},
					step: function(now){
						width = $(this).width();
						new_width = finalWidth - width;
						$('#'+container+'Content'+i).width(Math.ceil(new_width));
					}
				});
			}
			
			$('#' + container + ' li [id*='+container+'Content]').attr("rel","");			
			$("#"+container+"Handle"+i).attr("rel",container+"HandleSelected");
			$("#"+container+"Content"+i).attr("rel",container+"ContainerSelected");	
		},
		
		arrangeHandle: function(i, container, settings){
			var
				currentHandle = $("#" + container + ' .' + settings.handleClassSelected),
				selectedHandle = $("#" + container + 'Handle' + i),
				selectedLi = $("#" + container + "ListItem" + i);
			if($(currentHandle).attr('id') == container + 'Handle' + Number(i + 1)){
				$(selectedLi).append(selectedHandle);
			}
			else{
				$(selectedLi).prepend(selectedHandle);
			}
			
		},
		
		setOnEvent: function(i, container, finalWidth, settings){
			$("#"+container+"Handle"+i).bind(settings.eventTrigger,function() {			 
				var 
					status = $('[rel='+container+'ContainerSelected]').data('status'),
					ajaxUrl = $(this).attr('ajax_url');
					
				if($('#' + container + 'Content' + i).hasClass('middle-' + settings.contentContainerClass)){
					$('#' + container + 'Content' + i).css('padding', '0');
					$.hrzAccordion.arrangeHandle(i, container, settings);
				}
				
				if(status ==1 && settings.eventWaitForAnim === true){
					return false;	
				}
				
				if( $("#"+container+"Handle"+i).attr("rel") != container+"HandleSelected"){
					settings.eventAction();
					if(ajaxUrl){
						var
							ajaxOptions = settings.ajaxOptions,
							paneContent = $("#"+container+"Content"+i).find('div.pane-content'),
							listItem = $('#'+container+"ListItem"+i);
						
						if($(listItem).data('loaded') != true){
							if(settings.useCacheBuster)
								ajaxUrl += '?' + settings.cacheBuster;
							$.extend(ajaxOptions,{
								url: ajaxUrl,
								dataType: 'html',
								beforeSend: function(){
									$("#"+container+"Handle"+i).find('.' + settings.spinnerClass).show();
								},
								success: function(response){
									var	
										newAds = $(response).find('.ad-bottom, .ad-top, .ad-chrome');
									
									if($(newAds).length > 0){
										var
											loadAdsCall = $('<script/>'),
											scriptText = '$(document).ready(function(){$.hrzAccordion.loadAds(' + i + ', "' + container + '", ' + $(newAds).length + ');});',
											scriptString = '<script type="text/javascript" language="javascript">$(document).ready(function(){$.hrzAccordion.loadAds(' + i + ', "' + container + '", ' + $(newAds).length + ');});</script>';
										
										response += scriptString;
									}
									
									$(paneContent).html(response);
									if(nflcs.gbl.ThumbHover){
										nflcs.gbl.ThumbHover.init($(paneContent).find('.thumb'));
									}
									
									$("#"+container+"Handle"+i).find('.' + settings.spinnerClass).hide();
									$(listItem).data('loaded', true);
									$.hrzAccordion.animatePane(i, container, finalWidth, settings);
								},
								error: function(HttpXmlRequest, message, errorThrown){
									console.log("Status: " + HttpXmlRequest.status + ' ' + HttpXmlRequest.statusText);
									console.log('Message: ' + message);
								}
							});
							
							$.ajax(ajaxOptions);
						}
						else
							$.hrzAccordion.animatePane(i, container, finalWidth, settings);
					}
					else
						$.hrzAccordion.animatePane(i, container, finalWidth, settings);
				}
			});	
		}
	};
	
	$.fn.extend({
	   
		hrzAccordionLoop: function(options) {
			return this.each(function(a){  
				
				var container = $(this).attr("id") || $(this).attr("class");
				var elementCount = $('#'+container+' > li, .'+container+' > li').size();
				var settings = $(this).data('settings');
				
				variable_holder="interval"+container ;
				var i =0;
				var loopStatus  = "start";
				
				variable_holder = window.setInterval(function(){							
				
				$("#"+container+"Handle"+i).trigger(settings.eventTrigger);
				
				if(loopStatus =="start"){
						i = i + 1;
					}else{
						i = i-1;	
					}
					
					if(i==elementCount && loopStatus  == "start"){
						loopStatus  = "end";
						i=elementCount-1;

					}
					
					if(i==0 && loopStatus  == "end"){
						loopStatus  = "start";
						i=0;

					}
												},settings.cycleInterval);
				
				
				});
			},
		hrzAccordion: function(options) {
			this.settings = {
				eventTrigger	   		: "click",
				containerClass     		: "container",
				listItemClass      		: "listItem",					
				contentContainerClass  	: "contentContainer",
				contentWrapper     		: "contentWrapper",
				contentInnerWrapper		: "contentInnerWrapper",
				handleClass        		: "handle",
				handleClassOver    		: "handle-over",
				handleClassSelected		: "handle-open",
				handlePosition     		: "right",
				handlePositionArray		: "", // left,left,right,right,right
				easeAction				: 'linear',
				speed     			    : 500,
				openOnLoad		   		: 1,
				hashPrefix		   		: "tab",
				eventAction		   		: function(){
										},
				completeAction	   		: function(){
										//add your own onComplete function here
										},
				cycle			   		: false, // not integrated yet, will allow to cycle through tabs by interval
				cycleInterval	   		: 10000,
				fixedWidth				: 560,
				eventWaitForAnim		: true,
				ajaxOptions				: {
											type: 'GET',
											dataType: 'HTML',
											cache: true
										},
				spinnerImage			: "/images/ajax-spinner.gif",
				spinnerClass			: 'spinner',
				titlesSpriteImage		: '/clubimages/accordion-titles-spr.png',
				useCacheBuster 			: false,
				cacheBuster				: Math.ceil(Math.random()*10000),
				fragmentsDir			: '/fragments/',
				fragments				: ''
			};
	
			if(options){
				$.extend(this.settings, options);
			}
				var settings = this.settings;
			
			return this.each(function(a){    		
				
				var container = $(this).attr("id") || $(this).attr("class");			
				
				$(this).data('settings', settings);
				
				var elementCount = $('#'+container+' > li, .'+container+' > li').size();
												
				var containerWidth =  $(this).find("."+settings.containerClass).width();
				
				var handleWidth = $(this).find("."+settings.handleClass).outerWidth(true);
		
			    var finalWidth;
				var handle;
				if(settings.fixedWidth){
					finalWidth = settings.fixedWidth;
				}else{
					finalWidth = containerWidth-((elementCount - 1 )*handleWidth);
				}
				$('#'+container+' > li, .'+container+' > li').each(function(i) {
			
					$(this).attr('id', container+"ListItem"+i);
			   		$(this).attr('class',settings.listItemClass);
		       		$(this).html("<div class='"+settings.contentContainerClass+"' id='"+container+"Content"+i+"' style=\"display:none;\">"
								 +"<div class=\""+settings.contentWrapper+"\">"
								 +"<div class=\""+settings.contentInnerWrapper+"\">"
								 +$(this).html()
								 +"</div></div></div>");
					$(this).data('loaded', false);
					
					if($("div",this).hasClass(settings.handleClass)){
						
						var html = $("div."+settings.handleClass,this).attr("id", container+"Handle"+i).html();
						$("div."+settings.handleClass,this).remove();
						
						 handle = $("<div class='" + settings.handleClass + "' id='"+container+"Handle"+i+"'>"+html+"</div>");
					}else{
						handle = $("<div class='" + settings.handleClass + "' id='"+container+"Handle"+i+"'></div>");
					}
					
					switch (i){
						case (elementCount - 1):
						case (0):
							$("#" + container + "Content" + i).addClass('end-' + settings.contentContainerClass);
							$(handle).addClass('end-' + settings.handleClass);
							break;
						default:
							$("#" + container + "Content" + i).addClass('middle-' + settings.contentContainerClass);
							$(handle).addClass('middle-' + settings.handleClass);
							break;
					}
					
					$(handle).find('.handle-title').css({
						backgroundImage: 'url(' + settings.titlesSpriteImage + ')'
					});

					
					$(this).find('.' + settings.contentContainerClass + ' .pane-title').css({
						backgroundImage: 'url(' + settings.titlesSpriteImage + ')'
					});
			
					
					var spinnerImg = $('<img class="' + settings.spinnerClass + '" src="' + settings.spinnerImage + '">');
					$(handle).attr('ajax_url', settings.fragmentsDir + settings.fragments[i]).append(spinnerImg);
					$(spinnerImg).hide();
					
					if(settings.handlePositionArray){
						splitthis 				= settings.handlePositionArray.split(",");
						settings.handlePosition = splitthis[i];
					}
					
					if(i == elementCount - 1)
						$(this).prepend( $(handle) );
					else
						$(this).append( $(handle) );

					$("#"+container+"Handle"+i).bind("mouseover", function(){
						$("#"+container+"Handle"+i).addClass(settings.handleClassOver);
					});
			    
					$("#"+container+"Handle"+i).bind("mouseout", function(){
						if( $("#"+container+"Handle"+i).attr("rel") != "selected"){
							$("#"+container+"Handle"+i).removeClass(settings.handleClassOver);
						}
					});
					
					
					$.hrzAccordion.setOnEvent(i, container, finalWidth, settings);				
					
					if(settings.openOnLoad !== false && i == elementCount-1){
						$(document).ready(function(){
							var location_hash = location.hash;
							location_hash  = location_hash.replace("#", "");	
							if(location_hash.search(settings.hashPrefix) != '-1' ){
							var tab = 1;
							location_hash  = location_hash.replace(settings.hashPrefix, "");
							}
							
							if(location_hash && tab ==1){
						 		$("#"+container+"Handle"+(location_hash)).attr("rel",container+"HandleSelected");
								$("#"+container+"Content"+(location_hash)).attr("rel",container+"ContainerSelected");		
								$("#"+container+"Handle"+(location_hash-1)).trigger(settings.eventTrigger);
												
							}else{
								$("#"+container+"Handle"+(settings.openOnLoad-1)).hide();
							    $("#"+container+"Content"+(settings.openOnLoad)).attr("rel",container+"ContainerSelected");
								$("#"+container+"Handle"+(settings.openOnLoad-1)).trigger(settings.eventTrigger);
							}
						});
					}	
				});	
				
				if(settings.cycle === true){
					$(this).hrzAccordionLoop();
				}
			});				
		}		
	});
})(jQuery);	