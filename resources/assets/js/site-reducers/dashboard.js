import { DASHBOARD } from '../site-actions/action-type';

const initialState = {
    response:{},
    fetching: false,
    fetched: false,
    error: null,
};
const DASHBOARD_REJECTED = DASHBOARD + "_REJECTED";
const DASHBOARD_FULFILLED = DASHBOARD + "_FULFILLED";

export default function reducer(state=initialState, action) {

    switch (action.type) {
        case DASHBOARD: {
            return {...state, fetching: true, response: action.type}
        }
        case DASHBOARD_FULFILLED: {
            return {...state, fetching: false, fetched: true, error: null, response: action.payload}
        }
        case DASHBOARD_REJECTED: {
            return {...state, fetching: false, error: action.payload}
        }
    }

    return state
}
