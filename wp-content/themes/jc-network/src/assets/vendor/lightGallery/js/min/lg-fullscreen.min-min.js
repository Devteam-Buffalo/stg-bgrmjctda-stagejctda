!function(e,l){"function"==typeof define&&define.amd?define([],function(){return l()}):"object"==typeof exports?module.exports=l():l()}(this,function(){!function(e,l,n,t){"use strict";var r={fullScreen:!0},c=function(l){return this.core=e(l).data("lightGallery"),this.$el=e(l),this.core.s=e.extend({},r,this.core.s),this.init(),this};c.prototype.init=function(){var e="";if(this.core.s.fullScreen){if(!(n.fullscreenEnabled||n.webkitFullscreenEnabled||n.mozFullScreenEnabled||n.msFullscreenEnabled))return;e='<span class="lg-fullscreen lg-icon"></span>',this.core.$outer.find(".lg-toolbar").append(e),this.fullScreen()}},c.prototype.requestFullscreen=function(){var e=n.documentElement;e.requestFullscreen?e.requestFullscreen():e.msRequestFullscreen?e.msRequestFullscreen():e.mozRequestFullScreen?e.mozRequestFullScreen():e.webkitRequestFullscreen&&e.webkitRequestFullscreen()},c.prototype.exitFullscreen=function(){n.exitFullscreen?n.exitFullscreen():n.msExitFullscreen?n.msExitFullscreen():n.mozCancelFullScreen?n.mozCancelFullScreen():n.webkitExitFullscreen&&n.webkitExitFullscreen()},c.prototype.fullScreen=function(){var l=this;e(n).on("fullscreenchange.lg webkitfullscreenchange.lg mozfullscreenchange.lg MSFullscreenChange.lg",function(){l.core.$outer.toggleClass("lg-fullscreen-on")}),this.core.$outer.find(".lg-fullscreen").on("click.lg",function(){n.fullscreenElement||n.mozFullScreenElement||n.webkitFullscreenElement||n.msFullscreenElement?l.exitFullscreen():l.requestFullscreen()})},c.prototype.destroy=function(){this.exitFullscreen(),e(n).off("fullscreenchange.lg webkitfullscreenchange.lg mozfullscreenchange.lg MSFullscreenChange.lg")},e.fn.lightGallery.modules.fullscreen=c}(jQuery,window,document)});