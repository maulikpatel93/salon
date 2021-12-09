import { Outlet, useNavigate } from "react-router-dom";
// ==============================|| MINIMAL LAYOUT ||============================== //

const MinimalLayout = () => {
    if ("token" in localStorage) {
        const navigate = useNavigate();
        return navigate("/dashboard");
    }
    return (
        <>
            <Outlet />
        </>
    );
};

export default MinimalLayout;
