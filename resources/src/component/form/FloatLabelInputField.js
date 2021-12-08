import React from 'react';
import { useField } from 'formik';

const FloatLabelInputField = ({ label, ...props }) => {
    const [field, meta] = useField(props);
    return (
        <>
            <div className="form-floating mb-4">
                <input {...field} {...props} />
                <label htmlFor={props.id}>{label}</label>
                  {meta.touched && meta.error ? (
                  <div className="invalid-feedback">{meta.error}</div>
                  ) : null}
            </div>
        </>
    );
};


export default FloatLabelInputField
