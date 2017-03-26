<style>
    #nprogress{pointer-events:none;z-index:2}#nprogress .bar{background:#29d;position:fixed;z-index:3;top:0;left:0;width:100%;height:2px}#nprogress .peg{display:block;position:absolute;right:0;width:100px;height:100%;box-shadow:0 0 10px #29d,0 0 5px #29d;opacity:1;-webkit-transform:rotate(3deg) translateY(-4px);transform:rotate(3deg) translateY(-4px)}#nprogress .spinner{display:block;position:fixed;z-index:3;top:15px;right:15px}#nprogress .spinner-icon{width:18px;height:18px;box-sizing:border-box;border:2px solid transparent;border-top-color:#29d;border-left-color:#29d;border-radius:50%;-webkit-animation:a .4s linear infinite;animation:a .4s linear infinite}.nprogress-custom-parent{overflow:hidden;position:relative}.nprogress-custom-parent #nprogress .bar,.nprogress-custom-parent #nprogress .spinner{position:absolute}@-webkit-keyframes a{0%{-webkit-transform:rotate(0deg)}to{-webkit-transform:rotate(1turn)}}@keyframes a{0%{-webkit-transform:rotate(0deg);transform:rotate(0deg)}to{-webkit-transform:rotate(1turn);transform:rotate(1turn)}}#app{display:none}*{box-sizing:border-box}#loader,body{margin:0}#loader{width:100%;height:100%;overflow:visible;position:absolute;background:#fff;display:block;z-index:1;opacity:1;visibility:visible;-webkit-transition:opacity 1s,visibility 1s;transition:opacity 1s,visibility 1s;padding:0}#loader p{top:50%;left:50%;font-size:20px;width:250px;height:50px;position:relative;margin:-25px 0 0 -125px;padding:0;text-align:center;line-height:1.5em;font-weight:300;font-family:Helvetica Neue,Helvetica,Arial,sans-serif}
</style>

<div id="loader">
    <p>Идет загрузка...</p>
</div>

<script>
    !function(t) {
    function e(r) {
        if (n[r]) return n[r].exports;
        var o = n[r] = {
            i: r,
            l: !1,
            exports: {}
        };
        return t[r].call(o.exports, o, o.exports, e), o.l = !0, o.exports;
    }
    var n = {};
    e.m = t, e.c = n, e.i = function(t) {
        return t;
    }, e.d = function(t, n, r) {
        e.o(t, n) || Object.defineProperty(t, n, {
            configurable: !1,
            enumerable: !0,
            get: r
        });
    }, e.n = function(t) {
        var n = t && t.__esModule ? function() {
            return t.default;
        } : function() {
            return t;
        };
        return e.d(n, "a", n), n;
    }, e.o = function(t, e) {
        return Object.prototype.hasOwnProperty.call(t, e);
    }, e.p = "/js/", e(e.s = 79);
}({
    55: function(t, e, n) {
        var r, o;
        !function(i, s) {
            r = s, void 0 !== (o = "function" == typeof r ? r.call(e, n, e, t) : r) && (t.exports = o);
        }(0, function() {
            function t(t, e, n) {
                return t < e ? e : t > n ? n : t;
            }
            function e(t) {
                return 100 * (-1 + t);
            }
            function n(t, n, r) {
                var o;
                return o = "translate3d" === c.positionUsing ? {
                    transform: "translate3d(" + e(t) + "%,0,0)"
                } : "translate" === c.positionUsing ? {
                    transform: "translate(" + e(t) + "%,0)"
                } : {
                    "margin-left": e(t) + "%"
                }, o.transition = "all " + n + "ms " + r, o;
            }
            function r(t, e) {
                return ("string" == typeof t ? t : s(t)).indexOf(" " + e + " ") >= 0;
            }
            function o(t, e) {
                var n = s(t), o = n + e;
                r(n, e) || (t.className = o.substring(1));
            }
            function i(t, e) {
                var n, o = s(t);
                r(t, e) && (n = o.replace(" " + e + " ", " "), t.className = n.substring(1, n.length - 1));
            }
            function s(t) {
                return (" " + (t.className || "") + " ").replace(/\s+/gi, " ");
            }
            function a(t) {
                t && t.parentNode && t.parentNode.removeChild(t);
            }
            var u = {};
            u.version = "0.2.0";
            var c = u.settings = {
                minimum: .08,
                easing: "ease",
                positionUsing: "",
                speed: 200,
                trickle: !0,
                trickleRate: .02,
                trickleSpeed: 800,
                showSpinner: !0,
                barSelector: '[role="bar"]',
                spinnerSelector: '[role="spinner"]',
                parent: "body",
                template: '<div class="bar" role="bar"><div class="peg"></div></div><div class="spinner" role="spinner"><div class="spinner-icon"></div></div>'
            };
            u.configure = function(t) {
                var e, n;
                for (e in t) void 0 !== (n = t[e]) && t.hasOwnProperty(e) && (c[e] = n);
                return this;
            }, u.status = null, u.set = function(e) {
                var r = u.isStarted();
                e = t(e, c.minimum, 1), u.status = 1 === e ? null : e;
                var o = u.render(!r), i = o.querySelector(c.barSelector), s = c.speed, a = c.easing;
                return o.offsetWidth, l(function(t) {
                    "" === c.positionUsing && (c.positionUsing = u.getPositioningCSS()), d(i, n(e, s, a)), 
                    1 === e ? (d(o, {
                        transition: "none",
                        opacity: 1
                    }), o.offsetWidth, setTimeout(function() {
                        d(o, {
                            transition: "all " + s + "ms linear",
                            opacity: 0
                        }), setTimeout(function() {
                            u.remove(), t();
                        }, s);
                    }, s)) : setTimeout(t, s);
                }), this;
            }, u.isStarted = function() {
                return "number" == typeof u.status;
            }, u.start = function() {
                u.status || u.set(0);
                var t = function() {
                    setTimeout(function() {
                        u.status && (u.trickle(), t());
                    }, c.trickleSpeed);
                };
                return c.trickle && t(), this;
            }, u.done = function(t) {
                return t || u.status ? u.inc(.3 + .5 * Math.random()).set(1) : this;
            }, u.inc = function(e) {
                var n = u.status;
                return n ? ("number" != typeof e && (e = (1 - n) * t(Math.random() * n, .1, .95)), 
                n = t(n + e, 0, .994), u.set(n)) : u.start();
            }, u.trickle = function() {
                return u.inc(Math.random() * c.trickleRate);
            }, function() {
                var t = 0, e = 0;
                u.promise = function(n) {
                    return n && "resolved" !== n.state() ? (0 === e && u.start(), t++, e++, n.always(function() {
                        e--, 0 === e ? (t = 0, u.done()) : u.set((t - e) / t);
                    }), this) : this;
                };
            }(), u.render = function(t) {
                if (u.isRendered()) return document.getElementById("nprogress");
                o(document.documentElement, "nprogress-busy");
                var n = document.createElement("div");
                n.id = "nprogress", n.innerHTML = c.template;
                var r, i = n.querySelector(c.barSelector), s = t ? "-100" : e(u.status || 0), l = document.querySelector(c.parent);
                return d(i, {
                    transition: "all 0 linear",
                    transform: "translate3d(" + s + "%,0,0)"
                }), c.showSpinner || (r = n.querySelector(c.spinnerSelector)) && a(r), l != document.body && o(l, "nprogress-custom-parent"), 
                l.appendChild(n), n;
            }, u.remove = function() {
                i(document.documentElement, "nprogress-busy"), i(document.querySelector(c.parent), "nprogress-custom-parent");
                var t = document.getElementById("nprogress");
                t && a(t);
            }, u.isRendered = function() {
                return !!document.getElementById("nprogress");
            }, u.getPositioningCSS = function() {
                var t = document.body.style, e = "WebkitTransform" in t ? "Webkit" : "MozTransform" in t ? "Moz" : "msTransform" in t ? "ms" : "OTransform" in t ? "O" : "";
                return e + "Perspective" in t ? "translate3d" : e + "Transform" in t ? "translate" : "margin";
            };
            var l = function() {
                function t() {
                    var n = e.shift();
                    n && n(t);
                }
                var e = [];
                return function(n) {
                    e.push(n), 1 == e.length && t();
                };
            }(), d = function() {
                function t(t) {
                    return t.replace(/^-ms-/, "ms-").replace(/-([\da-z])/gi, function(t, e) {
                        return e.toUpperCase();
                    });
                }
                function e(t) {
                    var e = document.body.style;
                    if (t in e) return t;
                    for (var n, r = o.length, i = t.charAt(0).toUpperCase() + t.slice(1); r--; ) if ((n = o[r] + i) in e) return n;
                    return t;
                }
                function n(n) {
                    return n = t(n), i[n] || (i[n] = e(n));
                }
                function r(t, e, r) {
                    e = n(e), t.style[e] = r;
                }
                var o = [ "Webkit", "O", "Moz", "ms" ], i = {};
                return function(t, e) {
                    var n, o, i = arguments;
                    if (2 == i.length) for (n in e) void 0 !== (o = e[n]) && e.hasOwnProperty(n) && r(t, n, o); else r(t, i[1], i[2]);
                };
            }();
            return u;
        });
    },
    79: function(t, e, n) {
        "use strict";
        function r(t) {
            return t && t.__esModule ? t : {
                default: t
            };
        }
        var o = n(55), i = r(o);
        window.NProgress = i.default, i.default.start(), window.countAssets = 2, window.loadedAssets = function() {
            if (0 === --countAssets) {
                i.default.done();
                var t = document.getElementById("loader");
                document.getElementById("app").style.display = "block", t.style.opacity = 0, t.style.visibility = "hidden";
            }
        };
        var s = document.createElement("link");
        s.href = document.querySelector('meta[name="app-css-path"]').getAttribute("content"), 
        s.rel = "stylesheet", s.onload = function() {
            loadedAssets();
        }, document.head.appendChild(s);
    }
});
</script>