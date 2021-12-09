import { Link, Outlet } from "react-router-dom";
import config from "../../config";

// ==============================|| MAIN LAYOUT ||============================== //
console.log(localStorage.getItem("token"));
const MainLayout = () => {
    if (localStorage.getItem("token") === null) {
        const navigate = useNavigate();
        return navigate('/login');
    }
    return (
        <>
            {/* <div id="preloader">
                <div id="status">
                    <img src={config.logopath} alt="" />
                </div>
            </div> */}
            <main>
                <div className="body-wrapper">
                    <header>
                        <div className="d-flex align-items-center justify-content-between">
                            <div className="left-col d-flex align-items-center">
                                <Link
                                    to="javascript:void(0)"
                                    className="mobile-menu-icon pe-2 d-lg-none"
                                >
                                    <img
                                        src={config.imagepath+"favicon.png"}
                                        alt=""
                                    />
                                </Link>
                                <h2 className="page-title mb-0">Dashboard</h2>
                            </div>
                            <div className="rigt-col d-flex align-items-center">
                                <div className="search">
                                    <Link
                                        to="javascript:void(0)"
                                        className="search-icon"
                                    >
                                        <img
                                            src={config.imagepath+"search.png"}
                                            alt=""
                                        />
                                    </Link>
                                    <div className="search-wrapper">
                                        <form action="">
                                            <div className="input-group">
                                                <span className="input-group-text">
                                                    <i className="far fa-search"></i>
                                                </span>
                                                <input
                                                    type="text"
                                                    className="search-input rounded-1 form-control"
                                                    placeholder="Search Clients"
                                                />
                                                <Link
                                                    to="javascript:void(0)"
                                                    className="close"
                                                >
                                                    <i className="fal fa-times"></i>
                                                </Link>
                                            </div>
                                            <div className="search-result dropdown-box">
                                                <ul className="p-0 m-0 list-unstyled">
                                                    <li>
                                                        <Link
                                                            to="#"
                                                            className="d-flex"
                                                        >
                                                            <div className="user-initial me-2">
                                                                js
                                                            </div>
                                                            <div className="user-id">
                                                                <span className="user-name">
                                                                    Jo Smith
                                                                </span>
                                                                <span className="user-id">
                                                                    jo.smith@gmail.com
                                                                </span>
                                                            </div>
                                                        </Link>
                                                    </li>
                                                    <li>
                                                        <Link
                                                            to="#"
                                                            className="d-flex"
                                                        >
                                                            <div className="user-initial me-2">
                                                                js
                                                            </div>
                                                            <div className="user-id">
                                                                <span className="user-name">
                                                                    Jo Smith
                                                                </span>
                                                                <span className="user-id">
                                                                    jo.smith@gmail.com
                                                                </span>
                                                            </div>
                                                        </Link>
                                                    </li>
                                                    <li>
                                                        <Link
                                                            to="#"
                                                            className="d-flex"
                                                        >
                                                            <div className="user-initial me-2">
                                                                js
                                                            </div>
                                                            <div className="user-id">
                                                                <span className="user-name">
                                                                    Jo Smith
                                                                </span>
                                                                <span className="user-id">
                                                                    jo.smith@gmail.com
                                                                </span>
                                                            </div>
                                                        </Link>
                                                    </li>
                                                </ul>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <Link to="" className="ms-lg-4 ms-2">
                                    <img src={config.imagepath+"bell.png"} alt="" />
                                </Link>
                                <Link to="" className="ms-lg-4 ms-2">
                                    <img
                                        src={config.imagepath+"setting-icon.png"}
                                        alt=""
                                    />
                                </Link>
                                <Link
                                    to="#"
                                    className="position-relative user-profile-icon ms-lg-4 ms-2"
                                >
                                    <img
                                        src={config.imagepath+"Avatar.png"}
                                        alt=""
                                    />
                                    <span className="user-status online"></span>
                                </Link>
                            </div>
                        </div>
                    </header>
                    <aside className="sidenav-bar">
                        <div className="sidenav-logo py-4 text-center">
                            <Link to="../dashboard.html">
                                <img
                                    src={config.imagepath+"logo-small.png"}
                                    alt=""
                                />
                            </Link>
                        </div>
                        <div className="sidemenu">
                            <ul className="list-unstyled p-0 m-0 text-center">
                                <li>
                                    <Link
                                        to="dashboard.html"
                                        className="active"
                                        data-bs-toggle="tooltip"
                                        data-bs-placement="right"
                                        title="Dashboard"
                                    >
                                        <span className="icon">
                                            <img
                                                src={config.imagepath+"dashboard.png"}
                                                alt=""
                                            />
                                        </span>
                                        <span className="d-lg-none ps-3">
                                            Dashboard
                                        </span>
                                    </Link>
                                </li>
                                <li>
                                    <Link
                                        to="calendar.html"
                                        data-bs-toggle="tooltip"
                                        data-bs-placement="right"
                                        title="Calendar"
                                    >
                                        <span className="icon">
                                            <img
                                                src={config.imagepath+"caleder.png"}
                                                alt=""
                                            />
                                        </span>
                                        <span className="d-lg-none ps-3">
                                            Calendar
                                        </span>
                                    </Link>
                                </li>
                                <li>
                                    <Link
                                        to="sales.html"
                                        data-bs-toggle="tooltip"
                                        data-bs-placement="right"
                                        title="Sales"
                                    >
                                        <span className="icon">
                                            <img
                                                src={config.imagepath+"sales.png"}
                                                alt=""
                                            />
                                        </span>
                                        <span className="d-lg-none ps-3">
                                            Sales
                                        </span>
                                    </Link>
                                </li>
                                <li>
                                    <Link
                                        to="vouchers.html"
                                        data-bs-toggle="tooltip"
                                        data-bs-placement="right"
                                        title="Vouchers"
                                    >
                                        <span className="icon">
                                            <img
                                                src={config.imagepath+"Vouchers.png"}
                                                alt=""
                                            />
                                        </span>
                                        <span className="d-lg-none ps-3">
                                            Vouchers
                                        </span>
                                    </Link>
                                </li>
                                <li>
                                    <Link
                                        to="#"
                                        data-bs-toggle="tooltip"
                                        data-bs-placement="right"
                                        title="Subscriptions"
                                    >
                                        <span className="icon">
                                            <img
                                                src={config.imagepath+"refresh.png"}
                                                alt=""
                                            />
                                        </span>
                                        <span className="d-lg-none ps-3">
                                            Subscriptions
                                        </span>
                                    </Link>
                                </li>
                                <li>
                                    <Link
                                        to="client.html"
                                        data-bs-toggle="tooltip"
                                        data-bs-placement="right"
                                        title="Clients"
                                    >
                                        <span className="icon">
                                            <img
                                                src={config.imagepath+"dashboard.png"}
                                                alt=""
                                            />
                                        </span>
                                        <span className="d-lg-none ps-3">
                                            Clients
                                        </span>
                                    </Link>
                                </li>
                                <li>
                                    <Link
                                        to="staff.html"
                                        data-bs-toggle="tooltip"
                                        data-bs-placement="right"
                                        title="Staff"
                                    >
                                        <span className="icon">
                                            <img
                                                src={config.imagepath+"user.png"}
                                                alt=""
                                            />
                                        </span>
                                        <span className="d-lg-none ps-3">
                                            Staff
                                        </span>
                                    </Link>
                                </li>
                                <li>
                                    <Link
                                        to="service.html"
                                        data-bs-toggle="tooltip"
                                        data-bs-placement="right"
                                        title="Services"
                                    >
                                        <span className="icon">
                                            <img
                                                src={config.imagepath+"Services.png"}
                                                alt=""
                                            />
                                        </span>
                                        <span className="d-lg-none ps-3">
                                            Services
                                        </span>
                                    </Link>
                                </li>
                                <li>
                                    <Link
                                        to="products.html"
                                        data-bs-toggle="tooltip"
                                        data-bs-placement="right"
                                        title="Products"
                                    >
                                        <span className="icon">
                                            <img
                                                src={config.imagepath+"product.png"}
                                                alt=""
                                            />
                                        </span>
                                        <span className="d-lg-none ps-3">
                                            Products
                                        </span>
                                    </Link>
                                </li>
                                <li>
                                    <Link
                                        to="#"
                                        data-bs-toggle="tooltip"
                                        data-bs-placement="right"
                                        title="Reports"
                                    >
                                        <span className="icon">
                                            <img
                                                src={config.imagepath+"Reports.png"}
                                                alt=""
                                            />
                                        </span>
                                        <span className="d-lg-none ps-3">
                                            Reports
                                        </span>
                                    </Link>
                                </li>
                                <li>
                                    <Link
                                        to="#"
                                        data-bs-toggle="tooltip"
                                        data-bs-placement="right"
                                        title="Marketing"
                                    >
                                        <span className="icon">
                                            <img
                                                src={config.imagepath+"Marketing.png"}
                                                alt=""
                                            />
                                        </span>
                                        <span className="d-lg-none ps-3">
                                            Marketing
                                        </span>
                                    </Link>
                                </li>
                                <li>
                                    <Link
                                        to=""
                                        data-bs-toggle="tooltip"
                                        data-bs-placement="right"
                                        title="Account Setup"
                                    >
                                        <span className="icon">
                                            {" "}
                                            <img
                                                src={config.imagepath+"setting.png"}
                                                alt=""
                                            />
                                        </span>
                                        <span className="d-lg-none ps-3">
                                            Account Setup
                                        </span>
                                    </Link>
                                </li>
                            </ul>
                        </div>
                    </aside>
                    <div className="page-content">
                        <Outlet />
                    </div>
                </div>
            </main>
        </>
    );
};

export default MainLayout;
