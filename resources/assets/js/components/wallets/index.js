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
import walletsRequest from '../../site-actions/wallets';
import fetchAuthRequest from '../../site-actions/auth';

export class Wallets extends React.Component {

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

    let userName, userCreatedAt, userEmail, userPhoneNumber, userCountryCode = "loading...";
    let userBtcAccAddress, userUsdAccAddress, userBtcAccBalance, userUsdAccBalance, userBtcWalletQRCode = "loading...";

    if (user.isAuth) {
      user = this.props.auth.user;
      userName = user.name;
      userEmail = user.email;
      userCreatedAt = user.created_at;
      userPhoneNumber = user.phone_number;
      userCountryCode = user.country.code;
      userBtcAccAddress = user.btc_account.address;
      userUsdAccAddress = user.usd_account.address;
      userBtcAccBalance = user.btc_account.balance;
      userUsdAccBalance = user.usd_account.balance;
      userBtcWalletQRCode = user.btc_wallet.qr_code;
    }

    const pageContent = (
      <div className="col-xl-12">
        <div className="card card-transparent ">
          <ul className="nav nav-tabs nav-tabs-simple hidden-sm-down bg-white nav-tabs-fillup" role="tablist" data-init-reponsive-tabs="dropdownfx">
            <li className="nav-item">
              <a href="#" data-toggle="tab" data-target="#bitcoin" className="active" aria-expanded="true">	Bitcoin Wallet
              </a>
            </li>
            <li className="nav-item">
              <a href="#" data-toggle="tab" data-target="#mainwallet"  aria-expanded="true">
                { app.name} Wallet
              </a>
            </li>
            <li className="nav-item">
              <a href="#" data-toggle="tab" data-target="#usdwallet" className="" aria-expanded="true">
                USD Wallet
              </a>
            </li>
          </ul>
          <div className="tab-content bg-white ">
            <div className="tab-pane slide-left active" id="bitcoin" aria-expanded="true">
              <div className="row column-seperation">
                <div className="col-lg-12">
                  <big className="pull-right p-l-2 balance">BTC : { userBtcAccBalance }</big>
                  <br />
                  <div className="">
                    <img style="width: 100px" src={`${icons.btc}`} alt="" className="img-responsive " />
                  </div>
                  <br />
                  <div className="">
                    <button className="btn btn-wallet-receive btn-cons">Receive</button>
                    <button className="btn btn-wallet-send btn-cons">Send</button>
                  </div>
                  <br />
                  <h3>
                    <span className="semi-bold">{app.name}</span>
                    <small>Bitcoin Wallet</small>
                  </h3>
                </div>
                <div className="col-lg-6 col-sm-12">
                  <div className="form-group-default form-group">
                    <label>Bitcoin Address</label>
                    <br />
                    <div  className="form-control text-muted">
                      <Link to={`/${urls.transaction}`} className="wallet-link">
                        { userBtcAccAddress }
                      </Link>
                      <img className="img-responsive  pull-right" style="width:5%;" src={`${userBtcWalletQRCode}`} alt="" />
                    </div>
                  </div>
                </div>
                <div className="col-lg-6">
                  {/*empty div*/}
                </div>
              </div>
            </div>

            <div className="tab-pane slide-right" id="mainwallet" aria-expanded="true">
              <div className="row column-seperation">
                <div className="col-lg-12">
                  <big className="pull-right p-l-2 balance">RC : { userBtcAccBalance}</big>
                  <br />
                  <div className="">
                    <img style="width: 100px" src={`${ icons.rc}`} alt="" className="img-responsive " />
                  </div>
                  <br />
                  <div className="">
                    <button className="btn btn-wallet-receive btn-cons">
                      Receive
                    </button>
                    <button className="btn btn-wallet-send btn-cons">Send</button>
                  </div>
                  <br />
                  <h3>
                    <span className="semi-bold">{app.name}</span>
                    <small> Wallet</small>
                  </h3>
                </div>
                <div className="col-lg-6 col-sm-12">
                  <div className="form-group-default form-group">
                    <label>{app.name} Address</label>
                    <br />
                    <div  className="form-control text-muted">
                      <Link to="#" className="wallet-link">{userBtcAccAddress}</Link>
                      <img className="img-responsive  pull-right" style="width:5%;" src={`${userBtcWalletQRCode}`} alt="" />
                    </div>
                  </div>
                </div>
                <div className="col-lg-6">
                  {/*empty div*/}
                </div>
              </div>
            </div>

            <div className="tab-pane slide-left" id="usdwallet" aria-expanded="truetrue">
              <div className="row column-seperation">
                <div className="col-lg-12">
                  <big className="pull-right p-l-2 balance">$ : { userUsdAccBalance }</big>
                  <br />
                  <div className="">
                    <img style="width: 100px" src={`${ icons.usd_c}`} alt="" className="img-responsive " />
                  </div>
                  <br />
                  <div className="">
                    <button className="btn btn-wallet-receive btn-cons">
                      Receive
                    </button>
                    <button className="btn btn-wallet-send btn-cons">
                      Send
                    </button>
                  </div>
                  <br />
                  <h3>
                    <span className="semi-bold">{app.name}</span>
                    <small>USD Wallet</small>
                  </h3>
                </div>
                <div className="col-lg-6 col-sm-12">
                  <div className="form-group-default form-group">
                    <label>USD Number</label>
                    <br />
                    <div  className="form-control text-muted">
                      <Link to="#" className="wallet-link">{userUsdAccAddress}</Link>
                      <img className="img-responsive  pull-right" style="width:5%;" src={`${userBtcWalletQRCode}`} alt="" />
                    </div>
                  </div>
                </div>
                <div className="col-lg-6">
                  {/*empty div*/}
                </div>
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

Wallets.propTypes = {
  flashMessage: PropTypes.func.isRequired,
  walletsRequest: PropTypes.func.isRequired,
  fetchAuthRequest: PropTypes.func.isRequired,
};

Wallets.contextTypes = {
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
    walletsRequest,
    fetchAuthRequest,
  }, dispatch);
}

export default connect(mapStateToProps, mapDispatchToProps)(Wallets);


