import React from 'react';
import PropTypes from "prop-types";
import isEmpty from 'lodash/isEmpty';
import classNames from 'classnames';



const FormInput = ({ field, value, label, error, type, onChange, required, onBlur, readonly }) => {
    let readOnly = '';
    let asterisk = '*';
    if (readonly) { readOnly = "readonly"; }
    if (isEmpty(required)) { asterisk = ''; }

    return (
        <div className="">
            <label className="form-control-label form-label-mod" for={"contacts4-2h-"+field}>{label}
                <span className="form-asterisk text-danger">{asterisk}</span>
            </label>
            <input
                type={type}
                name={field}
                value={value}
                onBlur={onBlur}
                onChange={onChange}
                placeholder={label}
                required={required}
                data-form-field={label}
                id={"contacts4-2h-"+field}
                className={classNames("form-control input-sm input-inverse" + readOnly)}
            />
            {/*{error && <span className="help-block text-danger">{error}</span>}*/}
            {error && <span className="help-block text-danger"><strong>{error}</strong></span>}
        </div>
    );
};

FormInput.propTypes = {
    field: PropTypes.string.isRequired,
    value: PropTypes.string.isRequired,
    label: PropTypes.string.isRequired,
    error: PropTypes.string,
    type: PropTypes.string.isRequired,
    required: PropTypes.string.isRequired,
    onChange: PropTypes.func.isRequired,
    checkPageIfExists: PropTypes.func
};

FormInput.defaultProps = {
    type: 'text'
};

export default FormInput;
