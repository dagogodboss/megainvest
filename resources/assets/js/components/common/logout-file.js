import React from 'react';
import Link from "react-router-dom/es/Link";
import FilterLink from "./filter-link";

const Logout = () => (
  <li className="">
    <FilterLink filter="logout">
      <span className="title">Log-out</span>
    </FilterLink>
    <span className="icon-thumbnail">
      <i className="pg-power"></i>
    </span>
  </li>
);

export default Logout