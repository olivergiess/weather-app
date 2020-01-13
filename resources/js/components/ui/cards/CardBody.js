import React, { Component } from 'react'
import PropTypes from 'prop-types'

export default class CardBody extends Component {
  render () {
    return (
      <div className="px-6 py-4 text-gray-800">
        { this.props.children }
      </div>
    )
  }
}

CardBody.propTypes = {
  children: PropTypes.node
}
