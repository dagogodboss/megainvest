import React from 'react'
import { Switch, Route } from 'react-router-dom'
import IndexPage  from '../../home/index';

const Routes = () => (
    <Switch>
        <Route path='/' component={IndexPage}/>
        <Route path='/home' component={IndexPage}/>
    </Switch>
);

export default Routes
