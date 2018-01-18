import React from 'react';
import PropTypes from "prop-types";
import { connect } from 'react-redux';
import {Link} from "react-router-dom";
import {bindActionCreators} from "redux";

import app from "../../site-config/app"
import urls from "../../site-tools/urls";
import Keys from "../../site-tools/keys";
import icons from "../../site-tools/icons";
import validate from "../../site-tools/validator";

import flashMessage from '../../site-actions/messege';
import ProfileRequest from '../../site-actions/transfer';
import fetchAuthRequest from '../../site-actions/auth';

export class UserProfile extends React.Component {

  constructor(props) {
    super(props);
    this.state = {
      query: '',
      apiKey: '',
      action: '',
      errors: {},
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
    let userName, userCreatedAt, userCountryCode = "loading...";
    let userEmail, userPhoneNumber, userBtcAccAddress, userBtcAccBalance = "loading...";

    let passwordState = (
      <div className="form-group form-group-default">
        <label>Withdrawal Password</label>
        <input type="text" className="form-control withdraw" name="withdrawal_password" placeholder="Your Secondary password." />
      </div>
    );


    if (user.isAuth) {
      user = this.props.auth.user;
      userName = user.name;
      userEmail = user.email;
      userCreatedAt = user.created_at;
      userPhoneNumber = user.phone_number;
      userCountryCode = user.country.code;
      userBtcAccAddress = user.btc_account.address;
      userBtcAccBalance = user.btc_account.balance;

      if(user.password != null){
        passwordState = (
          <div>
            <button className="btn btn-cons btn-danger remove-pass">
              Remove Password
            </button>
          </div>
        );
      }
    }

    const pageContent = (
       <div className="container-fluid p-t-30 p-b-30 ">
          <div className="row">
            <div className="col-lg-4">
              <div className="container-xs-height">
                <div className="row-xs-height">
                  <div className="social-user-profile col-xs-height text-center col-top">
                    <div className="thumbnail-wrapper d48">
                      <img alt="Avatar" style={{width: 100}} data-src-retina="assets/img/profiles/avatar_small2x.png" data-src="assets/img/profiles/avatar.png" src="assets/img/profiles/avatar.png" />
                    </div>
                  </div>
                  <div className="col-xs-height p-l-20">
                    <h3 className="no-margin p-b-5"> {userName} </h3>
                    <p className="no-margin fs-16">
                      You Joined on {userCreatedAt}
                    </p>
                    <p className="hint-text m-t-5 small">
                      {userCountryCode} | Account
                      <i className="fa fa-check-circle text-success fs-16 m-t-10"></i> Verified
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div className="col-lg-8">
              <div className="col-md-7 col-sm-12 col-xl-8 m-b-5 pull-right bg-master-darkest  no-padding b-a b-grey text-white">
                <big className="p-l-15">{app.name} Bitcoin Account</big>
                <div className="bg-white m-t-25 p-t-5 p-l-15 p-b-5 p-r-15 text-master">
                  <big>
                    <small>{ userBtcAccAddress }</small>
                    <small className="pull-right">{ userBtcAccBalance }</small>
                  </big>
                  <div className="clearfix"></div>
                </div>
              </div>
              <div className="col-md-7 col-sm-12 col-xl-8 m-b-5 pull-right bg-master no-padding b-a b-grey text-white">
                <big className="p-l-15"> { app.name } Lending Account </big>
                <div className="bg-white m-t-25 p-t-5 p-l-15 p-b-5 p-r-15 text-master">
                  <big>
                    <small>{ userBtcAccAddress }</small>
                    <small className="pull-right">{ userBtcAccBalance }</small>
                  </big>
                  <div className="clearfix"></div>
                </div>
              </div>
              <div className="col-md-7 col-sm-12 col-xl-8 m-b-5 pull-right bg-menu-light no-padding b-a b-grey text-white">
                <big className="p-l-15"> { userName} Bitcoin Address </big>
                <div className="bg-white m-t-25 p-t-5 p-l-15 p-b-5 p-r-15 text-master">
                  <big>
                    <small>{ userBtcAccAddress }</small>
                    <small className="pull-right">{ userBtcAccBalance }</small>
                  </big>
                  <div className="clearfix"></div>
                </div>
              </div>
              <div className="col-md-7 col-sm-12 col-xl-8 m-b-5 pull-right bg-master-dark no-padding b-a b-grey text-white">
                <big className="p-l-15">
                  { userName } USD Account
                </big>
                <div className="bg-white m-t-25 p-t-5 p-l-15 p-b-5 p-r-15 text-master">
                  <big>
                    <small>{ userBtcAccAddress }</small>
                    <small className="pull-right">{ userBtcAccBalance }</small>
                  </big>
                  <div className="clearfix"></div>
                </div>
              </div>
            </div>
          </div>
          <div className="row justify-content-center">
            <div className="col-md-8">
              <div className="card card-default">
                <div className="card-block text-center">
                  <div className="thumbnail-wrapper d48" style={{width: 300, height: 300, borderRadius: 100, border:'1 dashed #b3b3b3',justifyContent: 'center !important'}}>
                    <img alt="Avatar" style={{width: 100, margin:'auto 0'}} data-src-retina="assets/img/profiles/avatar_small2x.png" data-src="assets/img/profiles/avatar.png" src="assets/img/profiles/avatar.png" />
                  </div>
                  <h2 className="text-master m-t-25 m-b-15">
                    {userName}
                  </h2>
                  <h5 className="text-master m-t-25 m-b-15">
                    {userEmail}
                  </h5>
                  <h2 className="text-master m-t-25 m-b-15">{userCountryCode}{userPhoneNumber}</h2>
                </div>
                <div className="card-footer">
                  Profile Details can not be Edited.
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

UserProfile.propTypes = {
  flashMessage: PropTypes.func.isRequired,
  ProfileRequest: PropTypes.func.isRequired,
  fetchAuthRequest: PropTypes.func.isRequired,
};

UserProfile.contextTypes = {
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

export default connect(mapStateToProps, mapDispatchToProps)(UserProfile);
