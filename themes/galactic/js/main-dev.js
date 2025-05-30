

/*!
 * Headhesive.js v1.2.3 - An on-demand sticky header
 * Author: Copyright (c) Mark Goodyear <@markgdyr> <http://markgoodyear.com>
 * Url: http://markgoodyear.com/labs/headhesive
 * License: MIT
 */
(function (root, factory) {
  if (typeof define === "function" && define.amd) {
    define([], function () {
      return factory();
    });
  } else if (typeof exports === "object") {
    module.exports = factory();
  } else {
    root.Headhesive = factory();
  }
})(this, function () {
  "use strict";
  var _mergeObj = function (to, from) {
    for (var p in from) {
      if (from.hasOwnProperty(p)) {
        to[p] = typeof from[p] === "object" ? _mergeObj(to[p], from[p]) : from[p];
      }
    }
    return to;
  };
  var _throttle = function (func, wait) {
    var _now = Date.now || function () {
      return new Date().getTime();
    };
    var context, args, result;
    var timeout = null;
    var previous = 0;
    var later = function () {
      previous = _now();
      timeout = null;
      result = func.apply(context, args);
      context = args = null;
    };
    return function () {
      var now = _now();
      var remaining = wait - (now - previous);
      context = this;
      args = arguments;
      if (remaining <= 0) {
        clearTimeout(timeout);
        timeout = null;
        previous = now;
        result = func.apply(context, args);
        context = args = null;
      } else if (!timeout) {
        timeout = setTimeout(later, remaining);
      }
      return result;
    };
  };
  var _getScrollY = function () {
    return window.pageYOffset !== undefined ? window.pageYOffset : (document.documentElement || document.body.parentNode || document.body).scrollTop;
  };
  var _getElemY = function (elem, side) {
    var pos = 0;
    var elemHeight = elem.offsetHeight;
    while (elem) {
      pos += elem.offsetTop;
      elem = elem.offsetParent;
    }
    if (side === "bottom") {
      pos = pos + elemHeight;
    }
    return pos;
  };
  var Headhesive = function (elem, options) {
    if (!("querySelector" in document && "addEventListener" in window)) {
      return;
    }
    this.visible = false;
    this.options = {
      offset: 300,
      offsetSide: "top",
      classes: {
        clone: "headhesive",
        stick: "headhesive--stick",
        unstick: "headhesive--unstick"
      },
      throttle: 250,
      onInit: function () { },
      onStick: function () { },
      onUnstick: function () { },
      onDestroy: function () { }
    };
    this.elem = typeof elem === "string" ? document.querySelector(elem) : elem;
    this.options = _mergeObj(this.options, options);
    this.init();
  };
  Headhesive.prototype = {
    constructor: Headhesive,
    init: function () {
      this.clonedElem = this.elem.cloneNode(true);
      this.clonedElem.className += " " + this.options.classes.clone;
      document.body.insertBefore(this.clonedElem, document.body.firstChild);
      if (typeof this.options.offset === "number") {
        this.scrollOffset = this.options.offset;
      } else if (typeof this.options.offset === "string") {
        this._setScrollOffset();
      } else {
        throw new Error("Invalid offset: " + this.options.offset);
      }
      this._throttleUpdate = _throttle(this.update.bind(this), this.options.throttle);
      this._throttleScrollOffset = _throttle(this._setScrollOffset.bind(this), this.options.throttle);
      window.addEventListener("scroll", this._throttleUpdate, false);
      window.addEventListener("resize", this._throttleScrollOffset, false);
      this.options.onInit.call(this);
    },
    _setScrollOffset: function () {
      if (typeof this.options.offset === "string") {
        this.scrollOffset = _getElemY(document.querySelector(this.options.offset), this.options.offsetSide);
      }
    },
    destroy: function () {
      document.body.removeChild(this.clonedElem);
      window.removeEventListener("scroll", this._throttleUpdate);
      window.removeEventListener("resize", this._throttleScrollOffset);
      this.options.onDestroy.call(this);
    },
    stick: function () {
      if (!this.visible) {
        this.clonedElem.className = this.clonedElem.className.replace(new RegExp("(^|\\s)*" + this.options.classes.unstick + "(\\s|$)*", "g"), "");
        this.clonedElem.className += " " + this.options.classes.stick;
        this.visible = true;
        this.options.onStick.call(this);
      }
    },
    unstick: function () {
      if (this.visible) {
        this.clonedElem.className = this.clonedElem.className.replace(new RegExp("(^|\\s)*" + this.options.classes.stick + "(\\s|$)*", "g"), "");
        this.clonedElem.className += " " + this.options.classes.unstick;
        this.visible = false;
        this.options.onUnstick.call(this);
      }
    },
    update: function () {
      if (_getScrollY() > this.scrollOffset) {
        this.stick();
      } else {
        this.unstick();
      }
    }
  };
  return Headhesive;
});

function offCanvas() {

  var navbar = document.querySelector(".navbar");
  if (navbar == null) return;
  var options = {
    offset: 350,
    offsetSide: 'top',
    classes: {
      clone: 'navbar-clone fixed',
      stick: 'navbar-stick',
      unstick: 'navbar-unstick'
    },
    onStick: function onStick() {
      var navbarClonedClass = this.clonedElem.classList;
      // if (navbarClonedClass.contains('transparent') && navbarClonedClass.contains('navbar-dark')) {
      //   this.clonedElem.className = this.clonedElem.className.replace("navbar-dark", "navbar-light");
      // }
    }
  };
  var banner = new Headhesive('.navbar', options);
  var navOffCanvasBtn = document.querySelectorAll(".offcanvas-nav-btn");
  var navOffCanvas = document.querySelector('.navbar:not(.navbar-clone) .offcanvas-nav');
  var bsOffCanvas = new bootstrap.Offcanvas(navOffCanvas, { scroll: true });
  var scrollLink = document.querySelectorAll('.onepage .navbar li a.scroll');
  navOffCanvasBtn.forEach(function (e) {
    e.addEventListener('click', function (event) {
      bsOffCanvas.show();
    });
  });
  scrollLink.forEach(function (e) {
    e.addEventListener('click', function (event) {
      bsOffCanvas.hide();
    });
  });
  jQuery(".searchIcon").on('click', function(event){
    console.log('test');
    let parentBlock = this.closest(".searchblock");
    let form = parentBlock ? parentBlock.querySelector(".globalsearchform") : null;

    if (form) {
        form.classList.toggle("active"); // Toggle class to show/hide form
        console.log("Toggled class:", form.classList.contains("active") ? "Shown" : "Hidden");
    } else {
        console.error("Form not found within:", parentBlock);
    }
      //(... rest of your JS code)
    });


}


console.log('main-dev.js loaded');