import React, { Component } from 'react'
import PropTypes from 'prop-types'

export default class ErrorMessage extends Component {
  render () {
    return (
      <div className="text-red-600">
        { this.props.children }
      </div>
    )
  }
}

ErrorMessage.propTypes = {
  children: PropTypes.node
}
