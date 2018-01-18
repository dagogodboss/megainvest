import React from 'react';
import PropTypes from 'prop-types';
import { connect } from 'react-redux';
import {Link} from "react-router-dom";
import {bindActionCreators} from 'redux'

import app from "../../site-config/app"
import Keys from "../../site-tools/keys";

import homeRequest from "../../site-actions/home";


export class IndexPage extends React.Component {

  constructor(props) {
    super(props);
    this.state = {
      query: '',
      apiKey: '',
      action: '',
      errors: {},
    }
  }

  componentWillMount() {
    // this.initializer();
    // this.loadAuthUser();
  }

  initializer() {
    this.setState({
      query: name,
      action: "home",
      apiKey: Keys.apiKey
    });
    let state = this.state;
    this.props.homeRequest(state);
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
    return (
      <div>
        <h1> Hello, world!.. </h1><br />
        Wao!!! The index page...
        <Link to='/dashboard'>Go to dashboard</Link>
      </div>
    );
  }
}

IndexPage.propTypes = {
  homeRequest: PropTypes.func.isRequired,
};


function mapStateToProps(state) {
  return {

  };
}

function mapDispatchToProps(dispatch) {
  return bindActionCreators({
    homeRequest
  }, dispatch);
}

export default connect(mapStateToProps,mapDispatchToProps)(IndexPage);
