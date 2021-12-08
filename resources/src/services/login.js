import config from "../config";
import { createAsyncThunk } from "@reduxjs/toolkit";
const loginUser = createAsyncThunk(
    "login",
    async ({ email, password, action='login' }, thunkAPI) => {
        try {
            const response = await fetch(
                config.API_URL+'login',
                {
                    method: "POST",
                    headers: {
                        Accept: "application/json",
                        "Content-Type": "application/json",
                    },
                    body: JSON.stringify({
                        email,
                        password,
                        action,
                    }),
                }
            );
            let apiresult = await response.json();
            if (apiresult.status === 200) {
                localStorage.setItem("token", apiresult.data.token);
                localStorage.setItem("auth_key", apiresult.data.auth_key);
                localStorage.setItem("id", apiresult.data.id);
                return apiresult;
            } else {
                return thunkAPI.rejectWithValue(apiresult);
            }
        } catch (e) {
            console.log("Error", e.response.apiresult);
            thunkAPI.rejectWithValue(e.response.apiresult);
        }
    }
);

export default loginUser;