import React from 'react'
import { Switch, Route } from 'react-router-dom'
import ErrorPage  from '../../error-page/index';

const Routes = () => (
    <Switch>
        <Route path='/*' component={ErrorPage}/>
        <Route path='/:error-page' component={ErrorPage}/>
    </Switch>
);

export default Routes
