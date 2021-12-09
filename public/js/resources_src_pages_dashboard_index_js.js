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
    localStorage.clear();
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
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoianMvcmVzb3VyY2VzX3NyY19wYWdlc19kYXNoYm9hcmRfaW5kZXhfanMuanMiLCJtYXBwaW5ncyI6Ijs7Ozs7Ozs7Ozs7Ozs7Ozs7O0FBQUE7QUFDQTtBQUNBO0FBQ0E7Ozs7O0FBRUEsSUFBTVEsU0FBUyxHQUFHLFNBQVpBLFNBQVksR0FBTTtBQUNwQixNQUFNQyxRQUFRLEdBQUdKLDZEQUFXLEVBQTVCO0FBQ0EsTUFBTUssUUFBUSxHQUFHTix3REFBVyxFQUE1Qjs7QUFDQSxxQkFBZ0NELHdEQUFXLENBQUNHLGlFQUFELENBQTNDO0FBQUEsTUFBUUssVUFBUixnQkFBUUEsVUFBUjtBQUFBLE1BQW9CQyxPQUFwQixnQkFBb0JBLE9BQXBCOztBQUNBVixFQUFBQSxnREFBUyxDQUFDLFlBQU0sQ0FDWjtBQUNILEdBRlEsRUFFTixFQUZNLENBQVQ7O0FBSUEsc0JBQTRCQyx3REFBVyxDQUFDRyxpRUFBRCxDQUF2QztBQUFBLE1BQVFPLFFBQVIsaUJBQVFBLFFBQVI7QUFBQSxNQUFrQkMsS0FBbEIsaUJBQWtCQSxLQUFsQjs7QUFFQVosRUFBQUEsZ0RBQVMsQ0FBQyxZQUFNO0FBQ1osUUFBSVUsT0FBSixFQUFhO0FBQ1RGLE1BQUFBLFFBQVEsQ0FBQ0gsbUVBQVUsRUFBWCxDQUFSO0FBQ0FFLE1BQUFBLFFBQVEsQ0FBQyxRQUFELENBQVI7QUFDSDtBQUNKLEdBTFEsRUFLTixDQUFDRyxPQUFELENBTE0sQ0FBVDs7QUFPQSxNQUFNRyxRQUFRLEdBQUcsU0FBWEEsUUFBVyxHQUFNO0FBQ25CQyxJQUFBQSxZQUFZLENBQUNDLEtBQWI7QUFDQVIsSUFBQUEsUUFBUSxDQUFDLFFBQUQsQ0FBUjtBQUNILEdBSEQ7O0FBSUEsc0JBQ0k7QUFBQSwyQkFDSTtBQUFLLGVBQVMsRUFBQyxtQkFBZjtBQUFBLGdCQUNLRSxVQUFVLGdCQUNQLHVEQUFDLE1BQUQ7QUFDSSxZQUFJLEVBQUMsTUFEVDtBQUVJLGFBQUssRUFBQyxTQUZWO0FBR0ksY0FBTSxFQUFFLEdBSFo7QUFJSSxhQUFLLEVBQUU7QUFKWCxRQURPLGdCQVFQLHdEQUFDLDJDQUFEO0FBQUEsZ0NBQ0k7QUFBSyxtQkFBUyxFQUFDLG1CQUFmO0FBQUEsbURBQ2lCO0FBQUEsc0JBQUtFO0FBQUwsWUFEakI7QUFBQSxVQURKLGVBS0k7QUFDSSxpQkFBTyxFQUFFRSxRQURiO0FBRUksbUJBQVMsRUFBQyxvRUFGZDtBQUFBO0FBQUEsVUFMSjtBQUFBO0FBVFI7QUFESixJQURKO0FBMkJILENBaEREOztBQWtEQSxpRUFBZVAsU0FBZiIsInNvdXJjZXMiOlsid2VicGFjazovL215LXdlYnBhY2stcHJvamVjdC8uL3Jlc291cmNlcy9zcmMvcGFnZXMvZGFzaGJvYXJkL2luZGV4LmpzIl0sInNvdXJjZXNDb250ZW50IjpbImltcG9ydCBSZWFjdCwgeyBGcmFnbWVudCwgdXNlRWZmZWN0IH0gZnJvbSBcInJlYWN0XCI7XG5pbXBvcnQgeyB1c2VTZWxlY3RvciwgdXNlRGlzcGF0Y2ggfSBmcm9tIFwicmVhY3QtcmVkdXhcIjtcbmltcG9ydCB7IHVzZU5hdmlnYXRlIH0gZnJvbSBcInJlYWN0LXJvdXRlci1kb21cIjtcbmltcG9ydCB7IHVzZXJTZWxlY3RvciwgY2xlYXJTdGF0ZSB9IGZyb20gXCIuLi8uLi9zdG9yZS9zbGljZXMvdXNlclNsaWNlXCI7XG5cbmNvbnN0IERhc2hib2FyZCA9ICgpID0+IHtcbiAgICBjb25zdCBuYXZpZ2F0ZSA9IHVzZU5hdmlnYXRlKCk7XG4gICAgY29uc3QgZGlzcGF0Y2ggPSB1c2VEaXNwYXRjaCgpO1xuICAgIGNvbnN0IHsgaXNGZXRjaGluZywgaXNFcnJvciB9ID0gdXNlU2VsZWN0b3IodXNlclNlbGVjdG9yKTtcbiAgICB1c2VFZmZlY3QoKCkgPT4ge1xuICAgICAgICAvLyBkaXNwYXRjaChmZXRjaFVzZXJCeXRva2VuKHsgdG9rZW46IGxvY2FsU3RvcmFnZS5nZXRJdGVtKFwidG9rZW5cIikgfSkpO1xuICAgIH0sIFtdKTtcblxuICAgIGNvbnN0IHsgdXNlcm5hbWUsIGVtYWlsIH0gPSB1c2VTZWxlY3Rvcih1c2VyU2VsZWN0b3IpO1xuXG4gICAgdXNlRWZmZWN0KCgpID0+IHtcbiAgICAgICAgaWYgKGlzRXJyb3IpIHtcbiAgICAgICAgICAgIGRpc3BhdGNoKGNsZWFyU3RhdGUoKSk7XG4gICAgICAgICAgICBuYXZpZ2F0ZShcIi9sb2dpblwiKTtcbiAgICAgICAgfVxuICAgIH0sIFtpc0Vycm9yXSk7XG5cbiAgICBjb25zdCBvbkxvZ091dCA9ICgpID0+IHtcbiAgICAgICAgbG9jYWxTdG9yYWdlLmNsZWFyKCk7XG4gICAgICAgIG5hdmlnYXRlKFwiL2xvZ2luXCIpO1xuICAgIH07XG4gICAgcmV0dXJuIChcbiAgICAgICAgPD5cbiAgICAgICAgICAgIDxkaXYgY2xhc3NOYW1lPVwiY29udGFpbmVyIG14LWF1dG9cIj5cbiAgICAgICAgICAgICAgICB7aXNGZXRjaGluZyA/IChcbiAgICAgICAgICAgICAgICAgICAgPExvYWRlclxuICAgICAgICAgICAgICAgICAgICAgICAgdHlwZT1cIlB1ZmZcIlxuICAgICAgICAgICAgICAgICAgICAgICAgY29sb3I9XCIjMDBCRkZGXCJcbiAgICAgICAgICAgICAgICAgICAgICAgIGhlaWdodD17MTAwfVxuICAgICAgICAgICAgICAgICAgICAgICAgd2lkdGg9ezEwMH1cbiAgICAgICAgICAgICAgICAgICAgLz5cbiAgICAgICAgICAgICAgICApIDogKFxuICAgICAgICAgICAgICAgICAgICA8RnJhZ21lbnQ+XG4gICAgICAgICAgICAgICAgICAgICAgICA8ZGl2IGNsYXNzTmFtZT1cImNvbnRhaW5lciBteC1hdXRvXCI+XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgV2VsY29tZSBiYWNrIDxoMz57dXNlcm5hbWV9PC9oMz5cbiAgICAgICAgICAgICAgICAgICAgICAgIDwvZGl2PlxuXG4gICAgICAgICAgICAgICAgICAgICAgICA8YnV0dG9uXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgb25DbGljaz17b25Mb2dPdXR9XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgY2xhc3NOYW1lPVwiYmctcmVkLTUwMCBob3ZlcjpiZy1yZWQtNzAwIHRleHQtd2hpdGUgZm9udC1ib2xkIHB5LTIgcHgtNCByb3VuZGVkXCJcbiAgICAgICAgICAgICAgICAgICAgICAgID5cbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBMb2cgT3V0XG4gICAgICAgICAgICAgICAgICAgICAgICA8L2J1dHRvbj5cbiAgICAgICAgICAgICAgICAgICAgPC9GcmFnbWVudD5cbiAgICAgICAgICAgICAgICApfVxuICAgICAgICAgICAgPC9kaXY+XG4gICAgICAgIDwvPlxuICAgICk7XG59O1xuXG5leHBvcnQgZGVmYXVsdCBEYXNoYm9hcmQ7XG4iXSwibmFtZXMiOlsiUmVhY3QiLCJGcmFnbWVudCIsInVzZUVmZmVjdCIsInVzZVNlbGVjdG9yIiwidXNlRGlzcGF0Y2giLCJ1c2VOYXZpZ2F0ZSIsInVzZXJTZWxlY3RvciIsImNsZWFyU3RhdGUiLCJEYXNoYm9hcmQiLCJuYXZpZ2F0ZSIsImRpc3BhdGNoIiwiaXNGZXRjaGluZyIsImlzRXJyb3IiLCJ1c2VybmFtZSIsImVtYWlsIiwib25Mb2dPdXQiLCJsb2NhbFN0b3JhZ2UiLCJjbGVhciJdLCJzb3VyY2VSb290IjoiIn0=