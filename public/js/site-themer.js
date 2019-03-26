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
    console.log('initialising site themer - input options below');
    console.log(options);
    self.options = $.extend(window.siteThemer.defaults, options);
    if (self.options.currentColor == null) self.options.currentColor = self.options.defaultColor;
    console.log('after extend');
    console.log(self.options);
  };

  window.siteThemer.defaults = {
    defaultColor: '#184060',
    currentColor: '#184060',
    oppositeColor: '#ffffff',
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

    for (var selectorIndex in self.options.selectors) {
      console.log([selectorIndex, self.options.selectors[selectorIndex]]);
      var selectorObj = self.options.selectors[selectorIndex];
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