import { useRoutes } from 'react-router-dom';

// routes
import MainRoutes from './MainRoutes';
import AuthenticationRoutes from './AuthenticationRoutes';
import config from '../config';
// import { PrivateRoute } from '../helpers/PrivateRoute';


// ==============================|| ROUTING RENDER ||============================== //

export default function ThemeRoutes() {
    if(localStorage.getItem('token')){
        import ("../assets/css/style.css");
        return useRoutes([MainRoutes], config.basename);
    }else{
        return useRoutes([AuthenticationRoutes], config.basename);
    }
    // <PrivateRoute exact component={Dashboard} path="/" />
}
