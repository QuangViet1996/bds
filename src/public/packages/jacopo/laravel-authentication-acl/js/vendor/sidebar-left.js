

/*! AdminLTE app.js
 * ================
 * Main JS application file for AdminLTE v2. This file
 * should be included in all pages. It controls some layout
 * options and implements exclusive AdminLTE plugins.
 *
 * @Author  Almsaeed Studio
 * @Support <http://www.almsaeedstudio.com>
 * @Email   <support@almsaeedstudio.com>
 * @version 2.3.3
 * @license MIT <http://opensource.org/licenses/MIT>
 */
function _init() {
    "use strict";
    $.AdminLTE.layout = {activate: function () {
            var a = this;
            a.fix(), a.fixSidebar(), $(window, ".wrapper").resize(function () {
                a.fix(), a.fixSidebar()
            })
        }, fix: function () {
            var a = $(".main-header").outerHeight() + $(".main-footer").outerHeight(), b = $(window).height(), c = $(".sidebar").height();
            if ($("body").hasClass("fixed"))
                $(".content-wrapper, .right-side").css("min-height", b - $(".main-footer").outerHeight());
            else {
                var d;
                b >= c ? ($(".content-wrapper, .right-side").css("min-height", b - a), d = b - a) : ($(".content-wrapper, .right-side").css("min-height", c), d = c);
                var e = $($.AdminLTE.options.controlSidebarOptions.selector);
                "undefined" != typeof e && e.height() > d && $(".content-wrapper, .right-side").css("min-height", e.height())
            }
        }, fixSidebar: function () {
            return $("body").hasClass("fixed") ? ("undefined" == typeof $.fn.slimScroll && window.console && window.console.error("Error: the fixed layout requires the slimscroll plugin!"), void($.AdminLTE.options.sidebarSlimScroll && "undefined" != typeof $.fn.slimScroll && ($(".sidebar").slimScroll({destroy: !0}).height("auto"), $(".sidebar").slimscroll({height: $(window).height() - $(".main-header").height() + "px", color: "rgba(0,0,0,0.2)", size: "3px"})))) : void("undefined" != typeof $.fn.slimScroll && $(".sidebar").slimScroll({destroy: !0}).height("auto"))
        }}, $.AdminLTE.pushMenu = {activate: function (a) {
            var b = $.AdminLTE.options.screenSizes;
            $(document).on("click", a, function (a) {
                a.preventDefault(), $(window).width() > b.sm - 1 ? $("body").hasClass("sidebar-collapse") ? $("body").removeClass("sidebar-collapse").trigger("expanded.pushMenu") : $("body").addClass("sidebar-collapse").trigger("collapsed.pushMenu") : $("body").hasClass("sidebar-open") ? $("body").removeClass("sidebar-open").removeClass("sidebar-collapse").trigger("collapsed.pushMenu") : $("body").addClass("sidebar-open").trigger("expanded.pushMenu")
            }), $(".content-wrapper").click(function () {
                $(window).width() <= b.sm - 1 && $("body").hasClass("sidebar-open") && $("body").removeClass("sidebar-open")
            }), ($.AdminLTE.options.sidebarExpandOnHover || $("body").hasClass("fixed") && $("body").hasClass("sidebar-mini")) && this.expandOnHover()
        }, expandOnHover: function () {
            var a = this, b = $.AdminLTE.options.screenSizes.sm - 1;
            $(".main-sidebar").hover(function () {
                $("body").hasClass("sidebar-mini") && $("body").hasClass("sidebar-collapse") && $(window).width() > b && a.expand()
            }, function () {
                $("body").hasClass("sidebar-mini") && $("body").hasClass("sidebar-expanded-on-hover") && $(window).width() > b && a.collapse()
            })
        }, expand: function () {
            $("body").removeClass("sidebar-collapse").addClass("sidebar-expanded-on-hover")
        }, collapse: function () {
            $("body").hasClass("sidebar-expanded-on-hover") && $("body").removeClass("sidebar-expanded-on-hover").addClass("sidebar-collapse")
        }}, $.AdminLTE.tree = function (a) {
        var b = this, c = $.AdminLTE.options.animationSpeed;
        $(document).on("click", a + " li a", function (a) {
            var d = $(this), e = d.next();
            if (e.is(".treeview-menu") && e.is(":visible") && !$("body").hasClass("sidebar-collapse"))
                e.slideUp(c, function () {
                    e.removeClass("menu-open")
                }), e.parent("li").removeClass("active");
            else if (e.is(".treeview-menu") && !e.is(":visible")) {
                var f = d.parents("ul").first(), g = f.find("ul:visible").slideUp(c);
                g.removeClass("menu-open");
                var h = d.parent("li");
                e.slideDown(c, function () {
                    e.addClass("menu-open"), f.find("li.active").removeClass("active"), h.addClass("active"), b.layout.fix()
                })
            }
            e.is(".treeview-menu") && a.preventDefault()
        })
    }
}
if ("undefined" == typeof jQuery)
    throw new Error("AdminLTE requires jQuery");
$.AdminLTE = {}, $.AdminLTE.options = {navbarMenuSlimscroll: !0, navbarMenuSlimscrollWidth: "3px", navbarMenuHeight: "200px", animationSpeed: 500, sidebarToggleSelector: "[data-toggle='offcanvas']", sidebarPushMenu: !0, sidebarSlimScroll: !0, sidebarExpandOnHover: !1, enableBoxRefresh: !0, enableBSToppltip: !0, BSTooltipSelector: "[data-toggle='tooltip']", enableFastclick: !0, enableControlSidebar: !0, controlSidebarOptions: {toggleBtnSelector: "[data-toggle='control-sidebar']", selector: ".control-sidebar", slide: !0}, enableBoxWidget: !0, boxWidgetOptions: {boxWidgetIcons: {collapse: "fa-minus", open: "fa-plus", remove: "fa-times"}, boxWidgetSelectors: {remove: '[data-widget="remove"]', collapse: '[data-widget="collapse"]'}}, directChat: {enable: !0, contactToggleSelector: '[data-widget="chat-pane-toggle"]'}, colors: {lightBlue: "#3c8dbc", red: "#f56954", green: "#00a65a", aqua: "#00c0ef", yellow: "#f39c12", blue: "#0073b7", navy: "#001F3F", teal: "#39CCCC", olive: "#3D9970", lime: "#01FF70", orange: "#FF851B", fuchsia: "#F012BE", purple: "#8E24AA", maroon: "#D81B60", black: "#222222", gray: "#d2d6de"}, screenSizes: {xs: 480, sm: 768, md: 992, lg: 1200}}, $(function () {
    "use strict";
    $("body").removeClass("hold-transition"), "undefined" != typeof AdminLTEOptions && $.extend(!0, $.AdminLTE.options, AdminLTEOptions);
    var a = $.AdminLTE.options;
    _init(), $.AdminLTE.layout.activate(), $.AdminLTE.tree(".sidebar"), a.enableControlSidebar, a.navbarMenuSlimscroll && "undefined" != typeof $.fn.slimscroll && $(".navbar .menu").slimscroll({height: a.navbarMenuHeight, alwaysVisible: !1, size: a.navbarMenuSlimscrollWidth}).css("width", "100%"), a.sidebarPushMenu && $.AdminLTE.pushMenu.activate(a.sidebarToggleSelector), a.enableBSToppltip && $("body").tooltip({selector: a.BSTooltipSelector}), a.enableBoxWidget, a.enableFastclick && "undefined" != typeof FastClick && FastClick.attach(document.body), a.directChat.enable && $(document).on("click", a.directChat.contactToggleSelector, function () {
        var a = $(this).parents(".direct-chat").first();
        a.toggleClass("direct-chat-contacts-open")
    })
})


jQuery(document).ready(function ($) {
    $('.sidebar-toggle').on('click', function () {
        if ($(window).width() > 768) {
            if ($('.sidebar').is(':visible')) {
                $('.main').animate({'margin-left': '0px'}, '100',function(){
                   
                    $('.sidebar').css({'background': 'none', 'border': 'none'}).hide(100);
                });
                 $('.sidebar').animate({'width': '0px'}, '100');
                
            } else {
                
                
                $('.sidebar').css({'position':'absolute'}).show(100,function(){
                    $('.sidebar').animate({'width': '230px'},50);
                    $('.main').animate({'margin-left': '230px'},100);
                    
                });        
                       
                         
                          
                
            }
        } else if ($(window).width() < 768) {
            if ($('.sidebar').is(':visible')) {
                $('.sidebar').animate({'width': '0px'},100,function(){
                    $('.sidebar').hide();
                });  
                    $('.main').css({'margin-left': '0px'});
            } else {
                
                    $('.sidebar').animate({'width': '230px'},100,function(){
                        $('.sidebar').show();
                        
                    });
            
            }
        }

    });
});