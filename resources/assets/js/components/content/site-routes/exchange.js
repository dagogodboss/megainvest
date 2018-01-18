import React from 'react';
import { Switch, Route } from 'react-router-dom';

import Exchange  from '../../exchange';

const Routes = () => (
    <Switch>
        <Route path='/exchange' component={Exchange}/>
        <Route path='/exchange' component={Exchange}/>
        <Route path='/exchange' component={Exchange}/>
    </Switch>
);

export default Routes
