import React from 'react';
import { Switch, Route } from 'react-router-dom';

import Profile  from '../../profile';
import Details  from '../../profile/details';

const Routes = () => (
  <Switch>
    {/*<Route path='/profile' component={Profile}/>*/}
    <Route path='/profile/details' component={Details}/>
  </Switch>
);

export default Routes
