import React from 'react';
import { Switch, Route } from 'react-router-dom';

import Lending  from '../../lending';

const Routes = () => (
    <Switch>
        <Route path='/lending' component={Lending}/>
        <Route path='/lending' component={Lending}/>
        <Route path='/lending' component={Lending}/>
    </Switch>
);

export default Routes
