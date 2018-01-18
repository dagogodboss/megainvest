import { combineReducers } from "redux"
import { loadingBarReducer } from "react-redux-loading-bar"

import auth         from "./auth";
import Home         from "./home";
import Profile      from "./profile";
import Wallets      from "./wallets";
import Lending      from "./lending";
import Exchange     from "./exchange";
import Transfer     from "./transfer";
import Dashboard    from "./dashboard";

export default combineReducers({
  auth,
  Home,
  Profile,
  Wallets,
  Lending,
  Exchange,
  Transfer,
  Dashboard,
  Loading: loadingBarReducer,
})
