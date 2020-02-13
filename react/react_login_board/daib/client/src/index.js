import React from 'react'
import ReactDOM from 'react-dom'
import { Router, Route } from 'react-router-dom'
import { Login, Register, Home, Main, Memos, Posts, SearchedMemo } from './containers';

import { Provider } from 'react-redux';
import { createStore, applyMiddleware } from 'redux';
import reducers from './reducers';
import thunk from 'redux-thunk';
import history from './history';

const store = createStore(reducers, applyMiddleware(thunk));

ReactDOM.render(
  <Provider store={store}>
    <Router history={history}>
      <div>
        <Route exact path="/" component={Login} />
        <Route path="/signup" component={Register} />
        <Route path="/home" component={Home} />
        <Route path="/home/main" component={Main} />
        <Route exact path="/home/memo" component={Memos} />
        <Route path="/home/memo/:username" component={SearchedMemo}/>
        <Route path="/home/post" component={Posts} />
      </div>
    </Router>
    </Provider>,
  document.getElementById('root')
)