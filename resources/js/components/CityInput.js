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
            <select value={this.props.city} onChange={this.handleChange}>
                <option>Bilinga</option>
                <option>Tugun</option>
                <option>Palm Beach</option>
            </select>
        )
    }
}

CityInput.propTypes = {
    city: PropTypes.string,
    input: PropTypes.func
}
