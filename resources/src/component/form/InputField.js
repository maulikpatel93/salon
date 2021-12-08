import React from "react";
import { useField } from "formik";

const InputField = ({ label, ...props }) => {
    const [field, meta] = useField(props);
    return (
        <>
            <label htmlFor={props.id}>{label}</label>
            <input {...field} {...props} />
            {meta.touched && meta.error ? (
                <div className="invalid-feedback">{meta.error}</div>
            ) : null}
        </>
    );
};

export default InputField;
