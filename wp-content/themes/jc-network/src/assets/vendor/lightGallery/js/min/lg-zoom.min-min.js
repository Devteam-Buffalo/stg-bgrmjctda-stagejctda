!function(e,o){"function"==typeof define&&define.amd?define([],function(){return o()}):"object"==typeof exports?module.exports=o():o()}(this,function(){!function(e,o,t,a){"use strict";var r={scale:1,zoom:!0,actualSize:!0,enableZoomAfter:300},i=function(t){return this.core=e(t).data("lightGallery"),this.core.s=e.extend({},r,this.core.s),this.core.s.zoom&&this.core.doCss()&&(this.init(),this.zoomabletimeout=!1,this.pageX=e(o).width()/2,this.pageY=e(o).height()/2+e(o).scrollTop()),this};i.prototype.init=function(){var t=this,a='<span id="lg-zoom-in" class="lg-icon"></span><span id="lg-zoom-out" class="lg-icon"></span>';t.core.s.actualSize&&(a+='<span id="lg-actual-size" class="lg-icon"></span>'),this.core.$outer.find(".lg-toolbar").append(a),t.core.$el.on("onSlideItemLoad.lg.tm.zoom",function(o,a,r){var i=t.core.s.enableZoomAfter+r;e("body").hasClass("lg-from-hash")&&r?i=0:e("body").removeClass("lg-from-hash"),t.zoomabletimeout=setTimeout(function(){t.core.$slide.eq(a).addClass("lg-zoomable")},i+30)});var r=1,i=function(a){var r,i,l=t.core.$outer.find(".lg-current .lg-image"),s=(e(o).width()-l.width())/2,n=(e(o).height()-l.height())/2+e(o).scrollTop();r=t.pageX-s,i=t.pageY-n;var c=(a-1)*r,g=(a-1)*i;l.css("transform","scale3d("+a+", "+a+", 1)").attr("data-scale",a),l.parent().css({left:-c+"px",top:-g+"px"}).attr("data-x",c).attr("data-y",g)},l=function(){r>1?t.core.$outer.addClass("lg-zoomed"):t.resetZoom(),r<1&&(r=1),i(r)},s=function(a,i,s,n){var c,g=i.width();c=t.core.s.dynamic?t.core.s.dynamicEl[s].width||i[0].naturalWidth||g:t.core.$items.eq(s).attr("data-width")||i[0].naturalWidth||g;var d;t.core.$outer.hasClass("lg-zoomed")?r=1:c>g&&(d=c/g,r=d||2),n?(t.pageX=e(o).width()/2,t.pageY=e(o).height()/2+e(o).scrollTop()):(t.pageX=a.pageX||a.originalEvent.targetTouches[0].pageX,t.pageY=a.pageY||a.originalEvent.targetTouches[0].pageY),l(),setTimeout(function(){t.core.$outer.removeClass("lg-grabbing").addClass("lg-grab")},10)},n=!1;t.core.$el.on("onAferAppendSlide.lg.tm.zoom",function(e,o){var a=t.core.$slide.eq(o).find(".lg-image");a.on("dblclick",function(e){s(e,a,o)}),a.on("touchstart",function(e){n?(clearTimeout(n),n=null,s(e,a,o)):n=setTimeout(function(){n=null},300),e.preventDefault()})}),e(o).on("resize.lg.zoom scroll.lg.zoom orientationchange.lg.zoom",function(){t.pageX=e(o).width()/2,t.pageY=e(o).height()/2+e(o).scrollTop(),i(r)}),e("#lg-zoom-out").on("click.lg",function(){t.core.$outer.find(".lg-current .lg-image").length&&(r-=t.core.s.scale,l())}),e("#lg-zoom-in").on("click.lg",function(){t.core.$outer.find(".lg-current .lg-image").length&&(r+=t.core.s.scale,l())}),e("#lg-actual-size").on("click.lg",function(e){s(e,t.core.$slide.eq(t.core.index).find(".lg-image"),t.core.index,!0)}),t.core.$el.on("onBeforeSlide.lg.tm",function(){r=1,t.resetZoom()}),t.core.isTouch||t.zoomDrag(),t.core.isTouch&&t.zoomSwipe()},i.prototype.resetZoom=function(){this.core.$outer.removeClass("lg-zoomed"),this.core.$slide.find(".lg-img-wrap").removeAttr("style data-x data-y"),this.core.$slide.find(".lg-image").removeAttr("style data-scale"),this.pageX=e(o).width()/2,this.pageY=e(o).height()/2+e(o).scrollTop()},i.prototype.zoomSwipe=function(){var e=this,o={},t={},a=!1,r=!1,i=!1;e.core.$slide.on("touchstart.lg",function(t){if(e.core.$outer.hasClass("lg-zoomed")){var a=e.core.$slide.eq(e.core.index).find(".lg-object");i=a.outerHeight()*a.attr("data-scale")>e.core.$outer.find(".lg").height(),r=a.outerWidth()*a.attr("data-scale")>e.core.$outer.find(".lg").width(),(r||i)&&(t.preventDefault(),o={x:t.originalEvent.targetTouches[0].pageX,y:t.originalEvent.targetTouches[0].pageY})}}),e.core.$slide.on("touchmove.lg",function(l){if(e.core.$outer.hasClass("lg-zoomed")){var s,n,c=e.core.$slide.eq(e.core.index).find(".lg-img-wrap");l.preventDefault(),a=!0,t={x:l.originalEvent.targetTouches[0].pageX,y:l.originalEvent.targetTouches[0].pageY},e.core.$outer.addClass("lg-zoom-dragging"),n=i?-Math.abs(c.attr("data-y"))+(t.y-o.y):-Math.abs(c.attr("data-y")),s=r?-Math.abs(c.attr("data-x"))+(t.x-o.x):-Math.abs(c.attr("data-x")),(Math.abs(t.x-o.x)>15||Math.abs(t.y-o.y)>15)&&c.css({left:s+"px",top:n+"px"})}}),e.core.$slide.on("touchend.lg",function(){e.core.$outer.hasClass("lg-zoomed")&&a&&(a=!1,e.core.$outer.removeClass("lg-zoom-dragging"),e.touchendZoom(o,t,r,i))})},i.prototype.zoomDrag=function(){var t=this,a={},r={},i=!1,l=!1,s=!1,n=!1;t.core.$slide.on("mousedown.lg.zoom",function(o){var r=t.core.$slide.eq(t.core.index).find(".lg-object");n=r.outerHeight()*r.attr("data-scale")>t.core.$outer.find(".lg").height(),s=r.outerWidth()*r.attr("data-scale")>t.core.$outer.find(".lg").width(),t.core.$outer.hasClass("lg-zoomed")&&e(o.target).hasClass("lg-object")&&(s||n)&&(o.preventDefault(),a={x:o.pageX,y:o.pageY},i=!0,t.core.$outer.scrollLeft+=1,t.core.$outer.scrollLeft-=1,t.core.$outer.removeClass("lg-grab").addClass("lg-grabbing"))}),e(o).on("mousemove.lg.zoom",function(e){if(i){var o,c,g=t.core.$slide.eq(t.core.index).find(".lg-img-wrap");l=!0,r={x:e.pageX,y:e.pageY},t.core.$outer.addClass("lg-zoom-dragging"),c=n?-Math.abs(g.attr("data-y"))+(r.y-a.y):-Math.abs(g.attr("data-y")),o=s?-Math.abs(g.attr("data-x"))+(r.x-a.x):-Math.abs(g.attr("data-x")),g.css({left:o+"px",top:c+"px"})}}),e(o).on("mouseup.lg.zoom",function(e){i&&(i=!1,t.core.$outer.removeClass("lg-zoom-dragging"),!l||a.x===r.x&&a.y===r.y||(r={x:e.pageX,y:e.pageY},t.touchendZoom(a,r,s,n)),l=!1),t.core.$outer.removeClass("lg-grabbing").addClass("lg-grab")})},i.prototype.touchendZoom=function(e,o,t,a){var r=this,i=r.core.$slide.eq(r.core.index).find(".lg-img-wrap"),l=r.core.$slide.eq(r.core.index).find(".lg-object"),s=-Math.abs(i.attr("data-x"))+(o.x-e.x),n=-Math.abs(i.attr("data-y"))+(o.y-e.y),c=(r.core.$outer.find(".lg").height()-l.outerHeight())/2,g=Math.abs(l.outerHeight()*Math.abs(l.attr("data-scale"))-r.core.$outer.find(".lg").height()+c),d=(r.core.$outer.find(".lg").width()-l.outerWidth())/2,u=Math.abs(l.outerWidth()*Math.abs(l.attr("data-scale"))-r.core.$outer.find(".lg").width()+d);(Math.abs(o.x-e.x)>15||Math.abs(o.y-e.y)>15)&&(a&&(n<=-g?n=-g:n>=-c&&(n=-c)),t&&(s<=-u?s=-u:s>=-d&&(s=-d)),a?i.attr("data-y",Math.abs(n)):n=-Math.abs(i.attr("data-y")),t?i.attr("data-x",Math.abs(s)):s=-Math.abs(i.attr("data-x")),i.css({left:s+"px",top:n+"px"}))},i.prototype.destroy=function(){var t=this;t.core.$el.off(".lg.zoom"),e(o).off(".lg.zoom"),t.core.$slide.off(".lg.zoom"),t.core.$el.off(".lg.tm.zoom"),t.resetZoom(),clearTimeout(t.zoomabletimeout),t.zoomabletimeout=!1},e.fn.lightGallery.modules.zoom=i}(jQuery,window,document)});