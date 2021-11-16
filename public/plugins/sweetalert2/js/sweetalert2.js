/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./node_modules/sweetalert2/src/SweetAlert.js":
/*!****************************************************!*\
  !*** ./node_modules/sweetalert2/src/SweetAlert.js ***!
  \****************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _utils_DismissReason_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./utils/DismissReason.js */ "./node_modules/sweetalert2/src/utils/DismissReason.js");
/* harmony import */ var _staticMethods_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./staticMethods.js */ "./node_modules/sweetalert2/src/staticMethods.js");
/* harmony import */ var _instanceMethods_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./instanceMethods.js */ "./node_modules/sweetalert2/src/instanceMethods.js");
/* harmony import */ var _privateProps_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./privateProps.js */ "./node_modules/sweetalert2/src/privateProps.js");





let currentInstance

class SweetAlert {
  constructor (...args) {
    // Prevent run in Node env
    if (typeof window === 'undefined') {
      return
    }

    currentInstance = this

    const outerParams = Object.freeze(this.constructor.argsToParams(args))

    Object.defineProperties(this, {
      params: {
        value: outerParams,
        writable: false,
        enumerable: true,
        configurable: true
      }
    })

    const promise = this._main(this.params)
    _privateProps_js__WEBPACK_IMPORTED_MODULE_3__["default"].promise.set(this, promise)
  }

  // `catch` cannot be the name of a module export, so we define our thenable methods here instead
  then (onFulfilled) {
    const promise = _privateProps_js__WEBPACK_IMPORTED_MODULE_3__["default"].promise.get(this)
    return promise.then(onFulfilled)
  }

  finally (onFinally) {
    const promise = _privateProps_js__WEBPACK_IMPORTED_MODULE_3__["default"].promise.get(this)
    return promise.finally(onFinally)
  }
}

// Assign instance methods from src/instanceMethods/*.js to prototype
Object.assign(SweetAlert.prototype, _instanceMethods_js__WEBPACK_IMPORTED_MODULE_2__)

// Assign static methods from src/staticMethods/*.js to constructor
Object.assign(SweetAlert, _staticMethods_js__WEBPACK_IMPORTED_MODULE_1__)

// Proxy to instance methods to constructor, for now, for backwards compatibility
Object.keys(_instanceMethods_js__WEBPACK_IMPORTED_MODULE_2__).forEach(key => {
  SweetAlert[key] = function (...args) {
    if (currentInstance) {
      return currentInstance[key](...args)
    }
  }
})

SweetAlert.DismissReason = _utils_DismissReason_js__WEBPACK_IMPORTED_MODULE_0__.DismissReason

SweetAlert.version = '11.1.10'

/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (SweetAlert);


/***/ }),

/***/ "./node_modules/sweetalert2/src/constants.js":
/*!***************************************************!*\
  !*** ./node_modules/sweetalert2/src/constants.js ***!
  \***************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "RESTORE_FOCUS_TIMEOUT": () => (/* binding */ RESTORE_FOCUS_TIMEOUT)
/* harmony export */ });
const RESTORE_FOCUS_TIMEOUT = 100


/***/ }),

/***/ "./node_modules/sweetalert2/src/globalState.js":
/*!*****************************************************!*\
  !*** ./node_modules/sweetalert2/src/globalState.js ***!
  \*****************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__),
/* harmony export */   "restoreActiveElement": () => (/* binding */ restoreActiveElement)
/* harmony export */ });
/* harmony import */ var _constants_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./constants.js */ "./node_modules/sweetalert2/src/constants.js");


const globalState = {}

/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (globalState);

const focusPreviousActiveElement = () => {
  if (globalState.previousActiveElement && globalState.previousActiveElement.focus) {
    globalState.previousActiveElement.focus()
    globalState.previousActiveElement = null
  } else if (document.body) {
    document.body.focus()
  }
}

// Restore previous active (focused) element
const restoreActiveElement = (returnFocus) => {
  return new Promise(resolve => {
    if (!returnFocus) {
      return resolve()
    }
    const x = window.scrollX
    const y = window.scrollY

    globalState.restoreFocusTimeout = setTimeout(() => {
      focusPreviousActiveElement()
      resolve()
    }, _constants_js__WEBPACK_IMPORTED_MODULE_0__.RESTORE_FOCUS_TIMEOUT) // issues/900

    window.scrollTo(x, y)
  })
}


/***/ }),

/***/ "./node_modules/sweetalert2/src/instanceMethods.js":
/*!*********************************************************!*\
  !*** ./node_modules/sweetalert2/src/instanceMethods.js ***!
  \*********************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "disableLoading": () => (/* reexport safe */ _instanceMethods_hideLoading_js__WEBPACK_IMPORTED_MODULE_0__.disableLoading),
/* harmony export */   "hideLoading": () => (/* reexport safe */ _instanceMethods_hideLoading_js__WEBPACK_IMPORTED_MODULE_0__.hideLoading),
/* harmony export */   "getInput": () => (/* reexport safe */ _instanceMethods_getInput_js__WEBPACK_IMPORTED_MODULE_1__.getInput),
/* harmony export */   "close": () => (/* reexport safe */ _instanceMethods_close_js__WEBPACK_IMPORTED_MODULE_2__.close),
/* harmony export */   "closeModal": () => (/* reexport safe */ _instanceMethods_close_js__WEBPACK_IMPORTED_MODULE_2__.closeModal),
/* harmony export */   "closePopup": () => (/* reexport safe */ _instanceMethods_close_js__WEBPACK_IMPORTED_MODULE_2__.closePopup),
/* harmony export */   "closeToast": () => (/* reexport safe */ _instanceMethods_close_js__WEBPACK_IMPORTED_MODULE_2__.closeToast),
/* harmony export */   "isAwaitingPromise": () => (/* reexport safe */ _instanceMethods_close_js__WEBPACK_IMPORTED_MODULE_2__.isAwaitingPromise),
/* harmony export */   "rejectPromise": () => (/* reexport safe */ _instanceMethods_close_js__WEBPACK_IMPORTED_MODULE_2__.rejectPromise),
/* harmony export */   "disableButtons": () => (/* reexport safe */ _instanceMethods_enable_disable_elements_js__WEBPACK_IMPORTED_MODULE_3__.disableButtons),
/* harmony export */   "disableInput": () => (/* reexport safe */ _instanceMethods_enable_disable_elements_js__WEBPACK_IMPORTED_MODULE_3__.disableInput),
/* harmony export */   "enableButtons": () => (/* reexport safe */ _instanceMethods_enable_disable_elements_js__WEBPACK_IMPORTED_MODULE_3__.enableButtons),
/* harmony export */   "enableInput": () => (/* reexport safe */ _instanceMethods_enable_disable_elements_js__WEBPACK_IMPORTED_MODULE_3__.enableInput),
/* harmony export */   "resetValidationMessage": () => (/* reexport safe */ _instanceMethods_validation_message_js__WEBPACK_IMPORTED_MODULE_4__.resetValidationMessage),
/* harmony export */   "showValidationMessage": () => (/* reexport safe */ _instanceMethods_validation_message_js__WEBPACK_IMPORTED_MODULE_4__.showValidationMessage),
/* harmony export */   "getProgressSteps": () => (/* reexport safe */ _instanceMethods_progress_steps_js__WEBPACK_IMPORTED_MODULE_5__.getProgressSteps),
/* harmony export */   "_main": () => (/* reexport safe */ _instanceMethods_main_js__WEBPACK_IMPORTED_MODULE_6__._main),
/* harmony export */   "update": () => (/* reexport safe */ _instanceMethods_update_js__WEBPACK_IMPORTED_MODULE_7__.update),
/* harmony export */   "_destroy": () => (/* reexport safe */ _instanceMethods_destroy_js__WEBPACK_IMPORTED_MODULE_8__._destroy)
/* harmony export */ });
/* harmony import */ var _instanceMethods_hideLoading_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./instanceMethods/hideLoading.js */ "./node_modules/sweetalert2/src/instanceMethods/hideLoading.js");
/* harmony import */ var _instanceMethods_getInput_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./instanceMethods/getInput.js */ "./node_modules/sweetalert2/src/instanceMethods/getInput.js");
/* harmony import */ var _instanceMethods_close_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./instanceMethods/close.js */ "./node_modules/sweetalert2/src/instanceMethods/close.js");
/* harmony import */ var _instanceMethods_enable_disable_elements_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./instanceMethods/enable-disable-elements.js */ "./node_modules/sweetalert2/src/instanceMethods/enable-disable-elements.js");
/* harmony import */ var _instanceMethods_validation_message_js__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./instanceMethods/validation-message.js */ "./node_modules/sweetalert2/src/instanceMethods/validation-message.js");
/* harmony import */ var _instanceMethods_progress_steps_js__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./instanceMethods/progress-steps.js */ "./node_modules/sweetalert2/src/instanceMethods/progress-steps.js");
/* harmony import */ var _instanceMethods_main_js__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./instanceMethods/_main.js */ "./node_modules/sweetalert2/src/instanceMethods/_main.js");
/* harmony import */ var _instanceMethods_update_js__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ./instanceMethods/update.js */ "./node_modules/sweetalert2/src/instanceMethods/update.js");
/* harmony import */ var _instanceMethods_destroy_js__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! ./instanceMethods/_destroy.js */ "./node_modules/sweetalert2/src/instanceMethods/_destroy.js");











/***/ }),

/***/ "./node_modules/sweetalert2/src/instanceMethods/_destroy.js":
/*!******************************************************************!*\
  !*** ./node_modules/sweetalert2/src/instanceMethods/_destroy.js ***!
  \******************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "_destroy": () => (/* binding */ _destroy)
/* harmony export */ });
/* harmony import */ var _globalState_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../globalState.js */ "./node_modules/sweetalert2/src/globalState.js");
/* harmony import */ var _privateProps_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../privateProps.js */ "./node_modules/sweetalert2/src/privateProps.js");
/* harmony import */ var _privateMethods_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../privateMethods.js */ "./node_modules/sweetalert2/src/privateMethods.js");




function _destroy () {
  const domCache = _privateProps_js__WEBPACK_IMPORTED_MODULE_1__["default"].domCache.get(this)
  const innerParams = _privateProps_js__WEBPACK_IMPORTED_MODULE_1__["default"].innerParams.get(this)

  if (!innerParams) {
    disposeWeakMaps(this) // The WeakMaps might have been partly destroyed, we must recall it to dispose any remaining weakmaps #2335
    return // This instance has already been destroyed
  }

  // Check if there is another Swal closing
  if (domCache.popup && _globalState_js__WEBPACK_IMPORTED_MODULE_0__["default"].swalCloseEventFinishedCallback) {
    _globalState_js__WEBPACK_IMPORTED_MODULE_0__["default"].swalCloseEventFinishedCallback()
    delete _globalState_js__WEBPACK_IMPORTED_MODULE_0__["default"].swalCloseEventFinishedCallback
  }

  // Check if there is a swal disposal defer timer
  if (_globalState_js__WEBPACK_IMPORTED_MODULE_0__["default"].deferDisposalTimer) {
    clearTimeout(_globalState_js__WEBPACK_IMPORTED_MODULE_0__["default"].deferDisposalTimer)
    delete _globalState_js__WEBPACK_IMPORTED_MODULE_0__["default"].deferDisposalTimer
  }

  if (typeof innerParams.didDestroy === 'function') {
    innerParams.didDestroy()
  }
  disposeSwal(this)
}

const disposeSwal = (instance) => {
  disposeWeakMaps(instance)
  // Unset this.params so GC will dispose it (#1569)
  delete instance.params
  // Unset globalState props so GC will dispose globalState (#1569)
  delete _globalState_js__WEBPACK_IMPORTED_MODULE_0__["default"].keydownHandler
  delete _globalState_js__WEBPACK_IMPORTED_MODULE_0__["default"].keydownTarget
  // Unset currentInstance
  delete _globalState_js__WEBPACK_IMPORTED_MODULE_0__["default"].currentInstance
}

const disposeWeakMaps = (instance) => {
  // If the current instance is awaiting a promise result, we keep the privateMethods to call them once the promise result is retrieved #2335
  if (instance.isAwaitingPromise()) {
    unsetWeakMaps(_privateProps_js__WEBPACK_IMPORTED_MODULE_1__["default"], instance)
    _privateProps_js__WEBPACK_IMPORTED_MODULE_1__["default"].awaitingPromise.set(instance, true)
  } else {
    unsetWeakMaps(_privateMethods_js__WEBPACK_IMPORTED_MODULE_2__["default"], instance)
    unsetWeakMaps(_privateProps_js__WEBPACK_IMPORTED_MODULE_1__["default"], instance)
  }
}

const unsetWeakMaps = (obj, instance) => {
  for (const i in obj) {
    obj[i].delete(instance)
  }
}


/***/ }),

/***/ "./node_modules/sweetalert2/src/instanceMethods/_main.js":
/*!***************************************************************!*\
  !*** ./node_modules/sweetalert2/src/instanceMethods/_main.js ***!
  \***************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "_main": () => (/* binding */ _main)
/* harmony export */ });
/* harmony import */ var _utils_params_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../utils/params.js */ "./node_modules/sweetalert2/src/utils/params.js");
/* harmony import */ var _utils_dom_index_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../utils/dom/index.js */ "./node_modules/sweetalert2/src/utils/dom/index.js");
/* harmony import */ var _utils_Timer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../utils/Timer.js */ "./node_modules/sweetalert2/src/utils/Timer.js");
/* harmony import */ var _utils_utils_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../utils/utils.js */ "./node_modules/sweetalert2/src/utils/utils.js");
/* harmony import */ var _utils_setParameters_js__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ../utils/setParameters.js */ "./node_modules/sweetalert2/src/utils/setParameters.js");
/* harmony import */ var _utils_getTemplateParams_js__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ../utils/getTemplateParams.js */ "./node_modules/sweetalert2/src/utils/getTemplateParams.js");
/* harmony import */ var _globalState_js__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ../globalState.js */ "./node_modules/sweetalert2/src/globalState.js");
/* harmony import */ var _utils_openPopup_js__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ../utils/openPopup.js */ "./node_modules/sweetalert2/src/utils/openPopup.js");
/* harmony import */ var _privateProps_js__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! ../privateProps.js */ "./node_modules/sweetalert2/src/privateProps.js");
/* harmony import */ var _privateMethods_js__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! ../privateMethods.js */ "./node_modules/sweetalert2/src/privateMethods.js");
/* harmony import */ var _utils_dom_inputUtils_js__WEBPACK_IMPORTED_MODULE_10__ = __webpack_require__(/*! ../utils/dom/inputUtils.js */ "./node_modules/sweetalert2/src/utils/dom/inputUtils.js");
/* harmony import */ var _buttons_handlers_js__WEBPACK_IMPORTED_MODULE_11__ = __webpack_require__(/*! ./buttons-handlers.js */ "./node_modules/sweetalert2/src/instanceMethods/buttons-handlers.js");
/* harmony import */ var _keydown_handler_js__WEBPACK_IMPORTED_MODULE_12__ = __webpack_require__(/*! ./keydown-handler.js */ "./node_modules/sweetalert2/src/instanceMethods/keydown-handler.js");
/* harmony import */ var _popup_click_handler_js__WEBPACK_IMPORTED_MODULE_13__ = __webpack_require__(/*! ./popup-click-handler.js */ "./node_modules/sweetalert2/src/instanceMethods/popup-click-handler.js");
/* harmony import */ var _utils_DismissReason_js__WEBPACK_IMPORTED_MODULE_14__ = __webpack_require__(/*! ../utils/DismissReason.js */ "./node_modules/sweetalert2/src/utils/DismissReason.js");
/* harmony import */ var _utils_aria_js__WEBPACK_IMPORTED_MODULE_15__ = __webpack_require__(/*! ../utils/aria.js */ "./node_modules/sweetalert2/src/utils/aria.js");

















function _main (userParams, mixinParams = {}) {
  (0,_utils_params_js__WEBPACK_IMPORTED_MODULE_0__.showWarningsForParams)(Object.assign({}, mixinParams, userParams))

  if (_globalState_js__WEBPACK_IMPORTED_MODULE_6__["default"].currentInstance) {
    _globalState_js__WEBPACK_IMPORTED_MODULE_6__["default"].currentInstance._destroy()
    if (_utils_dom_index_js__WEBPACK_IMPORTED_MODULE_1__.isModal()) {
      (0,_utils_aria_js__WEBPACK_IMPORTED_MODULE_15__.unsetAriaHidden)()
    }
  }
  _globalState_js__WEBPACK_IMPORTED_MODULE_6__["default"].currentInstance = this

  const innerParams = prepareParams(userParams, mixinParams)
  ;(0,_utils_setParameters_js__WEBPACK_IMPORTED_MODULE_4__["default"])(innerParams)
  Object.freeze(innerParams)

  // clear the previous timer
  if (_globalState_js__WEBPACK_IMPORTED_MODULE_6__["default"].timeout) {
    _globalState_js__WEBPACK_IMPORTED_MODULE_6__["default"].timeout.stop()
    delete _globalState_js__WEBPACK_IMPORTED_MODULE_6__["default"].timeout
  }

  // clear the restore focus timeout
  clearTimeout(_globalState_js__WEBPACK_IMPORTED_MODULE_6__["default"].restoreFocusTimeout)

  const domCache = populateDomCache(this)

  _utils_dom_index_js__WEBPACK_IMPORTED_MODULE_1__.render(this, innerParams)

  _privateProps_js__WEBPACK_IMPORTED_MODULE_8__["default"].innerParams.set(this, innerParams)

  return swalPromise(this, domCache, innerParams)
}

const prepareParams = (userParams, mixinParams) => {
  const templateParams = (0,_utils_getTemplateParams_js__WEBPACK_IMPORTED_MODULE_5__.getTemplateParams)(userParams)
  const params = Object.assign({}, _utils_params_js__WEBPACK_IMPORTED_MODULE_0__["default"], mixinParams, templateParams, userParams) // precedence is described in #2131
  params.showClass = Object.assign({}, _utils_params_js__WEBPACK_IMPORTED_MODULE_0__["default"].showClass, params.showClass)
  params.hideClass = Object.assign({}, _utils_params_js__WEBPACK_IMPORTED_MODULE_0__["default"].hideClass, params.hideClass)
  return params
}

const swalPromise = (instance, domCache, innerParams) => {
  return new Promise((resolve, reject) => {
    // functions to handle all closings/dismissals
    const dismissWith = (dismiss) => {
      instance.closePopup({ isDismissed: true, dismiss })
    }

    _privateMethods_js__WEBPACK_IMPORTED_MODULE_9__["default"].swalPromiseResolve.set(instance, resolve)
    _privateMethods_js__WEBPACK_IMPORTED_MODULE_9__["default"].swalPromiseReject.set(instance, reject)

    domCache.confirmButton.onclick = () => (0,_buttons_handlers_js__WEBPACK_IMPORTED_MODULE_11__.handleConfirmButtonClick)(instance)
    domCache.denyButton.onclick = () => (0,_buttons_handlers_js__WEBPACK_IMPORTED_MODULE_11__.handleDenyButtonClick)(instance)
    domCache.cancelButton.onclick = () => (0,_buttons_handlers_js__WEBPACK_IMPORTED_MODULE_11__.handleCancelButtonClick)(instance, dismissWith)

    domCache.closeButton.onclick = () => dismissWith(_utils_DismissReason_js__WEBPACK_IMPORTED_MODULE_14__.DismissReason.close)

    ;(0,_popup_click_handler_js__WEBPACK_IMPORTED_MODULE_13__.handlePopupClick)(instance, domCache, dismissWith)

    ;(0,_keydown_handler_js__WEBPACK_IMPORTED_MODULE_12__.addKeydownHandler)(instance, _globalState_js__WEBPACK_IMPORTED_MODULE_6__["default"], innerParams, dismissWith)

    ;(0,_utils_dom_inputUtils_js__WEBPACK_IMPORTED_MODULE_10__.handleInputOptionsAndValue)(instance, innerParams)

    ;(0,_utils_openPopup_js__WEBPACK_IMPORTED_MODULE_7__.openPopup)(innerParams)

    setupTimer(_globalState_js__WEBPACK_IMPORTED_MODULE_6__["default"], innerParams, dismissWith)

    initFocus(domCache, innerParams)

    // Scroll container to top on open (#1247, #1946)
    setTimeout(() => {
      domCache.container.scrollTop = 0
    })
  })
}

const populateDomCache = (instance) => {
  const domCache = {
    popup: _utils_dom_index_js__WEBPACK_IMPORTED_MODULE_1__.getPopup(),
    container: _utils_dom_index_js__WEBPACK_IMPORTED_MODULE_1__.getContainer(),
    actions: _utils_dom_index_js__WEBPACK_IMPORTED_MODULE_1__.getActions(),
    confirmButton: _utils_dom_index_js__WEBPACK_IMPORTED_MODULE_1__.getConfirmButton(),
    denyButton: _utils_dom_index_js__WEBPACK_IMPORTED_MODULE_1__.getDenyButton(),
    cancelButton: _utils_dom_index_js__WEBPACK_IMPORTED_MODULE_1__.getCancelButton(),
    loader: _utils_dom_index_js__WEBPACK_IMPORTED_MODULE_1__.getLoader(),
    closeButton: _utils_dom_index_js__WEBPACK_IMPORTED_MODULE_1__.getCloseButton(),
    validationMessage: _utils_dom_index_js__WEBPACK_IMPORTED_MODULE_1__.getValidationMessage(),
    progressSteps: _utils_dom_index_js__WEBPACK_IMPORTED_MODULE_1__.getProgressSteps()
  }
  _privateProps_js__WEBPACK_IMPORTED_MODULE_8__["default"].domCache.set(instance, domCache)

  return domCache
}

const setupTimer = (globalState, innerParams, dismissWith) => {
  const timerProgressBar = _utils_dom_index_js__WEBPACK_IMPORTED_MODULE_1__.getTimerProgressBar()
  _utils_dom_index_js__WEBPACK_IMPORTED_MODULE_1__.hide(timerProgressBar)
  if (innerParams.timer) {
    globalState.timeout = new _utils_Timer_js__WEBPACK_IMPORTED_MODULE_2__["default"](() => {
      dismissWith('timer')
      delete globalState.timeout
    }, innerParams.timer)
    if (innerParams.timerProgressBar) {
      _utils_dom_index_js__WEBPACK_IMPORTED_MODULE_1__.show(timerProgressBar)
      setTimeout(() => {
        if (globalState.timeout && globalState.timeout.running) { // timer can be already stopped or unset at this point
          _utils_dom_index_js__WEBPACK_IMPORTED_MODULE_1__.animateTimerProgressBar(innerParams.timer)
        }
      })
    }
  }
}

const initFocus = (domCache, innerParams) => {
  if (innerParams.toast) {
    return
  }

  if (!(0,_utils_utils_js__WEBPACK_IMPORTED_MODULE_3__.callIfFunction)(innerParams.allowEnterKey)) {
    return blurActiveElement()
  }

  if (!focusButton(domCache, innerParams)) {
    (0,_keydown_handler_js__WEBPACK_IMPORTED_MODULE_12__.setFocus)(innerParams, -1, 1)
  }
}

const focusButton = (domCache, innerParams) => {
  if (innerParams.focusDeny && _utils_dom_index_js__WEBPACK_IMPORTED_MODULE_1__.isVisible(domCache.denyButton)) {
    domCache.denyButton.focus()
    return true
  }

  if (innerParams.focusCancel && _utils_dom_index_js__WEBPACK_IMPORTED_MODULE_1__.isVisible(domCache.cancelButton)) {
    domCache.cancelButton.focus()
    return true
  }

  if (innerParams.focusConfirm && _utils_dom_index_js__WEBPACK_IMPORTED_MODULE_1__.isVisible(domCache.confirmButton)) {
    domCache.confirmButton.focus()
    return true
  }

  return false
}

const blurActiveElement = () => {
  if (document.activeElement && typeof document.activeElement.blur === 'function') {
    document.activeElement.blur()
  }
}


/***/ }),

/***/ "./node_modules/sweetalert2/src/instanceMethods/buttons-handlers.js":
/*!**************************************************************************!*\
  !*** ./node_modules/sweetalert2/src/instanceMethods/buttons-handlers.js ***!
  \**************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "handleConfirmButtonClick": () => (/* binding */ handleConfirmButtonClick),
/* harmony export */   "handleDenyButtonClick": () => (/* binding */ handleDenyButtonClick),
/* harmony export */   "handleCancelButtonClick": () => (/* binding */ handleCancelButtonClick)
/* harmony export */ });
/* harmony import */ var _utils_dom_domUtils_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../utils/dom/domUtils.js */ "./node_modules/sweetalert2/src/utils/dom/domUtils.js");
/* harmony import */ var _utils_dom_inputUtils_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../utils/dom/inputUtils.js */ "./node_modules/sweetalert2/src/utils/dom/inputUtils.js");
/* harmony import */ var _utils_dom_getters_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../utils/dom/getters.js */ "./node_modules/sweetalert2/src/utils/dom/getters.js");
/* harmony import */ var _utils_utils_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../utils/utils.js */ "./node_modules/sweetalert2/src/utils/utils.js");
/* harmony import */ var _staticMethods_showLoading_js__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ../staticMethods/showLoading.js */ "./node_modules/sweetalert2/src/staticMethods/showLoading.js");
/* harmony import */ var _utils_DismissReason_js__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ../utils/DismissReason.js */ "./node_modules/sweetalert2/src/utils/DismissReason.js");
/* harmony import */ var _privateProps_js__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ../privateProps.js */ "./node_modules/sweetalert2/src/privateProps.js");








const handleConfirmButtonClick = (instance) => {
  const innerParams = _privateProps_js__WEBPACK_IMPORTED_MODULE_6__["default"].innerParams.get(instance)
  instance.disableButtons()
  if (innerParams.input) {
    handleConfirmOrDenyWithInput(instance, 'confirm')
  } else {
    confirm(instance, true)
  }
}

const handleDenyButtonClick = (instance) => {
  const innerParams = _privateProps_js__WEBPACK_IMPORTED_MODULE_6__["default"].innerParams.get(instance)
  instance.disableButtons()
  if (innerParams.returnInputValueOnDeny) {
    handleConfirmOrDenyWithInput(instance, 'deny')
  } else {
    deny(instance, false)
  }
}

const handleCancelButtonClick = (instance, dismissWith) => {
  instance.disableButtons()
  dismissWith(_utils_DismissReason_js__WEBPACK_IMPORTED_MODULE_5__.DismissReason.cancel)
}

const handleConfirmOrDenyWithInput = (instance, type /* 'confirm' | 'deny' */) => {
  const innerParams = _privateProps_js__WEBPACK_IMPORTED_MODULE_6__["default"].innerParams.get(instance)
  const inputValue = (0,_utils_dom_inputUtils_js__WEBPACK_IMPORTED_MODULE_1__.getInputValue)(instance, innerParams)
  if (innerParams.inputValidator) {
    handleInputValidator(instance, inputValue, type)
  } else if (!instance.getInput().checkValidity()) {
    instance.enableButtons()
    instance.showValidationMessage(innerParams.validationMessage)
  } else if (type === 'deny') {
    deny(instance, inputValue)
  } else {
    confirm(instance, inputValue)
  }
}

const handleInputValidator = (instance, inputValue, type /* 'confirm' | 'deny' */) => {
  const innerParams = _privateProps_js__WEBPACK_IMPORTED_MODULE_6__["default"].innerParams.get(instance)
  instance.disableInput()
  const validationPromise = Promise.resolve().then(() => (0,_utils_utils_js__WEBPACK_IMPORTED_MODULE_3__.asPromise)(
    innerParams.inputValidator(inputValue, innerParams.validationMessage))
  )
  validationPromise.then(
    (validationMessage) => {
      instance.enableButtons()
      instance.enableInput()
      if (validationMessage) {
        instance.showValidationMessage(validationMessage)
      } else if (type === 'deny') {
        deny(instance, inputValue)
      } else {
        confirm(instance, inputValue)
      }
    }
  )
}

const deny = (instance, value) => {
  const innerParams = _privateProps_js__WEBPACK_IMPORTED_MODULE_6__["default"].innerParams.get(instance || undefined)

  if (innerParams.showLoaderOnDeny) {
    (0,_staticMethods_showLoading_js__WEBPACK_IMPORTED_MODULE_4__.showLoading)((0,_utils_dom_getters_js__WEBPACK_IMPORTED_MODULE_2__.getDenyButton)())
  }

  if (innerParams.preDeny) {
    _privateProps_js__WEBPACK_IMPORTED_MODULE_6__["default"].awaitingPromise.set(instance || undefined, true) // Flagging the instance as awaiting a promise so it's own promise's reject/resolve methods doesnt get destroyed until the result from this preDeny's promise is received
    const preDenyPromise = Promise.resolve().then(() => (0,_utils_utils_js__WEBPACK_IMPORTED_MODULE_3__.asPromise)(
      innerParams.preDeny(value, innerParams.validationMessage))
    )
    preDenyPromise.then(
      (preDenyValue) => {
        if (preDenyValue === false) {
          instance.hideLoading()
        } else {
          instance.closePopup({ isDenied: true, value: typeof preDenyValue === 'undefined' ? value : preDenyValue })
        }
      }
    ).catch((error) => rejectWith(instance || undefined, error))
  } else {
    instance.closePopup({ isDenied: true, value })
  }
}

const succeedWith = (instance, value) => {
  instance.closePopup({ isConfirmed: true, value })
}

const rejectWith = (instance, error) => {
  instance.rejectPromise(error)
}

const confirm = (instance, value) => {
  const innerParams = _privateProps_js__WEBPACK_IMPORTED_MODULE_6__["default"].innerParams.get(instance || undefined)

  if (innerParams.showLoaderOnConfirm) {
    (0,_staticMethods_showLoading_js__WEBPACK_IMPORTED_MODULE_4__.showLoading)()
  }

  if (innerParams.preConfirm) {
    instance.resetValidationMessage()
    _privateProps_js__WEBPACK_IMPORTED_MODULE_6__["default"].awaitingPromise.set(instance || undefined, true) // Flagging the instance as awaiting a promise so it's own promise's reject/resolve methods doesnt get destroyed until the result from this preConfirm's promise is received
    const preConfirmPromise = Promise.resolve().then(() => (0,_utils_utils_js__WEBPACK_IMPORTED_MODULE_3__.asPromise)(
      innerParams.preConfirm(value, innerParams.validationMessage))
    )
    preConfirmPromise.then(
      (preConfirmValue) => {
        if ((0,_utils_dom_domUtils_js__WEBPACK_IMPORTED_MODULE_0__.isVisible)((0,_utils_dom_getters_js__WEBPACK_IMPORTED_MODULE_2__.getValidationMessage)()) || preConfirmValue === false) {
          instance.hideLoading()
        } else {
          succeedWith(instance, typeof preConfirmValue === 'undefined' ? value : preConfirmValue)
        }
      }
    ).catch((error) => rejectWith(instance || undefined, error))
  } else {
    succeedWith(instance, value)
  }
}


/***/ }),

/***/ "./node_modules/sweetalert2/src/instanceMethods/close.js":
/*!***************************************************************!*\
  !*** ./node_modules/sweetalert2/src/instanceMethods/close.js ***!
  \***************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "close": () => (/* binding */ close),
/* harmony export */   "isAwaitingPromise": () => (/* binding */ isAwaitingPromise),
/* harmony export */   "rejectPromise": () => (/* binding */ rejectPromise),
/* harmony export */   "closePopup": () => (/* binding */ close),
/* harmony export */   "closeModal": () => (/* binding */ close),
/* harmony export */   "closeToast": () => (/* binding */ close)
/* harmony export */ });
/* harmony import */ var _utils_scrollbarFix_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../utils/scrollbarFix.js */ "./node_modules/sweetalert2/src/utils/scrollbarFix.js");
/* harmony import */ var _utils_iosFix_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../utils/iosFix.js */ "./node_modules/sweetalert2/src/utils/iosFix.js");
/* harmony import */ var _utils_aria_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../utils/aria.js */ "./node_modules/sweetalert2/src/utils/aria.js");
/* harmony import */ var _utils_dom_index_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../utils/dom/index.js */ "./node_modules/sweetalert2/src/utils/dom/index.js");
/* harmony import */ var _utils_classes_js__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ../utils/classes.js */ "./node_modules/sweetalert2/src/utils/classes.js");
/* harmony import */ var _globalState_js__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ../globalState.js */ "./node_modules/sweetalert2/src/globalState.js");
/* harmony import */ var _privateProps_js__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ../privateProps.js */ "./node_modules/sweetalert2/src/privateProps.js");
/* harmony import */ var _privateMethods_js__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ../privateMethods.js */ "./node_modules/sweetalert2/src/privateMethods.js");









/*
 * Instance method to close sweetAlert
 */

function removePopupAndResetState (instance, container, returnFocus, didClose) {
  if (_utils_dom_index_js__WEBPACK_IMPORTED_MODULE_3__.isToast()) {
    triggerDidCloseAndDispose(instance, didClose)
  } else {
    (0,_globalState_js__WEBPACK_IMPORTED_MODULE_5__.restoreActiveElement)(returnFocus).then(() => triggerDidCloseAndDispose(instance, didClose))
    _globalState_js__WEBPACK_IMPORTED_MODULE_5__["default"].keydownTarget.removeEventListener('keydown', _globalState_js__WEBPACK_IMPORTED_MODULE_5__["default"].keydownHandler, { capture: _globalState_js__WEBPACK_IMPORTED_MODULE_5__["default"].keydownListenerCapture })
    _globalState_js__WEBPACK_IMPORTED_MODULE_5__["default"].keydownHandlerAdded = false
  }

  const isSafari = /^((?!chrome|android).)*safari/i.test(navigator.userAgent)
  // workaround for #2088
  // for some reason removing the container in Safari will scroll the document to bottom
  if (isSafari) {
    container.setAttribute('style', 'display:none !important')
    container.removeAttribute('class')
    container.innerHTML = ''
  } else {
    container.remove()
  }

  if (_utils_dom_index_js__WEBPACK_IMPORTED_MODULE_3__.isModal()) {
    (0,_utils_scrollbarFix_js__WEBPACK_IMPORTED_MODULE_0__.undoScrollbar)()
    ;(0,_utils_iosFix_js__WEBPACK_IMPORTED_MODULE_1__.undoIOSfix)()
    ;(0,_utils_aria_js__WEBPACK_IMPORTED_MODULE_2__.unsetAriaHidden)()
  }

  removeBodyClasses()
}

function removeBodyClasses () {
  _utils_dom_index_js__WEBPACK_IMPORTED_MODULE_3__.removeClass(
    [document.documentElement, document.body],
    [
      _utils_classes_js__WEBPACK_IMPORTED_MODULE_4__.swalClasses.shown,
      _utils_classes_js__WEBPACK_IMPORTED_MODULE_4__.swalClasses["height-auto"],
      _utils_classes_js__WEBPACK_IMPORTED_MODULE_4__.swalClasses["no-backdrop"],
      _utils_classes_js__WEBPACK_IMPORTED_MODULE_4__.swalClasses["toast-shown"],
    ]
  )
}

function close (resolveValue) {
  resolveValue = prepareResolveValue(resolveValue)

  const swalPromiseResolve = _privateMethods_js__WEBPACK_IMPORTED_MODULE_7__["default"].swalPromiseResolve.get(this)

  const didClose = triggerClosePopup(this)

  if (this.isAwaitingPromise()) {
    // A swal awaiting for a promise (after a click on Confirm or Deny) cannot be dismissed anymore #2335
    if (!resolveValue.isDismissed) {
      handleAwaitingPromise(this)
      swalPromiseResolve(resolveValue)
    }
  } else if (didClose) {
    // Resolve Swal promise
    swalPromiseResolve(resolveValue)
  }
}

function isAwaitingPromise () {
  return !!_privateProps_js__WEBPACK_IMPORTED_MODULE_6__["default"].awaitingPromise.get(this)
}

const triggerClosePopup = (instance) => {
  const popup = _utils_dom_index_js__WEBPACK_IMPORTED_MODULE_3__.getPopup()

  if (!popup) {
    return false
  }

  const innerParams = _privateProps_js__WEBPACK_IMPORTED_MODULE_6__["default"].innerParams.get(instance)
  if (!innerParams || _utils_dom_index_js__WEBPACK_IMPORTED_MODULE_3__.hasClass(popup, innerParams.hideClass.popup)) {
    return false
  }

  _utils_dom_index_js__WEBPACK_IMPORTED_MODULE_3__.removeClass(popup, innerParams.showClass.popup)
  _utils_dom_index_js__WEBPACK_IMPORTED_MODULE_3__.addClass(popup, innerParams.hideClass.popup)

  const backdrop = _utils_dom_index_js__WEBPACK_IMPORTED_MODULE_3__.getContainer()
  _utils_dom_index_js__WEBPACK_IMPORTED_MODULE_3__.removeClass(backdrop, innerParams.showClass.backdrop)
  _utils_dom_index_js__WEBPACK_IMPORTED_MODULE_3__.addClass(backdrop, innerParams.hideClass.backdrop)

  handlePopupAnimation(instance, popup, innerParams)

  return true
}

function rejectPromise (error) {
  const rejectPromise = _privateMethods_js__WEBPACK_IMPORTED_MODULE_7__["default"].swalPromiseReject.get(this)
  handleAwaitingPromise(this)
  if (rejectPromise) {
    // Reject Swal promise
    rejectPromise(error)
  }
}

const handleAwaitingPromise = (instance) => {
  if (instance.isAwaitingPromise()) {
    _privateProps_js__WEBPACK_IMPORTED_MODULE_6__["default"].awaitingPromise["delete"](instance)
    // The instance might have been previously partly destroyed, we must resume the destroy process in this case #2335
    if (!_privateProps_js__WEBPACK_IMPORTED_MODULE_6__["default"].innerParams.get(instance)) {
      instance._destroy()
    }
  }
}

const prepareResolveValue = (resolveValue) => {
  // When user calls Swal.close()
  if (typeof resolveValue === 'undefined') {
    return {
      isConfirmed: false,
      isDenied: false,
      isDismissed: true,
    }
  }

  return Object.assign({
    isConfirmed: false,
    isDenied: false,
    isDismissed: false,
  }, resolveValue)
}

const handlePopupAnimation = (instance, popup, innerParams) => {
  const container = _utils_dom_index_js__WEBPACK_IMPORTED_MODULE_3__.getContainer()
  // If animation is supported, animate
  const animationIsSupported = _utils_dom_index_js__WEBPACK_IMPORTED_MODULE_3__.animationEndEvent && _utils_dom_index_js__WEBPACK_IMPORTED_MODULE_3__.hasCssAnimation(popup)

  if (typeof innerParams.willClose === 'function') {
    innerParams.willClose(popup)
  }

  if (animationIsSupported) {
    animatePopup(instance, popup, container, innerParams.returnFocus, innerParams.didClose)
  } else {
    // Otherwise, remove immediately
    removePopupAndResetState(instance, container, innerParams.returnFocus, innerParams.didClose)
  }
}

const animatePopup = (instance, popup, container, returnFocus, didClose) => {
  _globalState_js__WEBPACK_IMPORTED_MODULE_5__["default"].swalCloseEventFinishedCallback = removePopupAndResetState.bind(null, instance, container, returnFocus, didClose)
  popup.addEventListener(_utils_dom_index_js__WEBPACK_IMPORTED_MODULE_3__.animationEndEvent, function (e) {
    if (e.target === popup) {
      _globalState_js__WEBPACK_IMPORTED_MODULE_5__["default"].swalCloseEventFinishedCallback()
      delete _globalState_js__WEBPACK_IMPORTED_MODULE_5__["default"].swalCloseEventFinishedCallback
    }
  })
}

const triggerDidCloseAndDispose = (instance, didClose) => {
  setTimeout(() => {
    if (typeof didClose === 'function') {
      didClose.bind(instance.params)()
    }
    instance._destroy()
  })
}




/***/ }),

/***/ "./node_modules/sweetalert2/src/instanceMethods/enable-disable-elements.js":
/*!*********************************************************************************!*\
  !*** ./node_modules/sweetalert2/src/instanceMethods/enable-disable-elements.js ***!
  \*********************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "enableButtons": () => (/* binding */ enableButtons),
/* harmony export */   "disableButtons": () => (/* binding */ disableButtons),
/* harmony export */   "enableInput": () => (/* binding */ enableInput),
/* harmony export */   "disableInput": () => (/* binding */ disableInput)
/* harmony export */ });
/* harmony import */ var _privateProps_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../privateProps.js */ "./node_modules/sweetalert2/src/privateProps.js");


function setButtonsDisabled (instance, buttons, disabled) {
  const domCache = _privateProps_js__WEBPACK_IMPORTED_MODULE_0__["default"].domCache.get(instance)
  buttons.forEach(button => {
    domCache[button].disabled = disabled
  })
}

function setInputDisabled (input, disabled) {
  if (!input) {
    return false
  }
  if (input.type === 'radio') {
    const radiosContainer = input.parentNode.parentNode
    const radios = radiosContainer.querySelectorAll('input')
    for (let i = 0; i < radios.length; i++) {
      radios[i].disabled = disabled
    }
  } else {
    input.disabled = disabled
  }
}

function enableButtons () {
  setButtonsDisabled(this, ['confirmButton', 'denyButton', 'cancelButton'], false)
}

function disableButtons () {
  setButtonsDisabled(this, ['confirmButton', 'denyButton', 'cancelButton'], true)
}

function enableInput () {
  return setInputDisabled(this.getInput(), false)
}

function disableInput () {
  return setInputDisabled(this.getInput(), true)
}


/***/ }),

/***/ "./node_modules/sweetalert2/src/instanceMethods/getInput.js":
/*!******************************************************************!*\
  !*** ./node_modules/sweetalert2/src/instanceMethods/getInput.js ***!
  \******************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "getInput": () => (/* binding */ getInput)
/* harmony export */ });
/* harmony import */ var _utils_dom_index_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../utils/dom/index.js */ "./node_modules/sweetalert2/src/utils/dom/index.js");
/* harmony import */ var _privateProps_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../privateProps.js */ "./node_modules/sweetalert2/src/privateProps.js");



// Get input element by specified type or, if type isn't specified, by params.input
function getInput (instance) {
  const innerParams = _privateProps_js__WEBPACK_IMPORTED_MODULE_1__["default"].innerParams.get(instance || this)
  const domCache = _privateProps_js__WEBPACK_IMPORTED_MODULE_1__["default"].domCache.get(instance || this)
  if (!domCache) {
    return null
  }
  return _utils_dom_index_js__WEBPACK_IMPORTED_MODULE_0__.getInput(domCache.popup, innerParams.input)
}


/***/ }),

/***/ "./node_modules/sweetalert2/src/instanceMethods/hideLoading.js":
/*!*********************************************************************!*\
  !*** ./node_modules/sweetalert2/src/instanceMethods/hideLoading.js ***!
  \*********************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "hideLoading": () => (/* binding */ hideLoading),
/* harmony export */   "disableLoading": () => (/* binding */ hideLoading)
/* harmony export */ });
/* harmony import */ var _utils_dom_index_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../utils/dom/index.js */ "./node_modules/sweetalert2/src/utils/dom/index.js");
/* harmony import */ var _utils_classes_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../utils/classes.js */ "./node_modules/sweetalert2/src/utils/classes.js");
/* harmony import */ var _privateProps_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../privateProps.js */ "./node_modules/sweetalert2/src/privateProps.js");




/**
 * Hides loader and shows back the button which was hidden by .showLoading()
 */
function hideLoading () {
  // do nothing if popup is closed
  const innerParams = _privateProps_js__WEBPACK_IMPORTED_MODULE_2__["default"].innerParams.get(this)
  if (!innerParams) {
    return
  }
  const domCache = _privateProps_js__WEBPACK_IMPORTED_MODULE_2__["default"].domCache.get(this)
  _utils_dom_index_js__WEBPACK_IMPORTED_MODULE_0__.hide(domCache.loader)
  if (_utils_dom_index_js__WEBPACK_IMPORTED_MODULE_0__.isToast()) {
    if (innerParams.icon) {
      _utils_dom_index_js__WEBPACK_IMPORTED_MODULE_0__.show(_utils_dom_index_js__WEBPACK_IMPORTED_MODULE_0__.getIcon())
    }
  } else {
    showRelatedButton(domCache)
  }
  _utils_dom_index_js__WEBPACK_IMPORTED_MODULE_0__.removeClass([domCache.popup, domCache.actions], _utils_classes_js__WEBPACK_IMPORTED_MODULE_1__.swalClasses.loading)
  domCache.popup.removeAttribute('aria-busy')
  domCache.popup.removeAttribute('data-loading')
  domCache.confirmButton.disabled = false
  domCache.denyButton.disabled = false
  domCache.cancelButton.disabled = false
}

const showRelatedButton = (domCache) => {
  const buttonToReplace = domCache.popup.getElementsByClassName(domCache.loader.getAttribute('data-button-to-replace'))
  if (buttonToReplace.length) {
    _utils_dom_index_js__WEBPACK_IMPORTED_MODULE_0__.show(buttonToReplace[0], 'inline-block')
  } else if (_utils_dom_index_js__WEBPACK_IMPORTED_MODULE_0__.allButtonsAreHidden()) {
    _utils_dom_index_js__WEBPACK_IMPORTED_MODULE_0__.hide(domCache.actions)
  }
}




/***/ }),

/***/ "./node_modules/sweetalert2/src/instanceMethods/keydown-handler.js":
/*!*************************************************************************!*\
  !*** ./node_modules/sweetalert2/src/instanceMethods/keydown-handler.js ***!
  \*************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "addKeydownHandler": () => (/* binding */ addKeydownHandler),
/* harmony export */   "setFocus": () => (/* binding */ setFocus)
/* harmony export */ });
/* harmony import */ var _utils_dom_index_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../utils/dom/index.js */ "./node_modules/sweetalert2/src/utils/dom/index.js");
/* harmony import */ var _utils_DismissReason_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../utils/DismissReason.js */ "./node_modules/sweetalert2/src/utils/DismissReason.js");
/* harmony import */ var _utils_utils_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../utils/utils.js */ "./node_modules/sweetalert2/src/utils/utils.js");
/* harmony import */ var _staticMethods_dom_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../staticMethods/dom.js */ "./node_modules/sweetalert2/src/staticMethods/dom.js");
/* harmony import */ var _privateProps_js__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ../privateProps.js */ "./node_modules/sweetalert2/src/privateProps.js");






const addKeydownHandler = (instance, globalState, innerParams, dismissWith) => {
  if (globalState.keydownTarget && globalState.keydownHandlerAdded) {
    globalState.keydownTarget.removeEventListener('keydown', globalState.keydownHandler, { capture: globalState.keydownListenerCapture })
    globalState.keydownHandlerAdded = false
  }

  if (!innerParams.toast) {
    globalState.keydownHandler = (e) => keydownHandler(instance, e, dismissWith)
    globalState.keydownTarget = innerParams.keydownListenerCapture ? window : _utils_dom_index_js__WEBPACK_IMPORTED_MODULE_0__.getPopup()
    globalState.keydownListenerCapture = innerParams.keydownListenerCapture
    globalState.keydownTarget.addEventListener('keydown', globalState.keydownHandler, { capture: globalState.keydownListenerCapture })
    globalState.keydownHandlerAdded = true
  }
}

// Focus handling
const setFocus = (innerParams, index, increment) => {
  const focusableElements = _utils_dom_index_js__WEBPACK_IMPORTED_MODULE_0__.getFocusableElements()
  // search for visible elements and select the next possible match
  if (focusableElements.length) {
    index = index + increment

    // rollover to first item
    if (index === focusableElements.length) {
      index = 0

      // go to last item
    } else if (index === -1) {
      index = focusableElements.length - 1
    }

    return focusableElements[index].focus()
  }
  // no visible focusable elements, focus the popup
  _utils_dom_index_js__WEBPACK_IMPORTED_MODULE_0__.getPopup().focus()
}

const arrowKeysNextButton = [
  'ArrowRight', 'ArrowDown',
]

const arrowKeysPreviousButton = [
  'ArrowLeft', 'ArrowUp',
]

const keydownHandler = (instance, e, dismissWith) => {
  const innerParams = _privateProps_js__WEBPACK_IMPORTED_MODULE_4__["default"].innerParams.get(instance)

  if (!innerParams) {
    return // This instance has already been destroyed
  }

  if (innerParams.stopKeydownPropagation) {
    e.stopPropagation()
  }

  // ENTER
  if (e.key === 'Enter') {
    handleEnter(instance, e, innerParams)

  // TAB
  } else if (e.key === 'Tab') {
    handleTab(e, innerParams)

  // ARROWS - switch focus between buttons
  } else if ([...arrowKeysNextButton, ...arrowKeysPreviousButton].includes(e.key)) {
    handleArrows(e.key)

  // ESC
  } else if (e.key === 'Escape') {
    handleEsc(e, innerParams, dismissWith)
  }
}

const handleEnter = (instance, e, innerParams) => {
  // #720 #721
  if (e.isComposing) {
    return
  }

  if (e.target && instance.getInput() && e.target.outerHTML === instance.getInput().outerHTML) {
    if (['textarea', 'file'].includes(innerParams.input)) {
      return // do not submit
    }

    (0,_staticMethods_dom_js__WEBPACK_IMPORTED_MODULE_3__.clickConfirm)()
    e.preventDefault()
  }
}

const handleTab = (e, innerParams) => {
  const targetElement = e.target

  const focusableElements = _utils_dom_index_js__WEBPACK_IMPORTED_MODULE_0__.getFocusableElements()
  let btnIndex = -1
  for (let i = 0; i < focusableElements.length; i++) {
    if (targetElement === focusableElements[i]) {
      btnIndex = i
      break
    }
  }

  if (!e.shiftKey) {
    // Cycle to the next button
    setFocus(innerParams, btnIndex, 1)
  } else {
    // Cycle to the prev button
    setFocus(innerParams, btnIndex, -1)
  }
  e.stopPropagation()
  e.preventDefault()
}

const handleArrows = (key) => {
  const confirmButton = _utils_dom_index_js__WEBPACK_IMPORTED_MODULE_0__.getConfirmButton()
  const denyButton = _utils_dom_index_js__WEBPACK_IMPORTED_MODULE_0__.getDenyButton()
  const cancelButton = _utils_dom_index_js__WEBPACK_IMPORTED_MODULE_0__.getCancelButton()
  if (![confirmButton, denyButton, cancelButton].includes(document.activeElement)) {
    return
  }
  const sibling = arrowKeysNextButton.includes(key) ? 'nextElementSibling' : 'previousElementSibling'
  const buttonToFocus = document.activeElement[sibling]
  if (buttonToFocus) {
    buttonToFocus.focus()
  }
}

const handleEsc = (e, innerParams, dismissWith) => {
  if ((0,_utils_utils_js__WEBPACK_IMPORTED_MODULE_2__.callIfFunction)(innerParams.allowEscapeKey)) {
    e.preventDefault()
    dismissWith(_utils_DismissReason_js__WEBPACK_IMPORTED_MODULE_1__.DismissReason.esc)
  }
}


/***/ }),

/***/ "./node_modules/sweetalert2/src/instanceMethods/popup-click-handler.js":
/*!*****************************************************************************!*\
  !*** ./node_modules/sweetalert2/src/instanceMethods/popup-click-handler.js ***!
  \*****************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "handlePopupClick": () => (/* binding */ handlePopupClick)
/* harmony export */ });
/* harmony import */ var _utils_utils_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../utils/utils.js */ "./node_modules/sweetalert2/src/utils/utils.js");
/* harmony import */ var _utils_DismissReason_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../utils/DismissReason.js */ "./node_modules/sweetalert2/src/utils/DismissReason.js");
/* harmony import */ var _privateProps_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../privateProps.js */ "./node_modules/sweetalert2/src/privateProps.js");




const handlePopupClick = (instance, domCache, dismissWith) => {
  const innerParams = _privateProps_js__WEBPACK_IMPORTED_MODULE_2__["default"].innerParams.get(instance)
  if (innerParams.toast) {
    handleToastClick(instance, domCache, dismissWith)
  } else {
    // Ignore click events that had mousedown on the popup but mouseup on the container
    // This can happen when the user drags a slider
    handleModalMousedown(domCache)

    // Ignore click events that had mousedown on the container but mouseup on the popup
    handleContainerMousedown(domCache)

    handleModalClick(instance, domCache, dismissWith)
  }
}

const handleToastClick = (instance, domCache, dismissWith) => {
  // Closing toast by internal click
  domCache.popup.onclick = () => {
    const innerParams = _privateProps_js__WEBPACK_IMPORTED_MODULE_2__["default"].innerParams.get(instance)
    if (
      innerParams.showConfirmButton ||
      innerParams.showDenyButton ||
      innerParams.showCancelButton ||
      innerParams.showCloseButton ||
      innerParams.timer ||
      innerParams.input
    ) {
      return
    }
    dismissWith(_utils_DismissReason_js__WEBPACK_IMPORTED_MODULE_1__.DismissReason.close)
  }
}

let ignoreOutsideClick = false

const handleModalMousedown = (domCache) => {
  domCache.popup.onmousedown = () => {
    domCache.container.onmouseup = function (e) {
      domCache.container.onmouseup = undefined
      // We only check if the mouseup target is the container because usually it doesn't
      // have any other direct children aside of the popup
      if (e.target === domCache.container) {
        ignoreOutsideClick = true
      }
    }
  }
}

const handleContainerMousedown = (domCache) => {
  domCache.container.onmousedown = () => {
    domCache.popup.onmouseup = function (e) {
      domCache.popup.onmouseup = undefined
      // We also need to check if the mouseup target is a child of the popup
      if (e.target === domCache.popup || domCache.popup.contains(e.target)) {
        ignoreOutsideClick = true
      }
    }
  }
}

const handleModalClick = (instance, domCache, dismissWith) => {
  domCache.container.onclick = (e) => {
    const innerParams = _privateProps_js__WEBPACK_IMPORTED_MODULE_2__["default"].innerParams.get(instance)
    if (ignoreOutsideClick) {
      ignoreOutsideClick = false
      return
    }
    if (e.target === domCache.container && (0,_utils_utils_js__WEBPACK_IMPORTED_MODULE_0__.callIfFunction)(innerParams.allowOutsideClick)) {
      dismissWith(_utils_DismissReason_js__WEBPACK_IMPORTED_MODULE_1__.DismissReason.backdrop)
    }
  }
}


/***/ }),

/***/ "./node_modules/sweetalert2/src/instanceMethods/progress-steps.js":
/*!************************************************************************!*\
  !*** ./node_modules/sweetalert2/src/instanceMethods/progress-steps.js ***!
  \************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "getProgressSteps": () => (/* binding */ getProgressSteps)
/* harmony export */ });
/* harmony import */ var _privateProps_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../privateProps.js */ "./node_modules/sweetalert2/src/privateProps.js");


function getProgressSteps () {
  const domCache = _privateProps_js__WEBPACK_IMPORTED_MODULE_0__["default"].domCache.get(this)
  return domCache.progressSteps
}


/***/ }),

/***/ "./node_modules/sweetalert2/src/instanceMethods/update.js":
/*!****************************************************************!*\
  !*** ./node_modules/sweetalert2/src/instanceMethods/update.js ***!
  \****************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "update": () => (/* binding */ update)
/* harmony export */ });
/* harmony import */ var _src_utils_dom_index_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../src/utils/dom/index.js */ "./node_modules/sweetalert2/src/utils/dom/index.js");
/* harmony import */ var _src_utils_utils_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../src/utils/utils.js */ "./node_modules/sweetalert2/src/utils/utils.js");
/* harmony import */ var _sweetalert2_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../sweetalert2.js */ "./node_modules/sweetalert2/src/sweetalert2.js");
/* harmony import */ var _privateProps_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../privateProps.js */ "./node_modules/sweetalert2/src/privateProps.js");





/**
 * Updates popup parameters.
 */
function update (params) {
  const popup = _src_utils_dom_index_js__WEBPACK_IMPORTED_MODULE_0__.getPopup()
  const innerParams = _privateProps_js__WEBPACK_IMPORTED_MODULE_3__["default"].innerParams.get(this)

  if (!popup || _src_utils_dom_index_js__WEBPACK_IMPORTED_MODULE_0__.hasClass(popup, innerParams.hideClass.popup)) {
    return (0,_src_utils_utils_js__WEBPACK_IMPORTED_MODULE_1__.warn)(`You're trying to update the closed or closing popup, that won't work. Use the update() method in preConfirm parameter or show a new popup.`)
  }

  const validUpdatableParams = {}

  // assign valid params from `params` to `defaults`
  Object.keys(params).forEach(param => {
    if (_sweetalert2_js__WEBPACK_IMPORTED_MODULE_2__["default"].isUpdatableParameter(param)) {
      validUpdatableParams[param] = params[param]
    } else {
      (0,_src_utils_utils_js__WEBPACK_IMPORTED_MODULE_1__.warn)(`Invalid parameter to update: "${param}". Updatable params are listed here: https://github.com/sweetalert2/sweetalert2/blob/master/src/utils/params.js\n\nIf you think this parameter should be updatable, request it here: https://github.com/sweetalert2/sweetalert2/issues/new?template=02_feature_request.md`)
    }
  })

  const updatedParams = Object.assign({}, innerParams, validUpdatableParams)

  _src_utils_dom_index_js__WEBPACK_IMPORTED_MODULE_0__.render(this, updatedParams)

  _privateProps_js__WEBPACK_IMPORTED_MODULE_3__["default"].innerParams.set(this, updatedParams)
  Object.defineProperties(this, {
    params: {
      value: Object.assign({}, this.params, params),
      writable: false,
      enumerable: true
    }
  })
}


/***/ }),

/***/ "./node_modules/sweetalert2/src/instanceMethods/validation-message.js":
/*!****************************************************************************!*\
  !*** ./node_modules/sweetalert2/src/instanceMethods/validation-message.js ***!
  \****************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "showValidationMessage": () => (/* binding */ showValidationMessage),
/* harmony export */   "resetValidationMessage": () => (/* binding */ resetValidationMessage)
/* harmony export */ });
/* harmony import */ var _utils_dom_index_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../utils/dom/index.js */ "./node_modules/sweetalert2/src/utils/dom/index.js");
/* harmony import */ var _utils_classes_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../utils/classes.js */ "./node_modules/sweetalert2/src/utils/classes.js");
/* harmony import */ var _privateProps_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../privateProps.js */ "./node_modules/sweetalert2/src/privateProps.js");




// Show block with validation message
function showValidationMessage (error) {
  const domCache = _privateProps_js__WEBPACK_IMPORTED_MODULE_2__["default"].domCache.get(this)
  const params = _privateProps_js__WEBPACK_IMPORTED_MODULE_2__["default"].innerParams.get(this)
  _utils_dom_index_js__WEBPACK_IMPORTED_MODULE_0__.setInnerHtml(domCache.validationMessage, error)
  domCache.validationMessage.className = _utils_classes_js__WEBPACK_IMPORTED_MODULE_1__.swalClasses["validation-message"]
  if (params.customClass && params.customClass.validationMessage) {
    _utils_dom_index_js__WEBPACK_IMPORTED_MODULE_0__.addClass(domCache.validationMessage, params.customClass.validationMessage)
  }
  _utils_dom_index_js__WEBPACK_IMPORTED_MODULE_0__.show(domCache.validationMessage)

  const input = this.getInput()
  if (input) {
    input.setAttribute('aria-invalid', true)
    input.setAttribute('aria-describedby', _utils_classes_js__WEBPACK_IMPORTED_MODULE_1__.swalClasses["validation-message"])
    _utils_dom_index_js__WEBPACK_IMPORTED_MODULE_0__.focusInput(input)
    _utils_dom_index_js__WEBPACK_IMPORTED_MODULE_0__.addClass(input, _utils_classes_js__WEBPACK_IMPORTED_MODULE_1__.swalClasses.inputerror)
  }
}

// Hide block with validation message
function resetValidationMessage () {
  const domCache = _privateProps_js__WEBPACK_IMPORTED_MODULE_2__["default"].domCache.get(this)
  if (domCache.validationMessage) {
    _utils_dom_index_js__WEBPACK_IMPORTED_MODULE_0__.hide(domCache.validationMessage)
  }

  const input = this.getInput()
  if (input) {
    input.removeAttribute('aria-invalid')
    input.removeAttribute('aria-describedby')
    _utils_dom_index_js__WEBPACK_IMPORTED_MODULE_0__.removeClass(input, _utils_classes_js__WEBPACK_IMPORTED_MODULE_1__.swalClasses.inputerror)
  }
}


/***/ }),

/***/ "./node_modules/sweetalert2/src/privateMethods.js":
/*!********************************************************!*\
  !*** ./node_modules/sweetalert2/src/privateMethods.js ***!
  \********************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/**
 * This module contains `WeakMap`s for each effectively-"private  property" that a `Swal` has.
 * For example, to set the private property "foo" of `this` to "bar", you can `privateProps.foo.set(this, 'bar')`
 * This is the approach that Babel will probably take to implement private methods/fields
 *   https://github.com/tc39/proposal-private-methods
 *   https://github.com/babel/babel/pull/7555
 * Once we have the changes from that PR in Babel, and our core class fits reasonable in *one module*
 *   then we can use that language feature.
 */

/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  swalPromiseResolve: new WeakMap(),
  swalPromiseReject: new WeakMap()
});


/***/ }),

/***/ "./node_modules/sweetalert2/src/privateProps.js":
/*!******************************************************!*\
  !*** ./node_modules/sweetalert2/src/privateProps.js ***!
  \******************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/**
 * This module contains `WeakMap`s for each effectively-"private  property" that a `Swal` has.
 * For example, to set the private property "foo" of `this` to "bar", you can `privateProps.foo.set(this, 'bar')`
 * This is the approach that Babel will probably take to implement private methods/fields
 *   https://github.com/tc39/proposal-private-methods
 *   https://github.com/babel/babel/pull/7555
 * Once we have the changes from that PR in Babel, and our core class fits reasonable in *one module*
 *   then we can use that language feature.
 */

/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  awaitingPromise: new WeakMap(),
  promise: new WeakMap(),
  innerParams: new WeakMap(),
  domCache: new WeakMap()
});


/***/ }),

/***/ "./node_modules/sweetalert2/src/staticMethods.js":
/*!*******************************************************!*\
  !*** ./node_modules/sweetalert2/src/staticMethods.js ***!
  \*******************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "argsToParams": () => (/* reexport safe */ _staticMethods_argsToParams_js__WEBPACK_IMPORTED_MODULE_0__.argsToParams),
/* harmony export */   "clickCancel": () => (/* reexport safe */ _staticMethods_dom_js__WEBPACK_IMPORTED_MODULE_1__.clickCancel),
/* harmony export */   "clickConfirm": () => (/* reexport safe */ _staticMethods_dom_js__WEBPACK_IMPORTED_MODULE_1__.clickConfirm),
/* harmony export */   "clickDeny": () => (/* reexport safe */ _staticMethods_dom_js__WEBPACK_IMPORTED_MODULE_1__.clickDeny),
/* harmony export */   "getActions": () => (/* reexport safe */ _staticMethods_dom_js__WEBPACK_IMPORTED_MODULE_1__.getActions),
/* harmony export */   "getCancelButton": () => (/* reexport safe */ _staticMethods_dom_js__WEBPACK_IMPORTED_MODULE_1__.getCancelButton),
/* harmony export */   "getCloseButton": () => (/* reexport safe */ _staticMethods_dom_js__WEBPACK_IMPORTED_MODULE_1__.getCloseButton),
/* harmony export */   "getConfirmButton": () => (/* reexport safe */ _staticMethods_dom_js__WEBPACK_IMPORTED_MODULE_1__.getConfirmButton),
/* harmony export */   "getContainer": () => (/* reexport safe */ _staticMethods_dom_js__WEBPACK_IMPORTED_MODULE_1__.getContainer),
/* harmony export */   "getDenyButton": () => (/* reexport safe */ _staticMethods_dom_js__WEBPACK_IMPORTED_MODULE_1__.getDenyButton),
/* harmony export */   "getFocusableElements": () => (/* reexport safe */ _staticMethods_dom_js__WEBPACK_IMPORTED_MODULE_1__.getFocusableElements),
/* harmony export */   "getFooter": () => (/* reexport safe */ _staticMethods_dom_js__WEBPACK_IMPORTED_MODULE_1__.getFooter),
/* harmony export */   "getHtmlContainer": () => (/* reexport safe */ _staticMethods_dom_js__WEBPACK_IMPORTED_MODULE_1__.getHtmlContainer),
/* harmony export */   "getIcon": () => (/* reexport safe */ _staticMethods_dom_js__WEBPACK_IMPORTED_MODULE_1__.getIcon),
/* harmony export */   "getImage": () => (/* reexport safe */ _staticMethods_dom_js__WEBPACK_IMPORTED_MODULE_1__.getImage),
/* harmony export */   "getInputLabel": () => (/* reexport safe */ _staticMethods_dom_js__WEBPACK_IMPORTED_MODULE_1__.getInputLabel),
/* harmony export */   "getLoader": () => (/* reexport safe */ _staticMethods_dom_js__WEBPACK_IMPORTED_MODULE_1__.getLoader),
/* harmony export */   "getPopup": () => (/* reexport safe */ _staticMethods_dom_js__WEBPACK_IMPORTED_MODULE_1__.getPopup),
/* harmony export */   "getTimerProgressBar": () => (/* reexport safe */ _staticMethods_dom_js__WEBPACK_IMPORTED_MODULE_1__.getTimerProgressBar),
/* harmony export */   "getTitle": () => (/* reexport safe */ _staticMethods_dom_js__WEBPACK_IMPORTED_MODULE_1__.getTitle),
/* harmony export */   "getValidationMessage": () => (/* reexport safe */ _staticMethods_dom_js__WEBPACK_IMPORTED_MODULE_1__.getValidationMessage),
/* harmony export */   "isLoading": () => (/* reexport safe */ _staticMethods_dom_js__WEBPACK_IMPORTED_MODULE_1__.isLoading),
/* harmony export */   "isVisible": () => (/* reexport safe */ _staticMethods_dom_js__WEBPACK_IMPORTED_MODULE_1__.isVisible),
/* harmony export */   "fire": () => (/* reexport safe */ _staticMethods_fire_js__WEBPACK_IMPORTED_MODULE_2__.fire),
/* harmony export */   "mixin": () => (/* reexport safe */ _staticMethods_mixin_js__WEBPACK_IMPORTED_MODULE_3__.mixin),
/* harmony export */   "enableLoading": () => (/* reexport safe */ _staticMethods_showLoading_js__WEBPACK_IMPORTED_MODULE_4__.enableLoading),
/* harmony export */   "showLoading": () => (/* reexport safe */ _staticMethods_showLoading_js__WEBPACK_IMPORTED_MODULE_4__.showLoading),
/* harmony export */   "getTimerLeft": () => (/* reexport safe */ _staticMethods_timer_js__WEBPACK_IMPORTED_MODULE_5__.getTimerLeft),
/* harmony export */   "increaseTimer": () => (/* reexport safe */ _staticMethods_timer_js__WEBPACK_IMPORTED_MODULE_5__.increaseTimer),
/* harmony export */   "isTimerRunning": () => (/* reexport safe */ _staticMethods_timer_js__WEBPACK_IMPORTED_MODULE_5__.isTimerRunning),
/* harmony export */   "resumeTimer": () => (/* reexport safe */ _staticMethods_timer_js__WEBPACK_IMPORTED_MODULE_5__.resumeTimer),
/* harmony export */   "stopTimer": () => (/* reexport safe */ _staticMethods_timer_js__WEBPACK_IMPORTED_MODULE_5__.stopTimer),
/* harmony export */   "toggleTimer": () => (/* reexport safe */ _staticMethods_timer_js__WEBPACK_IMPORTED_MODULE_5__.toggleTimer),
/* harmony export */   "bindClickHandler": () => (/* reexport safe */ _staticMethods_bindClickHandler_js__WEBPACK_IMPORTED_MODULE_6__.bindClickHandler),
/* harmony export */   "isValidParameter": () => (/* reexport safe */ _utils_params_js__WEBPACK_IMPORTED_MODULE_7__.isValidParameter),
/* harmony export */   "isUpdatableParameter": () => (/* reexport safe */ _utils_params_js__WEBPACK_IMPORTED_MODULE_7__.isUpdatableParameter),
/* harmony export */   "isDeprecatedParameter": () => (/* reexport safe */ _utils_params_js__WEBPACK_IMPORTED_MODULE_7__.isDeprecatedParameter)
/* harmony export */ });
/* harmony import */ var _staticMethods_argsToParams_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./staticMethods/argsToParams.js */ "./node_modules/sweetalert2/src/staticMethods/argsToParams.js");
/* harmony import */ var _staticMethods_dom_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./staticMethods/dom.js */ "./node_modules/sweetalert2/src/staticMethods/dom.js");
/* harmony import */ var _staticMethods_fire_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./staticMethods/fire.js */ "./node_modules/sweetalert2/src/staticMethods/fire.js");
/* harmony import */ var _staticMethods_mixin_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./staticMethods/mixin.js */ "./node_modules/sweetalert2/src/staticMethods/mixin.js");
/* harmony import */ var _staticMethods_showLoading_js__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./staticMethods/showLoading.js */ "./node_modules/sweetalert2/src/staticMethods/showLoading.js");
/* harmony import */ var _staticMethods_timer_js__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./staticMethods/timer.js */ "./node_modules/sweetalert2/src/staticMethods/timer.js");
/* harmony import */ var _staticMethods_bindClickHandler_js__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./staticMethods/bindClickHandler.js */ "./node_modules/sweetalert2/src/staticMethods/bindClickHandler.js");
/* harmony import */ var _utils_params_js__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ./utils/params.js */ "./node_modules/sweetalert2/src/utils/params.js");










/***/ }),

/***/ "./node_modules/sweetalert2/src/staticMethods/argsToParams.js":
/*!********************************************************************!*\
  !*** ./node_modules/sweetalert2/src/staticMethods/argsToParams.js ***!
  \********************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "argsToParams": () => (/* binding */ argsToParams)
/* harmony export */ });
/* harmony import */ var _utils_utils_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../utils/utils.js */ "./node_modules/sweetalert2/src/utils/utils.js");


const isJqueryElement = (elem) => typeof elem === 'object' && elem.jquery
const isElement = (elem) => elem instanceof Element || isJqueryElement(elem)

const argsToParams = (args) => {
  const params = {}
  if (typeof args[0] === 'object' && !isElement(args[0])) {
    Object.assign(params, args[0])
  } else {
    ['title', 'html', 'icon'].forEach((name, index) => {
      const arg = args[index]
      if (typeof arg === 'string' || isElement(arg)) {
        params[name] = arg
      } else if (arg !== undefined) {
        (0,_utils_utils_js__WEBPACK_IMPORTED_MODULE_0__.error)(`Unexpected type of ${name}! Expected "string" or "Element", got ${typeof arg}`)
      }
    })
  }
  return params
}


/***/ }),

/***/ "./node_modules/sweetalert2/src/staticMethods/bindClickHandler.js":
/*!************************************************************************!*\
  !*** ./node_modules/sweetalert2/src/staticMethods/bindClickHandler.js ***!
  \************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "bindClickHandler": () => (/* binding */ bindClickHandler)
/* harmony export */ });
let bodyClickListenerAdded = false
const clickHandlers = {}

function bindClickHandler (attr = 'data-swal-template') {
  clickHandlers[attr] = this

  if (!bodyClickListenerAdded) {
    document.body.addEventListener('click', bodyClickListener)
    bodyClickListenerAdded = true
  }
}

const bodyClickListener = (event) => {
  for (let el = event.target; el && el !== document; el = el.parentNode) {
    for (const attr in clickHandlers) {
      const template = el.getAttribute(attr)
      if (template) {
        clickHandlers[attr].fire({ template })
        return
      }
    }
  }
}


/***/ }),

/***/ "./node_modules/sweetalert2/src/staticMethods/dom.js":
/*!***********************************************************!*\
  !*** ./node_modules/sweetalert2/src/staticMethods/dom.js ***!
  \***********************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "getContainer": () => (/* reexport safe */ _utils_dom_index_js__WEBPACK_IMPORTED_MODULE_0__.getContainer),
/* harmony export */   "getPopup": () => (/* reexport safe */ _utils_dom_index_js__WEBPACK_IMPORTED_MODULE_0__.getPopup),
/* harmony export */   "getTitle": () => (/* reexport safe */ _utils_dom_index_js__WEBPACK_IMPORTED_MODULE_0__.getTitle),
/* harmony export */   "getHtmlContainer": () => (/* reexport safe */ _utils_dom_index_js__WEBPACK_IMPORTED_MODULE_0__.getHtmlContainer),
/* harmony export */   "getImage": () => (/* reexport safe */ _utils_dom_index_js__WEBPACK_IMPORTED_MODULE_0__.getImage),
/* harmony export */   "getIcon": () => (/* reexport safe */ _utils_dom_index_js__WEBPACK_IMPORTED_MODULE_0__.getIcon),
/* harmony export */   "getInputLabel": () => (/* reexport safe */ _utils_dom_index_js__WEBPACK_IMPORTED_MODULE_0__.getInputLabel),
/* harmony export */   "getCloseButton": () => (/* reexport safe */ _utils_dom_index_js__WEBPACK_IMPORTED_MODULE_0__.getCloseButton),
/* harmony export */   "getActions": () => (/* reexport safe */ _utils_dom_index_js__WEBPACK_IMPORTED_MODULE_0__.getActions),
/* harmony export */   "getConfirmButton": () => (/* reexport safe */ _utils_dom_index_js__WEBPACK_IMPORTED_MODULE_0__.getConfirmButton),
/* harmony export */   "getDenyButton": () => (/* reexport safe */ _utils_dom_index_js__WEBPACK_IMPORTED_MODULE_0__.getDenyButton),
/* harmony export */   "getCancelButton": () => (/* reexport safe */ _utils_dom_index_js__WEBPACK_IMPORTED_MODULE_0__.getCancelButton),
/* harmony export */   "getLoader": () => (/* reexport safe */ _utils_dom_index_js__WEBPACK_IMPORTED_MODULE_0__.getLoader),
/* harmony export */   "getFooter": () => (/* reexport safe */ _utils_dom_index_js__WEBPACK_IMPORTED_MODULE_0__.getFooter),
/* harmony export */   "getTimerProgressBar": () => (/* reexport safe */ _utils_dom_index_js__WEBPACK_IMPORTED_MODULE_0__.getTimerProgressBar),
/* harmony export */   "getFocusableElements": () => (/* reexport safe */ _utils_dom_index_js__WEBPACK_IMPORTED_MODULE_0__.getFocusableElements),
/* harmony export */   "getValidationMessage": () => (/* reexport safe */ _utils_dom_index_js__WEBPACK_IMPORTED_MODULE_0__.getValidationMessage),
/* harmony export */   "isLoading": () => (/* reexport safe */ _utils_dom_index_js__WEBPACK_IMPORTED_MODULE_0__.isLoading),
/* harmony export */   "isVisible": () => (/* binding */ isVisible),
/* harmony export */   "clickConfirm": () => (/* binding */ clickConfirm),
/* harmony export */   "clickDeny": () => (/* binding */ clickDeny),
/* harmony export */   "clickCancel": () => (/* binding */ clickCancel)
/* harmony export */ });
/* harmony import */ var _utils_dom_index_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../utils/dom/index.js */ "./node_modules/sweetalert2/src/utils/dom/index.js");
/* harmony import */ var _utils_dom_domUtils_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../utils/dom/domUtils.js */ "./node_modules/sweetalert2/src/utils/dom/domUtils.js");





/*
 * Global function to determine if SweetAlert2 popup is shown
 */
const isVisible = () => {
  return _utils_dom_domUtils_js__WEBPACK_IMPORTED_MODULE_1__.isVisible(_utils_dom_index_js__WEBPACK_IMPORTED_MODULE_0__.getPopup())
}

/*
 * Global function to click 'Confirm' button
 */
const clickConfirm = () => _utils_dom_index_js__WEBPACK_IMPORTED_MODULE_0__.getConfirmButton() && _utils_dom_index_js__WEBPACK_IMPORTED_MODULE_0__.getConfirmButton().click()

/*
 * Global function to click 'Deny' button
 */
const clickDeny = () => _utils_dom_index_js__WEBPACK_IMPORTED_MODULE_0__.getDenyButton() && _utils_dom_index_js__WEBPACK_IMPORTED_MODULE_0__.getDenyButton().click()

/*
 * Global function to click 'Cancel' button
 */
const clickCancel = () => _utils_dom_index_js__WEBPACK_IMPORTED_MODULE_0__.getCancelButton() && _utils_dom_index_js__WEBPACK_IMPORTED_MODULE_0__.getCancelButton().click()


/***/ }),

/***/ "./node_modules/sweetalert2/src/staticMethods/fire.js":
/*!************************************************************!*\
  !*** ./node_modules/sweetalert2/src/staticMethods/fire.js ***!
  \************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "fire": () => (/* binding */ fire)
/* harmony export */ });
function fire (...args) {
  const Swal = this
  return new Swal(...args)
}


/***/ }),

/***/ "./node_modules/sweetalert2/src/staticMethods/mixin.js":
/*!*************************************************************!*\
  !*** ./node_modules/sweetalert2/src/staticMethods/mixin.js ***!
  \*************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "mixin": () => (/* binding */ mixin)
/* harmony export */ });
/**
 * Returns an extended version of `Swal` containing `params` as defaults.
 * Useful for reusing Swal configuration.
 *
 * For example:
 *
 * Before:
 * const textPromptOptions = { input: 'text', showCancelButton: true }
 * const {value: firstName} = await Swal.fire({ ...textPromptOptions, title: 'What is your first name?' })
 * const {value: lastName} = await Swal.fire({ ...textPromptOptions, title: 'What is your last name?' })
 *
 * After:
 * const TextPrompt = Swal.mixin({ input: 'text', showCancelButton: true })
 * const {value: firstName} = await TextPrompt('What is your first name?')
 * const {value: lastName} = await TextPrompt('What is your last name?')
 *
 * @param mixinParams
 */
function mixin (mixinParams) {
  class MixinSwal extends this {
    _main (params, priorityMixinParams) {
      return super._main(params, Object.assign({}, mixinParams, priorityMixinParams))
    }
  }

  return MixinSwal
}


/***/ }),

/***/ "./node_modules/sweetalert2/src/staticMethods/showLoading.js":
/*!*******************************************************************!*\
  !*** ./node_modules/sweetalert2/src/staticMethods/showLoading.js ***!
  \*******************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "showLoading": () => (/* binding */ showLoading),
/* harmony export */   "enableLoading": () => (/* binding */ showLoading)
/* harmony export */ });
/* harmony import */ var _utils_dom_index_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../utils/dom/index.js */ "./node_modules/sweetalert2/src/utils/dom/index.js");
/* harmony import */ var _sweetalert2_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../sweetalert2.js */ "./node_modules/sweetalert2/src/sweetalert2.js");
/* harmony import */ var _utils_classes_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../utils/classes.js */ "./node_modules/sweetalert2/src/utils/classes.js");




/**
 * Shows loader (spinner), this is useful with AJAX requests.
 * By default the loader be shown instead of the "Confirm" button.
 */
const showLoading = (buttonToReplace) => {
  let popup = _utils_dom_index_js__WEBPACK_IMPORTED_MODULE_0__.getPopup()
  if (!popup) {
    _sweetalert2_js__WEBPACK_IMPORTED_MODULE_1__["default"].fire()
  }
  popup = _utils_dom_index_js__WEBPACK_IMPORTED_MODULE_0__.getPopup()
  const loader = _utils_dom_index_js__WEBPACK_IMPORTED_MODULE_0__.getLoader()

  if (_utils_dom_index_js__WEBPACK_IMPORTED_MODULE_0__.isToast()) {
    _utils_dom_index_js__WEBPACK_IMPORTED_MODULE_0__.hide(_utils_dom_index_js__WEBPACK_IMPORTED_MODULE_0__.getIcon())
  } else {
    replaceButton(popup, buttonToReplace)
  }
  _utils_dom_index_js__WEBPACK_IMPORTED_MODULE_0__.show(loader)

  popup.setAttribute('data-loading', true)
  popup.setAttribute('aria-busy', true)
  popup.focus()
}

const replaceButton = (popup, buttonToReplace) => {
  const actions = _utils_dom_index_js__WEBPACK_IMPORTED_MODULE_0__.getActions()
  const loader = _utils_dom_index_js__WEBPACK_IMPORTED_MODULE_0__.getLoader()

  if (!buttonToReplace && _utils_dom_index_js__WEBPACK_IMPORTED_MODULE_0__.isVisible(_utils_dom_index_js__WEBPACK_IMPORTED_MODULE_0__.getConfirmButton())) {
    buttonToReplace = _utils_dom_index_js__WEBPACK_IMPORTED_MODULE_0__.getConfirmButton()
  }

  _utils_dom_index_js__WEBPACK_IMPORTED_MODULE_0__.show(actions)
  if (buttonToReplace) {
    _utils_dom_index_js__WEBPACK_IMPORTED_MODULE_0__.hide(buttonToReplace)
    loader.setAttribute('data-button-to-replace', buttonToReplace.className)
  }
  loader.parentNode.insertBefore(loader, buttonToReplace)
  _utils_dom_index_js__WEBPACK_IMPORTED_MODULE_0__.addClass([popup, actions], _utils_classes_js__WEBPACK_IMPORTED_MODULE_2__.swalClasses.loading)
}




/***/ }),

/***/ "./node_modules/sweetalert2/src/staticMethods/timer.js":
/*!*************************************************************!*\
  !*** ./node_modules/sweetalert2/src/staticMethods/timer.js ***!
  \*************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "getTimerLeft": () => (/* binding */ getTimerLeft),
/* harmony export */   "stopTimer": () => (/* binding */ stopTimer),
/* harmony export */   "resumeTimer": () => (/* binding */ resumeTimer),
/* harmony export */   "toggleTimer": () => (/* binding */ toggleTimer),
/* harmony export */   "increaseTimer": () => (/* binding */ increaseTimer),
/* harmony export */   "isTimerRunning": () => (/* binding */ isTimerRunning)
/* harmony export */ });
/* harmony import */ var _utils_dom_domUtils_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../utils/dom/domUtils.js */ "./node_modules/sweetalert2/src/utils/dom/domUtils.js");
/* harmony import */ var _globalState_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../globalState.js */ "./node_modules/sweetalert2/src/globalState.js");



/**
 * If `timer` parameter is set, returns number of milliseconds of timer remained.
 * Otherwise, returns undefined.
 */
const getTimerLeft = () => {
  return _globalState_js__WEBPACK_IMPORTED_MODULE_1__["default"].timeout && _globalState_js__WEBPACK_IMPORTED_MODULE_1__["default"].timeout.getTimerLeft()
}

/**
 * Stop timer. Returns number of milliseconds of timer remained.
 * If `timer` parameter isn't set, returns undefined.
 */
const stopTimer = () => {
  if (_globalState_js__WEBPACK_IMPORTED_MODULE_1__["default"].timeout) {
    (0,_utils_dom_domUtils_js__WEBPACK_IMPORTED_MODULE_0__.stopTimerProgressBar)()
    return _globalState_js__WEBPACK_IMPORTED_MODULE_1__["default"].timeout.stop()
  }
}

/**
 * Resume timer. Returns number of milliseconds of timer remained.
 * If `timer` parameter isn't set, returns undefined.
 */
const resumeTimer = () => {
  if (_globalState_js__WEBPACK_IMPORTED_MODULE_1__["default"].timeout) {
    const remaining = _globalState_js__WEBPACK_IMPORTED_MODULE_1__["default"].timeout.start()
    ;(0,_utils_dom_domUtils_js__WEBPACK_IMPORTED_MODULE_0__.animateTimerProgressBar)(remaining)
    return remaining
  }
}

/**
 * Resume timer. Returns number of milliseconds of timer remained.
 * If `timer` parameter isn't set, returns undefined.
 */
const toggleTimer = () => {
  const timer = _globalState_js__WEBPACK_IMPORTED_MODULE_1__["default"].timeout
  return timer && (timer.running ? stopTimer() : resumeTimer())
}

/**
 * Increase timer. Returns number of milliseconds of an updated timer.
 * If `timer` parameter isn't set, returns undefined.
 */
const increaseTimer = (n) => {
  if (_globalState_js__WEBPACK_IMPORTED_MODULE_1__["default"].timeout) {
    const remaining = _globalState_js__WEBPACK_IMPORTED_MODULE_1__["default"].timeout.increase(n)
    ;(0,_utils_dom_domUtils_js__WEBPACK_IMPORTED_MODULE_0__.animateTimerProgressBar)(remaining, true)
    return remaining
  }
}

/**
 * Check if timer is running. Returns true if timer is running
 * or false if timer is paused or stopped.
 * If `timer` parameter isn't set, returns undefined
 */
const isTimerRunning = () => {
  return _globalState_js__WEBPACK_IMPORTED_MODULE_1__["default"].timeout && _globalState_js__WEBPACK_IMPORTED_MODULE_1__["default"].timeout.isRunning()
}


/***/ }),

/***/ "./node_modules/sweetalert2/src/sweetalert2.js":
/*!*****************************************************!*\
  !*** ./node_modules/sweetalert2/src/sweetalert2.js ***!
  \*****************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _SweetAlert_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./SweetAlert.js */ "./node_modules/sweetalert2/src/SweetAlert.js");


const Swal = _SweetAlert_js__WEBPACK_IMPORTED_MODULE_0__["default"]
Swal.default = Swal

/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (Swal);


/***/ }),

/***/ "./node_modules/sweetalert2/src/utils/DismissReason.js":
/*!*************************************************************!*\
  !*** ./node_modules/sweetalert2/src/utils/DismissReason.js ***!
  \*************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "DismissReason": () => (/* binding */ DismissReason)
/* harmony export */ });
const DismissReason = Object.freeze({
  cancel: 'cancel',
  backdrop: 'backdrop',
  close: 'close',
  esc: 'esc',
  timer: 'timer'
})


/***/ }),

/***/ "./node_modules/sweetalert2/src/utils/Timer.js":
/*!*****************************************************!*\
  !*** ./node_modules/sweetalert2/src/utils/Timer.js ***!
  \*****************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ Timer)
/* harmony export */ });
class Timer {
  constructor (callback, delay) {
    this.callback = callback
    this.remaining = delay
    this.running = false

    this.start()
  }

  start () {
    if (!this.running) {
      this.running = true
      this.started = new Date()
      this.id = setTimeout(this.callback, this.remaining)
    }
    return this.remaining
  }

  stop () {
    if (this.running) {
      this.running = false
      clearTimeout(this.id)
      this.remaining -= new Date() - this.started
    }
    return this.remaining
  }

  increase (n) {
    const running = this.running
    if (running) {
      this.stop()
    }
    this.remaining += n
    if (running) {
      this.start()
    }
    return this.remaining
  }

  getTimerLeft () {
    if (this.running) {
      this.stop()
      this.start()
    }
    return this.remaining
  }

  isRunning () {
    return this.running
  }
}


/***/ }),

/***/ "./node_modules/sweetalert2/src/utils/aria.js":
/*!****************************************************!*\
  !*** ./node_modules/sweetalert2/src/utils/aria.js ***!
  \****************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "setAriaHidden": () => (/* binding */ setAriaHidden),
/* harmony export */   "unsetAriaHidden": () => (/* binding */ unsetAriaHidden)
/* harmony export */ });
/* harmony import */ var _dom_getters_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./dom/getters.js */ "./node_modules/sweetalert2/src/utils/dom/getters.js");
/* harmony import */ var _utils_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./utils.js */ "./node_modules/sweetalert2/src/utils/utils.js");



// From https://developer.paciellogroup.com/blog/2018/06/the-current-state-of-modal-dialog-accessibility/
// Adding aria-hidden="true" to elements outside of the active modal dialog ensures that
// elements not within the active modal dialog will not be surfaced if a user opens a screen
// reader’s list of elements (headings, form controls, landmarks, etc.) in the document.

const setAriaHidden = () => {
  const bodyChildren = (0,_utils_js__WEBPACK_IMPORTED_MODULE_1__.toArray)(document.body.children)
  bodyChildren.forEach(el => {
    if (el === (0,_dom_getters_js__WEBPACK_IMPORTED_MODULE_0__.getContainer)() || el.contains((0,_dom_getters_js__WEBPACK_IMPORTED_MODULE_0__.getContainer)())) {
      return
    }

    if (el.hasAttribute('aria-hidden')) {
      el.setAttribute('data-previous-aria-hidden', el.getAttribute('aria-hidden'))
    }
    el.setAttribute('aria-hidden', 'true')
  })
}

const unsetAriaHidden = () => {
  const bodyChildren = (0,_utils_js__WEBPACK_IMPORTED_MODULE_1__.toArray)(document.body.children)
  bodyChildren.forEach(el => {
    if (el.hasAttribute('data-previous-aria-hidden')) {
      el.setAttribute('aria-hidden', el.getAttribute('data-previous-aria-hidden'))
      el.removeAttribute('data-previous-aria-hidden')
    } else {
      el.removeAttribute('aria-hidden')
    }
  })
}


/***/ }),

/***/ "./node_modules/sweetalert2/src/utils/classes.js":
/*!*******************************************************!*\
  !*** ./node_modules/sweetalert2/src/utils/classes.js ***!
  \*******************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "swalPrefix": () => (/* binding */ swalPrefix),
/* harmony export */   "prefix": () => (/* binding */ prefix),
/* harmony export */   "swalClasses": () => (/* binding */ swalClasses),
/* harmony export */   "iconTypes": () => (/* binding */ iconTypes)
/* harmony export */ });
const swalPrefix = 'swal2-'

const prefix = (items) => {
  const result = {}
  for (const i in items) {
    result[items[i]] = swalPrefix + items[i]
  }
  return result
}

const swalClasses = prefix([
  'container',
  'shown',
  'height-auto',
  'iosfix',
  'popup',
  'modal',
  'no-backdrop',
  'no-transition',
  'toast',
  'toast-shown',
  'show',
  'hide',
  'close',
  'title',
  'html-container',
  'actions',
  'confirm',
  'deny',
  'cancel',
  'default-outline',
  'footer',
  'icon',
  'icon-content',
  'image',
  'input',
  'file',
  'range',
  'select',
  'radio',
  'checkbox',
  'label',
  'textarea',
  'inputerror',
  'input-label',
  'validation-message',
  'progress-steps',
  'active-progress-step',
  'progress-step',
  'progress-step-line',
  'loader',
  'loading',
  'styled',
  'top',
  'top-start',
  'top-end',
  'top-left',
  'top-right',
  'center',
  'center-start',
  'center-end',
  'center-left',
  'center-right',
  'bottom',
  'bottom-start',
  'bottom-end',
  'bottom-left',
  'bottom-right',
  'grow-row',
  'grow-column',
  'grow-fullscreen',
  'rtl',
  'timer-progress-bar',
  'timer-progress-bar-container',
  'scrollbar-measure',
  'icon-success',
  'icon-warning',
  'icon-info',
  'icon-question',
  'icon-error',
])

const iconTypes = prefix([
  'success',
  'warning',
  'info',
  'question',
  'error'
])


/***/ }),

/***/ "./node_modules/sweetalert2/src/utils/defaultInputValidators.js":
/*!**********************************************************************!*\
  !*** ./node_modules/sweetalert2/src/utils/defaultInputValidators.js ***!
  \**********************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  email: (string, validationMessage) => {
    return /^[a-zA-Z0-9.+_-]+@[a-zA-Z0-9.-]+\.[a-zA-Z0-9-]{2,24}$/.test(string)
      ? Promise.resolve()
      : Promise.resolve(validationMessage || 'Invalid email address')
  },
  url: (string, validationMessage) => {
    // taken from https://stackoverflow.com/a/3809435 with a small change from #1306 and #2013
    return /^https?:\/\/(www\.)?[-a-zA-Z0-9@:%._+~#=]{1,256}\.[a-z]{2,63}\b([-a-zA-Z0-9@:%_+.~#?&/=]*)$/.test(string)
      ? Promise.resolve()
      : Promise.resolve(validationMessage || 'Invalid URL')
  }
});


/***/ }),

/***/ "./node_modules/sweetalert2/src/utils/dom/animationEndEvent.js":
/*!*********************************************************************!*\
  !*** ./node_modules/sweetalert2/src/utils/dom/animationEndEvent.js ***!
  \*********************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "animationEndEvent": () => (/* binding */ animationEndEvent)
/* harmony export */ });
/* harmony import */ var _isNodeEnv_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../isNodeEnv.js */ "./node_modules/sweetalert2/src/utils/isNodeEnv.js");


const animationEndEvent = (() => {
  // Prevent run in Node env
  /* istanbul ignore if */
  if ((0,_isNodeEnv_js__WEBPACK_IMPORTED_MODULE_0__.isNodeEnv)()) {
    return false
  }

  const testEl = document.createElement('div')
  const transEndEventNames = {
    WebkitAnimation: 'webkitAnimationEnd',
    OAnimation: 'oAnimationEnd oanimationend',
    animation: 'animationend'
  }
  for (const i in transEndEventNames) {
    if (Object.prototype.hasOwnProperty.call(transEndEventNames, i) && typeof testEl.style[i] !== 'undefined') {
      return transEndEventNames[i]
    }
  }

  return false
})()


/***/ }),

/***/ "./node_modules/sweetalert2/src/utils/dom/domUtils.js":
/*!************************************************************!*\
  !*** ./node_modules/sweetalert2/src/utils/dom/domUtils.js ***!
  \************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "states": () => (/* binding */ states),
/* harmony export */   "setInnerHtml": () => (/* binding */ setInnerHtml),
/* harmony export */   "hasClass": () => (/* binding */ hasClass),
/* harmony export */   "applyCustomClass": () => (/* binding */ applyCustomClass),
/* harmony export */   "getInput": () => (/* binding */ getInput),
/* harmony export */   "focusInput": () => (/* binding */ focusInput),
/* harmony export */   "toggleClass": () => (/* binding */ toggleClass),
/* harmony export */   "addClass": () => (/* binding */ addClass),
/* harmony export */   "removeClass": () => (/* binding */ removeClass),
/* harmony export */   "getChildByClass": () => (/* binding */ getChildByClass),
/* harmony export */   "applyNumericalStyle": () => (/* binding */ applyNumericalStyle),
/* harmony export */   "show": () => (/* binding */ show),
/* harmony export */   "hide": () => (/* binding */ hide),
/* harmony export */   "setStyle": () => (/* binding */ setStyle),
/* harmony export */   "toggle": () => (/* binding */ toggle),
/* harmony export */   "isVisible": () => (/* binding */ isVisible),
/* harmony export */   "allButtonsAreHidden": () => (/* binding */ allButtonsAreHidden),
/* harmony export */   "isScrollable": () => (/* binding */ isScrollable),
/* harmony export */   "hasCssAnimation": () => (/* binding */ hasCssAnimation),
/* harmony export */   "animateTimerProgressBar": () => (/* binding */ animateTimerProgressBar),
/* harmony export */   "stopTimerProgressBar": () => (/* binding */ stopTimerProgressBar)
/* harmony export */ });
/* harmony import */ var _getters_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./getters.js */ "./node_modules/sweetalert2/src/utils/dom/getters.js");
/* harmony import */ var _classes_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../classes.js */ "./node_modules/sweetalert2/src/utils/classes.js");
/* harmony import */ var _utils_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../utils.js */ "./node_modules/sweetalert2/src/utils/utils.js");




// Remember state in cases where opening and handling a modal will fiddle with it.
const states = {
  previousBodyPadding: null
}

const setInnerHtml = (elem, html) => { // #1926
  elem.textContent = ''
  if (html) {
    const parser = new DOMParser()
    const parsed = parser.parseFromString(html, `text/html`)
    ;(0,_utils_js__WEBPACK_IMPORTED_MODULE_2__.toArray)(parsed.querySelector('head').childNodes).forEach((child) => {
      elem.appendChild(child)
    })
    ;(0,_utils_js__WEBPACK_IMPORTED_MODULE_2__.toArray)(parsed.querySelector('body').childNodes).forEach((child) => {
      elem.appendChild(child)
    })
  }
}

const hasClass = (elem, className) => {
  if (!className) {
    return false
  }
  const classList = className.split(/\s+/)
  for (let i = 0; i < classList.length; i++) {
    if (!elem.classList.contains(classList[i])) {
      return false
    }
  }
  return true
}

const removeCustomClasses = (elem, params) => {
  ;(0,_utils_js__WEBPACK_IMPORTED_MODULE_2__.toArray)(elem.classList).forEach(className => {
    if (
      !Object.values(_classes_js__WEBPACK_IMPORTED_MODULE_1__.swalClasses).includes(className) &&
      !Object.values(_classes_js__WEBPACK_IMPORTED_MODULE_1__.iconTypes).includes(className) &&
      !Object.values(params.showClass).includes(className)
    ) {
      elem.classList.remove(className)
    }
  })
}

const applyCustomClass = (elem, params, className) => {
  removeCustomClasses(elem, params)

  if (params.customClass && params.customClass[className]) {
    if (typeof params.customClass[className] !== 'string' && !params.customClass[className].forEach) {
      return (0,_utils_js__WEBPACK_IMPORTED_MODULE_2__.warn)(`Invalid type of customClass.${className}! Expected string or iterable object, got "${typeof params.customClass[className]}"`)
    }

    addClass(elem, params.customClass[className])
  }
}

const getInput = (popup, inputType) => {
  if (!inputType) {
    return null
  }
  switch (inputType) {
    case 'select':
    case 'textarea':
    case 'file':
      return getChildByClass(popup, _classes_js__WEBPACK_IMPORTED_MODULE_1__.swalClasses[inputType])
    case 'checkbox':
      return popup.querySelector(`.${_classes_js__WEBPACK_IMPORTED_MODULE_1__.swalClasses.checkbox} input`)
    case 'radio':
      return popup.querySelector(`.${_classes_js__WEBPACK_IMPORTED_MODULE_1__.swalClasses.radio} input:checked`) ||
        popup.querySelector(`.${_classes_js__WEBPACK_IMPORTED_MODULE_1__.swalClasses.radio} input:first-child`)
    case 'range':
      return popup.querySelector(`.${_classes_js__WEBPACK_IMPORTED_MODULE_1__.swalClasses.range} input`)
    default:
      return getChildByClass(popup, _classes_js__WEBPACK_IMPORTED_MODULE_1__.swalClasses.input)
  }
}

const focusInput = (input) => {
  input.focus()

  // place cursor at end of text in text input
  if (input.type !== 'file') {
    // http://stackoverflow.com/a/2345915
    const val = input.value
    input.value = ''
    input.value = val
  }
}

const toggleClass = (target, classList, condition) => {
  if (!target || !classList) {
    return
  }
  if (typeof classList === 'string') {
    classList = classList.split(/\s+/).filter(Boolean)
  }
  classList.forEach((className) => {
    if (target.forEach) {
      target.forEach((elem) => {
        condition ? elem.classList.add(className) : elem.classList.remove(className)
      })
    } else {
      condition ? target.classList.add(className) : target.classList.remove(className)
    }
  })
}

const addClass = (target, classList) => {
  toggleClass(target, classList, true)
}

const removeClass = (target, classList) => {
  toggleClass(target, classList, false)
}

const getChildByClass = (elem, className) => {
  for (let i = 0; i < elem.childNodes.length; i++) {
    if (hasClass(elem.childNodes[i], className)) {
      return elem.childNodes[i]
    }
  }
}

const applyNumericalStyle = (elem, property, value) => {
  if (value === `${parseInt(value)}`) {
    value = parseInt(value)
  }
  if (value || parseInt(value) === 0) {
    elem.style[property] = (typeof value === 'number') ? `${value}px` : value
  } else {
    elem.style.removeProperty(property)
  }
}

const show = (elem, display = 'flex') => {
  elem.style.display = display
}

const hide = (elem) => {
  elem.style.display = 'none'
}

const setStyle = (parent, selector, property, value) => {
  const el = parent.querySelector(selector)
  if (el) {
    el.style[property] = value
  }
}

const toggle = (elem, condition, display) => {
  condition ? show(elem, display) : hide(elem)
}

// borrowed from jquery $(elem).is(':visible') implementation
const isVisible = (elem) => !!(elem && (elem.offsetWidth || elem.offsetHeight || elem.getClientRects().length))

const allButtonsAreHidden = () => !isVisible((0,_getters_js__WEBPACK_IMPORTED_MODULE_0__.getConfirmButton)()) && !isVisible((0,_getters_js__WEBPACK_IMPORTED_MODULE_0__.getDenyButton)()) && !isVisible((0,_getters_js__WEBPACK_IMPORTED_MODULE_0__.getCancelButton)())

const isScrollable = (elem) => !!(elem.scrollHeight > elem.clientHeight)

// borrowed from https://stackoverflow.com/a/46352119
const hasCssAnimation = (elem) => {
  const style = window.getComputedStyle(elem)

  const animDuration = parseFloat(style.getPropertyValue('animation-duration') || '0')
  const transDuration = parseFloat(style.getPropertyValue('transition-duration') || '0')

  return animDuration > 0 || transDuration > 0
}

const animateTimerProgressBar = (timer, reset = false) => {
  const timerProgressBar = (0,_getters_js__WEBPACK_IMPORTED_MODULE_0__.getTimerProgressBar)()
  if (isVisible(timerProgressBar)) {
    if (reset) {
      timerProgressBar.style.transition = 'none'
      timerProgressBar.style.width = '100%'
    }
    setTimeout(() => {
      timerProgressBar.style.transition = `width ${timer / 1000}s linear`
      timerProgressBar.style.width = '0%'
    }, 10)
  }
}

const stopTimerProgressBar = () => {
  const timerProgressBar = (0,_getters_js__WEBPACK_IMPORTED_MODULE_0__.getTimerProgressBar)()
  const timerProgressBarWidth = parseInt(window.getComputedStyle(timerProgressBar).width)
  timerProgressBar.style.removeProperty('transition')
  timerProgressBar.style.width = '100%'
  const timerProgressBarFullWidth = parseInt(window.getComputedStyle(timerProgressBar).width)
  const timerProgressBarPercent = parseInt(timerProgressBarWidth / timerProgressBarFullWidth * 100)
  timerProgressBar.style.removeProperty('transition')
  timerProgressBar.style.width = `${timerProgressBarPercent}%`
}


/***/ }),

/***/ "./node_modules/sweetalert2/src/utils/dom/getters.js":
/*!***********************************************************!*\
  !*** ./node_modules/sweetalert2/src/utils/dom/getters.js ***!
  \***********************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "getContainer": () => (/* binding */ getContainer),
/* harmony export */   "elementBySelector": () => (/* binding */ elementBySelector),
/* harmony export */   "getPopup": () => (/* binding */ getPopup),
/* harmony export */   "getIcon": () => (/* binding */ getIcon),
/* harmony export */   "getTitle": () => (/* binding */ getTitle),
/* harmony export */   "getHtmlContainer": () => (/* binding */ getHtmlContainer),
/* harmony export */   "getImage": () => (/* binding */ getImage),
/* harmony export */   "getProgressSteps": () => (/* binding */ getProgressSteps),
/* harmony export */   "getValidationMessage": () => (/* binding */ getValidationMessage),
/* harmony export */   "getConfirmButton": () => (/* binding */ getConfirmButton),
/* harmony export */   "getDenyButton": () => (/* binding */ getDenyButton),
/* harmony export */   "getInputLabel": () => (/* binding */ getInputLabel),
/* harmony export */   "getLoader": () => (/* binding */ getLoader),
/* harmony export */   "getCancelButton": () => (/* binding */ getCancelButton),
/* harmony export */   "getActions": () => (/* binding */ getActions),
/* harmony export */   "getFooter": () => (/* binding */ getFooter),
/* harmony export */   "getTimerProgressBar": () => (/* binding */ getTimerProgressBar),
/* harmony export */   "getCloseButton": () => (/* binding */ getCloseButton),
/* harmony export */   "getFocusableElements": () => (/* binding */ getFocusableElements),
/* harmony export */   "isModal": () => (/* binding */ isModal),
/* harmony export */   "isToast": () => (/* binding */ isToast),
/* harmony export */   "isLoading": () => (/* binding */ isLoading)
/* harmony export */ });
/* harmony import */ var _classes_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../classes.js */ "./node_modules/sweetalert2/src/utils/classes.js");
/* harmony import */ var _utils_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../utils.js */ "./node_modules/sweetalert2/src/utils/utils.js");
/* harmony import */ var _domUtils_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./domUtils.js */ "./node_modules/sweetalert2/src/utils/dom/domUtils.js");




const getContainer = () => document.body.querySelector(`.${_classes_js__WEBPACK_IMPORTED_MODULE_0__.swalClasses.container}`)

const elementBySelector = (selectorString) => {
  const container = getContainer()
  return container ? container.querySelector(selectorString) : null
}

const elementByClass = (className) => {
  return elementBySelector(`.${className}`)
}

const getPopup = () => elementByClass(_classes_js__WEBPACK_IMPORTED_MODULE_0__.swalClasses.popup)

const getIcon = () => elementByClass(_classes_js__WEBPACK_IMPORTED_MODULE_0__.swalClasses.icon)

const getTitle = () => elementByClass(_classes_js__WEBPACK_IMPORTED_MODULE_0__.swalClasses.title)

const getHtmlContainer = () => elementByClass(_classes_js__WEBPACK_IMPORTED_MODULE_0__.swalClasses["html-container"])

const getImage = () => elementByClass(_classes_js__WEBPACK_IMPORTED_MODULE_0__.swalClasses.image)

const getProgressSteps = () => elementByClass(_classes_js__WEBPACK_IMPORTED_MODULE_0__.swalClasses["progress-steps"])

const getValidationMessage = () => elementByClass(_classes_js__WEBPACK_IMPORTED_MODULE_0__.swalClasses["validation-message"])

const getConfirmButton = () => elementBySelector(`.${_classes_js__WEBPACK_IMPORTED_MODULE_0__.swalClasses.actions} .${_classes_js__WEBPACK_IMPORTED_MODULE_0__.swalClasses.confirm}`)

const getDenyButton = () => elementBySelector(`.${_classes_js__WEBPACK_IMPORTED_MODULE_0__.swalClasses.actions} .${_classes_js__WEBPACK_IMPORTED_MODULE_0__.swalClasses.deny}`)

const getInputLabel = () => elementByClass(_classes_js__WEBPACK_IMPORTED_MODULE_0__.swalClasses["input-label"])

const getLoader = () => elementBySelector(`.${_classes_js__WEBPACK_IMPORTED_MODULE_0__.swalClasses.loader}`)

const getCancelButton = () => elementBySelector(`.${_classes_js__WEBPACK_IMPORTED_MODULE_0__.swalClasses.actions} .${_classes_js__WEBPACK_IMPORTED_MODULE_0__.swalClasses.cancel}`)

const getActions = () => elementByClass(_classes_js__WEBPACK_IMPORTED_MODULE_0__.swalClasses.actions)

const getFooter = () => elementByClass(_classes_js__WEBPACK_IMPORTED_MODULE_0__.swalClasses.footer)

const getTimerProgressBar = () => elementByClass(_classes_js__WEBPACK_IMPORTED_MODULE_0__.swalClasses["timer-progress-bar"])

const getCloseButton = () => elementByClass(_classes_js__WEBPACK_IMPORTED_MODULE_0__.swalClasses.close)

// https://github.com/jkup/focusable/blob/master/index.js
const focusable = `
  a[href],
  area[href],
  input:not([disabled]),
  select:not([disabled]),
  textarea:not([disabled]),
  button:not([disabled]),
  iframe,
  object,
  embed,
  [tabindex="0"],
  [contenteditable],
  audio[controls],
  video[controls],
  summary
`

const getFocusableElements = () => {
  const focusableElementsWithTabindex = (0,_utils_js__WEBPACK_IMPORTED_MODULE_1__.toArray)(
    getPopup().querySelectorAll('[tabindex]:not([tabindex="-1"]):not([tabindex="0"])')
  )
  // sort according to tabindex
    .sort((a, b) => {
      a = parseInt(a.getAttribute('tabindex'))
      b = parseInt(b.getAttribute('tabindex'))
      if (a > b) {
        return 1
      } else if (a < b) {
        return -1
      }
      return 0
    })

  const otherFocusableElements = (0,_utils_js__WEBPACK_IMPORTED_MODULE_1__.toArray)(
    getPopup().querySelectorAll(focusable)
  ).filter(el => el.getAttribute('tabindex') !== '-1')

  return (0,_utils_js__WEBPACK_IMPORTED_MODULE_1__.uniqueArray)(focusableElementsWithTabindex.concat(otherFocusableElements)).filter(el => (0,_domUtils_js__WEBPACK_IMPORTED_MODULE_2__.isVisible)(el))
}

const isModal = () => {
  return !isToast() && !document.body.classList.contains(_classes_js__WEBPACK_IMPORTED_MODULE_0__.swalClasses["no-backdrop"])
}

const isToast = () => {
  return document.body.classList.contains(_classes_js__WEBPACK_IMPORTED_MODULE_0__.swalClasses["toast-shown"])
}

const isLoading = () => {
  return getPopup().hasAttribute('data-loading')
}


/***/ }),

/***/ "./node_modules/sweetalert2/src/utils/dom/index.js":
/*!*********************************************************!*\
  !*** ./node_modules/sweetalert2/src/utils/dom/index.js ***!
  \*********************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "addClass": () => (/* reexport safe */ _domUtils_js__WEBPACK_IMPORTED_MODULE_0__.addClass),
/* harmony export */   "allButtonsAreHidden": () => (/* reexport safe */ _domUtils_js__WEBPACK_IMPORTED_MODULE_0__.allButtonsAreHidden),
/* harmony export */   "animateTimerProgressBar": () => (/* reexport safe */ _domUtils_js__WEBPACK_IMPORTED_MODULE_0__.animateTimerProgressBar),
/* harmony export */   "applyCustomClass": () => (/* reexport safe */ _domUtils_js__WEBPACK_IMPORTED_MODULE_0__.applyCustomClass),
/* harmony export */   "applyNumericalStyle": () => (/* reexport safe */ _domUtils_js__WEBPACK_IMPORTED_MODULE_0__.applyNumericalStyle),
/* harmony export */   "focusInput": () => (/* reexport safe */ _domUtils_js__WEBPACK_IMPORTED_MODULE_0__.focusInput),
/* harmony export */   "getChildByClass": () => (/* reexport safe */ _domUtils_js__WEBPACK_IMPORTED_MODULE_0__.getChildByClass),
/* harmony export */   "getInput": () => (/* reexport safe */ _domUtils_js__WEBPACK_IMPORTED_MODULE_0__.getInput),
/* harmony export */   "hasClass": () => (/* reexport safe */ _domUtils_js__WEBPACK_IMPORTED_MODULE_0__.hasClass),
/* harmony export */   "hasCssAnimation": () => (/* reexport safe */ _domUtils_js__WEBPACK_IMPORTED_MODULE_0__.hasCssAnimation),
/* harmony export */   "hide": () => (/* reexport safe */ _domUtils_js__WEBPACK_IMPORTED_MODULE_0__.hide),
/* harmony export */   "isScrollable": () => (/* reexport safe */ _domUtils_js__WEBPACK_IMPORTED_MODULE_0__.isScrollable),
/* harmony export */   "isVisible": () => (/* reexport safe */ _domUtils_js__WEBPACK_IMPORTED_MODULE_0__.isVisible),
/* harmony export */   "removeClass": () => (/* reexport safe */ _domUtils_js__WEBPACK_IMPORTED_MODULE_0__.removeClass),
/* harmony export */   "setInnerHtml": () => (/* reexport safe */ _domUtils_js__WEBPACK_IMPORTED_MODULE_0__.setInnerHtml),
/* harmony export */   "setStyle": () => (/* reexport safe */ _domUtils_js__WEBPACK_IMPORTED_MODULE_0__.setStyle),
/* harmony export */   "show": () => (/* reexport safe */ _domUtils_js__WEBPACK_IMPORTED_MODULE_0__.show),
/* harmony export */   "states": () => (/* reexport safe */ _domUtils_js__WEBPACK_IMPORTED_MODULE_0__.states),
/* harmony export */   "stopTimerProgressBar": () => (/* reexport safe */ _domUtils_js__WEBPACK_IMPORTED_MODULE_0__.stopTimerProgressBar),
/* harmony export */   "toggle": () => (/* reexport safe */ _domUtils_js__WEBPACK_IMPORTED_MODULE_0__.toggle),
/* harmony export */   "toggleClass": () => (/* reexport safe */ _domUtils_js__WEBPACK_IMPORTED_MODULE_0__.toggleClass),
/* harmony export */   "init": () => (/* reexport safe */ _init_js__WEBPACK_IMPORTED_MODULE_1__.init),
/* harmony export */   "elementBySelector": () => (/* reexport safe */ _getters_js__WEBPACK_IMPORTED_MODULE_2__.elementBySelector),
/* harmony export */   "getActions": () => (/* reexport safe */ _getters_js__WEBPACK_IMPORTED_MODULE_2__.getActions),
/* harmony export */   "getCancelButton": () => (/* reexport safe */ _getters_js__WEBPACK_IMPORTED_MODULE_2__.getCancelButton),
/* harmony export */   "getCloseButton": () => (/* reexport safe */ _getters_js__WEBPACK_IMPORTED_MODULE_2__.getCloseButton),
/* harmony export */   "getConfirmButton": () => (/* reexport safe */ _getters_js__WEBPACK_IMPORTED_MODULE_2__.getConfirmButton),
/* harmony export */   "getContainer": () => (/* reexport safe */ _getters_js__WEBPACK_IMPORTED_MODULE_2__.getContainer),
/* harmony export */   "getDenyButton": () => (/* reexport safe */ _getters_js__WEBPACK_IMPORTED_MODULE_2__.getDenyButton),
/* harmony export */   "getFocusableElements": () => (/* reexport safe */ _getters_js__WEBPACK_IMPORTED_MODULE_2__.getFocusableElements),
/* harmony export */   "getFooter": () => (/* reexport safe */ _getters_js__WEBPACK_IMPORTED_MODULE_2__.getFooter),
/* harmony export */   "getHtmlContainer": () => (/* reexport safe */ _getters_js__WEBPACK_IMPORTED_MODULE_2__.getHtmlContainer),
/* harmony export */   "getIcon": () => (/* reexport safe */ _getters_js__WEBPACK_IMPORTED_MODULE_2__.getIcon),
/* harmony export */   "getImage": () => (/* reexport safe */ _getters_js__WEBPACK_IMPORTED_MODULE_2__.getImage),
/* harmony export */   "getInputLabel": () => (/* reexport safe */ _getters_js__WEBPACK_IMPORTED_MODULE_2__.getInputLabel),
/* harmony export */   "getLoader": () => (/* reexport safe */ _getters_js__WEBPACK_IMPORTED_MODULE_2__.getLoader),
/* harmony export */   "getPopup": () => (/* reexport safe */ _getters_js__WEBPACK_IMPORTED_MODULE_2__.getPopup),
/* harmony export */   "getProgressSteps": () => (/* reexport safe */ _getters_js__WEBPACK_IMPORTED_MODULE_2__.getProgressSteps),
/* harmony export */   "getTimerProgressBar": () => (/* reexport safe */ _getters_js__WEBPACK_IMPORTED_MODULE_2__.getTimerProgressBar),
/* harmony export */   "getTitle": () => (/* reexport safe */ _getters_js__WEBPACK_IMPORTED_MODULE_2__.getTitle),
/* harmony export */   "getValidationMessage": () => (/* reexport safe */ _getters_js__WEBPACK_IMPORTED_MODULE_2__.getValidationMessage),
/* harmony export */   "isLoading": () => (/* reexport safe */ _getters_js__WEBPACK_IMPORTED_MODULE_2__.isLoading),
/* harmony export */   "isModal": () => (/* reexport safe */ _getters_js__WEBPACK_IMPORTED_MODULE_2__.isModal),
/* harmony export */   "isToast": () => (/* reexport safe */ _getters_js__WEBPACK_IMPORTED_MODULE_2__.isToast),
/* harmony export */   "parseHtmlToContainer": () => (/* reexport safe */ _parseHtmlToContainer_js__WEBPACK_IMPORTED_MODULE_3__.parseHtmlToContainer),
/* harmony export */   "animationEndEvent": () => (/* reexport safe */ _animationEndEvent_js__WEBPACK_IMPORTED_MODULE_4__.animationEndEvent),
/* harmony export */   "measureScrollbar": () => (/* reexport safe */ _measureScrollbar_js__WEBPACK_IMPORTED_MODULE_5__.measureScrollbar),
/* harmony export */   "render": () => (/* reexport safe */ _renderers_render_js__WEBPACK_IMPORTED_MODULE_6__.render)
/* harmony export */ });
/* harmony import */ var _domUtils_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./domUtils.js */ "./node_modules/sweetalert2/src/utils/dom/domUtils.js");
/* harmony import */ var _init_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./init.js */ "./node_modules/sweetalert2/src/utils/dom/init.js");
/* harmony import */ var _getters_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./getters.js */ "./node_modules/sweetalert2/src/utils/dom/getters.js");
/* harmony import */ var _parseHtmlToContainer_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./parseHtmlToContainer.js */ "./node_modules/sweetalert2/src/utils/dom/parseHtmlToContainer.js");
/* harmony import */ var _animationEndEvent_js__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./animationEndEvent.js */ "./node_modules/sweetalert2/src/utils/dom/animationEndEvent.js");
/* harmony import */ var _measureScrollbar_js__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./measureScrollbar.js */ "./node_modules/sweetalert2/src/utils/dom/measureScrollbar.js");
/* harmony import */ var _renderers_render_js__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./renderers/render.js */ "./node_modules/sweetalert2/src/utils/dom/renderers/render.js");









/***/ }),

/***/ "./node_modules/sweetalert2/src/utils/dom/init.js":
/*!********************************************************!*\
  !*** ./node_modules/sweetalert2/src/utils/dom/init.js ***!
  \********************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "init": () => (/* binding */ init)
/* harmony export */ });
/* harmony import */ var _classes_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../classes.js */ "./node_modules/sweetalert2/src/utils/classes.js");
/* harmony import */ var _getters_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./getters.js */ "./node_modules/sweetalert2/src/utils/dom/getters.js");
/* harmony import */ var _domUtils_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./domUtils.js */ "./node_modules/sweetalert2/src/utils/dom/domUtils.js");
/* harmony import */ var _isNodeEnv_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../isNodeEnv.js */ "./node_modules/sweetalert2/src/utils/isNodeEnv.js");
/* harmony import */ var _utils_js__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ../utils.js */ "./node_modules/sweetalert2/src/utils/utils.js");
/* harmony import */ var _sweetalert2_js__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ../../sweetalert2.js */ "./node_modules/sweetalert2/src/sweetalert2.js");







const sweetHTML = `
 <div aria-labelledby="${_classes_js__WEBPACK_IMPORTED_MODULE_0__.swalClasses.title}" aria-describedby="${_classes_js__WEBPACK_IMPORTED_MODULE_0__.swalClasses["html-container"]}" class="${_classes_js__WEBPACK_IMPORTED_MODULE_0__.swalClasses.popup}" tabindex="-1">
   <button type="button" class="${_classes_js__WEBPACK_IMPORTED_MODULE_0__.swalClasses.close}"></button>
   <ul class="${_classes_js__WEBPACK_IMPORTED_MODULE_0__.swalClasses["progress-steps"]}"></ul>
   <div class="${_classes_js__WEBPACK_IMPORTED_MODULE_0__.swalClasses.icon}"></div>
   <img class="${_classes_js__WEBPACK_IMPORTED_MODULE_0__.swalClasses.image}" />
   <h2 class="${_classes_js__WEBPACK_IMPORTED_MODULE_0__.swalClasses.title}" id="${_classes_js__WEBPACK_IMPORTED_MODULE_0__.swalClasses.title}"></h2>
   <div class="${_classes_js__WEBPACK_IMPORTED_MODULE_0__.swalClasses["html-container"]}" id="${_classes_js__WEBPACK_IMPORTED_MODULE_0__.swalClasses["html-container"]}"></div>
   <input class="${_classes_js__WEBPACK_IMPORTED_MODULE_0__.swalClasses.input}" />
   <input type="file" class="${_classes_js__WEBPACK_IMPORTED_MODULE_0__.swalClasses.file}" />
   <div class="${_classes_js__WEBPACK_IMPORTED_MODULE_0__.swalClasses.range}">
     <input type="range" />
     <output></output>
   </div>
   <select class="${_classes_js__WEBPACK_IMPORTED_MODULE_0__.swalClasses.select}"></select>
   <div class="${_classes_js__WEBPACK_IMPORTED_MODULE_0__.swalClasses.radio}"></div>
   <label for="${_classes_js__WEBPACK_IMPORTED_MODULE_0__.swalClasses.checkbox}" class="${_classes_js__WEBPACK_IMPORTED_MODULE_0__.swalClasses.checkbox}">
     <input type="checkbox" />
     <span class="${_classes_js__WEBPACK_IMPORTED_MODULE_0__.swalClasses.label}"></span>
   </label>
   <textarea class="${_classes_js__WEBPACK_IMPORTED_MODULE_0__.swalClasses.textarea}"></textarea>
   <div class="${_classes_js__WEBPACK_IMPORTED_MODULE_0__.swalClasses["validation-message"]}" id="${_classes_js__WEBPACK_IMPORTED_MODULE_0__.swalClasses["validation-message"]}"></div>
   <div class="${_classes_js__WEBPACK_IMPORTED_MODULE_0__.swalClasses.actions}">
     <div class="${_classes_js__WEBPACK_IMPORTED_MODULE_0__.swalClasses.loader}"></div>
     <button type="button" class="${_classes_js__WEBPACK_IMPORTED_MODULE_0__.swalClasses.confirm}"></button>
     <button type="button" class="${_classes_js__WEBPACK_IMPORTED_MODULE_0__.swalClasses.deny}"></button>
     <button type="button" class="${_classes_js__WEBPACK_IMPORTED_MODULE_0__.swalClasses.cancel}"></button>
   </div>
   <div class="${_classes_js__WEBPACK_IMPORTED_MODULE_0__.swalClasses.footer}"></div>
   <div class="${_classes_js__WEBPACK_IMPORTED_MODULE_0__.swalClasses["timer-progress-bar-container"]}">
     <div class="${_classes_js__WEBPACK_IMPORTED_MODULE_0__.swalClasses["timer-progress-bar"]}"></div>
   </div>
 </div>
`.replace(/(^|\n)\s*/g, '')

const resetOldContainer = () => {
  const oldContainer = (0,_getters_js__WEBPACK_IMPORTED_MODULE_1__.getContainer)()
  if (!oldContainer) {
    return false
  }

  oldContainer.remove()
  ;(0,_domUtils_js__WEBPACK_IMPORTED_MODULE_2__.removeClass)(
    [document.documentElement, document.body],
    [
      _classes_js__WEBPACK_IMPORTED_MODULE_0__.swalClasses["no-backdrop"],
      _classes_js__WEBPACK_IMPORTED_MODULE_0__.swalClasses["toast-shown"],
      _classes_js__WEBPACK_IMPORTED_MODULE_0__.swalClasses["has-column"]
    ]
  )

  return true
}

const resetValidationMessage = () => {
  if (_sweetalert2_js__WEBPACK_IMPORTED_MODULE_5__["default"].isVisible()) {
    _sweetalert2_js__WEBPACK_IMPORTED_MODULE_5__["default"].resetValidationMessage()
  }
}

const addInputChangeListeners = () => {
  const popup = (0,_getters_js__WEBPACK_IMPORTED_MODULE_1__.getPopup)()

  const input = (0,_domUtils_js__WEBPACK_IMPORTED_MODULE_2__.getChildByClass)(popup, _classes_js__WEBPACK_IMPORTED_MODULE_0__.swalClasses.input)
  const file = (0,_domUtils_js__WEBPACK_IMPORTED_MODULE_2__.getChildByClass)(popup, _classes_js__WEBPACK_IMPORTED_MODULE_0__.swalClasses.file)
  const range = popup.querySelector(`.${_classes_js__WEBPACK_IMPORTED_MODULE_0__.swalClasses.range} input`)
  const rangeOutput = popup.querySelector(`.${_classes_js__WEBPACK_IMPORTED_MODULE_0__.swalClasses.range} output`)
  const select = (0,_domUtils_js__WEBPACK_IMPORTED_MODULE_2__.getChildByClass)(popup, _classes_js__WEBPACK_IMPORTED_MODULE_0__.swalClasses.select)
  const checkbox = popup.querySelector(`.${_classes_js__WEBPACK_IMPORTED_MODULE_0__.swalClasses.checkbox} input`)
  const textarea = (0,_domUtils_js__WEBPACK_IMPORTED_MODULE_2__.getChildByClass)(popup, _classes_js__WEBPACK_IMPORTED_MODULE_0__.swalClasses.textarea)

  input.oninput = resetValidationMessage
  file.onchange = resetValidationMessage
  select.onchange = resetValidationMessage
  checkbox.onchange = resetValidationMessage
  textarea.oninput = resetValidationMessage

  range.oninput = () => {
    resetValidationMessage()
    rangeOutput.value = range.value
  }

  range.onchange = () => {
    resetValidationMessage()
    range.nextSibling.value = range.value
  }
}

const getTarget = (target) => typeof target === 'string' ? document.querySelector(target) : target

const setupAccessibility = (params) => {
  const popup = (0,_getters_js__WEBPACK_IMPORTED_MODULE_1__.getPopup)()

  popup.setAttribute('role', params.toast ? 'alert' : 'dialog')
  popup.setAttribute('aria-live', params.toast ? 'polite' : 'assertive')
  if (!params.toast) {
    popup.setAttribute('aria-modal', 'true')
  }
}

const setupRTL = (targetElement) => {
  if (window.getComputedStyle(targetElement).direction === 'rtl') {
    (0,_domUtils_js__WEBPACK_IMPORTED_MODULE_2__.addClass)((0,_getters_js__WEBPACK_IMPORTED_MODULE_1__.getContainer)(), _classes_js__WEBPACK_IMPORTED_MODULE_0__.swalClasses.rtl)
  }
}

/*
 * Add modal + backdrop to DOM
 */
const init = (params) => {
  // Clean up the old popup container if it exists
  const oldContainerExisted = resetOldContainer()

  /* istanbul ignore if */
  if ((0,_isNodeEnv_js__WEBPACK_IMPORTED_MODULE_3__.isNodeEnv)()) {
    (0,_utils_js__WEBPACK_IMPORTED_MODULE_4__.error)('SweetAlert2 requires document to initialize')
    return
  }

  const container = document.createElement('div')
  container.className = _classes_js__WEBPACK_IMPORTED_MODULE_0__.swalClasses.container
  if (oldContainerExisted) {
    (0,_domUtils_js__WEBPACK_IMPORTED_MODULE_2__.addClass)(container, _classes_js__WEBPACK_IMPORTED_MODULE_0__.swalClasses["no-transition"])
  }
  (0,_domUtils_js__WEBPACK_IMPORTED_MODULE_2__.setInnerHtml)(container, sweetHTML)

  const targetElement = getTarget(params.target)
  targetElement.appendChild(container)

  setupAccessibility(params)
  setupRTL(targetElement)
  addInputChangeListeners()
}


/***/ }),

/***/ "./node_modules/sweetalert2/src/utils/dom/inputUtils.js":
/*!**************************************************************!*\
  !*** ./node_modules/sweetalert2/src/utils/dom/inputUtils.js ***!
  \**************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "handleInputOptionsAndValue": () => (/* binding */ handleInputOptionsAndValue),
/* harmony export */   "getInputValue": () => (/* binding */ getInputValue)
/* harmony export */ });
/* harmony import */ var _index_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./index.js */ "./node_modules/sweetalert2/src/utils/dom/index.js");
/* harmony import */ var _classes_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../classes.js */ "./node_modules/sweetalert2/src/utils/classes.js");
/* harmony import */ var _domUtils_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./domUtils.js */ "./node_modules/sweetalert2/src/utils/dom/domUtils.js");
/* harmony import */ var _utils_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../utils.js */ "./node_modules/sweetalert2/src/utils/utils.js");
/* harmony import */ var _staticMethods_showLoading_js__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ../../staticMethods/showLoading.js */ "./node_modules/sweetalert2/src/staticMethods/showLoading.js");






const handleInputOptionsAndValue = (instance, params) => {
  if (params.input === 'select' || params.input === 'radio') {
    handleInputOptions(instance, params)
  } else if (
    ['text', 'email', 'number', 'tel', 'textarea'].includes(params.input) &&
    ((0,_utils_js__WEBPACK_IMPORTED_MODULE_3__.hasToPromiseFn)(params.inputValue) || (0,_utils_js__WEBPACK_IMPORTED_MODULE_3__.isPromise)(params.inputValue))
  ) {
    (0,_staticMethods_showLoading_js__WEBPACK_IMPORTED_MODULE_4__.showLoading)(_index_js__WEBPACK_IMPORTED_MODULE_0__.getConfirmButton())
    handleInputValue(instance, params)
  }
}

const getInputValue = (instance, innerParams) => {
  const input = instance.getInput()
  if (!input) {
    return null
  }
  switch (innerParams.input) {
    case 'checkbox':
      return getCheckboxValue(input)
    case 'radio':
      return getRadioValue(input)
    case 'file':
      return getFileValue(input)
    default:
      return innerParams.inputAutoTrim ? input.value.trim() : input.value
  }
}

const getCheckboxValue = (input) => input.checked ? 1 : 0

const getRadioValue = (input) => input.checked ? input.value : null

const getFileValue = (input) => input.files.length ? (input.getAttribute('multiple') !== null ? input.files : input.files[0]) : null

const handleInputOptions = (instance, params) => {
  const popup = _index_js__WEBPACK_IMPORTED_MODULE_0__.getPopup()
  const processInputOptions = (inputOptions) => populateInputOptions[params.input](popup, formatInputOptions(inputOptions), params)
  if ((0,_utils_js__WEBPACK_IMPORTED_MODULE_3__.hasToPromiseFn)(params.inputOptions) || (0,_utils_js__WEBPACK_IMPORTED_MODULE_3__.isPromise)(params.inputOptions)) {
    (0,_staticMethods_showLoading_js__WEBPACK_IMPORTED_MODULE_4__.showLoading)(_index_js__WEBPACK_IMPORTED_MODULE_0__.getConfirmButton())
    ;(0,_utils_js__WEBPACK_IMPORTED_MODULE_3__.asPromise)(params.inputOptions).then((inputOptions) => {
      instance.hideLoading()
      processInputOptions(inputOptions)
    })
  } else if (typeof params.inputOptions === 'object') {
    processInputOptions(params.inputOptions)
  } else {
    (0,_utils_js__WEBPACK_IMPORTED_MODULE_3__.error)(`Unexpected type of inputOptions! Expected object, Map or Promise, got ${typeof params.inputOptions}`)
  }
}

const handleInputValue = (instance, params) => {
  const input = instance.getInput()
  _index_js__WEBPACK_IMPORTED_MODULE_0__.hide(input)
  ;(0,_utils_js__WEBPACK_IMPORTED_MODULE_3__.asPromise)(params.inputValue).then((inputValue) => {
    input.value = params.input === 'number' ? parseFloat(inputValue) || 0 : `${inputValue}`
    _index_js__WEBPACK_IMPORTED_MODULE_0__.show(input)
    input.focus()
    instance.hideLoading()
  })
    .catch((err) => {
      (0,_utils_js__WEBPACK_IMPORTED_MODULE_3__.error)(`Error in inputValue promise: ${err}`)
      input.value = ''
      _index_js__WEBPACK_IMPORTED_MODULE_0__.show(input)
      input.focus()
      instance.hideLoading()
    })
}

const populateInputOptions = {
  select: (popup, inputOptions, params) => {
    const select = (0,_domUtils_js__WEBPACK_IMPORTED_MODULE_2__.getChildByClass)(popup, _classes_js__WEBPACK_IMPORTED_MODULE_1__.swalClasses.select)
    const renderOption = (parent, optionLabel, optionValue) => {
      const option = document.createElement('option')
      option.value = optionValue
      _index_js__WEBPACK_IMPORTED_MODULE_0__.setInnerHtml(option, optionLabel)
      option.selected = isSelected(optionValue, params.inputValue)
      parent.appendChild(option)
    }
    inputOptions.forEach(inputOption => {
      const optionValue = inputOption[0]
      const optionLabel = inputOption[1]
      // <optgroup> spec:
      // https://www.w3.org/TR/html401/interact/forms.html#h-17.6
      // "...all OPTGROUP elements must be specified directly within a SELECT element (i.e., groups may not be nested)..."
      // check whether this is a <optgroup>
      if (Array.isArray(optionLabel)) { // if it is an array, then it is an <optgroup>
        const optgroup = document.createElement('optgroup')
        optgroup.label = optionValue
        optgroup.disabled = false // not configurable for now
        select.appendChild(optgroup)
        optionLabel.forEach(o => renderOption(optgroup, o[1], o[0]))
      } else { // case of <option>
        renderOption(select, optionLabel, optionValue)
      }
    })
    select.focus()
  },

  radio: (popup, inputOptions, params) => {
    const radio = (0,_domUtils_js__WEBPACK_IMPORTED_MODULE_2__.getChildByClass)(popup, _classes_js__WEBPACK_IMPORTED_MODULE_1__.swalClasses.radio)
    inputOptions.forEach(inputOption => {
      const radioValue = inputOption[0]
      const radioLabel = inputOption[1]
      const radioInput = document.createElement('input')
      const radioLabelElement = document.createElement('label')
      radioInput.type = 'radio'
      radioInput.name = _classes_js__WEBPACK_IMPORTED_MODULE_1__.swalClasses.radio
      radioInput.value = radioValue
      if (isSelected(radioValue, params.inputValue)) {
        radioInput.checked = true
      }
      const label = document.createElement('span')
      _index_js__WEBPACK_IMPORTED_MODULE_0__.setInnerHtml(label, radioLabel)
      label.className = _classes_js__WEBPACK_IMPORTED_MODULE_1__.swalClasses.label
      radioLabelElement.appendChild(radioInput)
      radioLabelElement.appendChild(label)
      radio.appendChild(radioLabelElement)
    })
    const radios = radio.querySelectorAll('input')
    if (radios.length) {
      radios[0].focus()
    }
  }
}

/**
 * Converts `inputOptions` into an array of `[value, label]`s
 * @param inputOptions
 */
const formatInputOptions = (inputOptions) => {
  const result = []
  if (typeof Map !== 'undefined' && inputOptions instanceof Map) {
    inputOptions.forEach((value, key) => {
      let valueFormatted = value
      if (typeof valueFormatted === 'object') { // case of <optgroup>
        valueFormatted = formatInputOptions(valueFormatted)
      }
      result.push([key, valueFormatted])
    })
  } else {
    Object.keys(inputOptions).forEach(key => {
      let valueFormatted = inputOptions[key]
      if (typeof valueFormatted === 'object') { // case of <optgroup>
        valueFormatted = formatInputOptions(valueFormatted)
      }
      result.push([key, valueFormatted])
    })
  }
  return result
}

const isSelected = (optionValue, inputValue) => {
  return inputValue && inputValue.toString() === optionValue.toString()
}


/***/ }),

/***/ "./node_modules/sweetalert2/src/utils/dom/measureScrollbar.js":
/*!********************************************************************!*\
  !*** ./node_modules/sweetalert2/src/utils/dom/measureScrollbar.js ***!
  \********************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "measureScrollbar": () => (/* binding */ measureScrollbar)
/* harmony export */ });
/* harmony import */ var _classes_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../classes.js */ "./node_modules/sweetalert2/src/utils/classes.js");


// Measure scrollbar width for padding body during modal show/hide
// https://github.com/twbs/bootstrap/blob/master/js/src/modal.js
const measureScrollbar = () => {
  const scrollDiv = document.createElement('div')
  scrollDiv.className = _classes_js__WEBPACK_IMPORTED_MODULE_0__.swalClasses["scrollbar-measure"]
  document.body.appendChild(scrollDiv)
  const scrollbarWidth = scrollDiv.getBoundingClientRect().width - scrollDiv.clientWidth
  document.body.removeChild(scrollDiv)
  return scrollbarWidth
}


/***/ }),

/***/ "./node_modules/sweetalert2/src/utils/dom/parseHtmlToContainer.js":
/*!************************************************************************!*\
  !*** ./node_modules/sweetalert2/src/utils/dom/parseHtmlToContainer.js ***!
  \************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "parseHtmlToContainer": () => (/* binding */ parseHtmlToContainer)
/* harmony export */ });
/* harmony import */ var _domUtils_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./domUtils.js */ "./node_modules/sweetalert2/src/utils/dom/domUtils.js");


const parseHtmlToContainer = (param, target) => {
  // DOM element
  if (param instanceof HTMLElement) {
    target.appendChild(param)

  // Object
  } else if (typeof param === 'object') {
    handleObject(param, target)

  // Plain string
  } else if (param) {
    (0,_domUtils_js__WEBPACK_IMPORTED_MODULE_0__.setInnerHtml)(target, param)
  }
}

const handleObject = (param, target) => {
  // JQuery element(s)
  if (param.jquery) {
    handleJqueryElem(target, param)

  // For other objects use their string representation
  } else {
    (0,_domUtils_js__WEBPACK_IMPORTED_MODULE_0__.setInnerHtml)(target, param.toString())
  }
}

const handleJqueryElem = (target, elem) => {
  target.textContent = ''
  if (0 in elem) {
    for (let i = 0; i in elem; i++) {
      target.appendChild(elem[i].cloneNode(true))
    }
  } else {
    target.appendChild(elem.cloneNode(true))
  }
}


/***/ }),

/***/ "./node_modules/sweetalert2/src/utils/dom/renderers/render.js":
/*!********************************************************************!*\
  !*** ./node_modules/sweetalert2/src/utils/dom/renderers/render.js ***!
  \********************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* binding */ render)
/* harmony export */ });
/* harmony import */ var _getters_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../getters.js */ "./node_modules/sweetalert2/src/utils/dom/getters.js");
/* harmony import */ var _renderActions_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./renderActions.js */ "./node_modules/sweetalert2/src/utils/dom/renderers/renderActions.js");
/* harmony import */ var _renderContainer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./renderContainer.js */ "./node_modules/sweetalert2/src/utils/dom/renderers/renderContainer.js");
/* harmony import */ var _renderContent_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./renderContent.js */ "./node_modules/sweetalert2/src/utils/dom/renderers/renderContent.js");
/* harmony import */ var _renderFooter_js__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./renderFooter.js */ "./node_modules/sweetalert2/src/utils/dom/renderers/renderFooter.js");
/* harmony import */ var _renderCloseButton_js__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./renderCloseButton.js */ "./node_modules/sweetalert2/src/utils/dom/renderers/renderCloseButton.js");
/* harmony import */ var _renderIcon_js__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./renderIcon.js */ "./node_modules/sweetalert2/src/utils/dom/renderers/renderIcon.js");
/* harmony import */ var _renderImage_js__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ./renderImage.js */ "./node_modules/sweetalert2/src/utils/dom/renderers/renderImage.js");
/* harmony import */ var _renderProgressSteps_js__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! ./renderProgressSteps.js */ "./node_modules/sweetalert2/src/utils/dom/renderers/renderProgressSteps.js");
/* harmony import */ var _renderTitle_js__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! ./renderTitle.js */ "./node_modules/sweetalert2/src/utils/dom/renderers/renderTitle.js");
/* harmony import */ var _renderPopup_js__WEBPACK_IMPORTED_MODULE_10__ = __webpack_require__(/*! ./renderPopup.js */ "./node_modules/sweetalert2/src/utils/dom/renderers/renderPopup.js");












const render = (instance, params) => {
  (0,_renderPopup_js__WEBPACK_IMPORTED_MODULE_10__.renderPopup)(instance, params)
  ;(0,_renderContainer_js__WEBPACK_IMPORTED_MODULE_2__.renderContainer)(instance, params)

  ;(0,_renderProgressSteps_js__WEBPACK_IMPORTED_MODULE_8__.renderProgressSteps)(instance, params)
  ;(0,_renderIcon_js__WEBPACK_IMPORTED_MODULE_6__.renderIcon)(instance, params)
  ;(0,_renderImage_js__WEBPACK_IMPORTED_MODULE_7__.renderImage)(instance, params)
  ;(0,_renderTitle_js__WEBPACK_IMPORTED_MODULE_9__.renderTitle)(instance, params)
  ;(0,_renderCloseButton_js__WEBPACK_IMPORTED_MODULE_5__.renderCloseButton)(instance, params)

  ;(0,_renderContent_js__WEBPACK_IMPORTED_MODULE_3__.renderContent)(instance, params)
  ;(0,_renderActions_js__WEBPACK_IMPORTED_MODULE_1__.renderActions)(instance, params)
  ;(0,_renderFooter_js__WEBPACK_IMPORTED_MODULE_4__.renderFooter)(instance, params)

  if (typeof params.didRender === 'function') {
    params.didRender((0,_getters_js__WEBPACK_IMPORTED_MODULE_0__.getPopup)())
  }
}


/***/ }),

/***/ "./node_modules/sweetalert2/src/utils/dom/renderers/renderActions.js":
/*!***************************************************************************!*\
  !*** ./node_modules/sweetalert2/src/utils/dom/renderers/renderActions.js ***!
  \***************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "renderActions": () => (/* binding */ renderActions)
/* harmony export */ });
/* harmony import */ var _classes_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../classes.js */ "./node_modules/sweetalert2/src/utils/classes.js");
/* harmony import */ var _dom_index_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../dom/index.js */ "./node_modules/sweetalert2/src/utils/dom/index.js");
/* harmony import */ var _utils_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../utils.js */ "./node_modules/sweetalert2/src/utils/utils.js");




const renderActions = (instance, params) => {
  const actions = _dom_index_js__WEBPACK_IMPORTED_MODULE_1__.getActions()
  const loader = _dom_index_js__WEBPACK_IMPORTED_MODULE_1__.getLoader()

  // Actions (buttons) wrapper
  if (!params.showConfirmButton && !params.showDenyButton && !params.showCancelButton) {
    _dom_index_js__WEBPACK_IMPORTED_MODULE_1__.hide(actions)
  } else {
    _dom_index_js__WEBPACK_IMPORTED_MODULE_1__.show(actions)
  }

  // Custom class
  _dom_index_js__WEBPACK_IMPORTED_MODULE_1__.applyCustomClass(actions, params, 'actions')

  // Render all the buttons
  renderButtons(actions, loader, params)

  // Loader
  _dom_index_js__WEBPACK_IMPORTED_MODULE_1__.setInnerHtml(loader, params.loaderHtml)
  _dom_index_js__WEBPACK_IMPORTED_MODULE_1__.applyCustomClass(loader, params, 'loader')
}

function renderButtons (actions, loader, params) {
  const confirmButton = _dom_index_js__WEBPACK_IMPORTED_MODULE_1__.getConfirmButton()
  const denyButton = _dom_index_js__WEBPACK_IMPORTED_MODULE_1__.getDenyButton()
  const cancelButton = _dom_index_js__WEBPACK_IMPORTED_MODULE_1__.getCancelButton()

  // Render buttons
  renderButton(confirmButton, 'confirm', params)
  renderButton(denyButton, 'deny', params)
  renderButton(cancelButton, 'cancel', params)
  handleButtonsStyling(confirmButton, denyButton, cancelButton, params)

  if (params.reverseButtons) {
    if (params.toast) {
      actions.insertBefore(cancelButton, confirmButton)
      actions.insertBefore(denyButton, confirmButton)
    } else {
      actions.insertBefore(cancelButton, loader)
      actions.insertBefore(denyButton, loader)
      actions.insertBefore(confirmButton, loader)
    }
  }
}

function handleButtonsStyling (confirmButton, denyButton, cancelButton, params) {
  if (!params.buttonsStyling) {
    return _dom_index_js__WEBPACK_IMPORTED_MODULE_1__.removeClass([confirmButton, denyButton, cancelButton], _classes_js__WEBPACK_IMPORTED_MODULE_0__.swalClasses.styled)
  }

  _dom_index_js__WEBPACK_IMPORTED_MODULE_1__.addClass([confirmButton, denyButton, cancelButton], _classes_js__WEBPACK_IMPORTED_MODULE_0__.swalClasses.styled)

  // Buttons background colors
  if (params.confirmButtonColor) {
    confirmButton.style.backgroundColor = params.confirmButtonColor
    _dom_index_js__WEBPACK_IMPORTED_MODULE_1__.addClass(confirmButton, _classes_js__WEBPACK_IMPORTED_MODULE_0__.swalClasses["default-outline"])
  }
  if (params.denyButtonColor) {
    denyButton.style.backgroundColor = params.denyButtonColor
    _dom_index_js__WEBPACK_IMPORTED_MODULE_1__.addClass(denyButton, _classes_js__WEBPACK_IMPORTED_MODULE_0__.swalClasses["default-outline"])
  }
  if (params.cancelButtonColor) {
    cancelButton.style.backgroundColor = params.cancelButtonColor
    _dom_index_js__WEBPACK_IMPORTED_MODULE_1__.addClass(cancelButton, _classes_js__WEBPACK_IMPORTED_MODULE_0__.swalClasses["default-outline"])
  }
}

function renderButton (button, buttonType, params) {
  _dom_index_js__WEBPACK_IMPORTED_MODULE_1__.toggle(button, params[`show${(0,_utils_js__WEBPACK_IMPORTED_MODULE_2__.capitalizeFirstLetter)(buttonType)}Button`], 'inline-block')
  _dom_index_js__WEBPACK_IMPORTED_MODULE_1__.setInnerHtml(button, params[`${buttonType}ButtonText`]) // Set caption text
  button.setAttribute('aria-label', params[`${buttonType}ButtonAriaLabel`]) // ARIA label

  // Add buttons custom classes
  button.className = _classes_js__WEBPACK_IMPORTED_MODULE_0__.swalClasses[buttonType]
  _dom_index_js__WEBPACK_IMPORTED_MODULE_1__.applyCustomClass(button, params, `${buttonType}Button`)
  _dom_index_js__WEBPACK_IMPORTED_MODULE_1__.addClass(button, params[`${buttonType}ButtonClass`])
}


/***/ }),

/***/ "./node_modules/sweetalert2/src/utils/dom/renderers/renderCloseButton.js":
/*!*******************************************************************************!*\
  !*** ./node_modules/sweetalert2/src/utils/dom/renderers/renderCloseButton.js ***!
  \*******************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "renderCloseButton": () => (/* binding */ renderCloseButton)
/* harmony export */ });
/* harmony import */ var _dom_index_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../dom/index.js */ "./node_modules/sweetalert2/src/utils/dom/index.js");


const renderCloseButton = (instance, params) => {
  const closeButton = _dom_index_js__WEBPACK_IMPORTED_MODULE_0__.getCloseButton()

  _dom_index_js__WEBPACK_IMPORTED_MODULE_0__.setInnerHtml(closeButton, params.closeButtonHtml)

  // Custom class
  _dom_index_js__WEBPACK_IMPORTED_MODULE_0__.applyCustomClass(closeButton, params, 'closeButton')

  _dom_index_js__WEBPACK_IMPORTED_MODULE_0__.toggle(closeButton, params.showCloseButton)
  closeButton.setAttribute('aria-label', params.closeButtonAriaLabel)
}


/***/ }),

/***/ "./node_modules/sweetalert2/src/utils/dom/renderers/renderContainer.js":
/*!*****************************************************************************!*\
  !*** ./node_modules/sweetalert2/src/utils/dom/renderers/renderContainer.js ***!
  \*****************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "renderContainer": () => (/* binding */ renderContainer)
/* harmony export */ });
/* harmony import */ var _classes_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../classes.js */ "./node_modules/sweetalert2/src/utils/classes.js");
/* harmony import */ var _utils_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../utils.js */ "./node_modules/sweetalert2/src/utils/utils.js");
/* harmony import */ var _dom_index_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../dom/index.js */ "./node_modules/sweetalert2/src/utils/dom/index.js");




function handleBackdropParam (container, backdrop) {
  if (typeof backdrop === 'string') {
    container.style.background = backdrop
  } else if (!backdrop) {
    _dom_index_js__WEBPACK_IMPORTED_MODULE_2__.addClass([document.documentElement, document.body], _classes_js__WEBPACK_IMPORTED_MODULE_0__.swalClasses["no-backdrop"])
  }
}

function handlePositionParam (container, position) {
  if (position in _classes_js__WEBPACK_IMPORTED_MODULE_0__.swalClasses) {
    _dom_index_js__WEBPACK_IMPORTED_MODULE_2__.addClass(container, _classes_js__WEBPACK_IMPORTED_MODULE_0__.swalClasses[position])
  } else {
    (0,_utils_js__WEBPACK_IMPORTED_MODULE_1__.warn)('The "position" parameter is not valid, defaulting to "center"')
    _dom_index_js__WEBPACK_IMPORTED_MODULE_2__.addClass(container, _classes_js__WEBPACK_IMPORTED_MODULE_0__.swalClasses.center)
  }
}

function handleGrowParam (container, grow) {
  if (grow && typeof grow === 'string') {
    const growClass = `grow-${grow}`
    if (growClass in _classes_js__WEBPACK_IMPORTED_MODULE_0__.swalClasses) {
      _dom_index_js__WEBPACK_IMPORTED_MODULE_2__.addClass(container, _classes_js__WEBPACK_IMPORTED_MODULE_0__.swalClasses[growClass])
    }
  }
}

const renderContainer = (instance, params) => {
  const container = _dom_index_js__WEBPACK_IMPORTED_MODULE_2__.getContainer()

  if (!container) {
    return
  }

  handleBackdropParam(container, params.backdrop)

  handlePositionParam(container, params.position)
  handleGrowParam(container, params.grow)

  // Custom class
  _dom_index_js__WEBPACK_IMPORTED_MODULE_2__.applyCustomClass(container, params, 'container')
}


/***/ }),

/***/ "./node_modules/sweetalert2/src/utils/dom/renderers/renderContent.js":
/*!***************************************************************************!*\
  !*** ./node_modules/sweetalert2/src/utils/dom/renderers/renderContent.js ***!
  \***************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "renderContent": () => (/* binding */ renderContent)
/* harmony export */ });
/* harmony import */ var _dom_index_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../dom/index.js */ "./node_modules/sweetalert2/src/utils/dom/index.js");
/* harmony import */ var _renderInput_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./renderInput.js */ "./node_modules/sweetalert2/src/utils/dom/renderers/renderInput.js");



const renderContent = (instance, params) => {
  const htmlContainer = _dom_index_js__WEBPACK_IMPORTED_MODULE_0__.getHtmlContainer()

  _dom_index_js__WEBPACK_IMPORTED_MODULE_0__.applyCustomClass(htmlContainer, params, 'htmlContainer')

  // Content as HTML
  if (params.html) {
    _dom_index_js__WEBPACK_IMPORTED_MODULE_0__.parseHtmlToContainer(params.html, htmlContainer)
    _dom_index_js__WEBPACK_IMPORTED_MODULE_0__.show(htmlContainer, 'block')

  // Content as plain text
  } else if (params.text) {
    htmlContainer.textContent = params.text
    _dom_index_js__WEBPACK_IMPORTED_MODULE_0__.show(htmlContainer, 'block')

  // No content
  } else {
    _dom_index_js__WEBPACK_IMPORTED_MODULE_0__.hide(htmlContainer)
  }

  (0,_renderInput_js__WEBPACK_IMPORTED_MODULE_1__.renderInput)(instance, params)
}


/***/ }),

/***/ "./node_modules/sweetalert2/src/utils/dom/renderers/renderFooter.js":
/*!**************************************************************************!*\
  !*** ./node_modules/sweetalert2/src/utils/dom/renderers/renderFooter.js ***!
  \**************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "renderFooter": () => (/* binding */ renderFooter)
/* harmony export */ });
/* harmony import */ var _dom_index_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../dom/index.js */ "./node_modules/sweetalert2/src/utils/dom/index.js");


const renderFooter = (instance, params) => {
  const footer = _dom_index_js__WEBPACK_IMPORTED_MODULE_0__.getFooter()

  _dom_index_js__WEBPACK_IMPORTED_MODULE_0__.toggle(footer, params.footer)

  if (params.footer) {
    _dom_index_js__WEBPACK_IMPORTED_MODULE_0__.parseHtmlToContainer(params.footer, footer)
  }

  // Custom class
  _dom_index_js__WEBPACK_IMPORTED_MODULE_0__.applyCustomClass(footer, params, 'footer')
}


/***/ }),

/***/ "./node_modules/sweetalert2/src/utils/dom/renderers/renderIcon.js":
/*!************************************************************************!*\
  !*** ./node_modules/sweetalert2/src/utils/dom/renderers/renderIcon.js ***!
  \************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "renderIcon": () => (/* binding */ renderIcon)
/* harmony export */ });
/* harmony import */ var _classes_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../classes.js */ "./node_modules/sweetalert2/src/utils/classes.js");
/* harmony import */ var _utils_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../utils.js */ "./node_modules/sweetalert2/src/utils/utils.js");
/* harmony import */ var _dom_index_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../dom/index.js */ "./node_modules/sweetalert2/src/utils/dom/index.js");
/* harmony import */ var _privateProps_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../privateProps.js */ "./node_modules/sweetalert2/src/privateProps.js");





const renderIcon = (instance, params) => {
  const innerParams = _privateProps_js__WEBPACK_IMPORTED_MODULE_3__["default"].innerParams.get(instance)
  const icon = _dom_index_js__WEBPACK_IMPORTED_MODULE_2__.getIcon()

  // if the given icon already rendered, apply the styling without re-rendering the icon
  if (innerParams && params.icon === innerParams.icon) {
    // Custom or default content
    setContent(icon, params)

    applyStyles(icon, params)
    return
  }

  if (!params.icon && !params.iconHtml) {
    return _dom_index_js__WEBPACK_IMPORTED_MODULE_2__.hide(icon)
  }

  if (params.icon && Object.keys(_classes_js__WEBPACK_IMPORTED_MODULE_0__.iconTypes).indexOf(params.icon) === -1) {
    (0,_utils_js__WEBPACK_IMPORTED_MODULE_1__.error)(`Unknown icon! Expected "success", "error", "warning", "info" or "question", got "${params.icon}"`)
    return _dom_index_js__WEBPACK_IMPORTED_MODULE_2__.hide(icon)
  }

  _dom_index_js__WEBPACK_IMPORTED_MODULE_2__.show(icon)

  // Custom or default content
  setContent(icon, params)

  applyStyles(icon, params)

  // Animate icon
  _dom_index_js__WEBPACK_IMPORTED_MODULE_2__.addClass(icon, params.showClass.icon)
}

const applyStyles = (icon, params) => {
  for (const iconType in _classes_js__WEBPACK_IMPORTED_MODULE_0__.iconTypes) {
    if (params.icon !== iconType) {
      _dom_index_js__WEBPACK_IMPORTED_MODULE_2__.removeClass(icon, _classes_js__WEBPACK_IMPORTED_MODULE_0__.iconTypes[iconType])
    }
  }
  _dom_index_js__WEBPACK_IMPORTED_MODULE_2__.addClass(icon, _classes_js__WEBPACK_IMPORTED_MODULE_0__.iconTypes[params.icon])

  // Icon color
  setColor(icon, params)

  // Success icon background color
  adjustSuccessIconBackgoundColor()

  // Custom class
  _dom_index_js__WEBPACK_IMPORTED_MODULE_2__.applyCustomClass(icon, params, 'icon')
}

// Adjust success icon background color to match the popup background color
const adjustSuccessIconBackgoundColor = () => {
  const popup = _dom_index_js__WEBPACK_IMPORTED_MODULE_2__.getPopup()
  const popupBackgroundColor = window.getComputedStyle(popup).getPropertyValue('background-color')
  const successIconParts = popup.querySelectorAll('[class^=swal2-success-circular-line], .swal2-success-fix')
  for (let i = 0; i < successIconParts.length; i++) {
    successIconParts[i].style.backgroundColor = popupBackgroundColor
  }
}

const setContent = (icon, params) => {
  icon.textContent = ''

  if (params.iconHtml) {
    _dom_index_js__WEBPACK_IMPORTED_MODULE_2__.setInnerHtml(icon, iconContent(params.iconHtml))
  } else if (params.icon === 'success') {
    _dom_index_js__WEBPACK_IMPORTED_MODULE_2__.setInnerHtml(icon, `
      <div class="swal2-success-circular-line-left"></div>
      <span class="swal2-success-line-tip"></span> <span class="swal2-success-line-long"></span>
      <div class="swal2-success-ring"></div> <div class="swal2-success-fix"></div>
      <div class="swal2-success-circular-line-right"></div>
    `)
  } else if (params.icon === 'error') {
    _dom_index_js__WEBPACK_IMPORTED_MODULE_2__.setInnerHtml(icon, `
      <span class="swal2-x-mark">
        <span class="swal2-x-mark-line-left"></span>
        <span class="swal2-x-mark-line-right"></span>
      </span>
    `)
  } else {
    const defaultIconHtml = {
      question: '?',
      warning: '!',
      info: 'i'
    }
    _dom_index_js__WEBPACK_IMPORTED_MODULE_2__.setInnerHtml(icon, iconContent(defaultIconHtml[params.icon]))
  }
}

const setColor = (icon, params) => {
  if (!params.iconColor) {
    return
  }
  icon.style.color = params.iconColor
  icon.style.borderColor = params.iconColor
  for (const sel of ['.swal2-success-line-tip', '.swal2-success-line-long', '.swal2-x-mark-line-left', '.swal2-x-mark-line-right']) {
    _dom_index_js__WEBPACK_IMPORTED_MODULE_2__.setStyle(icon, sel, 'backgroundColor', params.iconColor)
  }
  _dom_index_js__WEBPACK_IMPORTED_MODULE_2__.setStyle(icon, '.swal2-success-ring', 'borderColor', params.iconColor)
}

const iconContent = (content) => `<div class="${_classes_js__WEBPACK_IMPORTED_MODULE_0__.swalClasses["icon-content"]}">${content}</div>`


/***/ }),

/***/ "./node_modules/sweetalert2/src/utils/dom/renderers/renderImage.js":
/*!*************************************************************************!*\
  !*** ./node_modules/sweetalert2/src/utils/dom/renderers/renderImage.js ***!
  \*************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "renderImage": () => (/* binding */ renderImage)
/* harmony export */ });
/* harmony import */ var _classes_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../classes.js */ "./node_modules/sweetalert2/src/utils/classes.js");
/* harmony import */ var _dom_index_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../dom/index.js */ "./node_modules/sweetalert2/src/utils/dom/index.js");



const renderImage = (instance, params) => {
  const image = _dom_index_js__WEBPACK_IMPORTED_MODULE_1__.getImage()

  if (!params.imageUrl) {
    return _dom_index_js__WEBPACK_IMPORTED_MODULE_1__.hide(image)
  }

  _dom_index_js__WEBPACK_IMPORTED_MODULE_1__.show(image, '')

  // Src, alt
  image.setAttribute('src', params.imageUrl)
  image.setAttribute('alt', params.imageAlt)

  // Width, height
  _dom_index_js__WEBPACK_IMPORTED_MODULE_1__.applyNumericalStyle(image, 'width', params.imageWidth)
  _dom_index_js__WEBPACK_IMPORTED_MODULE_1__.applyNumericalStyle(image, 'height', params.imageHeight)

  // Class
  image.className = _classes_js__WEBPACK_IMPORTED_MODULE_0__.swalClasses.image
  _dom_index_js__WEBPACK_IMPORTED_MODULE_1__.applyCustomClass(image, params, 'image')
}


/***/ }),

/***/ "./node_modules/sweetalert2/src/utils/dom/renderers/renderInput.js":
/*!*************************************************************************!*\
  !*** ./node_modules/sweetalert2/src/utils/dom/renderers/renderInput.js ***!
  \*************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "renderInput": () => (/* binding */ renderInput)
/* harmony export */ });
/* harmony import */ var _classes_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../classes.js */ "./node_modules/sweetalert2/src/utils/classes.js");
/* harmony import */ var _utils_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../utils.js */ "./node_modules/sweetalert2/src/utils/utils.js");
/* harmony import */ var _dom_index_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../dom/index.js */ "./node_modules/sweetalert2/src/utils/dom/index.js");
/* harmony import */ var _privateProps_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../privateProps.js */ "./node_modules/sweetalert2/src/privateProps.js");





const inputTypes = ['input', 'file', 'range', 'select', 'radio', 'checkbox', 'textarea']

const renderInput = (instance, params) => {
  const popup = _dom_index_js__WEBPACK_IMPORTED_MODULE_2__.getPopup()
  const innerParams = _privateProps_js__WEBPACK_IMPORTED_MODULE_3__["default"].innerParams.get(instance)
  const rerender = !innerParams || params.input !== innerParams.input

  inputTypes.forEach((inputType) => {
    const inputClass = _classes_js__WEBPACK_IMPORTED_MODULE_0__.swalClasses[inputType]
    const inputContainer = _dom_index_js__WEBPACK_IMPORTED_MODULE_2__.getChildByClass(popup, inputClass)

    // set attributes
    setAttributes(inputType, params.inputAttributes)

    // set class
    inputContainer.className = inputClass

    if (rerender) {
      _dom_index_js__WEBPACK_IMPORTED_MODULE_2__.hide(inputContainer)
    }
  })

  if (params.input) {
    if (rerender) {
      showInput(params)
    }
    // set custom class
    setCustomClass(params)
  }
}

const showInput = (params) => {
  if (!renderInputType[params.input]) {
    return (0,_utils_js__WEBPACK_IMPORTED_MODULE_1__.error)(`Unexpected type of input! Expected "text", "email", "password", "number", "tel", "select", "radio", "checkbox", "textarea", "file" or "url", got "${params.input}"`)
  }

  const inputContainer = getInputContainer(params.input)
  const input = renderInputType[params.input](inputContainer, params)
  _dom_index_js__WEBPACK_IMPORTED_MODULE_2__.show(input)

  // input autofocus
  setTimeout(() => {
    _dom_index_js__WEBPACK_IMPORTED_MODULE_2__.focusInput(input)
  })
}

const removeAttributes = (input) => {
  for (let i = 0; i < input.attributes.length; i++) {
    const attrName = input.attributes[i].name
    if (!['type', 'value', 'style'].includes(attrName)) {
      input.removeAttribute(attrName)
    }
  }
}

const setAttributes = (inputType, inputAttributes) => {
  const input = _dom_index_js__WEBPACK_IMPORTED_MODULE_2__.getInput(_dom_index_js__WEBPACK_IMPORTED_MODULE_2__.getPopup(), inputType)
  if (!input) {
    return
  }

  removeAttributes(input)

  for (const attr in inputAttributes) {
    input.setAttribute(attr, inputAttributes[attr])
  }
}

const setCustomClass = (params) => {
  const inputContainer = getInputContainer(params.input)
  if (params.customClass) {
    _dom_index_js__WEBPACK_IMPORTED_MODULE_2__.addClass(inputContainer, params.customClass.input)
  }
}

const setInputPlaceholder = (input, params) => {
  if (!input.placeholder || params.inputPlaceholder) {
    input.placeholder = params.inputPlaceholder
  }
}

const setInputLabel = (input, prependTo, params) => {
  if (params.inputLabel) {
    input.id = _classes_js__WEBPACK_IMPORTED_MODULE_0__.swalClasses.input
    const label = document.createElement('label')
    const labelClass = _classes_js__WEBPACK_IMPORTED_MODULE_0__.swalClasses["input-label"]
    label.setAttribute('for', input.id)
    label.className = labelClass
    _dom_index_js__WEBPACK_IMPORTED_MODULE_2__.addClass(label, params.customClass.inputLabel)
    label.innerText = params.inputLabel
    prependTo.insertAdjacentElement('beforebegin', label)
  }
}

const getInputContainer = (inputType) => {
  const inputClass = _classes_js__WEBPACK_IMPORTED_MODULE_0__.swalClasses[inputType] ? _classes_js__WEBPACK_IMPORTED_MODULE_0__.swalClasses[inputType] : _classes_js__WEBPACK_IMPORTED_MODULE_0__.swalClasses.input
  return _dom_index_js__WEBPACK_IMPORTED_MODULE_2__.getChildByClass(_dom_index_js__WEBPACK_IMPORTED_MODULE_2__.getPopup(), inputClass)
}

const renderInputType = {}

renderInputType.text =
renderInputType.email =
renderInputType.password =
renderInputType.number =
renderInputType.tel =
renderInputType.url = (input, params) => {
  if (typeof params.inputValue === 'string' || typeof params.inputValue === 'number') {
    input.value = params.inputValue
  } else if (!(0,_utils_js__WEBPACK_IMPORTED_MODULE_1__.isPromise)(params.inputValue)) {
    (0,_utils_js__WEBPACK_IMPORTED_MODULE_1__.warn)(`Unexpected type of inputValue! Expected "string", "number" or "Promise", got "${typeof params.inputValue}"`)
  }
  setInputLabel(input, input, params)
  setInputPlaceholder(input, params)
  input.type = params.input
  return input
}

renderInputType.file = (input, params) => {
  setInputLabel(input, input, params)
  setInputPlaceholder(input, params)
  return input
}

renderInputType.range = (range, params) => {
  const rangeInput = range.querySelector('input')
  const rangeOutput = range.querySelector('output')
  rangeInput.value = params.inputValue
  rangeInput.type = params.input
  rangeOutput.value = params.inputValue
  setInputLabel(rangeInput, range, params)
  return range
}

renderInputType.select = (select, params) => {
  select.textContent = ''
  if (params.inputPlaceholder) {
    const placeholder = document.createElement('option')
    _dom_index_js__WEBPACK_IMPORTED_MODULE_2__.setInnerHtml(placeholder, params.inputPlaceholder)
    placeholder.value = ''
    placeholder.disabled = true
    placeholder.selected = true
    select.appendChild(placeholder)
  }
  setInputLabel(select, select, params)
  return select
}

renderInputType.radio = (radio) => {
  radio.textContent = ''
  return radio
}

renderInputType.checkbox = (checkboxContainer, params) => {
  const checkbox = _dom_index_js__WEBPACK_IMPORTED_MODULE_2__.getInput(_dom_index_js__WEBPACK_IMPORTED_MODULE_2__.getPopup(), 'checkbox')
  checkbox.value = 1
  checkbox.id = _classes_js__WEBPACK_IMPORTED_MODULE_0__.swalClasses.checkbox
  checkbox.checked = Boolean(params.inputValue)
  const label = checkboxContainer.querySelector('span')
  _dom_index_js__WEBPACK_IMPORTED_MODULE_2__.setInnerHtml(label, params.inputPlaceholder)
  return checkboxContainer
}

renderInputType.textarea = (textarea, params) => {
  textarea.value = params.inputValue
  setInputPlaceholder(textarea, params)
  setInputLabel(textarea, textarea, params)

  const getMargin = (el) => parseInt(window.getComputedStyle(el).marginLeft) + parseInt(window.getComputedStyle(el).marginRight)

  setTimeout(() => { // #2291
    if ('MutationObserver' in window) { // #1699
      const initialPopupWidth = parseInt(window.getComputedStyle(_dom_index_js__WEBPACK_IMPORTED_MODULE_2__.getPopup()).width)
      const textareaResizeHandler = () => {
        const textareaWidth = textarea.offsetWidth + getMargin(textarea)
        if (textareaWidth > initialPopupWidth) {
          _dom_index_js__WEBPACK_IMPORTED_MODULE_2__.getPopup().style.width = `${textareaWidth}px`
        } else {
          _dom_index_js__WEBPACK_IMPORTED_MODULE_2__.getPopup().style.width = null
        }
      }
      new MutationObserver(textareaResizeHandler).observe(textarea, {
        attributes: true, attributeFilter: ['style']
      })
    }
  })

  return textarea
}


/***/ }),

/***/ "./node_modules/sweetalert2/src/utils/dom/renderers/renderPopup.js":
/*!*************************************************************************!*\
  !*** ./node_modules/sweetalert2/src/utils/dom/renderers/renderPopup.js ***!
  \*************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "renderPopup": () => (/* binding */ renderPopup)
/* harmony export */ });
/* harmony import */ var _classes_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../classes.js */ "./node_modules/sweetalert2/src/utils/classes.js");
/* harmony import */ var _dom_index_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../dom/index.js */ "./node_modules/sweetalert2/src/utils/dom/index.js");



const renderPopup = (instance, params) => {
  const container = _dom_index_js__WEBPACK_IMPORTED_MODULE_1__.getContainer()
  const popup = _dom_index_js__WEBPACK_IMPORTED_MODULE_1__.getPopup()

  // Width
  if (params.toast) { // #2170
    _dom_index_js__WEBPACK_IMPORTED_MODULE_1__.applyNumericalStyle(container, 'width', params.width)
    popup.style.width = '100%'
    popup.insertBefore(_dom_index_js__WEBPACK_IMPORTED_MODULE_1__.getLoader(), _dom_index_js__WEBPACK_IMPORTED_MODULE_1__.getIcon())
  } else {
    _dom_index_js__WEBPACK_IMPORTED_MODULE_1__.applyNumericalStyle(popup, 'width', params.width)
  }

  // Padding
  _dom_index_js__WEBPACK_IMPORTED_MODULE_1__.applyNumericalStyle(popup, 'padding', params.padding)

  // Background
  if (params.background) {
    popup.style.background = params.background
  }

  _dom_index_js__WEBPACK_IMPORTED_MODULE_1__.hide(_dom_index_js__WEBPACK_IMPORTED_MODULE_1__.getValidationMessage())

  // Classes
  addClasses(popup, params)
}

const addClasses = (popup, params) => {
  // Default Class + showClass when updating Swal.update({})
  popup.className = `${_classes_js__WEBPACK_IMPORTED_MODULE_0__.swalClasses.popup} ${_dom_index_js__WEBPACK_IMPORTED_MODULE_1__.isVisible(popup) ? params.showClass.popup : ''}`

  if (params.toast) {
    _dom_index_js__WEBPACK_IMPORTED_MODULE_1__.addClass([document.documentElement, document.body], _classes_js__WEBPACK_IMPORTED_MODULE_0__.swalClasses["toast-shown"])
    _dom_index_js__WEBPACK_IMPORTED_MODULE_1__.addClass(popup, _classes_js__WEBPACK_IMPORTED_MODULE_0__.swalClasses.toast)
  } else {
    _dom_index_js__WEBPACK_IMPORTED_MODULE_1__.addClass(popup, _classes_js__WEBPACK_IMPORTED_MODULE_0__.swalClasses.modal)
  }

  // Custom class
  _dom_index_js__WEBPACK_IMPORTED_MODULE_1__.applyCustomClass(popup, params, 'popup')
  if (typeof params.customClass === 'string') {
    _dom_index_js__WEBPACK_IMPORTED_MODULE_1__.addClass(popup, params.customClass)
  }

  // Icon class (#1842)
  if (params.icon) {
    _dom_index_js__WEBPACK_IMPORTED_MODULE_1__.addClass(popup, _classes_js__WEBPACK_IMPORTED_MODULE_0__.swalClasses[`icon-${params.icon}`])
  }
}


/***/ }),

/***/ "./node_modules/sweetalert2/src/utils/dom/renderers/renderProgressSteps.js":
/*!*********************************************************************************!*\
  !*** ./node_modules/sweetalert2/src/utils/dom/renderers/renderProgressSteps.js ***!
  \*********************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "renderProgressSteps": () => (/* binding */ renderProgressSteps)
/* harmony export */ });
/* harmony import */ var _classes_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../classes.js */ "./node_modules/sweetalert2/src/utils/classes.js");
/* harmony import */ var _utils_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../utils.js */ "./node_modules/sweetalert2/src/utils/utils.js");
/* harmony import */ var _dom_index_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../dom/index.js */ "./node_modules/sweetalert2/src/utils/dom/index.js");




const createStepElement = (step) => {
  const stepEl = document.createElement('li')
  _dom_index_js__WEBPACK_IMPORTED_MODULE_2__.addClass(stepEl, _classes_js__WEBPACK_IMPORTED_MODULE_0__.swalClasses["progress-step"])
  _dom_index_js__WEBPACK_IMPORTED_MODULE_2__.setInnerHtml(stepEl, step)
  return stepEl
}

const createLineElement = (params) => {
  const lineEl = document.createElement('li')
  _dom_index_js__WEBPACK_IMPORTED_MODULE_2__.addClass(lineEl, _classes_js__WEBPACK_IMPORTED_MODULE_0__.swalClasses["progress-step-line"])
  if (params.progressStepsDistance) {
    lineEl.style.width = params.progressStepsDistance
  }
  return lineEl
}

const renderProgressSteps = (instance, params) => {
  const progressStepsContainer = _dom_index_js__WEBPACK_IMPORTED_MODULE_2__.getProgressSteps()
  if (!params.progressSteps || params.progressSteps.length === 0) {
    return _dom_index_js__WEBPACK_IMPORTED_MODULE_2__.hide(progressStepsContainer)
  }

  _dom_index_js__WEBPACK_IMPORTED_MODULE_2__.show(progressStepsContainer)
  progressStepsContainer.textContent = ''
  if (params.currentProgressStep >= params.progressSteps.length) {
    (0,_utils_js__WEBPACK_IMPORTED_MODULE_1__.warn)(
      'Invalid currentProgressStep parameter, it should be less than progressSteps.length ' +
      '(currentProgressStep like JS arrays starts from 0)'
    )
  }

  params.progressSteps.forEach((step, index) => {
    const stepEl = createStepElement(step)
    progressStepsContainer.appendChild(stepEl)
    if (index === params.currentProgressStep) {
      _dom_index_js__WEBPACK_IMPORTED_MODULE_2__.addClass(stepEl, _classes_js__WEBPACK_IMPORTED_MODULE_0__.swalClasses["active-progress-step"])
    }

    if (index !== params.progressSteps.length - 1) {
      const lineEl = createLineElement(params)
      progressStepsContainer.appendChild(lineEl)
    }
  })
}


/***/ }),

/***/ "./node_modules/sweetalert2/src/utils/dom/renderers/renderTitle.js":
/*!*************************************************************************!*\
  !*** ./node_modules/sweetalert2/src/utils/dom/renderers/renderTitle.js ***!
  \*************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "renderTitle": () => (/* binding */ renderTitle)
/* harmony export */ });
/* harmony import */ var _dom_index_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../dom/index.js */ "./node_modules/sweetalert2/src/utils/dom/index.js");


const renderTitle = (instance, params) => {
  const title = _dom_index_js__WEBPACK_IMPORTED_MODULE_0__.getTitle()

  _dom_index_js__WEBPACK_IMPORTED_MODULE_0__.toggle(title, params.title || params.titleText, 'block')

  if (params.title) {
    _dom_index_js__WEBPACK_IMPORTED_MODULE_0__.parseHtmlToContainer(params.title, title)
  }

  if (params.titleText) {
    title.innerText = params.titleText
  }

  // Custom class
  _dom_index_js__WEBPACK_IMPORTED_MODULE_0__.applyCustomClass(title, params, 'title')
}


/***/ }),

/***/ "./node_modules/sweetalert2/src/utils/getTemplateParams.js":
/*!*****************************************************************!*\
  !*** ./node_modules/sweetalert2/src/utils/getTemplateParams.js ***!
  \*****************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "getTemplateParams": () => (/* binding */ getTemplateParams)
/* harmony export */ });
/* harmony import */ var _params_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./params.js */ "./node_modules/sweetalert2/src/utils/params.js");
/* harmony import */ var _utils_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./utils.js */ "./node_modules/sweetalert2/src/utils/utils.js");



const swalStringParams = ['swal-title', 'swal-html', 'swal-footer']

const getTemplateParams = (params) => {
  const template = typeof params.template === 'string' ? document.querySelector(params.template) : params.template
  if (!template) {
    return {}
  }
  const templateContent = template.content

  showWarningsForElements(templateContent)

  const result = Object.assign(
    getSwalParams(templateContent),
    getSwalButtons(templateContent),
    getSwalImage(templateContent),
    getSwalIcon(templateContent),
    getSwalInput(templateContent),
    getSwalStringParams(templateContent, swalStringParams),
  )
  return result
}

const getSwalParams = (templateContent) => {
  const result = {}
  ;(0,_utils_js__WEBPACK_IMPORTED_MODULE_1__.toArray)(templateContent.querySelectorAll('swal-param')).forEach((param) => {
    showWarningsForAttributes(param, ['name', 'value'])
    const paramName = param.getAttribute('name')
    let value = param.getAttribute('value')
    if (typeof _params_js__WEBPACK_IMPORTED_MODULE_0__["default"][paramName] === 'boolean' && value === 'false') {
      value = false
    }
    if (typeof _params_js__WEBPACK_IMPORTED_MODULE_0__["default"][paramName] === 'object') {
      value = JSON.parse(value)
    }
    result[paramName] = value
  })
  return result
}

const getSwalButtons = (templateContent) => {
  const result = {}
  ;(0,_utils_js__WEBPACK_IMPORTED_MODULE_1__.toArray)(templateContent.querySelectorAll('swal-button')).forEach((button) => {
    showWarningsForAttributes(button, ['type', 'color', 'aria-label'])
    const type = button.getAttribute('type')
    result[`${type}ButtonText`] = button.innerHTML
    result[`show${(0,_utils_js__WEBPACK_IMPORTED_MODULE_1__.capitalizeFirstLetter)(type)}Button`] = true
    if (button.hasAttribute('color')) {
      result[`${type}ButtonColor`] = button.getAttribute('color')
    }
    if (button.hasAttribute('aria-label')) {
      result[`${type}ButtonAriaLabel`] = button.getAttribute('aria-label')
    }
  })
  return result
}

const getSwalImage = (templateContent) => {
  const result = {}
  const image = templateContent.querySelector('swal-image')
  if (image) {
    showWarningsForAttributes(image, ['src', 'width', 'height', 'alt'])
    if (image.hasAttribute('src')) {
      result.imageUrl = image.getAttribute('src')
    }
    if (image.hasAttribute('width')) {
      result.imageWidth = image.getAttribute('width')
    }
    if (image.hasAttribute('height')) {
      result.imageHeight = image.getAttribute('height')
    }
    if (image.hasAttribute('alt')) {
      result.imageAlt = image.getAttribute('alt')
    }
  }
  return result
}

const getSwalIcon = (templateContent) => {
  const result = {}
  const icon = templateContent.querySelector('swal-icon')
  if (icon) {
    showWarningsForAttributes(icon, ['type', 'color'])
    if (icon.hasAttribute('type')) {
      result.icon = icon.getAttribute('type')
    }
    if (icon.hasAttribute('color')) {
      result.iconColor = icon.getAttribute('color')
    }
    result.iconHtml = icon.innerHTML
  }
  return result
}

const getSwalInput = (templateContent) => {
  const result = {}
  const input = templateContent.querySelector('swal-input')
  if (input) {
    showWarningsForAttributes(input, ['type', 'label', 'placeholder', 'value'])
    result.input = input.getAttribute('type') || 'text'
    if (input.hasAttribute('label')) {
      result.inputLabel = input.getAttribute('label')
    }
    if (input.hasAttribute('placeholder')) {
      result.inputPlaceholder = input.getAttribute('placeholder')
    }
    if (input.hasAttribute('value')) {
      result.inputValue = input.getAttribute('value')
    }
  }
  const inputOptions = templateContent.querySelectorAll('swal-input-option')
  if (inputOptions.length) {
    result.inputOptions = {}
    ;(0,_utils_js__WEBPACK_IMPORTED_MODULE_1__.toArray)(inputOptions).forEach((option) => {
      showWarningsForAttributes(option, ['value'])
      const optionValue = option.getAttribute('value')
      const optionName = option.innerHTML
      result.inputOptions[optionValue] = optionName
    })
  }
  return result
}

const getSwalStringParams = (templateContent, paramNames) => {
  const result = {}
  for (const i in paramNames) {
    const paramName = paramNames[i]
    const tag = templateContent.querySelector(paramName)
    if (tag) {
      showWarningsForAttributes(tag, [])
      result[paramName.replace(/^swal-/, '')] = tag.innerHTML.trim()
    }
  }
  return result
}

const showWarningsForElements = (template) => {
  const allowedElements = swalStringParams.concat([
    'swal-param',
    'swal-button',
    'swal-image',
    'swal-icon',
    'swal-input',
    'swal-input-option',
  ])
  ;(0,_utils_js__WEBPACK_IMPORTED_MODULE_1__.toArray)(template.children).forEach((el) => {
    const tagName = el.tagName.toLowerCase()
    if (allowedElements.indexOf(tagName) === -1) {
      (0,_utils_js__WEBPACK_IMPORTED_MODULE_1__.warn)(`Unrecognized element <${tagName}>`)
    }
  })
}

const showWarningsForAttributes = (el, allowedAttributes) => {
  ;(0,_utils_js__WEBPACK_IMPORTED_MODULE_1__.toArray)(el.attributes).forEach((attribute) => {
    if (allowedAttributes.indexOf(attribute.name) === -1) {
      (0,_utils_js__WEBPACK_IMPORTED_MODULE_1__.warn)([
        `Unrecognized attribute "${attribute.name}" on <${el.tagName.toLowerCase()}>.`,
        `${allowedAttributes.length ? `Allowed attributes are: ${allowedAttributes.join(', ')}` : 'To set the value, use HTML within the element.'}`
      ])
    }
  })
}


/***/ }),

/***/ "./node_modules/sweetalert2/src/utils/iosFix.js":
/*!******************************************************!*\
  !*** ./node_modules/sweetalert2/src/utils/iosFix.js ***!
  \******************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "iOSfix": () => (/* binding */ iOSfix),
/* harmony export */   "undoIOSfix": () => (/* binding */ undoIOSfix)
/* harmony export */ });
/* harmony import */ var _dom_index_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./dom/index.js */ "./node_modules/sweetalert2/src/utils/dom/index.js");
/* harmony import */ var _utils_classes_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../utils/classes.js */ "./node_modules/sweetalert2/src/utils/classes.js");
/* istanbul ignore file */



// Fix iOS scrolling http://stackoverflow.com/q/39626302

const iOSfix = () => {
  const iOS = (/iPad|iPhone|iPod/.test(navigator.userAgent) && !window.MSStream) || (navigator.platform === 'MacIntel' && navigator.maxTouchPoints > 1)
  if (iOS && !_dom_index_js__WEBPACK_IMPORTED_MODULE_0__.hasClass(document.body, _utils_classes_js__WEBPACK_IMPORTED_MODULE_1__.swalClasses.iosfix)) {
    const offset = document.body.scrollTop
    document.body.style.top = `${offset * -1}px`
    _dom_index_js__WEBPACK_IMPORTED_MODULE_0__.addClass(document.body, _utils_classes_js__WEBPACK_IMPORTED_MODULE_1__.swalClasses.iosfix)
    lockBodyScroll()
    addBottomPaddingForTallPopups() // #1948
  }
}

const addBottomPaddingForTallPopups = () => {
  const safari = !navigator.userAgent.match(/(CriOS|FxiOS|EdgiOS|YaBrowser|UCBrowser)/i)
  if (safari) {
    const bottomPanelHeight = 44
    if (_dom_index_js__WEBPACK_IMPORTED_MODULE_0__.getPopup().scrollHeight > window.innerHeight - bottomPanelHeight) {
      _dom_index_js__WEBPACK_IMPORTED_MODULE_0__.getContainer().style.paddingBottom = `${bottomPanelHeight}px`
    }
  }
}

const lockBodyScroll = () => { // #1246
  const container = _dom_index_js__WEBPACK_IMPORTED_MODULE_0__.getContainer()
  let preventTouchMove
  container.ontouchstart = (e) => {
    preventTouchMove = shouldPreventTouchMove(e)
  }
  container.ontouchmove = (e) => {
    if (preventTouchMove) {
      e.preventDefault()
      e.stopPropagation()
    }
  }
}

const shouldPreventTouchMove = (event) => {
  const target = event.target
  const container = _dom_index_js__WEBPACK_IMPORTED_MODULE_0__.getContainer()
  if (isStylys(event) || isZoom(event)) {
    return false
  }
  if (target === container) {
    return true
  }
  if (
    !_dom_index_js__WEBPACK_IMPORTED_MODULE_0__.isScrollable(container) &&
    target.tagName !== 'INPUT' && // #1603
    target.tagName !== 'TEXTAREA' && // #2266
    !(
      _dom_index_js__WEBPACK_IMPORTED_MODULE_0__.isScrollable(_dom_index_js__WEBPACK_IMPORTED_MODULE_0__.getHtmlContainer()) && // #1944
      _dom_index_js__WEBPACK_IMPORTED_MODULE_0__.getHtmlContainer().contains(target)
    )
  ) {
    return true
  }
  return false
}

const isStylys = (event) => { // #1786
  return event.touches && event.touches.length && event.touches[0].touchType === 'stylus'
}

const isZoom = (event) => { // #1891
  return event.touches && event.touches.length > 1
}

const undoIOSfix = () => {
  if (_dom_index_js__WEBPACK_IMPORTED_MODULE_0__.hasClass(document.body, _utils_classes_js__WEBPACK_IMPORTED_MODULE_1__.swalClasses.iosfix)) {
    const offset = parseInt(document.body.style.top, 10)
    _dom_index_js__WEBPACK_IMPORTED_MODULE_0__.removeClass(document.body, _utils_classes_js__WEBPACK_IMPORTED_MODULE_1__.swalClasses.iosfix)
    document.body.style.top = ''
    document.body.scrollTop = (offset * -1)
  }
}


/***/ }),

/***/ "./node_modules/sweetalert2/src/utils/isNodeEnv.js":
/*!*********************************************************!*\
  !*** ./node_modules/sweetalert2/src/utils/isNodeEnv.js ***!
  \*********************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "isNodeEnv": () => (/* binding */ isNodeEnv)
/* harmony export */ });
// Detect Node env
const isNodeEnv = () => typeof window === 'undefined' || typeof document === 'undefined'


/***/ }),

/***/ "./node_modules/sweetalert2/src/utils/openPopup.js":
/*!*********************************************************!*\
  !*** ./node_modules/sweetalert2/src/utils/openPopup.js ***!
  \*********************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "SHOW_CLASS_TIMEOUT": () => (/* binding */ SHOW_CLASS_TIMEOUT),
/* harmony export */   "openPopup": () => (/* binding */ openPopup)
/* harmony export */ });
/* harmony import */ var _dom_index_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./dom/index.js */ "./node_modules/sweetalert2/src/utils/dom/index.js");
/* harmony import */ var _classes_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./classes.js */ "./node_modules/sweetalert2/src/utils/classes.js");
/* harmony import */ var _scrollbarFix_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./scrollbarFix.js */ "./node_modules/sweetalert2/src/utils/scrollbarFix.js");
/* harmony import */ var _iosFix_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./iosFix.js */ "./node_modules/sweetalert2/src/utils/iosFix.js");
/* harmony import */ var _aria_js__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./aria.js */ "./node_modules/sweetalert2/src/utils/aria.js");
/* harmony import */ var _globalState_js__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ../globalState.js */ "./node_modules/sweetalert2/src/globalState.js");







const SHOW_CLASS_TIMEOUT = 10

/**
 * Open popup, add necessary classes and styles, fix scrollbar
 *
 * @param params
 */
const openPopup = (params) => {
  const container = _dom_index_js__WEBPACK_IMPORTED_MODULE_0__.getContainer()
  const popup = _dom_index_js__WEBPACK_IMPORTED_MODULE_0__.getPopup()

  if (typeof params.willOpen === 'function') {
    params.willOpen(popup)
  }

  const bodyStyles = window.getComputedStyle(document.body)
  const initialBodyOverflow = bodyStyles.overflowY
  addClasses(container, popup, params)

  // scrolling is 'hidden' until animation is done, after that 'auto'
  setTimeout(() => {
    setScrollingVisibility(container, popup)
  }, SHOW_CLASS_TIMEOUT)

  if (_dom_index_js__WEBPACK_IMPORTED_MODULE_0__.isModal()) {
    fixScrollContainer(container, params.scrollbarPadding, initialBodyOverflow)
    ;(0,_aria_js__WEBPACK_IMPORTED_MODULE_4__.setAriaHidden)()
  }

  if (!_dom_index_js__WEBPACK_IMPORTED_MODULE_0__.isToast() && !_globalState_js__WEBPACK_IMPORTED_MODULE_5__["default"].previousActiveElement) {
    _globalState_js__WEBPACK_IMPORTED_MODULE_5__["default"].previousActiveElement = document.activeElement
  }

  if (typeof params.didOpen === 'function') {
    setTimeout(() => params.didOpen(popup))
  }

  _dom_index_js__WEBPACK_IMPORTED_MODULE_0__.removeClass(container, _classes_js__WEBPACK_IMPORTED_MODULE_1__.swalClasses["no-transition"])
}

const swalOpenAnimationFinished = (event) => {
  const popup = _dom_index_js__WEBPACK_IMPORTED_MODULE_0__.getPopup()
  if (event.target !== popup) {
    return
  }
  const container = _dom_index_js__WEBPACK_IMPORTED_MODULE_0__.getContainer()
  popup.removeEventListener(_dom_index_js__WEBPACK_IMPORTED_MODULE_0__.animationEndEvent, swalOpenAnimationFinished)
  container.style.overflowY = 'auto'
}

const setScrollingVisibility = (container, popup) => {
  if (_dom_index_js__WEBPACK_IMPORTED_MODULE_0__.animationEndEvent && _dom_index_js__WEBPACK_IMPORTED_MODULE_0__.hasCssAnimation(popup)) {
    container.style.overflowY = 'hidden'
    popup.addEventListener(_dom_index_js__WEBPACK_IMPORTED_MODULE_0__.animationEndEvent, swalOpenAnimationFinished)
  } else {
    container.style.overflowY = 'auto'
  }
}

const fixScrollContainer = (container, scrollbarPadding, initialBodyOverflow) => {
  ;(0,_iosFix_js__WEBPACK_IMPORTED_MODULE_3__.iOSfix)()

  if (scrollbarPadding && initialBodyOverflow !== 'hidden') {
    (0,_scrollbarFix_js__WEBPACK_IMPORTED_MODULE_2__.fixScrollbar)()
  }

  // sweetalert2/issues/1247
  setTimeout(() => {
    container.scrollTop = 0
  })
}

const addClasses = (container, popup, params) => {
  _dom_index_js__WEBPACK_IMPORTED_MODULE_0__.addClass(container, params.showClass.backdrop)
  // the workaround with setting/unsetting opacity is needed for #2019 and 2059
  popup.style.setProperty('opacity', '0', 'important')
  _dom_index_js__WEBPACK_IMPORTED_MODULE_0__.show(popup, 'grid')
  setTimeout(() => {
    // Animate popup right after showing it
    _dom_index_js__WEBPACK_IMPORTED_MODULE_0__.addClass(popup, params.showClass.popup)
    // and remove the opacity workaround
    popup.style.removeProperty('opacity')
  }, SHOW_CLASS_TIMEOUT) // 10ms in order to fix #2062

  _dom_index_js__WEBPACK_IMPORTED_MODULE_0__.addClass([document.documentElement, document.body], _classes_js__WEBPACK_IMPORTED_MODULE_1__.swalClasses.shown)
  if (params.heightAuto && params.backdrop && !params.toast) {
    _dom_index_js__WEBPACK_IMPORTED_MODULE_0__.addClass([document.documentElement, document.body], _classes_js__WEBPACK_IMPORTED_MODULE_1__.swalClasses["height-auto"])
  }
}


/***/ }),

/***/ "./node_modules/sweetalert2/src/utils/params.js":
/*!******************************************************!*\
  !*** ./node_modules/sweetalert2/src/utils/params.js ***!
  \******************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "defaultParams": () => (/* binding */ defaultParams),
/* harmony export */   "updatableParams": () => (/* binding */ updatableParams),
/* harmony export */   "deprecatedParams": () => (/* binding */ deprecatedParams),
/* harmony export */   "isValidParameter": () => (/* binding */ isValidParameter),
/* harmony export */   "isUpdatableParameter": () => (/* binding */ isUpdatableParameter),
/* harmony export */   "isDeprecatedParameter": () => (/* binding */ isDeprecatedParameter),
/* harmony export */   "showWarningsForParams": () => (/* binding */ showWarningsForParams),
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _utils_utils_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../utils/utils.js */ "./node_modules/sweetalert2/src/utils/utils.js");


const defaultParams = {
  title: '',
  titleText: '',
  text: '',
  html: '',
  footer: '',
  icon: undefined,
  iconColor: undefined,
  iconHtml: undefined,
  template: undefined,
  toast: false,
  showClass: {
    popup: 'swal2-show',
    backdrop: 'swal2-backdrop-show',
    icon: 'swal2-icon-show',
  },
  hideClass: {
    popup: 'swal2-hide',
    backdrop: 'swal2-backdrop-hide',
    icon: 'swal2-icon-hide',
  },
  customClass: {},
  target: 'body',
  backdrop: true,
  heightAuto: true,
  allowOutsideClick: true,
  allowEscapeKey: true,
  allowEnterKey: true,
  stopKeydownPropagation: true,
  keydownListenerCapture: false,
  showConfirmButton: true,
  showDenyButton: false,
  showCancelButton: false,
  preConfirm: undefined,
  preDeny: undefined,
  confirmButtonText: 'OK',
  confirmButtonAriaLabel: '',
  confirmButtonColor: undefined,
  denyButtonText: 'No',
  denyButtonAriaLabel: '',
  denyButtonColor: undefined,
  cancelButtonText: 'Cancel',
  cancelButtonAriaLabel: '',
  cancelButtonColor: undefined,
  buttonsStyling: true,
  reverseButtons: false,
  focusConfirm: true,
  focusDeny: false,
  focusCancel: false,
  returnFocus: true,
  showCloseButton: false,
  closeButtonHtml: '&times;',
  closeButtonAriaLabel: 'Close this dialog',
  loaderHtml: '',
  showLoaderOnConfirm: false,
  showLoaderOnDeny: false,
  imageUrl: undefined,
  imageWidth: undefined,
  imageHeight: undefined,
  imageAlt: '',
  timer: undefined,
  timerProgressBar: false,
  width: undefined,
  padding: undefined,
  background: undefined,
  input: undefined,
  inputPlaceholder: '',
  inputLabel: '',
  inputValue: '',
  inputOptions: {},
  inputAutoTrim: true,
  inputAttributes: {},
  inputValidator: undefined,
  returnInputValueOnDeny: false,
  validationMessage: undefined,
  grow: false,
  position: 'center',
  progressSteps: [],
  currentProgressStep: undefined,
  progressStepsDistance: undefined,
  willOpen: undefined,
  didOpen: undefined,
  didRender: undefined,
  willClose: undefined,
  didClose: undefined,
  didDestroy: undefined,
  scrollbarPadding: true
}

const updatableParams = [
  'allowEscapeKey',
  'allowOutsideClick',
  'background',
  'buttonsStyling',
  'cancelButtonAriaLabel',
  'cancelButtonColor',
  'cancelButtonText',
  'closeButtonAriaLabel',
  'closeButtonHtml',
  'confirmButtonAriaLabel',
  'confirmButtonColor',
  'confirmButtonText',
  'currentProgressStep',
  'customClass',
  'denyButtonAriaLabel',
  'denyButtonColor',
  'denyButtonText',
  'didClose',
  'didDestroy',
  'footer',
  'hideClass',
  'html',
  'icon',
  'iconColor',
  'iconHtml',
  'imageAlt',
  'imageHeight',
  'imageUrl',
  'imageWidth',
  'preConfirm',
  'preDeny',
  'progressSteps',
  'returnFocus',
  'reverseButtons',
  'showCancelButton',
  'showCloseButton',
  'showConfirmButton',
  'showDenyButton',
  'text',
  'title',
  'titleText',
  'willClose',
]

const deprecatedParams = {}

const toastIncompatibleParams = [
  'allowOutsideClick',
  'allowEnterKey',
  'backdrop',
  'focusConfirm',
  'focusDeny',
  'focusCancel',
  'returnFocus',
  'heightAuto',
  'keydownListenerCapture'
]

/**
 * Is valid parameter
 * @param {String} paramName
 */
const isValidParameter = (paramName) => {
  return Object.prototype.hasOwnProperty.call(defaultParams, paramName)
}

/**
 * Is valid parameter for Swal.update() method
 * @param {String} paramName
 */
const isUpdatableParameter = (paramName) => {
  return updatableParams.indexOf(paramName) !== -1
}

/**
 * Is deprecated parameter
 * @param {String} paramName
 */
const isDeprecatedParameter = (paramName) => {
  return deprecatedParams[paramName]
}

const checkIfParamIsValid = (param) => {
  if (!isValidParameter(param)) {
    (0,_utils_utils_js__WEBPACK_IMPORTED_MODULE_0__.warn)(`Unknown parameter "${param}"`)
  }
}

const checkIfToastParamIsValid = (param) => {
  if (toastIncompatibleParams.includes(param)) {
    (0,_utils_utils_js__WEBPACK_IMPORTED_MODULE_0__.warn)(`The parameter "${param}" is incompatible with toasts`)
  }
}

const checkIfParamIsDeprecated = (param) => {
  if (isDeprecatedParameter(param)) {
    (0,_utils_utils_js__WEBPACK_IMPORTED_MODULE_0__.warnAboutDeprecation)(param, isDeprecatedParameter(param))
  }
}

/**
 * Show relevant warnings for given params
 *
 * @param params
 */
const showWarningsForParams = (params) => {
  if (!params.backdrop && params.allowOutsideClick) {
    (0,_utils_utils_js__WEBPACK_IMPORTED_MODULE_0__.warn)('"allowOutsideClick" parameter requires `backdrop` parameter to be set to `true`')
  }

  for (const param in params) {
    checkIfParamIsValid(param)

    if (params.toast) {
      checkIfToastParamIsValid(param)
    }

    checkIfParamIsDeprecated(param)
  }
}

/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (defaultParams);


/***/ }),

/***/ "./node_modules/sweetalert2/src/utils/scrollbarFix.js":
/*!************************************************************!*\
  !*** ./node_modules/sweetalert2/src/utils/scrollbarFix.js ***!
  \************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "fixScrollbar": () => (/* binding */ fixScrollbar),
/* harmony export */   "undoScrollbar": () => (/* binding */ undoScrollbar)
/* harmony export */ });
/* harmony import */ var _dom_index_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./dom/index.js */ "./node_modules/sweetalert2/src/utils/dom/index.js");


const fixScrollbar = () => {
  // for queues, do not do this more than once
  if (_dom_index_js__WEBPACK_IMPORTED_MODULE_0__.states.previousBodyPadding !== null) {
    return
  }
  // if the body has overflow
  if (document.body.scrollHeight > window.innerHeight) {
    // add padding so the content doesn't shift after removal of scrollbar
    _dom_index_js__WEBPACK_IMPORTED_MODULE_0__.states.previousBodyPadding = parseInt(window.getComputedStyle(document.body).getPropertyValue('padding-right'))
    document.body.style.paddingRight = `${_dom_index_js__WEBPACK_IMPORTED_MODULE_0__.states.previousBodyPadding + _dom_index_js__WEBPACK_IMPORTED_MODULE_0__.measureScrollbar()}px`
  }
}

const undoScrollbar = () => {
  if (_dom_index_js__WEBPACK_IMPORTED_MODULE_0__.states.previousBodyPadding !== null) {
    document.body.style.paddingRight = `${_dom_index_js__WEBPACK_IMPORTED_MODULE_0__.states.previousBodyPadding}px`
    _dom_index_js__WEBPACK_IMPORTED_MODULE_0__.states.previousBodyPadding = null
  }
}


/***/ }),

/***/ "./node_modules/sweetalert2/src/utils/setParameters.js":
/*!*************************************************************!*\
  !*** ./node_modules/sweetalert2/src/utils/setParameters.js ***!
  \*************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ setParameters)
/* harmony export */ });
/* harmony import */ var _utils_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./utils.js */ "./node_modules/sweetalert2/src/utils/utils.js");
/* harmony import */ var _dom_index_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./dom/index.js */ "./node_modules/sweetalert2/src/utils/dom/index.js");
/* harmony import */ var _defaultInputValidators_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./defaultInputValidators.js */ "./node_modules/sweetalert2/src/utils/defaultInputValidators.js");




function setDefaultInputValidators (params) {
  // Use default `inputValidator` for supported input types if not provided
  if (!params.inputValidator) {
    Object.keys(_defaultInputValidators_js__WEBPACK_IMPORTED_MODULE_2__["default"]).forEach((key) => {
      if (params.input === key) {
        params.inputValidator = _defaultInputValidators_js__WEBPACK_IMPORTED_MODULE_2__["default"][key]
      }
    })
  }
}

function validateCustomTargetElement (params) {
  // Determine if the custom target element is valid
  if (
    !params.target ||
    (typeof params.target === 'string' && !document.querySelector(params.target)) ||
    (typeof params.target !== 'string' && !params.target.appendChild)
  ) {
    (0,_utils_js__WEBPACK_IMPORTED_MODULE_0__.warn)('Target parameter is not valid, defaulting to "body"')
    params.target = 'body'
  }
}

/**
 * Set type, text and actions on popup
 *
 * @param params
 * @returns {boolean}
 */
function setParameters (params) {
  setDefaultInputValidators(params)

  // showLoaderOnConfirm && preConfirm
  if (params.showLoaderOnConfirm && !params.preConfirm) {
    (0,_utils_js__WEBPACK_IMPORTED_MODULE_0__.warn)(
      'showLoaderOnConfirm is set to true, but preConfirm is not defined.\n' +
      'showLoaderOnConfirm should be used together with preConfirm, see usage example:\n' +
      'https://sweetalert2.github.io/#ajax-request'
    )
  }

  validateCustomTargetElement(params)

  // Replace newlines with <br> in title
  if (typeof params.title === 'string') {
    params.title = params.title.split('\n').join('<br />')
  }

  _dom_index_js__WEBPACK_IMPORTED_MODULE_1__.init(params)
}


/***/ }),

/***/ "./node_modules/sweetalert2/src/utils/utils.js":
/*!*****************************************************!*\
  !*** ./node_modules/sweetalert2/src/utils/utils.js ***!
  \*****************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "consolePrefix": () => (/* binding */ consolePrefix),
/* harmony export */   "uniqueArray": () => (/* binding */ uniqueArray),
/* harmony export */   "capitalizeFirstLetter": () => (/* binding */ capitalizeFirstLetter),
/* harmony export */   "toArray": () => (/* binding */ toArray),
/* harmony export */   "warn": () => (/* binding */ warn),
/* harmony export */   "error": () => (/* binding */ error),
/* harmony export */   "warnOnce": () => (/* binding */ warnOnce),
/* harmony export */   "warnAboutDeprecation": () => (/* binding */ warnAboutDeprecation),
/* harmony export */   "callIfFunction": () => (/* binding */ callIfFunction),
/* harmony export */   "hasToPromiseFn": () => (/* binding */ hasToPromiseFn),
/* harmony export */   "asPromise": () => (/* binding */ asPromise),
/* harmony export */   "isPromise": () => (/* binding */ isPromise)
/* harmony export */ });
const consolePrefix = 'SweetAlert2:'

/**
 * Filter the unique values into a new array
 * @param arr
 */
const uniqueArray = (arr) => {
  const result = []
  for (let i = 0; i < arr.length; i++) {
    if (result.indexOf(arr[i]) === -1) {
      result.push(arr[i])
    }
  }
  return result
}

/**
 * Capitalize the first letter of a string
 * @param str
 */
const capitalizeFirstLetter = (str) => str.charAt(0).toUpperCase() + str.slice(1)

/**
 * Convert NodeList to Array
 * @param nodeList
 */
const toArray = (nodeList) => Array.prototype.slice.call(nodeList)

/**
 * Standardise console warnings
 * @param message
 */
const warn = (message) => {
  console.warn(`${consolePrefix} ${typeof message === 'object' ? message.join(' ') : message}`)
}

/**
 * Standardise console errors
 * @param message
 */
const error = (message) => {
  console.error(`${consolePrefix} ${message}`)
}

/**
 * Private global state for `warnOnce`
 * @type {Array}
 * @private
 */
const previousWarnOnceMessages = []

/**
 * Show a console warning, but only if it hasn't already been shown
 * @param message
 */
const warnOnce = (message) => {
  if (!previousWarnOnceMessages.includes(message)) {
    previousWarnOnceMessages.push(message)
    warn(message)
  }
}

/**
 * Show a one-time console warning about deprecated params/methods
 */
const warnAboutDeprecation = (deprecatedParam, useInstead) => {
  warnOnce(`"${deprecatedParam}" is deprecated and will be removed in the next major release. Please use "${useInstead}" instead.`)
}

/**
 * If `arg` is a function, call it (with no arguments or context) and return the result.
 * Otherwise, just pass the value through
 * @param arg
 */
const callIfFunction = (arg) => typeof arg === 'function' ? arg() : arg

const hasToPromiseFn = (arg) => arg && typeof arg.toPromise === 'function'

const asPromise = (arg) => hasToPromiseFn(arg) ? arg.toPromise() : Promise.resolve(arg)

const isPromise = (arg) => arg && Promise.resolve(arg) === arg


/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module is referenced by other modules so it can't be inlined
/******/ 	var __webpack_exports__ = __webpack_require__("./node_modules/sweetalert2/src/sweetalert2.js");
/******/ 	
/******/ })()
;
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiL3BsdWdpbnMvc3dlZXRhbGVydDIvanMvc3dlZXRhbGVydDIuanMiLCJtYXBwaW5ncyI6Ijs7Ozs7Ozs7Ozs7Ozs7Ozs7O0FBQXdEO0FBQ0w7QUFDSTtBQUNYOztBQUU1Qzs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7O0FBRUE7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxLQUFLOztBQUVMO0FBQ0EsSUFBSSxvRUFBd0I7QUFDNUI7O0FBRUE7QUFDQTtBQUNBLG9CQUFvQixvRUFBd0I7QUFDNUM7QUFDQTs7QUFFQTtBQUNBLG9CQUFvQixvRUFBd0I7QUFDNUM7QUFDQTtBQUNBOztBQUVBO0FBQ0Esb0NBQW9DLGdEQUFlOztBQUVuRDtBQUNBLDBCQUEwQiw4Q0FBYTs7QUFFdkM7QUFDQSxZQUFZLGdEQUFlO0FBQzNCO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxDQUFDOztBQUVELDJCQUEyQixrRUFBYTs7QUFFeEM7O0FBRUEsaUVBQWUsVUFBVTs7Ozs7Ozs7Ozs7Ozs7O0FDOURsQjs7Ozs7Ozs7Ozs7Ozs7Ozs7QUNBK0M7O0FBRXREOztBQUVBLGlFQUFlLFdBQVc7O0FBRTFCO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsSUFBSTtBQUNKO0FBQ0E7QUFDQTs7QUFFQTtBQUNPO0FBQ1A7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBLEtBQUssRUFBRSxnRUFBcUI7O0FBRTVCO0FBQ0EsR0FBRztBQUNIOzs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7QUMvQmdEO0FBQ0g7QUFDSDtBQUNrQjtBQUNMO0FBQ0o7QUFDVDtBQUNDO0FBQ0U7Ozs7Ozs7Ozs7Ozs7Ozs7OztBQ1JGO0FBQ0U7QUFDSTs7QUFFMUM7QUFDUCxtQkFBbUIscUVBQXlCO0FBQzVDLHNCQUFzQix3RUFBNEI7O0FBRWxEO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0Esd0JBQXdCLHNGQUEwQztB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QUE7V0FDQTtXQUNBO1dBQ0EsdURBQXVELGlCQUFpQjtXQUN4RTtXQUNBLGdEQUFnRCxhQUFhO1dBQzdEOzs7OztVRU5BO1VBQ0E7VUFDQTtVQUNBIiwic291cmNlcyI6WyJ3ZWJwYWNrOi8vLy4vbm9kZV9tb2R1bGVzL3N3ZWV0YWxlcnQyL3NyYy9Td2VldEFsZXJ0LmpzIiwid2VicGFjazovLy8uL25vZGVfbW9kdWxlcy9zd2VldGFsZXJ0Mi9zcmMvY29uc3RhbnRzLmpzIiwid2VicGFjazovLy8uL25vZGVfbW9kdWxlcy9zd2VldGFsZXJ0Mi9zcmMvZ2xvYmFsU3RhdGUuanMiLCJ3ZWJwYWNrOi8vLy4vbm9kZV9tb2R1bGVzL3N3ZWV0YWxlcnQyL3NyYy9pbnN0YW5jZU1ldGhvZHMuanMiLCJ3ZWJwYWNrOi8vLy4vbm9kZV9tb2R1bGVzL3N3ZWV0YWxlcnQyL3NyYy9pbnN0YW5jZU1ldGhvZHMvX2Rlc3Ryb3kuanMiLCJ3ZWJwYWNrOi8vLy4vbm9kZV9tb2R1bGVzL3N3ZWV0YWxlcnQyL3NyYy9pbnN0YW5jZU1ldGhvZHMvX21haW4uanMiLCJ3ZWJwYWNrOi8vLy4vbm9kZV9tb2R1bGVzL3N3ZWV0YWxlcnQyL3NyYy9pbnN0YW5jZU1ldGhvZHMvYnV0dG9ucy1oYW5kbGVycy5qcyIsIndlYnBhY2s6Ly8vLi9ub2RlX21vZHVsZXMvc3dlZXRhbGVydDIvc3JjL2luc3RhbmNlTWV0aG9kcy9jbG9zZS5qcyIsIndlYnBhY2s6Ly8vLi9ub2RlX21vZHVsZXMvc3dlZXRhbGVydDIvc3JjL2luc3RhbmNlTWV0aG9kcy9lbmFibGUtZGlzYWJsZS1lbGVtZW50cy5qcyIsIndlYnBhY2s6Ly8vLi9ub2RlX21vZHVsZXMvc3dlZXRhbGVydDIvc3JjL2luc3RhbmNlTWV0aG9kcy9nZXRJbnB1dC5qcyIsIndlYnBhY2s6Ly8vLi9ub2RlX21vZHVsZXMvc3dlZXRhbGVydDIvc3JjL2luc3RhbmNlTWV0aG9kcy9oaWRlTG9hZGluZy5qcyIsIndlYnBhY2s6Ly8vLi9ub2RlX21vZHVsZXMvc3dlZXRhbGVydDIvc3JjL2luc3RhbmNlTWV0aG9kcy9rZXlkb3duLWhhbmRsZXIuanMiLCJ3ZWJwYWNrOi8vLy4vbm9kZV9tb2R1bGVzL3N3ZWV0YWxlcnQyL3NyYy9pbnN0YW5jZU1ldGhvZHMvcG9wdXAtY2xpY2staGFuZGxlci5qcyIsIndlYnBhY2s6Ly8vLi9ub2RlX21vZHVsZXMvc3dlZXRhbGVydDIvc3JjL2luc3RhbmNlTWV0aG9kcy9wcm9ncmVzcy1zdGVwcy5qcyIsIndlYnBhY2s6Ly8vLi9ub2RlX21vZHVsZXMvc3dlZXRhbGVydDIvc3JjL2luc3RhbmNlTWV0aG9kcy91cGRhdGUuanMiLCJ3ZWJwYWNrOi8vLy4vbm9kZV9tb2R1bGVzL3N3ZWV0YWxlcnQyL3NyYy9pbnN0YW5jZU1ldGhvZHMvdmFsaWRhdGlvbi1tZXNzYWdlLmpzIiwid2VicGFjazovLy8uL25vZGVfbW9kdWxlcy9zd2VldGFsZXJ0Mi9zcmMvcHJpdmF0ZU1ldGhvZHMuanMiLCJ3ZWJwYWNrOi8vLy4vbm9kZV9tb2R1bGVzL3N3ZWV0YWxlcnQyL3NyYy9wcml2YXRlUHJvcHMuanMiLCJ3ZWJwYWNrOi8vLy4vbm9kZV9tb2R1bGVzL3N3ZWV0YWxlcnQyL3NyYy9zdGF0aWNNZXRob2RzLmpzIiwid2VicGFjazovLy8uL25vZGVfbW9kdWxlcy9zd2VldGFsZXJ0Mi9zcmMvc3RhdGljTWV0aG9kcy9hcmdzVG9QYXJhbXMuanMiLCJ3ZWJwYWNrOi8vLy4vbm9kZV9tb2R1bGVzL3N3ZWV0YWxlcnQyL3NyYy9zdGF0aWNNZXRob2RzL2JpbmRDbGlja0hhbmRsZXIuanMiLCJ3ZWJwYWNrOi8vLy4vbm9kZV9tb2R1bGVzL3N3ZWV0YWxlcnQyL3NyYy9zdGF0aWNNZXRob2RzL2RvbS5qcyIsIndlYnBhY2s6Ly8vLi9ub2RlX21vZHVsZXMvc3dlZXRhbGVydDIvc3JjL3N0YXRpY01ldGhvZHMvZmlyZS5qcyIsIndlYnBhY2s6Ly8vLi9ub2RlX21vZHVsZXMvc3dlZXRhbGVydDIvc3JjL3N0YXRpY01ldGhvZHMvbWl4aW4uanMiLCJ3ZWJwYWNrOi8vLy4vbm9kZV9tb2R1bGVzL3N3ZWV0YWxlcnQyL3NyYy9zdGF0aWNNZXRob2RzL3Nob3dMb2FkaW5nLmpzIiwid2VicGFjazovLy8uL25vZGVfbW9kdWxlcy9zd2VldGFsZXJ0Mi9zcmMvc3RhdGljTWV0aG9kcy90aW1lci5qcyIsIndlYnBhY2s6Ly8vLi9ub2RlX21vZHVsZXMvc3dlZXRhbGVydDIvc3JjL3N3ZWV0YWxlcnQyLmpzIiwid2VicGFjazovLy8uL25vZGVfbW9kdWxlcy9zd2VldGFsZXJ0Mi9zcmMvdXRpbHMvRGlzbWlzc1JlYXNvbi5qcyIsIndlYnBhY2s6Ly8vLi9ub2RlX21vZHVsZXMvc3dlZXRhbGVydDIvc3JjL3V0aWxzL1RpbWVyLmpzIiwid2VicGFjazovLy8uL25vZGVfbW9kdWxlcy9zd2VldGFsZXJ0Mi9zcmMvdXRpbHMvYXJpYS5qcyIsIndlYnBhY2s6Ly8vLi9ub2RlX21vZHVsZXMvc3dlZXRhbGVydDIvc3JjL3V0aWxzL2NsYXNzZXMuanMiLCJ3ZWJwYWNrOi8vLy4vbm9kZV9tb2R1bGVzL3N3ZWV0YWxlcnQyL3NyYy91dGlscy9kZWZhdWx0SW5wdXRWYWxpZGF0b3JzLmpzIiwid2VicGFjazovLy8uL25vZGVfbW9kdWxlcy9zd2VldGFsZXJ0Mi9zcmMvdXRpbHMvZG9tL2FuaW1hdGlvbkVuZEV2ZW50LmpzIiwid2VicGFjazovLy8uL25vZGVfbW9kdWxlcy9zd2VldGFsZXJ0Mi9zcmMvdXRpbHMvZG9tL2RvbVV0aWxzLmpzIiwid2VicGFjazovLy8uL25vZGVfbW9kdWxlcy9zd2VldGFsZXJ0Mi9zcmMvdXRpbHMvZG9tL2dldHRlcnMuanMiLCJ3ZWJwYWNrOi8vLy4vbm9kZV9tb2R1bGVzL3N3ZWV0YWxlcnQyL3NyYy91dGlscy9kb20vaW5kZXguanMiLCJ3ZWJwYWNrOi8vLy4vbm9kZV9tb2R1bGVzL3N3ZWV0YWxlcnQyL3NyYy91dGlscy9kb20vaW5pdC5qcyIsIndlYnBhY2s6Ly8vLi9ub2RlX21vZHVsZXMvc3dlZXRhbGVydDIvc3JjL3V0aWxzL2RvbS9pbnB1dFV0aWxzLmpzIiwid2VicGFjazovLy8uL25vZGVfbW9kdWxlcy9zd2VldGFsZXJ0Mi9zcmMvdXRpbHMvZG9tL21lYXN1cmVTY3JvbGxiYXIuanMiLCJ3ZWJwYWNrOi8vLy4vbm9kZV9tb2R1bGVzL3N3ZWV0YWxlcnQyL3NyYy91dGlscy9kb20vcGFyc2VIdG1sVG9Db250YWluZXIuanMiLCJ3ZWJwYWNrOi8vLy4vbm9kZV9tb2R1bGVzL3N3ZWV0YWxlcnQyL3NyYy91dGlscy9kb20vcmVuZGVyZXJzL3JlbmRlci5qcyIsIndlYnBhY2s6Ly8vLi9ub2RlX21vZHVsZXMvc3dlZXRhbGVydDIvc3JjL3V0aWxzL2RvbS9yZW5kZXJlcnMvcmVuZGVyQWN0aW9ucy5qcyIsIndlYnBhY2s6Ly8vLi9ub2RlX21vZHVsZXMvc3dlZXRhbGVydDIvc3JjL3V0aWxzL2RvbS9yZW5kZXJlcnMvcmVuZGVyQ2xvc2VCdXR0b24uanMiLCJ3ZWJwYWNrOi8vLy4vbm9kZV9tb2R1bGVzL3N3ZWV0YWxlcnQyL3NyYy91dGlscy9kb20vcmVuZGVyZXJzL3JlbmRlckNvbnRhaW5lci5qcyIsIndlYnBhY2s6Ly8vLi9ub2RlX21vZHVsZXMvc3dlZXRhbGVydDIvc3JjL3V0aWxzL2RvbS9yZW5kZXJlcnMvcmVuZGVyQ29udGVudC5qcyIsIndlYnBhY2s6Ly8vLi9ub2RlX21vZHVsZXMvc3dlZXRhbGVydDIvc3JjL3V0aWxzL2RvbS9yZW5kZXJlcnMvcmVuZGVyRm9vdGVyLmpzIiwid2VicGFjazovLy8uL25vZGVfbW9kdWxlcy9zd2VldGFsZXJ0Mi9zcmMvdXRpbHMvZG9tL3JlbmRlcmVycy9yZW5kZXJJY29uLmpzIiwid2VicGFjazovLy8uL25vZGVfbW9kdWxlcy9zd2VldGFsZXJ0Mi9zcmMvdXRpbHMvZG9tL3JlbmRlcmVycy9yZW5kZXJJbWFnZS5qcyIsIndlYnBhY2s6Ly8vLi9ub2RlX21vZHVsZXMvc3dlZXRhbGVydDIvc3JjL3V0aWxzL2RvbS9yZW5kZXJlcnMvcmVuZGVySW5wdXQuanMiLCJ3ZWJwYWNrOi8vLy4vbm9kZV9tb2R1bGVzL3N3ZWV0YWxlcnQyL3NyYy91dGlscy9kb20vcmVuZGVyZXJzL3JlbmRlclBvcHVwLmpzIiwid2VicGFjazovLy8uL25vZGVfbW9kdWxlcy9zd2VldGFsZXJ0Mi9zcmMvdXRpbHMvZG9tL3JlbmRlcmVycy9yZW5kZXJQcm9ncmVzc1N0ZXBzLmpzIiwid2VicGFjazovLy8uL25vZGVfbW9kdWxlcy9zd2VldGFsZXJ0Mi9zcmMvdXRpbHMvZG9tL3JlbmRlcmVycy9yZW5kZXJUaXRsZS5qcyIsIndlYnBhY2s6Ly8vLi9ub2RlX21vZHVsZXMvc3dlZXRhbGVydDIvc3JjL3V0aWxzL2dldFRlbXBsYXRlUGFyYW1zLmpzIiwid2VicGFjazovLy8uL25vZGVfbW9kdWxlcy9zd2VldGFsZXJ0Mi9zcmMvdXRpbHMvaW9zRml4LmpzIiwid2VicGFjazovLy8uL25vZGVfbW9kdWxlcy9zd2VldGFsZXJ0Mi9zcmMvdXRpbHMvaXNOb2RlRW52LmpzIiwid2VicGFjazovLy8uL25vZGVfbW9kdWxlcy9zd2VldGFsZXJ0Mi9zcmMvdXRpbHMvb3BlblBvcHVwLmpzIiwid2VicGFjazovLy8uL25vZGVfbW9kdWxlcy9zd2VldGFsZXJ0Mi9zcmMvdXRpbHMvcGFyYW1zLmpzIiwid2VicGFjazovLy8uL25vZGVfbW9kdWxlcy9zd2VldGFsZXJ0Mi9zcmMvdXRpbHMvc2Nyb2xsYmFyRml4LmpzIiwid2VicGFjazovLy8uL25vZGVfbW9kdWxlcy9zd2VldGFsZXJ0Mi9zcmMvdXRpbHMvc2V0UGFyYW1ldGVycy5qcyIsIndlYnBhY2s6Ly8vLi9ub2RlX21vZHVsZXMvc3dlZXRhbGVydDIvc3JjL3V0aWxzL3V0aWxzLmpzIiwid2VicGFjazovLy93ZWJwYWNrL2Jvb3RzdHJhcCIsIndlYnBhY2s6Ly8vd2VicGFjay9ydW50aW1lL2RlZmluZSBwcm9wZXJ0eSBnZXR0ZXJzIiwid2VicGFjazovLy93ZWJwYWNrL3J1bnRpbWUvaGFzT3duUHJvcGVydHkgc2hvcnRoYW5kIiwid2VicGFjazovLy93ZWJwYWNrL3J1bnRpbWUvbWFrZSBuYW1lc3BhY2Ugb2JqZWN0Iiwid2VicGFjazovLy93ZWJwYWNrL2JlZm9yZS1zdGFydHVwIiwid2VicGFjazovLy93ZWJwYWNrL3N0YXJ0dXAiLCJ3ZWJwYWNrOi8vL3dlYnBhY2svYWZ0ZXItc3RhcnR1cCJdLCJzb3VyY2VzQ29udGVudCI6WyJpbXBvcnQgeyBEaXNtaXNzUmVhc29uIH0gZnJvbSAnLi91dGlscy9EaXNtaXNzUmVhc29uLmpzJ1xuaW1wb3J0ICogYXMgc3RhdGljTWV0aG9kcyBmcm9tICcuL3N0YXRpY01ldGhvZHMuanMnXG5pbXBvcnQgKiBhcyBpbnN0YW5jZU1ldGhvZHMgZnJvbSAnLi9pbnN0YW5jZU1ldGhvZHMuanMnXG5pbXBvcnQgcHJpdmF0ZVByb3BzIGZyb20gJy4vcHJpdmF0ZVByb3BzLmpzJ1xuXG5sZXQgY3VycmVudEluc3RhbmNlXG5cbmNsYXNzIFN3ZWV0QWxlcnQge1xuICBjb25zdHJ1Y3RvciAoLi4uYXJncykge1xuICAgIC8vIFByZXZlbnQgcnVuIGluIE5vZGUgZW52XG4gICAgaWYgKHR5cGVvZiB3aW5kb3cgPT09ICd1bmRlZmluZWQnKSB7XG4gICAgICByZXR1cm5cbiAgICB9XG5cbiAgICBjdXJyZW50SW5zdGFuY2UgPSB0aGlzXG5cbiAgICBjb25zdCBvdXRlclBhcmFtcyA9IE9iamVjdC5mcmVlemUodGhpcy5jb25zdHJ1Y3Rvci5hcmdzVG9QYXJhbXMoYXJncykpXG5cbiAgICBPYmplY3QuZGVmaW5lUHJvcGVydGllcyh0aGlzLCB7XG4gICAgICBwYXJhbXM6IHtcbiAgICAgICAgdmFsdWU6IG91dGVyUGFyYW1zLFxuICAgICAgICB3cml0YWJsZTogZmFsc2UsXG4gICAgICAgIGVudW1lcmFibGU6IHRydWUsXG4gICAgICAgIGNvbmZpZ3VyYWJsZTogdHJ1ZVxuICAgICAgfVxuICAgIH0pXG5cbiAgICBjb25zdCBwcm9taXNlID0gdGhpcy5fbWFpbih0aGlzLnBhcmFtcylcbiAgICBwcml2YXRlUHJvcHMucHJvbWlzZS5zZXQodGhpcywgcHJvbWlzZSlcbiAgfVxuXG4gIC8vIGBjYXRjaGAgY2Fubm90IGJlIHRoZSBuYW1lIG9mIGEgbW9kdWxlIGV4cG9ydCwgc28gd2UgZGVmaW5lIG91ciB0aGVuYWJsZSBtZXRob2RzIGhlcmUgaW5zdGVhZFxuICB0aGVuIChvbkZ1bGZpbGxlZCkge1xuICAgIGNvbnN0IHByb21pc2UgPSBwcml2YXRlUHJvcHMucHJvbWlzZS5nZXQodGhpcylcbiAgICByZXR1cm4gcHJvbWlzZS50aGVuKG9uRnVsZmlsbGVkKVxuICB9XG5cbiAgZmluYWxseSAob25GaW5hbGx5KSB7XG4gICAgY29uc3QgcHJvbWlzZSA9IHByaXZhdGVQcm9wcy5wcm9taXNlLmdldCh0aGlzKVxuICAgIHJldHVybiBwcm9taXNlLmZpbmFsbHkob25GaW5hbGx5KVxuICB9XG59XG5cbi8vIEFzc2lnbiBpbnN0YW5jZSBtZXRob2RzIGZyb20gc3JjL2luc3RhbmNlTWV0aG9kcy8qLmpzIHRvIHByb3RvdHlwZVxuT2JqZWN0LmFzc2lnbihTd2VldEFsZXJ0LnByb3RvdHlwZSwgaW5zdGFuY2VNZXRob2RzKVxuXG4vLyBBc3NpZ24gc3RhdGljIG1ldGhvZHMgZnJvbSBzcmMvc3RhdGljTWV0aG9kcy8qLmpzIHRvIGNvbnN0cnVjdG9yXG5PYmplY3QuYXNzaWduKFN3ZWV0QWxlcnQsIHN0YXRpY01ldGhvZHMpXG5cbi8vIFByb3h5IHRvIGluc3RhbmNlIG1ldGhvZHMgdG8gY29uc3RydWN0b3IsIGZvciBub3csIGZvciBiYWNrd2FyZHMgY29tcGF0aWJpbGl0eVxuT2JqZWN0LmtleXMoaW5zdGFuY2VNZXRob2RzKS5mb3JFYWNoKGtleSA9PiB7XG4gIFN3ZWV0QWxlcnRba2V5XSA9IGZ1bmN0aW9uICguLi5hcmdzKSB7XG4gICAgaWYgKGN1cnJlbnRJbnN0YW5jZSkge1xuICAgICAgcmV0dXJuIGN1cnJlbnRJbnN0YW5jZVtrZXldKC4uLmFyZ3MpXG4gICAgfVxuICB9XG59KVxuXG5Td2VldEFsZXJ0LkRpc21pc3NSZWFzb24gPSBEaXNtaXNzUmVhc29uXG5cblN3ZWV0QWxlcnQudmVyc2lvbiA9ICcxMS4xLjEwJ1xuXG5leHBvcnQgZGVmYXVsdCBTd2VldEFsZXJ0XG4iLCJleHBvcnQgY29uc3QgUkVTVE9SRV9GT0NVU19USU1FT1VUID0gMTAwXG4iLCJpbXBvcnQgeyBSRVNUT1JFX0ZPQ1VTX1RJTUVPVVQgfSBmcm9tICcuL2NvbnN0YW50cy5qcydcblxuY29uc3QgZ2xvYmFsU3RhdGUgPSB7fVxuXG5leHBvcnQgZGVmYXVsdCBnbG9iYWxTdGF0ZVxuXG5jb25zdCBmb2N1c1ByZXZpb3VzQWN0aXZlRWxlbWVudCA9ICgpID0+IHtcbiAgaWYgKGdsb2JhbFN0YXRlLnByZXZpb3VzQWN0aXZlRWxlbWVudCAmJiBnbG9iYWxTdGF0ZS5wcmV2aW91c0FjdGl2ZUVsZW1lbnQuZm9jdXMpIHtcbiAgICBnbG9iYWxTdGF0ZS5wcmV2aW91c0FjdGl2ZUVsZW1lbnQuZm9jdXMoKVxuICAgIGdsb2JhbFN0YXRlLnByZXZpb3VzQWN0aXZlRWxlbWVudCA9IG51bGxcbiAgfSBlbHNlIGlmIChkb2N1bWVudC5ib2R5KSB7XG4gICAgZG9jdW1lbnQuYm9keS5mb2N1cygpXG4gIH1cbn1cblxuLy8gUmVzdG9yZSBwcmV2aW91cyBhY3RpdmUgKGZvY3VzZWQpIGVsZW1lbnRcbmV4cG9ydCBjb25zdCByZXN0b3JlQWN0aXZlRWxlbWVudCA9IChyZXR1cm5Gb2N1cykgPT4ge1xuICByZXR1cm4gbmV3IFByb21pc2UocmVzb2x2ZSA9PiB7XG4gICAgaWYgKCFyZXR1cm5Gb2N1cykge1xuICAgICAgcmV0dXJuIHJlc29sdmUoKVxuICAgIH1cbiAgICBjb25zdCB4ID0gd2luZG93LnNjcm9sbFhcbiAgICBjb25zdCB5ID0gd2luZG93LnNjcm9sbFlcblxuICAgIGdsb2JhbFN0YXRlLnJlc3RvcmVGb2N1c1RpbWVvdXQgPSBzZXRUaW1lb3V0KCgpID0+IHtcbiAgICAgIGZvY3VzUHJldmlvdXNBY3RpdmVFbGVtZW50KClcbiAgICAgIHJlc29sdmUoKVxuICAgIH0sIFJFU1RPUkVfRk9DVVNfVElNRU9VVCkgLy8gaXNzdWVzLzkwMFxuXG4gICAgd2luZG93LnNjcm9sbFRvKHgsIHkpXG4gIH0pXG59XG4iLCJleHBvcnQgKiBmcm9tICcuL2luc3RhbmNlTWV0aG9kcy9oaWRlTG9hZGluZy5qcydcbmV4cG9ydCAqIGZyb20gJy4vaW5zdGFuY2VNZXRob2RzL2dldElucHV0LmpzJ1xuZXhwb3J0ICogZnJvbSAnLi9pbnN0YW5jZU1ldGhvZHMvY2xvc2UuanMnXG5leHBvcnQgKiBmcm9tICcuL2luc3RhbmNlTWV0aG9kcy9lbmFibGUtZGlzYWJsZS1lbGVtZW50cy5qcydcbmV4cG9ydCAqIGZyb20gJy4vaW5zdGFuY2VNZXRob2RzL3ZhbGlkYXRpb24tbWVzc2FnZS5qcydcbmV4cG9ydCAqIGZyb20gJy4vaW5zdGFuY2VNZXRob2RzL3Byb2dyZXNzLXN0ZXBzLmpzJ1xuZXhwb3J0ICogZnJvbSAnLi9pbnN0YW5jZU1ldGhvZHMvX21haW4uanMnXG5leHBvcnQgKiBmcm9tICcuL2luc3RhbmNlTWV0aG9kcy91cGRhdGUuanMnXG5leHBvcnQgKiBmcm9tICcuL2luc3RhbmNlTWV0aG9kcy9fZGVzdHJveS5qcydcbiIsImltcG9ydCBnbG9iYWxTdGF0ZSBmcm9tICcuLi9nbG9iYWxTdGF0ZS5qcydcbmltcG9ydCBwcml2YXRlUHJvcHMgZnJvbSAnLi4vcHJpdmF0ZVByb3BzLmpzJ1xuaW1wb3J0IHByaXZhdGVNZXRob2RzIGZyb20gJy4uL3ByaXZhdGVNZXRob2RzLmpzJ1xuXG5leHBvcnQgZnVuY3Rpb24gX2Rlc3Ryb3kgKCkge1xuICBjb25zdCBkb21DYWNoZSA9IHByaXZhdGVQcm9wcy5kb21DYWNoZS5nZXQodGhpcylcbiAgY29uc3QgaW5uZXJQYXJhbXMgPSBwcml2YXRlUHJvcHMuaW5uZXJQYXJhbXMuZ2V0KHRoaXMpXG5cbiAgaWYgKCFpbm5lclBhcmFtcykge1xuICAgIGRpc3Bvc2VXZWFrTWFwcyh0aGlzKSAvLyBUaGUgV2Vha01hcHMgbWlnaHQgaGF2ZSBiZWVuIHBhcnRseSBkZXN0cm95ZWQsIHdlIG11c3QgcmVjYWxsIGl0IHRvIGRpc3Bvc2UgYW55IHJlbWFpbmluZyB3ZWFrbWFwcyAjMjMzNVxuICAgIHJldHVybiAvLyBUaGlzIGluc3RhbmNlIGhhcyBhbHJlYWR5IGJlZW4gZGVzdHJveWVkXG4gIH1cblxuICAvLyBDaGVjayBpZiB0aGVyZSBpcyBhbm90aGVyIFN3YWwgY2xvc2luZ1xuICBpZiAoZG9tQ2FjaGUucG9wdXAgJiYgZ2xvYmFsU3RhdGUuc3dhbENsb3NlRXZlbnRGaW5pc2hlZENhbGxiYWNrKSB7XG4gICAgZ2xvYmFsU3RhdGUuc3dhbENsb3NlRXZlbnRGaW5pc2hlZENhbGxiYWNrKClcbiAgICBkZWxldGUgZ2xvYmFsU3RhdGUuc3dhbENsb3NlRXZlbnRGaW5pc2hlZENhbGxiYWNrXG4gIH1cblxuICAvLyBDaGVjayBpZiB0aGVyZSBpcyBhIHN3YWwgZGlzcG9zYWwgZGVmZXIgdGltZXJcbiAgaWYgKGdsb2JhbFN0YXRlLmRlZmVyRGlzcG9zYWxUaW1lcikge1xuICAgIGNsZWFyVGltZW91dChnbG9iYWxTdGF0ZS5kZWZlckRpc3Bvc2FsVGltZXIpXG4gICAgZGVsZXRlIGdsb2JhbFN0YXRlLmRlZmVyRGlzcG9zYWxUaW1lclxuICB9XG5cbiAgaWYgKHR5cGVvZiBpbm5lclBhcmFtcy5kaWREZXN0cm95ID09PSAnZnVuY3Rpb24nKSB7XG4gICAgaW5uZXJQYXJhbXMuZGlkRGVzdHJveSgpXG4gIH1cbiAgZGlzcG9zZVN3YWwodGhpcylcbn1cblxuY29uc3QgZGlzcG9zZVN3YWwgPSAoaW5zdGFuY2UpID0+IHtcbiAgZGlzcG9zZVdlYWtNYXBzKGluc3RhbmNlKVxuICAvLyBVbnNldCB0aGlzLnBhcmFtcyBzbyBHQyB3aWxsIGRpc3Bvc2UgaXQgKCMxNTY5KVxuICBkZWxldGUgaW5zdGFuY2UucGFyYW1zXG4gIC8vIFVuc2V0IGdsb2JhbFN0YXRlIHByb3BzIHNvIEdDIHdpbGwgZGlzcG9zZSBnbG9iYWxTdGF0ZSAoIzE1NjkpXG4gIGRlbGV0ZSBnbG9iYWxTdGF0ZS5rZXlkb3duSGFuZGxlclxuICBkZWxldGUgZ2xvYmFsU3RhdGUua2V5ZG93blRhcmdldFxuICAvLyBVbnNldCBjdXJyZW50SW5zdGFuY2VcbiAgZGVsZXRlIGdsb2JhbFN0YXRlLmN1cnJlbnRJbnN0YW5jZVxufVxuXG5jb25zdCBkaXNwb3NlV2Vha01hcHMgPSAoaW5zdGFuY2UpID0+IHtcbiAgLy8gSWYgdGhlIGN1cnJlbnQgaW5zdGFuY2UgaXMgYXdhaXRpbmcgYSBwcm9taXNlIHJlc3VsdCwgd2Uga2VlcCB0aGUgcHJpdmF0ZU1ldGhvZHMgdG8gY2FsbCB0aGVtIG9uY2UgdGhlIHByb21pc2UgcmVzdWx0IGlzIHJldHJpZXZlZCAjMjMzNVxuICBpZiAoaW5zdGFuY2UuaXNBd2FpdGluZ1Byb21pc2UoKSkge1xuICAgIHVuc2V0V2Vha01hcHMocHJpdmF0ZVByb3BzLCBpbnN0YW5jZSlcbiAgICBwcml2YXRlUHJvcHMuYXdhaXRpbmdQcm9taXNlLnNldChpbnN0YW5jZSwgdHJ1ZSlcbiAgfSBlbHNlIHtcbiAgICB1bnNldFdlYWtNYXBzKHByaXZhdGVNZXRob2RzLCBpbnN0YW5jZSlcbiAgICB1bnNldFdlYWtNYXBzKHByaXZhdGVQcm9wcywgaW5zdGFuY2UpXG4gIH1cbn1cblxuY29uc3QgdW5zZXRXZWFrTWFwcyA9IChvYmosIGluc3RhbmNlKSA9PiB7XG4gIGZvciAoY29uc3QgaSBpbiBvYmopIHtcbiAgICBvYmpbaV0uZGVsZXRlKGluc3RhbmNlKVxuICB9XG59XG4iLCJpbXBvcnQgZGVmYXVsdFBhcmFtcywgeyBzaG93V2FybmluZ3NGb3JQYXJhbXMgfSBmcm9tICcuLi91dGlscy9wYXJhbXMuanMnXG5pbXBvcnQgKiBhcyBkb20gZnJvbSAnLi4vdXRpbHMvZG9tL2luZGV4LmpzJ1xuaW1wb3J0IFRpbWVyIGZyb20gJy4uL3V0aWxzL1RpbWVyLmpzJ1xuaW1wb3J0IHsgY2FsbElmRnVuY3Rpb24gfSBmcm9tICcuLi91dGlscy91dGlscy5qcydcbmltcG9ydCBzZXRQYXJhbWV0ZXJzIGZyb20gJy4uL3V0aWxzL3NldFBhcmFtZXRlcnMuanMnXG5pbXBvcnQgeyBnZXRUZW1wbGF0ZVBhcmFtcyB9IGZyb20gJy4uL3V0aWxzL2dldFRlbXBsYXRlUGFyYW1zLmpzJ1xuaW1wb3J0IGdsb2JhbFN0YXRlIGZyb20gJy4uL2dsb2JhbFN0YXRlLmpzJ1xuaW1wb3J0IHsgb3BlblBvcHVwIH0gZnJvbSAnLi4vdXRpbHMvb3BlblBvcHVwLmpzJ1xuaW1wb3J0IHByaXZhdGVQcm9wcyBmcm9tICcuLi9wcml2YXRlUHJvcHMuanMnXG5pbXBvcnQgcHJpdmF0ZU1ldGhvZHMgZnJvbSAnLi4vcHJpdmF0ZU1ldGhvZHMuanMnXG5pbXBvcnQgeyBoYW5kbGVJbnB1dE9wdGlvbnNBbmRWYWx1ZSB9IGZyb20gJy4uL3V0aWxzL2RvbS9pbnB1dFV0aWxzLmpzJ1xuaW1wb3J0IHsgaGFuZGxlQ29uZmlybUJ1dHRvbkNsaWNrLCBoYW5kbGVEZW55QnV0dG9uQ2xpY2ssIGhhbmRsZUNhbmNlbEJ1dHRvbkNsaWNrIH0gZnJvbSAnLi9idXR0b25zLWhhbmRsZXJzLmpzJ1xuaW1wb3J0IHsgYWRkS2V5ZG93bkhhbmRsZXIsIHNldEZvY3VzIH0gZnJvbSAnLi9rZXlkb3duLWhhbmRsZXIuanMnXG5pbXBvcnQgeyBoYW5kbGVQb3B1cENsaWNrIH0gZnJvbSAnLi9wb3B1cC1jbGljay1oYW5kbGVyLmpzJ1xuaW1wb3J0IHsgRGlzbWlzc1JlYXNvbiB9IGZyb20gJy4uL3V0aWxzL0Rpc21pc3NSZWFzb24uanMnXG5pbXBvcnQgeyB1bnNldEFyaWFIaWRkZW4gfSBmcm9tICcuLi91dGlscy9hcmlhLmpzJ1xuXG5leHBvcnQgZnVuY3Rpb24gX21haW4gKHVzZXJQYXJhbXMsIG1peGluUGFyYW1zID0ge30pIHtcbiAgc2hvd1dhcm5pbmdzRm9yUGFyYW1zKE9iamVjdC5hc3NpZ24oe30sIG1peGluUGFyYW1zLCB1c2VyUGFyYW1zKSlcblxuICBpZiAoZ2xvYmFsU3RhdGUuY3VycmVudEluc3RhbmNlKSB7XG4gICAgZ2xvYmFsU3RhdGUuY3VycmVudEluc3RhbmNlLl9kZXN0cm95KClcbiAgICBpZiAoZG9tLmlzTW9kYWwoKSkge1xuICAgICAgdW5zZXRBcmlhSGlkZGVuKClcbiAgICB9XG4gIH1cbiAgZ2xvYmFsU3RhdGUuY3VycmVudEluc3RhbmNlID0gdGhpc1xuXG4gIGNvbnN0IGlubmVyUGFyYW1zID0gcHJlcGFyZVBhcmFtcyh1c2VyUGFyYW1zLCBtaXhpblBhcmFtcylcbiAgc2V0UGFyYW1ldGVycyhpbm5lclBhcmFtcylcbiAgT2JqZWN0LmZyZWV6ZShpbm5lclBhcmFtcylcblxuICAvLyBjbGVhciB0aGUgcHJldmlvdXMgdGltZXJcbiAgaWYgKGdsb2JhbFN0YXRlLnRpbWVvdXQpIHtcbiAgICBnbG9iYWxTdGF0ZS50aW1lb3V0LnN0b3AoKVxuICAgIGRlbGV0ZSBnbG9iYWxTdGF0ZS50aW1lb3V0XG4gIH1cblxuICAvLyBjbGVhciB0aGUgcmVzdG9yZSBmb2N1cyB0aW1lb3V0XG4gIGNsZWFyVGltZW91dChnbG9iYWxTdGF0ZS5yZXN0b3JlRm9jdXNUaW1lb3V0KVxuXG4gIGNvbnN0IGRvbUNhY2hlID0gcG9wdWxhdGVEb21DYWNoZSh0aGlzKVxuXG4gIGRvbS5yZW5kZXIodGhpcywgaW5uZXJQYXJhbXMpXG5cbiAgcHJpdmF0ZVByb3BzLmlubmVyUGFyYW1zLnNldCh0aGlzLCBpbm5lclBhcmFtcylcblxuICByZXR1cm4gc3dhbFByb21pc2UodGhpcywgZG9tQ2FjaGUsIGlubmVyUGFyYW1zKVxufVxuXG5jb25zdCBwcmVwYXJlUGFyYW1zID0gKHVzZXJQYXJhbXMsIG1peGluUGFyYW1zKSA9PiB7XG4gIGNvbnN0IHRlbXBsYXRlUGFyYW1zID0gZ2V0VGVtcGxhdGVQYXJhbXModXNlclBhcmFtcylcbiAgY29uc3QgcGFyYW1zID0gT2JqZWN0LmFzc2lnbih7fSwgZGVmYXVsdFBhcmFtcywgbWl4aW5QYXJhbXMsIHRlbXBsYXRlUGFyYW1zLCB1c2VyUGFyYW1zKSAvLyBwcmVjZWRlbmNlIGlzIGRlc2NyaWJlZCBpbiAjMjEzMVxuICBwYXJhbXMuc2hvd0NsYXNzID0gT2JqZWN0LmFzc2lnbih7fSwgZGVmYXVsdFBhcmFtcy5zaG93Q2xhc3MsIHBhcmFtcy5zaG93Q2xhc3MpXG4gIHBhcmFtcy5oaWRlQ2xhc3MgPSBPYmplY3QuYXNzaWduKHt9LCBkZWZhdWx0UGFyYW1zLmhpZGVDbGFzcywgcGFyYW1zLmhpZGVDbGFzcylcbiAgcmV0dXJuIHBhcmFtc1xufVxuXG5jb25zdCBzd2FsUHJvbWlzZSA9IChpbnN0YW5jZSwgZG9tQ2FjaGUsIGlubmVyUGFyYW1zKSA9PiB7XG4gIHJldHVybiBuZXcgUHJvbWlzZSgocmVzb2x2ZSwgcmVqZWN0KSA9PiB7XG4gICAgLy8gZnVuY3Rpb25zIHRvIGhhbmRsZSBhbGwgY2xvc2luZ3MvZGlzbWlzc2Fsc1xuICAgIGNvbnN0IGRpc21pc3NXaXRoID0gKGRpc21pc3MpID0+IHtcbiAgICAgIGluc3RhbmNlLmNsb3NlUG9wdXAoeyBpc0Rpc21pc3NlZDogdHJ1ZSwgZGlzbWlzcyB9KVxuICAgIH1cblxuICAgIHByaXZhdGVNZXRob2RzLnN3YWxQcm9taXNlUmVzb2x2ZS5zZXQoaW5zdGFuY2UsIHJlc29sdmUpXG4gICAgcHJpdmF0ZU1ldGhvZHMuc3dhbFByb21pc2VSZWplY3Quc2V0KGluc3RhbmNlLCByZWplY3QpXG5cbiAgICBkb21DYWNoZS5jb25maXJtQnV0dG9uLm9uY2xpY2sgPSAoKSA9PiBoYW5kbGVDb25maXJtQnV0dG9uQ2xpY2soaW5zdGFuY2UpXG4gICAgZG9tQ2FjaGUuZGVueUJ1dHRvbi5vbmNsaWNrID0gKCkgPT4gaGFuZGxlRGVueUJ1dHRvbkNsaWNrKGluc3RhbmNlKVxuICAgIGRvbUNhY2hlLmNhbmNlbEJ1dHRvbi5vbmNsaWNrID0gKCkgPT4gaGFuZGxlQ2FuY2VsQnV0dG9uQ2xpY2soaW5zdGFuY2UsIGRpc21pc3NXaXRoKVxuXG4gICAgZG9tQ2FjaGUuY2xvc2VCdXR0b24ub25jbGljayA9ICgpID0+IGRpc21pc3NXaXRoKERpc21pc3NSZWFzb24uY2xvc2UpXG5cbiAgICBoYW5kbGVQb3B1cENsaWNrKGluc3RhbmNlLCBkb21DYWNoZSwgZGlzbWlzc1dpdGgpXG5cbiAgICBhZGRLZXlkb3duSGFuZGxlcihpbnN0YW5jZSwgZ2xvYmFsU3RhdGUsIGlubmVyUGFyYW1zLCBkaXNtaXNzV2l0aClcblxuICAgIGhhbmRsZUlucHV0T3B0aW9uc0FuZFZhbHVlKGluc3RhbmNlLCBpbm5lclBhcmFtcylcblxuICAgIG9wZW5Qb3B1cChpbm5lclBhcmFtcylcblxuICAgIHNldHVwVGltZXIoZ2xvYmFsU3RhdGUsIGlubmVyUGFyYW1zLCBkaXNtaXNzV2l0aClcblxuICAgIGluaXRGb2N1cyhkb21DYWNoZSwgaW5uZXJQYXJhbXMpXG5cbiAgICAvLyBTY3JvbGwgY29udGFpbmVyIHRvIHRvcCBvbiBvcGVuICgjMTI0NywgIzE5NDYpXG4gICAgc2V0VGltZW91dCgoKSA9PiB7XG4gICAgICBkb21DYWNoZS5jb250YWluZXIuc2Nyb2xsVG9wID0gMFxuICAgIH0pXG4gIH0pXG59XG5cbmNvbnN0IHBvcHVsYXRlRG9tQ2FjaGUgPSAoaW5zdGFuY2UpID0+IHtcbiAgY29uc3QgZG9tQ2FjaGUgPSB7XG4gICAgcG9wdXA6IGRvbS5nZXRQb3B1cCgpLFxuICAgIGNvbnRhaW5lcjogZG9tLmdldENvbnRhaW5lcigpLFxuICAgIGFjdGlvbnM6IGRvbS5nZXRBY3Rpb25zKCksXG4gICAgY29uZmlybUJ1dHRvbjogZG9tLmdldENvbmZpcm1CdXR0b24oKSxcbiAgICBkZW55QnV0dG9uOiBkb20uZ2V0RGVueUJ1dHRvbigpLFxuICAgIGNhbmNlbEJ1dHRvbjogZG9tLmdldENhbmNlbEJ1dHRvbigpLFxuICAgIGxvYWRlcjogZG9tLmdldExvYWRlcigpLFxuICAgIGNsb3NlQnV0dG9uOiBkb20uZ2V0Q2xvc2VCdXR0b24oKSxcbiAgICB2YWxpZGF0aW9uTWVzc2FnZTogZG9tLmdldFZhbGlkYXRpb25NZXNzYWdlKCksXG4gICAgcHJvZ3Jlc3NTdGVwczogZG9tLmdldFByb2dyZXNzU3RlcHMoKVxuICB9XG4gIHByaXZhdGVQcm9wcy5kb21DYWNoZS5zZXQoaW5zdGFuY2UsIGRvbUNhY2hlKVxuXG4gIHJldHVybiBkb21DYWNoZVxufVxuXG5jb25zdCBzZXR1cFRpbWVyID0gKGdsb2JhbFN0YXRlLCBpbm5lclBhcmFtcywgZGlzbWlzc1dpdGgpID0+IHtcbiAgY29uc3QgdGltZXJQcm9ncmVzc0JhciA9IGRvbS5nZXRUaW1lclByb2dyZXNzQmFyKClcbiAgZG9tLmhpZGUodGltZXJQcm9ncmVzc0JhcilcbiAgaWYgKGlubmVyUGFyYW1zLnRpbWVyKSB7XG4gICAgZ2xvYmFsU3RhdGUudGltZW91dCA9IG5ldyBUaW1lcigoKSA9PiB7XG4gICAgICBkaXNtaXNzV2l0aCgndGltZXInKVxuICAgICAgZGVsZXRlIGdsb2JhbFN0YXRlLnRpbWVvdXRcbiAgICB9LCBpbm5lclBhcmFtcy50aW1lcilcbiAgICBpZiAoaW5uZXJQYXJhbXMudGltZXJQcm9ncmVzc0Jhcikge1xuICAgICAgZG9tLnNob3codGltZXJQcm9ncmVzc0JhcilcbiAgICAgIHNldFRpbWVvdXQoKCkgPT4ge1xuICAgICAgICBpZiAoZ2xvYmFsU3RhdGUudGltZW91dCAmJiBnbG9iYWxTdGF0ZS50aW1lb3V0LnJ1bm5pbmcpIHsgLy8gdGltZXIgY2FuIGJlIGFscmVhZHkgc3RvcHBlZCBvciB1bnNldCBhdCB0aGlzIHBvaW50XG4gICAgICAgICAgZG9tLmFuaW1hdGVUaW1lclByb2dyZXNzQmFyKGlubmVyUGFyYW1zLnRpbWVyKVxuICAgICAgICB9XG4gICAgICB9KVxuICAgIH1cbiAgfVxufVxuXG5jb25zdCBpbml0Rm9jdXMgPSAoZG9tQ2FjaGUsIGlubmVyUGFyYW1zKSA9PiB7XG4gIGlmIChpbm5lclBhcmFtcy50b2FzdCkge1xuICAgIHJldHVyblxuICB9XG5cbiAgaWYgKCFjYWxsSWZGdW5jdGlvbihpbm5lclBhcmFtcy5hbGxvd0VudGVyS2V5KSkge1xuICAgIHJldHVybiBibHVyQWN0aXZlRWxlbWVudCgpXG4gIH1cblxuICBpZiAoIWZvY3VzQnV0dG9uKGRvbUNhY2hlLCBpbm5lclBhcmFtcykpIHtcbiAgICBzZXRGb2N1cyhpbm5lclBhcmFtcywgLTEsIDEpXG4gIH1cbn1cblxuY29uc3QgZm9jdXNCdXR0b24gPSAoZG9tQ2FjaGUsIGlubmVyUGFyYW1zKSA9PiB7XG4gIGlmIChpbm5lclBhcmFtcy5mb2N1c0RlbnkgJiYgZG9tLmlzVmlzaWJsZShkb21DYWNoZS5kZW55QnV0dG9uKSkge1xuICAgIGRvbUNhY2hlLmRlbnlCdXR0b24uZm9jdXMoKVxuICAgIHJldHVybiB0cnVlXG4gIH1cblxuICBpZiAoaW5uZXJQYXJhbXMuZm9jdXNDYW5jZWwgJiYgZG9tLmlzVmlzaWJsZShkb21DYWNoZS5jYW5jZWxCdXR0b24pKSB7XG4gICAgZG9tQ2FjaGUuY2FuY2VsQnV0dG9uLmZvY3VzKClcbiAgICByZXR1cm4gdHJ1ZVxuICB9XG5cbiAgaWYgKGlubmVyUGFyYW1zLmZvY3VzQ29uZmlybSAmJiBkb20uaXNWaXNpYmxlKGRvbUNhY2hlLmNvbmZpcm1CdXR0b24pKSB7XG4gICAgZG9tQ2FjaGUuY29uZmlybUJ1dHRvbi5mb2N1cygpXG4gICAgcmV0dXJuIHRydWVcbiAgfVxuXG4gIHJldHVybiBmYWxzZVxufVxuXG5jb25zdCBibHVyQWN0aXZlRWxlbWVudCA9ICgpID0+IHtcbiAgaWYgKGRvY3VtZW50LmFjdGl2ZUVsZW1lbnQgJiYgdHlwZW9mIGRvY3VtZW50LmFjdGl2ZUVsZW1lbnQuYmx1ciA9PT0gJ2Z1bmN0aW9uJykge1xuICAgIGRvY3VtZW50LmFjdGl2ZUVsZW1lbnQuYmx1cigpXG4gIH1cbn1cbiIsImltcG9ydCB7IGlzVmlzaWJsZSB9IGZyb20gJy4uL3V0aWxzL2RvbS9kb21VdGlscy5qcydcbmltcG9ydCB7IGdldElucHV0VmFsdWUgfSBmcm9tICcuLi91dGlscy9kb20vaW5wdXRVdGlscy5qcydcbmltcG9ydCB7IGdldERlbnlCdXR0b24sIGdldFZhbGlkYXRpb25NZXNzYWdlIH0gZnJvbSAnLi4vdXRpbHMvZG9tL2dldHRlcnMuanMnXG5pbXBvcnQgeyBhc1Byb21pc2UgfSBmcm9tICcuLi91dGlscy91dGlscy5qcydcbmltcG9ydCB7IHNob3dMb2FkaW5nIH0gZnJvbSAnLi4vc3RhdGljTWV0aG9kcy9zaG93TG9hZGluZy5qcydcbmltcG9ydCB7IERpc21pc3NSZWFzb24gfSBmcm9tICcuLi91dGlscy9EaXNtaXNzUmVhc29uLmpzJ1xuaW1wb3J0IHByaXZhdGVQcm9wcyBmcm9tICcuLi9wcml2YXRlUHJvcHMuanMnXG5cbmV4cG9ydCBjb25zdCBoYW5kbGVDb25maXJtQnV0dG9uQ2xpY2sgPSAoaW5zdGFuY2UpID0+IHtcbiAgY29uc3QgaW5uZXJQYXJhbXMgPSBwcml2YXRlUHJvcHMuaW5uZXJQYXJhbXMuZ2V0KGluc3RhbmNlKVxuICBpbnN0YW5jZS5kaXNhYmxlQnV0dG9ucygpXG4gIGlmIChpbm5lclBhcmFtcy5pbnB1dCkge1xuICAgIGhhbmRsZUNvbmZpcm1PckRlbnlXaXRoSW5wdXQoaW5zdGFuY2UsICdjb25maXJtJylcbiAgfSBlbHNlIHtcbiAgICBjb25maXJtKGluc3RhbmNlLCB0cnVlKVxuICB9XG59XG5cbmV4cG9ydCBjb25zdCBoYW5kbGVEZW55QnV0dG9uQ2xpY2sgPSAoaW5zdGFuY2UpID0+IHtcbiAgY29uc3QgaW5uZXJQYXJhbXMgPSBwcml2YXRlUHJvcHMuaW5uZXJQYXJhbXMuZ2V0KGluc3RhbmNlKVxuICBpbnN0YW5jZS5kaXNhYmxlQnV0dG9ucygpXG4gIGlmIChpbm5lclBhcmFtcy5yZXR1cm5JbnB1dFZhbHVlT25EZW55KSB7XG4gICAgaGFuZGxlQ29uZmlybU9yRGVueVdpdGhJbnB1dChpbnN0YW5jZSwgJ2RlbnknKVxuICB9IGVsc2Uge1xuICAgIGRlbnkoaW5zdGFuY2UsIGZhbHNlKVxuICB9XG59XG5cbmV4cG9ydCBjb25zdCBoYW5kbGVDYW5jZWxCdXR0b25DbGljayA9IChpbnN0YW5jZSwgZGlzbWlzc1dpdGgpID0+IHtcbiAgaW5zdGFuY2UuZGlzYWJsZUJ1dHRvbnMoKVxuICBkaXNtaXNzV2l0aChEaXNtaXNzUmVhc29uLmNhbmNlbClcbn1cblxuY29uc3QgaGFuZGxlQ29uZmlybU9yRGVueVdpdGhJbnB1dCA9IChpbnN0YW5jZSwgdHlwZSAvKiAnY29uZmlybScgfCAnZGVueScgKi8pID0+IHtcbiAgY29uc3QgaW5uZXJQYXJhbXMgPSBwcml2YXRlUHJvcHMuaW5uZXJQYXJhbXMuZ2V0KGluc3RhbmNlKVxuICBjb25zdCBpbnB1dFZhbHVlID0gZ2V0SW5wdXRWYWx1ZShpbnN0YW5jZSwgaW5uZXJQYXJhbXMpXG4gIGlmIChpbm5lclBhcmFtcy5pbnB1dFZhbGlkYXRvcikge1xuICAgIGhhbmRsZUlucHV0VmFsaWRhdG9yKGluc3RhbmNlLCBpbnB1dFZhbHVlLCB0eXBlKVxuICB9IGVsc2UgaWYgKCFpbnN0YW5jZS5nZXRJbnB1dCgpLmNoZWNrVmFsaWRpdHkoKSkge1xuICAgIGluc3RhbmNlLmVuYWJsZUJ1dHRvbnMoKVxuICAgIGluc3RhbmNlLnNob3dWYWxpZGF0aW9uTWVzc2FnZShpbm5lclBhcmFtcy52YWxpZGF0aW9uTWVzc2FnZSlcbiAgfSBlbHNlIGlmICh0eXBlID09PSAnZGVueScpIHtcbiAgICBkZW55KGluc3RhbmNlLCBpbnB1dFZhbHVlKVxuICB9IGVsc2Uge1xuICAgIGNvbmZpcm0oaW5zdGFuY2UsIGlucHV0VmFsdWUpXG4gIH1cbn1cblxuY29uc3QgaGFuZGxlSW5wdXRWYWxpZGF0b3IgPSAoaW5zdGFuY2UsIGlucHV0VmFsdWUsIHR5cGUgLyogJ2NvbmZpcm0nIHwgJ2RlbnknICovKSA9PiB7XG4gIGNvbnN0IGlubmVyUGFyYW1zID0gcHJpdmF0ZVByb3BzLmlubmVyUGFyYW1zLmdldChpbnN0YW5jZSlcbiAgaW5zdGFuY2UuZGlzYWJsZUlucHV0KClcbiAgY29uc3QgdmFsaWRhdGlvblByb21pc2UgPSBQcm9taXNlLnJlc29sdmUoKS50aGVuKCgpID0+IGFzUHJvbWlzZShcbiAgICBpbm5lclBhcmFtcy5pbnB1dFZhbGlkYXRvcihpbnB1dFZhbHVlLCBpbm5lclBhcmFtcy52YWxpZGF0aW9uTWVzc2FnZSkpXG4gIClcbiAgdmFsaWRhdGlvblByb21pc2UudGhlbihcbiAgICAodmFsaWRhdGlvbk1lc3NhZ2UpID0+IHtcbiAgICAgIGluc3RhbmNlLmVuYWJsZUJ1dHRvbnMoKVxuICAgICAgaW5zdGFuY2UuZW5hYmxlSW5wdXQoKVxuICAgICAgaWYgKHZhbGlkYXRpb25NZXNzYWdlKSB7XG4gICAgICAgIGluc3RhbmNlLnNob3dWYWxpZGF0aW9uTWVzc2FnZSh2YWxpZGF0aW9uTWVzc2FnZSlcbiAgICAgIH0gZWxzZSBpZiAodHlwZSA9PT0gJ2RlbnknKSB7XG4gICAgICAgIGRlbnkoaW5zdGFuY2UsIGlucHV0VmFsdWUpXG4gICAgICB9IGVsc2Uge1xuICAgICAgICBjb25maXJtKGluc3RhbmNlLCBpbnB1dFZhbHVlKVxuICAgICAgfVxuICAgIH1cbiAgKVxufVxuXG5jb25zdCBkZW55ID0gKGluc3RhbmNlLCB2YWx1ZSkgPT4ge1xuICBjb25zdCBpbm5lclBhcmFtcyA9IHByaXZhdGVQcm9wcy5pbm5lclBhcmFtcy5nZXQoaW5zdGFuY2UgfHwgdGhpcylcblxuICBpZiAoaW5uZXJQYXJhbXMuc2hvd0xvYWRlck9uRGVueSkge1xuICAgIHNob3dMb2FkaW5nKGdldERlbnlCdXR0b24oKSlcbiAgfVxuXG4gIGlmIChpbm5lclBhcmFtcy5wcmVEZW55KSB7XG4gICAgcHJpdmF0ZVByb3BzLmF3YWl0aW5nUHJvbWlzZS5zZXQoaW5zdGFuY2UgfHwgdGhpcywgdHJ1ZSkgLy8gRmxhZ2dpbmcgdGhlIGluc3RhbmNlIGFzIGF3YWl0aW5nIGEgcHJvbWlzZSBzbyBpdCdzIG93biBwcm9taXNlJ3MgcmVqZWN0L3Jlc29sdmUgbWV0aG9kcyBkb2VzbnQgZ2V0IGRlc3Ryb3llZCB1bnRpbCB0aGUgcmVzdWx0IGZyb20gdGhpcyBwcmVEZW55J3MgcHJvbWlzZSBpcyByZWNlaXZlZFxuICAgIGNvbnN0IHByZURlbnlQcm9taXNlID0gUHJvbWlzZS5yZXNvbHZlKCkudGhlbigoKSA9PiBhc1Byb21pc2UoXG4gICAgICBpbm5lclBhcmFtcy5wcmVEZW55KHZhbHVlLCBpbm5lclBhcmFtcy52YWxpZGF0aW9uTWVzc2FnZSkpXG4gICAgKVxuICAgIHByZURlbnlQcm9taXNlLnRoZW4oXG4gICAgICAocHJlRGVueVZhbHVlKSA9PiB7XG4gICAgICAgIGlmIChwcmVEZW55VmFsdWUgPT09IGZhbHNlKSB7XG4gICAgICAgICAgaW5zdGFuY2UuaGlkZUxvYWRpbmcoKVxuICAgICAgICB9IGVsc2Uge1xuICAgICAgICAgIGluc3RhbmNlLmNsb3NlUG9wdXAoeyBpc0RlbmllZDogdHJ1ZSwgdmFsdWU6IHR5cGVvZiBwcmVEZW55VmFsdWUgPT09ICd1bmRlZmluZWQnID8gdmFsdWUgOiBwcmVEZW55VmFsdWUgfSlcbiAgICAgICAgfVxuICAgICAgfVxuICAgICkuY2F0Y2goKGVycm9yKSA9PiByZWplY3RXaXRoKGluc3RhbmNlIHx8IHRoaXMsIGVycm9yKSlcbiAgfSBlbHNlIHtcbiAgICBpbnN0YW5jZS5jbG9zZVBvcHVwKHsgaXNEZW5pZWQ6IHRydWUsIHZhbHVlIH0pXG4gIH1cbn1cblxuY29uc3Qgc3VjY2VlZFdpdGggPSAoaW5zdGFuY2UsIHZhbHVlKSA9PiB7XG4gIGluc3RhbmNlLmNsb3NlUG9wdXAoeyBpc0NvbmZpcm1lZDogdHJ1ZSwgdmFsdWUgfSlcbn1cblxuY29uc3QgcmVqZWN0V2l0aCA9IChpbnN0YW5jZSwgZXJyb3IpID0+IHtcbiAgaW5zdGFuY2UucmVqZWN0UHJvbWlzZShlcnJvcilcbn1cblxuY29uc3QgY29uZmlybSA9IChpbnN0YW5jZSwgdmFsdWUpID0+IHtcbiAgY29uc3QgaW5uZXJQYXJhbXMgPSBwcml2YXRlUHJvcHMuaW5uZXJQYXJhbXMuZ2V0KGluc3RhbmNlIHx8IHRoaXMpXG5cbiAgaWYgKGlubmVyUGFyYW1zLnNob3dMb2FkZXJPbkNvbmZpcm0pIHtcbiAgICBzaG93TG9hZGluZygpXG4gIH1cblxuICBpZiAoaW5uZXJQYXJhbXMucHJlQ29uZmlybSkge1xuICAgIGluc3RhbmNlLnJlc2V0VmFsaWRhdGlvbk1lc3NhZ2UoKVxuICAgIHByaXZhdGVQcm9wcy5hd2FpdGluZ1Byb21pc2Uuc2V0KGluc3RhbmNlIHx8IHRoaXMsIHRydWUpIC8vIEZsYWdnaW5nIHRoZSBpbnN0YW5jZSBhcyBhd2FpdGluZyBhIHByb21pc2Ugc28gaXQncyBvd24gcHJvbWlzZSdzIHJlamVjdC9yZXNvbHZlIG1ldGhvZHMgZG9lc250IGdldCBkZXN0cm95ZWQgdW50aWwgdGhlIHJlc3VsdCBmcm9tIHRoaXMgcHJlQ29uZmlybSdzIHByb21pc2UgaXMgcmVjZWl2ZWRcbiAgICBjb25zdCBwcmVDb25maXJtUHJvbWlzZSA9IFByb21pc2UucmVzb2x2ZSgpLnRoZW4oKCkgPT4gYXNQcm9taXNlKFxuICAgICAgaW5uZXJQYXJhbXMucHJlQ29uZmlybSh2YWx1ZSwgaW5uZXJQYXJhbXMudmFsaWRhdGlvbk1lc3NhZ2UpKVxuICAgIClcbiAgICBwcmVDb25maXJtUHJvbWlzZS50aGVuKFxuICAgICAgKHByZUNvbmZpcm1WYWx1ZSkgPT4ge1xuICAgICAgICBpZiAoaXNWaXNpYmxlKGdldFZhbGlkYXRpb25NZXNzYWdlKCkpIHx8IHByZUNvbmZpcm1WYWx1ZSA9PT0gZmFsc2UpIHtcbiAgICAgICAgICBpbnN0YW5jZS5oaWRlTG9hZGluZygpXG4gICAgICAgIH0gZWxzZSB7XG4gICAgICAgICAgc3VjY2VlZFdpdGgoaW5zdGFuY2UsIHR5cGVvZiBwcmVDb25maXJtVmFsdWUgPT09ICd1bmRlZmluZWQnID8gdmFsdWUgOiBwcmVDb25maXJtVmFsdWUpXG4gICAgICAgIH1cbiAgICAgIH1cbiAgICApLmNhdGNoKChlcnJvcikgPT4gcmVqZWN0V2l0aChpbnN0YW5jZSB8fCB0aGlzLCBlcnJvcikpXG4gIH0gZWxzZSB7XG4gICAgc3VjY2VlZFdpdGgoaW5zdGFuY2UsIHZhbHVlKVxuICB9XG59XG4iLCJpbXBvcnQgeyB1bmRvU2Nyb2xsYmFyIH0gZnJvbSAnLi4vdXRpbHMvc2Nyb2xsYmFyRml4LmpzJ1xuaW1wb3J0IHsgdW5kb0lPU2ZpeCB9IGZyb20gJy4uL3V0aWxzL2lvc0ZpeC5qcydcbmltcG9ydCB7IHVuc2V0QXJpYUhpZGRlbiB9IGZyb20gJy4uL3V0aWxzL2FyaWEuanMnXG5pbXBvcnQgKiBhcyBkb20gZnJvbSAnLi4vdXRpbHMvZG9tL2luZGV4LmpzJ1xuaW1wb3J0IHsgc3dhbENsYXNzZXMgfSBmcm9tICcuLi91dGlscy9jbGFzc2VzLmpzJ1xuaW1wb3J0IGdsb2JhbFN0YXRlLCB7IHJlc3RvcmVBY3RpdmVFbGVtZW50IH0gZnJvbSAnLi4vZ2xvYmFsU3RhdGUuanMnXG5pbXBvcnQgcHJpdmF0ZVByb3BzIGZyb20gJy4uL3ByaXZhdGVQcm9wcy5qcydcbmltcG9ydCBwcml2YXRlTWV0aG9kcyBmcm9tICcuLi9wcml2YXRlTWV0aG9kcy5qcydcblxuLypcbiAqIEluc3RhbmNlIG1ldGhvZCB0byBjbG9zZSBzd2VldEFsZXJ0XG4gKi9cblxuZnVuY3Rpb24gcmVtb3ZlUG9wdXBBbmRSZXNldFN0YXRlIChpbnN0YW5jZSwgY29udGFpbmVyLCByZXR1cm5Gb2N1cywgZGlkQ2xvc2UpIHtcbiAgaWYgKGRvbS5pc1RvYXN0KCkpIHtcbiAgICB0cmlnZ2VyRGlkQ2xvc2VBbmREaXNwb3NlKGluc3RhbmNlLCBkaWRDbG9zZSlcbiAgfSBlbHNlIHtcbiAgICByZXN0b3JlQWN0aXZlRWxlbWVudChyZXR1cm5Gb2N1cykudGhlbigoKSA9PiB0cmlnZ2VyRGlkQ2xvc2VBbmREaXNwb3NlKGluc3RhbmNlLCBkaWRDbG9zZSkpXG4gICAgZ2xvYmFsU3RhdGUua2V5ZG93blRhcmdldC5yZW1vdmVFdmVudExpc3RlbmVyKCdrZXlkb3duJywgZ2xvYmFsU3RhdGUua2V5ZG93bkhhbmRsZXIsIHsgY2FwdHVyZTogZ2xvYmFsU3RhdGUua2V5ZG93bkxpc3RlbmVyQ2FwdHVyZSB9KVxuICAgIGdsb2JhbFN0YXRlLmtleWRvd25IYW5kbGVyQWRkZWQgPSBmYWxzZVxuICB9XG5cbiAgY29uc3QgaXNTYWZhcmkgPSAvXigoPyFjaHJvbWV8YW5kcm9pZCkuKSpzYWZhcmkvaS50ZXN0KG5hdmlnYXRvci51c2VyQWdlbnQpXG4gIC8vIHdvcmthcm91bmQgZm9yICMyMDg4XG4gIC8vIGZvciBzb21lIHJlYXNvbiByZW1vdmluZyB0aGUgY29udGFpbmVyIGluIFNhZmFyaSB3aWxsIHNjcm9sbCB0aGUgZG9jdW1lbnQgdG8gYm90dG9tXG4gIGlmIChpc1NhZmFyaSkge1xuICAgIGNvbnRhaW5lci5zZXRBdHRyaWJ1dGUoJ3N0eWxlJywgJ2Rpc3BsYXk6bm9uZSAhaW1wb3J0YW50JylcbiAgICBjb250YWluZXIucmVtb3ZlQXR0cmlidXRlKCdjbGFzcycpXG4gICAgY29udGFpbmVyLmlubmVySFRNTCA9ICcnXG4gIH0gZWxzZSB7XG4gICAgY29udGFpbmVyLnJlbW92ZSgpXG4gIH1cblxuICBpZiAoZG9tLmlzTW9kYWwoKSkge1xuICAgIHVuZG9TY3JvbGxiYXIoKVxuICAgIHVuZG9JT1NmaXgoKVxuICAgIHVuc2V0QXJpYUhpZGRlbigpXG4gIH1cblxuICByZW1vdmVCb2R5Q2xhc3NlcygpXG59XG5cbmZ1bmN0aW9uIHJlbW92ZUJvZHlDbGFzc2VzICgpIHtcbiAgZG9tLnJlbW92ZUNsYXNzKFxuICAgIFtkb2N1bWVudC5kb2N1bWVudEVsZW1lbnQsIGRvY3VtZW50LmJvZHldLFxuICAgIFtcbiAgICAgIHN3YWxDbGFzc2VzLnNob3duLFxuICAgICAgc3dhbENsYXNzZXNbJ2hlaWdodC1hdXRvJ10sXG4gICAgICBzd2FsQ2xhc3Nlc1snbm8tYmFja2Ryb3AnXSxcbiAgICAgIHN3YWxDbGFzc2VzWyd0b2FzdC1zaG93biddLFxuICAgIF1cbiAgKVxufVxuXG5leHBvcnQgZnVuY3Rpb24gY2xvc2UgKHJlc29sdmVWYWx1ZSkge1xuICByZXNvbHZlVmFsdWUgPSBwcmVwYXJlUmVzb2x2ZVZhbHVlKHJlc29sdmVWYWx1ZSlcblxuICBjb25zdCBzd2FsUHJvbWlzZVJlc29sdmUgPSBwcml2YXRlTWV0aG9kcy5zd2FsUHJvbWlzZVJlc29sdmUuZ2V0KHRoaXMpXG5cbiAgY29uc3QgZGlkQ2xvc2UgPSB0cmlnZ2VyQ2xvc2VQb3B1cCh0aGlzKVxuXG4gIGlmICh0aGlzLmlzQXdhaXRpbmdQcm9taXNlKCkpIHtcbiAgICAvLyBBIHN3YWwgYXdhaXRpbmcgZm9yIGEgcHJvbWlzZSAoYWZ0ZXIgYSBjbGljayBvbiBDb25maXJtIG9yIERlbnkpIGNhbm5vdCBiZSBkaXNtaXNzZWQgYW55bW9yZSAjMjMzNVxuICAgIGlmICghcmVzb2x2ZVZhbHVlLmlzRGlzbWlzc2VkKSB7XG4gICAgICBoYW5kbGVBd2FpdGluZ1Byb21pc2UodGhpcylcbiAgICAgIHN3YWxQcm9taXNlUmVzb2x2ZShyZXNvbHZlVmFsdWUpXG4gICAgfVxuICB9IGVsc2UgaWYgKGRpZENsb3NlKSB7XG4gICAgLy8gUmVzb2x2ZSBTd2FsIHByb21pc2VcbiAgICBzd2FsUHJvbWlzZVJlc29sdmUocmVzb2x2ZVZhbHVlKVxuICB9XG59XG5cbmV4cG9ydCBmdW5jdGlvbiBpc0F3YWl0aW5nUHJvbWlzZSAoKSB7XG4gIHJldHVybiAhIXByaXZhdGVQcm9wcy5hd2FpdGluZ1Byb21pc2UuZ2V0KHRoaXMpXG59XG5cbmNvbnN0IHRyaWdnZXJDbG9zZVBvcHVwID0gKGluc3RhbmNlKSA9PiB7XG4gIGNvbnN0IHBvcHVwID0gZG9tLmdldFBvcHVwKClcblxuICBpZiAoIXBvcHVwKSB7XG4gICAgcmV0dXJuIGZhbHNlXG4gIH1cblxuICBjb25zdCBpbm5lclBhcmFtcyA9IHByaXZhdGVQcm9wcy5pbm5lclBhcmFtcy5nZXQoaW5zdGFuY2UpXG4gIGlmICghaW5uZXJQYXJhbXMgfHwgZG9tLmhhc0NsYXNzKHBvcHVwLCBpbm5lclBhcmFtcy5oaWRlQ2xhc3MucG9wdXApKSB7XG4gICAgcmV0dXJuIGZhbHNlXG4gIH1cblxuICBkb20ucmVtb3ZlQ2xhc3MocG9wdXAsIGlubmVyUGFyYW1zLnNob3dDbGFzcy5wb3B1cClcbiAgZG9tLmFkZENsYXNzKHBvcHVwLCBpbm5lclBhcmFtcy5oaWRlQ2xhc3MucG9wdXApXG5cbiAgY29uc3QgYmFja2Ryb3AgPSBkb20uZ2V0Q29udGFpbmVyKClcbiAgZG9tLnJlbW92ZUNsYXNzKGJhY2tkcm9wLCBpbm5lclBhcmFtcy5zaG93Q2xhc3MuYmFja2Ryb3ApXG4gIGRvbS5hZGRDbGFzcyhiYWNrZHJvcCwgaW5uZXJQYXJhbXMuaGlkZUNsYXNzLmJhY2tkcm9wKVxuXG4gIGhhbmRsZVBvcHVwQW5pbWF0aW9uKGluc3RhbmNlLCBwb3B1cCwgaW5uZXJQYXJhbXMpXG5cbiAgcmV0dXJuIHRydWVcbn1cblxuZXhwb3J0IGZ1bmN0aW9uIHJlamVjdFByb21pc2UgKGVycm9yKSB7XG4gIGNvbnN0IHJlamVjdFByb21pc2UgPSBwcml2YXRlTWV0aG9kcy5zd2FsUHJvbWlzZVJlamVjdC5nZXQodGhpcylcbiAgaGFuZGxlQXdhaXRpbmdQcm9taXNlKHRoaXMpXG4gIGlmIChyZWplY3RQcm9taXNlKSB7XG4gICAgLy8gUmVqZWN0IFN3YWwgcHJvbWlzZVxuICAgIHJlamVjdFByb21pc2UoZXJyb3IpXG4gIH1cbn1cblxuY29uc3QgaGFuZGxlQXdhaXRpbmdQcm9taXNlID0gKGluc3RhbmNlKSA9PiB7XG4gIGlmIChpbnN0YW5jZS5pc0F3YWl0aW5nUHJvbWlzZSgpKSB7XG4gICAgcHJpdmF0ZVByb3BzLmF3YWl0aW5nUHJvbWlzZS5kZWxldGUoaW5zdGFuY2UpXG4gICAgLy8gVGhlIGluc3RhbmNlIG1pZ2h0IGhhdmUgYmVlbiBwcmV2aW91c2x5IHBhcnRseSBkZXN0cm95ZWQsIHdlIG11c3QgcmVzdW1lIHRoZSBkZXN0cm95IHByb2Nlc3MgaW4gdGhpcyBjYXNlICMyMzM1XG4gICAgaWYgKCFwcml2YXRlUHJvcHMuaW5uZXJQYXJhbXMuZ2V0KGluc3RhbmNlKSkge1xuICAgICAgaW5zdGFuY2UuX2Rlc3Ryb3koKVxuICAgIH1cbiAgfVxufVxuXG5jb25zdCBwcmVwYXJlUmVzb2x2ZVZhbHVlID0gKHJlc29sdmVWYWx1ZSkgPT4ge1xuICAvLyBXaGVuIHVzZXIgY2FsbHMgU3dhbC5jbG9zZSgpXG4gIGlmICh0eXBlb2YgcmVzb2x2ZVZhbHVlID09PSAndW5kZWZpbmVkJykge1xuICAgIHJldHVybiB7XG4gICAgICBpc0NvbmZpcm1lZDogZmFsc2UsXG4gICAgICBpc0RlbmllZDogZmFsc2UsXG4gICAgICBpc0Rpc21pc3NlZDogdHJ1ZSxcbiAgICB9XG4gIH1cblxuICByZXR1cm4gT2JqZWN0LmFzc2lnbih7XG4gICAgaXNDb25maXJtZWQ6IGZhbHNlLFxuICAgIGlzRGVuaWVkOiBmYWxzZSxcbiAgICBpc0Rpc21pc3NlZDogZmFsc2UsXG4gIH0sIHJlc29sdmVWYWx1ZSlcbn1cblxuY29uc3QgaGFuZGxlUG9wdXBBbmltYXRpb24gPSAoaW5zdGFuY2UsIHBvcHVwLCBpbm5lclBhcmFtcykgPT4ge1xuICBjb25zdCBjb250YWluZXIgPSBkb20uZ2V0Q29udGFpbmVyKClcbiAgLy8gSWYgYW5pbWF0aW9uIGlzIHN1cHBvcnRlZCwgYW5pbWF0ZVxuICBjb25zdCBhbmltYXRpb25Jc1N1cHBvcnRlZCA9IGRvbS5hbmltYXRpb25FbmRFdmVudCAmJiBkb20uaGFzQ3NzQW5pbWF0aW9uKHBvcHVwKVxuXG4gIGlmICh0eXBlb2YgaW5uZXJQYXJhbXMud2lsbENsb3NlID09PSAnZnVuY3Rpb24nKSB7XG4gICAgaW5uZXJQYXJhbXMud2lsbENsb3NlKHBvcHVwKVxuICB9XG5cbiAgaWYgKGFuaW1hdGlvbklzU3VwcG9ydGVkKSB7XG4gICAgYW5pbWF0ZVBvcHVwKGluc3RhbmNlLCBwb3B1cCwgY29udGFpbmVyLCBpbm5lclBhcmFtcy5yZXR1cm5Gb2N1cywgaW5uZXJQYXJhbXMuZGlkQ2xvc2UpXG4gIH0gZWxzZSB7XG4gICAgLy8gT3RoZXJ3aXNlLCByZW1vdmUgaW1tZWRpYXRlbHlcbiAgICByZW1vdmVQb3B1cEFuZFJlc2V0U3RhdGUoaW5zdGFuY2UsIGNvbnRhaW5lciwgaW5uZXJQYXJhbXMucmV0dXJuRm9jdXMsIGlubmVyUGFyYW1zLmRpZENsb3NlKVxuICB9XG59XG5cbmNvbnN0IGFuaW1hdGVQb3B1cCA9IChpbnN0YW5jZSwgcG9wdXAsIGNvbnRhaW5lciwgcmV0dXJuRm9jdXMsIGRpZENsb3NlKSA9PiB7XG4gIGdsb2JhbFN0YXRlLnN3YWxDbG9zZUV2ZW50RmluaXNoZWRDYWxsYmFjayA9IHJlbW92ZVBvcHVwQW5kUmVzZXRTdGF0ZS5iaW5kKG51bGwsIGluc3RhbmNlLCBjb250YWluZXIsIHJldHVybkZvY3VzLCBkaWRDbG9zZSlcbiAgcG9wdXAuYWRkRXZlbnRMaXN0ZW5lcihkb20uYW5pbWF0aW9uRW5kRXZlbnQsIGZ1bmN0aW9uIChlKSB7XG4gICAgaWYgKGUudGFyZ2V0ID09PSBwb3B1cCkge1xuICAgICAgZ2xvYmFsU3RhdGUuc3dhbENsb3NlRXZlbnRGaW5pc2hlZENhbGxiYWNrKClcbiAgICAgIGRlbGV0ZSBnbG9iYWxTdGF0ZS5zd2FsQ2xvc2VFdmVudEZpbmlzaGVkQ2FsbGJhY2tcbiAgICB9XG4gIH0pXG59XG5cbmNvbnN0IHRyaWdnZXJEaWRDbG9zZUFuZERpc3Bvc2UgPSAoaW5zdGFuY2UsIGRpZENsb3NlKSA9PiB7XG4gIHNldFRpbWVvdXQoKCkgPT4ge1xuICAgIGlmICh0eXBlb2YgZGlkQ2xvc2UgPT09ICdmdW5jdGlvbicpIHtcbiAgICAgIGRpZENsb3NlLmJpbmQoaW5zdGFuY2UucGFyYW1zKSgpXG4gICAgfVxuICAgIGluc3RhbmNlLl9kZXN0cm95KClcbiAgfSlcbn1cblxuZXhwb3J0IHtcbiAgY2xvc2UgYXMgY2xvc2VQb3B1cCxcbiAgY2xvc2UgYXMgY2xvc2VNb2RhbCxcbiAgY2xvc2UgYXMgY2xvc2VUb2FzdFxufVxuIiwiaW1wb3J0IHByaXZhdGVQcm9wcyBmcm9tICcuLi9wcml2YXRlUHJvcHMuanMnXG5cbmZ1bmN0aW9uIHNldEJ1dHRvbnNEaXNhYmxlZCAoaW5zdGFuY2UsIGJ1dHRvbnMsIGRpc2FibGVkKSB7XG4gIGNvbnN0IGRvbUNhY2hlID0gcHJpdmF0ZVByb3BzLmRvbUNhY2hlLmdldChpbnN0YW5jZSlcbiAgYnV0dG9ucy5mb3JFYWNoKGJ1dHRvbiA9PiB7XG4gICAgZG9tQ2FjaGVbYnV0dG9uXS5kaXNhYmxlZCA9IGRpc2FibGVkXG4gIH0pXG59XG5cbmZ1bmN0aW9uIHNldElucHV0RGlzYWJsZWQgKGlucHV0LCBkaXNhYmxlZCkge1xuICBpZiAoIWlucHV0KSB7XG4gICAgcmV0dXJuIGZhbHNlXG4gIH1cbiAgaWYgKGlucHV0LnR5cGUgPT09ICdyYWRpbycpIHtcbiAgICBjb25zdCByYWRpb3NDb250YWluZXIgPSBpbnB1dC5wYXJlbnROb2RlLnBhcmVudE5vZGVcbiAgICBjb25zdCByYWRpb3MgPSByYWRpb3NDb250YWluZXIucXVlcnlTZWxlY3RvckFsbCgnaW5wdXQnKVxuICAgIGZvciAobGV0IGkgPSAwOyBpIDwgcmFkaW9zLmxlbmd0aDsgaSsrKSB7XG4gICAgICByYWRpb3NbaV0uZGlzYWJsZWQgPSBkaXNhYmxlZFxuICAgIH1cbiAgfSBlbHNlIHtcbiAgICBpbnB1dC5kaXNhYmxlZCA9IGRpc2FibGVkXG4gIH1cbn1cblxuZXhwb3J0IGZ1bmN0aW9uIGVuYWJsZUJ1dHRvbnMgKCkge1xuICBzZXRCdXR0b25zRGlzYWJsZWQodGhpcywgWydjb25maXJtQnV0dG9uJywgJ2RlbnlCdXR0b24nLCAnY2FuY2VsQnV0dG9uJ10sIGZhbHNlKVxufVxuXG5leHBvcnQgZnVuY3Rpb24gZGlzYWJsZUJ1dHRvbnMgKCkge1xuICBzZXRCdXR0b25zRGlzYWJsZWQodGhpcywgWydjb25maXJtQnV0dG9uJywgJ2RlbnlCdXR0b24nLCAnY2FuY2VsQnV0dG9uJ10sIHRydWUpXG59XG5cbmV4cG9ydCBmdW5jdGlvbiBlbmFibGVJbnB1dCAoKSB7XG4gIHJldHVybiBzZXRJbnB1dERpc2FibGVkKHRoaXMuZ2V0SW5wdXQoKSwgZmFsc2UpXG59XG5cbmV4cG9ydCBmdW5jdGlvbiBkaXNhYmxlSW5wdXQgKCkge1xuICByZXR1cm4gc2V0SW5wdXREaXNhYmxlZCh0aGlzLmdldElucHV0KCksIHRydWUpXG59XG4iLCJpbXBvcnQgKiBhcyBkb20gZnJvbSAnLi4vdXRpbHMvZG9tL2luZGV4LmpzJ1xuaW1wb3J0IHByaXZhdGVQcm9wcyBmcm9tICcuLi9wcml2YXRlUHJvcHMuanMnXG5cbi8vIEdldCBpbnB1dCBlbGVtZW50IGJ5IHNwZWNpZmllZCB0eXBlIG9yLCBpZiB0eXBlIGlzbid0IHNwZWNpZmllZCwgYnkgcGFyYW1zLmlucHV0XG5leHBvcnQgZnVuY3Rpb24gZ2V0SW5wdXQgKGluc3RhbmNlKSB7XG4gIGNvbnN0IGlubmVyUGFyYW1zID0gcHJpdmF0ZVByb3BzLmlubmVyUGFyYW1zLmdldChpbnN0YW5jZSB8fCB0aGlzKVxuICBjb25zdCBkb21DYWNoZSA9IHByaXZhdGVQcm9wcy5kb21DYWNoZS5nZXQoaW5zdGFuY2UgfHwgdGhpcylcbiAgaWYgKCFkb21DYWNoZSkge1xuICAgIHJldHVybiBudWxsXG4gIH1cbiAgcmV0dXJuIGRvbS5nZXRJbnB1dChkb21DYWNoZS5wb3B1cCwgaW5uZXJQYXJhbXMuaW5wdXQpXG59XG4iLCJpbXBvcnQgKiBhcyBkb20gZnJvbSAnLi4vdXRpbHMvZG9tL2luZGV4LmpzJ1xuaW1wb3J0IHsgc3dhbENsYXNzZXMgfSBmcm9tICcuLi91dGlscy9jbGFzc2VzLmpzJ1xuaW1wb3J0IHByaXZhdGVQcm9wcyBmcm9tICcuLi9wcml2YXRlUHJvcHMuanMnXG5cbi8qKlxuICogSGlkZXMgbG9hZGVyIGFuZCBzaG93cyBiYWNrIHRoZSBidXR0b24gd2hpY2ggd2FzIGhpZGRlbiBieSAuc2hvd0xvYWRpbmcoKVxuICovXG5mdW5jdGlvbiBoaWRlTG9hZGluZyAoKSB7XG4gIC8vIGRvIG5vdGhpbmcgaWYgcG9wdXAgaXMgY2xvc2VkXG4gIGNvbnN0IGlubmVyUGFyYW1zID0gcHJpdmF0ZVByb3BzLmlubmVyUGFyYW1zLmdldCh0aGlzKVxuICBpZiAoIWlubmVyUGFyYW1zKSB7XG4gICAgcmV0dXJuXG4gIH1cbiAgY29uc3QgZG9tQ2FjaGUgPSBwcml2YXRlUHJvcHMuZG9tQ2FjaGUuZ2V0KHRoaXMpXG4gIGRvbS5oaWRlKGRvbUNhY2hlLmxvYWRlcilcbiAgaWYgKGRvbS5pc1RvYXN0KCkpIHtcbiAgICBpZiAoaW5uZXJQYXJhbXMuaWNvbikge1xuICAgICAgZG9tLnNob3coZG9tLmdldEljb24oKSlcbiAgICB9XG4gIH0gZWxzZSB7XG4gICAgc2hvd1JlbGF0ZWRCdXR0b24oZG9tQ2FjaGUpXG4gIH1cbiAgZG9tLnJlbW92ZUNsYXNzKFtkb21DYWNoZS5wb3B1cCwgZG9tQ2FjaGUuYWN0aW9uc10sIHN3YWxDbGFzc2VzLmxvYWRpbmcpXG4gIGRvbUNhY2hlLnBvcHVwLnJlbW92ZUF0dHJpYnV0ZSgnYXJpYS1idXN5JylcbiAgZG9tQ2FjaGUucG9wdXAucmVtb3ZlQXR0cmlidXRlKCdkYXRhLWxvYWRpbmcnKVxuICBkb21DYWNoZS5jb25maXJtQnV0dG9uLmRpc2FibGVkID0gZmFsc2VcbiAgZG9tQ2FjaGUuZGVueUJ1dHRvbi5kaXNhYmxlZCA9IGZhbHNlXG4gIGRvbUNhY2hlLmNhbmNlbEJ1dHRvbi5kaXNhYmxlZCA9IGZhbHNlXG59XG5cbmNvbnN0IHNob3dSZWxhdGVkQnV0dG9uID0gKGRvbUNhY2hlKSA9PiB7XG4gIGNvbnN0IGJ1dHRvblRvUmVwbGFjZSA9IGRvbUNhY2hlLnBvcHVwLmdldEVsZW1lbnRzQnlDbGFzc05hbWUoZG9tQ2FjaGUubG9hZGVyLmdldEF0dHJpYnV0ZSgnZGF0YS1idXR0b24tdG8tcmVwbGFjZScpKVxuICBpZiAoYnV0dG9uVG9SZXBsYWNlLmxlbmd0aCkge1xuICAgIGRvbS5zaG93KGJ1dHRvblRvUmVwbGFjZVswXSwgJ2lubGluZS1ibG9jaycpXG4gIH0gZWxzZSBpZiAoZG9tLmFsbEJ1dHRvbnNBcmVIaWRkZW4oKSkge1xuICAgIGRvbS5oaWRlKGRvbUNhY2hlLmFjdGlvbnMpXG4gIH1cbn1cblxuZXhwb3J0IHtcbiAgaGlkZUxvYWRpbmcsXG4gIGhpZGVMb2FkaW5nIGFzIGRpc2FibGVMb2FkaW5nXG59XG4iLCJpbXBvcnQgKiBhcyBkb20gZnJvbSAnLi4vdXRpbHMvZG9tL2luZGV4LmpzJ1xuaW1wb3J0IHsgRGlzbWlzc1JlYXNvbiB9IGZyb20gJy4uL3V0aWxzL0Rpc21pc3NSZWFzb24uanMnXG5pbXBvcnQgeyBjYWxsSWZGdW5jdGlvbiB9IGZyb20gJy4uL3V0aWxzL3V0aWxzLmpzJ1xuaW1wb3J0IHsgY2xpY2tDb25maXJtIH0gZnJvbSAnLi4vc3RhdGljTWV0aG9kcy9kb20uanMnXG5pbXBvcnQgcHJpdmF0ZVByb3BzIGZyb20gJy4uL3ByaXZhdGVQcm9wcy5qcydcblxuZXhwb3J0IGNvbnN0IGFkZEtleWRvd25IYW5kbGVyID0gKGluc3RhbmNlLCBnbG9iYWxTdGF0ZSwgaW5uZXJQYXJhbXMsIGRpc21pc3NXaXRoKSA9PiB7XG4gIGlmIChnbG9iYWxTdGF0ZS5rZXlkb3duVGFyZ2V0ICYmIGdsb2JhbFN0YXRlLmtleWRvd25IYW5kbGVyQWRkZWQpIHtcbiAgICBnbG9iYWxTdGF0ZS5rZXlkb3duVGFyZ2V0LnJlbW92ZUV2ZW50TGlzdGVuZXIoJ2tleWRvd24nLCBnbG9iYWxTdGF0ZS5rZXlkb3duSGFuZGxlciwgeyBjYXB0dXJlOiBnbG9iYWxTdGF0ZS5rZXlkb3duTGlzdGVuZXJDYXB0dXJlIH0pXG4gICAgZ2xvYmFsU3RhdGUua2V5ZG93bkhhbmRsZXJBZGRlZCA9IGZhbHNlXG4gIH1cblxuICBpZiAoIWlubmVyUGFyYW1zLnRvYXN0KSB7XG4gICAgZ2xvYmFsU3RhdGUua2V5ZG93bkhhbmRsZXIgPSAoZSkgPT4ga2V5ZG93bkhhbmRsZXIoaW5zdGFuY2UsIGUsIGRpc21pc3NXaXRoKVxuICAgIGdsb2JhbFN0YXRlLmtleWRvd25UYXJnZXQgPSBpbm5lclBhcmFtcy5rZXlkb3duTGlzdGVuZXJDYXB0dXJlID8gd2luZG93IDogZG9tLmdldFBvcHVwKClcbiAgICBnbG9iYWxTdGF0ZS5rZXlkb3duTGlzdGVuZXJDYXB0dXJlID0gaW5uZXJQYXJhbXMua2V5ZG93bkxpc3RlbmVyQ2FwdHVyZVxuICAgIGdsb2JhbFN0YXRlLmtleWRvd25UYXJnZXQuYWRkRXZlbnRMaXN0ZW5lcigna2V5ZG93bicsIGdsb2JhbFN0YXRlLmtleWRvd25IYW5kbGVyLCB7IGNhcHR1cmU6IGdsb2JhbFN0YXRlLmtleWRvd25MaXN0ZW5lckNhcHR1cmUgfSlcbiAgICBnbG9iYWxTdGF0ZS5rZXlkb3duSGFuZGxlckFkZGVkID0gdHJ1ZVxuICB9XG59XG5cbi8vIEZvY3VzIGhhbmRsaW5nXG5leHBvcnQgY29uc3Qgc2V0Rm9jdXMgPSAoaW5uZXJQYXJhbXMsIGluZGV4LCBpbmNyZW1lbnQpID0+IHtcbiAgY29uc3QgZm9jdXNhYmxlRWxlbWVudHMgPSBkb20uZ2V0Rm9jdXNhYmxlRWxlbWVudHMoKVxuICAvLyBzZWFyY2ggZm9yIHZpc2libGUgZWxlbWVudHMgYW5kIHNlbGVjdCB0aGUgbmV4dCBwb3NzaWJsZSBtYXRjaFxuICBpZiAoZm9jdXNhYmxlRWxlbWVudHMubGVuZ3RoKSB7XG4gICAgaW5kZXggPSBpbmRleCArIGluY3JlbWVudFxuXG4gICAgLy8gcm9sbG92ZXIgdG8gZmlyc3QgaXRlbVxuICAgIGlmIChpbmRleCA9PT0gZm9jdXNhYmxlRWxlbWVudHMubGVuZ3RoKSB7XG4gICAgICBpbmRleCA9IDBcblxuICAgICAgLy8gZ28gdG8gbGFzdCBpdGVtXG4gICAgfSBlbHNlIGlmIChpbmRleCA9PT0gLTEpIHtcbiAgICAgIGluZGV4ID0gZm9jdXNhYmxlRWxlbWVudHMubGVuZ3RoIC0gMVxuICAgIH1cblxuICAgIHJldHVybiBmb2N1c2FibGVFbGVtZW50c1tpbmRleF0uZm9jdXMoKVxuICB9XG4gIC8vIG5vIHZpc2libGUgZm9jdXNhYmxlIGVsZW1lbnRzLCBmb2N1cyB0aGUgcG9wdXBcbiAgZG9tLmdldFBvcHVwKCkuZm9jdXMoKVxufVxuXG5jb25zdCBhcnJvd0tleXNOZXh0QnV0dG9uID0gW1xuICAnQXJyb3dSaWdodCcsICdBcnJvd0Rvd24nLFxuXVxuXG5jb25zdCBhcnJvd0tleXNQcmV2aW91c0J1dHRvbiA9IFtcbiAgJ0Fycm93TGVmdCcsICdBcnJvd1VwJyxcbl1cblxuY29uc3Qga2V5ZG93bkhhbmRsZXIgPSAoaW5zdGFuY2UsIGUsIGRpc21pc3NXaXRoKSA9PiB7XG4gIGNvbnN0IGlubmVyUGFyYW1zID0gcHJpdmF0ZVByb3BzLmlubmVyUGFyYW1zLmdldChpbnN0YW5jZSlcblxuICBpZiAoIWlubmVyUGFyYW1zKSB7XG4gICAgcmV0dXJuIC8vIFRoaXMgaW5zdGFuY2UgaGFzIGFscmVhZHkgYmVlbiBkZXN0cm95ZWRcbiAgfVxuXG4gIGlmIChpbm5lclBhcmFtcy5zdG9wS2V5ZG93blByb3BhZ2F0aW9uKSB7XG4gICAgZS5zdG9wUHJvcGFnYXRpb24oKVxuICB9XG5cbiAgLy8gRU5URVJcbiAgaWYgKGUua2V5ID09PSAnRW50ZXInKSB7XG4gICAgaGFuZGxlRW50ZXIoaW5zdGFuY2UsIGUsIGlubmVyUGFyYW1zKVxuXG4gIC8vIFRBQlxuICB9IGVsc2UgaWYgKGUua2V5ID09PSAnVGFiJykge1xuICAgIGhhbmRsZVRhYihlLCBpbm5lclBhcmFtcylcblxuICAvLyBBUlJPV1MgLSBzd2l0Y2ggZm9jdXMgYmV0d2VlbiBidXR0b25zXG4gIH0gZWxzZSBpZiAoWy4uLmFycm93S2V5c05leHRCdXR0b24sIC4uLmFycm93S2V5c1ByZXZpb3VzQnV0dG9uXS5pbmNsdWRlcyhlLmtleSkpIHtcbiAgICBoYW5kbGVBcnJvd3MoZS5rZXkpXG5cbiAgLy8gRVNDXG4gIH0gZWxzZSBpZiAoZS5rZXkgPT09ICdFc2NhcGUnKSB7XG4gICAgaGFuZGxlRXNjKGUsIGlubmVyUGFyYW1zLCBkaXNtaXNzV2l0aClcbiAgfVxufVxuXG5jb25zdCBoYW5kbGVFbnRlciA9IChpbnN0YW5jZSwgZSwgaW5uZXJQYXJhbXMpID0+IHtcbiAgLy8gIzcyMCAjNzIxXG4gIGlmIChlLmlzQ29tcG9zaW5nKSB7XG4gICAgcmV0dXJuXG4gIH1cblxuICBpZiAoZS50YXJnZXQgJiYgaW5zdGFuY2UuZ2V0SW5wdXQoKSAmJiBlLnRhcmdldC5vdXRlckhUTUwgPT09IGluc3RhbmNlLmdldElucHV0KCkub3V0ZXJIVE1MKSB7XG4gICAgaWYgKFsndGV4dGFyZWEnLCAnZmlsZSddLmluY2x1ZGVzKGlubmVyUGFyYW1zLmlucHV0KSkge1xuICAgICAgcmV0dXJuIC8vIGRvIG5vdCBzdWJtaXRcbiAgICB9XG5cbiAgICBjbGlja0NvbmZpcm0oKVxuICAgIGUucHJldmVudERlZmF1bHQoKVxuICB9XG59XG5cbmNvbnN0IGhhbmRsZVRhYiA9IChlLCBpbm5lclBhcmFtcykgPT4ge1xuICBjb25zdCB0YXJnZXRFbGVtZW50ID0gZS50YXJnZXRcblxuICBjb25zdCBmb2N1c2FibGVFbGVtZW50cyA9IGRvbS5nZXRGb2N1c2FibGVFbGVtZW50cygpXG4gIGxldCBidG5JbmRleCA9IC0xXG4gIGZvciAobGV0IGkgPSAwOyBpIDwgZm9jdXNhYmxlRWxlbWVudHMubGVuZ3RoOyBpKyspIHtcbiAgICBpZiAodGFyZ2V0RWxlbWVudCA9PT0gZm9jdXNhYmxlRWxlbWVudHNbaV0pIHtcbiAgICAgIGJ0bkluZGV4ID0gaVxuICAgICAgYnJlYWtcbiAgICB9XG4gIH1cblxuICBpZiAoIWUuc2hpZnRLZXkpIHtcbiAgICAvLyBDeWNsZSB0byB0aGUgbmV4dCBidXR0b25cbiAgICBzZXRGb2N1cyhpbm5lclBhcmFtcywgYnRuSW5kZXgsIDEpXG4gIH0gZWxzZSB7XG4gICAgLy8gQ3ljbGUgdG8gdGhlIHByZXYgYnV0dG9uXG4gICAgc2V0Rm9jdXMoaW5uZXJQYXJhbXMsIGJ0bkluZGV4LCAtMSlcbiAgfVxuICBlLnN0b3BQcm9wYWdhdGlvbigpXG4gIGUucHJldmVudERlZmF1bHQoKVxufVxuXG5jb25zdCBoYW5kbGVBcnJvd3MgPSAoa2V5KSA9PiB7XG4gIGNvbnN0IGNvbmZpcm1CdXR0b24gPSBkb20uZ2V0Q29uZmlybUJ1dHRvbigpXG4gIGNvbnN0IGRlbnlCdXR0b24gPSBkb20uZ2V0RGVueUJ1dHRvbigpXG4gIGNvbnN0IGNhbmNlbEJ1dHRvbiA9IGRvbS5nZXRDYW5jZWxCdXR0b24oKVxuICBpZiAoIVtjb25maXJtQnV0dG9uLCBkZW55QnV0dG9uLCBjYW5jZWxCdXR0b25dLmluY2x1ZGVzKGRvY3VtZW50LmFjdGl2ZUVsZW1lbnQpKSB7XG4gICAgcmV0dXJuXG4gIH1cbiAgY29uc3Qgc2libGluZyA9IGFycm93S2V5c05leHRCdXR0b24uaW5jbHVkZXMoa2V5KSA/ICduZXh0RWxlbWVudFNpYmxpbmcnIDogJ3ByZXZpb3VzRWxlbWVudFNpYmxpbmcnXG4gIGNvbnN0IGJ1dHRvblRvRm9jdXMgPSBkb2N1bWVudC5hY3RpdmVFbGVtZW50W3NpYmxpbmddXG4gIGlmIChidXR0b25Ub0ZvY3VzKSB7XG4gICAgYnV0dG9uVG9Gb2N1cy5mb2N1cygpXG4gIH1cbn1cblxuY29uc3QgaGFuZGxlRXNjID0gKGUsIGlubmVyUGFyYW1zLCBkaXNtaXNzV2l0aCkgPT4ge1xuICBpZiAoY2FsbElmRnVuY3Rpb24oaW5uZXJQYXJhbXMuYWxsb3dFc2NhcGVLZXkpKSB7XG4gICAgZS5wcmV2ZW50RGVmYXVsdCgpXG4gICAgZGlzbWlzc1dpdGgoRGlzbWlzc1JlYXNvbi5lc2MpXG4gIH1cbn1cbiIsImltcG9ydCB7IGNhbGxJZkZ1bmN0aW9uIH0gZnJvbSAnLi4vdXRpbHMvdXRpbHMuanMnXG5pbXBvcnQgeyBEaXNtaXNzUmVhc29uIH0gZnJvbSAnLi4vdXRpbHMvRGlzbWlzc1JlYXNvbi5qcydcbmltcG9ydCBwcml2YXRlUHJvcHMgZnJvbSAnLi4vcHJpdmF0ZVByb3BzLmpzJ1xuXG5leHBvcnQgY29uc3QgaGFuZGxlUG9wdXBDbGljayA9IChpbnN0YW5jZSwgZG9tQ2FjaGUsIGRpc21pc3NXaXRoKSA9PiB7XG4gIGNvbnN0IGlubmVyUGFyYW1zID0gcHJpdmF0ZVByb3BzLmlubmVyUGFyYW1zLmdldChpbnN0YW5jZSlcbiAgaWYgKGlubmVyUGFyYW1zLnRvYXN0KSB7XG4gICAgaGFuZGxlVG9hc3RDbGljayhpbnN0YW5jZSwgZG9tQ2FjaGUsIGRpc21pc3NXaXRoKVxuICB9IGVsc2Uge1xuICAgIC8vIElnbm9yZSBjbGljayBldmVudHMgdGhhdCBoYWQgbW91c2Vkb3duIG9uIHRoZSBwb3B1cCBidXQgbW91c2V1cCBvbiB0aGUgY29udGFpbmVyXG4gICAgLy8gVGhpcyBjYW4gaGFwcGVuIHdoZW4gdGhlIHVzZXIgZHJhZ3MgYSBzbGlkZXJcbiAgICBoYW5kbGVNb2RhbE1vdXNlZG93bihkb21DYWNoZSlcblxuICAgIC8vIElnbm9yZSBjbGljayBldmVudHMgdGhhdCBoYWQgbW91c2Vkb3duIG9uIHRoZSBjb250YWluZXIgYnV0IG1vdXNldXAgb24gdGhlIHBvcHVwXG4gICAgaGFuZGxlQ29udGFpbmVyTW91c2Vkb3duKGRvbUNhY2hlKVxuXG4gICAgaGFuZGxlTW9kYWxDbGljayhpbnN0YW5jZSwgZG9tQ2FjaGUsIGRpc21pc3NXaXRoKVxuICB9XG59XG5cbmNvbnN0IGhhbmRsZVRvYXN0Q2xpY2sgPSAoaW5zdGFuY2UsIGRvbUNhY2hlLCBkaXNtaXNzV2l0aCkgPT4ge1xuICAvLyBDbG9zaW5nIHRvYXN0IGJ5IGludGVybmFsIGNsaWNrXG4gIGRvbUNhY2hlLnBvcHVwLm9uY2xpY2sgPSAoKSA9PiB7XG4gICAgY29uc3QgaW5uZXJQYXJhbXMgPSBwcml2YXRlUHJvcHMuaW5uZXJQYXJhbXMuZ2V0KGluc3RhbmNlKVxuICAgIGlmIChcbiAgICAgIGlubmVyUGFyYW1zLnNob3dDb25maXJtQnV0dG9uIHx8XG4gICAgICBpbm5lclBhcmFtcy5zaG93RGVueUJ1dHRvbiB8fFxuICAgICAgaW5uZXJQYXJhbXMuc2hvd0NhbmNlbEJ1dHRvbiB8fFxuICAgICAgaW5uZXJQYXJhbXMuc2hvd0Nsb3NlQnV0dG9uIHx8XG4gICAgICBpbm5lclBhcmFtcy50aW1lciB8fFxuICAgICAgaW5uZXJQYXJhbXMuaW5wdXRcbiAgICApIHtcbiAgICAgIHJldHVyblxuICAgIH1cbiAgICBkaXNtaXNzV2l0aChEaXNtaXNzUmVhc29uLmNsb3NlKVxuICB9XG59XG5cbmxldCBpZ25vcmVPdXRzaWRlQ2xpY2sgPSBmYWxzZVxuXG5jb25zdCBoYW5kbGVNb2RhbE1vdXNlZG93biA9IChkb21DYWNoZSkgPT4ge1xuICBkb21DYWNoZS5wb3B1cC5vbm1vdXNlZG93biA9ICgpID0+IHtcbiAgICBkb21DYWNoZS5jb250YWluZXIub25tb3VzZXVwID0gZnVuY3Rpb24gKGUpIHtcbiAgICAgIGRvbUNhY2hlLmNvbnRhaW5lci5vbm1vdXNldXAgPSB1bmRlZmluZWRcbiAgICAgIC8vIFdlIG9ubHkgY2hlY2sgaWYgdGhlIG1vdXNldXAgdGFyZ2V0IGlzIHRoZSBjb250YWluZXIgYmVjYXVzZSB1c3VhbGx5IGl0IGRvZXNuJ3RcbiAgICAgIC8vIGhhdmUgYW55IG90aGVyIGRpcmVjdCBjaGlsZHJlbiBhc2lkZSBvZiB0aGUgcG9wdXBcbiAgICAgIGlmIChlLnRhcmdldCA9PT0gZG9tQ2FjaGUuY29udGFpbmVyKSB7XG4gICAgICAgIGlnbm9yZU91dHNpZGVDbGljayA9IHRydWVcbiAgICAgIH1cbiAgICB9XG4gIH1cbn1cblxuY29uc3QgaGFuZGxlQ29udGFpbmVyTW91c2Vkb3duID0gKGRvbUNhY2hlKSA9PiB7XG4gIGRvbUNhY2hlLmNvbnRhaW5lci5vbm1vdXNlZG93biA9ICgpID0+IHtcbiAgICBkb21DYWNoZS5wb3B1cC5vbm1vdXNldXAgPSBmdW5jdGlvbiAoZSkge1xuICAgICAgZG9tQ2FjaGUucG9wdXAub25tb3VzZXVwID0gdW5kZWZpbmVkXG4gICAgICAvLyBXZSBhbHNvIG5lZWQgdG8gY2hlY2sgaWYgdGhlIG1vdXNldXAgdGFyZ2V0IGlzIGEgY2hpbGQgb2YgdGhlIHBvcHVwXG4gICAgICBpZiAoZS50YXJnZXQgPT09IGRvbUNhY2hlLnBvcHVwIHx8IGRvbUNhY2hlLnBvcHVwLmNvbnRhaW5zKGUudGFyZ2V0KSkge1xuICAgICAgICBpZ25vcmVPdXRzaWRlQ2xpY2sgPSB0cnVlXG4gICAgICB9XG4gICAgfVxuICB9XG59XG5cbmNvbnN0IGhhbmRsZU1vZGFsQ2xpY2sgPSAoaW5zdGFuY2UsIGRvbUNhY2hlLCBkaXNtaXNzV2l0aCkgPT4ge1xuICBkb21DYWNoZS5jb250YWluZXIub25jbGljayA9IChlKSA9PiB7XG4gICAgY29uc3QgaW5uZXJQYXJhbXMgPSBwcml2YXRlUHJvcHMuaW5uZXJQYXJhbXMuZ2V0KGluc3RhbmNlKVxuICAgIGlmIChpZ25vcmVPdXRzaWRlQ2xpY2spIHtcbiAgICAgIGlnbm9yZU91dHNpZGVDbGljayA9IGZhbHNlXG4gICAgICByZXR1cm5cbiAgICB9XG4gICAgaWYgKGUudGFyZ2V0ID09PSBkb21DYWNoZS5jb250YWluZXIgJiYgY2FsbElmRnVuY3Rpb24oaW5uZXJQYXJhbXMuYWxsb3dPdXRzaWRlQ2xpY2spKSB7XG4gICAgICBkaXNtaXNzV2l0aChEaXNtaXNzUmVhc29uLmJhY2tkcm9wKVxuICAgIH1cbiAgfVxufVxuIiwiaW1wb3J0IHByaXZhdGVQcm9wcyBmcm9tICcuLi9wcml2YXRlUHJvcHMuanMnXG5cbmV4cG9ydCBmdW5jdGlvbiBnZXRQcm9ncmVzc1N0ZXBzICgpIHtcbiAgY29uc3QgZG9tQ2FjaGUgPSBwcml2YXRlUHJvcHMuZG9tQ2FjaGUuZ2V0KHRoaXMpXG4gIHJldHVybiBkb21DYWNoZS5wcm9ncmVzc1N0ZXBzXG59XG4iLCJpbXBvcnQgKiBhcyBkb20gZnJvbSAnLi4vLi4vc3JjL3V0aWxzL2RvbS9pbmRleC5qcydcbmltcG9ydCB7IHdhcm4gfSBmcm9tICcuLi8uLi9zcmMvdXRpbHMvdXRpbHMuanMnXG5pbXBvcnQgc3dlZXRBbGVydCBmcm9tICcuLi9zd2VldGFsZXJ0Mi5qcydcbmltcG9ydCBwcml2YXRlUHJvcHMgZnJvbSAnLi4vcHJpdmF0ZVByb3BzLmpzJ1xuXG4vKipcbiAqIFVwZGF0ZXMgcG9wdXAgcGFyYW1ldGVycy5cbiAqL1xuZXhwb3J0IGZ1bmN0aW9uIHVwZGF0ZSAocGFyYW1zKSB7XG4gIGNvbnN0IHBvcHVwID0gZG9tLmdldFBvcHVwKClcbiAgY29uc3QgaW5uZXJQYXJhbXMgPSBwcml2YXRlUHJvcHMuaW5uZXJQYXJhbXMuZ2V0KHRoaXMpXG5cbiAgaWYgKCFwb3B1cCB8fCBkb20uaGFzQ2xhc3MocG9wdXAsIGlubmVyUGFyYW1zLmhpZGVDbGFzcy5wb3B1cCkpIHtcbiAgICByZXR1cm4gd2FybihgWW91J3JlIHRyeWluZyB0byB1cGRhdGUgdGhlIGNsb3NlZCBvciBjbG9zaW5nIHBvcHVwLCB0aGF0IHdvbid0IHdvcmsuIFVzZSB0aGUgdXBkYXRlKCkgbWV0aG9kIGluIHByZUNvbmZpcm0gcGFyYW1ldGVyIG9yIHNob3cgYSBuZXcgcG9wdXAuYClcbiAgfVxuXG4gIGNvbnN0IHZhbGlkVXBkYXRhYmxlUGFyYW1zID0ge31cblxuICAvLyBhc3NpZ24gdmFsaWQgcGFyYW1zIGZyb20gYHBhcmFtc2AgdG8gYGRlZmF1bHRzYFxuICBPYmplY3Qua2V5cyhwYXJhbXMpLmZvckVhY2gocGFyYW0gPT4ge1xuICAgIGlmIChzd2VldEFsZXJ0LmlzVXBkYXRhYmxlUGFyYW1ldGVyKHBhcmFtKSkge1xuICAgICAgdmFsaWRVcGRhdGFibGVQYXJhbXNbcGFyYW1dID0gcGFyYW1zW3BhcmFtXVxuICAgIH0gZWxzZSB7XG4gICAgICB3YXJuKGBJbnZhbGlkIHBhcmFtZXRlciB0byB1cGRhdGU6IFwiJHtwYXJhbX1cIi4gVXBkYXRhYmxlIHBhcmFtcyBhcmUgbGlzdGVkIGhlcmU6IGh0dHBzOi8vZ2l0aHViLmNvbS9zd2VldGFsZXJ0Mi9zd2VldGFsZXJ0Mi9ibG9iL21hc3Rlci9zcmMvdXRpbHMvcGFyYW1zLmpzXFxuXFxuSWYgeW91IHRoaW5rIHRoaXMgcGFyYW1ldGVyIHNob3VsZCBiZSB1cGRhdGFibGUsIHJlcXVlc3QgaXQgaGVyZTogaHR0cHM6Ly9naXRodWIuY29tL3N3ZWV0YWxlcnQyL3N3ZWV0YWxlcnQyL2lzc3Vlcy9uZXc/dGVtcGxhdGU9MDJfZmVhdHVyZV9yZXF1ZXN0Lm1kYClcbiAgICB9XG4gIH0pXG5cbiAgY29uc3QgdXBkYXRlZFBhcmFtcyA9IE9iamVjdC5hc3NpZ24oe30sIGlubmVyUGFyYW1zLCB2YWxpZFVwZGF0YWJsZVBhcmFtcylcblxuICBkb20ucmVuZGVyKHRoaXMsIHVwZGF0ZWRQYXJhbXMpXG5cbiAgcHJpdmF0ZVByb3BzLmlubmVyUGFyYW1zLnNldCh0aGlzLCB1cGRhdGVkUGFyYW1zKVxuICBPYmplY3QuZGVmaW5lUHJvcGVydGllcyh0aGlzLCB7XG4gICAgcGFyYW1zOiB7XG4gICAgICB2YWx1ZTogT2JqZWN0LmFzc2lnbih7fSwgdGhpcy5wYXJhbXMsIHBhcmFtcyksXG4gICAgICB3cml0YWJsZTogZmFsc2UsXG4gICAgICBlbnVtZXJhYmxlOiB0cnVlXG4gICAgfVxuICB9KVxufVxuIiwiaW1wb3J0ICogYXMgZG9tIGZyb20gJy4uL3V0aWxzL2RvbS9pbmRleC5qcydcbmltcG9ydCB7IHN3YWxDbGFzc2VzIH0gZnJvbSAnLi4vdXRpbHMvY2xhc3Nlcy5qcydcbmltcG9ydCBwcml2YXRlUHJvcHMgZnJvbSAnLi4vcHJpdmF0ZVByb3BzLmpzJ1xuXG4vLyBTaG93IGJsb2NrIHdpdGggdmFsaWRhdGlvbiBtZXNzYWdlXG5leHBvcnQgZnVuY3Rpb24gc2hvd1ZhbGlkYXRpb25NZXNzYWdlIChlcnJvcikge1xuICBjb25zdCBkb21DYWNoZSA9IHByaXZhdGVQcm9wcy5kb21DYWNoZS5nZXQodGhpcylcbiAgY29uc3QgcGFyYW1zID0gcHJpdmF0ZVByb3BzLmlubmVyUGFyYW1zLmdldCh0aGlzKVxuICBkb20uc2V0SW5uZXJIdG1sKGRvbUNhY2hlLnZhbGlkYXRpb25NZXNzYWdlLCBlcnJvcilcbiAgZG9tQ2FjaGUudmFsaWRhdGlvbk1lc3NhZ2UuY2xhc3NOYW1lID0gc3dhbENsYXNzZXNbJ3ZhbGlkYXRpb24tbWVzc2FnZSddXG4gIGlmIChwYXJhbXMuY3VzdG9tQ2xhc3MgJiYgcGFyYW1zLmN1c3RvbUNsYXNzLnZhbGlkYXRpb25NZXNzYWdlKSB7XG4gICAgZG9tLmFkZENsYXNzKGRvbUNhY2hlLnZhbGlkYXRpb25NZXNzYWdlLCBwYXJhbXMuY3VzdG9tQ2xhc3MudmFsaWRhdGlvbk1lc3NhZ2UpXG4gIH1cbiAgZG9tLnNob3coZG9tQ2FjaGUudmFsaWRhdGlvbk1lc3NhZ2UpXG5cbiAgY29uc3QgaW5wdXQgPSB0aGlzLmdldElucHV0KClcbiAgaWYgKGlucHV0KSB7XG4gICAgaW5wdXQuc2V0QXR0cmlidXRlKCdhcmlhLWludmFsaWQnLCB0cnVlKVxuICAgIGlucHV0LnNldEF0dHJpYnV0ZSgnYXJpYS1kZXNjcmliZWRieScsIHN3YWxDbGFzc2VzWyd2YWxpZGF0aW9uLW1lc3NhZ2UnXSlcbiAgICBkb20uZm9jdXNJbnB1dChpbnB1dClcbiAgICBkb20uYWRkQ2xhc3MoaW5wdXQsIHN3YWxDbGFzc2VzLmlucHV0ZXJyb3IpXG4gIH1cbn1cblxuLy8gSGlkZSBibG9jayB3aXRoIHZhbGlkYXRpb24gbWVzc2FnZVxuZXhwb3J0IGZ1bmN0aW9uIHJlc2V0VmFsaWRhdGlvbk1lc3NhZ2UgKCkge1xuICBjb25zdCBkb21DYWNoZSA9IHByaXZhdGVQcm9wcy5kb21DYWNoZS5nZXQodGhpcylcbiAgaWYgKGRvbUNhY2hlLnZhbGlkYXRpb25NZXNzYWdlKSB7XG4gICAgZG9tLmhpZGUoZG9tQ2FjaGUudmFsaWRhdGlvbk1lc3NhZ2UpXG4gIH1cblxuICBjb25zdCBpbnB1dCA9IHRoaXMuZ2V0SW5wdXQoKVxuICBpZiAoaW5wdXQpIHtcbiAgICBpbnB1dC5yZW1vdmVBdHRyaWJ1dGUoJ2FyaWEtaW52YWxpZCcpXG4gICAgaW5wdXQucmVtb3ZlQXR0cmlidXRlKCdhcmlhLWRlc2NyaWJlZGJ5JylcbiAgICBkb20ucmVtb3ZlQ2xhc3MoaW5wdXQsIHN3YWxDbGFzc2VzLmlucHV0ZXJyb3IpXG4gIH1cbn1cbiIsIi8qKlxuICogVGhpcyBtb2R1bGUgY29udGFpbnMgYFdlYWtNYXBgcyBmb3IgZWFjaCBlZmZlY3RpdmVseS1cInByaXZhdGUgIHByb3BlcnR5XCIgdGhhdCBhIGBTd2FsYCBoYXMuXG4gKiBGb3IgZXhhbXBsZSwgdG8gc2V0IHRoZSBwcml2YXRlIHByb3BlcnR5IFwiZm9vXCIgb2YgYHRoaXNgIHRvIFwiYmFyXCIsIHlvdSBjYW4gYHByaXZhdGVQcm9wcy5mb28uc2V0KHRoaXMsICdiYXInKWBcbiAqIFRoaXMgaXMgdGhlIGFwcHJvYWNoIHRoYXQgQmFiZWwgd2lsbCBwcm9iYWJseSB0YWtlIHRvIGltcGxlbWVudCBwcml2YXRlIG1ldGhvZHMvZmllbGRzXG4gKiAgIGh0dHBzOi8vZ2l0aHViLmNvbS90YzM5L3Byb3Bvc2FsLXByaXZhdGUtbWV0aG9kc1xuICogICBodHRwczovL2dpdGh1Yi5jb20vYmFiZWwvYmFiZWwvcHVsbC83NTU1XG4gKiBPbmNlIHdlIGhhdmUgdGhlIGNoYW5nZXMgZnJvbSB0aGF0IFBSIGluIEJhYmVsLCBhbmQgb3VyIGNvcmUgY2xhc3MgZml0cyByZWFzb25hYmxlIGluICpvbmUgbW9kdWxlKlxuICogICB0aGVuIHdlIGNhbiB1c2UgdGhhdCBsYW5ndWFnZSBmZWF0dXJlLlxuICovXG5cbmV4cG9ydCBkZWZhdWx0IHtcbiAgc3dhbFByb21pc2VSZXNvbHZlOiBuZXcgV2Vha01hcCgpLFxuICBzd2FsUHJvbWlzZVJlamVjdDogbmV3IFdlYWtNYXAoKVxufVxuIiwiLyoqXG4gKiBUaGlzIG1vZHVsZSBjb250YWlucyBgV2Vha01hcGBzIGZvciBlYWNoIGVmZmVjdGl2ZWx5LVwicHJpdmF0ZSAgcHJvcGVydHlcIiB0aGF0IGEgYFN3YWxgIGhhcy5cbiAqIEZvciBleGFtcGxlLCB0byBzZXQgdGhlIHByaXZhdGUgcHJvcGVydHkgXCJmb29cIiBvZiBgdGhpc2AgdG8gXCJiYXJcIiwgeW91IGNhbiBgcHJpdmF0ZVByb3BzLmZvby5zZXQodGhpcywgJ2JhcicpYFxuICogVGhpcyBpcyB0aGUgYXBwcm9hY2ggdGhhdCBCYWJlbCB3aWxsIHByb2JhYmx5IHRha2UgdG8gaW1wbGVtZW50IHByaXZhdGUgbWV0aG9kcy9maWVsZHNcbiAqICAgaHR0cHM6Ly9naXRodWIuY29tL3RjMzkvcHJvcG9zYWwtcHJpdmF0ZS1tZXRob2RzXG4gKiAgIGh0dHBzOi8vZ2l0aHViLmNvbS9iYWJlbC9iYWJlbC9wdWxsLzc1NTVcbiAqIE9uY2Ugd2UgaGF2ZSB0aGUgY2hhbmdlcyBmcm9tIHRoYXQgUFIgaW4gQmFiZWwsIGFuZCBvdXIgY29yZSBjbGFzcyBmaXRzIHJlYXNvbmFibGUgaW4gKm9uZSBtb2R1bGUqXG4gKiAgIHRoZW4gd2UgY2FuIHVzZSB0aGF0IGxhbmd1YWdlIGZlYXR1cmUuXG4gKi9cblxuZXhwb3J0IGRlZmF1bHQge1xuICBhd2FpdGluZ1Byb21pc2U6IG5ldyBXZWFrTWFwKCksXG4gIHByb21pc2U6IG5ldyBXZWFrTWFwKCksXG4gIGlubmVyUGFyYW1zOiBuZXcgV2Vha01hcCgpLFxuICBkb21DYWNoZTogbmV3IFdlYWtNYXAoKVxufVxuIiwiZXhwb3J0ICogZnJvbSAnLi9zdGF0aWNNZXRob2RzL2FyZ3NUb1BhcmFtcy5qcydcbmV4cG9ydCAqIGZyb20gJy4vc3RhdGljTWV0aG9kcy9kb20uanMnXG5leHBvcnQgKiBmcm9tICcuL3N0YXRpY01ldGhvZHMvZmlyZS5qcydcbmV4cG9ydCAqIGZyb20gJy4vc3RhdGljTWV0aG9kcy9taXhpbi5qcydcbmV4cG9ydCAqIGZyb20gJy4vc3RhdGljTWV0aG9kcy9zaG93TG9hZGluZy5qcydcbmV4cG9ydCAqIGZyb20gJy4vc3RhdGljTWV0aG9kcy90aW1lci5qcydcbmV4cG9ydCAqIGZyb20gJy4vc3RhdGljTWV0aG9kcy9iaW5kQ2xpY2tIYW5kbGVyLmpzJ1xuZXhwb3J0IHtcbiAgaXNWYWxpZFBhcmFtZXRlcixcbiAgaXNVcGRhdGFibGVQYXJhbWV0ZXIsXG4gIGlzRGVwcmVjYXRlZFBhcmFtZXRlclxufSBmcm9tICcuL3V0aWxzL3BhcmFtcy5qcydcbiIsImltcG9ydCB7IGVycm9yIH0gZnJvbSAnLi4vdXRpbHMvdXRpbHMuanMnXG5cbmNvbnN0IGlzSnF1ZXJ5RWxlbWVudCA9IChlbGVtKSA9PiB0eXBlb2YgZWxlbSA9PT0gJ29iamVjdCcgJiYgZWxlbS5qcXVlcnlcbmNvbnN0IGlzRWxlbWVudCA9IChlbGVtKSA9PiBlbGVtIGluc3RhbmNlb2YgRWxlbWVudCB8fCBpc0pxdWVyeUVsZW1lbnQoZWxlbSlcblxuZXhwb3J0IGNvbnN0IGFyZ3NUb1BhcmFtcyA9IChhcmdzKSA9PiB7XG4gIGNvbnN0IHBhcmFtcyA9IHt9XG4gIGlmICh0eXBlb2YgYXJnc1swXSA9PT0gJ29iamVjdCcgJiYgIWlzRWxlbWVudChhcmdzWzBdKSkge1xuICAgIE9iamVjdC5hc3NpZ24ocGFyYW1zLCBhcmdzWzBdKVxuICB9IGVsc2Uge1xuICAgIFsndGl0bGUnLCAnaHRtbCcsICdpY29uJ10uZm9yRWFjaCgobmFtZSwgaW5kZXgpID0+IHtcbiAgICAgIGNvbnN0IGFyZyA9IGFyZ3NbaW5kZXhdXG4gICAgICBpZiAodHlwZW9mIGFyZyA9PT0gJ3N0cmluZycgfHwgaXNFbGVtZW50KGFyZykpIHtcbiAgICAgICAgcGFyYW1zW25hbWVdID0gYXJnXG4gICAgICB9IGVsc2UgaWYgKGFyZyAhPT0gdW5kZWZpbmVkKSB7XG4gICAgICAgIGVycm9yKGBVbmV4cGVjdGVkIHR5cGUgb2YgJHtuYW1lfSEgRXhwZWN0ZWQgXCJzdHJpbmdcIiBvciBcIkVsZW1lbnRcIiwgZ290ICR7dHlwZW9mIGFyZ31gKVxuICAgICAgfVxuICAgIH0pXG4gIH1cbiAgcmV0dXJuIHBhcmFtc1xufVxuIiwibGV0IGJvZHlDbGlja0xpc3RlbmVyQWRkZWQgPSBmYWxzZVxuY29uc3QgY2xpY2tIYW5kbGVycyA9IHt9XG5cbmV4cG9ydCBmdW5jdGlvbiBiaW5kQ2xpY2tIYW5kbGVyIChhdHRyID0gJ2RhdGEtc3dhbC10ZW1wbGF0ZScpIHtcbiAgY2xpY2tIYW5kbGVyc1thdHRyXSA9IHRoaXNcblxuICBpZiAoIWJvZHlDbGlja0xpc3RlbmVyQWRkZWQpIHtcbiAgICBkb2N1bWVudC5ib2R5LmFkZEV2ZW50TGlzdGVuZXIoJ2NsaWNrJywgYm9keUNsaWNrTGlzdGVuZXIpXG4gICAgYm9keUNsaWNrTGlzdGVuZXJBZGRlZCA9IHRydWVcbiAgfVxufVxuXG5jb25zdCBib2R5Q2xpY2tMaXN0ZW5lciA9IChldmVudCkgPT4ge1xuICBmb3IgKGxldCBlbCA9IGV2ZW50LnRhcmdldDsgZWwgJiYgZWwgIT09IGRvY3VtZW50OyBlbCA9IGVsLnBhcmVudE5vZGUpIHtcbiAgICBmb3IgKGNvbnN0IGF0dHIgaW4gY2xpY2tIYW5kbGVycykge1xuICAgICAgY29uc3QgdGVtcGxhdGUgPSBlbC5nZXRBdHRyaWJ1dGUoYXR0cilcbiAgICAgIGlmICh0ZW1wbGF0ZSkge1xuICAgICAgICBjbGlja0hhbmRsZXJzW2F0dHJdLmZpcmUoeyB0ZW1wbGF0ZSB9KVxuICAgICAgICByZXR1cm5cbiAgICAgIH1cbiAgICB9XG4gIH1cbn1cbiIsImltcG9ydCAqIGFzIGRvbSBmcm9tICcuLi91dGlscy9kb20vaW5kZXguanMnXG5pbXBvcnQgKiBhcyBkb21VdGlscyBmcm9tICcuLi91dGlscy9kb20vZG9tVXRpbHMuanMnXG5cbmV4cG9ydCB7XG4gIGdldENvbnRhaW5lcixcbiAgZ2V0UG9wdXAsXG4gIGdldFRpdGxlLFxuICBnZXRIdG1sQ29udGFpbmVyLFxuICBnZXRJbWFnZSxcbiAgZ2V0SWNvbixcbiAgZ2V0SW5wdXRMYWJlbCxcbiAgZ2V0Q2xvc2VCdXR0b24sXG4gIGdldEFjdGlvbnMsXG4gIGdldENvbmZpcm1CdXR0b24sXG4gIGdldERlbnlCdXR0b24sXG4gIGdldENhbmNlbEJ1dHRvbixcbiAgZ2V0TG9hZGVyLFxuICBnZXRGb290ZXIsXG4gIGdldFRpbWVyUHJvZ3Jlc3NCYXIsXG4gIGdldEZvY3VzYWJsZUVsZW1lbnRzLFxuICBnZXRWYWxpZGF0aW9uTWVzc2FnZSxcbiAgaXNMb2FkaW5nXG59IGZyb20gJy4uL3V0aWxzL2RvbS9pbmRleC5qcydcblxuLypcbiAqIEdsb2JhbCBmdW5jdGlvbiB0byBkZXRlcm1pbmUgaWYgU3dlZXRBbGVydDIgcG9wdXAgaXMgc2hvd25cbiAqL1xuZXhwb3J0IGNvbnN0IGlzVmlzaWJsZSA9ICgpID0+IHtcbiAgcmV0dXJuIGRvbVV0aWxzLmlzVmlzaWJsZShkb20uZ2V0UG9wdXAoKSlcbn1cblxuLypcbiAqIEdsb2JhbCBmdW5jdGlvbiB0byBjbGljayAnQ29uZmlybScgYnV0dG9uXG4gKi9cbmV4cG9ydCBjb25zdCBjbGlja0NvbmZpcm0gPSAoKSA9PiBkb20uZ2V0Q29uZmlybUJ1dHRvbigpICYmIGRvbS5nZXRDb25maXJtQnV0dG9uKCkuY2xpY2soKVxuXG4vKlxuICogR2xvYmFsIGZ1bmN0aW9uIHRvIGNsaWNrICdEZW55JyBidXR0b25cbiAqL1xuZXhwb3J0IGNvbnN0IGNsaWNrRGVueSA9ICgpID0+IGRvbS5nZXREZW55QnV0dG9uKCkgJiYgZG9tLmdldERlbnlCdXR0b24oKS5jbGljaygpXG5cbi8qXG4gKiBHbG9iYWwgZnVuY3Rpb24gdG8gY2xpY2sgJ0NhbmNlbCcgYnV0dG9uXG4gKi9cbmV4cG9ydCBjb25zdCBjbGlja0NhbmNlbCA9ICgpID0+IGRvbS5nZXRDYW5jZWxCdXR0b24oKSAmJiBkb20uZ2V0Q2FuY2VsQnV0dG9uKCkuY2xpY2soKVxuIiwiZXhwb3J0IGZ1bmN0aW9uIGZpcmUgKC4uLmFyZ3MpIHtcbiAgY29uc3QgU3dhbCA9IHRoaXNcbiAgcmV0dXJuIG5ldyBTd2FsKC4uLmFyZ3MpXG59XG4iLCIvKipcbiAqIFJldHVybnMgYW4gZXh0ZW5kZWQgdmVyc2lvbiBvZiBgU3dhbGAgY29udGFpbmluZyBgcGFyYW1zYCBhcyBkZWZhdWx0cy5cbiAqIFVzZWZ1bCBmb3IgcmV1c2luZyBTd2FsIGNvbmZpZ3VyYXRpb24uXG4gKlxuICogRm9yIGV4YW1wbGU6XG4gKlxuICogQmVmb3JlOlxuICogY29uc3QgdGV4dFByb21wdE9wdGlvbnMgPSB7IGlucHV0OiAndGV4dCcsIHNob3dDYW5jZWxCdXR0b246IHRydWUgfVxuICogY29uc3Qge3ZhbHVlOiBmaXJzdE5hbWV9ID0gYXdhaXQgU3dhbC5maXJlKHsgLi4udGV4dFByb21wdE9wdGlvbnMsIHRpdGxlOiAnV2hhdCBpcyB5b3VyIGZpcnN0IG5hbWU/JyB9KVxuICogY29uc3Qge3ZhbHVlOiBsYXN0TmFtZX0gPSBhd2FpdCBTd2FsLmZpcmUoeyAuLi50ZXh0UHJvbXB0T3B0aW9ucywgdGl0bGU6ICdXaGF0IGlzIHlvdXIgbGFzdCBuYW1lPycgfSlcbiAqXG4gKiBBZnRlcjpcbiAqIGNvbnN0IFRleHRQcm9tcHQgPSBTd2FsLm1peGluKHsgaW5wdXQ6ICd0ZXh0Jywgc2hvd0NhbmNlbEJ1dHRvbjogdHJ1ZSB9KVxuICogY29uc3Qge3ZhbHVlOiBmaXJzdE5hbWV9ID0gYXdhaXQgVGV4dFByb21wdCgnV2hhdCBpcyB5b3VyIGZpcnN0IG5hbWU/JylcbiAqIGNvbnN0IHt2YWx1ZTogbGFzdE5hbWV9ID0gYXdhaXQgVGV4dFByb21wdCgnV2hhdCBpcyB5b3VyIGxhc3QgbmFtZT8nKVxuICpcbiAqIEBwYXJhbSBtaXhpblBhcmFtc1xuICovXG5leHBvcnQgZnVuY3Rpb24gbWl4aW4gKG1peGluUGFyYW1zKSB7XG4gIGNsYXNzIE1peGluU3dhbCBleHRlbmRzIHRoaXMge1xuICAgIF9tYWluIChwYXJhbXMsIHByaW9yaXR5TWl4aW5QYXJhbXMpIHtcbiAgICAgIHJldHVybiBzdXBlci5fbWFpbihwYXJhbXMsIE9iamVjdC5hc3NpZ24oe30sIG1peGluUGFyYW1zLCBwcmlvcml0eU1peGluUGFyYW1zKSlcbiAgICB9XG4gIH1cblxuICByZXR1cm4gTWl4aW5Td2FsXG59XG4iLCJpbXBvcnQgKiBhcyBkb20gZnJvbSAnLi4vdXRpbHMvZG9tL2luZGV4LmpzJ1xuaW1wb3J0IFN3YWwgZnJvbSAnLi4vc3dlZXRhbGVydDIuanMnXG5pbXBvcnQgeyBzd2FsQ2xhc3NlcyB9IGZyb20gJy4uL3V0aWxzL2NsYXNzZXMuanMnXG5cbi8qKlxuICogU2hvd3MgbG9hZGVyIChzcGlubmVyKSwgdGhpcyBpcyB1c2VmdWwgd2l0aCBBSkFYIHJlcXVlc3RzLlxuICogQnkgZGVmYXVsdCB0aGUgbG9hZGVyIGJlIHNob3duIGluc3RlYWQgb2YgdGhlIFwiQ29uZmlybVwiIGJ1dHRvbi5cbiAqL1xuY29uc3Qgc2hvd0xvYWRpbmcgPSAoYnV0dG9uVG9SZXBsYWNlKSA9PiB7XG4gIGxldCBwb3B1cCA9IGRvbS5nZXRQb3B1cCgpXG4gIGlmICghcG9wdXApIHtcbiAgICBTd2FsLmZpcmUoKVxuICB9XG4gIHBvcHVwID0gZG9tLmdldFBvcHVwKClcbiAgY29uc3QgbG9hZGVyID0gZG9tLmdldExvYWRlcigpXG5cbiAgaWYgKGRvbS5pc1RvYXN0KCkpIHtcbiAgICBkb20uaGlkZShkb20uZ2V0SWNvbigpKVxuICB9IGVsc2Uge1xuICAgIHJlcGxhY2VCdXR0b24ocG9wdXAsIGJ1dHRvblRvUmVwbGFjZSlcbiAgfVxuICBkb20uc2hvdyhsb2FkZXIpXG5cbiAgcG9wdXAuc2V0QXR0cmlidXRlKCdkYXRhLWxvYWRpbmcnLCB0cnVlKVxuICBwb3B1cC5zZXRBdHRyaWJ1dGUoJ2FyaWEtYnVzeScsIHRydWUpXG4gIHBvcHVwLmZvY3VzKClcbn1cblxuY29uc3QgcmVwbGFjZUJ1dHRvbiA9IChwb3B1cCwgYnV0dG9uVG9SZXBsYWNlKSA9PiB7XG4gIGNvbnN0IGFjdGlvbnMgPSBkb20uZ2V0QWN0aW9ucygpXG4gIGNvbnN0IGxvYWRlciA9IGRvbS5nZXRMb2FkZXIoKVxuXG4gIGlmICghYnV0dG9uVG9SZXBsYWNlICYmIGRvbS5pc1Zpc2libGUoZG9tLmdldENvbmZpcm1CdXR0b24oKSkpIHtcbiAgICBidXR0b25Ub1JlcGxhY2UgPSBkb20uZ2V0Q29uZmlybUJ1dHRvbigpXG4gIH1cblxuICBkb20uc2hvdyhhY3Rpb25zKVxuICBpZiAoYnV0dG9uVG9SZXBsYWNlKSB7XG4gICAgZG9tLmhpZGUoYnV0dG9uVG9SZXBsYWNlKVxuICAgIGxvYWRlci5zZXRBdHRyaWJ1dGUoJ2RhdGEtYnV0dG9uLXRvLXJlcGxhY2UnLCBidXR0b25Ub1JlcGxhY2UuY2xhc3NOYW1lKVxuICB9XG4gIGxvYWRlci5wYXJlbnROb2RlLmluc2VydEJlZm9yZShsb2FkZXIsIGJ1dHRvblRvUmVwbGFjZSlcbiAgZG9tLmFkZENsYXNzKFtwb3B1cCwgYWN0aW9uc10sIHN3YWxDbGFzc2VzLmxvYWRpbmcpXG59XG5cbmV4cG9ydCB7XG4gIHNob3dMb2FkaW5nLFxuICBzaG93TG9hZGluZyBhcyBlbmFibGVMb2FkaW5nXG59XG4iLCJpbXBvcnQgeyBhbmltYXRlVGltZXJQcm9ncmVzc0Jhciwgc3RvcFRpbWVyUHJvZ3Jlc3NCYXIgfSBmcm9tICcuLi91dGlscy9kb20vZG9tVXRpbHMuanMnXG5pbXBvcnQgZ2xvYmFsU3RhdGUgZnJvbSAnLi4vZ2xvYmFsU3RhdGUuanMnXG5cbi8qKlxuICogSWYgYHRpbWVyYCBwYXJhbWV0ZXIgaXMgc2V0LCByZXR1cm5zIG51bWJlciBvZiBtaWxsaXNlY29uZHMgb2YgdGltZXIgcmVtYWluZWQuXG4gKiBPdGhlcndpc2UsIHJldHVybnMgdW5kZWZpbmVkLlxuICovXG5leHBvcnQgY29uc3QgZ2V0VGltZXJMZWZ0ID0gKCkgPT4ge1xuICByZXR1cm4gZ2xvYmFsU3RhdGUudGltZW91dCAmJiBnbG9iYWxTdGF0ZS50aW1lb3V0LmdldFRpbWVyTGVmdCgpXG59XG5cbi8qKlxuICogU3RvcCB0aW1lci4gUmV0dXJucyBudW1iZXIgb2YgbWlsbGlzZWNvbmRzIG9mIHRpbWVyIHJlbWFpbmVkLlxuICogSWYgYHRpbWVyYCBwYXJhbWV0ZXIgaXNuJ3Qgc2V0LCByZXR1cm5zIHVuZGVmaW5lZC5cbiAqL1xuZXhwb3J0IGNvbnN0IHN0b3BUaW1lciA9ICgpID0+IHtcbiAgaWYgKGdsb2JhbFN0YXRlLnRpbWVvdXQpIHtcbiAgICBzdG9wVGltZXJQcm9ncmVzc0JhcigpXG4gICAgcmV0dXJuIGdsb2JhbFN0YXRlLnRpbWVvdXQuc3RvcCgpXG4gIH1cbn1cblxuLyoqXG4gKiBSZXN1bWUgdGltZXIuIFJldHVybnMgbnVtYmVyIG9mIG1pbGxpc2Vjb25kcyBvZiB0aW1lciByZW1haW5lZC5cbiAqIElmIGB0aW1lcmAgcGFyYW1ldGVyIGlzbid0IHNldCwgcmV0dXJucyB1bmRlZmluZWQuXG4gKi9cbmV4cG9ydCBjb25zdCByZXN1bWVUaW1lciA9ICgpID0+IHtcbiAgaWYgKGdsb2JhbFN0YXRlLnRpbWVvdXQpIHtcbiAgICBjb25zdCByZW1haW5pbmcgPSBnbG9iYWxTdGF0ZS50aW1lb3V0LnN0YXJ0KClcbiAgICBhbmltYXRlVGltZXJQcm9ncmVzc0JhcihyZW1haW5pbmcpXG4gICAgcmV0dXJuIHJlbWFpbmluZ1xuICB9XG59XG5cbi8qKlxuICogUmVzdW1lIHRpbWVyLiBSZXR1cm5zIG51bWJlciBvZiBtaWxsaXNlY29uZHMgb2YgdGltZXIgcmVtYWluZWQuXG4gKiBJZiBgdGltZXJgIHBhcmFtZXRlciBpc24ndCBzZXQsIHJldHVybnMgdW5kZWZpbmVkLlxuICovXG5leHBvcnQgY29uc3QgdG9nZ2xlVGltZXIgPSAoKSA9PiB7XG4gIGNvbnN0IHRpbWVyID0gZ2xvYmFsU3RhdGUudGltZW91dFxuICByZXR1cm4gdGltZXIgJiYgKHRpbWVyLnJ1bm5pbmcgPyBzdG9wVGltZXIoKSA6IHJlc3VtZVRpbWVyKCkpXG59XG5cbi8qKlxuICogSW5jcmVhc2UgdGltZXIuIFJldHVybnMgbnVtYmVyIG9mIG1pbGxpc2Vjb25kcyBvZiBhbiB1cGRhdGVkIHRpbWVyLlxuICogSWYgYHRpbWVyYCBwYXJhbWV0ZXIgaXNuJ3Qgc2V0LCByZXR1cm5zIHVuZGVmaW5lZC5cbiAqL1xuZXhwb3J0IGNvbnN0IGluY3JlYXNlVGltZXIgPSAobikgPT4ge1xuICBpZiAoZ2xvYmFsU3RhdGUudGltZW91dCkge1xuICAgIGNvbnN0IHJlbWFpbmluZyA9IGdsb2JhbFN0YXRlLnRpbWVvdXQuaW5jcmVhc2UobilcbiAgICBhbmltYXRlVGltZXJQcm9ncmVzc0JhcihyZW1haW5pbmcsIHRydWUpXG4gICAgcmV0dXJuIHJlbWFpbmluZ1xuICB9XG59XG5cbi8qKlxuICogQ2hlY2sgaWYgdGltZXIgaXMgcnVubmluZy4gUmV0dXJucyB0cnVlIGlmIHRpbWVyIGlzIHJ1bm5pbmdcbiAqIG9yIGZhbHNlIGlmIHRpbWVyIGlzIHBhdXNlZCBvciBzdG9wcGVkLlxuICogSWYgYHRpbWVyYCBwYXJhbWV0ZXIgaXNuJ3Qgc2V0LCByZXR1cm5zIHVuZGVmaW5lZFxuICovXG5leHBvcnQgY29uc3QgaXNUaW1lclJ1bm5pbmcgPSAoKSA9PiB7XG4gIHJldHVybiBnbG9iYWxTdGF0ZS50aW1lb3V0ICYmIGdsb2JhbFN0YXRlLnRpbWVvdXQuaXNSdW5uaW5nKClcbn1cbiIsImltcG9ydCBTd2VldEFsZXJ0IGZyb20gJy4vU3dlZXRBbGVydC5qcydcblxuY29uc3QgU3dhbCA9IFN3ZWV0QWxlcnRcblN3YWwuZGVmYXVsdCA9IFN3YWxcblxuZXhwb3J0IGRlZmF1bHQgU3dhbFxuIiwiZXhwb3J0IGNvbnN0IERpc21pc3NSZWFzb24gPSBPYmplY3QuZnJlZXplKHtcbiAgY2FuY2VsOiAnY2FuY2VsJyxcbiAgYmFja2Ryb3A6ICdiYWNrZHJvcCcsXG4gIGNsb3NlOiAnY2xvc2UnLFxuICBlc2M6ICdlc2MnLFxuICB0aW1lcjogJ3RpbWVyJ1xufSlcbiIsImV4cG9ydCBkZWZhdWx0IGNsYXNzIFRpbWVyIHtcbiAgY29uc3RydWN0b3IgKGNhbGxiYWNrLCBkZWxheSkge1xuICAgIHRoaXMuY2FsbGJhY2sgPSBjYWxsYmFja1xuICAgIHRoaXMucmVtYWluaW5nID0gZGVsYXlcbiAgICB0aGlzLnJ1bm5pbmcgPSBmYWxzZVxuXG4gICAgdGhpcy5zdGFydCgpXG4gIH1cblxuICBzdGFydCAoKSB7XG4gICAgaWYgKCF0aGlzLnJ1bm5pbmcpIHtcbiAgICAgIHRoaXMucnVubmluZyA9IHRydWVcbiAgICAgIHRoaXMuc3RhcnRlZCA9IG5ldyBEYXRlKClcbiAgICAgIHRoaXMuaWQgPSBzZXRUaW1lb3V0KHRoaXMuY2FsbGJhY2ssIHRoaXMucmVtYWluaW5nKVxuICAgIH1cbiAgICByZXR1cm4gdGhpcy5yZW1haW5pbmdcbiAgfVxuXG4gIHN0b3AgKCkge1xuICAgIGlmICh0aGlzLnJ1bm5pbmcpIHtcbiAgICAgIHRoaXMucnVubmluZyA9IGZhbHNlXG4gICAgICBjbGVhclRpbWVvdXQodGhpcy5pZClcbiAgICAgIHRoaXMucmVtYWluaW5nIC09IG5ldyBEYXRlKCkgLSB0aGlzLnN0YXJ0ZWRcbiAgICB9XG4gICAgcmV0dXJuIHRoaXMucmVtYWluaW5nXG4gIH1cblxuICBpbmNyZWFzZSAobikge1xuICAgIGNvbnN0IHJ1bm5pbmcgPSB0aGlzLnJ1bm5pbmdcbiAgICBpZiAocnVubmluZykge1xuICAgICAgdGhpcy5zdG9wKClcbiAgICB9XG4gICAgdGhpcy5yZW1haW5pbmcgKz0gblxuICAgIGlmIChydW5uaW5nKSB7XG4gICAgICB0aGlzLnN0YXJ0KClcbiAgICB9XG4gICAgcmV0dXJuIHRoaXMucmVtYWluaW5nXG4gIH1cblxuICBnZXRUaW1lckxlZnQgKCkge1xuICAgIGlmICh0aGlzLnJ1bm5pbmcpIHtcbiAgICAgIHRoaXMuc3RvcCgpXG4gICAgICB0aGlzLnN0YXJ0KClcbiAgICB9XG4gICAgcmV0dXJuIHRoaXMucmVtYWluaW5nXG4gIH1cblxuICBpc1J1bm5pbmcgKCkge1xuICAgIHJldHVybiB0aGlzLnJ1bm5pbmdcbiAgfVxufVxuIiwiaW1wb3J0IHsgZ2V0Q29udGFpbmVyIH0gZnJvbSAnLi9kb20vZ2V0dGVycy5qcydcbmltcG9ydCB7IHRvQXJyYXkgfSBmcm9tICcuL3V0aWxzLmpzJ1xuXG4vLyBGcm9tIGh0dHBzOi8vZGV2ZWxvcGVyLnBhY2llbGxvZ3JvdXAuY29tL2Jsb2cvMjAxOC8wNi90aGUtY3VycmVudC1zdGF0ZS1vZi1tb2RhbC1kaWFsb2ctYWNjZXNzaWJpbGl0eS9cbi8vIEFkZGluZyBhcmlhLWhpZGRlbj1cInRydWVcIiB0byBlbGVtZW50cyBvdXRzaWRlIG9mIHRoZSBhY3RpdmUgbW9kYWwgZGlhbG9nIGVuc3VyZXMgdGhhdFxuLy8gZWxlbWVudHMgbm90IHdpdGhpbiB0aGUgYWN0aXZlIG1vZGFsIGRpYWxvZyB3aWxsIG5vdCBiZSBzdXJmYWNlZCBpZiBhIHVzZXIgb3BlbnMgYSBzY3JlZW5cbi8vIHJlYWRlcuKAmXMgbGlzdCBvZiBlbGVtZW50cyAoaGVhZGluZ3MsIGZvcm0gY29udHJvbHMsIGxhbmRtYXJrcywgZXRjLikgaW4gdGhlIGRvY3VtZW50LlxuXG5leHBvcnQgY29uc3Qgc2V0QXJpYUhpZGRlbiA9ICgpID0+IHtcbiAgY29uc3QgYm9keUNoaWxkcmVuID0gdG9BcnJheShkb2N1bWVudC5ib2R5LmNoaWxkcmVuKVxuICBib2R5Q2hpbGRyZW4uZm9yRWFjaChlbCA9PiB7XG4gICAgaWYgKGVsID09PSBnZXRDb250YWluZXIoKSB8fCBlbC5jb250YWlucyhnZXRDb250YWluZXIoKSkpIHtcbiAgICAgIHJldHVyblxuICAgIH1cblxuICAgIGlmIChlbC5oYXNBdHRyaWJ1dGUoJ2FyaWEtaGlkZGVuJykpIHtcbiAgICAgIGVsLnNldEF0dHJpYnV0ZSgnZGF0YS1wcmV2aW91cy1hcmlhLWhpZGRlbicsIGVsLmdldEF0dHJpYnV0ZSgnYXJpYS1oaWRkZW4nKSlcbiAgICB9XG4gICAgZWwuc2V0QXR0cmlidXRlKCdhcmlhLWhpZGRlbicsICd0cnVlJylcbiAgfSlcbn1cblxuZXhwb3J0IGNvbnN0IHVuc2V0QXJpYUhpZGRlbiA9ICgpID0+IHtcbiAgY29uc3QgYm9keUNoaWxkcmVuID0gdG9BcnJheShkb2N1bWVudC5ib2R5LmNoaWxkcmVuKVxuICBib2R5Q2hpbGRyZW4uZm9yRWFjaChlbCA9PiB7XG4gICAgaWYgKGVsLmhhc0F0dHJpYnV0ZSgnZGF0YS1wcmV2aW91cy1hcmlhLWhpZGRlbicpKSB7XG4gICAgICBlbC5zZXRBdHRyaWJ1dGUoJ2FyaWEtaGlkZGVuJywgZWwuZ2V0QXR0cmlidXRlKCdkYXRhLXByZXZpb3VzLWFyaWEtaGlkZGVuJykpXG4gICAgICBlbC5yZW1vdmVBdHRyaWJ1dGUoJ2RhdGEtcHJldmlvdXMtYXJpYS1oaWRkZW4nKVxuICAgIH0gZWxzZSB7XG4gICAgICBlbC5yZW1vdmVBdHRyaWJ1dGUoJ2FyaWEtaGlkZGVuJylcbiAgICB9XG4gIH0pXG59XG4iLCJleHBvcnQgY29uc3Qgc3dhbFByZWZpeCA9ICdzd2FsMi0nXG5cbmV4cG9ydCBjb25zdCBwcmVmaXggPSAoaXRlbXMpID0+IHtcbiAgY29uc3QgcmVzdWx0ID0ge31cbiAgZm9yIChjb25zdCBpIGluIGl0ZW1zKSB7XG4gICAgcmVzdWx0W2l0ZW1zW2ldXSA9IHN3YWxQcmVmaXggKyBpdGVtc1tpXVxuICB9XG4gIHJldHVybiByZXN1bHRcbn1cblxuZXhwb3J0IGNvbnN0IHN3YWxDbGFzc2VzID0gcHJlZml4KFtcbiAgJ2NvbnRhaW5lcicsXG4gICdzaG93bicsXG4gICdoZWlnaHQtYXV0bycsXG4gICdpb3NmaXgnLFxuICAncG9wdXAnLFxuICAnbW9kYWwnLFxuICAnbm8tYmFja2Ryb3AnLFxuICAnbm8tdHJhbnNpdGlvbicsXG4gICd0b2FzdCcsXG4gICd0b2FzdC1zaG93bicsXG4gICdzaG93JyxcbiAgJ2hpZGUnLFxuICAnY2xvc2UnLFxuICAndGl0bGUnLFxuICAnaHRtbC1jb250YWluZXInLFxuICAnYWN0aW9ucycsXG4gICdjb25maXJtJyxcbiAgJ2RlbnknLFxuICAnY2FuY2VsJyxcbiAgJ2RlZmF1bHQtb3V0bGluZScsXG4gICdmb290ZXInLFxuICAnaWNvbicsXG4gICdpY29uLWNvbnRlbnQnLFxuICAnaW1hZ2UnLFxuICAnaW5wdXQnLFxuICAnZmlsZScsXG4gICdyYW5nZScsXG4gICdzZWxlY3QnLFxuICAncmFkaW8nLFxuICAnY2hlY2tib3gnLFxuICAnbGFiZWwnLFxuICAndGV4dGFyZWEnLFxuICAnaW5wdXRlcnJvcicsXG4gICdpbnB1dC1sYWJlbCcsXG4gICd2YWxpZGF0aW9uLW1lc3NhZ2UnLFxuICAncHJvZ3Jlc3Mtc3RlcHMnLFxuICAnYWN0aXZlLXByb2dyZXNzLXN0ZXAnLFxuICAncHJvZ3Jlc3Mtc3RlcCcsXG4gICdwcm9ncmVzcy1zdGVwLWxpbmUnLFxuICAnbG9hZGVyJyxcbiAgJ2xvYWRpbmcnLFxuICAnc3R5bGVkJyxcbiAgJ3RvcCcsXG4gICd0b3Atc3RhcnQnLFxuICAndG9wLWVuZCcsXG4gICd0b3AtbGVmdCcsXG4gICd0b3AtcmlnaHQnLFxuICAnY2VudGVyJyxcbiAgJ2NlbnRlci1zdGFydCcsXG4gICdjZW50ZXItZW5kJyxcbiAgJ2NlbnRlci1sZWZ0JyxcbiAgJ2NlbnRlci1yaWdodCcsXG4gICdib3R0b20nLFxuICAnYm90dG9tLXN0YXJ0JyxcbiAgJ2JvdHRvbS1lbmQnLFxuICAnYm90dG9tLWxlZnQnLFxuICAnYm90dG9tLXJpZ2h0JyxcbiAgJ2dyb3ctcm93JyxcbiAgJ2dyb3ctY29sdW1uJyxcbiAgJ2dyb3ctZnVsbHNjcmVlbicsXG4gICdydGwnLFxuICAndGltZXItcHJvZ3Jlc3MtYmFyJyxcbiAgJ3RpbWVyLXByb2dyZXNzLWJhci1jb250YWluZXInLFxuICAnc2Nyb2xsYmFyLW1lYXN1cmUnLFxuICAnaWNvbi1zdWNjZXNzJyxcbiAgJ2ljb24td2FybmluZycsXG4gICdpY29uLWluZm8nLFxuICAnaWNvbi1xdWVzdGlvbicsXG4gICdpY29uLWVycm9yJyxcbl0pXG5cbmV4cG9ydCBjb25zdCBpY29uVHlwZXMgPSBwcmVmaXgoW1xuICAnc3VjY2VzcycsXG4gICd3YXJuaW5nJyxcbiAgJ2luZm8nLFxuICAncXVlc3Rpb24nLFxuICAnZXJyb3InXG5dKVxuIiwiZXhwb3J0IGRlZmF1bHQge1xuICBlbWFpbDogKHN0cmluZywgdmFsaWRhdGlvbk1lc3NhZ2UpID0+IHtcbiAgICByZXR1cm4gL15bYS16QS1aMC05LitfLV0rQFthLXpBLVowLTkuLV0rXFwuW2EtekEtWjAtOS1dezIsMjR9JC8udGVzdChzdHJpbmcpXG4gICAgICA/IFByb21pc2UucmVzb2x2ZSgpXG4gICAgICA6IFByb21pc2UucmVzb2x2ZSh2YWxpZGF0aW9uTWVzc2FnZSB8fCAnSW52YWxpZCBlbWFpbCBhZGRyZXNzJylcbiAgfSxcbiAgdXJsOiAoc3RyaW5nLCB2YWxpZGF0aW9uTWVzc2FnZSkgPT4ge1xuICAgIC8vIHRha2VuIGZyb20gaHR0cHM6Ly9zdGFja292ZXJmbG93LmNvbS9hLzM4MDk0MzUgd2l0aCBhIHNtYWxsIGNoYW5nZSBmcm9tICMxMzA2IGFuZCAjMjAxM1xuICAgIHJldHVybiAvXmh0dHBzPzpcXC9cXC8od3d3XFwuKT9bLWEtekEtWjAtOUA6JS5fK34jPV17MSwyNTZ9XFwuW2Etel17Miw2M31cXGIoWy1hLXpBLVowLTlAOiVfKy5+Iz8mLz1dKikkLy50ZXN0KHN0cmluZylcbiAgICAgID8gUHJvbWlzZS5yZXNvbHZlKClcbiAgICAgIDogUHJvbWlzZS5yZXNvbHZlKHZhbGlkYXRpb25NZXNzYWdlIHx8ICdJbnZhbGlkIFVSTCcpXG4gIH1cbn1cbiIsImltcG9ydCB7IGlzTm9kZUVudiB9IGZyb20gJy4uL2lzTm9kZUVudi5qcydcblxuZXhwb3J0IGNvbnN0IGFuaW1hdGlvbkVuZEV2ZW50ID0gKCgpID0+IHtcbiAgLy8gUHJldmVudCBydW4gaW4gTm9kZSBlbnZcbiAgLyogaXN0YW5idWwgaWdub3JlIGlmICovXG4gIGlmIChpc05vZGVFbnYoKSkge1xuICAgIHJldHVybiBmYWxzZVxuICB9XG5cbiAgY29uc3QgdGVzdEVsID0gZG9jdW1lbnQuY3JlYXRlRWxlbWVudCgnZGl2JylcbiAgY29uc3QgdHJhbnNFbmRFdmVudE5hbWVzID0ge1xuICAgIFdlYmtpdEFuaW1hdGlvbjogJ3dlYmtpdEFuaW1hdGlvbkVuZCcsXG4gICAgT0FuaW1hdGlvbjogJ29BbmltYXRpb25FbmQgb2FuaW1hdGlvbmVuZCcsXG4gICAgYW5pbWF0aW9uOiAnYW5pbWF0aW9uZW5kJ1xuICB9XG4gIGZvciAoY29uc3QgaSBpbiB0cmFuc0VuZEV2ZW50TmFtZXMpIHtcbiAgICBpZiAoT2JqZWN0LnByb3RvdHlwZS5oYXNPd25Qcm9wZXJ0eS5jYWxsKHRyYW5zRW5kRXZlbnROYW1lcywgaSkgJiYgdHlwZW9mIHRlc3RFbC5zdHlsZVtpXSAhPT0gJ3VuZGVmaW5lZCcpIHtcbiAgICAgIHJldHVybiB0cmFuc0VuZEV2ZW50TmFtZXNbaV1cbiAgICB9XG4gIH1cblxuICByZXR1cm4gZmFsc2Vcbn0pKClcbiIsImltcG9ydCB7IGdldFRpbWVyUHJvZ3Jlc3NCYXIsIGdldENvbmZpcm1CdXR0b24sIGdldERlbnlCdXR0b24sIGdldENhbmNlbEJ1dHRvbiB9IGZyb20gJy4vZ2V0dGVycy5qcydcbmltcG9ydCB7IHN3YWxDbGFzc2VzLCBpY29uVHlwZXMgfSBmcm9tICcuLi9jbGFzc2VzLmpzJ1xuaW1wb3J0IHsgdG9BcnJheSwgd2FybiB9IGZyb20gJy4uL3V0aWxzLmpzJ1xuXG4vLyBSZW1lbWJlciBzdGF0ZSBpbiBjYXNlcyB3aGVyZSBvcGVuaW5nIGFuZCBoYW5kbGluZyBhIG1vZGFsIHdpbGwgZmlkZGxlIHdpdGggaXQuXG5leHBvcnQgY29uc3Qgc3RhdGVzID0ge1xuICBwcmV2aW91c0JvZHlQYWRkaW5nOiBudWxsXG59XG5cbmV4cG9ydCBjb25zdCBzZXRJbm5lckh0bWwgPSAoZWxlbSwgaHRtbCkgPT4geyAvLyAjMTkyNlxuICBlbGVtLnRleHRDb250ZW50ID0gJydcbiAgaWYgKGh0bWwpIHtcbiAgICBjb25zdCBwYXJzZXIgPSBuZXcgRE9NUGFyc2VyKClcbiAgICBjb25zdCBwYXJzZWQgPSBwYXJzZXIucGFyc2VGcm9tU3RyaW5nKGh0bWwsIGB0ZXh0L2h0bWxgKVxuICAgIHRvQXJyYXkocGFyc2VkLnF1ZXJ5U2VsZWN0b3IoJ2hlYWQnKS5jaGlsZE5vZGVzKS5mb3JFYWNoKChjaGlsZCkgPT4ge1xuICAgICAgZWxlbS5hcHBlbmRDaGlsZChjaGlsZClcbiAgICB9KVxuICAgIHRvQXJyYXkocGFyc2VkLnF1ZXJ5U2VsZWN0b3IoJ2JvZHknKS5jaGlsZE5vZGVzKS5mb3JFYWNoKChjaGlsZCkgPT4ge1xuICAgICAgZWxlbS5hcHBlbmRDaGlsZChjaGlsZClcbiAgICB9KVxuICB9XG59XG5cbmV4cG9ydCBjb25zdCBoYXNDbGFzcyA9IChlbGVtLCBjbGFzc05hbWUpID0+IHtcbiAgaWYgKCFjbGFzc05hbWUpIHtcbiAgICByZXR1cm4gZmFsc2VcbiAgfVxuICBjb25zdCBjbGFzc0xpc3QgPSBjbGFzc05hbWUuc3BsaXQoL1xccysvKVxuICBmb3IgKGxldCBpID0gMDsgaSA8IGNsYXNzTGlzdC5sZW5ndGg7IGkrKykge1xuICAgIGlmICghZWxlbS5jbGFzc0xpc3QuY29udGFpbnMoY2xhc3NMaXN0W2ldKSkge1xuICAgICAgcmV0dXJuIGZhbHNlXG4gICAgfVxuICB9XG4gIHJldHVybiB0cnVlXG59XG5cbmNvbnN0IHJlbW92ZUN1c3RvbUNsYXNzZXMgPSAoZWxlbSwgcGFyYW1zKSA9PiB7XG4gIHRvQXJyYXkoZWxlbS5jbGFzc0xpc3QpLmZvckVhY2goY2xhc3NOYW1lID0+IHtcbiAgICBpZiAoXG4gICAgICAhT2JqZWN0LnZhbHVlcyhzd2FsQ2xhc3NlcykuaW5jbHVkZXMoY2xhc3NOYW1lKSAmJlxuICAgICAgIU9iamVjdC52YWx1ZXMoaWNvblR5cGVzKS5pbmNsdWRlcyhjbGFzc05hbWUpICYmXG4gICAgICAhT2JqZWN0LnZhbHVlcyhwYXJhbXMuc2hvd0NsYXNzKS5pbmNsdWRlcyhjbGFzc05hbWUpXG4gICAgKSB7XG4gICAgICBlbGVtLmNsYXNzTGlzdC5yZW1vdmUoY2xhc3NOYW1lKVxuICAgIH1cbiAgfSlcbn1cblxuZXhwb3J0IGNvbnN0IGFwcGx5Q3VzdG9tQ2xhc3MgPSAoZWxlbSwgcGFyYW1zLCBjbGFzc05hbWUpID0+IHtcbiAgcmVtb3ZlQ3VzdG9tQ2xhc3NlcyhlbGVtLCBwYXJhbXMpXG5cbiAgaWYgKHBhcmFtcy5jdXN0b21DbGFzcyAmJiBwYXJhbXMuY3VzdG9tQ2xhc3NbY2xhc3NOYW1lXSkge1xuICAgIGlmICh0eXBlb2YgcGFyYW1zLmN1c3RvbUNsYXNzW2NsYXNzTmFtZV0gIT09ICdzdHJpbmcnICYmICFwYXJhbXMuY3VzdG9tQ2xhc3NbY2xhc3NOYW1lXS5mb3JFYWNoKSB7XG4gICAgICByZXR1cm4gd2FybihgSW52YWxpZCB0eXBlIG9mIGN1c3RvbUNsYXNzLiR7Y2xhc3NOYW1lfSEgRXhwZWN0ZWQgc3RyaW5nIG9yIGl0ZXJhYmxlIG9iamVjdCwgZ290IFwiJHt0eXBlb2YgcGFyYW1zLmN1c3RvbUNsYXNzW2NsYXNzTmFtZV19XCJgKVxuICAgIH1cblxuICAgIGFkZENsYXNzKGVsZW0sIHBhcmFtcy5jdXN0b21DbGFzc1tjbGFzc05hbWVdKVxuICB9XG59XG5cbmV4cG9ydCBjb25zdCBnZXRJbnB1dCA9IChwb3B1cCwgaW5wdXRUeXBlKSA9PiB7XG4gIGlmICghaW5wdXRUeXBlKSB7XG4gICAgcmV0dXJuIG51bGxcbiAgfVxuICBzd2l0Y2ggKGlucHV0VHlwZSkge1xuICAgIGNhc2UgJ3NlbGVjdCc6XG4gICAgY2FzZSAndGV4dGFyZWEnOlxuICAgIGNhc2UgJ2ZpbGUnOlxuICAgICAgcmV0dXJuIGdldENoaWxkQnlDbGFzcyhwb3B1cCwgc3dhbENsYXNzZXNbaW5wdXRUeXBlXSlcbiAgICBjYXNlICdjaGVja2JveCc6XG4gICAgICByZXR1cm4gcG9wdXAucXVlcnlTZWxlY3RvcihgLiR7c3dhbENsYXNzZXMuY2hlY2tib3h9IGlucHV0YClcbiAgICBjYXNlICdyYWRpbyc6XG4gICAgICByZXR1cm4gcG9wdXAucXVlcnlTZWxlY3RvcihgLiR7c3dhbENsYXNzZXMucmFkaW99IGlucHV0OmNoZWNrZWRgKSB8fFxuICAgICAgICBwb3B1cC5xdWVyeVNlbGVjdG9yKGAuJHtzd2FsQ2xhc3Nlcy5yYWRpb30gaW5wdXQ6Zmlyc3QtY2hpbGRgKVxuICAgIGNhc2UgJ3JhbmdlJzpcbiAgICAgIHJldHVybiBwb3B1cC5xdWVyeVNlbGVjdG9yKGAuJHtzd2FsQ2xhc3Nlcy5yYW5nZX0gaW5wdXRgKVxuICAgIGRlZmF1bHQ6XG4gICAgICByZXR1cm4gZ2V0Q2hpbGRCeUNsYXNzKHBvcHVwLCBzd2FsQ2xhc3Nlcy5pbnB1dClcbiAgfVxufVxuXG5leHBvcnQgY29uc3QgZm9jdXNJbnB1dCA9IChpbnB1dCkgPT4ge1xuICBpbnB1dC5mb2N1cygpXG5cbiAgLy8gcGxhY2UgY3Vyc29yIGF0IGVuZCBvZiB0ZXh0IGluIHRleHQgaW5wdXRcbiAgaWYgKGlucHV0LnR5cGUgIT09ICdmaWxlJykge1xuICAgIC8vIGh0dHA6Ly9zdGFja292ZXJmbG93LmNvbS9hLzIzNDU5MTVcbiAgICBjb25zdCB2YWwgPSBpbnB1dC52YWx1ZVxuICAgIGlucHV0LnZhbHVlID0gJydcbiAgICBpbnB1dC52YWx1ZSA9IHZhbFxuICB9XG59XG5cbmV4cG9ydCBjb25zdCB0b2dnbGVDbGFzcyA9ICh0YXJnZXQsIGNsYXNzTGlzdCwgY29uZGl0aW9uKSA9PiB7XG4gIGlmICghdGFyZ2V0IHx8ICFjbGFzc0xpc3QpIHtcbiAgICByZXR1cm5cbiAgfVxuICBpZiAodHlwZW9mIGNsYXNzTGlzdCA9PT0gJ3N0cmluZycpIHtcbiAgICBjbGFzc0xpc3QgPSBjbGFzc0xpc3Quc3BsaXQoL1xccysvKS5maWx0ZXIoQm9vbGVhbilcbiAgfVxuICBjbGFzc0xpc3QuZm9yRWFjaCgoY2xhc3NOYW1lKSA9PiB7XG4gICAgaWYgKHRhcmdldC5mb3JFYWNoKSB7XG4gICAgICB0YXJnZXQuZm9yRWFjaCgoZWxlbSkgPT4ge1xuICAgICAgICBjb25kaXRpb24gPyBlbGVtLmNsYXNzTGlzdC5hZGQoY2xhc3NOYW1lKSA6IGVsZW0uY2xhc3NMaXN0LnJlbW92ZShjbGFzc05hbWUpXG4gICAgICB9KVxuICAgIH0gZWxzZSB7XG4gICAgICBjb25kaXRpb24gPyB0YXJnZXQuY2xhc3NMaXN0LmFkZChjbGFzc05hbWUpIDogdGFyZ2V0LmNsYXNzTGlzdC5yZW1vdmUoY2xhc3NOYW1lKVxuICAgIH1cbiAgfSlcbn1cblxuZXhwb3J0IGNvbnN0IGFkZENsYXNzID0gKHRhcmdldCwgY2xhc3NMaXN0KSA9PiB7XG4gIHRvZ2dsZUNsYXNzKHRhcmdldCwgY2xhc3NMaXN0LCB0cnVlKVxufVxuXG5leHBvcnQgY29uc3QgcmVtb3ZlQ2xhc3MgPSAodGFyZ2V0LCBjbGFzc0xpc3QpID0+IHtcbiAgdG9nZ2xlQ2xhc3ModGFyZ2V0LCBjbGFzc0xpc3QsIGZhbHNlKVxufVxuXG5leHBvcnQgY29uc3QgZ2V0Q2hpbGRCeUNsYXNzID0gKGVsZW0sIGNsYXNzTmFtZSkgPT4ge1xuICBmb3IgKGxldCBpID0gMDsgaSA8IGVsZW0uY2hpbGROb2Rlcy5sZW5ndGg7IGkrKykge1xuICAgIGlmIChoYXNDbGFzcyhlbGVtLmNoaWxkTm9kZXNbaV0sIGNsYXNzTmFtZSkpIHtcbiAgICAgIHJldHVybiBlbGVtLmNoaWxkTm9kZXNbaV1cbiAgICB9XG4gIH1cbn1cblxuZXhwb3J0IGNvbnN0IGFwcGx5TnVtZXJpY2FsU3R5bGUgPSAoZWxlbSwgcHJvcGVydHksIHZhbHVlKSA9PiB7XG4gIGlmICh2YWx1ZSA9PT0gYCR7cGFyc2VJbnQodmFsdWUpfWApIHtcbiAgICB2YWx1ZSA9IHBhcnNlSW50KHZhbHVlKVxuICB9XG4gIGlmICh2YWx1ZSB8fCBwYXJzZUludCh2YWx1ZSkgPT09IDApIHtcbiAgICBlbGVtLnN0eWxlW3Byb3BlcnR5XSA9ICh0eXBlb2YgdmFsdWUgPT09ICdudW1iZXInKSA/IGAke3ZhbHVlfXB4YCA6IHZhbHVlXG4gIH0gZWxzZSB7XG4gICAgZWxlbS5zdHlsZS5yZW1vdmVQcm9wZXJ0eShwcm9wZXJ0eSlcbiAgfVxufVxuXG5leHBvcnQgY29uc3Qgc2hvdyA9IChlbGVtLCBkaXNwbGF5ID0gJ2ZsZXgnKSA9PiB7XG4gIGVsZW0uc3R5bGUuZGlzcGxheSA9IGRpc3BsYXlcbn1cblxuZXhwb3J0IGNvbnN0IGhpZGUgPSAoZWxlbSkgPT4ge1xuICBlbGVtLnN0eWxlLmRpc3BsYXkgPSAnbm9uZSdcbn1cblxuZXhwb3J0IGNvbnN0IHNldFN0eWxlID0gKHBhcmVudCwgc2VsZWN0b3IsIHByb3BlcnR5LCB2YWx1ZSkgPT4ge1xuICBjb25zdCBlbCA9IHBhcmVudC5xdWVyeVNlbGVjdG9yKHNlbGVjdG9yKVxuICBpZiAoZWwpIHtcbiAgICBlbC5zdHlsZVtwcm9wZXJ0eV0gPSB2YWx1ZVxuICB9XG59XG5cbmV4cG9ydCBjb25zdCB0b2dnbGUgPSAoZWxlbSwgY29uZGl0aW9uLCBkaXNwbGF5KSA9PiB7XG4gIGNvbmRpdGlvbiA/IHNob3coZWxlbSwgZGlzcGxheSkgOiBoaWRlKGVsZW0pXG59XG5cbi8vIGJvcnJvd2VkIGZyb20ganF1ZXJ5ICQoZWxlbSkuaXMoJzp2aXNpYmxlJykgaW1wbGVtZW50YXRpb25cbmV4cG9ydCBjb25zdCBpc1Zpc2libGUgPSAoZWxlbSkgPT4gISEoZWxlbSAmJiAoZWxlbS5vZmZzZXRXaWR0aCB8fCBlbGVtLm9mZnNldEhlaWdodCB8fCBlbGVtLmdldENsaWVudFJlY3RzKCkubGVuZ3RoKSlcblxuZXhwb3J0IGNvbnN0IGFsbEJ1dHRvbnNBcmVIaWRkZW4gPSAoKSA9PiAhaXNWaXNpYmxlKGdldENvbmZpcm1CdXR0b24oKSkgJiYgIWlzVmlzaWJsZShnZXREZW55QnV0dG9uKCkpICYmICFpc1Zpc2libGUoZ2V0Q2FuY2VsQnV0dG9uKCkpXG5cbmV4cG9ydCBjb25zdCBpc1Njcm9sbGFibGUgPSAoZWxlbSkgPT4gISEoZWxlbS5zY3JvbGxIZWlnaHQgPiBlbGVtLmNsaWVudEhlaWdodClcblxuLy8gYm9ycm93ZWQgZnJvbSBodHRwczovL3N0YWNrb3ZlcmZsb3cuY29tL2EvNDYzNTIxMTlcbmV4cG9ydCBjb25zdCBoYXNDc3NBbmltYXRpb24gPSAoZWxlbSkgPT4ge1xuICBjb25zdCBzdHlsZSA9IHdpbmRvdy5nZXRDb21wdXRlZFN0eWxlKGVsZW0pXG5cbiAgY29uc3QgYW5pbUR1cmF0aW9uID0gcGFyc2VGbG9hdChzdHlsZS5nZXRQcm9wZXJ0eVZhbHVlKCdhbmltYXRpb24tZHVyYXRpb24nKSB8fCAnMCcpXG4gIGNvbnN0IHRyYW5zRHVyYXRpb24gPSBwYXJzZUZsb2F0KHN0eWxlLmdldFByb3BlcnR5VmFsdWUoJ3RyYW5zaXRpb24tZHVyYXRpb24nKSB8fCAnMCcpXG5cbiAgcmV0dXJuIGFuaW1EdXJhdGlvbiA+IDAgfHwgdHJhbnNEdXJhdGlvbiA+IDBcbn1cblxuZXhwb3J0IGNvbnN0IGFuaW1hdGVUaW1lclByb2dyZXNzQmFyID0gKHRpbWVyLCByZXNldCA9IGZhbHNlKSA9PiB7XG4gIGNvbnN0IHRpbWVyUHJvZ3Jlc3NCYXIgPSBnZXRUaW1lclByb2dyZXNzQmFyKClcbiAgaWYgKGlzVmlzaWJsZSh0aW1lclByb2dyZXNzQmFyKSkge1xuICAgIGlmIChyZXNldCkge1xuICAgICAgdGltZXJQcm9ncmVzc0Jhci5zdHlsZS50cmFuc2l0aW9uID0gJ25vbmUnXG4gICAgICB0aW1lclByb2dyZXNzQmFyLnN0eWxlLndpZHRoID0gJzEwMCUnXG4gICAgfVxuICAgIHNldFRpbWVvdXQoKCkgPT4ge1xuICAgICAgdGltZXJQcm9ncmVzc0Jhci5zdHlsZS50cmFuc2l0aW9uID0gYHdpZHRoICR7dGltZXIgLyAxMDAwfXMgbGluZWFyYFxuICAgICAgdGltZXJQcm9ncmVzc0Jhci5zdHlsZS53aWR0aCA9ICcwJSdcbiAgICB9LCAxMClcbiAgfVxufVxuXG5leHBvcnQgY29uc3Qgc3RvcFRpbWVyUHJvZ3Jlc3NCYXIgPSAoKSA9PiB7XG4gIGNvbnN0IHRpbWVyUHJvZ3Jlc3NCYXIgPSBnZXRUaW1lclByb2dyZXNzQmFyKClcbiAgY29uc3QgdGltZXJQcm9ncmVzc0JhcldpZHRoID0gcGFyc2VJbnQod2luZG93LmdldENvbXB1dGVkU3R5bGUodGltZXJQcm9ncmVzc0Jhcikud2lkdGgpXG4gIHRpbWVyUHJvZ3Jlc3NCYXIuc3R5bGUucmVtb3ZlUHJvcGVydHkoJ3RyYW5zaXRpb24nKVxuICB0aW1lclByb2dyZXNzQmFyLnN0eWxlLndpZHRoID0gJzEwMCUnXG4gIGNvbnN0IHRpbWVyUHJvZ3Jlc3NCYXJGdWxsV2lkdGggPSBwYXJzZUludCh3aW5kb3cuZ2V0Q29tcHV0ZWRTdHlsZSh0aW1lclByb2dyZXNzQmFyKS53aWR0aClcbiAgY29uc3QgdGltZXJQcm9ncmVzc0JhclBlcmNlbnQgPSBwYXJzZUludCh0aW1lclByb2dyZXNzQmFyV2lkdGggLyB0aW1lclByb2dyZXNzQmFyRnVsbFdpZHRoICogMTAwKVxuICB0aW1lclByb2dyZXNzQmFyLnN0eWxlLnJlbW92ZVByb3BlcnR5KCd0cmFuc2l0aW9uJylcbiAgdGltZXJQcm9ncmVzc0Jhci5zdHlsZS53aWR0aCA9IGAke3RpbWVyUHJvZ3Jlc3NCYXJQZXJjZW50fSVgXG59XG4iLCJpbXBvcnQgeyBzd2FsQ2xhc3NlcyB9IGZyb20gJy4uL2NsYXNzZXMuanMnXG5pbXBvcnQgeyB1bmlxdWVBcnJheSwgdG9BcnJheSB9IGZyb20gJy4uL3V0aWxzLmpzJ1xuaW1wb3J0IHsgaXNWaXNpYmxlIH0gZnJvbSAnLi9kb21VdGlscy5qcydcblxuZXhwb3J0IGNvbnN0IGdldENvbnRhaW5lciA9ICgpID0+IGRvY3VtZW50LmJvZHkucXVlcnlTZWxlY3RvcihgLiR7c3dhbENsYXNzZXMuY29udGFpbmVyfWApXG5cbmV4cG9ydCBjb25zdCBlbGVtZW50QnlTZWxlY3RvciA9IChzZWxlY3RvclN0cmluZykgPT4ge1xuICBjb25zdCBjb250YWluZXIgPSBnZXRDb250YWluZXIoKVxuICByZXR1cm4gY29udGFpbmVyID8gY29udGFpbmVyLnF1ZXJ5U2VsZWN0b3Ioc2VsZWN0b3JTdHJpbmcpIDogbnVsbFxufVxuXG5jb25zdCBlbGVtZW50QnlDbGFzcyA9IChjbGFzc05hbWUpID0+IHtcbiAgcmV0dXJuIGVsZW1lbnRCeVNlbGVjdG9yKGAuJHtjbGFzc05hbWV9YClcbn1cblxuZXhwb3J0IGNvbnN0IGdldFBvcHVwID0gKCkgPT4gZWxlbWVudEJ5Q2xhc3Moc3dhbENsYXNzZXMucG9wdXApXG5cbmV4cG9ydCBjb25zdCBnZXRJY29uID0gKCkgPT4gZWxlbWVudEJ5Q2xhc3Moc3dhbENsYXNzZXMuaWNvbilcblxuZXhwb3J0IGNvbnN0IGdldFRpdGxlID0gKCkgPT4gZWxlbWVudEJ5Q2xhc3Moc3dhbENsYXNzZXMudGl0bGUpXG5cbmV4cG9ydCBjb25zdCBnZXRIdG1sQ29udGFpbmVyID0gKCkgPT4gZWxlbWVudEJ5Q2xhc3Moc3dhbENsYXNzZXNbJ2h0bWwtY29udGFpbmVyJ10pXG5cbmV4cG9ydCBjb25zdCBnZXRJbWFnZSA9ICgpID0+IGVsZW1lbnRCeUNsYXNzKHN3YWxDbGFzc2VzLmltYWdlKVxuXG5leHBvcnQgY29uc3QgZ2V0UHJvZ3Jlc3NTdGVwcyA9ICgpID0+IGVsZW1lbnRCeUNsYXNzKHN3YWxDbGFzc2VzWydwcm9ncmVzcy1zdGVwcyddKVxuXG5leHBvcnQgY29uc3QgZ2V0VmFsaWRhdGlvbk1lc3NhZ2UgPSAoKSA9PiBlbGVtZW50QnlDbGFzcyhzd2FsQ2xhc3Nlc1sndmFsaWRhdGlvbi1tZXNzYWdlJ10pXG5cbmV4cG9ydCBjb25zdCBnZXRDb25maXJtQnV0dG9uID0gKCkgPT4gZWxlbWVudEJ5U2VsZWN0b3IoYC4ke3N3YWxDbGFzc2VzLmFjdGlvbnN9IC4ke3N3YWxDbGFzc2VzLmNvbmZpcm19YClcblxuZXhwb3J0IGNvbnN0IGdldERlbnlCdXR0b24gPSAoKSA9PiBlbGVtZW50QnlTZWxlY3RvcihgLiR7c3dhbENsYXNzZXMuYWN0aW9uc30gLiR7c3dhbENsYXNzZXMuZGVueX1gKVxuXG5leHBvcnQgY29uc3QgZ2V0SW5wdXRMYWJlbCA9ICgpID0+IGVsZW1lbnRCeUNsYXNzKHN3YWxDbGFzc2VzWydpbnB1dC1sYWJlbCddKVxuXG5leHBvcnQgY29uc3QgZ2V0TG9hZGVyID0gKCkgPT4gZWxlbWVudEJ5U2VsZWN0b3IoYC4ke3N3YWxDbGFzc2VzLmxvYWRlcn1gKVxuXG5leHBvcnQgY29uc3QgZ2V0Q2FuY2VsQnV0dG9uID0gKCkgPT4gZWxlbWVudEJ5U2VsZWN0b3IoYC4ke3N3YWxDbGFzc2VzLmFjdGlvbnN9IC4ke3N3YWxDbGFzc2VzLmNhbmNlbH1gKVxuXG5leHBvcnQgY29uc3QgZ2V0QWN0aW9ucyA9ICgpID0+IGVsZW1lbnRCeUNsYXNzKHN3YWxDbGFzc2VzLmFjdGlvbnMpXG5cbmV4cG9ydCBjb25zdCBnZXRGb290ZXIgPSAoKSA9PiBlbGVtZW50QnlDbGFzcyhzd2FsQ2xhc3Nlcy5mb290ZXIpXG5cbmV4cG9ydCBjb25zdCBnZXRUaW1lclByb2dyZXNzQmFyID0gKCkgPT4gZWxlbWVudEJ5Q2xhc3Moc3dhbENsYXNzZXNbJ3RpbWVyLXByb2dyZXNzLWJhciddKVxuXG5leHBvcnQgY29uc3QgZ2V0Q2xvc2VCdXR0b24gPSAoKSA9PiBlbGVtZW50QnlDbGFzcyhzd2FsQ2xhc3Nlcy5jbG9zZSlcblxuLy8gaHR0cHM6Ly9naXRodWIuY29tL2prdXAvZm9jdXNhYmxlL2Jsb2IvbWFzdGVyL2luZGV4LmpzXG5jb25zdCBmb2N1c2FibGUgPSBgXG4gIGFbaHJlZl0sXG4gIGFyZWFbaHJlZl0sXG4gIGlucHV0Om5vdChbZGlzYWJsZWRdKSxcbiAgc2VsZWN0Om5vdChbZGlzYWJsZWRdKSxcbiAgdGV4dGFyZWE6bm90KFtkaXNhYmxlZF0pLFxuICBidXR0b246bm90KFtkaXNhYmxlZF0pLFxuICBpZnJhbWUsXG4gIG9iamVjdCxcbiAgZW1iZWQsXG4gIFt0YWJpbmRleD1cIjBcIl0sXG4gIFtjb250ZW50ZWRpdGFibGVdLFxuICBhdWRpb1tjb250cm9sc10sXG4gIHZpZGVvW2NvbnRyb2xzXSxcbiAgc3VtbWFyeVxuYFxuXG5leHBvcnQgY29uc3QgZ2V0Rm9jdXNhYmxlRWxlbWVudHMgPSAoKSA9PiB7XG4gIGNvbnN0IGZvY3VzYWJsZUVsZW1lbnRzV2l0aFRhYmluZGV4ID0gdG9BcnJheShcbiAgICBnZXRQb3B1cCgpLnF1ZXJ5U2VsZWN0b3JBbGwoJ1t0YWJpbmRleF06bm90KFt0YWJpbmRleD1cIi0xXCJdKTpub3QoW3RhYmluZGV4PVwiMFwiXSknKVxuICApXG4gIC8vIHNvcnQgYWNjb3JkaW5nIHRvIHRhYmluZGV4XG4gICAgLnNvcnQoKGEsIGIpID0+IHtcbiAgICAgIGEgPSBwYXJzZUludChhLmdldEF0dHJpYnV0ZSgndGFiaW5kZXgnKSlcbiAgICAgIGIgPSBwYXJzZUludChiLmdldEF0dHJpYnV0ZSgndGFiaW5kZXgnKSlcbiAgICAgIGlmIChhID4gYikge1xuICAgICAgICByZXR1cm4gMVxuICAgICAgfSBlbHNlIGlmIChhIDwgYikge1xuICAgICAgICByZXR1cm4gLTFcbiAgICAgIH1cbiAgICAgIHJldHVybiAwXG4gICAgfSlcblxuICBjb25zdCBvdGhlckZvY3VzYWJsZUVsZW1lbnRzID0gdG9BcnJheShcbiAgICBnZXRQb3B1cCgpLnF1ZXJ5U2VsZWN0b3JBbGwoZm9jdXNhYmxlKVxuICApLmZpbHRlcihlbCA9PiBlbC5nZXRBdHRyaWJ1dGUoJ3RhYmluZGV4JykgIT09ICctMScpXG5cbiAgcmV0dXJuIHVuaXF1ZUFycmF5KGZvY3VzYWJsZUVsZW1lbnRzV2l0aFRhYmluZGV4LmNvbmNhdChvdGhlckZvY3VzYWJsZUVsZW1lbnRzKSkuZmlsdGVyKGVsID0+IGlzVmlzaWJsZShlbCkpXG59XG5cbmV4cG9ydCBjb25zdCBpc01vZGFsID0gKCkgPT4ge1xuICByZXR1cm4gIWlzVG9hc3QoKSAmJiAhZG9jdW1lbnQuYm9keS5jbGFzc0xpc3QuY29udGFpbnMoc3dhbENsYXNzZXNbJ25vLWJhY2tkcm9wJ10pXG59XG5cbmV4cG9ydCBjb25zdCBpc1RvYXN0ID0gKCkgPT4ge1xuICByZXR1cm4gZG9jdW1lbnQuYm9keS5jbGFzc0xpc3QuY29udGFpbnMoc3dhbENsYXNzZXNbJ3RvYXN0LXNob3duJ10pXG59XG5cbmV4cG9ydCBjb25zdCBpc0xvYWRpbmcgPSAoKSA9PiB7XG4gIHJldHVybiBnZXRQb3B1cCgpLmhhc0F0dHJpYnV0ZSgnZGF0YS1sb2FkaW5nJylcbn1cbiIsImV4cG9ydCAqIGZyb20gJy4vZG9tVXRpbHMuanMnXG5leHBvcnQgKiBmcm9tICcuL2luaXQuanMnXG5leHBvcnQgKiBmcm9tICcuL2dldHRlcnMuanMnXG5leHBvcnQgKiBmcm9tICcuL3BhcnNlSHRtbFRvQ29udGFpbmVyLmpzJ1xuZXhwb3J0ICogZnJvbSAnLi9hbmltYXRpb25FbmRFdmVudC5qcydcbmV4cG9ydCAqIGZyb20gJy4vbWVhc3VyZVNjcm9sbGJhci5qcydcbmV4cG9ydCAqIGZyb20gJy4vcmVuZGVyZXJzL3JlbmRlci5qcydcbiIsImltcG9ydCB7IHN3YWxDbGFzc2VzIH0gZnJvbSAnLi4vY2xhc3Nlcy5qcydcbmltcG9ydCB7IGdldENvbnRhaW5lciwgZ2V0UG9wdXAgfSBmcm9tICcuL2dldHRlcnMuanMnXG5pbXBvcnQgeyBhZGRDbGFzcywgcmVtb3ZlQ2xhc3MsIGdldENoaWxkQnlDbGFzcywgc2V0SW5uZXJIdG1sIH0gZnJvbSAnLi9kb21VdGlscy5qcydcbmltcG9ydCB7IGlzTm9kZUVudiB9IGZyb20gJy4uL2lzTm9kZUVudi5qcydcbmltcG9ydCB7IGVycm9yIH0gZnJvbSAnLi4vdXRpbHMuanMnXG5pbXBvcnQgc3dlZXRBbGVydCBmcm9tICcuLi8uLi9zd2VldGFsZXJ0Mi5qcydcblxuY29uc3Qgc3dlZXRIVE1MID0gYFxuIDxkaXYgYXJpYS1sYWJlbGxlZGJ5PVwiJHtzd2FsQ2xhc3Nlcy50aXRsZX1cIiBhcmlhLWRlc2NyaWJlZGJ5PVwiJHtzd2FsQ2xhc3Nlc1snaHRtbC1jb250YWluZXInXX1cIiBjbGFzcz1cIiR7c3dhbENsYXNzZXMucG9wdXB9XCIgdGFiaW5kZXg9XCItMVwiPlxuICAgPGJ1dHRvbiB0eXBlPVwiYnV0dG9uXCIgY2xhc3M9XCIke3N3YWxDbGFzc2VzLmNsb3NlfVwiPjwvYnV0dG9uPlxuICAgPHVsIGNsYXNzPVwiJHtzd2FsQ2xhc3Nlc1sncHJvZ3Jlc3Mtc3RlcHMnXX1cIj48L3VsPlxuICAgPGRpdiBjbGFzcz1cIiR7c3dhbENsYXNzZXMuaWNvbn1cIj48L2Rpdj5cbiAgIDxpbWcgY2xhc3M9XCIke3N3YWxDbGFzc2VzLmltYWdlfVwiIC8+XG4gICA8aDIgY2xhc3M9XCIke3N3YWxDbGFzc2VzLnRpdGxlfVwiIGlkPVwiJHtzd2FsQ2xhc3Nlcy50aXRsZX1cIj48L2gyPlxuICAgPGRpdiBjbGFzcz1cIiR7c3dhbENsYXNzZXNbJ2h0bWwtY29udGFpbmVyJ119XCIgaWQ9XCIke3N3YWxDbGFzc2VzWydodG1sLWNvbnRhaW5lciddfVwiPjwvZGl2PlxuICAgPGlucHV0IGNsYXNzPVwiJHtzd2FsQ2xhc3Nlcy5pbnB1dH1cIiAvPlxuICAgPGlucHV0IHR5cGU9XCJmaWxlXCIgY2xhc3M9XCIke3N3YWxDbGFzc2VzLmZpbGV9XCIgLz5cbiAgIDxkaXYgY2xhc3M9XCIke3N3YWxDbGFzc2VzLnJhbmdlfVwiPlxuICAgICA8aW5wdXQgdHlwZT1cInJhbmdlXCIgLz5cbiAgICAgPG91dHB1dD48L291dHB1dD5cbiAgIDwvZGl2PlxuICAgPHNlbGVjdCBjbGFzcz1cIiR7c3dhbENsYXNzZXMuc2VsZWN0fVwiPjwvc2VsZWN0PlxuICAgPGRpdiBjbGFzcz1cIiR7c3dhbENsYXNzZXMucmFkaW99XCI+PC9kaXY+XG4gICA8bGFiZWwgZm9yPVwiJHtzd2FsQ2xhc3Nlcy5jaGVja2JveH1cIiBjbGFzcz1cIiR7c3dhbENsYXNzZXMuY2hlY2tib3h9XCI+XG4gICAgIDxpbnB1dCB0eXBlPVwiY2hlY2tib3hcIiAvPlxuICAgICA8c3BhbiBjbGFzcz1cIiR7c3dhbENsYXNzZXMubGFiZWx9XCI+PC9zcGFuPlxuICAgPC9sYWJlbD5cbiAgIDx0ZXh0YXJlYSBjbGFzcz1cIiR7c3dhbENsYXNzZXMudGV4dGFyZWF9XCI+PC90ZXh0YXJlYT5cbiAgIDxkaXYgY2xhc3M9XCIke3N3YWxDbGFzc2VzWyd2YWxpZGF0aW9uLW1lc3NhZ2UnXX1cIiBpZD1cIiR7c3dhbENsYXNzZXNbJ3ZhbGlkYXRpb24tbWVzc2FnZSddfVwiPjwvZGl2PlxuICAgPGRpdiBjbGFzcz1cIiR7c3dhbENsYXNzZXMuYWN0aW9uc31cIj5cbiAgICAgPGRpdiBjbGFzcz1cIiR7c3dhbENsYXNzZXMubG9hZGVyfVwiPjwvZGl2PlxuICAgICA8YnV0dG9uIHR5cGU9XCJidXR0b25cIiBjbGFzcz1cIiR7c3dhbENsYXNzZXMuY29uZmlybX1cIj48L2J1dHRvbj5cbiAgICAgPGJ1dHRvbiB0eXBlPVwiYnV0dG9uXCIgY2xhc3M9XCIke3N3YWxDbGFzc2VzLmRlbnl9XCI+PC9idXR0b24+XG4gICAgIDxidXR0b24gdHlwZT1cImJ1dHRvblwiIGNsYXNzPVwiJHtzd2FsQ2xhc3Nlcy5jYW5jZWx9XCI+PC9idXR0b24+XG4gICA8L2Rpdj5cbiAgIDxkaXYgY2xhc3M9XCIke3N3YWxDbGFzc2VzLmZvb3Rlcn1cIj48L2Rpdj5cbiAgIDxkaXYgY2xhc3M9XCIke3N3YWxDbGFzc2VzWyd0aW1lci1wcm9ncmVzcy1iYXItY29udGFpbmVyJ119XCI+XG4gICAgIDxkaXYgY2xhc3M9XCIke3N3YWxDbGFzc2VzWyd0aW1lci1wcm9ncmVzcy1iYXInXX1cIj48L2Rpdj5cbiAgIDwvZGl2PlxuIDwvZGl2PlxuYC5yZXBsYWNlKC8oXnxcXG4pXFxzKi9nLCAnJylcblxuY29uc3QgcmVzZXRPbGRDb250YWluZXIgPSAoKSA9PiB7XG4gIGNvbnN0IG9sZENvbnRhaW5lciA9IGdldENvbnRhaW5lcigpXG4gIGlmICghb2xkQ29udGFpbmVyKSB7XG4gICAgcmV0dXJuIGZhbHNlXG4gIH1cblxuICBvbGRDb250YWluZXIucmVtb3ZlKClcbiAgcmVtb3ZlQ2xhc3MoXG4gICAgW2RvY3VtZW50LmRvY3VtZW50RWxlbWVudCwgZG9jdW1lbnQuYm9keV0sXG4gICAgW1xuICAgICAgc3dhbENsYXNzZXNbJ25vLWJhY2tkcm9wJ10sXG4gICAgICBzd2FsQ2xhc3Nlc1sndG9hc3Qtc2hvd24nXSxcbiAgICAgIHN3YWxDbGFzc2VzWydoYXMtY29sdW1uJ11cbiAgICBdXG4gIClcblxuICByZXR1cm4gdHJ1ZVxufVxuXG5jb25zdCByZXNldFZhbGlkYXRpb25NZXNzYWdlID0gKCkgPT4ge1xuICBpZiAoc3dlZXRBbGVydC5pc1Zpc2libGUoKSkge1xuICAgIHN3ZWV0QWxlcnQucmVzZXRWYWxpZGF0aW9uTWVzc2FnZSgpXG4gIH1cbn1cblxuY29uc3QgYWRkSW5wdXRDaGFuZ2VMaXN0ZW5lcnMgPSAoKSA9PiB7XG4gIGNvbnN0IHBvcHVwID0gZ2V0UG9wdXAoKVxuXG4gIGNvbnN0IGlucHV0ID0gZ2V0Q2hpbGRCeUNsYXNzKHBvcHVwLCBzd2FsQ2xhc3Nlcy5pbnB1dClcbiAgY29uc3QgZmlsZSA9IGdldENoaWxkQnlDbGFzcyhwb3B1cCwgc3dhbENsYXNzZXMuZmlsZSlcbiAgY29uc3QgcmFuZ2UgPSBwb3B1cC5xdWVyeVNlbGVjdG9yKGAuJHtzd2FsQ2xhc3Nlcy5yYW5nZX0gaW5wdXRgKVxuICBjb25zdCByYW5nZU91dHB1dCA9IHBvcHVwLnF1ZXJ5U2VsZWN0b3IoYC4ke3N3YWxDbGFzc2VzLnJhbmdlfSBvdXRwdXRgKVxuICBjb25zdCBzZWxlY3QgPSBnZXRDaGlsZEJ5Q2xhc3MocG9wdXAsIHN3YWxDbGFzc2VzLnNlbGVjdClcbiAgY29uc3QgY2hlY2tib3ggPSBwb3B1cC5xdWVyeVNlbGVjdG9yKGAuJHtzd2FsQ2xhc3Nlcy5jaGVja2JveH0gaW5wdXRgKVxuICBjb25zdCB0ZXh0YXJlYSA9IGdldENoaWxkQnlDbGFzcyhwb3B1cCwgc3dhbENsYXNzZXMudGV4dGFyZWEpXG5cbiAgaW5wdXQub25pbnB1dCA9IHJlc2V0VmFsaWRhdGlvbk1lc3NhZ2VcbiAgZmlsZS5vbmNoYW5nZSA9IHJlc2V0VmFsaWRhdGlvbk1lc3NhZ2VcbiAgc2VsZWN0Lm9uY2hhbmdlID0gcmVzZXRWYWxpZGF0aW9uTWVzc2FnZVxuICBjaGVja2JveC5vbmNoYW5nZSA9IHJlc2V0VmFsaWRhdGlvbk1lc3NhZ2VcbiAgdGV4dGFyZWEub25pbnB1dCA9IHJlc2V0VmFsaWRhdGlvbk1lc3NhZ2VcblxuICByYW5nZS5vbmlucHV0ID0gKCkgPT4ge1xuICAgIHJlc2V0VmFsaWRhdGlvbk1lc3NhZ2UoKVxuICAgIHJhbmdlT3V0cHV0LnZhbHVlID0gcmFuZ2UudmFsdWVcbiAgfVxuXG4gIHJhbmdlLm9uY2hhbmdlID0gKCkgPT4ge1xuICAgIHJlc2V0VmFsaWRhdGlvbk1lc3NhZ2UoKVxuICAgIHJhbmdlLm5leHRTaWJsaW5nLnZhbHVlID0gcmFuZ2UudmFsdWVcbiAgfVxufVxuXG5jb25zdCBnZXRUYXJnZXQgPSAodGFyZ2V0KSA9PiB0eXBlb2YgdGFyZ2V0ID09PSAnc3RyaW5nJyA/IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IodGFyZ2V0KSA6IHRhcmdldFxuXG5jb25zdCBzZXR1cEFjY2Vzc2liaWxpdHkgPSAocGFyYW1zKSA9PiB7XG4gIGNvbnN0IHBvcHVwID0gZ2V0UG9wdXAoKVxuXG4gIHBvcHVwLnNldEF0dHJpYnV0ZSgncm9sZScsIHBhcmFtcy50b2FzdCA/ICdhbGVydCcgOiAnZGlhbG9nJylcbiAgcG9wdXAuc2V0QXR0cmlidXRlKCdhcmlhLWxpdmUnLCBwYXJhbXMudG9hc3QgPyAncG9saXRlJyA6ICdhc3NlcnRpdmUnKVxuICBpZiAoIXBhcmFtcy50b2FzdCkge1xuICAgIHBvcHVwLnNldEF0dHJpYnV0ZSgnYXJpYS1tb2RhbCcsICd0cnVlJylcbiAgfVxufVxuXG5jb25zdCBzZXR1cFJUTCA9ICh0YXJnZXRFbGVtZW50KSA9PiB7XG4gIGlmICh3aW5kb3cuZ2V0Q29tcHV0ZWRTdHlsZSh0YXJnZXRFbGVtZW50KS5kaXJlY3Rpb24gPT09ICdydGwnKSB7XG4gICAgYWRkQ2xhc3MoZ2V0Q29udGFpbmVyKCksIHN3YWxDbGFzc2VzLnJ0bClcbiAgfVxufVxuXG4vKlxuICogQWRkIG1vZGFsICsgYmFja2Ryb3AgdG8gRE9NXG4gKi9cbmV4cG9ydCBjb25zdCBpbml0ID0gKHBhcmFtcykgPT4ge1xuICAvLyBDbGVhbiB1cCB0aGUgb2xkIHBvcHVwIGNvbnRhaW5lciBpZiBpdCBleGlzdHNcbiAgY29uc3Qgb2xkQ29udGFpbmVyRXhpc3RlZCA9IHJlc2V0T2xkQ29udGFpbmVyKClcblxuICAvKiBpc3RhbmJ1bCBpZ25vcmUgaWYgKi9cbiAgaWYgKGlzTm9kZUVudigpKSB7XG4gICAgZXJyb3IoJ1N3ZWV0QWxlcnQyIHJlcXVpcmVzIGRvY3VtZW50IHRvIGluaXRpYWxpemUnKVxuICAgIHJldHVyblxuICB9XG5cbiAgY29uc3QgY29udGFpbmVyID0gZG9jdW1lbnQuY3JlYXRlRWxlbWVudCgnZGl2JylcbiAgY29udGFpbmVyLmNsYXNzTmFtZSA9IHN3YWxDbGFzc2VzLmNvbnRhaW5lclxuICBpZiAob2xkQ29udGFpbmVyRXhpc3RlZCkge1xuICAgIGFkZENsYXNzKGNvbnRhaW5lciwgc3dhbENsYXNzZXNbJ25vLXRyYW5zaXRpb24nXSlcbiAgfVxuICBzZXRJbm5lckh0bWwoY29udGFpbmVyLCBzd2VldEhUTUwpXG5cbiAgY29uc3QgdGFyZ2V0RWxlbWVudCA9IGdldFRhcmdldChwYXJhbXMudGFyZ2V0KVxuICB0YXJnZXRFbGVtZW50LmFwcGVuZENoaWxkKGNvbnRhaW5lcilcblxuICBzZXR1cEFjY2Vzc2liaWxpdHkocGFyYW1zKVxuICBzZXR1cFJUTCh0YXJnZXRFbGVtZW50KVxuICBhZGRJbnB1dENoYW5nZUxpc3RlbmVycygpXG59XG4iLCJpbXBvcnQgKiBhcyBkb20gZnJvbSAnLi9pbmRleC5qcydcbmltcG9ydCB7IHN3YWxDbGFzc2VzIH0gZnJvbSAnLi4vY2xhc3Nlcy5qcydcbmltcG9ydCB7IGdldENoaWxkQnlDbGFzcyB9IGZyb20gJy4vZG9tVXRpbHMuanMnXG5pbXBvcnQgeyBhc1Byb21pc2UsIGVycm9yLCBoYXNUb1Byb21pc2VGbiwgaXNQcm9taXNlIH0gZnJvbSAnLi4vdXRpbHMuanMnXG5pbXBvcnQgeyBzaG93TG9hZGluZyB9IGZyb20gJy4uLy4uL3N0YXRpY01ldGhvZHMvc2hvd0xvYWRpbmcuanMnXG5cbmV4cG9ydCBjb25zdCBoYW5kbGVJbnB1dE9wdGlvbnNBbmRWYWx1ZSA9IChpbnN0YW5jZSwgcGFyYW1zKSA9PiB7XG4gIGlmIChwYXJhbXMuaW5wdXQgPT09ICdzZWxlY3QnIHx8IHBhcmFtcy5pbnB1dCA9PT0gJ3JhZGlvJykge1xuICAgIGhhbmRsZUlucHV0T3B0aW9ucyhpbnN0YW5jZSwgcGFyYW1zKVxuICB9IGVsc2UgaWYgKFxuICAgIFsndGV4dCcsICdlbWFpbCcsICdudW1iZXInLCAndGVsJywgJ3RleHRhcmVhJ10uaW5jbHVkZXMocGFyYW1zLmlucHV0KSAmJlxuICAgIChoYXNUb1Byb21pc2VGbihwYXJhbXMuaW5wdXRWYWx1ZSkgfHwgaXNQcm9taXNlKHBhcmFtcy5pbnB1dFZhbHVlKSlcbiAgKSB7XG4gICAgc2hvd0xvYWRpbmcoZG9tLmdldENvbmZpcm1CdXR0b24oKSlcbiAgICBoYW5kbGVJbnB1dFZhbHVlKGluc3RhbmNlLCBwYXJhbXMpXG4gIH1cbn1cblxuZXhwb3J0IGNvbnN0IGdldElucHV0VmFsdWUgPSAoaW5zdGFuY2UsIGlubmVyUGFyYW1zKSA9PiB7XG4gIGNvbnN0IGlucHV0ID0gaW5zdGFuY2UuZ2V0SW5wdXQoKVxuICBpZiAoIWlucHV0KSB7XG4gICAgcmV0dXJuIG51bGxcbiAgfVxuICBzd2l0Y2ggKGlubmVyUGFyYW1zLmlucHV0KSB7XG4gICAgY2FzZSAnY2hlY2tib3gnOlxuICAgICAgcmV0dXJuIGdldENoZWNrYm94VmFsdWUoaW5wdXQpXG4gICAgY2FzZSAncmFkaW8nOlxuICAgICAgcmV0dXJuIGdldFJhZGlvVmFsdWUoaW5wdXQpXG4gICAgY2FzZSAnZmlsZSc6XG4gICAgICByZXR1cm4gZ2V0RmlsZVZhbHVlKGlucHV0KVxuICAgIGRlZmF1bHQ6XG4gICAgICByZXR1cm4gaW5uZXJQYXJhbXMuaW5wdXRBdXRvVHJpbSA/IGlucHV0LnZhbHVlLnRyaW0oKSA6IGlucHV0LnZhbHVlXG4gIH1cbn1cblxuY29uc3QgZ2V0Q2hlY2tib3hWYWx1ZSA9IChpbnB1dCkgPT4gaW5wdXQuY2hlY2tlZCA/IDEgOiAwXG5cbmNvbnN0IGdldFJhZGlvVmFsdWUgPSAoaW5wdXQpID0+IGlucHV0LmNoZWNrZWQgPyBpbnB1dC52YWx1ZSA6IG51bGxcblxuY29uc3QgZ2V0RmlsZVZhbHVlID0gKGlucHV0KSA9PiBpbnB1dC5maWxlcy5sZW5ndGggPyAoaW5wdXQuZ2V0QXR0cmlidXRlKCdtdWx0aXBsZScpICE9PSBudWxsID8gaW5wdXQuZmlsZXMgOiBpbnB1dC5maWxlc1swXSkgOiBudWxsXG5cbmNvbnN0IGhhbmRsZUlucHV0T3B0aW9ucyA9IChpbnN0YW5jZSwgcGFyYW1zKSA9PiB7XG4gIGNvbnN0IHBvcHVwID0gZG9tLmdldFBvcHVwKClcbiAgY29uc3QgcHJvY2Vzc0lucHV0T3B0aW9ucyA9IChpbnB1dE9wdGlvbnMpID0+IHBvcHVsYXRlSW5wdXRPcHRpb25zW3BhcmFtcy5pbnB1dF0ocG9wdXAsIGZvcm1hdElucHV0T3B0aW9ucyhpbnB1dE9wdGlvbnMpLCBwYXJhbXMpXG4gIGlmIChoYXNUb1Byb21pc2VGbihwYXJhbXMuaW5wdXRPcHRpb25zKSB8fCBpc1Byb21pc2UocGFyYW1zLmlucHV0T3B0aW9ucykpIHtcbiAgICBzaG93TG9hZGluZyhkb20uZ2V0Q29uZmlybUJ1dHRvbigpKVxuICAgIGFzUHJvbWlzZShwYXJhbXMuaW5wdXRPcHRpb25zKS50aGVuKChpbnB1dE9wdGlvbnMpID0+IHtcbiAgICAgIGluc3RhbmNlLmhpZGVMb2FkaW5nKClcbiAgICAgIHByb2Nlc3NJbnB1dE9wdGlvbnMoaW5wdXRPcHRpb25zKVxuICAgIH0pXG4gIH0gZWxzZSBpZiAodHlwZW9mIHBhcmFtcy5pbnB1dE9wdGlvbnMgPT09ICdvYmplY3QnKSB7XG4gICAgcHJvY2Vzc0lucHV0T3B0aW9ucyhwYXJhbXMuaW5wdXRPcHRpb25zKVxuICB9IGVsc2Uge1xuICAgIGVycm9yKGBVbmV4cGVjdGVkIHR5cGUgb2YgaW5wdXRPcHRpb25zISBFeHBlY3RlZCBvYmplY3QsIE1hcCBvciBQcm9taXNlLCBnb3QgJHt0eXBlb2YgcGFyYW1zLmlucHV0T3B0aW9uc31gKVxuICB9XG59XG5cbmNvbnN0IGhhbmRsZUlucHV0VmFsdWUgPSAoaW5zdGFuY2UsIHBhcmFtcykgPT4ge1xuICBjb25zdCBpbnB1dCA9IGluc3RhbmNlLmdldElucHV0KClcbiAgZG9tLmhpZGUoaW5wdXQpXG4gIGFzUHJvbWlzZShwYXJhbXMuaW5wdXRWYWx1ZSkudGhlbigoaW5wdXRWYWx1ZSkgPT4ge1xuICAgIGlucHV0LnZhbHVlID0gcGFyYW1zLmlucHV0ID09PSAnbnVtYmVyJyA/IHBhcnNlRmxvYXQoaW5wdXRWYWx1ZSkgfHwgMCA6IGAke2lucHV0VmFsdWV9YFxuICAgIGRvbS5zaG93KGlucHV0KVxuICAgIGlucHV0LmZvY3VzKClcbiAgICBpbnN0YW5jZS5oaWRlTG9hZGluZygpXG4gIH0pXG4gICAgLmNhdGNoKChlcnIpID0+IHtcbiAgICAgIGVycm9yKGBFcnJvciBpbiBpbnB1dFZhbHVlIHByb21pc2U6ICR7ZXJyfWApXG4gICAgICBpbnB1dC52YWx1ZSA9ICcnXG4gICAgICBkb20uc2hvdyhpbnB1dClcbiAgICAgIGlucHV0LmZvY3VzKClcbiAgICAgIGluc3RhbmNlLmhpZGVMb2FkaW5nKClcbiAgICB9KVxufVxuXG5jb25zdCBwb3B1bGF0ZUlucHV0T3B0aW9ucyA9IHtcbiAgc2VsZWN0OiAocG9wdXAsIGlucHV0T3B0aW9ucywgcGFyYW1zKSA9PiB7XG4gICAgY29uc3Qgc2VsZWN0ID0gZ2V0Q2hpbGRCeUNsYXNzKHBvcHVwLCBzd2FsQ2xhc3Nlcy5zZWxlY3QpXG4gICAgY29uc3QgcmVuZGVyT3B0aW9uID0gKHBhcmVudCwgb3B0aW9uTGFiZWwsIG9wdGlvblZhbHVlKSA9PiB7XG4gICAgICBjb25zdCBvcHRpb24gPSBkb2N1bWVudC5jcmVhdGVFbGVtZW50KCdvcHRpb24nKVxuICAgICAgb3B0aW9uLnZhbHVlID0gb3B0aW9uVmFsdWVcbiAgICAgIGRvbS5zZXRJbm5lckh0bWwob3B0aW9uLCBvcHRpb25MYWJlbClcbiAgICAgIG9wdGlvbi5zZWxlY3RlZCA9IGlzU2VsZWN0ZWQob3B0aW9uVmFsdWUsIHBhcmFtcy5pbnB1dFZhbHVlKVxuICAgICAgcGFyZW50LmFwcGVuZENoaWxkKG9wdGlvbilcbiAgICB9XG4gICAgaW5wdXRPcHRpb25zLmZvckVhY2goaW5wdXRPcHRpb24gPT4ge1xuICAgICAgY29uc3Qgb3B0aW9uVmFsdWUgPSBpbnB1dE9wdGlvblswXVxuICAgICAgY29uc3Qgb3B0aW9uTGFiZWwgPSBpbnB1dE9wdGlvblsxXVxuICAgICAgLy8gPG9wdGdyb3VwPiBzcGVjOlxuICAgICAgLy8gaHR0cHM6Ly93d3cudzMub3JnL1RSL2h0bWw0MDEvaW50ZXJhY3QvZm9ybXMuaHRtbCNoLTE3LjZcbiAgICAgIC8vIFwiLi4uYWxsIE9QVEdST1VQIGVsZW1lbnRzIG11c3QgYmUgc3BlY2lmaWVkIGRpcmVjdGx5IHdpdGhpbiBhIFNFTEVDVCBlbGVtZW50IChpLmUuLCBncm91cHMgbWF5IG5vdCBiZSBuZXN0ZWQpLi4uXCJcbiAgICAgIC8vIGNoZWNrIHdoZXRoZXIgdGhpcyBpcyBhIDxvcHRncm91cD5cbiAgICAgIGlmIChBcnJheS5pc0FycmF5KG9wdGlvbkxhYmVsKSkgeyAvLyBpZiBpdCBpcyBhbiBhcnJheSwgdGhlbiBpdCBpcyBhbiA8b3B0Z3JvdXA+XG4gICAgICAgIGNvbnN0IG9wdGdyb3VwID0gZG9jdW1lbnQuY3JlYXRlRWxlbWVudCgnb3B0Z3JvdXAnKVxuICAgICAgICBvcHRncm91cC5sYWJlbCA9IG9wdGlvblZhbHVlXG4gICAgICAgIG9wdGdyb3VwLmRpc2FibGVkID0gZmFsc2UgLy8gbm90IGNvbmZpZ3VyYWJsZSBmb3Igbm93XG4gICAgICAgIHNlbGVjdC5hcHBlbmRDaGlsZChvcHRncm91cClcbiAgICAgICAgb3B0aW9uTGFiZWwuZm9yRWFjaChvID0+IHJlbmRlck9wdGlvbihvcHRncm91cCwgb1sxXSwgb1swXSkpXG4gICAgICB9IGVsc2UgeyAvLyBjYXNlIG9mIDxvcHRpb24+XG4gICAgICAgIHJlbmRlck9wdGlvbihzZWxlY3QsIG9wdGlvbkxhYmVsLCBvcHRpb25WYWx1ZSlcbiAgICAgIH1cbiAgICB9KVxuICAgIHNlbGVjdC5mb2N1cygpXG4gIH0sXG5cbiAgcmFkaW86IChwb3B1cCwgaW5wdXRPcHRpb25zLCBwYXJhbXMpID0+IHtcbiAgICBjb25zdCByYWRpbyA9IGdldENoaWxkQnlDbGFzcyhwb3B1cCwgc3dhbENsYXNzZXMucmFkaW8pXG4gICAgaW5wdXRPcHRpb25zLmZvckVhY2goaW5wdXRPcHRpb24gPT4ge1xuICAgICAgY29uc3QgcmFkaW9WYWx1ZSA9IGlucHV0T3B0aW9uWzBdXG4gICAgICBjb25zdCByYWRpb0xhYmVsID0gaW5wdXRPcHRpb25bMV1cbiAgICAgIGNvbnN0IHJhZGlvSW5wdXQgPSBkb2N1bWVudC5jcmVhdGVFbGVtZW50KCdpbnB1dCcpXG4gICAgICBjb25zdCByYWRpb0xhYmVsRWxlbWVudCA9IGRvY3VtZW50LmNyZWF0ZUVsZW1lbnQoJ2xhYmVsJylcbiAgICAgIHJhZGlvSW5wdXQudHlwZSA9ICdyYWRpbydcbiAgICAgIHJhZGlvSW5wdXQubmFtZSA9IHN3YWxDbGFzc2VzLnJhZGlvXG4gICAgICByYWRpb0lucHV0LnZhbHVlID0gcmFkaW9WYWx1ZVxuICAgICAgaWYgKGlzU2VsZWN0ZWQocmFkaW9WYWx1ZSwgcGFyYW1zLmlucHV0VmFsdWUpKSB7XG4gICAgICAgIHJhZGlvSW5wdXQuY2hlY2tlZCA9IHRydWVcbiAgICAgIH1cbiAgICAgIGNvbnN0IGxhYmVsID0gZG9jdW1lbnQuY3JlYXRlRWxlbWVudCgnc3BhbicpXG4gICAgICBkb20uc2V0SW5uZXJIdG1sKGxhYmVsLCByYWRpb0xhYmVsKVxuICAgICAgbGFiZWwuY2xhc3NOYW1lID0gc3dhbENsYXNzZXMubGFiZWxcbiAgICAgIHJhZGlvTGFiZWxFbGVtZW50LmFwcGVuZENoaWxkKHJhZGlvSW5wdXQpXG4gICAgICByYWRpb0xhYmVsRWxlbWVudC5hcHBlbmRDaGlsZChsYWJlbClcbiAgICAgIHJhZGlvLmFwcGVuZENoaWxkKHJhZGlvTGFiZWxFbGVtZW50KVxuICAgIH0pXG4gICAgY29uc3QgcmFkaW9zID0gcmFkaW8ucXVlcnlTZWxlY3RvckFsbCgnaW5wdXQnKVxuICAgIGlmIChyYWRpb3MubGVuZ3RoKSB7XG4gICAgICByYWRpb3NbMF0uZm9jdXMoKVxuICAgIH1cbiAgfVxufVxuXG4vKipcbiAqIENvbnZlcnRzIGBpbnB1dE9wdGlvbnNgIGludG8gYW4gYXJyYXkgb2YgYFt2YWx1ZSwgbGFiZWxdYHNcbiAqIEBwYXJhbSBpbnB1dE9wdGlvbnNcbiAqL1xuY29uc3QgZm9ybWF0SW5wdXRPcHRpb25zID0gKGlucHV0T3B0aW9ucykgPT4ge1xuICBjb25zdCByZXN1bHQgPSBbXVxuICBpZiAodHlwZW9mIE1hcCAhPT0gJ3VuZGVmaW5lZCcgJiYgaW5wdXRPcHRpb25zIGluc3RhbmNlb2YgTWFwKSB7XG4gICAgaW5wdXRPcHRpb25zLmZvckVhY2goKHZhbHVlLCBrZXkpID0+IHtcbiAgICAgIGxldCB2YWx1ZUZvcm1hdHRlZCA9IHZhbHVlXG4gICAgICBpZiAodHlwZW9mIHZhbHVlRm9ybWF0dGVkID09PSAnb2JqZWN0JykgeyAvLyBjYXNlIG9mIDxvcHRncm91cD5cbiAgICAgICAgdmFsdWVGb3JtYXR0ZWQgPSBmb3JtYXRJbnB1dE9wdGlvbnModmFsdWVGb3JtYXR0ZWQpXG4gICAgICB9XG4gICAgICByZXN1bHQucHVzaChba2V5LCB2YWx1ZUZvcm1hdHRlZF0pXG4gICAgfSlcbiAgfSBlbHNlIHtcbiAgICBPYmplY3Qua2V5cyhpbnB1dE9wdGlvbnMpLmZvckVhY2goa2V5ID0+IHtcbiAgICAgIGxldCB2YWx1ZUZvcm1hdHRlZCA9IGlucHV0T3B0aW9uc1trZXldXG4gICAgICBpZiAodHlwZW9mIHZhbHVlRm9ybWF0dGVkID09PSAnb2JqZWN0JykgeyAvLyBjYXNlIG9mIDxvcHRncm91cD5cbiAgICAgICAgdmFsdWVGb3JtYXR0ZWQgPSBmb3JtYXRJbnB1dE9wdGlvbnModmFsdWVGb3JtYXR0ZWQpXG4gICAgICB9XG4gICAgICByZXN1bHQucHVzaChba2V5LCB2YWx1ZUZvcm1hdHRlZF0pXG4gICAgfSlcbiAgfVxuICByZXR1cm4gcmVzdWx0XG59XG5cbmNvbnN0IGlzU2VsZWN0ZWQgPSAob3B0aW9uVmFsdWUsIGlucHV0VmFsdWUpID0+IHtcbiAgcmV0dXJuIGlucHV0VmFsdWUgJiYgaW5wdXRWYWx1ZS50b1N0cmluZygpID09PSBvcHRpb25WYWx1ZS50b1N0cmluZygpXG59XG4iLCJpbXBvcnQgeyBzd2FsQ2xhc3NlcyB9IGZyb20gJy4uL2NsYXNzZXMuanMnXG5cbi8vIE1lYXN1cmUgc2Nyb2xsYmFyIHdpZHRoIGZvciBwYWRkaW5nIGJvZHkgZHVyaW5nIG1vZGFsIHNob3cvaGlkZVxuLy8gaHR0cHM6Ly9naXRodWIuY29tL3R3YnMvYm9vdHN0cmFwL2Jsb2IvbWFzdGVyL2pzL3NyYy9tb2RhbC5qc1xuZXhwb3J0IGNvbnN0IG1lYXN1cmVTY3JvbGxiYXIgPSAoKSA9PiB7XG4gIGNvbnN0IHNjcm9sbERpdiA9IGRvY3VtZW50LmNyZWF0ZUVsZW1lbnQoJ2RpdicpXG4gIHNjcm9sbERpdi5jbGFzc05hbWUgPSBzd2FsQ2xhc3Nlc1snc2Nyb2xsYmFyLW1lYXN1cmUnXVxuICBkb2N1bWVudC5ib2R5LmFwcGVuZENoaWxkKHNjcm9sbERpdilcbiAgY29uc3Qgc2Nyb2xsYmFyV2lkdGggPSBzY3JvbGxEaXYuZ2V0Qm91bmRpbmdDbGllbnRSZWN0KCkud2lkdGggLSBzY3JvbGxEaXYuY2xpZW50V2lkdGhcbiAgZG9jdW1lbnQuYm9keS5yZW1vdmVDaGlsZChzY3JvbGxEaXYpXG4gIHJldHVybiBzY3JvbGxiYXJXaWR0aFxufVxuIiwiaW1wb3J0IHsgc2V0SW5uZXJIdG1sIH0gZnJvbSAnLi9kb21VdGlscy5qcydcblxuZXhwb3J0IGNvbnN0IHBhcnNlSHRtbFRvQ29udGFpbmVyID0gKHBhcmFtLCB0YXJnZXQpID0+IHtcbiAgLy8gRE9NIGVsZW1lbnRcbiAgaWYgKHBhcmFtIGluc3RhbmNlb2YgSFRNTEVsZW1lbnQpIHtcbiAgICB0YXJnZXQuYXBwZW5kQ2hpbGQocGFyYW0pXG5cbiAgLy8gT2JqZWN0XG4gIH0gZWxzZSBpZiAodHlwZW9mIHBhcmFtID09PSAnb2JqZWN0Jykge1xuICAgIGhhbmRsZU9iamVjdChwYXJhbSwgdGFyZ2V0KVxuXG4gIC8vIFBsYWluIHN0cmluZ1xuICB9IGVsc2UgaWYgKHBhcmFtKSB7XG4gICAgc2V0SW5uZXJIdG1sKHRhcmdldCwgcGFyYW0pXG4gIH1cbn1cblxuY29uc3QgaGFuZGxlT2JqZWN0ID0gKHBhcmFtLCB0YXJnZXQpID0+IHtcbiAgLy8gSlF1ZXJ5IGVsZW1lbnQocylcbiAgaWYgKHBhcmFtLmpxdWVyeSkge1xuICAgIGhhbmRsZUpxdWVyeUVsZW0odGFyZ2V0LCBwYXJhbSlcblxuICAvLyBGb3Igb3RoZXIgb2JqZWN0cyB1c2UgdGhlaXIgc3RyaW5nIHJlcHJlc2VudGF0aW9uXG4gIH0gZWxzZSB7XG4gICAgc2V0SW5uZXJIdG1sKHRhcmdldCwgcGFyYW0udG9TdHJpbmcoKSlcbiAgfVxufVxuXG5jb25zdCBoYW5kbGVKcXVlcnlFbGVtID0gKHRhcmdldCwgZWxlbSkgPT4ge1xuICB0YXJnZXQudGV4dENvbnRlbnQgPSAnJ1xuICBpZiAoMCBpbiBlbGVtKSB7XG4gICAgZm9yIChsZXQgaSA9IDA7IGkgaW4gZWxlbTsgaSsrKSB7XG4gICAgICB0YXJnZXQuYXBwZW5kQ2hpbGQoZWxlbVtpXS5jbG9uZU5vZGUodHJ1ZSkpXG4gICAgfVxuICB9IGVsc2Uge1xuICAgIHRhcmdldC5hcHBlbmRDaGlsZChlbGVtLmNsb25lTm9kZSh0cnVlKSlcbiAgfVxufVxuIiwiaW1wb3J0IHsgZ2V0UG9wdXAgfSBmcm9tICcuLi9nZXR0ZXJzLmpzJ1xuaW1wb3J0IHsgcmVuZGVyQWN0aW9ucyB9IGZyb20gJy4vcmVuZGVyQWN0aW9ucy5qcydcbmltcG9ydCB7IHJlbmRlckNvbnRhaW5lciB9IGZyb20gJy4vcmVuZGVyQ29udGFpbmVyLmpzJ1xuaW1wb3J0IHsgcmVuZGVyQ29udGVudCB9IGZyb20gJy4vcmVuZGVyQ29udGVudC5qcydcbmltcG9ydCB7IHJlbmRlckZvb3RlciB9IGZyb20gJy4vcmVuZGVyRm9vdGVyLmpzJ1xuaW1wb3J0IHsgcmVuZGVyQ2xvc2VCdXR0b24gfSBmcm9tICcuL3JlbmRlckNsb3NlQnV0dG9uLmpzJ1xuaW1wb3J0IHsgcmVuZGVySWNvbiB9IGZyb20gJy4vcmVuZGVySWNvbi5qcydcbmltcG9ydCB7IHJlbmRlckltYWdlIH0gZnJvbSAnLi9yZW5kZXJJbWFnZS5qcydcbmltcG9ydCB7IHJlbmRlclByb2dyZXNzU3RlcHMgfSBmcm9tICcuL3JlbmRlclByb2dyZXNzU3RlcHMuanMnXG5pbXBvcnQgeyByZW5kZXJUaXRsZSB9IGZyb20gJy4vcmVuZGVyVGl0bGUuanMnXG5pbXBvcnQgeyByZW5kZXJQb3B1cCB9IGZyb20gJy4vcmVuZGVyUG9wdXAuanMnXG5cbmV4cG9ydCBjb25zdCByZW5kZXIgPSAoaW5zdGFuY2UsIHBhcmFtcykgPT4ge1xuICByZW5kZXJQb3B1cChpbnN0YW5jZSwgcGFyYW1zKVxuICByZW5kZXJDb250YWluZXIoaW5zdGFuY2UsIHBhcmFtcylcblxuICByZW5kZXJQcm9ncmVzc1N0ZXBzKGluc3RhbmNlLCBwYXJhbXMpXG4gIHJlbmRlckljb24oaW5zdGFuY2UsIHBhcmFtcylcbiAgcmVuZGVySW1hZ2UoaW5zdGFuY2UsIHBhcmFtcylcbiAgcmVuZGVyVGl0bGUoaW5zdGFuY2UsIHBhcmFtcylcbiAgcmVuZGVyQ2xvc2VCdXR0b24oaW5zdGFuY2UsIHBhcmFtcylcblxuICByZW5kZXJDb250ZW50KGluc3RhbmNlLCBwYXJhbXMpXG4gIHJlbmRlckFjdGlvbnMoaW5zdGFuY2UsIHBhcmFtcylcbiAgcmVuZGVyRm9vdGVyKGluc3RhbmNlLCBwYXJhbXMpXG5cbiAgaWYgKHR5cGVvZiBwYXJhbXMuZGlkUmVuZGVyID09PSAnZnVuY3Rpb24nKSB7XG4gICAgcGFyYW1zLmRpZFJlbmRlcihnZXRQb3B1cCgpKVxuICB9XG59XG4iLCJpbXBvcnQgeyBzd2FsQ2xhc3NlcyB9IGZyb20gJy4uLy4uL2NsYXNzZXMuanMnXG5pbXBvcnQgKiBhcyBkb20gZnJvbSAnLi4vLi4vZG9tL2luZGV4LmpzJ1xuaW1wb3J0IHsgY2FwaXRhbGl6ZUZpcnN0TGV0dGVyIH0gZnJvbSAnLi4vLi4vdXRpbHMuanMnXG5cbmV4cG9ydCBjb25zdCByZW5kZXJBY3Rpb25zID0gKGluc3RhbmNlLCBwYXJhbXMpID0+IHtcbiAgY29uc3QgYWN0aW9ucyA9IGRvbS5nZXRBY3Rpb25zKClcbiAgY29uc3QgbG9hZGVyID0gZG9tLmdldExvYWRlcigpXG5cbiAgLy8gQWN0aW9ucyAoYnV0dG9ucykgd3JhcHBlclxuICBpZiAoIXBhcmFtcy5zaG93Q29uZmlybUJ1dHRvbiAmJiAhcGFyYW1zLnNob3dEZW55QnV0dG9uICYmICFwYXJhbXMuc2hvd0NhbmNlbEJ1dHRvbikge1xuICAgIGRvbS5oaWRlKGFjdGlvbnMpXG4gIH0gZWxzZSB7XG4gICAgZG9tLnNob3coYWN0aW9ucylcbiAgfVxuXG4gIC8vIEN1c3RvbSBjbGFzc1xuICBkb20uYXBwbHlDdXN0b21DbGFzcyhhY3Rpb25zLCBwYXJhbXMsICdhY3Rpb25zJylcblxuICAvLyBSZW5kZXIgYWxsIHRoZSBidXR0b25zXG4gIHJlbmRlckJ1dHRvbnMoYWN0aW9ucywgbG9hZGVyLCBwYXJhbXMpXG5cbiAgLy8gTG9hZGVyXG4gIGRvbS5zZXRJbm5lckh0bWwobG9hZGVyLCBwYXJhbXMubG9hZGVySHRtbClcbiAgZG9tLmFwcGx5Q3VzdG9tQ2xhc3MobG9hZGVyLCBwYXJhbXMsICdsb2FkZXInKVxufVxuXG5mdW5jdGlvbiByZW5kZXJCdXR0b25zIChhY3Rpb25zLCBsb2FkZXIsIHBhcmFtcykge1xuICBjb25zdCBjb25maXJtQnV0dG9uID0gZG9tLmdldENvbmZpcm1CdXR0b24oKVxuICBjb25zdCBkZW55QnV0dG9uID0gZG9tLmdldERlbnlCdXR0b24oKVxuICBjb25zdCBjYW5jZWxCdXR0b24gPSBkb20uZ2V0Q2FuY2VsQnV0dG9uKClcblxuICAvLyBSZW5kZXIgYnV0dG9uc1xuICByZW5kZXJCdXR0b24oY29uZmlybUJ1dHRvbiwgJ2NvbmZpcm0nLCBwYXJhbXMpXG4gIHJlbmRlckJ1dHRvbihkZW55QnV0dG9uLCAnZGVueScsIHBhcmFtcylcbiAgcmVuZGVyQnV0dG9uKGNhbmNlbEJ1dHRvbiwgJ2NhbmNlbCcsIHBhcmFtcylcbiAgaGFuZGxlQnV0dG9uc1N0eWxpbmcoY29uZmlybUJ1dHRvbiwgZGVueUJ1dHRvbiwgY2FuY2VsQnV0dG9uLCBwYXJhbXMpXG5cbiAgaWYgKHBhcmFtcy5yZXZlcnNlQnV0dG9ucykge1xuICAgIGlmIChwYXJhbXMudG9hc3QpIHtcbiAgICAgIGFjdGlvbnMuaW5zZXJ0QmVmb3JlKGNhbmNlbEJ1dHRvbiwgY29uZmlybUJ1dHRvbilcbiAgICAgIGFjdGlvbnMuaW5zZXJ0QmVmb3JlKGRlbnlCdXR0b24sIGNvbmZpcm1CdXR0b24pXG4gICAgfSBlbHNlIHtcbiAgICAgIGFjdGlvbnMuaW5zZXJ0QmVmb3JlKGNhbmNlbEJ1dHRvbiwgbG9hZGVyKVxuICAgICAgYWN0aW9ucy5pbnNlcnRCZWZvcmUoZGVueUJ1dHRvbiwgbG9hZGVyKVxuICAgICAgYWN0aW9ucy5pbnNlcnRCZWZvcmUoY29uZmlybUJ1dHRvbiwgbG9hZGVyKVxuICAgIH1cbiAgfVxufVxuXG5mdW5jdGlvbiBoYW5kbGVCdXR0b25zU3R5bGluZyAoY29uZmlybUJ1dHRvbiwgZGVueUJ1dHRvbiwgY2FuY2VsQnV0dG9uLCBwYXJhbXMpIHtcbiAgaWYgKCFwYXJhbXMuYnV0dG9uc1N0eWxpbmcpIHtcbiAgICByZXR1cm4gZG9tLnJlbW92ZUNsYXNzKFtjb25maXJtQnV0dG9uLCBkZW55QnV0dG9uLCBjYW5jZWxCdXR0b25dLCBzd2FsQ2xhc3Nlcy5zdHlsZWQpXG4gIH1cblxuICBkb20uYWRkQ2xhc3MoW2NvbmZpcm1CdXR0b24sIGRlbnlCdXR0b24sIGNhbmNlbEJ1dHRvbl0sIHN3YWxDbGFzc2VzLnN0eWxlZClcblxuICAvLyBCdXR0b25zIGJhY2tncm91bmQgY29sb3JzXG4gIGlmIChwYXJhbXMuY29uZmlybUJ1dHRvbkNvbG9yKSB7XG4gICAgY29uZmlybUJ1dHRvbi5zdHlsZS5iYWNrZ3JvdW5kQ29sb3IgPSBwYXJhbXMuY29uZmlybUJ1dHRvbkNvbG9yXG4gICAgZG9tLmFkZENsYXNzKGNvbmZpcm1CdXR0b24sIHN3YWxDbGFzc2VzWydkZWZhdWx0LW91dGxpbmUnXSlcbiAgfVxuICBpZiAocGFyYW1zLmRlbnlCdXR0b25Db2xvcikge1xuICAgIGRlbnlCdXR0b24uc3R5bGUuYmFja2dyb3VuZENvbG9yID0gcGFyYW1zLmRlbnlCdXR0b25Db2xvclxuICAgIGRvbS5hZGRDbGFzcyhkZW55QnV0dG9uLCBzd2FsQ2xhc3Nlc1snZGVmYXVsdC1vdXRsaW5lJ10pXG4gIH1cbiAgaWYgKHBhcmFtcy5jYW5jZWxCdXR0b25Db2xvcikge1xuICAgIGNhbmNlbEJ1dHRvbi5zdHlsZS5iYWNrZ3JvdW5kQ29sb3IgPSBwYXJhbXMuY2FuY2VsQnV0dG9uQ29sb3JcbiAgICBkb20uYWRkQ2xhc3MoY2FuY2VsQnV0dG9uLCBzd2FsQ2xhc3Nlc1snZGVmYXVsdC1vdXRsaW5lJ10pXG4gIH1cbn1cblxuZnVuY3Rpb24gcmVuZGVyQnV0dG9uIChidXR0b24sIGJ1dHRvblR5cGUsIHBhcmFtcykge1xuICBkb20udG9nZ2xlKGJ1dHRvbiwgcGFyYW1zW2BzaG93JHtjYXBpdGFsaXplRmlyc3RMZXR0ZXIoYnV0dG9uVHlwZSl9QnV0dG9uYF0sICdpbmxpbmUtYmxvY2snKVxuICBkb20uc2V0SW5uZXJIdG1sKGJ1dHRvbiwgcGFyYW1zW2Ake2J1dHRvblR5cGV9QnV0dG9uVGV4dGBdKSAvLyBTZXQgY2FwdGlvbiB0ZXh0XG4gIGJ1dHRvbi5zZXRBdHRyaWJ1dGUoJ2FyaWEtbGFiZWwnLCBwYXJhbXNbYCR7YnV0dG9uVHlwZX1CdXR0b25BcmlhTGFiZWxgXSkgLy8gQVJJQSBsYWJlbFxuXG4gIC8vIEFkZCBidXR0b25zIGN1c3RvbSBjbGFzc2VzXG4gIGJ1dHRvbi5jbGFzc05hbWUgPSBzd2FsQ2xhc3Nlc1tidXR0b25UeXBlXVxuICBkb20uYXBwbHlDdXN0b21DbGFzcyhidXR0b24sIHBhcmFtcywgYCR7YnV0dG9uVHlwZX1CdXR0b25gKVxuICBkb20uYWRkQ2xhc3MoYnV0dG9uLCBwYXJhbXNbYCR7YnV0dG9uVHlwZX1CdXR0b25DbGFzc2BdKVxufVxuIiwiaW1wb3J0ICogYXMgZG9tIGZyb20gJy4uLy4uL2RvbS9pbmRleC5qcydcblxuZXhwb3J0IGNvbnN0IHJlbmRlckNsb3NlQnV0dG9uID0gKGluc3RhbmNlLCBwYXJhbXMpID0+IHtcbiAgY29uc3QgY2xvc2VCdXR0b24gPSBkb20uZ2V0Q2xvc2VCdXR0b24oKVxuXG4gIGRvbS5zZXRJbm5lckh0bWwoY2xvc2VCdXR0b24sIHBhcmFtcy5jbG9zZUJ1dHRvbkh0bWwpXG5cbiAgLy8gQ3VzdG9tIGNsYXNzXG4gIGRvbS5hcHBseUN1c3RvbUNsYXNzKGNsb3NlQnV0dG9uLCBwYXJhbXMsICdjbG9zZUJ1dHRvbicpXG5cbiAgZG9tLnRvZ2dsZShjbG9zZUJ1dHRvbiwgcGFyYW1zLnNob3dDbG9zZUJ1dHRvbilcbiAgY2xvc2VCdXR0b24uc2V0QXR0cmlidXRlKCdhcmlhLWxhYmVsJywgcGFyYW1zLmNsb3NlQnV0dG9uQXJpYUxhYmVsKVxufVxuIiwiaW1wb3J0IHsgc3dhbENsYXNzZXMgfSBmcm9tICcuLi8uLi9jbGFzc2VzLmpzJ1xuaW1wb3J0IHsgd2FybiB9IGZyb20gJy4uLy4uL3V0aWxzLmpzJ1xuaW1wb3J0ICogYXMgZG9tIGZyb20gJy4uLy4uL2RvbS9pbmRleC5qcydcblxuZnVuY3Rpb24gaGFuZGxlQmFja2Ryb3BQYXJhbSAoY29udGFpbmVyLCBiYWNrZHJvcCkge1xuICBpZiAodHlwZW9mIGJhY2tkcm9wID09PSAnc3RyaW5nJykge1xuICAgIGNvbnRhaW5lci5zdHlsZS5iYWNrZ3JvdW5kID0gYmFja2Ryb3BcbiAgfSBlbHNlIGlmICghYmFja2Ryb3ApIHtcbiAgICBkb20uYWRkQ2xhc3MoW2RvY3VtZW50LmRvY3VtZW50RWxlbWVudCwgZG9jdW1lbnQuYm9keV0sIHN3YWxDbGFzc2VzWyduby1iYWNrZHJvcCddKVxuICB9XG59XG5cbmZ1bmN0aW9uIGhhbmRsZVBvc2l0aW9uUGFyYW0gKGNvbnRhaW5lciwgcG9zaXRpb24pIHtcbiAgaWYgKHBvc2l0aW9uIGluIHN3YWxDbGFzc2VzKSB7XG4gICAgZG9tLmFkZENsYXNzKGNvbnRhaW5lciwgc3dhbENsYXNzZXNbcG9zaXRpb25dKVxuICB9IGVsc2Uge1xuICAgIHdhcm4oJ1RoZSBcInBvc2l0aW9uXCIgcGFyYW1ldGVyIGlzIG5vdCB2YWxpZCwgZGVmYXVsdGluZyB0byBcImNlbnRlclwiJylcbiAgICBkb20uYWRkQ2xhc3MoY29udGFpbmVyLCBzd2FsQ2xhc3Nlcy5jZW50ZXIpXG4gIH1cbn1cblxuZnVuY3Rpb24gaGFuZGxlR3Jvd1BhcmFtIChjb250YWluZXIsIGdyb3cpIHtcbiAgaWYgKGdyb3cgJiYgdHlwZW9mIGdyb3cgPT09ICdzdHJpbmcnKSB7XG4gICAgY29uc3QgZ3Jvd0NsYXNzID0gYGdyb3ctJHtncm93fWBcbiAgICBpZiAoZ3Jvd0NsYXNzIGluIHN3YWxDbGFzc2VzKSB7XG4gICAgICBkb20uYWRkQ2xhc3MoY29udGFpbmVyLCBzd2FsQ2xhc3Nlc1tncm93Q2xhc3NdKVxuICAgIH1cbiAgfVxufVxuXG5leHBvcnQgY29uc3QgcmVuZGVyQ29udGFpbmVyID0gKGluc3RhbmNlLCBwYXJhbXMpID0+IHtcbiAgY29uc3QgY29udGFpbmVyID0gZG9tLmdldENvbnRhaW5lcigpXG5cbiAgaWYgKCFjb250YWluZXIpIHtcbiAgICByZXR1cm5cbiAgfVxuXG4gIGhhbmRsZUJhY2tkcm9wUGFyYW0oY29udGFpbmVyLCBwYXJhbXMuYmFja2Ryb3ApXG5cbiAgaGFuZGxlUG9zaXRpb25QYXJhbShjb250YWluZXIsIHBhcmFtcy5wb3NpdGlvbilcbiAgaGFuZGxlR3Jvd1BhcmFtKGNvbnRhaW5lciwgcGFyYW1zLmdyb3cpXG5cbiAgLy8gQ3VzdG9tIGNsYXNzXG4gIGRvbS5hcHBseUN1c3RvbUNsYXNzKGNvbnRhaW5lciwgcGFyYW1zLCAnY29udGFpbmVyJylcbn1cbiIsImltcG9ydCAqIGFzIGRvbSBmcm9tICcuLi8uLi9kb20vaW5kZXguanMnXG5pbXBvcnQgeyByZW5kZXJJbnB1dCB9IGZyb20gJy4vcmVuZGVySW5wdXQuanMnXG5cbmV4cG9ydCBjb25zdCByZW5kZXJDb250ZW50ID0gKGluc3RhbmNlLCBwYXJhbXMpID0+IHtcbiAgY29uc3QgaHRtbENvbnRhaW5lciA9IGRvbS5nZXRIdG1sQ29udGFpbmVyKClcblxuICBkb20uYXBwbHlDdXN0b21DbGFzcyhodG1sQ29udGFpbmVyLCBwYXJhbXMsICdodG1sQ29udGFpbmVyJylcblxuICAvLyBDb250ZW50IGFzIEhUTUxcbiAgaWYgKHBhcmFtcy5odG1sKSB7XG4gICAgZG9tLnBhcnNlSHRtbFRvQ29udGFpbmVyKHBhcmFtcy5odG1sLCBodG1sQ29udGFpbmVyKVxuICAgIGRvbS5zaG93KGh0bWxDb250YWluZXIsICdibG9jaycpXG5cbiAgLy8gQ29udGVudCBhcyBwbGFpbiB0ZXh0XG4gIH0gZWxzZSBpZiAocGFyYW1zLnRleHQpIHtcbiAgICBodG1sQ29udGFpbmVyLnRleHRDb250ZW50ID0gcGFyYW1zLnRleHRcbiAgICBkb20uc2hvdyhodG1sQ29udGFpbmVyLCAnYmxvY2snKVxuXG4gIC8vIE5vIGNvbnRlbnRcbiAgfSBlbHNlIHtcbiAgICBkb20uaGlkZShodG1sQ29udGFpbmVyKVxuICB9XG5cbiAgcmVuZGVySW5wdXQoaW5zdGFuY2UsIHBhcmFtcylcbn1cbiIsImltcG9ydCAqIGFzIGRvbSBmcm9tICcuLi8uLi9kb20vaW5kZXguanMnXG5cbmV4cG9ydCBjb25zdCByZW5kZXJGb290ZXIgPSAoaW5zdGFuY2UsIHBhcmFtcykgPT4ge1xuICBjb25zdCBmb290ZXIgPSBkb20uZ2V0Rm9vdGVyKClcblxuICBkb20udG9nZ2xlKGZvb3RlciwgcGFyYW1zLmZvb3RlcilcblxuICBpZiAocGFyYW1zLmZvb3Rlcikge1xuICAgIGRvbS5wYXJzZUh0bWxUb0NvbnRhaW5lcihwYXJhbXMuZm9vdGVyLCBmb290ZXIpXG4gIH1cblxuICAvLyBDdXN0b20gY2xhc3NcbiAgZG9tLmFwcGx5Q3VzdG9tQ2xhc3MoZm9vdGVyLCBwYXJhbXMsICdmb290ZXInKVxufVxuIiwiaW1wb3J0IHsgc3dhbENsYXNzZXMsIGljb25UeXBlcyB9IGZyb20gJy4uLy4uL2NsYXNzZXMuanMnXG5pbXBvcnQgeyBlcnJvciB9IGZyb20gJy4uLy4uL3V0aWxzLmpzJ1xuaW1wb3J0ICogYXMgZG9tIGZyb20gJy4uLy4uL2RvbS9pbmRleC5qcydcbmltcG9ydCBwcml2YXRlUHJvcHMgZnJvbSAnLi4vLi4vLi4vcHJpdmF0ZVByb3BzLmpzJ1xuXG5leHBvcnQgY29uc3QgcmVuZGVySWNvbiA9IChpbnN0YW5jZSwgcGFyYW1zKSA9PiB7XG4gIGNvbnN0IGlubmVyUGFyYW1zID0gcHJpdmF0ZVByb3BzLmlubmVyUGFyYW1zLmdldChpbnN0YW5jZSlcbiAgY29uc3QgaWNvbiA9IGRvbS5nZXRJY29uKClcblxuICAvLyBpZiB0aGUgZ2l2ZW4gaWNvbiBhbHJlYWR5IHJlbmRlcmVkLCBhcHBseSB0aGUgc3R5bGluZyB3aXRob3V0IHJlLXJlbmRlcmluZyB0aGUgaWNvblxuICBpZiAoaW5uZXJQYXJhbXMgJiYgcGFyYW1zLmljb24gPT09IGlubmVyUGFyYW1zLmljb24pIHtcbiAgICAvLyBDdXN0b20gb3IgZGVmYXVsdCBjb250ZW50XG4gICAgc2V0Q29udGVudChpY29uLCBwYXJhbXMpXG5cbiAgICBhcHBseVN0eWxlcyhpY29uLCBwYXJhbXMpXG4gICAgcmV0dXJuXG4gIH1cblxuICBpZiAoIXBhcmFtcy5pY29uICYmICFwYXJhbXMuaWNvbkh0bWwpIHtcbiAgICByZXR1cm4gZG9tLmhpZGUoaWNvbilcbiAgfVxuXG4gIGlmIChwYXJhbXMuaWNvbiAmJiBPYmplY3Qua2V5cyhpY29uVHlwZXMpLmluZGV4T2YocGFyYW1zLmljb24pID09PSAtMSkge1xuICAgIGVycm9yKGBVbmtub3duIGljb24hIEV4cGVjdGVkIFwic3VjY2Vzc1wiLCBcImVycm9yXCIsIFwid2FybmluZ1wiLCBcImluZm9cIiBvciBcInF1ZXN0aW9uXCIsIGdvdCBcIiR7cGFyYW1zLmljb259XCJgKVxuICAgIHJldHVybiBkb20uaGlkZShpY29uKVxuICB9XG5cbiAgZG9tLnNob3coaWNvbilcblxuICAvLyBDdXN0b20gb3IgZGVmYXVsdCBjb250ZW50XG4gIHNldENvbnRlbnQoaWNvbiwgcGFyYW1zKVxuXG4gIGFwcGx5U3R5bGVzKGljb24sIHBhcmFtcylcblxuICAvLyBBbmltYXRlIGljb25cbiAgZG9tLmFkZENsYXNzKGljb24sIHBhcmFtcy5zaG93Q2xhc3MuaWNvbilcbn1cblxuY29uc3QgYXBwbHlTdHlsZXMgPSAoaWNvbiwgcGFyYW1zKSA9PiB7XG4gIGZvciAoY29uc3QgaWNvblR5cGUgaW4gaWNvblR5cGVzKSB7XG4gICAgaWYgKHBhcmFtcy5pY29uICE9PSBpY29uVHlwZSkge1xuICAgICAgZG9tLnJlbW92ZUNsYXNzKGljb24sIGljb25UeXBlc1tpY29uVHlwZV0pXG4gICAgfVxuICB9XG4gIGRvbS5hZGRDbGFzcyhpY29uLCBpY29uVHlwZXNbcGFyYW1zLmljb25dKVxuXG4gIC8vIEljb24gY29sb3JcbiAgc2V0Q29sb3IoaWNvbiwgcGFyYW1zKVxuXG4gIC8vIFN1Y2Nlc3MgaWNvbiBiYWNrZ3JvdW5kIGNvbG9yXG4gIGFkanVzdFN1Y2Nlc3NJY29uQmFja2dvdW5kQ29sb3IoKVxuXG4gIC8vIEN1c3RvbSBjbGFzc1xuICBkb20uYXBwbHlDdXN0b21DbGFzcyhpY29uLCBwYXJhbXMsICdpY29uJylcbn1cblxuLy8gQWRqdXN0IHN1Y2Nlc3MgaWNvbiBiYWNrZ3JvdW5kIGNvbG9yIHRvIG1hdGNoIHRoZSBwb3B1cCBiYWNrZ3JvdW5kIGNvbG9yXG5jb25zdCBhZGp1c3RTdWNjZXNzSWNvbkJhY2tnb3VuZENvbG9yID0gKCkgPT4ge1xuICBjb25zdCBwb3B1cCA9IGRvbS5nZXRQb3B1cCgpXG4gIGNvbnN0IHBvcHVwQmFja2dyb3VuZENvbG9yID0gd2luZG93LmdldENvbXB1dGVkU3R5bGUocG9wdXApLmdldFByb3BlcnR5VmFsdWUoJ2JhY2tncm91bmQtY29sb3InKVxuICBjb25zdCBzdWNjZXNzSWNvblBhcnRzID0gcG9wdXAucXVlcnlTZWxlY3RvckFsbCgnW2NsYXNzXj1zd2FsMi1zdWNjZXNzLWNpcmN1bGFyLWxpbmVdLCAuc3dhbDItc3VjY2Vzcy1maXgnKVxuICBmb3IgKGxldCBpID0gMDsgaSA8IHN1Y2Nlc3NJY29uUGFydHMubGVuZ3RoOyBpKyspIHtcbiAgICBzdWNjZXNzSWNvblBhcnRzW2ldLnN0eWxlLmJhY2tncm91bmRDb2xvciA9IHBvcHVwQmFja2dyb3VuZENvbG9yXG4gIH1cbn1cblxuY29uc3Qgc2V0Q29udGVudCA9IChpY29uLCBwYXJhbXMpID0+IHtcbiAgaWNvbi50ZXh0Q29udGVudCA9ICcnXG5cbiAgaWYgKHBhcmFtcy5pY29uSHRtbCkge1xuICAgIGRvbS5zZXRJbm5lckh0bWwoaWNvbiwgaWNvbkNvbnRlbnQocGFyYW1zLmljb25IdG1sKSlcbiAgfSBlbHNlIGlmIChwYXJhbXMuaWNvbiA9PT0gJ3N1Y2Nlc3MnKSB7XG4gICAgZG9tLnNldElubmVySHRtbChpY29uLCBgXG4gICAgICA8ZGl2IGNsYXNzPVwic3dhbDItc3VjY2Vzcy1jaXJjdWxhci1saW5lLWxlZnRcIj48L2Rpdj5cbiAgICAgIDxzcGFuIGNsYXNzPVwic3dhbDItc3VjY2Vzcy1saW5lLXRpcFwiPjwvc3Bhbj4gPHNwYW4gY2xhc3M9XCJzd2FsMi1zdWNjZXNzLWxpbmUtbG9uZ1wiPjwvc3Bhbj5cbiAgICAgIDxkaXYgY2xhc3M9XCJzd2FsMi1zdWNjZXNzLXJpbmdcIj48L2Rpdj4gPGRpdiBjbGFzcz1cInN3YWwyLXN1Y2Nlc3MtZml4XCI+PC9kaXY+XG4gICAgICA8ZGl2IGNsYXNzPVwic3dhbDItc3VjY2Vzcy1jaXJjdWxhci1saW5lLXJpZ2h0XCI+PC9kaXY+XG4gICAgYClcbiAgfSBlbHNlIGlmIChwYXJhbXMuaWNvbiA9PT0gJ2Vycm9yJykge1xuICAgIGRvbS5zZXRJbm5lckh0bWwoaWNvbiwgYFxuICAgICAgPHNwYW4gY2xhc3M9XCJzd2FsMi14LW1hcmtcIj5cbiAgICAgICAgPHNwYW4gY2xhc3M9XCJzd2FsMi14LW1hcmstbGluZS1sZWZ0XCI+PC9zcGFuPlxuICAgICAgICA8c3BhbiBjbGFzcz1cInN3YWwyLXgtbWFyay1saW5lLXJpZ2h0XCI+PC9zcGFuPlxuICAgICAgPC9zcGFuPlxuICAgIGApXG4gIH0gZWxzZSB7XG4gICAgY29uc3QgZGVmYXVsdEljb25IdG1sID0ge1xuICAgICAgcXVlc3Rpb246ICc/JyxcbiAgICAgIHdhcm5pbmc6ICchJyxcbiAgICAgIGluZm86ICdpJ1xuICAgIH1cbiAgICBkb20uc2V0SW5uZXJIdG1sKGljb24sIGljb25Db250ZW50KGRlZmF1bHRJY29uSHRtbFtwYXJhbXMuaWNvbl0pKVxuICB9XG59XG5cbmNvbnN0IHNldENvbG9yID0gKGljb24sIHBhcmFtcykgPT4ge1xuICBpZiAoIXBhcmFtcy5pY29uQ29sb3IpIHtcbiAgICByZXR1cm5cbiAgfVxuICBpY29uLnN0eWxlLmNvbG9yID0gcGFyYW1zLmljb25Db2xvclxuICBpY29uLnN0eWxlLmJvcmRlckNvbG9yID0gcGFyYW1zLmljb25Db2xvclxuICBmb3IgKGNvbnN0IHNlbCBvZiBbJy5zd2FsMi1zdWNjZXNzLWxpbmUtdGlwJywgJy5zd2FsMi1zdWNjZXNzLWxpbmUtbG9uZycsICcuc3dhbDIteC1tYXJrLWxpbmUtbGVmdCcsICcuc3dhbDIteC1tYXJrLWxpbmUtcmlnaHQnXSkge1xuICAgIGRvbS5zZXRTdHlsZShpY29uLCBzZWwsICdiYWNrZ3JvdW5kQ29sb3InLCBwYXJhbXMuaWNvbkNvbG9yKVxuICB9XG4gIGRvbS5zZXRTdHlsZShpY29uLCAnLnN3YWwyLXN1Y2Nlc3MtcmluZycsICdib3JkZXJDb2xvcicsIHBhcmFtcy5pY29uQ29sb3IpXG59XG5cbmNvbnN0IGljb25Db250ZW50ID0gKGNvbnRlbnQpID0+IGA8ZGl2IGNsYXNzPVwiJHtzd2FsQ2xhc3Nlc1snaWNvbi1jb250ZW50J119XCI+JHtjb250ZW50fTwvZGl2PmBcbiIsImltcG9ydCB7IHN3YWxDbGFzc2VzIH0gZnJvbSAnLi4vLi4vY2xhc3Nlcy5qcydcbmltcG9ydCAqIGFzIGRvbSBmcm9tICcuLi8uLi9kb20vaW5kZXguanMnXG5cbmV4cG9ydCBjb25zdCByZW5kZXJJbWFnZSA9IChpbnN0YW5jZSwgcGFyYW1zKSA9PiB7XG4gIGNvbnN0IGltYWdlID0gZG9tLmdldEltYWdlKClcblxuICBpZiAoIXBhcmFtcy5pbWFnZVVybCkge1xuICAgIHJldHVybiBkb20uaGlkZShpbWFnZSlcbiAgfVxuXG4gIGRvbS5zaG93KGltYWdlLCAnJylcblxuICAvLyBTcmMsIGFsdFxuICBpbWFnZS5zZXRBdHRyaWJ1dGUoJ3NyYycsIHBhcmFtcy5pbWFnZVVybClcbiAgaW1hZ2Uuc2V0QXR0cmlidXRlKCdhbHQnLCBwYXJhbXMuaW1hZ2VBbHQpXG5cbiAgLy8gV2lkdGgsIGhlaWdodFxuICBkb20uYXBwbHlOdW1lcmljYWxTdHlsZShpbWFnZSwgJ3dpZHRoJywgcGFyYW1zLmltYWdlV2lkdGgpXG4gIGRvbS5hcHBseU51bWVyaWNhbFN0eWxlKGltYWdlLCAnaGVpZ2h0JywgcGFyYW1zLmltYWdlSGVpZ2h0KVxuXG4gIC8vIENsYXNzXG4gIGltYWdlLmNsYXNzTmFtZSA9IHN3YWxDbGFzc2VzLmltYWdlXG4gIGRvbS5hcHBseUN1c3RvbUNsYXNzKGltYWdlLCBwYXJhbXMsICdpbWFnZScpXG59XG4iLCJpbXBvcnQgeyBzd2FsQ2xhc3NlcyB9IGZyb20gJy4uLy4uL2NsYXNzZXMuanMnXG5pbXBvcnQgeyB3YXJuLCBlcnJvciwgaXNQcm9taXNlIH0gZnJvbSAnLi4vLi4vdXRpbHMuanMnXG5pbXBvcnQgKiBhcyBkb20gZnJvbSAnLi4vLi4vZG9tL2luZGV4LmpzJ1xuaW1wb3J0IHByaXZhdGVQcm9wcyBmcm9tICcuLi8uLi8uLi9wcml2YXRlUHJvcHMuanMnXG5cbmNvbnN0IGlucHV0VHlwZXMgPSBbJ2lucHV0JywgJ2ZpbGUnLCAncmFuZ2UnLCAnc2VsZWN0JywgJ3JhZGlvJywgJ2NoZWNrYm94JywgJ3RleHRhcmVhJ11cblxuZXhwb3J0IGNvbnN0IHJlbmRlcklucHV0ID0gKGluc3RhbmNlLCBwYXJhbXMpID0+IHtcbiAgY29uc3QgcG9wdXAgPSBkb20uZ2V0UG9wdXAoKVxuICBjb25zdCBpbm5lclBhcmFtcyA9IHByaXZhdGVQcm9wcy5pbm5lclBhcmFtcy5nZXQoaW5zdGFuY2UpXG4gIGNvbnN0IHJlcmVuZGVyID0gIWlubmVyUGFyYW1zIHx8IHBhcmFtcy5pbnB1dCAhPT0gaW5uZXJQYXJhbXMuaW5wdXRcblxuICBpbnB1dFR5cGVzLmZvckVhY2goKGlucHV0VHlwZSkgPT4ge1xuICAgIGNvbnN0IGlucHV0Q2xhc3MgPSBzd2FsQ2xhc3Nlc1tpbnB1dFR5cGVdXG4gICAgY29uc3QgaW5wdXRDb250YWluZXIgPSBkb20uZ2V0Q2hpbGRCeUNsYXNzKHBvcHVwLCBpbnB1dENsYXNzKVxuXG4gICAgLy8gc2V0IGF0dHJpYnV0ZXNcbiAgICBzZXRBdHRyaWJ1dGVzKGlucHV0VHlwZSwgcGFyYW1zLmlucHV0QXR0cmlidXRlcylcblxuICAgIC8vIHNldCBjbGFzc1xuICAgIGlucHV0Q29udGFpbmVyLmNsYXNzTmFtZSA9IGlucHV0Q2xhc3NcblxuICAgIGlmIChyZXJlbmRlcikge1xuICAgICAgZG9tLmhpZGUoaW5wdXRDb250YWluZXIpXG4gICAgfVxuICB9KVxuXG4gIGlmIChwYXJhbXMuaW5wdXQpIHtcbiAgICBpZiAocmVyZW5kZXIpIHtcbiAgICAgIHNob3dJbnB1dChwYXJhbXMpXG4gICAgfVxuICAgIC8vIHNldCBjdXN0b20gY2xhc3NcbiAgICBzZXRDdXN0b21DbGFzcyhwYXJhbXMpXG4gIH1cbn1cblxuY29uc3Qgc2hvd0lucHV0ID0gKHBhcmFtcykgPT4ge1xuICBpZiAoIXJlbmRlcklucHV0VHlwZVtwYXJhbXMuaW5wdXRdKSB7XG4gICAgcmV0dXJuIGVycm9yKGBVbmV4cGVjdGVkIHR5cGUgb2YgaW5wdXQhIEV4cGVjdGVkIFwidGV4dFwiLCBcImVtYWlsXCIsIFwicGFzc3dvcmRcIiwgXCJudW1iZXJcIiwgXCJ0ZWxcIiwgXCJzZWxlY3RcIiwgXCJyYWRpb1wiLCBcImNoZWNrYm94XCIsIFwidGV4dGFyZWFcIiwgXCJmaWxlXCIgb3IgXCJ1cmxcIiwgZ290IFwiJHtwYXJhbXMuaW5wdXR9XCJgKVxuICB9XG5cbiAgY29uc3QgaW5wdXRDb250YWluZXIgPSBnZXRJbnB1dENvbnRhaW5lcihwYXJhbXMuaW5wdXQpXG4gIGNvbnN0IGlucHV0ID0gcmVuZGVySW5wdXRUeXBlW3BhcmFtcy5pbnB1dF0oaW5wdXRDb250YWluZXIsIHBhcmFtcylcbiAgZG9tLnNob3coaW5wdXQpXG5cbiAgLy8gaW5wdXQgYXV0b2ZvY3VzXG4gIHNldFRpbWVvdXQoKCkgPT4ge1xuICAgIGRvbS5mb2N1c0lucHV0KGlucHV0KVxuICB9KVxufVxuXG5jb25zdCByZW1vdmVBdHRyaWJ1dGVzID0gKGlucHV0KSA9PiB7XG4gIGZvciAobGV0IGkgPSAwOyBpIDwgaW5wdXQuYXR0cmlidXRlcy5sZW5ndGg7IGkrKykge1xuICAgIGNvbnN0IGF0dHJOYW1lID0gaW5wdXQuYXR0cmlidXRlc1tpXS5uYW1lXG4gICAgaWYgKCFbJ3R5cGUnLCAndmFsdWUnLCAnc3R5bGUnXS5pbmNsdWRlcyhhdHRyTmFtZSkpIHtcbiAgICAgIGlucHV0LnJlbW92ZUF0dHJpYnV0ZShhdHRyTmFtZSlcbiAgICB9XG4gIH1cbn1cblxuY29uc3Qgc2V0QXR0cmlidXRlcyA9IChpbnB1dFR5cGUsIGlucHV0QXR0cmlidXRlcykgPT4ge1xuICBjb25zdCBpbnB1dCA9IGRvbS5nZXRJbnB1dChkb20uZ2V0UG9wdXAoKSwgaW5wdXRUeXBlKVxuICBpZiAoIWlucHV0KSB7XG4gICAgcmV0dXJuXG4gIH1cblxuICByZW1vdmVBdHRyaWJ1dGVzKGlucHV0KVxuXG4gIGZvciAoY29uc3QgYXR0ciBpbiBpbnB1dEF0dHJpYnV0ZXMpIHtcbiAgICBpbnB1dC5zZXRBdHRyaWJ1dGUoYXR0ciwgaW5wdXRBdHRyaWJ1dGVzW2F0dHJdKVxuICB9XG59XG5cbmNvbnN0IHNldEN1c3RvbUNsYXNzID0gKHBhcmFtcykgPT4ge1xuICBjb25zdCBpbnB1dENvbnRhaW5lciA9IGdldElucHV0Q29udGFpbmVyKHBhcmFtcy5pbnB1dClcbiAgaWYgKHBhcmFtcy5jdXN0b21DbGFzcykge1xuICAgIGRvbS5hZGRDbGFzcyhpbnB1dENvbnRhaW5lciwgcGFyYW1zLmN1c3RvbUNsYXNzLmlucHV0KVxuICB9XG59XG5cbmNvbnN0IHNldElucHV0UGxhY2Vob2xkZXIgPSAoaW5wdXQsIHBhcmFtcykgPT4ge1xuICBpZiAoIWlucHV0LnBsYWNlaG9sZGVyIHx8IHBhcmFtcy5pbnB1dFBsYWNlaG9sZGVyKSB7XG4gICAgaW5wdXQucGxhY2Vob2xkZXIgPSBwYXJhbXMuaW5wdXRQbGFjZWhvbGRlclxuICB9XG59XG5cbmNvbnN0IHNldElucHV0TGFiZWwgPSAoaW5wdXQsIHByZXBlbmRUbywgcGFyYW1zKSA9PiB7XG4gIGlmIChwYXJhbXMuaW5wdXRMYWJlbCkge1xuICAgIGlucHV0LmlkID0gc3dhbENsYXNzZXMuaW5wdXRcbiAgICBjb25zdCBsYWJlbCA9IGRvY3VtZW50LmNyZWF0ZUVsZW1lbnQoJ2xhYmVsJylcbiAgICBjb25zdCBsYWJlbENsYXNzID0gc3dhbENsYXNzZXNbJ2lucHV0LWxhYmVsJ11cbiAgICBsYWJlbC5zZXRBdHRyaWJ1dGUoJ2ZvcicsIGlucHV0LmlkKVxuICAgIGxhYmVsLmNsYXNzTmFtZSA9IGxhYmVsQ2xhc3NcbiAgICBkb20uYWRkQ2xhc3MobGFiZWwsIHBhcmFtcy5jdXN0b21DbGFzcy5pbnB1dExhYmVsKVxuICAgIGxhYmVsLmlubmVyVGV4dCA9IHBhcmFtcy5pbnB1dExhYmVsXG4gICAgcHJlcGVuZFRvLmluc2VydEFkamFjZW50RWxlbWVudCgnYmVmb3JlYmVnaW4nLCBsYWJlbClcbiAgfVxufVxuXG5jb25zdCBnZXRJbnB1dENvbnRhaW5lciA9IChpbnB1dFR5cGUpID0+IHtcbiAgY29uc3QgaW5wdXRDbGFzcyA9IHN3YWxDbGFzc2VzW2lucHV0VHlwZV0gPyBzd2FsQ2xhc3Nlc1tpbnB1dFR5cGVdIDogc3dhbENsYXNzZXMuaW5wdXRcbiAgcmV0dXJuIGRvbS5nZXRDaGlsZEJ5Q2xhc3MoZG9tLmdldFBvcHVwKCksIGlucHV0Q2xhc3MpXG59XG5cbmNvbnN0IHJlbmRlcklucHV0VHlwZSA9IHt9XG5cbnJlbmRlcklucHV0VHlwZS50ZXh0ID1cbnJlbmRlcklucHV0VHlwZS5lbWFpbCA9XG5yZW5kZXJJbnB1dFR5cGUucGFzc3dvcmQgPVxucmVuZGVySW5wdXRUeXBlLm51bWJlciA9XG5yZW5kZXJJbnB1dFR5cGUudGVsID1cbnJlbmRlcklucHV0VHlwZS51cmwgPSAoaW5wdXQsIHBhcmFtcykgPT4ge1xuICBpZiAodHlwZW9mIHBhcmFtcy5pbnB1dFZhbHVlID09PSAnc3RyaW5nJyB8fCB0eXBlb2YgcGFyYW1zLmlucHV0VmFsdWUgPT09ICdudW1iZXInKSB7XG4gICAgaW5wdXQudmFsdWUgPSBwYXJhbXMuaW5wdXRWYWx1ZVxuICB9IGVsc2UgaWYgKCFpc1Byb21pc2UocGFyYW1zLmlucHV0VmFsdWUpKSB7XG4gICAgd2FybihgVW5leHBlY3RlZCB0eXBlIG9mIGlucHV0VmFsdWUhIEV4cGVjdGVkIFwic3RyaW5nXCIsIFwibnVtYmVyXCIgb3IgXCJQcm9taXNlXCIsIGdvdCBcIiR7dHlwZW9mIHBhcmFtcy5pbnB1dFZhbHVlfVwiYClcbiAgfVxuICBzZXRJbnB1dExhYmVsKGlucHV0LCBpbnB1dCwgcGFyYW1zKVxuICBzZXRJbnB1dFBsYWNlaG9sZGVyKGlucHV0LCBwYXJhbXMpXG4gIGlucHV0LnR5cGUgPSBwYXJhbXMuaW5wdXRcbiAgcmV0dXJuIGlucHV0XG59XG5cbnJlbmRlcklucHV0VHlwZS5maWxlID0gKGlucHV0LCBwYXJhbXMpID0+IHtcbiAgc2V0SW5wdXRMYWJlbChpbnB1dCwgaW5wdXQsIHBhcmFtcylcbiAgc2V0SW5wdXRQbGFjZWhvbGRlcihpbnB1dCwgcGFyYW1zKVxuICByZXR1cm4gaW5wdXRcbn1cblxucmVuZGVySW5wdXRUeXBlLnJhbmdlID0gKHJhbmdlLCBwYXJhbXMpID0+IHtcbiAgY29uc3QgcmFuZ2VJbnB1dCA9IHJhbmdlLnF1ZXJ5U2VsZWN0b3IoJ2lucHV0JylcbiAgY29uc3QgcmFuZ2VPdXRwdXQgPSByYW5nZS5xdWVyeVNlbGVjdG9yKCdvdXRwdXQnKVxuICByYW5nZUlucHV0LnZhbHVlID0gcGFyYW1zLmlucHV0VmFsdWVcbiAgcmFuZ2VJbnB1dC50eXBlID0gcGFyYW1zLmlucHV0XG4gIHJhbmdlT3V0cHV0LnZhbHVlID0gcGFyYW1zLmlucHV0VmFsdWVcbiAgc2V0SW5wdXRMYWJlbChyYW5nZUlucHV0LCByYW5nZSwgcGFyYW1zKVxuICByZXR1cm4gcmFuZ2Vcbn1cblxucmVuZGVySW5wdXRUeXBlLnNlbGVjdCA9IChzZWxlY3QsIHBhcmFtcykgPT4ge1xuICBzZWxlY3QudGV4dENvbnRlbnQgPSAnJ1xuICBpZiAocGFyYW1zLmlucHV0UGxhY2Vob2xkZXIpIHtcbiAgICBjb25zdCBwbGFjZWhvbGRlciA9IGRvY3VtZW50LmNyZWF0ZUVsZW1lbnQoJ29wdGlvbicpXG4gICAgZG9tLnNldElubmVySHRtbChwbGFjZWhvbGRlciwgcGFyYW1zLmlucHV0UGxhY2Vob2xkZXIpXG4gICAgcGxhY2Vob2xkZXIudmFsdWUgPSAnJ1xuICAgIHBsYWNlaG9sZGVyLmRpc2FibGVkID0gdHJ1ZVxuICAgIHBsYWNlaG9sZGVyLnNlbGVjdGVkID0gdHJ1ZVxuICAgIHNlbGVjdC5hcHBlbmRDaGlsZChwbGFjZWhvbGRlcilcbiAgfVxuICBzZXRJbnB1dExhYmVsKHNlbGVjdCwgc2VsZWN0LCBwYXJhbXMpXG4gIHJldHVybiBzZWxlY3Rcbn1cblxucmVuZGVySW5wdXRUeXBlLnJhZGlvID0gKHJhZGlvKSA9PiB7XG4gIHJhZGlvLnRleHRDb250ZW50ID0gJydcbiAgcmV0dXJuIHJhZGlvXG59XG5cbnJlbmRlcklucHV0VHlwZS5jaGVja2JveCA9IChjaGVja2JveENvbnRhaW5lciwgcGFyYW1zKSA9PiB7XG4gIGNvbnN0IGNoZWNrYm94ID0gZG9tLmdldElucHV0KGRvbS5nZXRQb3B1cCgpLCAnY2hlY2tib3gnKVxuICBjaGVja2JveC52YWx1ZSA9IDFcbiAgY2hlY2tib3guaWQgPSBzd2FsQ2xhc3Nlcy5jaGVja2JveFxuICBjaGVja2JveC5jaGVja2VkID0gQm9vbGVhbihwYXJhbXMuaW5wdXRWYWx1ZSlcbiAgY29uc3QgbGFiZWwgPSBjaGVja2JveENvbnRhaW5lci5xdWVyeVNlbGVjdG9yKCdzcGFuJylcbiAgZG9tLnNldElubmVySHRtbChsYWJlbCwgcGFyYW1zLmlucHV0UGxhY2Vob2xkZXIpXG4gIHJldHVybiBjaGVja2JveENvbnRhaW5lclxufVxuXG5yZW5kZXJJbnB1dFR5cGUudGV4dGFyZWEgPSAodGV4dGFyZWEsIHBhcmFtcykgPT4ge1xuICB0ZXh0YXJlYS52YWx1ZSA9IHBhcmFtcy5pbnB1dFZhbHVlXG4gIHNldElucHV0UGxhY2Vob2xkZXIodGV4dGFyZWEsIHBhcmFtcylcbiAgc2V0SW5wdXRMYWJlbCh0ZXh0YXJlYSwgdGV4dGFyZWEsIHBhcmFtcylcblxuICBjb25zdCBnZXRNYXJnaW4gPSAoZWwpID0+IHBhcnNlSW50KHdpbmRvdy5nZXRDb21wdXRlZFN0eWxlKGVsKS5tYXJnaW5MZWZ0KSArIHBhcnNlSW50KHdpbmRvdy5nZXRDb21wdXRlZFN0eWxlKGVsKS5tYXJnaW5SaWdodClcblxuICBzZXRUaW1lb3V0KCgpID0+IHsgLy8gIzIyOTFcbiAgICBpZiAoJ011dGF0aW9uT2JzZXJ2ZXInIGluIHdpbmRvdykgeyAvLyAjMTY5OVxuICAgICAgY29uc3QgaW5pdGlhbFBvcHVwV2lkdGggPSBwYXJzZUludCh3aW5kb3cuZ2V0Q29tcHV0ZWRTdHlsZShkb20uZ2V0UG9wdXAoKSkud2lkdGgpXG4gICAgICBjb25zdCB0ZXh0YXJlYVJlc2l6ZUhhbmRsZXIgPSAoKSA9PiB7XG4gICAgICAgIGNvbnN0IHRleHRhcmVhV2lkdGggPSB0ZXh0YXJlYS5vZmZzZXRXaWR0aCArIGdldE1hcmdpbih0ZXh0YXJlYSlcbiAgICAgICAgaWYgKHRleHRhcmVhV2lkdGggPiBpbml0aWFsUG9wdXBXaWR0aCkge1xuICAgICAgICAgIGRvbS5nZXRQb3B1cCgpLnN0eWxlLndpZHRoID0gYCR7dGV4dGFyZWFXaWR0aH1weGBcbiAgICAgICAgfSBlbHNlIHtcbiAgICAgICAgICBkb20uZ2V0UG9wdXAoKS5zdHlsZS53aWR0aCA9IG51bGxcbiAgICAgICAgfVxuICAgICAgfVxuICAgICAgbmV3IE11dGF0aW9uT2JzZXJ2ZXIodGV4dGFyZWFSZXNpemVIYW5kbGVyKS5vYnNlcnZlKHRleHRhcmVhLCB7XG4gICAgICAgIGF0dHJpYnV0ZXM6IHRydWUsIGF0dHJpYnV0ZUZpbHRlcjogWydzdHlsZSddXG4gICAgICB9KVxuICAgIH1cbiAgfSlcblxuICByZXR1cm4gdGV4dGFyZWFcbn1cbiIsImltcG9ydCB7IHN3YWxDbGFzc2VzIH0gZnJvbSAnLi4vLi4vY2xhc3Nlcy5qcydcbmltcG9ydCAqIGFzIGRvbSBmcm9tICcuLi8uLi9kb20vaW5kZXguanMnXG5cbmV4cG9ydCBjb25zdCByZW5kZXJQb3B1cCA9IChpbnN0YW5jZSwgcGFyYW1zKSA9PiB7XG4gIGNvbnN0IGNvbnRhaW5lciA9IGRvbS5nZXRDb250YWluZXIoKVxuICBjb25zdCBwb3B1cCA9IGRvbS5nZXRQb3B1cCgpXG5cbiAgLy8gV2lkdGhcbiAgaWYgKHBhcmFtcy50b2FzdCkgeyAvLyAjMjE3MFxuICAgIGRvbS5hcHBseU51bWVyaWNhbFN0eWxlKGNvbnRhaW5lciwgJ3dpZHRoJywgcGFyYW1zLndpZHRoKVxuICAgIHBvcHVwLnN0eWxlLndpZHRoID0gJzEwMCUnXG4gICAgcG9wdXAuaW5zZXJ0QmVmb3JlKGRvbS5nZXRMb2FkZXIoKSwgZG9tLmdldEljb24oKSlcbiAgfSBlbHNlIHtcbiAgICBkb20uYXBwbHlOdW1lcmljYWxTdHlsZShwb3B1cCwgJ3dpZHRoJywgcGFyYW1zLndpZHRoKVxuICB9XG5cbiAgLy8gUGFkZGluZ1xuICBkb20uYXBwbHlOdW1lcmljYWxTdHlsZShwb3B1cCwgJ3BhZGRpbmcnLCBwYXJhbXMucGFkZGluZylcblxuICAvLyBCYWNrZ3JvdW5kXG4gIGlmIChwYXJhbXMuYmFja2dyb3VuZCkge1xuICAgIHBvcHVwLnN0eWxlLmJhY2tncm91bmQgPSBwYXJhbXMuYmFja2dyb3VuZFxuICB9XG5cbiAgZG9tLmhpZGUoZG9tLmdldFZhbGlkYXRpb25NZXNzYWdlKCkpXG5cbiAgLy8gQ2xhc3Nlc1xuICBhZGRDbGFzc2VzKHBvcHVwLCBwYXJhbXMpXG59XG5cbmNvbnN0IGFkZENsYXNzZXMgPSAocG9wdXAsIHBhcmFtcykgPT4ge1xuICAvLyBEZWZhdWx0IENsYXNzICsgc2hvd0NsYXNzIHdoZW4gdXBkYXRpbmcgU3dhbC51cGRhdGUoe30pXG4gIHBvcHVwLmNsYXNzTmFtZSA9IGAke3N3YWxDbGFzc2VzLnBvcHVwfSAke2RvbS5pc1Zpc2libGUocG9wdXApID8gcGFyYW1zLnNob3dDbGFzcy5wb3B1cCA6ICcnfWBcblxuICBpZiAocGFyYW1zLnRvYXN0KSB7XG4gICAgZG9tLmFkZENsYXNzKFtkb2N1bWVudC5kb2N1bWVudEVsZW1lbnQsIGRvY3VtZW50LmJvZHldLCBzd2FsQ2xhc3Nlc1sndG9hc3Qtc2hvd24nXSlcbiAgICBkb20uYWRkQ2xhc3MocG9wdXAsIHN3YWxDbGFzc2VzLnRvYXN0KVxuICB9IGVsc2Uge1xuICAgIGRvbS5hZGRDbGFzcyhwb3B1cCwgc3dhbENsYXNzZXMubW9kYWwpXG4gIH1cblxuICAvLyBDdXN0b20gY2xhc3NcbiAgZG9tLmFwcGx5Q3VzdG9tQ2xhc3MocG9wdXAsIHBhcmFtcywgJ3BvcHVwJylcbiAgaWYgKHR5cGVvZiBwYXJhbXMuY3VzdG9tQ2xhc3MgPT09ICdzdHJpbmcnKSB7XG4gICAgZG9tLmFkZENsYXNzKHBvcHVwLCBwYXJhbXMuY3VzdG9tQ2xhc3MpXG4gIH1cblxuICAvLyBJY29uIGNsYXNzICgjMTg0MilcbiAgaWYgKHBhcmFtcy5pY29uKSB7XG4gICAgZG9tLmFkZENsYXNzKHBvcHVwLCBzd2FsQ2xhc3Nlc1tgaWNvbi0ke3BhcmFtcy5pY29ufWBdKVxuICB9XG59XG4iLCJpbXBvcnQgeyBzd2FsQ2xhc3NlcyB9IGZyb20gJy4uLy4uL2NsYXNzZXMuanMnXG5pbXBvcnQgeyB3YXJuIH0gZnJvbSAnLi4vLi4vdXRpbHMuanMnXG5pbXBvcnQgKiBhcyBkb20gZnJvbSAnLi4vLi4vZG9tL2luZGV4LmpzJ1xuXG5jb25zdCBjcmVhdGVTdGVwRWxlbWVudCA9IChzdGVwKSA9PiB7XG4gIGNvbnN0IHN0ZXBFbCA9IGRvY3VtZW50LmNyZWF0ZUVsZW1lbnQoJ2xpJylcbiAgZG9tLmFkZENsYXNzKHN0ZXBFbCwgc3dhbENsYXNzZXNbJ3Byb2dyZXNzLXN0ZXAnXSlcbiAgZG9tLnNldElubmVySHRtbChzdGVwRWwsIHN0ZXApXG4gIHJldHVybiBzdGVwRWxcbn1cblxuY29uc3QgY3JlYXRlTGluZUVsZW1lbnQgPSAocGFyYW1zKSA9PiB7XG4gIGNvbnN0IGxpbmVFbCA9IGRvY3VtZW50LmNyZWF0ZUVsZW1lbnQoJ2xpJylcbiAgZG9tLmFkZENsYXNzKGxpbmVFbCwgc3dhbENsYXNzZXNbJ3Byb2dyZXNzLXN0ZXAtbGluZSddKVxuICBpZiAocGFyYW1zLnByb2dyZXNzU3RlcHNEaXN0YW5jZSkge1xuICAgIGxpbmVFbC5zdHlsZS53aWR0aCA9IHBhcmFtcy5wcm9ncmVzc1N0ZXBzRGlzdGFuY2VcbiAgfVxuICByZXR1cm4gbGluZUVsXG59XG5cbmV4cG9ydCBjb25zdCByZW5kZXJQcm9ncmVzc1N0ZXBzID0gKGluc3RhbmNlLCBwYXJhbXMpID0+IHtcbiAgY29uc3QgcHJvZ3Jlc3NTdGVwc0NvbnRhaW5lciA9IGRvbS5nZXRQcm9ncmVzc1N0ZXBzKClcbiAgaWYgKCFwYXJhbXMucHJvZ3Jlc3NTdGVwcyB8fCBwYXJhbXMucHJvZ3Jlc3NTdGVwcy5sZW5ndGggPT09IDApIHtcbiAgICByZXR1cm4gZG9tLmhpZGUocHJvZ3Jlc3NTdGVwc0NvbnRhaW5lcilcbiAgfVxuXG4gIGRvbS5zaG93KHByb2dyZXNzU3RlcHNDb250YWluZXIpXG4gIHByb2dyZXNzU3RlcHNDb250YWluZXIudGV4dENvbnRlbnQgPSAnJ1xuICBpZiAocGFyYW1zLmN1cnJlbnRQcm9ncmVzc1N0ZXAgPj0gcGFyYW1zLnByb2dyZXNzU3RlcHMubGVuZ3RoKSB7XG4gICAgd2FybihcbiAgICAgICdJbnZhbGlkIGN1cnJlbnRQcm9ncmVzc1N0ZXAgcGFyYW1ldGVyLCBpdCBzaG91bGQgYmUgbGVzcyB0aGFuIHByb2dyZXNzU3RlcHMubGVuZ3RoICcgK1xuICAgICAgJyhjdXJyZW50UHJvZ3Jlc3NTdGVwIGxpa2UgSlMgYXJyYXlzIHN0YXJ0cyBmcm9tIDApJ1xuICAgIClcbiAgfVxuXG4gIHBhcmFtcy5wcm9ncmVzc1N0ZXBzLmZvckVhY2goKHN0ZXAsIGluZGV4KSA9PiB7XG4gICAgY29uc3Qgc3RlcEVsID0gY3JlYXRlU3RlcEVsZW1lbnQoc3RlcClcbiAgICBwcm9ncmVzc1N0ZXBzQ29udGFpbmVyLmFwcGVuZENoaWxkKHN0ZXBFbClcbiAgICBpZiAoaW5kZXggPT09IHBhcmFtcy5jdXJyZW50UHJvZ3Jlc3NTdGVwKSB7XG4gICAgICBkb20uYWRkQ2xhc3Moc3RlcEVsLCBzd2FsQ2xhc3Nlc1snYWN0aXZlLXByb2dyZXNzLXN0ZXAnXSlcbiAgICB9XG5cbiAgICBpZiAoaW5kZXggIT09IHBhcmFtcy5wcm9ncmVzc1N0ZXBzLmxlbmd0aCAtIDEpIHtcbiAgICAgIGNvbnN0IGxpbmVFbCA9IGNyZWF0ZUxpbmVFbGVtZW50KHBhcmFtcylcbiAgICAgIHByb2dyZXNzU3RlcHNDb250YWluZXIuYXBwZW5kQ2hpbGQobGluZUVsKVxuICAgIH1cbiAgfSlcbn1cbiIsImltcG9ydCAqIGFzIGRvbSBmcm9tICcuLi8uLi9kb20vaW5kZXguanMnXG5cbmV4cG9ydCBjb25zdCByZW5kZXJUaXRsZSA9IChpbnN0YW5jZSwgcGFyYW1zKSA9PiB7XG4gIGNvbnN0IHRpdGxlID0gZG9tLmdldFRpdGxlKClcblxuICBkb20udG9nZ2xlKHRpdGxlLCBwYXJhbXMudGl0bGUgfHwgcGFyYW1zLnRpdGxlVGV4dCwgJ2Jsb2NrJylcblxuICBpZiAocGFyYW1zLnRpdGxlKSB7XG4gICAgZG9tLnBhcnNlSHRtbFRvQ29udGFpbmVyKHBhcmFtcy50aXRsZSwgdGl0bGUpXG4gIH1cblxuICBpZiAocGFyYW1zLnRpdGxlVGV4dCkge1xuICAgIHRpdGxlLmlubmVyVGV4dCA9IHBhcmFtcy50aXRsZVRleHRcbiAgfVxuXG4gIC8vIEN1c3RvbSBjbGFzc1xuICBkb20uYXBwbHlDdXN0b21DbGFzcyh0aXRsZSwgcGFyYW1zLCAndGl0bGUnKVxufVxuIiwiaW1wb3J0IGRlZmF1bHRQYXJhbXMgZnJvbSAnLi9wYXJhbXMuanMnXG5pbXBvcnQgeyB0b0FycmF5LCBjYXBpdGFsaXplRmlyc3RMZXR0ZXIsIHdhcm4gfSBmcm9tICcuL3V0aWxzLmpzJ1xuXG5jb25zdCBzd2FsU3RyaW5nUGFyYW1zID0gWydzd2FsLXRpdGxlJywgJ3N3YWwtaHRtbCcsICdzd2FsLWZvb3RlciddXG5cbmV4cG9ydCBjb25zdCBnZXRUZW1wbGF0ZVBhcmFtcyA9IChwYXJhbXMpID0+IHtcbiAgY29uc3QgdGVtcGxhdGUgPSB0eXBlb2YgcGFyYW1zLnRlbXBsYXRlID09PSAnc3RyaW5nJyA/IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IocGFyYW1zLnRlbXBsYXRlKSA6IHBhcmFtcy50ZW1wbGF0ZVxuICBpZiAoIXRlbXBsYXRlKSB7XG4gICAgcmV0dXJuIHt9XG4gIH1cbiAgY29uc3QgdGVtcGxhdGVDb250ZW50ID0gdGVtcGxhdGUuY29udGVudFxuXG4gIHNob3dXYXJuaW5nc0ZvckVsZW1lbnRzKHRlbXBsYXRlQ29udGVudClcblxuICBjb25zdCByZXN1bHQgPSBPYmplY3QuYXNzaWduKFxuICAgIGdldFN3YWxQYXJhbXModGVtcGxhdGVDb250ZW50KSxcbiAgICBnZXRTd2FsQnV0dG9ucyh0ZW1wbGF0ZUNvbnRlbnQpLFxuICAgIGdldFN3YWxJbWFnZSh0ZW1wbGF0ZUNvbnRlbnQpLFxuICAgIGdldFN3YWxJY29uKHRlbXBsYXRlQ29udGVudCksXG4gICAgZ2V0U3dhbElucHV0KHRlbXBsYXRlQ29udGVudCksXG4gICAgZ2V0U3dhbFN0cmluZ1BhcmFtcyh0ZW1wbGF0ZUNvbnRlbnQsIHN3YWxTdHJpbmdQYXJhbXMpLFxuICApXG4gIHJldHVybiByZXN1bHRcbn1cblxuY29uc3QgZ2V0U3dhbFBhcmFtcyA9ICh0ZW1wbGF0ZUNvbnRlbnQpID0+IHtcbiAgY29uc3QgcmVzdWx0ID0ge31cbiAgdG9BcnJheSh0ZW1wbGF0ZUNvbnRlbnQucXVlcnlTZWxlY3RvckFsbCgnc3dhbC1wYXJhbScpKS5mb3JFYWNoKChwYXJhbSkgPT4ge1xuICAgIHNob3dXYXJuaW5nc0ZvckF0dHJpYnV0ZXMocGFyYW0sIFsnbmFtZScsICd2YWx1ZSddKVxuICAgIGNvbnN0IHBhcmFtTmFtZSA9IHBhcmFtLmdldEF0dHJpYnV0ZSgnbmFtZScpXG4gICAgbGV0IHZhbHVlID0gcGFyYW0uZ2V0QXR0cmlidXRlKCd2YWx1ZScpXG4gICAgaWYgKHR5cGVvZiBkZWZhdWx0UGFyYW1zW3BhcmFtTmFtZV0gPT09ICdib29sZWFuJyAmJiB2YWx1ZSA9PT0gJ2ZhbHNlJykge1xuICAgICAgdmFsdWUgPSBmYWxzZVxuICAgIH1cbiAgICBpZiAodHlwZW9mIGRlZmF1bHRQYXJhbXNbcGFyYW1OYW1lXSA9PT0gJ29iamVjdCcpIHtcbiAgICAgIHZhbHVlID0gSlNPTi5wYXJzZSh2YWx1ZSlcbiAgICB9XG4gICAgcmVzdWx0W3BhcmFtTmFtZV0gPSB2YWx1ZVxuICB9KVxuICByZXR1cm4gcmVzdWx0XG59XG5cbmNvbnN0IGdldFN3YWxCdXR0b25zID0gKHRlbXBsYXRlQ29udGVudCkgPT4ge1xuICBjb25zdCByZXN1bHQgPSB7fVxuICB0b0FycmF5KHRlbXBsYXRlQ29udGVudC5xdWVyeVNlbGVjdG9yQWxsKCdzd2FsLWJ1dHRvbicpKS5mb3JFYWNoKChidXR0b24pID0+IHtcbiAgICBzaG93V2FybmluZ3NGb3JBdHRyaWJ1dGVzKGJ1dHRvbiwgWyd0eXBlJywgJ2NvbG9yJywgJ2FyaWEtbGFiZWwnXSlcbiAgICBjb25zdCB0eXBlID0gYnV0dG9uLmdldEF0dHJpYnV0ZSgndHlwZScpXG4gICAgcmVzdWx0W2Ake3R5cGV9QnV0dG9uVGV4dGBdID0gYnV0dG9uLmlubmVySFRNTFxuICAgIHJlc3VsdFtgc2hvdyR7Y2FwaXRhbGl6ZUZpcnN0TGV0dGVyKHR5cGUpfUJ1dHRvbmBdID0gdHJ1ZVxuICAgIGlmIChidXR0b24uaGFzQXR0cmlidXRlKCdjb2xvcicpKSB7XG4gICAgICByZXN1bHRbYCR7dHlwZX1CdXR0b25Db2xvcmBdID0gYnV0dG9uLmdldEF0dHJpYnV0ZSgnY29sb3InKVxuICAgIH1cbiAgICBpZiAoYnV0dG9uLmhhc0F0dHJpYnV0ZSgnYXJpYS1sYWJlbCcpKSB7XG4gICAgICByZXN1bHRbYCR7dHlwZX1CdXR0b25BcmlhTGFiZWxgXSA9IGJ1dHRvbi5nZXRBdHRyaWJ1dGUoJ2FyaWEtbGFiZWwnKVxuICAgIH1cbiAgfSlcbiAgcmV0dXJuIHJlc3VsdFxufVxuXG5jb25zdCBnZXRTd2FsSW1hZ2UgPSAodGVtcGxhdGVDb250ZW50KSA9PiB7XG4gIGNvbnN0IHJlc3VsdCA9IHt9XG4gIGNvbnN0IGltYWdlID0gdGVtcGxhdGVDb250ZW50LnF1ZXJ5U2VsZWN0b3IoJ3N3YWwtaW1hZ2UnKVxuICBpZiAoaW1hZ2UpIHtcbiAgICBzaG93V2FybmluZ3NGb3JBdHRyaWJ1dGVzKGltYWdlLCBbJ3NyYycsICd3aWR0aCcsICdoZWlnaHQnLCAnYWx0J10pXG4gICAgaWYgKGltYWdlLmhhc0F0dHJpYnV0ZSgnc3JjJykpIHtcbiAgICAgIHJlc3VsdC5pbWFnZVVybCA9IGltYWdlLmdldEF0dHJpYnV0ZSgnc3JjJylcbiAgICB9XG4gICAgaWYgKGltYWdlLmhhc0F0dHJpYnV0ZSgnd2lkdGgnKSkge1xuICAgICAgcmVzdWx0LmltYWdlV2lkdGggPSBpbWFnZS5nZXRBdHRyaWJ1dGUoJ3dpZHRoJylcbiAgICB9XG4gICAgaWYgKGltYWdlLmhhc0F0dHJpYnV0ZSgnaGVpZ2h0JykpIHtcbiAgICAgIHJlc3VsdC5pbWFnZUhlaWdodCA9IGltYWdlLmdldEF0dHJpYnV0ZSgnaGVpZ2h0JylcbiAgICB9XG4gICAgaWYgKGltYWdlLmhhc0F0dHJpYnV0ZSgnYWx0JykpIHtcbiAgICAgIHJlc3VsdC5pbWFnZUFsdCA9IGltYWdlLmdldEF0dHJpYnV0ZSgnYWx0JylcbiAgICB9XG4gIH1cbiAgcmV0dXJuIHJlc3VsdFxufVxuXG5jb25zdCBnZXRTd2FsSWNvbiA9ICh0ZW1wbGF0ZUNvbnRlbnQpID0+IHtcbiAgY29uc3QgcmVzdWx0ID0ge31cbiAgY29uc3QgaWNvbiA9IHRlbXBsYXRlQ29udGVudC5xdWVyeVNlbGVjdG9yKCdzd2FsLWljb24nKVxuICBpZiAoaWNvbikge1xuICAgIHNob3dXYXJuaW5nc0ZvckF0dHJpYnV0ZXMoaWNvbiwgWyd0eXBlJywgJ2NvbG9yJ10pXG4gICAgaWYgKGljb24uaGFzQXR0cmlidXRlKCd0eXBlJykpIHtcbiAgICAgIHJlc3VsdC5pY29uID0gaWNvbi5nZXRBdHRyaWJ1dGUoJ3R5cGUnKVxuICAgIH1cbiAgICBpZiAoaWNvbi5oYXNBdHRyaWJ1dGUoJ2NvbG9yJykpIHtcbiAgICAgIHJlc3VsdC5pY29uQ29sb3IgPSBpY29uLmdldEF0dHJpYnV0ZSgnY29sb3InKVxuICAgIH1cbiAgICByZXN1bHQuaWNvbkh0bWwgPSBpY29uLmlubmVySFRNTFxuICB9XG4gIHJldHVybiByZXN1bHRcbn1cblxuY29uc3QgZ2V0U3dhbElucHV0ID0gKHRlbXBsYXRlQ29udGVudCkgPT4ge1xuICBjb25zdCByZXN1bHQgPSB7fVxuICBjb25zdCBpbnB1dCA9IHRlbXBsYXRlQ29udGVudC5xdWVyeVNlbGVjdG9yKCdzd2FsLWlucHV0JylcbiAgaWYgKGlucHV0KSB7XG4gICAgc2hvd1dhcm5pbmdzRm9yQXR0cmlidXRlcyhpbnB1dCwgWyd0eXBlJywgJ2xhYmVsJywgJ3BsYWNlaG9sZGVyJywgJ3ZhbHVlJ10pXG4gICAgcmVzdWx0LmlucHV0ID0gaW5wdXQuZ2V0QXR0cmlidXRlKCd0eXBlJykgfHwgJ3RleHQnXG4gICAgaWYgKGlucHV0Lmhhc0F0dHJpYnV0ZSgnbGFiZWwnKSkge1xuICAgICAgcmVzdWx0LmlucHV0TGFiZWwgPSBpbnB1dC5nZXRBdHRyaWJ1dGUoJ2xhYmVsJylcbiAgICB9XG4gICAgaWYgKGlucHV0Lmhhc0F0dHJpYnV0ZSgncGxhY2Vob2xkZXInKSkge1xuICAgICAgcmVzdWx0LmlucHV0UGxhY2Vob2xkZXIgPSBpbnB1dC5nZXRBdHRyaWJ1dGUoJ3BsYWNlaG9sZGVyJylcbiAgICB9XG4gICAgaWYgKGlucHV0Lmhhc0F0dHJpYnV0ZSgndmFsdWUnKSkge1xuICAgICAgcmVzdWx0LmlucHV0VmFsdWUgPSBpbnB1dC5nZXRBdHRyaWJ1dGUoJ3ZhbHVlJylcbiAgICB9XG4gIH1cbiAgY29uc3QgaW5wdXRPcHRpb25zID0gdGVtcGxhdGVDb250ZW50LnF1ZXJ5U2VsZWN0b3JBbGwoJ3N3YWwtaW5wdXQtb3B0aW9uJylcbiAgaWYgKGlucHV0T3B0aW9ucy5sZW5ndGgpIHtcbiAgICByZXN1bHQuaW5wdXRPcHRpb25zID0ge31cbiAgICB0b0FycmF5KGlucHV0T3B0aW9ucykuZm9yRWFjaCgob3B0aW9uKSA9PiB7XG4gICAgICBzaG93V2FybmluZ3NGb3JBdHRyaWJ1dGVzKG9wdGlvbiwgWyd2YWx1ZSddKVxuICAgICAgY29uc3Qgb3B0aW9uVmFsdWUgPSBvcHRpb24uZ2V0QXR0cmlidXRlKCd2YWx1ZScpXG4gICAgICBjb25zdCBvcHRpb25OYW1lID0gb3B0aW9uLmlubmVySFRNTFxuICAgICAgcmVzdWx0LmlucHV0T3B0aW9uc1tvcHRpb25WYWx1ZV0gPSBvcHRpb25OYW1lXG4gICAgfSlcbiAgfVxuICByZXR1cm4gcmVzdWx0XG59XG5cbmNvbnN0IGdldFN3YWxTdHJpbmdQYXJhbXMgPSAodGVtcGxhdGVDb250ZW50LCBwYXJhbU5hbWVzKSA9PiB7XG4gIGNvbnN0IHJlc3VsdCA9IHt9XG4gIGZvciAoY29uc3QgaSBpbiBwYXJhbU5hbWVzKSB7XG4gICAgY29uc3QgcGFyYW1OYW1lID0gcGFyYW1OYW1lc1tpXVxuICAgIGNvbnN0IHRhZyA9IHRlbXBsYXRlQ29udGVudC5xdWVyeVNlbGVjdG9yKHBhcmFtTmFtZSlcbiAgICBpZiAodGFnKSB7XG4gICAgICBzaG93V2FybmluZ3NGb3JBdHRyaWJ1dGVzKHRhZywgW10pXG4gICAgICByZXN1bHRbcGFyYW1OYW1lLnJlcGxhY2UoL15zd2FsLS8sICcnKV0gPSB0YWcuaW5uZXJIVE1MLnRyaW0oKVxuICAgIH1cbiAgfVxuICByZXR1cm4gcmVzdWx0XG59XG5cbmNvbnN0IHNob3dXYXJuaW5nc0ZvckVsZW1lbnRzID0gKHRlbXBsYXRlKSA9PiB7XG4gIGNvbnN0IGFsbG93ZWRFbGVtZW50cyA9IHN3YWxTdHJpbmdQYXJhbXMuY29uY2F0KFtcbiAgICAnc3dhbC1wYXJhbScsXG4gICAgJ3N3YWwtYnV0dG9uJyxcbiAgICAnc3dhbC1pbWFnZScsXG4gICAgJ3N3YWwtaWNvbicsXG4gICAgJ3N3YWwtaW5wdXQnLFxuICAgICdzd2FsLWlucHV0LW9wdGlvbicsXG4gIF0pXG4gIHRvQXJyYXkodGVtcGxhdGUuY2hpbGRyZW4pLmZvckVhY2goKGVsKSA9PiB7XG4gICAgY29uc3QgdGFnTmFtZSA9IGVsLnRhZ05hbWUudG9Mb3dlckNhc2UoKVxuICAgIGlmIChhbGxvd2VkRWxlbWVudHMuaW5kZXhPZih0YWdOYW1lKSA9PT0gLTEpIHtcbiAgICAgIHdhcm4oYFVucmVjb2duaXplZCBlbGVtZW50IDwke3RhZ05hbWV9PmApXG4gICAgfVxuICB9KVxufVxuXG5jb25zdCBzaG93V2FybmluZ3NGb3JBdHRyaWJ1dGVzID0gKGVsLCBhbGxvd2VkQXR0cmlidXRlcykgPT4ge1xuICB0b0FycmF5KGVsLmF0dHJpYnV0ZXMpLmZvckVhY2goKGF0dHJpYnV0ZSkgPT4ge1xuICAgIGlmIChhbGxvd2VkQXR0cmlidXRlcy5pbmRleE9mKGF0dHJpYnV0ZS5uYW1lKSA9PT0gLTEpIHtcbiAgICAgIHdhcm4oW1xuICAgICAgICBgVW5yZWNvZ25pemVkIGF0dHJpYnV0ZSBcIiR7YXR0cmlidXRlLm5hbWV9XCIgb24gPCR7ZWwudGFnTmFtZS50b0xvd2VyQ2FzZSgpfT4uYCxcbiAgICAgICAgYCR7YWxsb3dlZEF0dHJpYnV0ZXMubGVuZ3RoID8gYEFsbG93ZWQgYXR0cmlidXRlcyBhcmU6ICR7YWxsb3dlZEF0dHJpYnV0ZXMuam9pbignLCAnKX1gIDogJ1RvIHNldCB0aGUgdmFsdWUsIHVzZSBIVE1MIHdpdGhpbiB0aGUgZWxlbWVudC4nfWBcbiAgICAgIF0pXG4gICAgfVxuICB9KVxufVxuIiwiLyogaXN0YW5idWwgaWdub3JlIGZpbGUgKi9cbmltcG9ydCAqIGFzIGRvbSBmcm9tICcuL2RvbS9pbmRleC5qcydcbmltcG9ydCB7IHN3YWxDbGFzc2VzIH0gZnJvbSAnLi4vdXRpbHMvY2xhc3Nlcy5qcydcblxuLy8gRml4IGlPUyBzY3JvbGxpbmcgaHR0cDovL3N0YWNrb3ZlcmZsb3cuY29tL3EvMzk2MjYzMDJcblxuZXhwb3J0IGNvbnN0IGlPU2ZpeCA9ICgpID0+IHtcbiAgY29uc3QgaU9TID0gKC9pUGFkfGlQaG9uZXxpUG9kLy50ZXN0KG5hdmlnYXRvci51c2VyQWdlbnQpICYmICF3aW5kb3cuTVNTdHJlYW0pIHx8IChuYXZpZ2F0b3IucGxhdGZvcm0gPT09ICdNYWNJbnRlbCcgJiYgbmF2aWdhdG9yLm1heFRvdWNoUG9pbnRzID4gMSlcbiAgaWYgKGlPUyAmJiAhZG9tLmhhc0NsYXNzKGRvY3VtZW50LmJvZHksIHN3YWxDbGFzc2VzLmlvc2ZpeCkpIHtcbiAgICBjb25zdCBvZmZzZXQgPSBkb2N1bWVudC5ib2R5LnNjcm9sbFRvcFxuICAgIGRvY3VtZW50LmJvZHkuc3R5bGUudG9wID0gYCR7b2Zmc2V0ICogLTF9cHhgXG4gICAgZG9tLmFkZENsYXNzKGRvY3VtZW50LmJvZHksIHN3YWxDbGFzc2VzLmlvc2ZpeClcbiAgICBsb2NrQm9keVNjcm9sbCgpXG4gICAgYWRkQm90dG9tUGFkZGluZ0ZvclRhbGxQb3B1cHMoKSAvLyAjMTk0OFxuICB9XG59XG5cbmNvbnN0IGFkZEJvdHRvbVBhZGRpbmdGb3JUYWxsUG9wdXBzID0gKCkgPT4ge1xuICBjb25zdCBzYWZhcmkgPSAhbmF2aWdhdG9yLnVzZXJBZ2VudC5tYXRjaCgvKENyaU9TfEZ4aU9TfEVkZ2lPU3xZYUJyb3dzZXJ8VUNCcm93c2VyKS9pKVxuICBpZiAoc2FmYXJpKSB7XG4gICAgY29uc3QgYm90dG9tUGFuZWxIZWlnaHQgPSA0NFxuICAgIGlmIChkb20uZ2V0UG9wdXAoKS5zY3JvbGxIZWlnaHQgPiB3aW5kb3cuaW5uZXJIZWlnaHQgLSBib3R0b21QYW5lbEhlaWdodCkge1xuICAgICAgZG9tLmdldENvbnRhaW5lcigpLnN0eWxlLnBhZGRpbmdCb3R0b20gPSBgJHtib3R0b21QYW5lbEhlaWdodH1weGBcbiAgICB9XG4gIH1cbn1cblxuY29uc3QgbG9ja0JvZHlTY3JvbGwgPSAoKSA9PiB7IC8vICMxMjQ2XG4gIGNvbnN0IGNvbnRhaW5lciA9IGRvbS5nZXRDb250YWluZXIoKVxuICBsZXQgcHJldmVudFRvdWNoTW92ZVxuICBjb250YWluZXIub250b3VjaHN0YXJ0ID0gKGUpID0+IHtcbiAgICBwcmV2ZW50VG91Y2hNb3ZlID0gc2hvdWxkUHJldmVudFRvdWNoTW92ZShlKVxuICB9XG4gIGNvbnRhaW5lci5vbnRvdWNobW92ZSA9IChlKSA9PiB7XG4gICAgaWYgKHByZXZlbnRUb3VjaE1vdmUpIHtcbiAgICAgIGUucHJldmVudERlZmF1bHQoKVxuICAgICAgZS5zdG9wUHJvcGFnYXRpb24oKVxuICAgIH1cbiAgfVxufVxuXG5jb25zdCBzaG91bGRQcmV2ZW50VG91Y2hNb3ZlID0gKGV2ZW50KSA9PiB7XG4gIGNvbnN0IHRhcmdldCA9IGV2ZW50LnRhcmdldFxuICBjb25zdCBjb250YWluZXIgPSBkb20uZ2V0Q29udGFpbmVyKClcbiAgaWYgKGlzU3R5bHlzKGV2ZW50KSB8fCBpc1pvb20oZXZlbnQpKSB7XG4gICAgcmV0dXJuIGZhbHNlXG4gIH1cbiAgaWYgKHRhcmdldCA9PT0gY29udGFpbmVyKSB7XG4gICAgcmV0dXJuIHRydWVcbiAgfVxuICBpZiAoXG4gICAgIWRvbS5pc1Njcm9sbGFibGUoY29udGFpbmVyKSAmJlxuICAgIHRhcmdldC50YWdOYW1lICE9PSAnSU5QVVQnICYmIC8vICMxNjAzXG4gICAgdGFyZ2V0LnRhZ05hbWUgIT09ICdURVhUQVJFQScgJiYgLy8gIzIyNjZcbiAgICAhKFxuICAgICAgZG9tLmlzU2Nyb2xsYWJsZShkb20uZ2V0SHRtbENvbnRhaW5lcigpKSAmJiAvLyAjMTk0NFxuICAgICAgZG9tLmdldEh0bWxDb250YWluZXIoKS5jb250YWlucyh0YXJnZXQpXG4gICAgKVxuICApIHtcbiAgICByZXR1cm4gdHJ1ZVxuICB9XG4gIHJldHVybiBmYWxzZVxufVxuXG5jb25zdCBpc1N0eWx5cyA9IChldmVudCkgPT4geyAvLyAjMTc4NlxuICByZXR1cm4gZXZlbnQudG91Y2hlcyAmJiBldmVudC50b3VjaGVzLmxlbmd0aCAmJiBldmVudC50b3VjaGVzWzBdLnRvdWNoVHlwZSA9PT0gJ3N0eWx1cydcbn1cblxuY29uc3QgaXNab29tID0gKGV2ZW50KSA9PiB7IC8vICMxODkxXG4gIHJldHVybiBldmVudC50b3VjaGVzICYmIGV2ZW50LnRvdWNoZXMubGVuZ3RoID4gMVxufVxuXG5leHBvcnQgY29uc3QgdW5kb0lPU2ZpeCA9ICgpID0+IHtcbiAgaWYgKGRvbS5oYXNDbGFzcyhkb2N1bWVudC5ib2R5LCBzd2FsQ2xhc3Nlcy5pb3NmaXgpKSB7XG4gICAgY29uc3Qgb2Zmc2V0ID0gcGFyc2VJbnQoZG9jdW1lbnQuYm9keS5zdHlsZS50b3AsIDEwKVxuICAgIGRvbS5yZW1vdmVDbGFzcyhkb2N1bWVudC5ib2R5LCBzd2FsQ2xhc3Nlcy5pb3NmaXgpXG4gICAgZG9jdW1lbnQuYm9keS5zdHlsZS50b3AgPSAnJ1xuICAgIGRvY3VtZW50LmJvZHkuc2Nyb2xsVG9wID0gKG9mZnNldCAqIC0xKVxuICB9XG59XG4iLCIvLyBEZXRlY3QgTm9kZSBlbnZcbmV4cG9ydCBjb25zdCBpc05vZGVFbnYgPSAoKSA9PiB0eXBlb2Ygd2luZG93ID09PSAndW5kZWZpbmVkJyB8fCB0eXBlb2YgZG9jdW1lbnQgPT09ICd1bmRlZmluZWQnXG4iLCJpbXBvcnQgKiBhcyBkb20gZnJvbSAnLi9kb20vaW5kZXguanMnXG5pbXBvcnQgeyBzd2FsQ2xhc3NlcyB9IGZyb20gJy4vY2xhc3Nlcy5qcydcbmltcG9ydCB7IGZpeFNjcm9sbGJhciB9IGZyb20gJy4vc2Nyb2xsYmFyRml4LmpzJ1xuaW1wb3J0IHsgaU9TZml4IH0gZnJvbSAnLi9pb3NGaXguanMnXG5pbXBvcnQgeyBzZXRBcmlhSGlkZGVuIH0gZnJvbSAnLi9hcmlhLmpzJ1xuaW1wb3J0IGdsb2JhbFN0YXRlIGZyb20gJy4uL2dsb2JhbFN0YXRlLmpzJ1xuXG5leHBvcnQgY29uc3QgU0hPV19DTEFTU19USU1FT1VUID0gMTBcblxuLyoqXG4gKiBPcGVuIHBvcHVwLCBhZGQgbmVjZXNzYXJ5IGNsYXNzZXMgYW5kIHN0eWxlcywgZml4IHNjcm9sbGJhclxuICpcbiAqIEBwYXJhbSBwYXJhbXNcbiAqL1xuZXhwb3J0IGNvbnN0IG9wZW5Qb3B1cCA9IChwYXJhbXMpID0+IHtcbiAgY29uc3QgY29udGFpbmVyID0gZG9tLmdldENvbnRhaW5lcigpXG4gIGNvbnN0IHBvcHVwID0gZG9tLmdldFBvcHVwKClcblxuICBpZiAodHlwZW9mIHBhcmFtcy53aWxsT3BlbiA9PT0gJ2Z1bmN0aW9uJykge1xuICAgIHBhcmFtcy53aWxsT3Blbihwb3B1cClcbiAgfVxuXG4gIGNvbnN0IGJvZHlTdHlsZXMgPSB3aW5kb3cuZ2V0Q29tcHV0ZWRTdHlsZShkb2N1bWVudC5ib2R5KVxuICBjb25zdCBpbml0aWFsQm9keU92ZXJmbG93ID0gYm9keVN0eWxlcy5vdmVyZmxvd1lcbiAgYWRkQ2xhc3Nlcyhjb250YWluZXIsIHBvcHVwLCBwYXJhbXMpXG5cbiAgLy8gc2Nyb2xsaW5nIGlzICdoaWRkZW4nIHVudGlsIGFuaW1hdGlvbiBpcyBkb25lLCBhZnRlciB0aGF0ICdhdXRvJ1xuICBzZXRUaW1lb3V0KCgpID0+IHtcbiAgICBzZXRTY3JvbGxpbmdWaXNpYmlsaXR5KGNvbnRhaW5lciwgcG9wdXApXG4gIH0sIFNIT1dfQ0xBU1NfVElNRU9VVClcblxuICBpZiAoZG9tLmlzTW9kYWwoKSkge1xuICAgIGZpeFNjcm9sbENvbnRhaW5lcihjb250YWluZXIsIHBhcmFtcy5zY3JvbGxiYXJQYWRkaW5nLCBpbml0aWFsQm9keU92ZXJmbG93KVxuICAgIHNldEFyaWFIaWRkZW4oKVxuICB9XG5cbiAgaWYgKCFkb20uaXNUb2FzdCgpICYmICFnbG9iYWxTdGF0ZS5wcmV2aW91c0FjdGl2ZUVsZW1lbnQpIHtcbiAgICBnbG9iYWxTdGF0ZS5wcmV2aW91c0FjdGl2ZUVsZW1lbnQgPSBkb2N1bWVudC5hY3RpdmVFbGVtZW50XG4gIH1cblxuICBpZiAodHlwZW9mIHBhcmFtcy5kaWRPcGVuID09PSAnZnVuY3Rpb24nKSB7XG4gICAgc2V0VGltZW91dCgoKSA9PiBwYXJhbXMuZGlkT3Blbihwb3B1cCkpXG4gIH1cblxuICBkb20ucmVtb3ZlQ2xhc3MoY29udGFpbmVyLCBzd2FsQ2xhc3Nlc1snbm8tdHJhbnNpdGlvbiddKVxufVxuXG5jb25zdCBzd2FsT3BlbkFuaW1hdGlvbkZpbmlzaGVkID0gKGV2ZW50KSA9PiB7XG4gIGNvbnN0IHBvcHVwID0gZG9tLmdldFBvcHVwKClcbiAgaWYgKGV2ZW50LnRhcmdldCAhPT0gcG9wdXApIHtcbiAgICByZXR1cm5cbiAgfVxuICBjb25zdCBjb250YWluZXIgPSBkb20uZ2V0Q29udGFpbmVyKClcbiAgcG9wdXAucmVtb3ZlRXZlbnRMaXN0ZW5lcihkb20uYW5pbWF0aW9uRW5kRXZlbnQsIHN3YWxPcGVuQW5pbWF0aW9uRmluaXNoZWQpXG4gIGNvbnRhaW5lci5zdHlsZS5vdmVyZmxvd1kgPSAnYXV0bydcbn1cblxuY29uc3Qgc2V0U2Nyb2xsaW5nVmlzaWJpbGl0eSA9IChjb250YWluZXIsIHBvcHVwKSA9PiB7XG4gIGlmIChkb20uYW5pbWF0aW9uRW5kRXZlbnQgJiYgZG9tLmhhc0Nzc0FuaW1hdGlvbihwb3B1cCkpIHtcbiAgICBjb250YWluZXIuc3R5bGUub3ZlcmZsb3dZID0gJ2hpZGRlbidcbiAgICBwb3B1cC5hZGRFdmVudExpc3RlbmVyKGRvbS5hbmltYXRpb25FbmRFdmVudCwgc3dhbE9wZW5BbmltYXRpb25GaW5pc2hlZClcbiAgfSBlbHNlIHtcbiAgICBjb250YWluZXIuc3R5bGUub3ZlcmZsb3dZID0gJ2F1dG8nXG4gIH1cbn1cblxuY29uc3QgZml4U2Nyb2xsQ29udGFpbmVyID0gKGNvbnRhaW5lciwgc2Nyb2xsYmFyUGFkZGluZywgaW5pdGlhbEJvZHlPdmVyZmxvdykgPT4ge1xuICBpT1NmaXgoKVxuXG4gIGlmIChzY3JvbGxiYXJQYWRkaW5nICYmIGluaXRpYWxCb2R5T3ZlcmZsb3cgIT09ICdoaWRkZW4nKSB7XG4gICAgZml4U2Nyb2xsYmFyKClcbiAgfVxuXG4gIC8vIHN3ZWV0YWxlcnQyL2lzc3Vlcy8xMjQ3XG4gIHNldFRpbWVvdXQoKCkgPT4ge1xuICAgIGNvbnRhaW5lci5zY3JvbGxUb3AgPSAwXG4gIH0pXG59XG5cbmNvbnN0IGFkZENsYXNzZXMgPSAoY29udGFpbmVyLCBwb3B1cCwgcGFyYW1zKSA9PiB7XG4gIGRvbS5hZGRDbGFzcyhjb250YWluZXIsIHBhcmFtcy5zaG93Q2xhc3MuYmFja2Ryb3ApXG4gIC8vIHRoZSB3b3JrYXJvdW5kIHdpdGggc2V0dGluZy91bnNldHRpbmcgb3BhY2l0eSBpcyBuZWVkZWQgZm9yICMyMDE5IGFuZCAyMDU5XG4gIHBvcHVwLnN0eWxlLnNldFByb3BlcnR5KCdvcGFjaXR5JywgJzAnLCAnaW1wb3J0YW50JylcbiAgZG9tLnNob3cocG9wdXAsICdncmlkJylcbiAgc2V0VGltZW91dCgoKSA9PiB7XG4gICAgLy8gQW5pbWF0ZSBwb3B1cCByaWdodCBhZnRlciBzaG93aW5nIGl0XG4gICAgZG9tLmFkZENsYXNzKHBvcHVwLCBwYXJhbXMuc2hvd0NsYXNzLnBvcHVwKVxuICAgIC8vIGFuZCByZW1vdmUgdGhlIG9wYWNpdHkgd29ya2Fyb3VuZFxuICAgIHBvcHVwLnN0eWxlLnJlbW92ZVByb3BlcnR5KCdvcGFjaXR5JylcbiAgfSwgU0hPV19DTEFTU19USU1FT1VUKSAvLyAxMG1zIGluIG9yZGVyIHRvIGZpeCAjMjA2MlxuXG4gIGRvbS5hZGRDbGFzcyhbZG9jdW1lbnQuZG9jdW1lbnRFbGVtZW50LCBkb2N1bWVudC5ib2R5XSwgc3dhbENsYXNzZXMuc2hvd24pXG4gIGlmIChwYXJhbXMuaGVpZ2h0QXV0byAmJiBwYXJhbXMuYmFja2Ryb3AgJiYgIXBhcmFtcy50b2FzdCkge1xuICAgIGRvbS5hZGRDbGFzcyhbZG9jdW1lbnQuZG9jdW1lbnRFbGVtZW50LCBkb2N1bWVudC5ib2R5XSwgc3dhbENsYXNzZXNbJ2hlaWdodC1hdXRvJ10pXG4gIH1cbn1cbiIsImltcG9ydCB7IHdhcm4sIHdhcm5BYm91dERlcHJlY2F0aW9uIH0gZnJvbSAnLi4vdXRpbHMvdXRpbHMuanMnXG5cbmV4cG9ydCBjb25zdCBkZWZhdWx0UGFyYW1zID0ge1xuICB0aXRsZTogJycsXG4gIHRpdGxlVGV4dDogJycsXG4gIHRleHQ6ICcnLFxuICBodG1sOiAnJyxcbiAgZm9vdGVyOiAnJyxcbiAgaWNvbjogdW5kZWZpbmVkLFxuICBpY29uQ29sb3I6IHVuZGVmaW5lZCxcbiAgaWNvbkh0bWw6IHVuZGVmaW5lZCxcbiAgdGVtcGxhdGU6IHVuZGVmaW5lZCxcbiAgdG9hc3Q6IGZhbHNlLFxuICBzaG93Q2xhc3M6IHtcbiAgICBwb3B1cDogJ3N3YWwyLXNob3cnLFxuICAgIGJhY2tkcm9wOiAnc3dhbDItYmFja2Ryb3Atc2hvdycsXG4gICAgaWNvbjogJ3N3YWwyLWljb24tc2hvdycsXG4gIH0sXG4gIGhpZGVDbGFzczoge1xuICAgIHBvcHVwOiAnc3dhbDItaGlkZScsXG4gICAgYmFja2Ryb3A6ICdzd2FsMi1iYWNrZHJvcC1oaWRlJyxcbiAgICBpY29uOiAnc3dhbDItaWNvbi1oaWRlJyxcbiAgfSxcbiAgY3VzdG9tQ2xhc3M6IHt9LFxuICB0YXJnZXQ6ICdib2R5JyxcbiAgYmFja2Ryb3A6IHRydWUsXG4gIGhlaWdodEF1dG86IHRydWUsXG4gIGFsbG93T3V0c2lkZUNsaWNrOiB0cnVlLFxuICBhbGxvd0VzY2FwZUtleTogdHJ1ZSxcbiAgYWxsb3dFbnRlcktleTogdHJ1ZSxcbiAgc3RvcEtleWRvd25Qcm9wYWdhdGlvbjogdHJ1ZSxcbiAga2V5ZG93bkxpc3RlbmVyQ2FwdHVyZTogZmFsc2UsXG4gIHNob3dDb25maXJtQnV0dG9uOiB0cnVlLFxuICBzaG93RGVueUJ1dHRvbjogZmFsc2UsXG4gIHNob3dDYW5jZWxCdXR0b246IGZhbHNlLFxuICBwcmVDb25maXJtOiB1bmRlZmluZWQsXG4gIHByZURlbnk6IHVuZGVmaW5lZCxcbiAgY29uZmlybUJ1dHRvblRleHQ6ICdPSycsXG4gIGNvbmZpcm1CdXR0b25BcmlhTGFiZWw6ICcnLFxuICBjb25maXJtQnV0dG9uQ29sb3I6IHVuZGVmaW5lZCxcbiAgZGVueUJ1dHRvblRleHQ6ICdObycsXG4gIGRlbnlCdXR0b25BcmlhTGFiZWw6ICcnLFxuICBkZW55QnV0dG9uQ29sb3I6IHVuZGVmaW5lZCxcbiAgY2FuY2VsQnV0dG9uVGV4dDogJ0NhbmNlbCcsXG4gIGNhbmNlbEJ1dHRvbkFyaWFMYWJlbDogJycsXG4gIGNhbmNlbEJ1dHRvbkNvbG9yOiB1bmRlZmluZWQsXG4gIGJ1dHRvbnNTdHlsaW5nOiB0cnVlLFxuICByZXZlcnNlQnV0dG9uczogZmFsc2UsXG4gIGZvY3VzQ29uZmlybTogdHJ1ZSxcbiAgZm9jdXNEZW55OiBmYWxzZSxcbiAgZm9jdXNDYW5jZWw6IGZhbHNlLFxuICByZXR1cm5Gb2N1czogdHJ1ZSxcbiAgc2hvd0Nsb3NlQnV0dG9uOiBmYWxzZSxcbiAgY2xvc2VCdXR0b25IdG1sOiAnJnRpbWVzOycsXG4gIGNsb3NlQnV0dG9uQXJpYUxhYmVsOiAnQ2xvc2UgdGhpcyBkaWFsb2cnLFxuICBsb2FkZXJIdG1sOiAnJyxcbiAgc2hvd0xvYWRlck9uQ29uZmlybTogZmFsc2UsXG4gIHNob3dMb2FkZXJPbkRlbnk6IGZhbHNlLFxuICBpbWFnZVVybDogdW5kZWZpbmVkLFxuICBpbWFnZVdpZHRoOiB1bmRlZmluZWQsXG4gIGltYWdlSGVpZ2h0OiB1bmRlZmluZWQsXG4gIGltYWdlQWx0OiAnJyxcbiAgdGltZXI6IHVuZGVmaW5lZCxcbiAgdGltZXJQcm9ncmVzc0JhcjogZmFsc2UsXG4gIHdpZHRoOiB1bmRlZmluZWQsXG4gIHBhZGRpbmc6IHVuZGVmaW5lZCxcbiAgYmFja2dyb3VuZDogdW5kZWZpbmVkLFxuICBpbnB1dDogdW5kZWZpbmVkLFxuICBpbnB1dFBsYWNlaG9sZGVyOiAnJyxcbiAgaW5wdXRMYWJlbDogJycsXG4gIGlucHV0VmFsdWU6ICcnLFxuICBpbnB1dE9wdGlvbnM6IHt9LFxuICBpbnB1dEF1dG9UcmltOiB0cnVlLFxuICBpbnB1dEF0dHJpYnV0ZXM6IHt9LFxuICBpbnB1dFZhbGlkYXRvcjogdW5kZWZpbmVkLFxuICByZXR1cm5JbnB1dFZhbHVlT25EZW55OiBmYWxzZSxcbiAgdmFsaWRhdGlvbk1lc3NhZ2U6IHVuZGVmaW5lZCxcbiAgZ3JvdzogZmFsc2UsXG4gIHBvc2l0aW9uOiAnY2VudGVyJyxcbiAgcHJvZ3Jlc3NTdGVwczogW10sXG4gIGN1cnJlbnRQcm9ncmVzc1N0ZXA6IHVuZGVmaW5lZCxcbiAgcHJvZ3Jlc3NTdGVwc0Rpc3RhbmNlOiB1bmRlZmluZWQsXG4gIHdpbGxPcGVuOiB1bmRlZmluZWQsXG4gIGRpZE9wZW46IHVuZGVmaW5lZCxcbiAgZGlkUmVuZGVyOiB1bmRlZmluZWQsXG4gIHdpbGxDbG9zZTogdW5kZWZpbmVkLFxuICBkaWRDbG9zZTogdW5kZWZpbmVkLFxuICBkaWREZXN0cm95OiB1bmRlZmluZWQsXG4gIHNjcm9sbGJhclBhZGRpbmc6IHRydWVcbn1cblxuZXhwb3J0IGNvbnN0IHVwZGF0YWJsZVBhcmFtcyA9IFtcbiAgJ2FsbG93RXNjYXBlS2V5JyxcbiAgJ2FsbG93T3V0c2lkZUNsaWNrJyxcbiAgJ2JhY2tncm91bmQnLFxuICAnYnV0dG9uc1N0eWxpbmcnLFxuICAnY2FuY2VsQnV0dG9uQXJpYUxhYmVsJyxcbiAgJ2NhbmNlbEJ1dHRvbkNvbG9yJyxcbiAgJ2NhbmNlbEJ1dHRvblRleHQnLFxuICAnY2xvc2VCdXR0b25BcmlhTGFiZWwnLFxuICAnY2xvc2VCdXR0b25IdG1sJyxcbiAgJ2NvbmZpcm1CdXR0b25BcmlhTGFiZWwnLFxuICAnY29uZmlybUJ1dHRvbkNvbG9yJyxcbiAgJ2NvbmZpcm1CdXR0b25UZXh0JyxcbiAgJ2N1cnJlbnRQcm9ncmVzc1N0ZXAnLFxuICAnY3VzdG9tQ2xhc3MnLFxuICAnZGVueUJ1dHRvbkFyaWFMYWJlbCcsXG4gICdkZW55QnV0dG9uQ29sb3InLFxuICAnZGVueUJ1dHRvblRleHQnLFxuICAnZGlkQ2xvc2UnLFxuICAnZGlkRGVzdHJveScsXG4gICdmb290ZXInLFxuICAnaGlkZUNsYXNzJyxcbiAgJ2h0bWwnLFxuICAnaWNvbicsXG4gICdpY29uQ29sb3InLFxuICAnaWNvbkh0bWwnLFxuICAnaW1hZ2VBbHQnLFxuICAnaW1hZ2VIZWlnaHQnLFxuICAnaW1hZ2VVcmwnLFxuICAnaW1hZ2VXaWR0aCcsXG4gICdwcmVDb25maXJtJyxcbiAgJ3ByZURlbnknLFxuICAncHJvZ3Jlc3NTdGVwcycsXG4gICdyZXR1cm5Gb2N1cycsXG4gICdyZXZlcnNlQnV0dG9ucycsXG4gICdzaG93Q2FuY2VsQnV0dG9uJyxcbiAgJ3Nob3dDbG9zZUJ1dHRvbicsXG4gICdzaG93Q29uZmlybUJ1dHRvbicsXG4gICdzaG93RGVueUJ1dHRvbicsXG4gICd0ZXh0JyxcbiAgJ3RpdGxlJyxcbiAgJ3RpdGxlVGV4dCcsXG4gICd3aWxsQ2xvc2UnLFxuXVxuXG5leHBvcnQgY29uc3QgZGVwcmVjYXRlZFBhcmFtcyA9IHt9XG5cbmNvbnN0IHRvYXN0SW5jb21wYXRpYmxlUGFyYW1zID0gW1xuICAnYWxsb3dPdXRzaWRlQ2xpY2snLFxuICAnYWxsb3dFbnRlcktleScsXG4gICdiYWNrZHJvcCcsXG4gICdmb2N1c0NvbmZpcm0nLFxuICAnZm9jdXNEZW55JyxcbiAgJ2ZvY3VzQ2FuY2VsJyxcbiAgJ3JldHVybkZvY3VzJyxcbiAgJ2hlaWdodEF1dG8nLFxuICAna2V5ZG93bkxpc3RlbmVyQ2FwdHVyZSdcbl1cblxuLyoqXG4gKiBJcyB2YWxpZCBwYXJhbWV0ZXJcbiAqIEBwYXJhbSB7U3RyaW5nfSBwYXJhbU5hbWVcbiAqL1xuZXhwb3J0IGNvbnN0IGlzVmFsaWRQYXJhbWV0ZXIgPSAocGFyYW1OYW1lKSA9PiB7XG4gIHJldHVybiBPYmplY3QucHJvdG90eXBlLmhhc093blByb3BlcnR5LmNhbGwoZGVmYXVsdFBhcmFtcywgcGFyYW1OYW1lKVxufVxuXG4vKipcbiAqIElzIHZhbGlkIHBhcmFtZXRlciBmb3IgU3dhbC51cGRhdGUoKSBtZXRob2RcbiAqIEBwYXJhbSB7U3RyaW5nfSBwYXJhbU5hbWVcbiAqL1xuZXhwb3J0IGNvbnN0IGlzVXBkYXRhYmxlUGFyYW1ldGVyID0gKHBhcmFtTmFtZSkgPT4ge1xuICByZXR1cm4gdXBkYXRhYmxlUGFyYW1zLmluZGV4T2YocGFyYW1OYW1lKSAhPT0gLTFcbn1cblxuLyoqXG4gKiBJcyBkZXByZWNhdGVkIHBhcmFtZXRlclxuICogQHBhcmFtIHtTdHJpbmd9IHBhcmFtTmFtZVxuICovXG5leHBvcnQgY29uc3QgaXNEZXByZWNhdGVkUGFyYW1ldGVyID0gKHBhcmFtTmFtZSkgPT4ge1xuICByZXR1cm4gZGVwcmVjYXRlZFBhcmFtc1twYXJhbU5hbWVdXG59XG5cbmNvbnN0IGNoZWNrSWZQYXJhbUlzVmFsaWQgPSAocGFyYW0pID0+IHtcbiAgaWYgKCFpc1ZhbGlkUGFyYW1ldGVyKHBhcmFtKSkge1xuICAgIHdhcm4oYFVua25vd24gcGFyYW1ldGVyIFwiJHtwYXJhbX1cImApXG4gIH1cbn1cblxuY29uc3QgY2hlY2tJZlRvYXN0UGFyYW1Jc1ZhbGlkID0gKHBhcmFtKSA9PiB7XG4gIGlmICh0b2FzdEluY29tcGF0aWJsZVBhcmFtcy5pbmNsdWRlcyhwYXJhbSkpIHtcbiAgICB3YXJuKGBUaGUgcGFyYW1ldGVyIFwiJHtwYXJhbX1cIiBpcyBpbmNvbXBhdGlibGUgd2l0aCB0b2FzdHNgKVxuICB9XG59XG5cbmNvbnN0IGNoZWNrSWZQYXJhbUlzRGVwcmVjYXRlZCA9IChwYXJhbSkgPT4ge1xuICBpZiAoaXNEZXByZWNhdGVkUGFyYW1ldGVyKHBhcmFtKSkge1xuICAgIHdhcm5BYm91dERlcHJlY2F0aW9uKHBhcmFtLCBpc0RlcHJlY2F0ZWRQYXJhbWV0ZXIocGFyYW0pKVxuICB9XG59XG5cbi8qKlxuICogU2hvdyByZWxldmFudCB3YXJuaW5ncyBmb3IgZ2l2ZW4gcGFyYW1zXG4gKlxuICogQHBhcmFtIHBhcmFtc1xuICovXG5leHBvcnQgY29uc3Qgc2hvd1dhcm5pbmdzRm9yUGFyYW1zID0gKHBhcmFtcykgPT4ge1xuICBpZiAoIXBhcmFtcy5iYWNrZHJvcCAmJiBwYXJhbXMuYWxsb3dPdXRzaWRlQ2xpY2spIHtcbiAgICB3YXJuKCdcImFsbG93T3V0c2lkZUNsaWNrXCIgcGFyYW1ldGVyIHJlcXVpcmVzIGBiYWNrZHJvcGAgcGFyYW1ldGVyIHRvIGJlIHNldCB0byBgdHJ1ZWAnKVxuICB9XG5cbiAgZm9yIChjb25zdCBwYXJhbSBpbiBwYXJhbXMpIHtcbiAgICBjaGVja0lmUGFyYW1Jc1ZhbGlkKHBhcmFtKVxuXG4gICAgaWYgKHBhcmFtcy50b2FzdCkge1xuICAgICAgY2hlY2tJZlRvYXN0UGFyYW1Jc1ZhbGlkKHBhcmFtKVxuICAgIH1cblxuICAgIGNoZWNrSWZQYXJhbUlzRGVwcmVjYXRlZChwYXJhbSlcbiAgfVxufVxuXG5leHBvcnQgZGVmYXVsdCBkZWZhdWx0UGFyYW1zXG4iLCJpbXBvcnQgKiBhcyBkb20gZnJvbSAnLi9kb20vaW5kZXguanMnXG5cbmV4cG9ydCBjb25zdCBmaXhTY3JvbGxiYXIgPSAoKSA9PiB7XG4gIC8vIGZvciBxdWV1ZXMsIGRvIG5vdCBkbyB0aGlzIG1vcmUgdGhhbiBvbmNlXG4gIGlmIChkb20uc3RhdGVzLnByZXZpb3VzQm9keVBhZGRpbmcgIT09IG51bGwpIHtcbiAgICByZXR1cm5cbiAgfVxuICAvLyBpZiB0aGUgYm9keSBoYXMgb3ZlcmZsb3dcbiAgaWYgKGRvY3VtZW50LmJvZHkuc2Nyb2xsSGVpZ2h0ID4gd2luZG93LmlubmVySGVpZ2h0KSB7XG4gICAgLy8gYWRkIHBhZGRpbmcgc28gdGhlIGNvbnRlbnQgZG9lc24ndCBzaGlmdCBhZnRlciByZW1vdmFsIG9mIHNjcm9sbGJhclxuICAgIGRvbS5zdGF0ZXMucHJldmlvdXNCb2R5UGFkZGluZyA9IHBhcnNlSW50KHdpbmRvdy5nZXRDb21wdXRlZFN0eWxlKGRvY3VtZW50LmJvZHkpLmdldFByb3BlcnR5VmFsdWUoJ3BhZGRpbmctcmlnaHQnKSlcbiAgICBkb2N1bWVudC5ib2R5LnN0eWxlLnBhZGRpbmdSaWdodCA9IGAke2RvbS5zdGF0ZXMucHJldmlvdXNCb2R5UGFkZGluZyArIGRvbS5tZWFzdXJlU2Nyb2xsYmFyKCl9cHhgXG4gIH1cbn1cblxuZXhwb3J0IGNvbnN0IHVuZG9TY3JvbGxiYXIgPSAoKSA9PiB7XG4gIGlmIChkb20uc3RhdGVzLnByZXZpb3VzQm9keVBhZGRpbmcgIT09IG51bGwpIHtcbiAgICBkb2N1bWVudC5ib2R5LnN0eWxlLnBhZGRpbmdSaWdodCA9IGAke2RvbS5zdGF0ZXMucHJldmlvdXNCb2R5UGFkZGluZ31weGBcbiAgICBkb20uc3RhdGVzLnByZXZpb3VzQm9keVBhZGRpbmcgPSBudWxsXG4gIH1cbn1cbiIsImltcG9ydCB7IHdhcm4gfSBmcm9tICcuL3V0aWxzLmpzJ1xuaW1wb3J0ICogYXMgZG9tIGZyb20gJy4vZG9tL2luZGV4LmpzJ1xuaW1wb3J0IGRlZmF1bHRJbnB1dFZhbGlkYXRvcnMgZnJvbSAnLi9kZWZhdWx0SW5wdXRWYWxpZGF0b3JzLmpzJ1xuXG5mdW5jdGlvbiBzZXREZWZhdWx0SW5wdXRWYWxpZGF0b3JzIChwYXJhbXMpIHtcbiAgLy8gVXNlIGRlZmF1bHQgYGlucHV0VmFsaWRhdG9yYCBmb3Igc3VwcG9ydGVkIGlucHV0IHR5cGVzIGlmIG5vdCBwcm92aWRlZFxuICBpZiAoIXBhcmFtcy5pbnB1dFZhbGlkYXRvcikge1xuICAgIE9iamVjdC5rZXlzKGRlZmF1bHRJbnB1dFZhbGlkYXRvcnMpLmZvckVhY2goKGtleSkgPT4ge1xuICAgICAgaWYgKHBhcmFtcy5pbnB1dCA9PT0ga2V5KSB7XG4gICAgICAgIHBhcmFtcy5pbnB1dFZhbGlkYXRvciA9IGRlZmF1bHRJbnB1dFZhbGlkYXRvcnNba2V5XVxuICAgICAgfVxuICAgIH0pXG4gIH1cbn1cblxuZnVuY3Rpb24gdmFsaWRhdGVDdXN0b21UYXJnZXRFbGVtZW50IChwYXJhbXMpIHtcbiAgLy8gRGV0ZXJtaW5lIGlmIHRoZSBjdXN0b20gdGFyZ2V0IGVsZW1lbnQgaXMgdmFsaWRcbiAgaWYgKFxuICAgICFwYXJhbXMudGFyZ2V0IHx8XG4gICAgKHR5cGVvZiBwYXJhbXMudGFyZ2V0ID09PSAnc3RyaW5nJyAmJiAhZG9jdW1lbnQucXVlcnlTZWxlY3RvcihwYXJhbXMudGFyZ2V0KSkgfHxcbiAgICAodHlwZW9mIHBhcmFtcy50YXJnZXQgIT09ICdzdHJpbmcnICYmICFwYXJhbXMudGFyZ2V0LmFwcGVuZENoaWxkKVxuICApIHtcbiAgICB3YXJuKCdUYXJnZXQgcGFyYW1ldGVyIGlzIG5vdCB2YWxpZCwgZGVmYXVsdGluZyB0byBcImJvZHlcIicpXG4gICAgcGFyYW1zLnRhcmdldCA9ICdib2R5J1xuICB9XG59XG5cbi8qKlxuICogU2V0IHR5cGUsIHRleHQgYW5kIGFjdGlvbnMgb24gcG9wdXBcbiAqXG4gKiBAcGFyYW0gcGFyYW1zXG4gKiBAcmV0dXJucyB7Ym9vbGVhbn1cbiAqL1xuZXhwb3J0IGRlZmF1bHQgZnVuY3Rpb24gc2V0UGFyYW1ldGVycyAocGFyYW1zKSB7XG4gIHNldERlZmF1bHRJbnB1dFZhbGlkYXRvcnMocGFyYW1zKVxuXG4gIC8vIHNob3dMb2FkZXJPbkNvbmZpcm0gJiYgcHJlQ29uZmlybVxuICBpZiAocGFyYW1zLnNob3dMb2FkZXJPbkNvbmZpcm0gJiYgIXBhcmFtcy5wcmVDb25maXJtKSB7XG4gICAgd2FybihcbiAgICAgICdzaG93TG9hZGVyT25Db25maXJtIGlzIHNldCB0byB0cnVlLCBidXQgcHJlQ29uZmlybSBpcyBub3QgZGVmaW5lZC5cXG4nICtcbiAgICAgICdzaG93TG9hZGVyT25Db25maXJtIHNob3VsZCBiZSB1c2VkIHRvZ2V0aGVyIHdpdGggcHJlQ29uZmlybSwgc2VlIHVzYWdlIGV4YW1wbGU6XFxuJyArXG4gICAgICAnaHR0cHM6Ly9zd2VldGFsZXJ0Mi5naXRodWIuaW8vI2FqYXgtcmVxdWVzdCdcbiAgICApXG4gIH1cblxuICB2YWxpZGF0ZUN1c3RvbVRhcmdldEVsZW1lbnQocGFyYW1zKVxuXG4gIC8vIFJlcGxhY2UgbmV3bGluZXMgd2l0aCA8YnI+IGluIHRpdGxlXG4gIGlmICh0eXBlb2YgcGFyYW1zLnRpdGxlID09PSAnc3RyaW5nJykge1xuICAgIHBhcmFtcy50aXRsZSA9IHBhcmFtcy50aXRsZS5zcGxpdCgnXFxuJykuam9pbignPGJyIC8+JylcbiAgfVxuXG4gIGRvbS5pbml0KHBhcmFtcylcbn1cbiIsImV4cG9ydCBjb25zdCBjb25zb2xlUHJlZml4ID0gJ1N3ZWV0QWxlcnQyOidcblxuLyoqXG4gKiBGaWx0ZXIgdGhlIHVuaXF1ZSB2YWx1ZXMgaW50byBhIG5ldyBhcnJheVxuICogQHBhcmFtIGFyclxuICovXG5leHBvcnQgY29uc3QgdW5pcXVlQXJyYXkgPSAoYXJyKSA9PiB7XG4gIGNvbnN0IHJlc3VsdCA9IFtdXG4gIGZvciAobGV0IGkgPSAwOyBpIDwgYXJyLmxlbmd0aDsgaSsrKSB7XG4gICAgaWYgKHJlc3VsdC5pbmRleE9mKGFycltpXSkgPT09IC0xKSB7XG4gICAgICByZXN1bHQucHVzaChhcnJbaV0pXG4gICAgfVxuICB9XG4gIHJldHVybiByZXN1bHRcbn1cblxuLyoqXG4gKiBDYXBpdGFsaXplIHRoZSBmaXJzdCBsZXR0ZXIgb2YgYSBzdHJpbmdcbiAqIEBwYXJhbSBzdHJcbiAqL1xuZXhwb3J0IGNvbnN0IGNhcGl0YWxpemVGaXJzdExldHRlciA9IChzdHIpID0+IHN0ci5jaGFyQXQoMCkudG9VcHBlckNhc2UoKSArIHN0ci5zbGljZSgxKVxuXG4vKipcbiAqIENvbnZlcnQgTm9kZUxpc3QgdG8gQXJyYXlcbiAqIEBwYXJhbSBub2RlTGlzdFxuICovXG5leHBvcnQgY29uc3QgdG9BcnJheSA9IChub2RlTGlzdCkgPT4gQXJyYXkucHJvdG90eXBlLnNsaWNlLmNhbGwobm9kZUxpc3QpXG5cbi8qKlxuICogU3RhbmRhcmRpc2UgY29uc29sZSB3YXJuaW5nc1xuICogQHBhcmFtIG1lc3NhZ2VcbiAqL1xuZXhwb3J0IGNvbnN0IHdhcm4gPSAobWVzc2FnZSkgPT4ge1xuICBjb25zb2xlLndhcm4oYCR7Y29uc29sZVByZWZpeH0gJHt0eXBlb2YgbWVzc2FnZSA9PT0gJ29iamVjdCcgPyBtZXNzYWdlLmpvaW4oJyAnKSA6IG1lc3NhZ2V9YClcbn1cblxuLyoqXG4gKiBTdGFuZGFyZGlzZSBjb25zb2xlIGVycm9yc1xuICogQHBhcmFtIG1lc3NhZ2VcbiAqL1xuZXhwb3J0IGNvbnN0IGVycm9yID0gKG1lc3NhZ2UpID0+IHtcbiAgY29uc29sZS5lcnJvcihgJHtjb25zb2xlUHJlZml4fSAke21lc3NhZ2V9YClcbn1cblxuLyoqXG4gKiBQcml2YXRlIGdsb2JhbCBzdGF0ZSBmb3IgYHdhcm5PbmNlYFxuICogQHR5cGUge0FycmF5fVxuICogQHByaXZhdGVcbiAqL1xuY29uc3QgcHJldmlvdXNXYXJuT25jZU1lc3NhZ2VzID0gW11cblxuLyoqXG4gKiBTaG93IGEgY29uc29sZSB3YXJuaW5nLCBidXQgb25seSBpZiBpdCBoYXNuJ3QgYWxyZWFkeSBiZWVuIHNob3duXG4gKiBAcGFyYW0gbWVzc2FnZVxuICovXG5leHBvcnQgY29uc3Qgd2Fybk9uY2UgPSAobWVzc2FnZSkgPT4ge1xuICBpZiAoIXByZXZpb3VzV2Fybk9uY2VNZXNzYWdlcy5pbmNsdWRlcyhtZXNzYWdlKSkge1xuICAgIHByZXZpb3VzV2Fybk9uY2VNZXNzYWdlcy5wdXNoKG1lc3NhZ2UpXG4gICAgd2FybihtZXNzYWdlKVxuICB9XG59XG5cbi8qKlxuICogU2hvdyBhIG9uZS10aW1lIGNvbnNvbGUgd2FybmluZyBhYm91dCBkZXByZWNhdGVkIHBhcmFtcy9tZXRob2RzXG4gKi9cbmV4cG9ydCBjb25zdCB3YXJuQWJvdXREZXByZWNhdGlvbiA9IChkZXByZWNhdGVkUGFyYW0sIHVzZUluc3RlYWQpID0+IHtcbiAgd2Fybk9uY2UoYFwiJHtkZXByZWNhdGVkUGFyYW19XCIgaXMgZGVwcmVjYXRlZCBhbmQgd2lsbCBiZSByZW1vdmVkIGluIHRoZSBuZXh0IG1ham9yIHJlbGVhc2UuIFBsZWFzZSB1c2UgXCIke3VzZUluc3RlYWR9XCIgaW5zdGVhZC5gKVxufVxuXG4vKipcbiAqIElmIGBhcmdgIGlzIGEgZnVuY3Rpb24sIGNhbGwgaXQgKHdpdGggbm8gYXJndW1lbnRzIG9yIGNvbnRleHQpIGFuZCByZXR1cm4gdGhlIHJlc3VsdC5cbiAqIE90aGVyd2lzZSwganVzdCBwYXNzIHRoZSB2YWx1ZSB0aHJvdWdoXG4gKiBAcGFyYW0gYXJnXG4gKi9cbmV4cG9ydCBjb25zdCBjYWxsSWZGdW5jdGlvbiA9IChhcmcpID0+IHR5cGVvZiBhcmcgPT09ICdmdW5jdGlvbicgPyBhcmcoKSA6IGFyZ1xuXG5leHBvcnQgY29uc3QgaGFzVG9Qcm9taXNlRm4gPSAoYXJnKSA9PiBhcmcgJiYgdHlwZW9mIGFyZy50b1Byb21pc2UgPT09ICdmdW5jdGlvbidcblxuZXhwb3J0IGNvbnN0IGFzUHJvbWlzZSA9IChhcmcpID0+IGhhc1RvUHJvbWlzZUZuKGFyZykgPyBhcmcudG9Qcm9taXNlKCkgOiBQcm9taXNlLnJlc29sdmUoYXJnKVxuXG5leHBvcnQgY29uc3QgaXNQcm9taXNlID0gKGFyZykgPT4gYXJnICYmIFByb21pc2UucmVzb2x2ZShhcmcpID09PSBhcmdcbiIsIi8vIFRoZSBtb2R1bGUgY2FjaGVcbnZhciBfX3dlYnBhY2tfbW9kdWxlX2NhY2hlX18gPSB7fTtcblxuLy8gVGhlIHJlcXVpcmUgZnVuY3Rpb25cbmZ1bmN0aW9uIF9fd2VicGFja19yZXF1aXJlX18obW9kdWxlSWQpIHtcblx0Ly8gQ2hlY2sgaWYgbW9kdWxlIGlzIGluIGNhY2hlXG5cdHZhciBjYWNoZWRNb2R1bGUgPSBfX3dlYnBhY2tfbW9kdWxlX2NhY2hlX19bbW9kdWxlSWRdO1xuXHRpZiAoY2FjaGVkTW9kdWxlICE9PSB1bmRlZmluZWQpIHtcblx0XHRyZXR1cm4gY2FjaGVkTW9kdWxlLmV4cG9ydHM7XG5cdH1cblx0Ly8gQ3JlYXRlIGEgbmV3IG1vZHVsZSAoYW5kIHB1dCBpdCBpbnRvIHRoZSBjYWNoZSlcblx0dmFyIG1vZHVsZSA9IF9fd2VicGFja19tb2R1bGVfY2FjaGVfX1ttb2R1bGVJZF0gPSB7XG5cdFx0Ly8gbm8gbW9kdWxlLmlkIG5lZWRlZFxuXHRcdC8vIG5vIG1vZHVsZS5sb2FkZWQgbmVlZGVkXG5cdFx0ZXhwb3J0czoge31cblx0fTtcblxuXHQvLyBFeGVjdXRlIHRoZSBtb2R1bGUgZnVuY3Rpb25cblx0X193ZWJwYWNrX21vZHVsZXNfX1ttb2R1bGVJZF0obW9kdWxlLCBtb2R1bGUuZXhwb3J0cywgX193ZWJwYWNrX3JlcXVpcmVfXyk7XG5cblx0Ly8gUmV0dXJuIHRoZSBleHBvcnRzIG9mIHRoZSBtb2R1bGVcblx0cmV0dXJuIG1vZHVsZS5leHBvcnRzO1xufVxuXG4iLCIvLyBkZWZpbmUgZ2V0dGVyIGZ1bmN0aW9ucyBmb3IgaGFybW9ueSBleHBvcnRzXG5fX3dlYnBhY2tfcmVxdWlyZV9fLmQgPSAoZXhwb3J0cywgZGVmaW5pdGlvbikgPT4ge1xuXHRmb3IodmFyIGtleSBpbiBkZWZpbml0aW9uKSB7XG5cdFx0aWYoX193ZWJwYWNrX3JlcXVpcmVfXy5vKGRlZmluaXRpb24sIGtleSkgJiYgIV9fd2VicGFja19yZXF1aXJlX18ubyhleHBvcnRzLCBrZXkpKSB7XG5cdFx0XHRPYmplY3QuZGVmaW5lUHJvcGVydHkoZXhwb3J0cywga2V5LCB7IGVudW1lcmFibGU6IHRydWUsIGdldDogZGVmaW5pdGlvbltrZXldIH0pO1xuXHRcdH1cblx0fVxufTsiLCJfX3dlYnBhY2tfcmVxdWlyZV9fLm8gPSAob2JqLCBwcm9wKSA9PiAoT2JqZWN0LnByb3RvdHlwZS5oYXNPd25Qcm9wZXJ0eS5jYWxsKG9iaiwgcHJvcCkpIiwiLy8gZGVmaW5lIF9fZXNNb2R1bGUgb24gZXhwb3J0c1xuX193ZWJwYWNrX3JlcXVpcmVfXy5yID0gKGV4cG9ydHMpID0+IHtcblx0aWYodHlwZW9mIFN5bWJvbCAhPT0gJ3VuZGVmaW5lZCcgJiYgU3ltYm9sLnRvU3RyaW5nVGFnKSB7XG5cdFx0T2JqZWN0LmRlZmluZVByb3BlcnR5KGV4cG9ydHMsIFN5bWJvbC50b1N0cmluZ1RhZywgeyB2YWx1ZTogJ01vZHVsZScgfSk7XG5cdH1cblx0T2JqZWN0LmRlZmluZVByb3BlcnR5KGV4cG9ydHMsICdfX2VzTW9kdWxlJywgeyB2YWx1ZTogdHJ1ZSB9KTtcbn07IiwiIiwiLy8gc3RhcnR1cFxuLy8gTG9hZCBlbnRyeSBtb2R1bGUgYW5kIHJldHVybiBleHBvcnRzXG4vLyBUaGlzIGVudHJ5IG1vZHVsZSBpcyByZWZlcmVuY2VkIGJ5IG90aGVyIG1vZHVsZXMgc28gaXQgY2FuJ3QgYmUgaW5saW5lZFxudmFyIF9fd2VicGFja19leHBvcnRzX18gPSBfX3dlYnBhY2tfcmVxdWlyZV9fKFwiLi9ub2RlX21vZHVsZXMvc3dlZXRhbGVydDIvc3JjL3N3ZWV0YWxlcnQyLmpzXCIpO1xuIiwiIl0sIm5hbWVzIjpbXSwic291cmNlUm9vdCI6IiJ9