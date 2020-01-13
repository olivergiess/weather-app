import React, { Component } from 'react'
import PropTypes from 'prop-types'

export default class WeatherItem extends Component {
  render () {
    return (
      <div className="w-full md:w-1/6 m-2">
        <div className="flex flex-col flex-wrap justify-between h-full">
          <div className="w-full">
            {this.props.weather.status}
          </div>
          <div className="w-full h-auto">
            <div className="text-xl font-medium">Avg {this.props.weather.avg}°</div>
            <div className="text-sm">Low {this.props.weather.low}°</div>
            <div className="text-sm">High {this.props.weather.high}°</div>
          </div>
        </div>
      </div>
    )
  }
}

WeatherItem.propTypes = {
  weather: PropTypes.shape({
    day: PropTypes.string,
    avg: PropTypes.number,
    low: PropTypes.number,
    high: PropTypes.number,
    status: PropTypes.string
  })
}
