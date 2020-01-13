import React, { Component } from 'react'
import PropTypes from 'prop-types'

export default class CardTitle extends Component {
  render () {
    return (
      <div className="font-bold text-2xl mb-2">
        { this.props.children }
      </div>
    )
  }
}

CardTitle.propTypes = {
  children: PropTypes.node
}
