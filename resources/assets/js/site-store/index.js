import React from "react";
import thunk from "redux-thunk";
import {createLogger} from "redux-logger";
import promise from "redux-promise-middleware";
import { applyMiddleware, createStore, compose } from "redux";

import reducer from "../site-reducers";

export default createStore(
    reducer,
    compose(
        applyMiddleware(...[thunk, promise(), createLogger()]),
      window.devToolsExtension ? window.devToolsExtension() : f => f
    )
);