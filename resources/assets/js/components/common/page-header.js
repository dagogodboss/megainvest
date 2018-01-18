import React from 'react';
import PropTypes from "prop-types";
import { connect } from 'react-redux';
import {Link} from "react-router-dom";
import {bindActionCreators} from "redux";

import Logout from "./logout-file"
import RightModal from "./right-modal";

import app from "../../site-config/app"
import urls from "../../site-tools/urls";
import Keys from "../../site-tools/keys";
import icons from "../../site-tools/icons";
import validate from "../../site-tools/validator";

import flashMessage from '../../site-actions/messege';
import authRequest from '../../site-actions/auth';

export class pageHeader extends React.Component {

  constructor(props) {
    super(props);
    this.state = {
      query: '',
      apiKey: '',
      action: '',
      errors: {},
      isLoading: false,
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
    this.props.authRequest(state);
  }

  loadAuthUser(){
    let state = this.state;
    let user = this.props.auth;
    this.setStates(action, "user");
    if (user.isAuth){
      this.props.authRequest(state);
    }else {
      this.context.router.push('/login');
    }
  }

  render() {
    let user  = this.props.auth;
    const { buttonText} = this.state;
    let userStage = '';
    let userStyle = {};
    let changeStage = "";
    let userFirstName, userLastName = "loading...";

    if (user.isAuth) {
      user = this.props.auth.user;
      userStage = user.stage;
      userLastName = user.first_name;
      userFirstName = user.first_name;

      if (userStage === "how-it-work"){
        changeStage = "change-stage";
        userStyle = {color: 'red !important'};
      }
    }

    const pageContent = (
      <div className="header ">
        <a href="#" className="btn-link toggle-sidebar hidden-lg-up pg pg-menu" data-toggle="sidebar"></a>
        <div className="">
          <div className="brand inline">
            <big>{app.name}</big>
          </div>
          <a href="#" className="btn btn-link text-primary m-l-20 hidden-md-down"><big>{app.name}</big></a>
        </div>
        <div className="d-flex align-items-center">
          <div className="pull-left p-r-10 fs-14 font-heading hidden-md-down m-l-20">
            <span className="semi-bold">{userFirstName}</span>
            <span className="text-master">{userLastName}</span>
          </div>
          <div className="dropdown pull-right hidden-md-down">
            <button className="profile-dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span className="thumbnail-wrapper d32 circular inline">
                <img src="assets/img/profiles/avatar.jpg" alt="" width="32" height="32" />
              </span>
            </button>
            <div className="dropdown-menu dropdown-menu-right profile-dropdown" role="menu">
              <Link to="/logout'" className="clearfix bg-master-dark dropdown-item">
              <span className="pull-left">Logout</span>
                <span className="pull-right"><i className="pg-power"></i></span>
              </Link>
            </div>
          </div>

          <a href="#" className={"header-icon pg pg-alt_menu btn-link m-l-10 sm-no-margin" + changeStage}  data-target="#modalSlideLeft"  data-toggle="modal"
             style={userStyle} ></a>
        </div>
        <RightModal user={{stage:userStage}}/>
      </div>
    );
    return (
      <div>
        {pageContent}
      </div>
    );
  }

}

pageHeader.propTypes = {
  authRequest: PropTypes.func.isRequired,
  flashMessage: PropTypes.func.isRequired,
};

pageHeader.contextTypes = {
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
    authRequest,
    flashMessage,
  }, dispatch);
}

export default connect(mapStateToProps, mapDispatchToProps)(pageHeader);

