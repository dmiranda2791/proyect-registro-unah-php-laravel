import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class Root extends Component {
    constructor() {

        super();
        //Initialize the state in the constructor
        this.state = {
            clases: [],
        }
      }
      /*componentDidMount() is a lifecycle method
       * that gets called after the component is rendered
       */
      componentDidMount() {
        /* fetch API in action */
        fetch('/api/clases')
            .then(response => {
                console.log(response);
                return response.json();
            })
            .then(clases => {
                //Fetched product is stored in the state
                this.setState({ clases });
            });
      }

     renderClases() {
        return this.state.clases.map(clase => {
            return (
                /* When using list you need to specify a key
                 * attribute that is unique for each list item
                */
                <li key={clase.id} >
                    { clase.nombre }
                </li>
            );
        })
      }

      render() {
       /* Some css code has been removed for brevity */
        return (
            <div>
                  <ol>
                    { this.renderClases() }
                  </ol>
                </div>

        );
      }
}

if (document.getElementById('root')) {
    ReactDOM.render(<Root />, document.getElementById('root'));
}
