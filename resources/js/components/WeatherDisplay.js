import React, { Component } from 'react'
import PropTypes from 'prop-types'

import WeatherItem from './WeatherItem'

export default class WeatherDisplay extends Component {
  constructor (props) {
    super(props)

    this.items = this.items.bind(this)
  }

  get forecast () {
    return this.props.forecast !== undefined
      ? this.props.forecast
      : []
  }

  items () {
    return this.forecast.map(weather => <WeatherItem key={weather.date} weather={weather}/>)
  }

  render () {
    return (
      <div className="flex flex-wrap justify-between -m-2">
        {this.items()}
      </div>
    )
  }
}

WeatherDisplay.propTypes = {
  forecast: PropTypes.arrayOf(PropTypes.shape({
    day: PropTypes.string,
    avg: PropTypes.number,
    low: PropTypes.number,
    high: PropTypes.number,
    status: PropTypes.string
  }))
}
