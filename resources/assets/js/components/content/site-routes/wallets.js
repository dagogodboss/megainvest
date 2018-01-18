import React from 'react';
import { Switch, Route } from 'react-router-dom';

import Wallets  from '../../wallets';

const Routes = () => (
    <Switch>
        <Route path='/wallets' component={Wallets}/>
        <Route path='/wallets' component={Wallets}/>
        <Route path='/wallets' component={Wallets}/>
    </Switch>
);

export default Routes
