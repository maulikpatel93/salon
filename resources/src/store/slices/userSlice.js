import { createSlice } from '@reduxjs/toolkit';
import loginUser from '../../services/login'

export const userSlice = createSlice({
      name: 'user',
      initialState: {
        email: '',
        isFetching: false,
        isSuccess: false,
        isError: false,
        errorMessage: '',
      },
      reducers: {
        clearState: (state) => {
          state.isError = false;
          state.isSuccess = false;
          state.isFetching = false;
          return state;
        },
      },
      extraReducers: {
        [loginUser.fulfilled]: (state, { payload }) => {
          state.email = payload.email;
          state.isFetching = false;
          state.isSuccess = true;
          return state;
        },
        [loginUser.rejected]: (state, { payload }) => {
          console.log('payload', payload);
          state.isFetching = false;
          state.isError = true;
          state.errorMessage = payload.message;
        },
      },
    });
    
    export const { clearState } = userSlice.actions;
    
    export const userSelector = (state) => state.user;