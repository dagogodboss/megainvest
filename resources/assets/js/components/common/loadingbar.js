import React from "react";
import LoadingBar from 'react-redux-loading-bar';

export default class ProgressBar extends React.Component {
    render() {
        return (
            <header>
                <LoadingBar />
            </header>
        )
    }
}