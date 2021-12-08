import { configureStore } from '@reduxjs/toolkit';
import { combineReducers } from 'redux';
import counterReducer from './slices/counterSlice';
import { userSlice } from "./slices/userSlice";

const reducer = combineReducers({
  counter: counterReducer,
  user: userSlice.reducer,
});
export const store = configureStore({
  reducer
});