import React, { Component } from 'react'
import ReactDOM from 'react-dom'
import axios from 'axios'

import Card from './ui/cards/Card'
import CardTitle from './ui/cards/CardTitle'
import CardBody from './ui/cards/CardBody'
import CityInput from './CityInput'
import ErrorMessage from './ui/ErrorMessage'
import WeatherDisplay from './WeatherDisplay'

const defaultMessage = 'Please choose a city'
const loadingMessage = 'Loading forecast...'
const defaultError = 'Uh oh! Looks like there was an error, please try another city!'

export default class Forecast extends Component {
  constructor (props) {
    super(props)

    this.state = {
      city: '',
      error: '',
      forecast: [],
      message: defaultMessage
    }

    this.onInput = this.onInput.bind(this)
  }

  onInput (e) {
    this.setState({ error: '', forecast: [], message: defaultMessage })

    if (e.target.value !== '') {
      this.setState({ city: e.target.value, message: loadingMessage })

      axios.get(`/api/forecast/${e.target.value}`)
        .then(res => this.setState({ forecast: res.data }))
        .catch(() => this.setState({ error: defaultError, forecast: [] }))
    }
  }

  get hasError () {
    return this.state.error !== ''
  }

  get hasForecast () {
    return this.state.forecast.length > 0
  }

  render () {
    let forecast

    if (this.hasError) {
      forecast = <ErrorMessage>{this.state.error}</ErrorMessage>
    } else {
      if (this.hasForecast) {
        forecast = <WeatherDisplay forecast={this.state.forecast}/>
      } else {
        forecast = <div>{this.state.message}</div>
      }
    }

    return (
      <Card>
        <CardBody>
          <div className="text-3xl text-right mb-2">Weather App</div>
          <CardTitle>
            City
          </CardTitle>
          <CityInput value={this.state.city} input={this.onInput}/>

          <CardTitle>
            Forecast
          </CardTitle>
          {forecast}
        </CardBody>
      </Card>
    )
  }
}

if (document.getElementById('forecast')) {
  ReactDOM.render(<Forecast/>, document.getElementById('forecast'))
}
