import Validator from 'validator';
import isEmpty from 'lodash/isEmpty';

export default function validate(data) {

  switch (data.validator){
    case "userInput": return this.userInput(data);
    case "accountSetting": return this.accountSetting(data);
  }

  console.log("Validation error: Validator '" + data.validator + "' not found");
  return { errors: {}, isValid: false }
}

export function accountSetting(data) {
    let errors = {};

    if (Validator.isEmpty(data.email)) {
        errors.email = 'This field is required';
    }

    if (Validator.isEmpty(data.password)) {
        errors.password = 'This field is required';
    }

    return {
        errors,
        isValid: isEmpty(errors)
    };
}

export function userInput(data) {
  let errors = {};

  if (Validator.isEmpty(data.email)) {
    errors.email = 'This field is required';
  }

  if (Validator.isEmpty(data.password)) {
    errors.password = 'This field is required';
  }

  return {
    errors,
    isValid: isEmpty(errors)
  };
}

