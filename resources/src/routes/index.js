import { useRoutes } from 'react-router-dom';

// routes
import MainRoutes from './MainRoutes';
import AuthenticationRoutes from './AuthenticationRoutes';
import config from '../config';
import { PrivateRoute } from '../helpers/PrivateRoute';


// ==============================|| ROUTING RENDER ||============================== //

export default function ThemeRoutes() {
    // return useRoutes([AuthenticationRoutes], config.basename);
    if(localStorage.getItem('token')){
        return useRoutes([MainRoutes], config.basename);
    }else{
        return useRoutes([AuthenticationRoutes], config.basename);
    }
    <PrivateRoute exact component={Dashboard} path="/" />
}
