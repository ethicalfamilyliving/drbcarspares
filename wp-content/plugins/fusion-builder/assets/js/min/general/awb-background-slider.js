!function(e){const t={slide:{prev:{translate:[0,"-100%",0],opacity:0},next:{translate:[0,"100%",0],opacity:0}},slide_down:{prev:{translate:[0,"100%",0],opacity:0},next:{translate:[0,"-100%",0],opacity:0}},slide_left:{prev:{translate:["-100%",0,0],opacity:0},next:{translate:["100%",0,0],opacity:0}},slide_right:{prev:{translate:["100%",0,0],opacity:0},next:{translate:["-100%",0,0],opacity:0}},stack:{prev:{translate:[0,"60px","-30px"],scale:.7,opacity:0},next:{translate:[0,"100%",0]}},zoom:{prev:{scale:1.3,opacity:0},next:{scale:.7,opacity:0}},"slide-zoom-out":{prev:{translate:[0,"-100%",0],scale:1.5,opacity:0},next:{translate:[0,"100%",0],scale:1.5,opacity:0}},"slide-zoom-in":{prev:{translate:[0,"-100%",0],scale:.8,opacity:0},next:{translate:[0,"100%",0],scale:.8,opacity:0}}};function a(a){const o=a.dataset.type||"container",n=a.dataset.animation||"fade",s="fade"===n?"fade":"creative";let i="creative"===s?t[n]:"";const c="no"===a.dataset.loop,l=Number(a.dataset.slideshowSpeed)||5e3,r=Number(a.dataset.animationSpeed)||800,p=a.dataset.direction||"up",d=a.dataset.pause_on_hover||!1;let u=".fusion-flex-container";"column"===o&&(u=".fusion-layout-column");const y=e(a).closest(u);"slide"===n&&"up"!==p&&(i=t["slide_"+p]);const f=new Swiper(a,{effect:s,loop:!c,speed:r,creativeEffect:i,autoplay:{delay:l,stopOnLastSlide:c}});d&&(y.on("mouseover",function(){f.autoplay.pause()}),y.on("mouseleave",function(){f.autoplay.run()}))}e(".awb-background-slider").each(function(e,t){a(t)}),e(window).on("load fusion-reinit-background-slider",function(e,t){const o=document.querySelector(`[data-cid="${t}"] .awb-background-slider`);o&&a(o)})}(jQuery);