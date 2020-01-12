import React, { Component } from 'react'
import ReactDOM from 'react-dom'

import CityInput from './CityInput'
import WeatherDisplay from './WeatherDisplay'

export default class Wrapper extends Component {
    constructor(props){
        super(props);

        this.state = {
            city: null,
            weather: []
        }

        this.onInput = this.onInput.bind(this)
    }

    onInput(e) {
        this.setState({ city: e.target.value })
    }

    render() {
        return (
            <div>
                <CityInput value={this.state.city} input={this.onInput} />
                <WeatherDisplay />
            </div>
        )
    }
}

if (document.getElementById('wrapper')) {
    ReactDOM.render(<Wrapper />, document.getElementById('wrapper'))
}
