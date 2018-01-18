import React from 'react';
import { Switch, Route } from 'react-router-dom';

import Transfer  from '../../transfer';

const Routes = () => (
    <Switch>
        <Route path='/transfer' component={Transfer}/>
        <Route path='/transfer' component={Transfer}/>
        <Route path='/transfer' component={Transfer}/>
    </Switch>
);

export default Routes
