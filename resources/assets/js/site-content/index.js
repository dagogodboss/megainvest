import React from 'react';

import BottomNav from "../components/common/bottom-nav";
import PageHeader from '../components/common/page-header';
import PageFooter from '../components/common/page-footer';
import PageSidebar from '../components/common/page-sidebar';
import PageContent from '../components/content/page-content';
import PageParallax from '../components/common/page-parallax';

const SiteContent = () => (
  <div>
    <PageSidebar/>
    <div className="page-container">
      <PageHeader/>
      <div className="page-content-wrapper ">
        <div className="content sm-gutter">
          <PageParallax />
          <div className="container-fluid p-l-25 p-r-25 p-t-0 p-b-25 sm-padding-10">
            <PageContent />
            <BottomNav />
          </div>
          <PageFooter />
        </div>
      </div>
    </div>
  </div>
);

export default SiteContent
