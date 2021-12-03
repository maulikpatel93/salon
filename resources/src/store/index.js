import { configureStore } from '@reduxjs/toolkit';
import { combineReducers } from 'redux';
import counterReducer from './slices/counterSlice';

const reducer = combineReducers({
  counter: counterReducer,
});
export const store = configureStore({
  reducer,
});