import React, { Component } from 'react'
import PropTypes from 'prop-types'

export default class WeatherDisplay extends Component {
    render() {
        return (
            <div>Weather!</div>
        )
    }
}

WeatherDisplay.propTypes = {
    data: PropTypes.object
}
