import React, { Fragment, useEffect } from "react";
import { Link, useNavigate } from "react-router-dom";
import { useSelector, useDispatch } from "react-redux";
import {
    userSelector,
    clearState,
} from "../../store/slices/userSlice";
import loginUser from '../../services/login'
import toast from "react-hot-toast";

import config from "../../config";
import { useTranslation } from "react-i18next";
import Language from "../../component/Language";
import { Formik, Form } from "formik";
import * as Yup from "yup";
import FloatLabelInputField from "../../component/form/FloatLabelInputField";
import WithTranslateFormErrors from "../../component/form/use-translate-form-errors";

const Login = () => {
    const dispatch = useDispatch();
    const navigate = useNavigate();
    const { isFetching, isSuccess, isError, errorMessage } =
        useSelector(userSelector);
    const { t } = useTranslation();
    const loginSchema = Yup.object().shape({
        email: Yup.string().label("Email").email().required(),
        password: Yup.string().min(6).max(16).label("Password").required(),
        remember_me: Yup.bool(),
    });

    useEffect(() => {
        return () => {
            dispatch(clearState());
        };
    }, []);

    useEffect(() => {
        if (isError) {
            toast.error(errorMessage);
            dispatch(clearState());
        }

        if (isSuccess) {
            dispatch(clearState());
            navigate("/dashboard");
        }
    }, [isError, isSuccess]);

    return (
        <>
            <section className="vh-100">
                <div className="container py-5 h-custom">
                    <div className="row d-flex justify-content-center align-items-center h-100">
                        <div className="col-md-9 col-lg-6 col-xl-5 text-center">
                            <img
                                src={config.logopath}
                                className="img-fluid"
                                alt="Sample image"
                            />
                        </div>
                        <div className="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                            <Formik
                                validationSchema={loginSchema}
                                initialValues={{
                                    email: "",
                                    password: "",
                                    remember_me: false,
                                }}
                                onSubmit={(values, { setSubmitting }) => {
                                    dispatch(loginUser(values));
                                    // setTimeout(() => {
                                    //     alert(JSON.stringify(values, null, 2));
                                    //     setSubmitting(false);
                                    // }, 1000);
                                }}
                            >
                                {(formik, isSubmitting) => (
                                    <WithTranslateFormErrors
                                        errors={formik.errors}
                                        touched={formik.touched}
                                        setFieldTouched={formik.setFieldTouched}
                                    >
                                        <Form>
                                            <div className="d-flex flex-row align-items-center justify-content-center mb-5">
                                                <h1 className="fw-normal mb-0 me-3">
                                                    {t("sign_in")}
                                                </h1>
                                            </div>
                                            <FloatLabelInputField
                                                name="email"
                                                type="text"
                                                placeholder=""
                                                className={
                                                    formik.touched.email &&
                                                    formik.errors.email
                                                        ? "form-control is-invalid"
                                                        : "form-control"
                                                }
                                                id="login-email"
                                                label={t("email")}
                                            />
                                            <FloatLabelInputField
                                                name="password"
                                                type="password"
                                                placeholder=""
                                                className={
                                                    formik.touched.password &&
                                                    formik.errors.password
                                                        ? "form-control is-invalid"
                                                        : "form-control"
                                                }
                                                id="login-password"
                                                autoComplete="off"
                                                label={t("password")}
                                            />
                                            <div className="d-flex justify-content-between align-items-center mb-3">
                                                <div className="form-check mb-0">
                                                    <input
                                                        className="form-check-input me-2"
                                                        type="checkbox"
                                                        value=""
                                                        id="form2Example3"
                                                    />
                                                    <label
                                                        className="form-check-label"
                                                        htmlFor="form2Example3"
                                                    >
                                                        {t("remember_me")}
                                                    </label>
                                                </div>
                                                <Link
                                                    to="#!"
                                                    className="text-body"
                                                >
                                                    {t("forgot_password?")}
                                                </Link>
                                            </div>
                                            <div className="text-center text-lg-start mt-4 pt-2">
                                                <button
                                                    type="submit"
                                                    className="btn btn-primary btn-lg"
                                                >
                                                    {t("login")}
                                                </button>
                                            </div>
                                        </Form>
                                    </WithTranslateFormErrors>
                                )}
                            </Formik>
                        </div>
                        <div className="">
                            <div className="col-12 text-center">
                                <Language />
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </>
    );
};

export default Login;
