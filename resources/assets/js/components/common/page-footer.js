import React from 'react'
import FilterLink from './filter-link'

const pageFooter = () => (
    <div>
        <div className=" container-fluid  container-fixed-lg footer">
            <div className="copyright sm-text-center">
                <p className="small no-margin pull-left sm-pull-reset">
                    <span className="hint-text">Copyright &copy; 2017 </span>
                    <span className="font-montserrat">{ "App Name" }</span>.
                    <span className="hint-text">All rights reserved. </span>
                    <span className="sm-block"><a href="#" className="m-l-10 m-r-10">Terms of use</a>
                        <span className="muted">|</span>
                        <a href="#" className="m-l-10">Privacy Policy</a>
                    </span>
                </p>
                <p className="small no-margin pull-right sm-pull-reset">
                    Hand-crafted <span className="hint-text">&amp; made with Love </span>
                    { " Powered by "}
                </p>
                <div className="clearfix">{""}</div>
            </div>
        </div>
    </div>
);

export default pageFooter