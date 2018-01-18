import React from 'react'
import { NavLink } from 'react-router-dom'

const FilterLink = ({ filter, children }) => (
    <NavLink
        to={filter === 'index' ? '/' : `/${ filter }`}
        activeStyle={{
            // color: '#fff',
            // background: '#61afef'
        }}
    >
        {children}
    </NavLink>
);

export default FilterLink