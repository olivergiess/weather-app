import React, { Component } from 'react'
import PropTypes from 'prop-types'

export default class CityInput extends Component {
  constructor (props) {
    super(props)

    this.handleChange = this.handleChange.bind(this)
  }

  handleChange (e) {
    this.props.input(e)
  }

  render () {
    return (
      <select className="mb-2" value={this.props.city} onChange={this.handleChange}>
        <option value="">Choose a city</option>
        <option value="gold coast">Gold Coast</option>
        <option value="sunshine coast">Sunshine Coast</option>
        <option value="brisbane">Brisbane</option>
      </select>
    )
  }
}

CityInput.propTypes = {
  city: PropTypes.string,
  input: PropTypes.func
}
