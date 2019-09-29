(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["/js/site-themer"],{

/***/ "./resources/js/site-themer.js":
/*!*************************************!*\
  !*** ./resources/js/site-themer.js ***!
  \*************************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function () {
  // We use JavaScript prototype to define our D3 Plugin.
  // The concept of prototypes is similar to object-oriented classes.
  var window = this;

  window.siteThemer = function (options) {
    var self = this;
    self.options = $.extend(window.siteThemer.defaults, options);
    if (self.options.currentColor == null) self.options.currentColor = self.options.defaultColor;
    console.log(window.siteThemer.defaults, self.options);
  };

  window.siteThemer.defaults = {
    defaultColor: '#184060',
    currentColor: '#184060',
    oppositeColor: '#ffffff',
    useStyleTag: false,
    styleTag: 'color-picker-tag',
    selectors: [{
      selector: '.bg-theme',
      attr: 'style',
      value: 'background-color:{currentColor}!important;' + 'color:{oppositeColor}!important;'
    }, {
      selector: '.txt-theme',
      attr: 'style',
      value: 'color:{currentColor}!important;' + 'background-color:{oppositeColor}!important;'
    }, {
      selector: '.bg-border-theme, .bg-theme .pcr-button',
      attr: 'style',
      value: 'border:1px solid {oppositeColor}!important;'
    }, {
      selector: '#form2:focus, #form3:focus',
      attr: 'style',
      value: 'box-shadow: 0 1px 0 0 {currentColor}!important;border-bottom: 1px solid {currentColor}!important;color:{currentColor}!important'
    }],
    themeUrl: '/users/settheme',
    pickr: null
  };
  var pluginPrototype = window.siteThemer.prototype;

  pluginPrototype.setColor = function (color, updateTheme) {
    console.log('setting passed in color: ' + color);
    var self = this;
    if (color == null || color == self.options.currentColor || color == self.options.oppositeColor) return;
    self.options.currentColor = color;
    self.updateColor(updateTheme);
    updateTheme = updateTheme | true;

    if (updateTheme == true && self.options.themeUrl != null) {
      $.ajax({
        /* the route pointing to the post function */
        url: self.options.themeUrl + '?theme_color=' + self.options.currentColor.replace('#', '', self.options.currentColor),
        type: 'GET',
        dataType: 'JSON',

        /* remind that 'data' is the response of the AjaxController */
        success: function success(data) {//Does nothing on success.
        }
      });
    }
  };

  pluginPrototype.updateColor = function () {
    var self = this;
    var styleTagElm = document.getElementById(this.options.styleTag);

    if (self.useStyleTag == false || styleTagElm == null) {
      for (var selectorIndex in self.options.selectors) {
        var selectorObj = self.options.selectors[selectorIndex];
        $(selectorObj.selector).attr(selectorObj.attr, selectorObj.value.replace('{currentColor}', self.options.currentColor).replace('{defaultColor}', self.options.defaultColor).replace('{oppositeColor}', self.options.oppositeColor));
      }
    } else {
      console.log('hit style tag element populating.');
      var strStyleText = "";

      for (var selectorIndex in self.options.selectors) {
        var selectorObj = self.options.selectors[selectorIndex];

        if (selectorObj.attr == 'style') {
          strStyleText += selectorObj.selector + "{";
          strStyleText += selectorObj.value.replace('{currentColor}', self.options.currentColor).replace('{defaultColor}', self.options.defaultColor).replace('{oppositeColor}', self.options.oppositeColor);
          strStyleText += "}";
        }
      }

      console.log('filling element with:');
      console.log(strStyleText);
      styleTagElm.innerHTML = strStyleText;
    }
  };

  pluginPrototype.getSelectorValueByIndex = function (index) {
    var self = this;
    if (self.options.selectors.length <= index) return null;
    var selectorObj = self.options.selectors[index];

    if (selectorObj) {
      return selectorObj.value.replace('{currentColor}', self.options.currentColor).replace('{defaultColor}', self.options.defaultColor).replace('{oppositeColor}', self.options.oppositeColor);
    }

    return null;
  };

  pluginPrototype.updateColorIndex = function (index) {
    var self = this;
    var selectorObj = self.options.selectors[index];

    if (selectorObj) {
      console.log([selectorObj]);
      $(selectorObj.selector).attr(selectorObj.attr, selectorObj.value.replace('{currentColor}', self.options.currentColor).replace('{defaultColor}', self.options.defaultColor).replace('{oppositeColor}', self.options.oppositeColor));
    }
  };

  pluginPrototype.getCurrentColor = function () {
    var self = this;
    return self.options.currentColor;
  };

  return window.siteThemer;
})();

/***/ }),

/***/ "./resources/sass/app.scss":
/*!*********************************!*\
  !*** ./resources/sass/app.scss ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 0:
/*!*********************************************************************!*\
  !*** multi ./resources/js/site-themer.js ./resources/sass/app.scss ***!
  \*********************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! C:\Repositories\dnd\resources\js\site-themer.js */"./resources/js/site-themer.js");
module.exports = __webpack_require__(/*! C:\Repositories\dnd\resources\sass\app.scss */"./resources/sass/app.scss");


/***/ })

},[[0,"/js/manifest"]]]);