import React from 'react'

const Landing = () => {
  return (
    <div className="container text-center">
      <h1>LudyByte</h1>
      <p>
        A community of developers, by developers. LudyByte gives you a platform
        to share your code while also blowing off steam..
      </p>
      <div style={{width: '50%', margin: '2rem auto 0 auto'}}>
        <button style={{ marginRight: '2rem' }}className="btn btn-primary">Sign Up</button>
        <button style={{marginLeft: '2rem'}} className="btn btn-primary">Sign In</button>
      </div>
    </div>
  );
}

export default Landing

