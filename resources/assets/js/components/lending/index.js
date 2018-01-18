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
import lendingRequest from '../../site-actions/lending';
import fetchAuthRequest from '../../site-actions/auth';

export class Lending extends React.Component {

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
    const pageContent = (
      <div>page content</div>
    );
    return (
      <div>
        {pageContent}
      </div>
    );
  }

}

Lending.propTypes = {
  flashMessage: PropTypes.func.isRequired,
  lendingRequest: PropTypes.func.isRequired,
  fetchAuthRequest: PropTypes.func.isRequired,
};

Lending.contextTypes = {
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
    lendingRequest,
    fetchAuthRequest,
  }, dispatch);
}

export default connect(mapStateToProps, mapDispatchToProps)(Lending);

