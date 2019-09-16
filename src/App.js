import React, { Component } from "react";
import { BrowserRouter as Router, Route, Switch } from "react-router-dom";
import Navbar from "./components/layout/Navbar";
import Landing from "./components/layout/Landing";
import Register from "./components/auth/Register";
import Login from "./components/auth/Login";
import Alert from "./components/layout/Alert";
import Dashboard from './components/dashboard/Dashboard'
import "./App.css";

class App extends Component {
  state = {
    alert: null
  };

  setAlert = msg => {
    this.setState({ alert: msg });

    // Clear alert after few milliseconds
    setTimeout(() => {
      this.setState({ alert: null });
    }, 3600);
  };

  render() {
    return (
      <Router>
        <div>
          <Navbar />
          <Alert alert={this.state.alert} />
          <Switch>
            {/* Add different Routes here */}
            <Route exact path="/" component={Landing} />
            <Route
              exact
              path="/register"
              render={props => <Register setAlert={this.setAlert} />}
            />
            <Route exact path="/login" component={Login} />
            <Route exact path="/dashboard" component={Dashboard} />
          </Switch>
        </div>
      </Router>
    );
  }
}

export default App;
