import React from 'react';

import HowItWork from "./how-it-work";
import SiteNotice from "./site-notice";

const RightModal = (user) => (
  <div className="modal fade slide-right" id="modalSlideLeft" tabIndex="-1" role="dialog" aria-hidden="true">
    <div className="modal-dialog modal-sm">
      <div className="modal-content-wrapper">
        <div className="modal-content">
          <button type="button" className="close" data-dismiss="modal" aria-hidden="true">
            <i className="pg-close fs-14"></i>
          </button>
          <div className="container-xs-height full-height">
            <div className="row-xs-height">
              <div className="modal-body col-xs-height col-middle text-center">
                {user.stage === "how-it-work" ?  <HowItWork /> :  <SiteNotice /> }
                <button type="button" className="btn btn-primary btn-block" data-dismiss="modal">
                  Close
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
);

export default RightModal