import React from 'react'
import { Switch, Route } from 'react-router-dom'

import Home       from './home';
import Lending    from './lending';
import Wallets    from './wallets';
import Profile    from './profile';
import Transfer   from './transfer';
import Exchange   from './exchange';
import Settings   from './settings';
import Dashboard  from './dashboard';
import ErrorPage  from './error-page';
// The Main component renders one of the three provided
// Routes (provided that one matches). Both the /roster
// and /schedule routes will match any pathname that starts
// with /roster or /schedule. The / route will only match
// when the pathname is exactly the string "/"
const Routes = () => (
  <main>
    <Switch>
      <Route exact path='/' component={Home}/>
      <Route path='/lending' component={Lending}/>
      <Route path='/wallets' component={Wallets}/>
      <Route path='/profile' component={Profile}/>
      <Route path='/transfer' component={Transfer}/>
      <Route path='/exchange' component={Exchange}/>
      <Route path='/settings' component={Settings}/>
      <Route path='/dashboard' component={Dashboard}/>
      <Route path='/*' component={ErrorPage}/>
    </Switch>
  </main>
);

export default Routes
