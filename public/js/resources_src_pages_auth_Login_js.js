"use strict";
(self["webpackChunkmy_webpack_project"] = self["webpackChunkmy_webpack_project"] || []).push([["resources_src_pages_auth_Login_js"],{

/***/ "./resources/src/component/Language.js":
/*!*********************************************!*\
  !*** ./resources/src/component/Language.js ***!
  \*********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var i18next__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! i18next */ "./node_modules/i18next/dist/esm/i18next.js");
/* harmony import */ var react_i18next__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! react-i18next */ "./node_modules/react-i18next/dist/es/useTranslation.js");
/* harmony import */ var react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! react/jsx-runtime */ "./node_modules/react/jsx-runtime.js");






var Language = function Language() {
  var _useTranslation = (0,react_i18next__WEBPACK_IMPORTED_MODULE_2__.useTranslation)(),
      i18n = _useTranslation.i18n;

  var changeLanguage = function changeLanguage(lng) {
    i18n.changeLanguage(lng);
  };

  var lang = i18n.language;
  var langs = i18n.languages;

  var checkAvailability = function checkAvailability(val) {
    if (val == lang) {
      return 1;
    } else {
      return 0;
    }
  };

  return /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsxs)(react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.Fragment, {
    children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("button", {
      type: "button",
      className: checkAvailability('en') ? 'btn btn-primary-outline active' : 'btn btn-primary-outline',
      onClick: function onClick() {
        return changeLanguage("en");
      },
      children: (0,i18next__WEBPACK_IMPORTED_MODULE_0__.t)("English")
    }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("button", {
      type: "button",
      className: checkAvailability('de') ? 'btn btn-primary-outline active' : 'btn btn-primary-outline',
      onClick: function onClick() {
        return changeLanguage("de");
      },
      children: (0,i18next__WEBPACK_IMPORTED_MODULE_0__.t)("German")
    })]
  });
};

/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (Language);

/***/ }),

/***/ "./resources/src/pages/auth/Login.js":
/*!*******************************************!*\
  !*** ./resources/src/pages/auth/Login.js ***!
  \*******************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var react_router_dom__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! react-router-dom */ "./node_modules/react-router-dom/index.js");
/* harmony import */ var _config__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../config */ "./resources/src/config.js");
/* harmony import */ var react_i18next__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! react-i18next */ "./node_modules/react-i18next/dist/es/useTranslation.js");
/* harmony import */ var _component_Language__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../component/Language */ "./resources/src/component/Language.js");
/* harmony import */ var react_jsx_runtime__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! react/jsx-runtime */ "./node_modules/react/jsx-runtime.js");








var Login = function Login() {
  var _useTranslation = (0,react_i18next__WEBPACK_IMPORTED_MODULE_3__.useTranslation)(),
      t = _useTranslation.t;

  return /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_2__.jsx)(react_jsx_runtime__WEBPACK_IMPORTED_MODULE_2__.Fragment, {
    children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_2__.jsx)("section", {
      className: "vh-100",
      children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_2__.jsx)("div", {
        className: "container py-5 h-custom",
        children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_2__.jsxs)("div", {
          className: "row d-flex justify-content-center align-items-center h-100",
          children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_2__.jsx)("div", {
            className: "col-md-9 col-lg-6 col-xl-5 text-center",
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_2__.jsx)("img", {
              src: _config__WEBPACK_IMPORTED_MODULE_0__["default"].logopath,
              className: "img-fluid",
              alt: "Sample image"
            })
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_2__.jsx)("div", {
            className: "col-md-8 col-lg-6 col-xl-4 offset-xl-1",
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_2__.jsxs)("form", {
              children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_2__.jsx)("div", {
                className: "d-flex flex-row align-items-center justify-content-center mb-5",
                children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_2__.jsx)("h1", {
                  className: "fw-normal mb-0 me-3",
                  children: t('Sign In')
                })
              }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_2__.jsxs)("div", {
                className: "form-floating mb-4",
                children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_2__.jsx)("input", {
                  type: "email",
                  className: "form-control",
                  id: "floatingInput",
                  placeholder: "name@example.com"
                }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_2__.jsx)("label", {
                  htmlFor: "floatingInput",
                  children: "Email address"
                })]
              }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_2__.jsxs)("div", {
                className: "form-floating mb-4",
                children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_2__.jsx)("input", {
                  type: "password",
                  className: "form-control",
                  id: "floatingPassword",
                  placeholder: "Password",
                  autoComplete: "off"
                }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_2__.jsx)("label", {
                  htmlFor: "floatingPassword",
                  children: "Password"
                })]
              }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_2__.jsxs)("div", {
                className: "d-flex justify-content-between align-items-center mb-3",
                children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_2__.jsxs)("div", {
                  className: "form-check mb-0",
                  children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_2__.jsx)("input", {
                    className: "form-check-input me-2",
                    type: "checkbox",
                    value: "",
                    id: "form2Example3"
                  }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_2__.jsx)("label", {
                    className: "form-check-label",
                    htmlFor: "form2Example3",
                    children: "Remember me"
                  })]
                }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_2__.jsx)(react_router_dom__WEBPACK_IMPORTED_MODULE_4__.Link, {
                  to: "#!",
                  className: "text-body",
                  children: "Forgot password?"
                })]
              }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_2__.jsx)("div", {
                className: "text-center text-lg-start mt-4 pt-2",
                children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_2__.jsx)("button", {
                  type: "button",
                  className: "btn btn-primary btn-lg",
                  children: "Login"
                })
              })]
            })
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_2__.jsx)("div", {
            className: "",
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_2__.jsx)("div", {
              className: "col-12 text-center",
              children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_2__.jsx)(_component_Language__WEBPACK_IMPORTED_MODULE_1__["default"], {})
            })
          })]
        })
      })
    })
  });
};

/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (Login);

/***/ }),

/***/ "./node_modules/react-i18next/dist/es/useTranslation.js":
/*!**************************************************************!*\
  !*** ./node_modules/react-i18next/dist/es/useTranslation.js ***!
  \**************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "useTranslation": () => (/* binding */ useTranslation)
/* harmony export */ });
/* harmony import */ var _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/slicedToArray */ "./node_modules/@babel/runtime/helpers/esm/slicedToArray.js");
/* harmony import */ var _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @babel/runtime/helpers/defineProperty */ "./node_modules/@babel/runtime/helpers/esm/defineProperty.js");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! react */ "./node_modules/react/index.js");
/* harmony import */ var _context__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./context */ "./node_modules/react-i18next/dist/es/context.js");
/* harmony import */ var _utils__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./utils */ "./node_modules/react-i18next/dist/es/utils.js");



function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); if (enumerableOnly) { symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; }); } keys.push.apply(keys, symbols); } return keys; }

function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i] != null ? arguments[i] : {}; if (i % 2) { ownKeys(Object(source), true).forEach(function (key) { (0,_babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_1__["default"])(target, key, source[key]); }); } else if (Object.getOwnPropertyDescriptors) { Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)); } else { ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } } return target; }




function useTranslation(ns) {
  var props = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : {};
  var i18nFromProps = props.i18n;

  var _ref = (0,react__WEBPACK_IMPORTED_MODULE_2__.useContext)(_context__WEBPACK_IMPORTED_MODULE_3__.I18nContext) || {},
      i18nFromContext = _ref.i18n,
      defaultNSFromContext = _ref.defaultNS;

  var i18n = i18nFromProps || i18nFromContext || (0,_context__WEBPACK_IMPORTED_MODULE_3__.getI18n)();
  if (i18n && !i18n.reportNamespaces) i18n.reportNamespaces = new _context__WEBPACK_IMPORTED_MODULE_3__.ReportNamespaces();

  if (!i18n) {
    (0,_utils__WEBPACK_IMPORTED_MODULE_4__.warnOnce)('You will need to pass in an i18next instance by using initReactI18next');

    var notReadyT = function notReadyT(k) {
      return Array.isArray(k) ? k[k.length - 1] : k;
    };

    var retNotReady = [notReadyT, {}, false];
    retNotReady.t = notReadyT;
    retNotReady.i18n = {};
    retNotReady.ready = false;
    return retNotReady;
  }

  if (i18n.options.react && i18n.options.react.wait !== undefined) (0,_utils__WEBPACK_IMPORTED_MODULE_4__.warnOnce)('It seems you are still using the old wait option, you may migrate to the new useSuspense behaviour.');

  var i18nOptions = _objectSpread(_objectSpread(_objectSpread({}, (0,_context__WEBPACK_IMPORTED_MODULE_3__.getDefaults)()), i18n.options.react), props);

  var useSuspense = i18nOptions.useSuspense,
      keyPrefix = i18nOptions.keyPrefix;
  var namespaces = ns || defaultNSFromContext || i18n.options && i18n.options.defaultNS;
  namespaces = typeof namespaces === 'string' ? [namespaces] : namespaces || ['translation'];
  if (i18n.reportNamespaces.addUsedNamespaces) i18n.reportNamespaces.addUsedNamespaces(namespaces);
  var ready = (i18n.isInitialized || i18n.initializedStoreOnce) && namespaces.every(function (n) {
    return (0,_utils__WEBPACK_IMPORTED_MODULE_4__.hasLoadedNamespace)(n, i18n, i18nOptions);
  });

  function getT() {
    return i18n.getFixedT(null, i18nOptions.nsMode === 'fallback' ? namespaces : namespaces[0], keyPrefix);
  }

  var _useState = (0,react__WEBPACK_IMPORTED_MODULE_2__.useState)(getT),
      _useState2 = (0,_babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_0__["default"])(_useState, 2),
      t = _useState2[0],
      setT = _useState2[1];

  var isMounted = (0,react__WEBPACK_IMPORTED_MODULE_2__.useRef)(true);
  (0,react__WEBPACK_IMPORTED_MODULE_2__.useEffect)(function () {
    var bindI18n = i18nOptions.bindI18n,
        bindI18nStore = i18nOptions.bindI18nStore;
    isMounted.current = true;

    if (!ready && !useSuspense) {
      (0,_utils__WEBPACK_IMPORTED_MODULE_4__.loadNamespaces)(i18n, namespaces, function () {
        if (isMounted.current) setT(getT);
      });
    }

    function boundReset() {
      if (isMounted.current) setT(getT);
    }

    if (bindI18n && i18n) i18n.on(bindI18n, boundReset);
    if (bindI18nStore && i18n) i18n.store.on(bindI18nStore, boundReset);
    return function () {
      isMounted.current = false;
      if (bindI18n && i18n) bindI18n.split(' ').forEach(function (e) {
        return i18n.off(e, boundReset);
      });
      if (bindI18nStore && i18n) bindI18nStore.split(' ').forEach(function (e) {
        return i18n.store.off(e, boundReset);
      });
    };
  }, [i18n, namespaces.join()]);
  var isInitial = (0,react__WEBPACK_IMPORTED_MODULE_2__.useRef)(true);
  (0,react__WEBPACK_IMPORTED_MODULE_2__.useEffect)(function () {
    if (isMounted.current && !isInitial.current) {
      setT(getT);
    }

    isInitial.current = false;
  }, [i18n]);
  var ret = [t, i18n, ready];
  ret.t = t;
  ret.i18n = i18n;
  ret.ready = ready;
  if (ready) return ret;
  if (!ready && !useSuspense) return ret;
  throw new Promise(function (resolve) {
    (0,_utils__WEBPACK_IMPORTED_MODULE_4__.loadNamespaces)(i18n, namespaces, function () {
      resolve();
    });
  });
}

/***/ }),

/***/ "./node_modules/react-i18next/dist/es/utils.js":
/*!*****************************************************!*\
  !*** ./node_modules/react-i18next/dist/es/utils.js ***!
  \*****************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "warn": () => (/* binding */ warn),
/* harmony export */   "warnOnce": () => (/* binding */ warnOnce),
/* harmony export */   "loadNamespaces": () => (/* binding */ loadNamespaces),
/* harmony export */   "hasLoadedNamespace": () => (/* binding */ hasLoadedNamespace),
/* harmony export */   "getDisplayName": () => (/* binding */ getDisplayName)
/* harmony export */ });
function warn() {
  if (console && console.warn) {
    var _console;

    for (var _len = arguments.length, args = new Array(_len), _key = 0; _key < _len; _key++) {
      args[_key] = arguments[_key];
    }

    if (typeof args[0] === 'string') args[0] = "react-i18next:: ".concat(args[0]);

    (_console = console).warn.apply(_console, args);
  }
}
var alreadyWarned = {};
function warnOnce() {
  for (var _len2 = arguments.length, args = new Array(_len2), _key2 = 0; _key2 < _len2; _key2++) {
    args[_key2] = arguments[_key2];
  }

  if (typeof args[0] === 'string' && alreadyWarned[args[0]]) return;
  if (typeof args[0] === 'string') alreadyWarned[args[0]] = new Date();
  warn.apply(void 0, args);
}
function loadNamespaces(i18n, ns, cb) {
  i18n.loadNamespaces(ns, function () {
    if (i18n.isInitialized) {
      cb();
    } else {
      var initialized = function initialized() {
        setTimeout(function () {
          i18n.off('initialized', initialized);
        }, 0);
        cb();
      };

      i18n.on('initialized', initialized);
    }
  });
}
function hasLoadedNamespace(ns, i18n) {
  var options = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : {};

  if (!i18n.languages || !i18n.languages.length) {
    warnOnce('i18n.languages were undefined or empty', i18n.languages);
    return true;
  }

  var lng = i18n.languages[0];
  var fallbackLng = i18n.options ? i18n.options.fallbackLng : false;
  var lastLng = i18n.languages[i18n.languages.length - 1];
  if (lng.toLowerCase() === 'cimode') return true;

  var loadNotPending = function loadNotPending(l, n) {
    var loadState = i18n.services.backendConnector.state["".concat(l, "|").concat(n)];
    return loadState === -1 || loadState === 2;
  };

  if (options.bindI18n && options.bindI18n.indexOf('languageChanging') > -1 && i18n.services.backendConnector.backend && i18n.isLanguageChangingTo && !loadNotPending(i18n.isLanguageChangingTo, ns)) return false;
  if (i18n.hasResourceBundle(lng, ns)) return true;
  if (!i18n.services.backendConnector.backend) return true;
  if (loadNotPending(lng, ns) && (!fallbackLng || loadNotPending(lastLng, ns))) return true;
  return false;
}
function getDisplayName(Component) {
  return Component.displayName || Component.name || (typeof Component === 'string' && Component.length > 0 ? Component : 'Unknown');
}

/***/ })

}]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoianMvcmVzb3VyY2VzX3NyY19wYWdlc19hdXRoX0xvZ2luX2pzLmpzIiwibWFwcGluZ3MiOiI7Ozs7Ozs7Ozs7Ozs7Ozs7QUFBQTtBQUNBOzs7OztBQUlBLElBQU1FLFFBQVEsR0FBRyxTQUFYQSxRQUFXLEdBQU07QUFDbkIsd0JBQWlCRCw2REFBYyxFQUEvQjtBQUFBLE1BQVFFLElBQVIsbUJBQVFBLElBQVI7O0FBRUEsTUFBTUMsY0FBYyxHQUFHLFNBQWpCQSxjQUFpQixDQUFDQyxHQUFELEVBQVM7QUFDNUJGLElBQUFBLElBQUksQ0FBQ0MsY0FBTCxDQUFvQkMsR0FBcEI7QUFDSCxHQUZEOztBQUlBLE1BQU1DLElBQUksR0FBR0gsSUFBSSxDQUFDSSxRQUFsQjtBQUNBLE1BQU1DLEtBQUssR0FBR0wsSUFBSSxDQUFDTSxTQUFuQjs7QUFFQSxNQUFNQyxpQkFBaUIsR0FBRyxTQUFwQkEsaUJBQW9CLENBQUNDLEdBQUQsRUFBUztBQUMvQixRQUFHQSxHQUFHLElBQUlMLElBQVYsRUFBZTtBQUNYLGFBQU8sQ0FBUDtBQUNILEtBRkQsTUFFSztBQUNELGFBQU8sQ0FBUDtBQUNIO0FBQ0osR0FORDs7QUFRQSxzQkFDSTtBQUFBLDRCQUNJO0FBQ0ksVUFBSSxFQUFDLFFBRFQ7QUFFSSxlQUFTLEVBQUVJLGlCQUFpQixDQUFDLElBQUQsQ0FBakIsR0FBMEIsZ0NBQTFCLEdBQTZELHlCQUY1RTtBQUdJLGFBQU8sRUFBRTtBQUFBLGVBQU1OLGNBQWMsQ0FBQyxJQUFELENBQXBCO0FBQUEsT0FIYjtBQUFBLGdCQUtLSiwwQ0FBQyxDQUFDLFNBQUQ7QUFMTixNQURKLGVBUUk7QUFDSSxVQUFJLEVBQUMsUUFEVDtBQUVJLGVBQVMsRUFBRVUsaUJBQWlCLENBQUMsSUFBRCxDQUFqQixHQUF5QixnQ0FBekIsR0FBNEQseUJBRjNFO0FBR0ksYUFBTyxFQUFFO0FBQUEsZUFBTU4sY0FBYyxDQUFDLElBQUQsQ0FBcEI7QUFBQSxPQUhiO0FBQUEsZ0JBS0tKLDBDQUFDLENBQUMsUUFB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O0FBRUE7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ087QUFDUDtBQUNBIiwic291cmNlcyI6WyJ3ZWJwYWNrOi8vbXktd2VicGFjay1wcm9qZWN0Ly4vcmVzb3VyY2VzL3NyYy9jb21wb25lbnQvTGFuZ3VhZ2UuanMiLCJ3ZWJwYWNrOi8vbXktd2VicGFjay1wcm9qZWN0Ly4vcmVzb3VyY2VzL3NyYy9wYWdlcy9hdXRoL0xvZ2luLmpzIiwid2VicGFjazovL215LXdlYnBhY2stcHJvamVjdC8uL25vZGVfbW9kdWxlcy9yZWFjdC1pMThuZXh0L2Rpc3QvZXMvdXNlVHJhbnNsYXRpb24uanMiLCJ3ZWJwYWNrOi8vbXktd2VicGFjay1wcm9qZWN0Ly4vbm9kZV9tb2R1bGVzL3JlYWN0LWkxOG5leHQvZGlzdC9lcy91dGlscy5qcyJdLCJzb3VyY2VzQ29udGVudCI6WyJpbXBvcnQgeyB0IH0gZnJvbSBcImkxOG5leHRcIjtcbmltcG9ydCB7IHVzZVRyYW5zbGF0aW9uIH0gZnJvbSBcInJlYWN0LWkxOG5leHRcIjtcblxuXG5cbmNvbnN0IExhbmd1YWdlID0gKCkgPT4ge1xuICAgIGNvbnN0IHsgaTE4biB9ID0gdXNlVHJhbnNsYXRpb24oKTtcblxuICAgIGNvbnN0IGNoYW5nZUxhbmd1YWdlID0gKGxuZykgPT4ge1xuICAgICAgICBpMThuLmNoYW5nZUxhbmd1YWdlKGxuZyk7XG4gICAgfTtcblxuICAgIGNvbnN0IGxhbmcgPSBpMThuLmxhbmd1YWdlO1xuICAgIGNvbnN0IGxhbmdzID0gaTE4bi5sYW5ndWFnZXM7XG4gICAgXG4gICAgY29uc3QgY2hlY2tBdmFpbGFiaWxpdHkgPSAodmFsKSA9PiB7XG4gICAgICAgIGlmKHZhbCA9PSBsYW5nKXtcbiAgICAgICAgICAgIHJldHVybiAxO1xuICAgICAgICB9ZWxzZXtcbiAgICAgICAgICAgIHJldHVybiAwO1xuICAgICAgICB9XG4gICAgfVxuXG4gICAgcmV0dXJuIChcbiAgICAgICAgPD5cbiAgICAgICAgICAgIDxidXR0b25cbiAgICAgICAgICAgICAgICB0eXBlPVwiYnV0dG9uXCJcbiAgICAgICAgICAgICAgICBjbGFzc05hbWU9e2NoZWNrQXZhaWxhYmlsaXR5KCdlbicpID8gJ2J0biBidG4tcHJpbWFyeS1vdXRsaW5lIGFjdGl2ZScgOiAnYnRuIGJ0bi1wcmltYXJ5LW91dGxpbmUnfVxuICAgICAgICAgICAgICAgIG9uQ2xpY2s9eygpID0+IGNoYW5nZUxhbmd1YWdlKFwiZW5cIil9XG4gICAgICAgICAgICA+XG4gICAgICAgICAgICAgICAge3QoXCJFbmdsaXNoXCIpfVxuICAgICAgICAgICAgPC9idXR0b24+XG4gICAgICAgICAgICA8YnV0dG9uXG4gICAgICAgICAgICAgICAgdHlwZT1cImJ1dHRvblwiXG4gICAgICAgICAgICAgICAgY2xhc3NOYW1lPXtjaGVja0F2YWlsYWJpbGl0eSgnZGUnKT8gJ2J0biBidG4tcHJpbWFyeS1vdXRsaW5lIGFjdGl2ZScgOiAnYnRuIGJ0bi1wcmltYXJ5LW91dGxpbmUnfVxuICAgICAgICAgICAgICAgIG9uQ2xpY2s9eygpID0+IGNoYW5nZUxhbmd1YWdlKFwiZGVcIil9XG4gICAgICAgICAgICA+XG4gICAgICAgICAgICAgICAge3QoXCJHZXJtYW5cIil9XG4gICAgICAgICAgICA8L2J1dHRvbj5cbiAgICAgICAgPC8+XG4gICAgKTtcbn07XG5cbmV4cG9ydCBkZWZhdWx0IExhbmd1YWdlO1xuIiwiaW1wb3J0IHsgTGluayB9IGZyb20gXCJyZWFjdC1yb3V0ZXItZG9tXCI7XG5pbXBvcnQgY29uZmlnIGZyb20gXCIuLi8uLi9jb25maWdcIjtcbmltcG9ydCB7IHVzZVRyYW5zbGF0aW9uIH0gZnJvbSAncmVhY3QtaTE4bmV4dCc7XG5pbXBvcnQgTGFuZ3VhZ2UgZnJvbSBcIi4uLy4uL2NvbXBvbmVudC9MYW5ndWFnZVwiO1xuXG5jb25zdCBMb2dpbiA9ICgpID0+IHtcbiAgICBjb25zdCB7IHQgfSA9IHVzZVRyYW5zbGF0aW9uKCk7XG4gICAgcmV0dXJuIChcbiAgICAgICAgPD5cbiAgICAgICAgICAgIDxzZWN0aW9uIGNsYXNzTmFtZT1cInZoLTEwMFwiPlxuICAgICAgICAgICAgICAgIDxkaXYgY2xhc3NOYW1lPVwiY29udGFpbmVyIHB5LTUgaC1jdXN0b21cIj5cbiAgICAgICAgICAgICAgICAgICAgPGRpdiBjbGFzc05hbWU9XCJyb3cgZC1mbGV4IGp1c3RpZnktY29udGVudC1jZW50ZXIgYWxpZ24taXRlbXMtY2VudGVyIGgtMTAwXCI+XG4gICAgICAgICAgICAgICAgICAgICAgICA8ZGl2IGNsYXNzTmFtZT1cImNvbC1tZC05IGNvbC1sZy02IGNvbC14bC01IHRleHQtY2VudGVyXCI+XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgPGltZ1xuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICBzcmM9e2NvbmZpZy5sb2dvcGF0aH1cbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgY2xhc3NOYW1lPVwiaW1nLWZsdWlkXCJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgYWx0PVwiU2FtcGxlIGltYWdlXCJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAvPlxuICAgICAgICAgICAgICAgICAgICAgICAgPC9kaXY+XG4gICAgICAgICAgICAgICAgICAgICAgICA8ZGl2IGNsYXNzTmFtZT1cImNvbC1tZC04IGNvbC1sZy02IGNvbC14bC00IG9mZnNldC14bC0xXCI+XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgPGZvcm0+XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIDxkaXYgY2xhc3NOYW1lPVwiZC1mbGV4IGZsZXgtcm93IGFsaWduLWl0ZW1zLWNlbnRlciBqdXN0aWZ5LWNvbnRlbnQtY2VudGVyIG1iLTVcIj5cbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIDxoMSBjbGFzc05hbWU9XCJmdy1ub3JtYWwgbWItMCBtZS0zXCI+XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAge3QoJ1NpZ24gSW4nKX1cbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIDwvaDE+XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIDwvZGl2PlxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8ZGl2IGNsYXNzTmFtZT1cImZvcm0tZmxvYXRpbmcgbWItNFwiPlxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgPGlucHV0XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgdHlwZT1cImVtYWlsXCJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICBjbGFzc05hbWU9XCJmb3JtLWNvbnRyb2xcIlxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIGlkPVwiZmxvYXRpbmdJbnB1dFwiXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgcGxhY2Vob2xkZXI9XCJuYW1lQGV4YW1wbGUuY29tXCJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIC8+XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8bGFiZWwgaHRtbEZvcj1cImZsb2F0aW5nSW5wdXRcIj5cbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICBFbWFpbCBhZGRyZXNzXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8L2xhYmVsPlxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8L2Rpdj5cbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgPGRpdiBjbGFzc05hbWU9XCJmb3JtLWZsb2F0aW5nIG1iLTRcIj5cbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIDxpbnB1dFxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIHR5cGU9XCJwYXNzd29yZFwiXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgY2xhc3NOYW1lPVwiZm9ybS1jb250cm9sXCJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICBpZD1cImZsb2F0aW5nUGFzc3dvcmRcIlxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIHBsYWNlaG9sZGVyPVwiUGFzc3dvcmRcIlxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIGF1dG9Db21wbGV0ZT1cIm9mZlwiXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAvPlxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgPGxhYmVsIGh0bWxGb3I9XCJmbG9hdGluZ1Bhc3N3b3JkXCI+XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgUGFzc3dvcmRcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIDwvbGFiZWw+XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIDwvZGl2PlxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8ZGl2IGNsYXNzTmFtZT1cImQtZmxleCBqdXN0aWZ5LWNvbnRlbnQtYmV0d2VlbiBhbGlnbi1pdGVtcy1jZW50ZXIgbWItM1wiPlxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgPGRpdiBjbGFzc05hbWU9XCJmb3JtLWNoZWNrIG1iLTBcIj5cbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8aW5wdXRcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgY2xhc3NOYW1lPVwiZm9ybS1jaGVjay1pbnB1dCBtZS0yXCJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgdHlwZT1cImNoZWNrYm94XCJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgdmFsdWU9XCJcIlxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICBpZD1cImZvcm0yRXhhbXBsZTNcIlxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIC8+XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgPGxhYmVsXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIGNsYXNzTmFtZT1cImZvcm0tY2hlY2stbGFiZWxcIlxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICBodG1sRm9yPVwiZm9ybTJFeGFtcGxlM1wiXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgPlxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICBSZW1lbWJlciBtZVxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIDwvbGFiZWw+XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8L2Rpdj5cbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIDxMaW5rIHRvPVwiIyFcIiBjbGFzc05hbWU9XCJ0ZXh0LWJvZHlcIj5cbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICBGb3Jnb3QgcGFzc3dvcmQ/XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8L0xpbms+XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIDwvZGl2PlxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8ZGl2IGNsYXNzTmFtZT1cInRleHQtY2VudGVyIHRleHQtbGctc3RhcnQgbXQtNCBwdC0yXCI+XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8YnV0dG9uXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgdHlwZT1cImJ1dHRvblwiXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgY2xhc3NOYW1lPVwiYnRuIGJ0bi1wcmltYXJ5IGJ0bi1sZ1wiXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA+XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgTG9naW5cbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIDwvYnV0dG9uPlxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8L2Rpdj5cbiAgICAgICAgICAgICAgICAgICAgICAgICAgICA8L2Zvcm0+XG4gICAgICAgICAgICAgICAgICAgICAgICA8L2Rpdj5cbiAgICAgICAgICAgICAgICAgICAgICAgIDxkaXYgY2xhc3NOYW1lPVwiXCI+XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgPGRpdiBjbGFzc05hbWU9XCJjb2wtMTIgdGV4dC1jZW50ZXJcIj5cbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgPExhbmd1YWdlIC8+XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgPC9kaXY+XG4gICAgICAgICAgICAgICAgICAgICAgICA8L2Rpdj5cbiAgICAgICAgICAgICAgICAgICAgPC9kaXY+XG4gICAgICAgICAgICAgICAgPC9kaXY+XG4gICAgICAgICAgICA8L3NlY3Rpb24+XG4gICAgICAgIDwvPlxuICAgICk7XG59O1xuXG5leHBvcnQgZGVmYXVsdCBMb2dpbjtcbiIsImltcG9ydCBfc2xpY2VkVG9BcnJheSBmcm9tIFwiQGJhYmVsL3J1bnRpbWUvaGVscGVycy9zbGljZWRUb0FycmF5XCI7XG5pbXBvcnQgX2RlZmluZVByb3BlcnR5IGZyb20gXCJAYmFiZWwvcnVudGltZS9oZWxwZXJzL2RlZmluZVByb3BlcnR5XCI7XG5cbmZ1bmN0aW9uIG93bktleXMob2JqZWN0LCBlbnVtZXJhYmxlT25seSkgeyB2YXIga2V5cyA9IE9iamVjdC5rZXlzKG9iamVjdCk7IGlmIChPYmplY3QuZ2V0T3duUHJvcGVydHlTeW1ib2xzKSB7IHZhciBzeW1ib2xzID0gT2JqZWN0LmdldE93blByb3BlcnR5U3ltYm9scyhvYmplY3QpOyBpZiAoZW51bWVyYWJsZU9ubHkpIHsgc3ltYm9scyA9IHN5bWJvbHMuZmlsdGVyKGZ1bmN0aW9uIChzeW0pIHsgcmV0dXJuIE9iamVjdC5nZXRPd25Qcm9wZXJ0eURlc2NyaXB0b3Iob2JqZWN0LCBzeW0pLmVudW1lcmFibGU7IH0pOyB9IGtleXMucHVzaC5hcHBseShrZXlzLCBzeW1ib2xzKTsgfSByZXR1cm4ga2V5czsgfVxuXG5mdW5jdGlvbiBfb2JqZWN0U3ByZWFkKHRhcmdldCkgeyBmb3IgKHZhciBpID0gMTsgaSA8IGFyZ3VtZW50cy5sZW5ndGg7IGkrKykgeyB2YXIgc291cmNlID0gYXJndW1lbnRzW2ldICE9IG51bGwgPyBhcmd1bWVudHNbaV0gOiB7fTsgaWYgKGkgJSAyKSB7IG93bktleXMoT2JqZWN0KHNvdXJjZSksIHRydWUpLmZvckVhY2goZnVuY3Rpb24gKGtleSkgeyBfZGVmaW5lUHJvcGVydHkodGFyZ2V0LCBrZXksIHNvdXJjZVtrZXldKTsgfSk7IH0gZWxzZSBpZiAoT2JqZWN0LmdldE93blByb3BlcnR5RGVzY3JpcHRvcnMpIHsgT2JqZWN0LmRlZmluZVByb3BlcnRpZXModGFyZ2V0LCBPYmplY3QuZ2V0T3duUHJvcGVydHlEZXNjcmlwdG9ycyhzb3VyY2UpKTsgfSBlbHNlIHsgb3duS2V5cyhPYmplY3Qoc291cmNlKSkuZm9yRWFjaChmdW5jdGlvbiAoa2V5KSB7IE9iamVjdC5kZWZpbmVQcm9wZXJ0eSh0YXJnZXQsIGtleSwgT2JqZWN0LmdldE93blByb3BlcnR5RGVzY3JpcHRvcihzb3VyY2UsIGtleSkpOyB9KTsgfSB9IHJldHVybiB0YXJnZXQ7IH1cblxuaW1wb3J0IHsgdXNlU3RhdGUsIHVzZUVmZmVjdCwgdXNlQ29udGV4dCwgdXNlUmVmIH0gZnJvbSAncmVhY3QnO1xuaW1wb3J0IHsgZ2V0STE4biwgZ2V0RGVmYXVsdHMsIFJlcG9ydE5hbWVzcGFjZXMsIEkxOG5Db250ZXh0IH0gZnJvbSAnLi9jb250ZXh0JztcbmltcG9ydCB7IHdhcm5PbmNlLCBsb2FkTmFtZXNwYWNlcywgaGFzTG9hZGVkTmFtZXNwYWNlIH0gZnJvbSAnLi91dGlscyc7XG5leHBvcnQgZnVuY3Rpb24gdXNlVHJhbnNsYXRpb24obnMpIHtcbiAgdmFyIHByb3BzID0gYXJndW1lbnRzLmxlbmd0aCA+IDEgJiYgYXJndW1lbnRzWzFdICE9PSB1bmRlZmluZWQgPyBhcmd1bWVudHNbMV0gOiB7fTtcbiAgdmFyIGkxOG5Gcm9tUHJvcHMgPSBwcm9wcy5pMThuO1xuXG4gIHZhciBfcmVmID0gdXNlQ29udGV4dChJMThuQ29udGV4dCkgfHwge30sXG4gICAgICBpMThuRnJvbUNvbnRleHQgPSBfcmVmLmkxOG4sXG4gICAgICBkZWZhdWx0TlNGcm9tQ29udGV4dCA9IF9yZWYuZGVmYXVsdE5TO1xuXG4gIHZhciBpMThuID0gaTE4bkZyb21Qcm9wcyB8fCBpMThuRnJvbUNvbnRleHQgfHwgZ2V0STE4bigpO1xuICBpZiAoaTE4biAmJiAhaTE4bi5yZXBvcnROYW1lc3BhY2VzKSBpMThuLnJlcG9ydE5hbWVzcGFjZXMgPSBuZXcgUmVwb3J0TmFtZXNwYWNlcygpO1xuXG4gIGlmICghaTE4bikge1xuICAgIHdhcm5PbmNlKCdZb3Ugd2lsbCBuZWVkIHRvIHBhc3MgaW4gYW4gaTE4bmV4dCBpbnN0YW5jZSBieSB1c2luZyBpbml0UmVhY3RJMThuZXh0Jyk7XG5cbiAgICB2YXIgbm90UmVhZHlUID0gZnVuY3Rpb24gbm90UmVhZHlUKGspIHtcbiAgICAgIHJldHVybiBBcnJheS5pc0FycmF5KGspID8ga1trLmxlbmd0aCAtIDFdIDogaztcbiAgICB9O1xuXG4gICAgdmFyIHJldE5vdFJlYWR5ID0gW25vdFJlYWR5VCwge30sIGZhbHNlXTtcbiAgICByZXROb3RSZWFkeS50ID0gbm90UmVhZHlUO1xuICAgIHJldE5vdFJlYWR5LmkxOG4gPSB7fTtcbiAgICByZXROb3RSZWFkeS5yZWFkeSA9IGZhbHNlO1xuICAgIHJldHVybiByZXROb3RSZWFkeTtcbiAgfVxuXG4gIGlmIChpMThuLm9wdGlvbnMucmVhY3QgJiYgaTE4bi5vcHRpb25zLnJlYWN0LndhaXQgIT09IHVuZGVmaW5lZCkgd2Fybk9uY2UoJ0l0IHNlZW1zIHlvdSBhcmUgc3RpbGwgdXNpbmcgdGhlIG9sZCB3YWl0IG9wdGlvbiwgeW91IG1heSBtaWdyYXRlIHRvIHRoZSBuZXcgdXNlU3VzcGVuc2UgYmVoYXZpb3VyLicpO1xuXG4gIHZhciBpMThuT3B0aW9ucyA9IF9vYmplY3RTcHJlYWQoX29iamVjdFNwcmVhZChfb2JqZWN0U3ByZWFkKHt9LCBnZXREZWZhdWx0cygpKSwgaTE4bi5vcHRpb25zLnJlYWN0KSwgcHJvcHMpO1xuXG4gIHZhciB1c2VTdXNwZW5zZSA9IGkxOG5PcHRpb25zLnVzZVN1c3BlbnNlLFxuICAgICAga2V5UHJlZml4ID0gaTE4bk9wdGlvbnMua2V5UHJlZml4O1xuICB2YXIgbmFtZXNwYWNlcyA9IG5zIHx8IGRlZmF1bHROU0Zyb21Db250ZXh0IHx8IGkxOG4ub3B0aW9ucyAmJiBpMThuLm9wdGlvbnMuZGVmYXVsdE5TO1xuICBuYW1lc3BhY2VzID0gdHlwZW9mIG5hbWVzcGFjZXMgPT09ICdzdHJpbmcnID8gW25hbWVzcGFjZXNdIDogbmFtZXNwYWNlcyB8fCBbJ3RyYW5zbGF0aW9uJ107XG4gIGlmIChpMThuLnJlcG9ydE5hbWVzcGFjZXMuYWRkVXNlZE5hbWVzcGFjZXMpIGkxOG4ucmVwb3J0TmFtZXNwYWNlcy5hZGRVc2VkTmFtZXNwYWNlcyhuYW1lc3BhY2VzKTtcbiAgdmFyIHJlYWR5ID0gKGkxOG4uaXNJbml0aWFsaXplZCB8fCBpMThuLmluaXRpYWxpemVkU3RvcmVPbmNlKSAmJiBuYW1lc3BhY2VzLmV2ZXJ5KGZ1bmN0aW9uIChuKSB7XG4gICAgcmV0dXJuIGhhc0xvYWRlZE5hbWVzcGFjZShuLCBpMThuLCBpMThuT3B0aW9ucyk7XG4gIH0pO1xuXG4gIGZ1bmN0aW9uIGdldFQoKSB7XG4gICAgcmV0dXJuIGkxOG4uZ2V0Rml4ZWRUKG51bGwsIGkxOG5PcHRpb25zLm5zTW9kZSA9PT0gJ2ZhbGxiYWNrJyA/IG5hbWVzcGFjZXMgOiBuYW1lc3BhY2VzWzBdLCBrZXlQcmVmaXgpO1xuICB9XG5cbiAgdmFyIF91c2VTdGF0ZSA9IHVzZVN0YXRlKGdldFQpLFxuICAgICAgX3VzZVN0YXRlMiA9IF9zbGljZWRUb0FycmF5KF91c2VTdGF0ZSwgMiksXG4gICAgICB0ID0gX3VzZVN0YXRlMlswXSxcbiAgICAgIHNldFQgPSBfdXNlU3RhdGUyWzFdO1xuXG4gIHZhciBpc01vdW50ZWQgPSB1c2VSZWYodHJ1ZSk7XG4gIHVzZUVmZmVjdChmdW5jdGlvbiAoKSB7XG4gICAgdmFyIGJpbmRJMThuID0gaTE4bk9wdGlvbnMuYmluZEkxOG4sXG4gICAgICAgIGJpbmRJMThuU3RvcmUgPSBpMThuT3B0aW9ucy5iaW5kSTE4blN0b3JlO1xuICAgIGlzTW91bnRlZC5jdXJyZW50ID0gdHJ1ZTtcblxuICAgIGlmICghcmVhZHkgJiYgIXVzZVN1c3BlbnNlKSB7XG4gICAgICBsb2FkTmFtZXNwYWNlcyhpMThuLCBuYW1lc3BhY2VzLCBmdW5jdGlvbiAoKSB7XG4gICAgICAgIGlmIChpc01vdW50ZWQuY3VycmVudCkgc2V0VChnZXRUKTtcbiAgICAgIH0pO1xuICAgIH1cblxuICAgIGZ1bmN0aW9uIGJvdW5kUmVzZXQoKSB7XG4gICAgICBpZiAoaXNNb3VudGVkLmN1cnJlbnQpIHNldFQoZ2V0VCk7XG4gICAgfVxuXG4gICAgaWYgKGJpbmRJMThuICYmIGkxOG4pIGkxOG4ub24oYmluZEkxOG4sIGJvdW5kUmVzZXQpO1xuICAgIGlmIChiaW5kSTE4blN0b3JlICYmIGkxOG4pIGkxOG4uc3RvcmUub24oYmluZEkxOG5TdG9yZSwgYm91bmRSZXNldCk7XG4gICAgcmV0dXJuIGZ1bmN0aW9uICgpIHtcbiAgICAgIGlzTW91bnRlZC5jdXJyZW50ID0gZmFsc2U7XG4gICAgICBpZiAoYmluZEkxOG4gJiYgaTE4bikgYmluZEkxOG4uc3BsaXQoJyAnKS5mb3JFYWNoKGZ1bmN0aW9uIChlKSB7XG4gICAgICAgIHJldHVybiBpMThuLm9mZihlLCBib3VuZFJlc2V0KTtcbiAgICAgIH0pO1xuICAgICAgaWYgKGJpbmRJMThuU3RvcmUgJiYgaTE4bikgYmluZEkxOG5TdG9yZS5zcGxpdCgnICcpLmZvckVhY2goZnVuY3Rpb24gKGUpIHtcbiAgICAgICAgcmV0dXJuIGkxOG4uc3RvcmUub2ZmKGUsIGJvdW5kUmVzZXQpO1xuICAgICAgfSk7XG4gICAgfTtcbiAgfSwgW2kxOG4sIG5hbWVzcGFjZXMuam9pbigpXSk7XG4gIHZhciBpc0luaXRpYWwgPSB1c2VSZWYodHJ1ZSk7XG4gIHVzZUVmZmVjdChmdW5jdGlvbiAoKSB7XG4gICAgaWYgKGlzTW91bnRlZC5jdXJyZW50ICYmICFpc0luaXRpYWwuY3VycmVudCkge1xuICAgICAgc2V0VChnZXRUKTtcbiAgICB9XG5cbiAgICBpc0luaXRpYWwuY3VycmVudCA9IGZhbHNlO1xuICB9LCBbaTE4bl0pO1xuICB2YXIgcmV0ID0gW3QsIGkxOG4sIHJlYWR5XTtcbiAgcmV0LnQgPSB0O1xuICByZXQuaTE4biA9IGkxOG47XG4gIHJldC5yZWFkeSA9IHJlYWR5O1xuICBpZiAocmVhZHkpIHJldHVybiByZXQ7XG4gIGlmICghcmVhZHkgJiYgIXVzZVN1c3BlbnNlKSByZXR1cm4gcmV0O1xuICB0aHJvdyBuZXcgUHJvbWlzZShmdW5jdGlvbiAocmVzb2x2ZSkge1xuICAgIGxvYWROYW1lc3BhY2VzKGkxOG4sIG5hbWVzcGFjZXMsIGZ1bmN0aW9uICgpIHtcbiAgICAgIHJlc29sdmUoKTtcbiAgICB9KTtcbiAgfSk7XG59IiwiZXhwb3J0IGZ1bmN0aW9uIHdhcm4oKSB7XG4gIGlmIChjb25zb2xlICYmIGNvbnNvbGUud2Fybikge1xuICAgIHZhciBfY29uc29sZTtcblxuICAgIGZvciAodmFyIF9sZW4gPSBhcmd1bWVudHMubGVuZ3RoLCBhcmdzID0gbmV3IEFycmF5KF9sZW4pLCBfa2V5ID0gMDsgX2tleSA8IF9sZW47IF9rZXkrKykge1xuICAgICAgYXJnc1tfa2V5XSA9IGFyZ3VtZW50c1tfa2V5XTtcbiAgICB9XG5cbiAgICBpZiAodHlwZW9mIGFyZ3NbMF0gPT09ICdzdHJpbmcnKSBhcmdzWzBdID0gXCJyZWFjdC1pMThuZXh0OjogXCIuY29uY2F0KGFyZ3NbMF0pO1xuXG4gICAgKF9jb25zb2xlID0gY29uc29sZSkud2Fybi5hcHBseShfY29uc29sZSwgYXJncyk7XG4gIH1cbn1cbnZhciBhbHJlYWR5V2FybmVkID0ge307XG5leHBvcnQgZnVuY3Rpb24gd2Fybk9uY2UoKSB7XG4gIGZvciAodmFyIF9sZW4yID0gYXJndW1lbnRzLmxlbmd0aCwgYXJncyA9IG5ldyBBcnJheShfbGVuMiksIF9rZXkyID0gMDsgX2tleTIgPCBfbGVuMjsgX2tleTIrKykge1xuICAgIGFyZ3NbX2tleTJdID0gYXJndW1lbnRzW19rZXkyXTtcbiAgfVxuXG4gIGlmICh0eXBlb2YgYXJnc1swXSA9PT0gJ3N0cmluZycgJiYgYWxyZWFkeVdhcm5lZFthcmdzWzBdXSkgcmV0dXJuO1xuICBpZiAodHlwZW9mIGFyZ3NbMF0gPT09ICdzdHJpbmcnKSBhbHJlYWR5V2FybmVkW2FyZ3NbMF1dID0gbmV3IERhdGUoKTtcbiAgd2Fybi5hcHBseSh2b2lkIDAsIGFyZ3MpO1xufVxuZXhwb3J0IGZ1bmN0aW9uIGxvYWROYW1lc3BhY2VzKGkxOG4sIG5zLCBjYikge1xuICBpMThuLmxvYWROYW1lc3BhY2VzKG5zLCBmdW5jdGlvbiAoKSB7XG4gICAgaWYgKGkxOG4uaXNJbml0aWFsaXplZCkge1xuICAgICAgY2IoKTtcbiAgICB9IGVsc2Uge1xuICAgICAgdmFyIGluaXRpYWxpemVkID0gZnVuY3Rpb24gaW5pdGlhbGl6ZWQoKSB7XG4gICAgICAgIHNldFRpbWVvdXQoZnVuY3Rpb24gKCkge1xuICAgICAgICAgIGkxOG4ub2ZmKCdpbml0aWFsaXplZCcsIGluaXRpYWxpemVkKTtcbiAgICAgICAgfSwgMCk7XG4gICAgICAgIGNiKCk7XG4gICAgICB9O1xuXG4gICAgICBpMThuLm9uKCdpbml0aWFsaXplZCcsIGluaXRpYWxpemVkKTtcbiAgICB9XG4gIH0pO1xufVxuZXhwb3J0IGZ1bmN0aW9uIGhhc0xvYWRlZE5hbWVzcGFjZShucywgaTE4bikge1xuICB2YXIgb3B0aW9ucyA9IGFyZ3VtZW50cy5sZW5ndGggPiAyICYmIGFyZ3VtZW50c1syXSAhPT0gdW5kZWZpbmVkID8gYXJndW1lbnRzWzJdIDoge307XG5cbiAgaWYgKCFpMThuLmxhbmd1YWdlcyB8fCAhaTE4bi5sYW5ndWFnZXMubGVuZ3RoKSB7XG4gICAgd2Fybk9uY2UoJ2kxOG4ubGFuZ3VhZ2VzIHdlcmUgdW5kZWZpbmVkIG9yIGVtcHR5JywgaTE4bi5sYW5ndWFnZXMpO1xuICAgIHJldHVybiB0cnVlO1xuICB9XG5cbiAgdmFyIGxuZyA9IGkxOG4ubGFuZ3VhZ2VzWzBdO1xuICB2YXIgZmFsbGJhY2tMbmcgPSBpMThuLm9wdGlvbnMgPyBpMThuLm9wdGlvbnMuZmFsbGJhY2tMbmcgOiBmYWxzZTtcbiAgdmFyIGxhc3RMbmcgPSBpMThuLmxhbmd1YWdlc1tpMThuLmxhbmd1YWdlcy5sZW5ndGggLSAxXTtcbiAgaWYgKGxuZy50b0xvd2VyQ2FzZSgpID09PSAnY2ltb2RlJykgcmV0dXJuIHRydWU7XG5cbiAgdmFyIGxvYWROb3RQZW5kaW5nID0gZnVuY3Rpb24gbG9hZE5vdFBlbmRpbmcobCwgbikge1xuICAgIHZhciBsb2FkU3RhdGUgPSBpMThuLnNlcnZpY2VzLmJhY2tlbmRDb25uZWN0b3Iuc3RhdGVbXCJcIi5jb25jYXQobCwgXCJ8XCIpLmNvbmNhdChuKV07XG4gICAgcmV0dXJuIGxvYWRTdGF0ZSA9PT0gLTEgfHwgbG9hZFN0YXRlID09PSAyO1xuICB9O1xuXG4gIGlmIChvcHRpb25zLmJpbmRJMThuICYmIG9wdGlvbnMuYmluZEkxOG4uaW5kZXhPZignbGFuZ3VhZ2VDaGFuZ2luZycpID4gLTEgJiYgaTE4bi5zZXJ2aWNlcy5iYWNrZW5kQ29ubmVjdG9yLmJhY2tlbmQgJiYgaTE4bi5pc0xhbmd1YWdlQ2hhbmdpbmdUbyAmJiAhbG9hZE5vdFBlbmRpbmcoaTE4bi5pc0xhbmd1YWdlQ2hhbmdpbmdUbywgbnMpKSByZXR1cm4gZmFsc2U7XG4gIGlmIChpMThuLmhhc1Jlc291cmNlQnVuZGxlKGxuZywgbnMpKSByZXR1cm4gdHJ1ZTtcbiAgaWYgKCFpMThuLnNlcnZpY2VzLmJhY2tlbmRDb25uZWN0b3IuYmFja2VuZCkgcmV0dXJuIHRydWU7XG4gIGlmIChsb2FkTm90UGVuZGluZyhsbmcsIG5zKSAmJiAoIWZhbGxiYWNrTG5nIHx8IGxvYWROb3RQZW5kaW5nKGxhc3RMbmcsIG5zKSkpIHJldHVybiB0cnVlO1xuICByZXR1cm4gZmFsc2U7XG59XG5leHBvcnQgZnVuY3Rpb24gZ2V0RGlzcGxheU5hbWUoQ29tcG9uZW50KSB7XG4gIHJldHVybiBDb21wb25lbnQuZGlzcGxheU5hbWUgfHwgQ29tcG9uZW50Lm5hbWUgfHwgKHR5cGVvZiBDb21wb25lbnQgPT09ICdzdHJpbmcnICYmIENvbXBvbmVudC5sZW5ndGggPiAwID8gQ29tcG9uZW50IDogJ1Vua25vd24nKTtcbn0iXSwibmFtZXMiOlsidCIsInVzZVRyYW5zbGF0aW9uIiwiTGFuZ3VhZ2UiLCJpMThuIiwiY2hhbmdlTGFuZ3VhZ2UiLCJsbmciLCJsYW5nIiwibGFuZ3VhZ2UiLCJsYW5ncyIsImxhbmd1YWdlcyIsImNoZWNrQXZhaWxhYmlsaXR5IiwidmFsIiwiTGluayIsImNvbmZpZyIsIkxvZ2luIiwibG9nb3BhdGgiXSwic291cmNlUm9vdCI6IiJ9