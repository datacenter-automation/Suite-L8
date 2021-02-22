import React, {Component} from 'react';
import ReactDOM from 'react-dom';
import '../../css/reset.css';

export default class User extends Component {
  constructor(props) {
    super(props);
    this.state = {
      count: 0
    };
  }

  render() {
    return (
      <>
        <div>
          <p className="mb-4">You clicked {this.state.count} times</p>
          <button
            className="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded"
            onClick={() => this.setState({count: this.state.count + 1})}>
            Click me
          </button>
        </div>
      </>
    );
  }
}

ReactDOM.render(
  <User/>,
  document.getElementById('user-component')
);

