import React from 'react';
import PropTypes from "prop-types";
import { connect } from 'react-redux';
import {Link} from "react-router-dom";
import {bindActionCreators} from "redux";

import authRequest from "../../site-actions/auth"
import flashMessage from "../../site-actions/messege";


import Logout from "./logout-file"
import FilterLink from "./filter-link";
import app from "../../site-config/app";

export class SideBar extends React.Component {

  constructor(props) {
    super(props);
    this.state = {
    };
    this.onLogOut = this.onLogOut.bind(this);
  }

  onLogOut(e) {
    e.preventDefault();
    this.props.authRequest(this.state).then(
      (res) => {
        this.props.flashMessage({
          action: 'add',
          type: 'success',
          text: 'logging out was successfully'
        });
        this.context.router.push('/');
      },
      (err) => {
      }
    );
  }
  componentWillMount() {
    // this.props.fetchDashboard();
  }

  render() {
    return (
      <div>
        <nav className="page-sidebar" data-pages="sidebar">
          <div className="sidebar-header">
            {/* <!-- <img src="assets/img/logo.png" alt="logo" className="brand" data-src="assets/img/logo.png" data-src-retina="assets/img/logo_2x.png" width="78" height="22"> --> */}
            <big className="site-name">{ app.name }</big>
          </div>
          <div className="sidebar-menu">
            <ul className="menu-items">
              <li className="m-t-30 ">
                <FilterLink filter="dashboard" className="detailed">
                  <span className="title">Dashboard</span>
                  <span className="details">notifaction</span>
                </FilterLink>
                <span className="icon-thumbnail"><i data-feather="shield"></i></span>
              </li>

              <li className="">
                <FilterLink filter="profile">
                  <span className="title">Profile</span>
                </FilterLink>
                <span className="icon-thumbnail">
                  <i data-feather="users"></i>
                </span>

              </li>
              <li className="">
                <FilterLink filter="lending">
                  <span className="title">Lending</span>
                </FilterLink>
                <span className="icon-thumbnail">
                  <i data-feather="grid"></i>
                </span>
              </li>
              <li className="">
                <FilterLink filter="exchange">
                  <span className="title">Exchange</span>
                </FilterLink>
                <span className="icon-thumbnail">
                  <i data-feather="bar-chart"></i>
                </span>
              </li>

              <li  className="">
                <FilterLink filter="transfer">
                  <span className="title">Transfer</span>
                </FilterLink>
                <span className="icon-thumbnail">
                  <i data-feather="life-buoy"></i>
                </span>
              </li>

              <li className="">
                <FilterLink filter="wallets">
                  <span className="title">Wallets</span>
                </FilterLink>
                <span className="icon-thumbnail">
                  <i data-feather="airplay"></i>
                 </span>
              </li>
              <li className="">
                <FilterLink filter="settings">
                  <span className="title">Settings</span>
                </FilterLink>
                <span className="icon-thumbnail">
                  <i data-feather="airplay"></i>
                 </span>
              </li>
              <Logout />
            </ul>
            <div className="clearfix"></div>
          </div>

        </nav>
      </div>
    );
  }
}

SideBar.propTypes = {
  authRequest: PropTypes.func.isRequired,
  flashMessage: PropTypes.func.isRequired,
};


function mapStateToProps(state) {
  return {
    loading: state.loading,
  };
}

function mapDispatchToProps(dispatch) {
  return bindActionCreators({
    authRequest,
    flashMessage,
  }, dispatch);
}

export default connect(mapStateToProps,mapDispatchToProps)(SideBar);
