import React from 'react';
import { Switch, Route } from 'react-router-dom';

import Settings  from '../../settings';

const Routes = () => (
  <Switch>
    <Route path='/settings' component={Settings}/>
    <Route path='/settings' component={Settings}/>
    <Route path='/settings' component={Settings}/>
  </Switch>
);

export default Routes
