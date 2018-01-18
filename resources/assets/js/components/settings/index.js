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
import settingsRequest from '../../site-actions/settings';
import fetchAuthRequest from '../../site-actions/auth';

export class Settings extends React.Component {

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

    if (!user.isAuth) {
      return (
        <div>{this.props.loading}</div>
      );
    }else {
      user = this.props.auth.user;
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
    const content = (
      <div className="card card-default">
        <div className="card-header ">
          <div className="card-title">
            <h2>
              Settings Page
            </h2>
          </div>
        </div>
        <div className="card-block">
          <div className="row margin-2">
            <div className="col-md-8">
              <h3>
                <big >
                  Activate Two way authentication
                </big>
                <p>
                  You will receive short code on your phone every time you try to login.
                </p>
              </h3>
            </div>
            <div className="col-md-4">
              <button className="auth btn btn-cons @if(LogUser()->tfa_security) dtwa btn-danger @else twa btn-complete @endif ">
                {buttonText}
              </button>
            </div>
          </div>
          <div className="row margin-2">
            <div className="col-md-8">
              <h3>
                <big >
                  Activate Withdrawal Password
                </big>
                <p>
                  You will have to provide this password whenever you want to withdraw your funds.
                </p>
              </h3>
            </div>
            <div className="col-md-4 wth-pot">
              {passwordState}
            </div>
          </div>
        </div>
      </div>
    );
    return (
      <div>
        {content}
      </div>
    );
  }
}

Settings.propTypes = {
  flashMessage: PropTypes.func.isRequired,
  settingsRequest: PropTypes.func.isRequired,
  fetchAuthRequest: PropTypes.func.isRequired,
};

Settings.contextTypes = {
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
    settingsRequest,
    fetchAuthRequest,
  }, dispatch);
}

export default connect(mapStateToProps, mapDispatchToProps)(Settings);

