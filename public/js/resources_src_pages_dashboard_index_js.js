"use strict";
(self["webpackChunkmy_webpack_project"] = self["webpackChunkmy_webpack_project"] || []).push([["resources_src_pages_dashboard_index_js"],{

/***/ "./resources/src/pages/dashboard/index.js":
/*!************************************************!*\
  !*** ./resources/src/pages/dashboard/index.js ***!
  \************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "./node_modules/react/index.js");
/* harmony import */ var react_redux__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! react-redux */ "./node_modules/react-redux/es/index.js");
/* harmony import */ var react_router_dom__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! react-router-dom */ "./node_modules/react-router/index.js");
/* harmony import */ var _store_slices_userSlice__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../store/slices/userSlice */ "./resources/src/store/slices/userSlice.js");
/* harmony import */ var react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! react/jsx-runtime */ "./node_modules/react/jsx-runtime.js");








var Dashboard = function Dashboard() {
  var navigate = (0,react_router_dom__WEBPACK_IMPORTED_MODULE_4__.useNavigate)();
  var dispatch = (0,react_redux__WEBPACK_IMPORTED_MODULE_1__.useDispatch)();

  var _useSelector = (0,react_redux__WEBPACK_IMPORTED_MODULE_1__.useSelector)(_store_slices_userSlice__WEBPACK_IMPORTED_MODULE_2__.userSelector),
      isFetching = _useSelector.isFetching,
      isError = _useSelector.isError;

  (0,react__WEBPACK_IMPORTED_MODULE_0__.useEffect)(function () {// dispatch(fetchUserBytoken({ token: localStorage.getItem("token") }));
  }, []);

  var _useSelector2 = (0,react_redux__WEBPACK_IMPORTED_MODULE_1__.useSelector)(_store_slices_userSlice__WEBPACK_IMPORTED_MODULE_2__.userSelector),
      username = _useSelector2.username,
      email = _useSelector2.email;

  (0,react__WEBPACK_IMPORTED_MODULE_0__.useEffect)(function () {
    if (isError) {
      dispatch((0,_store_slices_userSlice__WEBPACK_IMPORTED_MODULE_2__.clearState)());
      navigate("/login");
    }
  }, [isError]);

  var onLogOut = function onLogOut() {
    localStorage.removeItem("token");
    localStorage.removeItem("auth_key");
    localStorage.removeItem("id");
    navigate("/login");
  };

  return /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsx)(react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.Fragment, {
    children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsx)("div", {
      className: "container mx-auto",
      children: isFetching ? /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsx)(Loader, {
        type: "Puff",
        color: "#00BFFF",
        height: 100,
        width: 100
      }) : /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsxs)(react__WEBPACK_IMPORTED_MODULE_0__.Fragment, {
        children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsxs)("div", {
          className: "container mx-auto",
          children: ["Welcome back ", /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsx)("h3", {
            children: username
          })]
        }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsx)("button", {
          onClick: onLogOut,
          className: "bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded",
          children: "Log Out"
        })]
      })
    })
  });
};

/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (Dashboard);

/***/ })

}]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoianMvcmVzb3VyY2VzX3NyY19wYWdlc19kYXNoYm9hcmRfaW5kZXhfanMuanMiLCJtYXBwaW5ncyI6Ijs7Ozs7Ozs7Ozs7Ozs7Ozs7O0FBQUE7QUFDQTtBQUNBO0FBQ0E7Ozs7O0FBRUEsSUFBTVEsU0FBUyxHQUFHLFNBQVpBLFNBQVksR0FBTTtBQUNwQixNQUFNQyxRQUFRLEdBQUdKLDZEQUFXLEVBQTVCO0FBQ0EsTUFBTUssUUFBUSxHQUFHTix3REFBVyxFQUE1Qjs7QUFDQSxxQkFBZ0NELHdEQUFXLENBQUNHLGlFQUFELENBQTNDO0FBQUEsTUFBUUssVUFBUixnQkFBUUEsVUFBUjtBQUFBLE1BQW9CQyxPQUFwQixnQkFBb0JBLE9BQXBCOztBQUNBVixFQUFBQSxnREFBUyxDQUFDLFlBQU0sQ0FDWjtBQUNILEdBRlEsRUFFTixFQUZNLENBQVQ7O0FBSUEsc0JBQTRCQyx3REFBVyxDQUFDRyxpRUFBRCxDQUF2QztBQUFBLE1BQVFPLFFBQVIsaUJBQVFBLFFBQVI7QUFBQSxNQUFrQkMsS0FBbEIsaUJBQWtCQSxLQUFsQjs7QUFFQVosRUFBQUEsZ0RBQVMsQ0FBQyxZQUFNO0FBQ1osUUFBSVUsT0FBSixFQUFhO0FBQ1RGLE1BQUFBLFFBQVEsQ0FBQ0gsbUVBQVUsRUFBWCxDQUFSO0FBQ0FFLE1BQUFBLFFBQVEsQ0FBQyxRQUFELENBQVI7QUFDSDtBQUNKLEdBTFEsRUFLTixDQUFDRyxPQUFELENBTE0sQ0FBVDs7QUFPQSxNQUFNRyxRQUFRLEdBQUcsU0FBWEEsUUFBVyxHQUFNO0FBQ25CQyxJQUFBQSxZQUFZLENBQUNDLFVBQWIsQ0FBd0IsT0FBeEI7QUFDQUQsSUFBQUEsWUFBWSxDQUFDQyxVQUFiLENBQXdCLFVBQXhCO0FBQ0FELElBQUFBLFlBQVksQ0FBQ0MsVUFBYixDQUF3QixJQUF4QjtBQUNBUixJQUFBQSxRQUFRLENBQUMsUUFBRCxDQUFSO0FBQ0gsR0FMRDs7QUFNQSxzQkFDSTtBQUFBLDJCQUNJO0FBQUssZUFBUyxFQUFDLG1CQUFmO0FBQUEsZ0JBQ0tFLFVBQVUsZ0JBQ1AsdURBQUMsTUFBRDtBQUNJLFlBQUksRUFBQyxNQURUO0FBRUksYUFBSyxFQUFDLFNBRlY7QUFHSSxjQUFNLEVBQUUsR0FIWjtBQUlJLGFBQUssRUFBRTtBQUpYLFFBRE8sZ0JBUVAsd0RBQUMsMkNBQUQ7QUFBQSxnQ0FDSTtBQUFLLG1CQUFTLEVBQUMsbUJBQWY7QUFBQSxtREFDaUI7QUFBQSxzQkFBS0U7QUFBTCxZQURqQjtBQUFBLFVBREosZUFLSTtBQUNJLGlCQUFPLEVBQUVFLFFBRGI7QUFFSSxtQkFBUyxFQUFDLG9FQUZkO0FBQUE7QUFBQSxVQUxKO0FBQUE7QUFUUjtBQURKLElBREo7QUEyQkgsQ0FsREQ7O0FBb0RBLGlFQUFlUCxTQUFmIiwic291cmNlcyI6WyJ3ZWJwYWNrOi8vbXktd2VicGFjay1wcm9qZWN0Ly4vcmVzb3VyY2VzL3NyYy9wYWdlcy9kYXNoYm9hcmQvaW5kZXguanMiXSwic291cmNlc0NvbnRlbnQiOlsiaW1wb3J0IFJlYWN0LCB7IEZyYWdtZW50LCB1c2VFZmZlY3QgfSBmcm9tIFwicmVhY3RcIjtcbmltcG9ydCB7IHVzZVNlbGVjdG9yLCB1c2VEaXNwYXRjaCB9IGZyb20gXCJyZWFjdC1yZWR1eFwiO1xuaW1wb3J0IHsgdXNlTmF2aWdhdGUgfSBmcm9tIFwicmVhY3Qtcm91dGVyLWRvbVwiO1xuaW1wb3J0IHsgdXNlclNlbGVjdG9yLCBjbGVhclN0YXRlIH0gZnJvbSBcIi4uLy4uL3N0b3JlL3NsaWNlcy91c2VyU2xpY2VcIjtcblxuY29uc3QgRGFzaGJvYXJkID0gKCkgPT4ge1xuICAgIGNvbnN0IG5hdmlnYXRlID0gdXNlTmF2aWdhdGUoKTtcbiAgICBjb25zdCBkaXNwYXRjaCA9IHVzZURpc3BhdGNoKCk7XG4gICAgY29uc3QgeyBpc0ZldGNoaW5nLCBpc0Vycm9yIH0gPSB1c2VTZWxlY3Rvcih1c2VyU2VsZWN0b3IpO1xuICAgIHVzZUVmZmVjdCgoKSA9PiB7XG4gICAgICAgIC8vIGRpc3BhdGNoKGZldGNoVXNlckJ5dG9rZW4oeyB0b2tlbjogbG9jYWxTdG9yYWdlLmdldEl0ZW0oXCJ0b2tlblwiKSB9KSk7XG4gICAgfSwgW10pO1xuXG4gICAgY29uc3QgeyB1c2VybmFtZSwgZW1haWwgfSA9IHVzZVNlbGVjdG9yKHVzZXJTZWxlY3Rvcik7XG5cbiAgICB1c2VFZmZlY3QoKCkgPT4ge1xuICAgICAgICBpZiAoaXNFcnJvcikge1xuICAgICAgICAgICAgZGlzcGF0Y2goY2xlYXJTdGF0ZSgpKTtcbiAgICAgICAgICAgIG5hdmlnYXRlKFwiL2xvZ2luXCIpO1xuICAgICAgICB9XG4gICAgfSwgW2lzRXJyb3JdKTtcblxuICAgIGNvbnN0IG9uTG9nT3V0ID0gKCkgPT4ge1xuICAgICAgICBsb2NhbFN0b3JhZ2UucmVtb3ZlSXRlbShcInRva2VuXCIpO1xuICAgICAgICBsb2NhbFN0b3JhZ2UucmVtb3ZlSXRlbShcImF1dGhfa2V5XCIpO1xuICAgICAgICBsb2NhbFN0b3JhZ2UucmVtb3ZlSXRlbShcImlkXCIpO1xuICAgICAgICBuYXZpZ2F0ZShcIi9sb2dpblwiKTtcbiAgICB9O1xuICAgIHJldHVybiAoXG4gICAgICAgIDw+XG4gICAgICAgICAgICA8ZGl2IGNsYXNzTmFtZT1cImNvbnRhaW5lciBteC1hdXRvXCI+XG4gICAgICAgICAgICAgICAge2lzRmV0Y2hpbmcgPyAoXG4gICAgICAgICAgICAgICAgICAgIDxMb2FkZXJcbiAgICAgICAgICAgICAgICAgICAgICAgIHR5cGU9XCJQdWZmXCJcbiAgICAgICAgICAgICAgICAgICAgICAgIGNvbG9yPVwiIzAwQkZGRlwiXG4gICAgICAgICAgICAgICAgICAgICAgICBoZWlnaHQ9ezEwMH1cbiAgICAgICAgICAgICAgICAgICAgICAgIHdpZHRoPXsxMDB9XG4gICAgICAgICAgICAgICAgICAgIC8+XG4gICAgICAgICAgICAgICAgKSA6IChcbiAgICAgICAgICAgICAgICAgICAgPEZyYWdtZW50PlxuICAgICAgICAgICAgICAgICAgICAgICAgPGRpdiBjbGFzc05hbWU9XCJjb250YWluZXIgbXgtYXV0b1wiPlxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIFdlbGNvbWUgYmFjayA8aDM+e3VzZXJuYW1lfTwvaDM+XG4gICAgICAgICAgICAgICAgICAgICAgICA8L2Rpdj5cblxuICAgICAgICAgICAgICAgICAgICAgICAgPGJ1dHRvblxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIG9uQ2xpY2s9e29uTG9nT3V0fVxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIGNsYXNzTmFtZT1cImJnLXJlZC01MDAgaG92ZXI6YmctcmVkLTcwMCB0ZXh0LXdoaXRlIGZvbnQtYm9sZCBweS0yIHB4LTQgcm91bmRlZFwiXG4gICAgICAgICAgICAgICAgICAgICAgICA+XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgTG9nIE91dFxuICAgICAgICAgICAgICAgICAgICAgICAgPC9idXR0b24+XG4gICAgICAgICAgICAgICAgICAgIDwvRnJhZ21lbnQ+XG4gICAgICAgICAgICAgICAgKX1cbiAgICAgICAgICAgIDwvZGl2PlxuICAgICAgICA8Lz5cbiAgICApO1xufTtcblxuZXhwb3J0IGRlZmF1bHQgRGFzaGJvYXJkO1xuIl0sIm5hbWVzIjpbIlJlYWN0IiwiRnJhZ21lbnQiLCJ1c2VFZmZlY3QiLCJ1c2VTZWxlY3RvciIsInVzZURpc3BhdGNoIiwidXNlTmF2aWdhdGUiLCJ1c2VyU2VsZWN0b3IiLCJjbGVhclN0YXRlIiwiRGFzaGJvYXJkIiwibmF2aWdhdGUiLCJkaXNwYXRjaCIsImlzRmV0Y2hpbmciLCJpc0Vycm9yIiwidXNlcm5hbWUiLCJlbWFpbCIsIm9uTG9nT3V0IiwibG9jYWxTdG9yYWdlIiwicmVtb3ZlSXRlbSJdLCJzb3VyY2VSb290IjoiIn0=