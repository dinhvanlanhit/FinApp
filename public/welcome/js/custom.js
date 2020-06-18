$(document).ready(function(){'use strict'
var small_select=$('.sd-button');var medium_select=$('.md-button');var large_select=$('.xl-button');var round_select=$('.re-button');var square_select=$('.se-button');var sizeClasses='m-screen s-screen l-screen'
var shapeClasses='square-screen round-screen'
var smallSize='s-screen'
var mediumSize='m-screen'
var largeSize='l-screen'
var roundShape='round-screen'
var squareShape='square-screen'
var buttonsSize=$('.device-size a');var buttonsShape=$('.device-shape a');var iframeQR=$('.iframe-qr');var previewIframe=$('#preview-frame')
var HTMLIcon="./img/html_icon.png"
var AMPIcon="./img/google_amp.png"
var WPIcon="./img/wp_icon.png"
var impactDisabled=true;setTimeout(function(){$('.wrap-a, .wrap-b, .wrap-c, .sidebar-left, .siderbar-right').addClass('transitions-enabled');$('.sidebar-right').removeClass('sidebar-right-disabled');},50)
small_select.on('click',function(){$('body').removeClass(sizeClasses).addClass(smallSize)
console.log('Frame Size: Small');buttonsSize.removeClass('active-button');$(this).addClass('active-button');return false;})
medium_select.on('click',function(){$('body').removeClass(sizeClasses).addClass(mediumSize)
console.log('Frame Size: Medium');buttonsSize.removeClass('active-button');$(this).addClass('active-button');return false;})
large_select.on('click',function(){$('body').removeClass(sizeClasses).addClass(largeSize)
console.log('Frame Size: Large');buttonsSize.removeClass('active-button');$(this).addClass('active-button');return false;})
round_select.on('click',function(){$('body').removeClass(shapeClasses).addClass(roundShape)
console.log('Frame Shape: Round');buttonsShape.removeClass('active-button');$(this).addClass('active-button');return false;})
square_select.on('click',function(){$('body').removeClass(shapeClasses).addClass(squareShape)
console.log('Frame Shape: Square');buttonsShape.removeClass('active-button');$(this).addClass('active-button');return false;})
var sizeButton=$('.size-button');var deviceStyles=$('.device-styles');var styleButton=$('.style-button');var productStyles=$('.product-styles');sizeButton.on('click',function(){sizeButton.find('i').toggleClass('rotate-180');deviceStyles.toggleClass('device-styles-active')
styleButton.find('i').removeClass('rotate-180');productStyles.slideUp(250);return false;});styleButton.on('click',function(){styleButton.find('i').toggleClass('rotate-180');productStyles.slideToggle(250);sizeButton.find('i').removeClass('rotate-180');deviceStyles.removeClass('device-styles-active')
return false;});var productsButton=$('.products-button');var productSlider=$('.product-slider');$('body').append('<div class="hider"></div>');var pageHider=$('.hider');productsButton.on('click',function(){productSlider.addClass('product-slider-active');pageHider.addClass('hider-active');return false;});pageHider.on('click',function(){productSlider.removeClass('product-slider-active');pageHider.removeClass('hider-active');return false;});new Date($.now());var dateNow=new Date();var currentTime=dateNow.getHours()+""+dateNow.getMinutes()+""+dateNow.getSeconds();var outputJSON='js/output.json?ver='+currentTime;var showcaseJSON='js/showcase.json?ver='+currentTime;var itemObjectArray={}
function clearConsole(){}
setTimeout(function(){$.ajax({url:showcaseJSON,dataType:"json",success:function(ads){var totalAds=ads.length;var randomAd=Math.floor((Math.random()*totalAds));$('.sidebar-left').append('<a href='+ads[randomAd].ad_button_link+' target="_blank" ><img src='+ads[randomAd].ad_img+' alt="Enabled Product Image"></a>');$('.sidebar-left').append('<h1 style="font-size:'+ads[randomAd].ad_title_size+'px">'+ads[randomAd].ad_title+'</h1>');$('.sidebar-left').append('<span style="color:'+ads[randomAd].ad_subtitle_color+'; font-size:'+ads[randomAd].ad_subtitle_font_size+'px; font-weight:'+ads[randomAd].ad_subtitle_font_weight+'">'+ads[randomAd].ad_subtitle+'</span>');$('.sidebar-left').append('<p style="font-size:'+ads[randomAd].ad_description_font_size+'px; line-height:'+ads[randomAd].ad_description_line_height+'px">'+ads[randomAd].ad_description+'</p>');$('.sidebar-left').append('<a class="sidebar-left-live" href="#" data-item-live-tag='+ads[randomAd].ad_button_live+'>Click Here to View Live Demo</a>');$('.sidebar-left').append('<a class="sidebar-left-button" target="_blank" style="background-color:'+ads[randomAd].ad_button_color+';" href='+ads[randomAd].ad_button_link+'>'+ads[randomAd].ad_button_text+'</a>');$('.sidebar-left').append('<a class="sidebar-left-remove" href="#">x</a>')
if($('.sidebar-left h1').is(':empty')){$('.sidebar-left h1').remove();}
if($('.sidebar-left span').is(':empty')){$('.sidebar-left span').remove();}
if($('.sidebar-left p').is(':empty')){$('.sidebar-left p').remove();}
if($('.sidebar-left .sidebar-left-button').attr('href')=="#"){$('.sidebar-left img').css('margin-bottom','0px');$('.sidebar-left .sidebar-left-button').remove();}
$('.sidebar-left').addClass('active-sidebar-left');$('body').on('click','.sidebar-left-remove',function(){$('.sidebar-left').removeClass('active-sidebar-left');});clearConsole();return false;}});},6000);$("body").on("click",".sidebar-left-live",function(){var itemLeftLive=$(this).data('item-live-tag');$('a[data-item-id='+itemLeftLive+']').trigger('click');$('.sidebar-left').removeClass('active-sidebar-left');console.log('item change triggered');});$("body").on("click",".style-list a",function(){var previewURL=$(this).data('preview-url');$('#preview-iframe').attr('src',previewURL);})
$("body").on("mouseenter",".style-list .button",function(){var currentStyleHover=$(this).data('list-preview-number');$('#'+currentStyleHover).addClass('preview-item-visible');})
$("body").on("mouseleave",".style-list .button",function(){var currentStyleHover=$(this).data('list-preview-number');$('#'+currentStyleHover).removeClass('preview-item-visible');});function activateL(){$('.wrap-a, .wrap-b, .wrap-c, .sidebar-left, .siderbar-right').removeClass('transitions-enabled');$('body').removeClass('m-screen s-screen').addClass('l-screen');$('.device-size a').removeClass('active-button');$('.xl-button').addClass('active-button');setTimeout(function(){$('.wrap-a, .wrap-b, .wrap-c, .sidebar-left, .siderbar-right').addClass('transitions-enabled');},800)}
function activateM(){$('.wrap-a, .wrap-b, .wrap-c, .sidebar-left, .siderbar-right').removeClass('transitions-enabled');$('body').removeClass('l-screen s-screen').addClass('m-screen');$('.device-size a').removeClass('active-button');$('.md-button').addClass('active-button');setTimeout(function(){$('.wrap-a, .wrap-b, .wrap-c, .sidebar-left, .siderbar-right').addClass('transitions-enabled');},800)}
function activateS(){$('.wrap-a, .wrap-b, .wrap-c, .sidebar-left, .siderbar-right').removeClass('transitions-enabled');$('body').removeClass('l-screen m-screen').addClass('s-screen');$('.device-size a').removeClass('active-button');$('.sd-button').addClass('active-button');setTimeout(function(){$('.wrap-a, .wrap-b, .wrap-c, .sidebar-left, .siderbar-right').addClass('transitions-enabled');},800)}
function GoogleAMP(){$('.item-type').empty().append('<img src="img/google_amp.png"><p>Google AMP</p>')}
function SiteTemplate(){$('.item-type').empty().append('<img src="img/html_icon.png"><p>Site Template</p>')}
function WordPressTheme(){$('.item-type').empty().append('<img src="img/wp_icon.png"><p>WordPress Theme</p>')}
$.ajax({url:outputJSON,dataType:"json",success:function(data){data.forEach(function(itemObjectSingle){itemObjectArray[itemObjectSingle.redirect_string]=itemObjectSingle;if(itemObjectSingle.classification=='site-templates/mobile'){if(itemObjectSingle.ioverlay_title.indexOf("AMP")>=0){var itemType="Google AMP"
GoogleAMP();}else{var itemType="Site Template"
SiteTemplate();}}
if(itemObjectSingle.classification=='wordpress/mobile'){var itemType="WordPress Theme"
WordPressTheme();}
$('.product-slider').append('<a class="product-slider-item" href="#" data-item-id='+itemObjectSingle.redirect_string+' class="item"><div class="overlay"><h1>'+itemObjectSingle.ioverlay_title+'</h1><span class="overlay-type">'+itemType+'</span><span class="overlay-sales">'+itemObjectSingle.number_of_sales+' Sales</span><strong>Show Live Preview</strong></div><img class="owl-lazy" data-src="https://preview.enableds.com/preview_img/'+itemObjectSingle.preview_1+'"><h1 class="owl-title">'+itemObjectSingle.ioverlay_subtitle+'</h1>')});$('a[data-item-id]').on('click',function(){console.log('item change triggered');var dataItem=$(this).data('item-id');var itemSelectedByUser=itemObjectArray[dataItem];productStyles.slideUp(150);iframeQR.slideDown(150);if(itemSelectedByUser.classification=='site-templates/mobile'){if(itemSelectedByUser.ioverlay_title.indexOf("AMP")>=0){var itemType="Google AMP"
GoogleAMP();}else{var itemType="Site Template"
SiteTemplate();}}
if(itemSelectedByUser.classification=='wordpress/mobile'){var itemType="WordPress Theme"
WordPressTheme();}
$('.mobile-link').attr('href',itemSelectedByUser.preview_url[0].url)
$('.mobile-title').html(itemSelectedByUser.ioverlay_title)
$('#preview-iframe').attr('src',itemSelectedByUser.preview_url[0].url);$('.item-name').empty().append(itemSelectedByUser.ioverlay_title)
$('.iframe-qr img').attr('src',"https://api.qrserver.com/v1/create-qr-code/?size=180x180&data="+itemSelectedByUser.preview_url[0].url)
if(impactDisabled==false){$('.purchase-button').html('Click to Buy '+itemSelectedByUser.ioverlay_title+'<i class="fa fa-shopping-carter"></i>').attr('href',itemSelectedByUser.faq_url).attr('target','_blank');}
if(impactDisabled==true){$('.purchase-button').html('Click to Buy '+itemSelectedByUser.ioverlay_title+'<i class="fa fa-shopping-carter"></i>').attr('href',itemSelectedByUser.url).attr('target','_blank');}
$('.style-list').empty();if(itemSelectedByUser.preview_url.length==1){styleButton.hide(0);}else{styleButton.show(0);}
var current=0
itemSelectedByUser.preview_url.forEach(function(i){$('.style-list').append('<a class="button" href="#" data-list-preview-number="style-list-item-'+current+'"  data-list-preview-url='+itemSelectedByUser.preview_url[current].url+'">'+itemSelectedByUser.preview_url[current].name+'<i class="fa fa-circle">&#x25CF;</i></a><div id="style-list-item-'+current+'" class="style-list-box"><img class="style-list-box-image" src="https://preview.enableds.com/preview_img/'+itemSelectedByUser.preview_url[current].img+'"><p class="style-list-box-text"><em>Choose a style option to view it in the preview frame or scan it from your mobile to see it live on your device.<br><br> Viewing our products on actual mobile devices will greatly enhance your browsing experience.</em></p><img class="style-list-box-qr" src="https://api.qrserver.com/v1/create-qr-code/?size=180x180&amp;data='+itemSelectedByUser.preview_url[current].url+'"></div>');current++;})
productSlider.removeClass('product-slider-active');pageHider.removeClass('hider-active');if(itemSelectedByUser.preview_modes_active==1){activateS();}
if(itemSelectedByUser.preview_modes_active==2){activateM();}
if(itemSelectedByUser.preview_modes_active==3){activateL();}
clearConsole();return false;});setTimeout(function(){$('.style-list a:first-child').find('i').addClass('active-style');},500);$("body").on('click','.style-list a',function(){var newFrameURL=$(this).data('list-preview-url');var nonssl=newFrameURL
var prossl=newFrameURL.replace("http://","https://");$('#preview-iframe').attr('src',nonssl);$('.style-list a i').removeClass('active-style');$(this).find('i').addClass('active-style');});var itemLink=window.location.search;var currentActiveItem=itemLink.split(/[=&?]/)[2]
if((itemLink.split(/[=&?]/)[3])=="round"){$('body').addClass('round-screen').removeClass('square-screen');$('.device-shape a').removeClass('active-button');$('.re-button').addClass('active-button');}
if((itemLink.split(/[=&?]/)[4])=="round"){$('body').addClass('round-screen').removeClass('square-screen');$('.device-shape a').removeClass('active-button');$('.re-button').addClass('active-button');}
if((itemLink.split(/[=&?]/)[3])=="CodeCanyon"){$('.purchase-button, .products-button').addClass('disabled');$('.sidebar-right').css('margin-top','20px');$('.style-list-box').css('top','-57px');}
if((itemLink.split(/[=&?]/)[3])=="storefront"){$('.purchase-button, .products-button').addClass('disabled');$('.sidebar-right').css('margin-top','20px');$('.style-list-box').css('top','-57px');}
if((itemLink.split(/[=&?]/)[4])=="storefront"){$('.purchase-button, .products-button').addClass('disabled');$('.sidebar-right').css('margin-top','20px');$('.style-list-box').css('top','-57px');}
if((itemLink.split(/[=&?]/)[3])=="EnabledSite"){$('.desktop-view').removeClass();$('.mobile-view').remove();$('body').css('background-color','#FFFFFF');$('body').removeClass('square-screen').addClass('round-screen');$('.purchase-button, .products-button, .size-button, .iframe-qr').addClass('disabled');$('.sidebar-right').css('margin-top','20px');$('.products-button, .style-button, .sidebar-left').remove();setTimeout(function(){$('body').removeClass(sizeClasses).addClass(mediumSize)},500);}
var productSlider=$('.product-slider');productSlider.owlCarousel({nav:true,dots:false,stagePadding:28,margin:0,lazyLoad:true,responsive:{7000:{items:10},3000:{items:8},2500:{items:6},1900:{items:6},1700:{items:5},1500:{items:5},1300:{items:4}},autoplay:false});try{var previewURL=itemObjectArray[currentActiveItem].preview_url[0].url
var nonssl=previewURL
var prossl=previewURL.replace("http://","https://");if(itemObjectArray[currentActiveItem].classification=='site-templates/mobile'){if(itemObjectArray[currentActiveItem].ioverlay_title.indexOf("AMP")>=0){var itemType="Google AMP"
GoogleAMP();}else{var itemType="Site Template"
SiteTemplate();}}
if(itemObjectArray[currentActiveItem].classification=='wordpress/mobile'){var itemType="WordPress Theme"
WordPressTheme();}
setTimeout(function(){$('.preparing-text').html(itemObjectArray[currentActiveItem].ioverlay_title+' Live Preview Loaded');$('#preloader').addClass('preloader-hide');$('.mobile-view, .desktop-view').css('opacity','1');setTimeout(function(){$('.preparing-text').addClass('remove-preparing');},1000);$('.wrap-c').css('opacity','1');},1000);if(itemObjectArray[currentActiveItem].preview_modes_active==1){activateS();}
if(itemObjectArray[currentActiveItem].preview_modes_active==2){activateM();}
if(itemObjectArray[currentActiveItem].preview_modes_active==3){activateL();}
$('.mobile-link').attr('href',itemObjectArray[currentActiveItem].preview_url[0].url)
$('.mobile-title').html(itemObjectArray[currentActiveItem].ioverlay_title)
if(impactDisabled==false){$('.purchase-button').html('Click to Buy '+itemObjectArray[currentActiveItem].ioverlay_title+'<i class="fa fa-shopping-carter"></i>').attr('href',itemObjectArray[currentActiveItem].faq_url).attr('target','_blank');}
if(impactDisabled==true){$('.purchase-button').html('Click to Buy '+itemObjectArray[currentActiveItem].ioverlay_title+'<i class="fa fa-shopping-carter"></i>').attr('href',itemObjectArray[currentActiveItem].url).attr('target','_blank');}
$('#preview-iframe').attr('src',nonssl);$('.item-name').empty().append(itemObjectArray[currentActiveItem].ioverlay_title)
$('.iframe-qr img').attr('src',"https://api.qrserver.com/v1/create-qr-code/?size=180x180&data="+itemObjectArray[currentActiveItem].preview_url[0].url)
if(itemObjectArray[currentActiveItem].preview_url.length==1){styleButton.hide(0);}else{styleButton.show(0);}
clearConsole();var current=0
itemObjectArray[currentActiveItem].preview_url.forEach(function(i){$('.style-list').append('<a class="button" href="#" data-list-preview-number="style-list-item-'+current+'"  data-list-preview-url='+itemObjectArray[currentActiveItem].preview_url[current].url+'">'+itemObjectArray[currentActiveItem].preview_url[current].name+'<i class="fa fa-circle">&#x25CF;</i></a><div id="style-list-item-'+current+'" class="style-list-box"><img class="style-list-box-image" src="https://preview.enableds.com/preview_img/'+itemObjectArray[currentActiveItem].preview_url[current].img+'"><p class="style-list-box-text"><em>Choose a style option to view it in the preview frame or scan it from your mobile to see it live on your device.<br><br> Viewing our products on actual mobile devices will greatly enhance your browsing experience.</em></p><img class="style-list-box-qr" src="https://api.qrserver.com/v1/create-qr-code/?size=180x180&amp;data='+itemObjectArray[currentActiveItem].preview_url[current].url+'"></div>');current++;})}catch(error){$('#snackbar').removeClass('disabled');$('.preparing-text').html('Link Error. Loading Best Selling Item');setTimeout(function(){$('.preparing-text').addClass('remove-preparing');},1000);$('[data-item-id="sticky"]').trigger('click');}}});});