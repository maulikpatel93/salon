import { Link } from 'react-router-dom';
// import config from '../config';

const Login = () => {
      return (
          <>
            <section className="vh-100">
                  <div className="container py-5 h-custom">
                        <div className="row d-flex justify-content-center align-items-center h-100">
                        <div className="col-md-9 col-lg-6 col-xl-5">
                              <img src="" className="img-fluid" alt="Sample image" />
                        </div>
                        <div className="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                              <form>
                                    <div className="d-flex flex-row align-items-center justify-content-center mb-5">
                                          <h1 className="fw-normal mb-0 me-3">Sign In</h1>
                                    </div>
                                    <div className="form-floating mb-4">
                                          <input type="email" className="form-control" id="floatingInput" placeholder="name@example.com" />
                                          <label htmlFor="floatingInput">Email address</label>
                                    </div>
                                    <div className="form-floating mb-4">
                                          <input type="password" className="form-control" id="floatingPassword" placeholder="Password" />
                                          <label htmlFor="floatingPassword">Password</label>
                                    </div>
                                    <div className="d-flex justify-content-between align-items-center mb-3">
                                    <div className="form-check mb-0">
                                          <input className="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
                                          <label className="form-check-label" htmlFor="form2Example3">
                                                Remember me
                                          </label>
                                    </div>
                                          <Link to="#!" className="text-body">Forgot password?</Link>
                                    </div>
                                    <div className="text-center text-lg-start mt-4 pt-2">
                                          <button type="button" className="btn btn-primary btn-lg" >Login</button>
                                    </div>

                              </form>
                        </div>
                        </div>
                  </div>
            </section>
          </>
      );
  };
  
  export default Login;