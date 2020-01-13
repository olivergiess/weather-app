import React, { Component } from 'react'
import PropTypes from 'prop-types'

export default class Card extends Component {
  render () {
    return (
      <div className="rounded shadow-lg">
        { this.props.children }
      </div>
    )
  }
}

Card.propTypes = {
  children: PropTypes.node
}
