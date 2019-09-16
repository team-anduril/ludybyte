import React, { Component } from "react";

export class Register extends Component {
  state = {
    name: "",
    email: "",
    password: "",
    password2: ""
    // The second password2 above is for confirmation
  };

  onChange = e => {
    this.setState({ [e.target.name]: e.target.value });
  };

  onSubmit = e => {
    e.preventDefault();
    if (!/\S/.test(this.state.name) || !/\S/.test(this.state.email)) {
      this.props.setAlert("Please enter all fields");
    } else if (this.state.password !== this.state.password2) {
      this.props.setAlert("Passwords don't match");
    } else {
      console.log("Register successful");
      // Change the above later.
    }
  };

  render() {
    return (
      <div className="form-container">
        <h1 className="form-header">
          Create an account with <span className="text-primary">LudyByte</span>
        </h1>
        <form onSubmit={this.onSubmit}>
          <div>
            <label htmlFor="name">Name</label>
            <input
              type="text"
              name="name"
              id="name"
              onChange={this.onChange}
              value={this.state.name}
              required
            />
          </div>
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
            <p className="form-text">Passwords must be at least 6 characters</p>
            <input
              type="password"
              name="password"
              id="password"
              onChange={this.onChange}
              value={this.state.password}
              required
              minLength="6"
            />
          </div>
          <div>
            <label htmlFor="password2">Confirm Password</label>
            <input
              type="password"
              name="password2"
              id="password2"
              onChange={this.onChange}
              value={this.state.password2}
              required
              minLength="6"
            />
          </div>

          <input
            type="submit"
            value="Register"
            className="btn btn-primary btn-block"
          />
        </form>
      </div>
    );
  }
}

export default Register;
