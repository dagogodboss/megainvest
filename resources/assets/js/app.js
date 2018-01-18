/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./boostrap');

import React from 'react';
import ReactDOM from 'react-dom';
import { Provider} from "react-redux";
import { BrowserRouter as Router} from 'react-router-dom'

import SiteStore from './site-store';
import SiteContent from './site-content';

ReactDOM.render(
    <Provider store={SiteStore}>
        <Router>
            <SiteContent />
        </Router>
    </Provider>,
    document.getElementById('react-app')
);