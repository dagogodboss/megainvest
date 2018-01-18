import React from 'react';
import PropTypes from "prop-types";
import { connect } from 'react-redux';
import {Link} from "react-router-dom";
import {bindActionCreators} from "redux";

import PageNotFound from "../common/error-page"

export class ErrorPage extends React.Component {

  constructor(props) {
    super(props);
  }

  render() {
    return (
      <div>
        <h3>Page Error</h3>
        <PageNotFound/>
        <Link to='/#'>Go Back {"<<<"}</Link>
      </div>
    );
  }
}

ErrorPage.propTypes = {

};


function mapStateToProps(state) {
  return {
    //
  };
}

function mapDispatchToProps(dispatch) {
  return bindActionCreators({

  }, dispatch);
}

export default connect(mapStateToProps,mapDispatchToProps)(ErrorPage);
