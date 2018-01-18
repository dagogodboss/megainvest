import React from 'react'
import FilterLink from './filter-link'

const BottomNav = () => (
    <div className="container-fluid p-l-25 p-r-25 sm-p-l-0 sm-p-r-0">
        <p>
            Show:
            {' '}
            <FilterLink filter="dashboard">Dashboard</FilterLink>
            {', '}
            <FilterLink filter="active">Active</FilterLink>
            {', '}
            <FilterLink filter="completed">Completed</FilterLink>
        </p>
        <br/>
        <br/>
    </div>
);

export default BottomNav