import React, { Component } from "react";

export class Login extends Component {
  state = {
    email: "",
    password: ""
    // The second password2 above is for confirmation
  };

  onChange = e => {
    this.setState({ [e.target.name]: e.target.value });
  };

  onSubmit = e => {
    e.preventDefault();
    console.log("Login successful");
    // Change the above later.
  };

  render() {
    return (
      <div className="form-container">
        <h1 className="form-header">
          Login to your <span className="text-primary">LudyByte</span> account
        </h1>
        <form onSubmit={this.onSubmit}>
          <div>
            <label htmlFor="email">Email Address</label>
            <input
              type="email"
              name="email"
              id="email"
              onChange={this.onChange}
              value={this.state.email}
              required
            />
          </div>
          <div>
            <label htmlFor="password">Password</label>
            <input
              type="password"
              name="password"
              id="password"
              onChange={this.onChange}
              value={this.state.password}
              required
            />
          </div>

          <input
            type="submit"
            value="Login"
            className="btn btn-primary btn-block"
          />
        </form>
      </div>
    );
  }
}

export default Login;
