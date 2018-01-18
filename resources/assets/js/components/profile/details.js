import React from 'react';
import PropTypes from "prop-types";
import { connect } from 'react-redux';
import {Link} from "react-router-dom";
import {bindActionCreators} from "redux";

import classNames from  'classnames';

import app from "../../site-config/app"
import urls from "../../site-tools/urls";
import Keys from "../../site-tools/keys";
import icons from "../../site-tools/icons";
import validate from "../../site-tools/validator";
import InputField from '../common/input-field';

import flashMessage from '../../site-actions/messege';
import ProfileRequest from '../../site-actions/transfer';
import fetchAuthRequest from '../../site-actions/auth';
import {map} from "lodash/collection";

export class UserProfileDetails extends React.Component {

  constructor(props) {
    super(props);
    this.state = {
      query: '',
      apiKey: '',
      action: '',
      errors: {},
      name: '',
      email: '',
      phone: '',
      address: '',
      isLoading: false,
      invalid: false,
      nextTab: false,
      countryCode: '',
      buttonText: 'Next Page',
      passWordState: 'Next Page',
      validator: "accountSetting",
    };
    // this.onSubmit = this.onSubmit.bind(this);
    this.onChange = this.onChange.bind(this);
  };

  onChange(e) {
    this.setState({ [e.target.name]: e.target.value });
  }

  setStates(name, value){
    this.setState({ name: value });
  }

  isValid() {
    const { errors, isValid } = validate(this.state);

    if (!isValid) {
      this.setState({ errors });
    }

    return isValid;
  }

  componentDidMount(){
    this.setButtonText(this.props.auth);
  }

  setButtonText(auth){
    let text = "De-Activate";
    if(auth.user.hasSecurity) {
      text = "Activate"
    }
    this.setStates(this.buttonText, text)
  }

  componentWillMount() {
    // this.initializer();
    // this.loadAuthUser();
  }

  initializer() {
    this.setState({
      query: name,
      action: "auth",
      apiKey: Keys.apiKey
    });
    let state = this.state;
    this.props.fetchAuthRequest(state);
  }

  loadAuthUser(){
    let state = this.state;
    let user = this.props.auth;
    this.setStates(action, "user");
    if (user.isAuth){
      this.props.fetchAuthRequest(state);
    }else {
      this.context.router.push('/login');
    }
  }

  render() {
    let user  = this.props.auth;
    const { buttonText} = this.state;
    const {errors, name, phone, email, address} = this.state;

    // const countriesCode = map(countryCodes, (key, code) =>
    //   <option key={key} value={code}>{code}</option>
    // );

    let userId, userName, userEmail, userPhoneNumber, userBtcAccAddress= '';

    if (user.isAuth) {
      user = this.props.auth.user;
      userId = user.id;
      userName = user.name;
      userEmail = user.email;
      userPhoneNumber = user.phone_number;
      userBtcAccAddress = user.btc_account.address;
    }


    let passwordState = (
      <div className="form-group form-group-default">
        <label>Withdrawal Password</label>
        <input type="text" className="form-control withdraw" name="withdrawal_password" placeholder="Your Secondary password." />
      </div>
    );

    if(user.password != null){
      passwordState = (
        <div>
          <button className="btn btn-cons btn-danger remove-pass">
            Remove Password
          </button>
        </div>
      );
    }
    const profileForm = (
      <form className="form-horizontal" onSubmit={this.onSubmit}>
        <ul className="tabs" data-init-reponsive-tabs="dropdownfx">
          <li className="tab">
            <a href="#" className="active" data-toggle="tab" data-target="#slide1">
              <span><big>Personal Information</big></span>
            </a>
          </li>
          <li className="tab">
            <a href="#" data-toggle="tab" data-target="#slide2">
              <span><big>Account Details</big></span>
            </a>
          </li>
        </ul>

        <div className="tab-content">
          <div className="tab-pane slide-left active" id="slide1">
            {/*{{ csrf_field() }}*/}
            <div className="row">
              <div className="col-md-12 ">
                <div className="row">
                  <div className="col-md-12">
                    <div className={classNames("form-group", {'has-error': errors.name})}>
                      <InputField
                        type="text"
                        field="name"
                        value={name}
                        label="Full Name"
                        required='required'
                        error={errors.name}
                        onChange={this.onChange}
                        readonly={userName !== ''}
                      />
                    </div>
                  </div>
                </div>

                <div className="row">
                  <div className="col-md-12">
                    <div className={classNames("form-group", {'has-error': errors.email})}>
                      <InputField
                        type="email"
                        field="email"
                        value={email}
                        label="Email Address"
                        required='required'
                        error={errors.name}
                        onChange={this.onChange}
                        readonly={userEmail !== ''}
                      />
                    </div>
                  </div>
                </div>
                <div className="row">
                  <div className="col-md-3">
                    <div className={classNames("form-group", "form-group-default", { 'has-error': errors.countryCode })}>
                      <label className="control-label">Bank Name</label>
                      <select className="form-control" name="bank_name" onChange={this.onChange} value={this.state.countryCode}>
                        <option value="" disabled>Select Your Country Code</option>
                        {/*{countriesCode}*/}
                      </select>
                      {errors.countryCode && <span className="help-block"><strong>{errors.countryCode}</strong></span>}
                    </div>
                  </div>

                  <div className="col-md-8">
                    <div className={classNames("form-group", {'has-error': errors.email})}>
                      <InputField
                        type="tel"
                        field="phone"
                        value={phone}
                        label="Phone Number"
                        required='required'
                        error={errors.phone}
                        onChange={this.onChange}
                        readonly={userPhoneNumber !== ''}
                      />
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div className="form-group">
              <div className="col-md-6 col-md-offset-4">
                <button data-toggle="tab" data-target="#slide2" type="button" className="btn btn-info">{buttonText}</button>
              </div>
            </div>
            <br />
            <br />
          </div>
          <div className="tab-pane slide-right" id="slide2">
            <div className="row">
              <div className="col-md-12 ">
                <div className="row">
                  <div className="col-lg-12">
                    <InputField
                      type="text"
                      field="address"
                      value={address}
                      label="BTC Address"
                      required='required'
                      error={errors.address}
                      onChange={this.onChange}
                      readonly={userBtcAccAddress !== ''}
                    />
                  </div>
                </div>
                <br />
                <div className="form-group">
                  <div className="col-md-6 col-md-offset-4">
                    <input type="hidden" value={`${ userId}`} name="expert" />
                    <button type="submit" className="btn btn-success btn-cons">
                      Save Details
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
    );

    const pageContent = (
      <div className="user-profile">
        <div className="container-fluid">
          <div className="row justify-content-center">
            <div className="col-sm-12 col-xl-8 ">
              <div className="card card-transparent ">
                <h2 className="flow-text padding-2 text-center">
                  Please Fill The Form Below
                </h2>
                {profileForm}
              </div>
            </div>
          </div>
        </div>
      </div>
    );
    return (
      <div>
        {pageContent}
      </div>
    );
  }

}

UserProfileDetails.propTypes = {
  flashMessage: PropTypes.func.isRequired,
  ProfileRequest: PropTypes.func.isRequired,
  fetchAuthRequest: PropTypes.func.isRequired,
};

UserProfileDetails.contextTypes = {
  router: PropTypes.object.isRequired
};

function mapStateToProps(state) {
  return {
    auth: state.auth,
    error: state.error,
    loading: state.loading,
  };
}

function mapDispatchToProps(dispatch) {
  return bindActionCreators({
    flashMessage,
    ProfileRequest,
    fetchAuthRequest,
  }, dispatch);
}

export default connect(mapStateToProps, mapDispatchToProps)(UserProfileDetails);
